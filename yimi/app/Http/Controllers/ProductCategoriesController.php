<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\ProductAttrKey;
use App\ProductAttrValue;
use App\ProductAttribute;
use App\Product;
use App\ProductCategory;

class ProductCategoriesController extends Controller
{
    public function index(Request $request)
    {
    	$categories = ProductCategory::where('depth', 0)
    		->get();

        $attr_location_key = ProductAttrKey::where('name', '产地')
            ->where('status', 1)
            ->first();
        $attr_location_values = array();
        foreach ($attr_location_key->attr_values as $attr_value) {
            if (trim($attr_value->value) !== "") {
                array_push($attr_location_values, $attr_value->value);
            }
        }

        if (!$request->has('l')) {
            $products = Product::where('state', 'active')
                ->orderBy('updated_at', 'desc')
                ->get();
        }
        else {
            $locations = $request->query('l');
            if (!is_array($locations)) {
                $products = null;
            }
            else {
                $ls = ProductAttrValue::where('product_attr_key_id', $attr_location_key->id)
                    ->whereIn('value', $locations)
                    ->get();
                $ls_ids = array();
                foreach ($ls as $l) {
                    array_push($ls_ids, $l->id);
                }
                $pattrs = ProductAttribute::where('product_attr_key_id', $attr_location_key->id)
                    ->whereIn('product_attr_value_id', $ls_ids)
                    ->get();
                $ls_pids = array();
                foreach ($pattrs as $pa) {
                    array_push($ls_pids, $pa->product_id);
                }

                $products = Product::where('state', 'active')
                    ->whereIn('id', $ls_pids)
                    ->orderBy('updated_at', 'desc')
                    ->get();
            }
        }

    	return View::make('categories.index')
            ->with('active', 'categories')
    		->with('categories', $categories)
            ->with('locations', array_unique($attr_location_values))
    		->with('products', $products);
    }

    public function show($slug, Request $request)
    {
        $categories = ProductCategory::where('depth', 0)
            ->get();
        $attr_location_key = ProductAttrKey::where('name', '产地')
            ->where('status', 1)
            ->first();
        $attr_location_values = array();
        foreach ($attr_location_key->attr_values as $attr_value) {
            if (trim($attr_value->value) !== "") {
                array_push($attr_location_values, $attr_value->value);
            }
        }

        if ($request->has('l')) {
            $locations = $request->query('l');
            if (is_array($locations)) {
                $ls = ProductAttrValue::where('product_attr_key_id', $attr_location_key->id)
                    ->whereIn('value', $locations)
                    ->get();
                $ls_ids = array();
                foreach ($ls as $l) {
                    array_push($ls_ids, $l->id);
                }
                $pattrs = ProductAttribute::where('product_attr_key_id', $attr_location_key->id)
                    ->whereIn('product_attr_value_id', $ls_ids)
                    ->get();
                $ls_pids = array();
                foreach ($pattrs as $pa) {
                    array_push($ls_pids, $pa->product_id);
                }
            }
        }

        if ($slug === "new") {
            $one_week_ago = date("Y-m-d H:i:s", time() - 7 * 24 * 60 * 60);

            if (isset($ls_pids) && sizeof($ls_pids) > 0) {
                $products = Product::where('state', 'active')
                    ->where('updated_at', '>=', $one_week_ago)
                    ->whereIn('id', $ls_pids)
                    ->orderBy('updated_at', 'desc')
                    ->get();
            }
            else {
                $products = Product::where('state', 'active')
                    ->where('updated_at', '>=', $one_week_ago)
                    ->orderBy('updated_at', 'desc')
                    ->get();
            }

            return View::make('categories.index')
                ->with('active', 'categories')
                ->with('products', $products)
                ->with('locations', array_unique($attr_location_values))
                ->with('categories', $categories);
        }
        else {
            $selected_category = ProductCategory::where('slug', $slug)
                ->first();
            if (null !== $selected_category) {
                switch ($selected_category->depth) {
                    case 0:
                        $selected_parent_category = $selected_category;
                        break;
                    case 1:
                        $selected_parent_category = $selected_category->parent;
                        break;
                    case 2:
                        $selected_parent_category = $selected_category->parent->parent;
                        break;
                    default:
                        $selected_parent_category = null;
                        break;
                }
            }

            if ($selected_category) {
                $ids = array($selected_category->id);
                if (null !== $selected_category->children && sizeof($selected_category->children) > 0) {
                    foreach ($selected_category->children as $s_category) {
                        array_push($ids, $s_category->id);
                        if (null !== $s_category->children && sizeof($s_category->children) > 0) {
                            foreach ($s_category->children as $gs_category) {
                                array_push($ids, $gs_category->id);
                            }
                        }
                    }
                }

                if (isset($ls_pids) && sizeof($ls_pids) > 0) {
                    $products = Product::whereIn('category_id', $ids)
                        ->where('state', 'active')
                        ->whereIn('id', $ls_pids)
                        ->orderBy('updated_at', 'desc')
                        ->get();
                }
                else {
                    $products = Product::whereIn('category_id', $ids)
                        ->where('state', 'active')
                        ->orderBy('updated_at', 'desc')
                        ->get();
                }

                return View::make('categories.index')
                    ->with('active', 'categories')
                    ->with('products', $products)
                    ->with('selected_category', $selected_category)
                    ->with('selected_parent_category', $selected_parent_category)
                    ->with('locations', array_unique($attr_location_values))
                    ->with('categories', $categories);
            } else {
                if (isset($ls_pids) && sizeof($ls_pids) > 0) {
                    $products = Product::where('state', 'active')
                        ->whereIn('id', $ls_pids)
                        ->orderBy('updated_at', 'desc')
                        ->get();
                }
                else {
                    $products = Product::where('state', 'active')
                        ->orderBy('updated_at', 'desc')
                        ->get();
                }

                return View::make('categories.index')
                    ->with('active', 'categories')
                    ->with('products', $products)
                    ->with('locations', array_unique($attr_location_values))
                    ->with('categories', $categories);
            }
        }
    }

    public function search(Request $request)
    {
        $query = trim($request->input('query'));
        $categories = ProductCategory::where('depth', 0)
            ->get();

        if (!isset($query)) {
            $products = null;

            return View::make('categories.index')
                ->with('active', 'search')
                ->with('query', $query)
                ->with('categories', $categories)
                ->with('products', $products);
        }
        else {
            $products = Product::where('name', 'LIKE', '%' . $query . '%')
                ->where('state', 'active')
                ->orderBy('updated_at', 'desc')
                ->paginate(15);
            $selected_category = null;
            $selected_parent_category = null;


            if (sizeof($products) > 0) {
                foreach ($products as $product) {
                    $selected_category = $product->category;

                    if (null !== $selected_category) {
                        switch ($selected_category->depth) {
                            case 0:
                                $selected_parent_category = $selected_category;
                                break;
                            case 1:
                                $selected_parent_category = $selected_category->parent;
                                break;
                            case 2:
                                $selected_parent_category = $selected_category->parent->parent;
                                break;
                            default:
                                $selected_parent_category = null;
                                break;
                        }
                    }
                }
            }

            return View::make('categories.index')
                ->with('active', 'search')
                ->with('query', $query)
                ->with('categories', $categories)
                ->with('products', $products)
                ->with('selected_category', $selected_category)
                ->with('selected_parent_category', $selected_parent_category);
        }
    }
}
