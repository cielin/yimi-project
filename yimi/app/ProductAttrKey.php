<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttrKey extends Model
{
	protected $table = 'product_attr_keys';

	public function attr_values()
	{
		return $this->hasMany('App\ProductAttrValue', 'product_attr_key_id');
	}
}
