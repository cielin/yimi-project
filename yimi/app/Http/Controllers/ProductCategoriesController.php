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
        $attr_material_key = ProductAttrKey::where('name', '材质')
            ->where('status', 1)
            ->first();
        $attr_material_values = array();
        foreach ($attr_material_key->attr_values as $attr_value) {
            array_push($attr_material_values, $attr_value->value);
        }
        $attr_location_key = ProductAttrKey::where('name', '产地')
            ->where('status', 1)
            ->first();
        $attr_location_values = array();
        foreach ($attr_location_key->attr_values as $attr_value) {
            array_push($attr_location_values, $attr_value->value);
        }

        if (!$request->has('m') && !$request->has('l')) {
            $products = Product::where('state', 'active')
                ->orderBy('updated_at', 'desc')
                ->paginate(15);
        }
        else {
            if ($request->has('m')) {
                $materials = $request->query('m');
                $ms = ProductAttrValue::where('product_attr_key_id', $attr_material_key->id)
                    ->whereIn('value', $materials)
                    ->get();
                $ms_ids = array();
                foreach ($ms as $m) {
                    array_push($ms_ids, $m->id);
                }

                $pattrs = ProductAttribute::where('product_attr_key_id', $attr_material_key->id)
                    ->whereIn('product_attr_value_id', $ms_ids)
                    ->get();
                return;
            }
            
            if ($request->has('l')) {
                $locations = $request->query('l');
            }
        }

    	return View::make('categories.index')
            ->with('active', 'categories')
    		->with('categories', $categories)
            ->with('materials', array_unique($attr_material_values))
            ->with('locations', array_unique($attr_location_values))
    		->with('products', $products);
    }

    public function show($slug)
    {
    	$categories = ProductCategory::where('depth', 0)
    		->get();
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

            $products = Product::whereIn('category_id', $ids)
                ->where('state', 'active')
    			->orderBy('updated_at', 'desc')
    			->paginate(15);

    		return View::make('categories.index')
                ->with('active', 'categories')
    			->with('products', $products)
    			->with('selected_category', $selected_category)
    			->with('selected_parent_category', $selected_parent_category)
    			->with('categories', $categories);
    	}
    	else {
            $products = Product::where('state', 'active')
                ->orderBy('updated_at', 'desc')
                ->paginate(20);

    		return View::make('categories.index')
                ->with('active', 'categories')
    			->with('products', $products)
    			->with('categories', $categories);
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
