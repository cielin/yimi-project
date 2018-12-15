<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Product;
use App\Brand;
use App\ProductAttribute;
use App\ProductAttrValue;
use App\ProductAttrKey;
use App\ProductCategory;
use App\Spotlight;

class UtilController extends Controller
{
    public function getItems(Request $request)
    {
        $type = $request->input('type');
        $basket = (null !== $request->input('basket')) ? $request->input('basket') : '';
        $page = (null !== $request->input('page')) ? $request->input('page') : 1;
        $pageCount = (null !== $request->input('pageCount')) ? $request->input('pageCount') : 1;
        $location = (null !== $request->input('location')) ? $request->input('location') : '';
        $userId = (null !== $request->input('userId')) ? $request->input('userId') : '';
        $products = array();
        $total = 0;

        if ($type === 'space') {
            if ($basket === '') {
                $total = DB::table('products')
                    ->where('state', 'active')
                    ->count();
                if ($userId === '') {
                    $products = DB::table('products')
                        ->select('id', 'name', 'slug', 'featured_image', 'poster')
                        ->where('state', 'active')
                        ->orderBy('updated_at', 'desc')
                        ->skip(($page - 1) * $pageCount)
                        ->take($pageCount)
                        ->get();
                }
                else {
                    $products = DB::table('products')
                        ->leftJoin('product_collections', function ($join) use ($userId) {
                            $join->on('products.id', '=', 'product_collections.product_id')
                                 ->where('product_collections.customer_id', $userId)
                                 ->where('product_collections.type', 1);
                        })
                        ->select('products.id', 'name', 'slug', 'featured_image', 'poster', 'product_collections.status')
                        ->where('state', 'active')
                        ->orderBy('products.updated_at', 'desc')
                        ->skip(($page - 1) * $pageCount)
                        ->take($pageCount)
                        ->get();
                }
            }
            else {
                $attr_key = ProductAttrKey::where('name', '空间')
                    ->where('status', 1)
                    ->first();
                $sel_attr_values = ProductAttrValue::where('value', $basket)
                    ->where('status', 1)
                    ->get();

                if ($sel_attr_values !== null && sizeof($sel_attr_values) > 0) {
                    $product_ids = array();
                    foreach ($sel_attr_values as $sel_attr_value) {
                        $product_attribute = ProductAttribute::where('product_attr_key_id', $attr_key->id)
                            ->where('product_attr_value_id', $sel_attr_value->id)
                            ->first();

                        if ($product_attribute !== null) {
                            array_push($product_ids, $product_attribute->product_id);
                        }
                    }

                    $total = DB::table('products')
                        ->whereIn('id', $product_ids)
                        ->where('state', 'active')
                        ->count();
                    if ($userId === '') {
                        $products = DB::table('products')
                            ->select('id', 'name', 'slug', 'featured_image', 'poster')
                            ->whereIn('id', $product_ids)
                            ->where('state', 'active')
                            ->orderBy('updated_at', 'desc')
                            ->skip(($page - 1) * $pageCount)
                            ->take($pageCount)
                            ->get();
                    }
                    else {
                        $products = DB::table('products')
                            ->leftJoin('product_collections', function ($join) use ($userId) {
                                $join->on('products.id', '=', 'product_collections.product_id')
                                    ->where('product_collections.customer_id', $userId)
                                    ->where('product_collections.type', 1);
                            })
                            ->select('products.id', 'name', 'slug', 'featured_image', 'poster', 'product_collections.status')
                            ->whereIn('products.id', $product_ids)
                            ->where('state', 'active')
                            ->orderBy('products.updated_at', 'desc')
                            ->skip(($page - 1) * $pageCount)
                            ->take($pageCount)
                            ->get();
                    }
                }
            }
        } elseif ($type === 'brand') {
            if ($basket !== '') {
                $brand = Brand::where('slug', $basket)
                    ->first();

                if (null !== $brand) {
                    $total = DB::table('products')
                        ->where('brand_id', $brand->id)
                        ->where('state', 'active')
                        ->count();
                    if ($userId === '') {
                        $products = DB::table('products')
                            ->select('id', 'name', 'slug', 'featured_image', 'poster')
                            ->where('brand_id', $brand->id)
                            ->where('state', 'active')
                            ->orderBy('updated_at', 'desc')
                            ->skip(($page - 1) * $pageCount)
                            ->take($pageCount)
                            ->get();
                    }
                    else {
                        $products = DB::table('products')
                            ->leftJoin('product_collections', function ($join) use ($userId) {
                                $join->on('products.id', '=', 'product_collections.product_id')
                                    ->where('product_collections.customer_id', $userId)
                                    ->where('product_collections.type', 1);
                            })
                            ->select('products.id', 'name', 'slug', 'featured_image', 'poster', 'product_collections.status')
                            ->where('products.brand_id', $brand->id)
                            ->where('state', 'active')
                            ->orderBy('products.updated_at', 'desc')
                            ->skip(($page - 1) * $pageCount)
                            ->take($pageCount)
                            ->get();
                    }
                }
            }
        } elseif ($type === 'category') {
            $attr_location_key = ProductAttrKey::where('name', '产地')
                ->where('status', 1)
                ->first();

            if ($basket === '') {
                if ($location === '') {
                    $total = DB::table('products')
                        ->where('state', 'active')
                        ->count();
                    if ($userId === '') {
                        $products = DB::table('products')
                            ->select('id', 'name', 'slug', 'featured_image', 'poster')
                            ->where('state', 'active')
                            ->orderBy('updated_at', 'desc')
                            ->skip(($page - 1) * $pageCount)
                            ->take($pageCount)
                            ->get();
                    }
                    else {
                        $products = DB::table('products')
                            ->leftJoin('product_collections', function ($join) use ($userId) {
                                $join->on('products.id', '=', 'product_collections.product_id')
                                    ->where('product_collections.customer_id', $userId)
                                    ->where('product_collections.type', 1);
                            })
                            ->select('products.id', 'name', 'slug', 'featured_image', 'poster', 'product_collections.status')
                            ->where('state', 'active')
                            ->orderBy('products.updated_at', 'desc')
                            ->skip(($page - 1) * $pageCount)
                            ->take($pageCount)
                            ->get();
                    }
                } else {
                    if (is_array($location)) {
                        $ls = ProductAttrValue::where('product_attr_key_id', $attr_location_key->id)
                            ->whereIn('value', $location)
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

                        $total = DB::table('products')
                            ->whereIn('id', $ls_pids)
                            ->where('state', 'active')
                            ->count();
                        if ($userId === '') {
                            $products = DB::table('products')
                                ->select('id', 'name', 'slug', 'featured_image', 'poster')
                                ->whereIn('id', $ls_pids)
                                ->where('state', 'active')
                                ->orderBy('updated_at', 'desc')
                                ->skip(($page - 1) * $pageCount)
                                ->take($pageCount)
                                ->get();
                        }
                        else {
                            $products = DB::table('products')
                                ->leftJoin('product_collections', function ($join) use ($userId) {
                                    $join->on('products.id', '=', 'product_collections.product_id')
                                        ->where('product_collections.customer_id', $userId)
                                        ->where('product_collections.type', 1);
                                })
                                ->select('products.id', 'name', 'slug', 'featured_image', 'poster', 'product_collections.status')
                                ->whereIn('products.id', $ls_pids)
                                ->where('state', 'active')
                                ->orderBy('products.updated_at', 'desc')
                                ->skip(($page - 1) * $pageCount)
                                ->take($pageCount)
                                ->get();
                        }
                    }
                }
            } else {
                if ($location !== '') {
                    if (is_array($location)) {
                        $ls = ProductAttrValue::where('product_attr_key_id', $attr_location_key->id)
                            ->whereIn('value', $location)
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

                if ($basket === "new") {
                    $one_week_ago = date("Y-m-d H:i:s", time() - 7 * 24 * 60 * 60);

                    if (isset($ls_pids) && sizeof($ls_pids) > 0) {
                        $total = DB::table('products')
                            ->where('updated_at', '>=', $one_week_ago)
                            ->whereIn('id', $ls_pids)
                            ->where('state', 'active')
                            ->count();
                        if ($userId === '') {
                            $products = DB::table('products')
                                ->select('id', 'name', 'slug', 'featured_image', 'poster')
                                ->where('updated_at', '>=', $one_week_ago)
                                ->whereIn('id', $ls_pids)
                                ->where('state', 'active')
                                ->orderBy('updated_at', 'desc')
                                ->skip(($page - 1) * $pageCount)
                                ->take($pageCount)
                                ->get();
                        }
                        else {
                            $products = DB::table('products')
                                ->leftJoin('product_collections', function ($join) use ($userId) {
                                    $join->on('products.id', '=', 'product_collections.product_id')
                                        ->where('product_collections.customer_id', $userId)
                                        ->where('product_collections.type', 1);
                                })
                                ->select('products.id', 'name', 'slug', 'featured_image', 'poster', 'product_collections.status')
                                ->where('products.updated_at', '>=', $one_week_ago)
                                ->whereIn('products.id', $ls_pids)
                                ->where('state', 'active')
                                ->orderBy('products.updated_at', 'desc')
                                ->skip(($page - 1) * $pageCount)
                                ->take($pageCount)
                                ->get();
                        }
                    }
                    else {
                        $total = DB::table('products')
                            ->where('updated_at', '>=', $one_week_ago)
                            ->where('state', 'active')
                            ->count();
                        if ($userId === '') {
                            $products = DB::table('products')
                                ->select('id', 'name', 'slug', 'featured_image', 'poster')
                                ->where('updated_at', '>=', $one_week_ago)
                                ->where('state', 'active')
                                ->orderBy('updated_at', 'desc')
                                ->skip(($page - 1) * $pageCount)
                                ->take($pageCount)
                                ->get();
                        }
                        else {
                            $products = DB::table('products')
                                ->leftJoin('product_collections', function ($join) use ($userId) {
                                    $join->on('products.id', '=', 'product_collections.product_id')
                                        ->where('product_collections.customer_id', $userId)
                                        ->where('product_collections.type', 1);
                                })
                                ->select('products.id', 'name', 'slug', 'featured_image', 'poster', 'product_collections.status')
                                ->where('products.updated_at', '>=', $one_week_ago)
                                ->where('state', 'active')
                                ->orderBy('products.updated_at', 'desc')
                                ->skip(($page - 1) * $pageCount)
                                ->take($pageCount)
                                ->get();
                        }
                    }
                } else {
                    $selected_category = ProductCategory::where('slug', $basket)
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
                            $total = DB::table('products')
                                ->whereIn('category_id', $ids)
                                ->whereIn('id', $ls_pids)
                                ->where('state', 'active')
                                ->count();
                            if ($userId === '') {
                                $products = DB::table('products')
                                    ->select('id', 'name', 'slug', 'featured_image', 'poster')
                                    ->whereIn('category_id', $ids)
                                    ->whereIn('id', $ls_pids)
                                    ->where('state', 'active')
                                    ->orderBy('updated_at', 'desc')
                                    ->skip(($page - 1) * $pageCount)
                                    ->take($pageCount)
                                    ->get();
                            }
                            else {
                                $products = DB::table('products')
                                    ->leftJoin('product_collections', function ($join) use ($userId) {
                                        $join->on('products.id', '=', 'product_collections.product_id')
                                            ->where('product_collections.customer_id', $userId)
                                            ->where('product_collections.type', 1);
                                    })
                                    ->select('products.id', 'name', 'slug', 'featured_image', 'poster', 'product_collections.status')
                                    ->whereIn('products.category_id', $ids)
                                    ->whereIn('products.id', $ls_pids)
                                    ->where('state', 'active')
                                    ->orderBy('products.updated_at', 'desc')
                                    ->skip(($page - 1) * $pageCount)
                                    ->take($pageCount)
                                    ->get();
                            }
                        }
                        else {
                            $total = DB::table('products')
                                ->whereIn('category_id', $ids)
                                ->where('state', 'active')
                                ->count();
                            if ($userId === '') {
                                $products = DB::table('products')
                                    ->select('id', 'name', 'slug', 'featured_image', 'poster')
                                    ->whereIn('category_id', $ids)
                                    ->where('state', 'active')
                                    ->orderBy('updated_at', 'desc')
                                    ->skip(($page - 1) * $pageCount)
                                    ->take($pageCount)
                                    ->get();
                            }
                            else {
                                $products = DB::table('products')
                                    ->leftJoin('product_collections', function ($join) use ($userId) {
                                        $join->on('products.id', '=', 'product_collections.product_id')
                                            ->where('product_collections.customer_id', $userId)
                                            ->where('product_collections.type', 1);
                                    })
                                    ->select('products.id', 'name', 'slug', 'featured_image', 'poster', 'product_collections.status')
                                    ->whereIn('products.category_id', $ids)
                                    ->where('state', 'active')
                                    ->orderBy('products.updated_at', 'desc')
                                    ->skip(($page - 1) * $pageCount)
                                    ->take($pageCount)
                                    ->get();
                            }
                        }
                    } else {
                        if (isset($ls_pids) && sizeof($ls_pids) > 0) {
                            $total = DB::table('products')
                                ->whereIn('id', $ls_pids)
                                ->where('state', 'active')
                                ->count();
                            if ($userId === '') {
                                $products = DB::table('products')
                                    ->select('id', 'name', 'slug', 'featured_image', 'poster')
                                    ->whereIn('id', $ls_pids)
                                    ->where('state', 'active')
                                    ->orderBy('updated_at', 'desc')
                                    ->skip(($page - 1) * $pageCount)
                                    ->take($pageCount)
                                    ->get();
                            }
                            else {
                                $products = DB::table('products')
                                    ->leftJoin('product_collections', function ($join) use ($userId) {
                                        $join->on('products.id', '=', 'product_collections.product_id')
                                            ->where('product_collections.customer_id', $userId)
                                            ->where('product_collections.type', 1);
                                    })
                                    ->select('products.id', 'name', 'slug', 'featured_image', 'poster', 'product_collections.status')
                                    ->whereIn('products.id', $ls_pids)
                                    ->where('state', 'active')
                                    ->orderBy('products.updated_at', 'desc')
                                    ->skip(($page - 1) * $pageCount)
                                    ->take($pageCount)
                                    ->get();
                            }
                        }
                        else {
                            $total = DB::table('products')
                                ->where('state', 'active')
                                ->count();
                            if ($userId === '') {
                                $products = DB::table('products')
                                    ->select('id', 'name', 'slug', 'featured_image', 'poster')
                                    ->where('state', 'active')
                                    ->orderBy('updated_at', 'desc')
                                    ->skip(($page - 1) * $pageCount)
                                    ->take($pageCount)
                                    ->get();
                            }
                            else {
                                $products = DB::table('products')
                                    ->leftJoin('product_collections', function ($join) use ($userId) {
                                        $join->on('products.id', '=', 'product_collections.product_id')
                                            ->where('product_collections.customer_id', $userId)
                                            ->where('product_collections.type', 1);
                                    })
                                    ->select('products.id', 'name', 'slug', 'featured_image', 'poster', 'product_collections.status')
                                    ->where('state', 'active')
                                    ->orderBy('products.updated_at', 'desc')
                                    ->skip(($page - 1) * $pageCount)
                                    ->take($pageCount)
                                    ->get();
                            }
                        }
                    }
                }
            }
        } elseif ($type === 'home') {
            if ($userId === '') {
                $waterfalled_products = Product::where('is_waterfalled', 1)
                    ->where('state', 'active')
                    ->orderBy('updated_at', 'desc')
                    ->limit(250)
                    ->get();
                $spotlights = Spotlight::orderBy('updated_at', 'desc')
                    ->limit(250)
                    ->get();
            }
            else {
                $waterfalled_products = Product::leftJoin('product_collections', function ($join) use ($userId) {
                        $join->on('products.id', '=', 'product_collections.product_id')
                            ->where('product_collections.customer_id', $userId)
                            ->where('product_collections.type', 1);
                    })
                    ->select('products.id', 'name', 'slug', 'featured_image', 'poster', 'products.updated_at', 'product_collections.status')
                    ->where('products.is_waterfalled', 1)
                    ->where('state', 'active')
                    ->orderBy('products.updated_at', 'desc')
                    ->limit(250)
                    ->get();
                $spotlights = Spotlight::leftJoin('product_collections', function ($join) use ($userId) {
                        $join->on('spotlights.id', '=', 'product_collections.product_id')
                            ->where('product_collections.customer_id', $userId)
                            ->where('product_collections.type', 2);
                    })
                    ->select('spotlights.id', 'title', 'link', 'image', 'spotlights.updated_at', 'product_collections.status')
                    ->orderBy('spotlights.updated_at', 'desc')
                    ->limit(250)
                    ->get();
            }

            $combind_spotlights = array();
            $sort_key = array();
            foreach ($waterfalled_products as $waterfalled_product) {
                $combind_spotlight['id'] = $waterfalled_product->id;
                $combind_spotlight['name'] = $waterfalled_product->name;
                $combind_spotlight['featured_image'] = $waterfalled_product->featured_image;
                $combind_spotlight['slug'] = $waterfalled_product->slug;
                $combind_spotlight['type'] = '1';
                $combind_spotlight['updated_at'] = $waterfalled_product->updated_at->timestamp;
                $combind_spotlight['status'] = $waterfalled_product->status;
                array_push($combind_spotlights, $combind_spotlight);
            }
            foreach ($spotlights as $spotlight) {
                $combind_spotlight['id'] = $spotlight->id;
                $combind_spotlight['name'] = $spotlight->title;
                $combind_spotlight['featured_image'] = $spotlight->image;
                $combind_spotlight['link'] = $spotlight->link;
                $combind_spotlight['type'] = '2';
                $combind_spotlight['updated_at'] = $spotlight->updated_at->timestamp;
                $combind_spotlight['status'] = $spotlight->status;
                array_push($combind_spotlights, $combind_spotlight);
            }
            foreach ($combind_spotlights as $key => $value) {
                $sort_key[$key] = $value['updated_at'];
            }
            array_multisort($sort_key, SORT_DESC, $combind_spotlights);
            
            $total = count($combind_spotlights);
            $combind_products = collect($combind_spotlights);
            $products = $combind_products->forPage($page, $pageCount)->all();
        }

        $result = array('total' => $total, 'products' => $products);
        return json_encode($result);
    }
}

