<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttrValue extends Model
{
	protected $table = 'product_attr_values';

	public function attr_key()
	{
		return $this->belongsTo('App\ProductAttrKey', 'product_attr_key_id');
	}
}
