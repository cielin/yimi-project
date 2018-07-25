<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Product;

class HomeController extends Controller
{
    public function index()
    {
    	$featured_products = Product::where('is_featured', 1)
    		->orderBy('updated_at', 'desc')
    		->limit(8)
    		->get();

    	$waterfalled_products = Product::where('is_waterfalled', 1)
    		->orderBy('updated_at', 'desc')
    		->limit(300)
    		->get();

    	return View::make('home')
            ->with('active', 'home')
    		->with('featured_products', $featured_products)
    		->with('waterfalled_products', $waterfalled_products)
            ;
    }
}
