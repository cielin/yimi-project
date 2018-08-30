<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Product;
use App\Banner;
use App\Designer;
use App\ProductCategory;
use App\Spotlight;

class HomeController extends Controller
{
    public function index()
    {
        $top_banners = Banner::where('type', 0)
            ->orderBy('updated_at', 'desc')
            ->limit(6)
            ->get(); 

        $sl_banner = Banner::where('type', 1)
            ->orderBy('updated_at', 'desc')
            ->first();

        $srt_banners = Banner::where('type', 2)
            ->orderBy('updated_at', 'desc')
            ->limit(2)
            ->get();

        $srb_banner = Banner::where('type', 3)
            ->orderBy('updated_at', 'desc')
            ->first();

        $featured_products = Product::where('is_featured', 1)
            ->where('state', 'active')
    		->orderBy('updated_at', 'desc')
    		->limit(8)
    		->get();

        $waterfalled_products = Product::where('is_waterfalled', 1)
            ->where('state', 'active')
    		->orderBy('updated_at', 'desc')
    		->limit(250)
    		->get();

        $designers = Designer::orderBy('updated_at', 'desc')
            ->limit(8)
            ->get();

        $categories = ProductCategory::where('depth', 0)
            ->orderBy('name', 'asc')
            ->limit(6)
            ->get();

        $spotlights = Spotlight::orderBy('updated_at', 'desc')
            ->limit(250)
            ->get();

        $combind_spotlights = array();
        $sort_key = array();
        foreach ($waterfalled_products as $waterfalled_product) {
            $combind_spotlight['id'] = $waterfalled_product->id;
            $combind_spotlight['title'] = $waterfalled_product->name;
            $combind_spotlight['image'] = $waterfalled_product->featured_image;
            $combind_spotlight['link'] = $waterfalled_product->slug;
            $combind_spotlight['type'] = 'product';
            $combind_spotlight['updated_at'] = $waterfalled_product->updated_at->timestamp;
            array_push($combind_spotlights, $combind_spotlight);
        }
        foreach ($spotlights as $spotlight) {
            $combind_spotlight['id'] = 0;
            $combind_spotlight['title'] = $spotlight->title;
            $combind_spotlight['image'] = $spotlight->image;
            $combind_spotlight['link'] = $spotlight->link;
            $combind_spotlight['type'] = 'spot';
            $combind_spotlight['updated_at'] = $spotlight->updated_at->timestamp;
            array_push($combind_spotlights, $combind_spotlight);
        }
        foreach ($combind_spotlights as $key => $value) {
            $sort_key[$key] = $value['updated_at'];
        }
        array_multisort($sort_key, SORT_DESC, $combind_spotlights);

    	return View::make('home')
            ->with('active', 'home')
    		->with('featured_products', $featured_products)
    		->with('spotlights', $combind_spotlights)
            ->with('top_banners', $top_banners)
            ->with('sl_banner', $sl_banner)
            ->with('srt_banners', $srt_banners)
            ->with('srb_banner', $srb_banner)
            ->with('designers', $designers)
            ->with('categories', $categories);
    }
}
