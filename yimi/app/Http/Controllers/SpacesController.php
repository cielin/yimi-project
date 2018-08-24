<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\ProductAttrKey;
use App\ProductAttrValue;
use App\ProductAttribute;
use App\Product;
use App\Brand;

class SpacesController extends Controller
{
	public function index()
	{
		$attr_key = ProductAttrKey::where('name', '空间')
			->where('status', 1)
			->first();
		$attr_values = array();
		foreach ($attr_key->attr_values as $attr_value) {
			array_push($attr_values, $attr_value->value);
		}

		$products = Product::orderBy('updated_at', 'desc')
			->paginate(15);

		return View::make('spaces.index')
			->with('active', 'spaces')
			->with('spaces', array_unique($attr_values))
			->with('products', $products);
	}

	public function show($space)
	{
		$attr_key = ProductAttrKey::where('name', '空间')
			->where('status', 1)
			->first();
		$attr_values = array();
		foreach ($attr_key->attr_values as $attr_value) {
			array_push($attr_values, $attr_value->value);
		}

		$sel_attr_values = ProductAttrValue::where('value', $space)
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

			$products = Product::whereIn('id', $product_ids)
				->orderBy('updated_at', 'desc')
				->paginate(15);

			return View::make('spaces.index')
				->with('active', 'spaces')
				->with('spaces', array_unique($attr_values))
				->with('sel_space', $space)
				->with('products', $products);
		}
		else {
			return View::make('spaces.index')
				->with('active', 'spaces')
				->with('spaces', array_unique($attr_values))
				->with('sel_space', $space);
		}
	}
}
