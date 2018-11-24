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
			
		$all_brands = Brand::orderBy('name', 'asc')->get();

    	return View::make('brands.index')
    		->with('active', 'brands')
			->with('brands', $brands)
			->with('all_brands', $all_brands);
    }

    public function show($slug)
    {
    	$brand = Brand::where('slug', $slug)
    		->first();
		$products = Product::where('brand_id', $brand->id)
			->where('state', 'active')
    		->orderBy('updated_at', 'desc')
    		->get();

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

			$all_brands = Brand::where('name', 'LIKE', $first . '%')
				->orderBy('name', 'asc')
				->get();

    		return View::make('brands.index')
    			->with('active', 'brands')
				->with('brands', $brands)
				->with('first', $first)
				->with('all_brands', $all_brands);
    	}
    	else {
    		return redirect()->route('brands.index');
    	}
    }
}
