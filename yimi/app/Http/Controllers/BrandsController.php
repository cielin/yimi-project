<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Brand;
use App\Product;

class BrandsController extends Controller
{
    public function index()
    {
    	$brands = Brand::orderBy('name', 'asc')
    		->paginate(15);

    	return View::make('brands.index')
    		->with('active', 'brands')
    		->with('brands', $brands);
    }

    public function show($slug)
    {
    	$brand = Brand::where('slug', $slug)
    		->first();
		$products = Product::where('brand_id', $brand->id)
			->where('state', 'active')
    		->orderBy('updated_at', 'desc')
    		->paginate(12);

    	return View::make('brands.show')
    		->with('active', 'brands')
    		->with('brand', $brand)
    		->with('products', $products);
    }

    public function getBrandsByFirst($first)
    {
    	if (strlen($first) === 1 && ord(strtoupper($first)) > 64 && ord(strtoupper($first)) < 91) {
    		$brands = Brand::where('name', 'LIKE', $first . '%')
    			->orderBy('name', 'asc')
    			->paginate(15);

    		return View::make('brands.index')
    			->with('active', 'brands')
				->with('brands', $brands)
				->with('first', $first);
    	}
    	else {
    		return redirect()->route('brands.index');
    	}
    }
}
