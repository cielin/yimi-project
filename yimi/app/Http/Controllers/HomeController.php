<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Product;
use App\Banner;
use App\Designer;
use App\ProductCategory;

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
    		->orderBy('updated_at', 'desc')
    		->limit(8)
    		->get();

    	$waterfalled_products = Product::where('is_waterfalled', 1)
    		->orderBy('updated_at', 'desc')
    		->limit(300)
    		->get();

        $designers = Designer::orderBy('updated_at', 'desc')
            ->limit(8)
            ->get();

        $categories = ProductCategory::where('depth', 0)
            ->orderBy('name', 'asc')
            ->limit(6)
            ->get();

    	return View::make('home')
            ->with('active', 'home')
    		->with('featured_products', $featured_products)
    		->with('waterfalled_products', $waterfalled_products)
            ->with('top_banners', $top_banners)
            ->with('sl_banner', $sl_banner)
            ->with('srt_banners', $srt_banners)
            ->with('srb_banner', $srb_banner)
            ->with('designers', $designers)
            ->with('categories', $categories);
    }
}
