<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductCategory;
use Illuminate\Support\Facades\View;

class ProductsController extends Controller
{
    public function index()
    {
    	return redirect()->route('categories.index');
    }

    public function show($slug)
    {
    	$product = Product::where('slug', $slug)->first();
        $featured_products = Product::where('is_featured', 1)
            ->where('id', '<>', $product->id)
            ->orderBy('updated_at', 'desc')
            ->limit(8)
            ->get();

    	return View::make('products.show')
            ->with('active', 'categories')
    		->with('product', $product)
            ->with('featured_products', $featured_products);
    }

    public function collect($id)
    {
        
    }
}
