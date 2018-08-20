<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCollection extends Model
{
    protected $table = 'product_collections';

    public function product()
    {
    	return $this->belongsTo('App\Product', 'product_id');
    }

    public function customer()
    {
    	return $this->belongsTo('App\Customer', 'customer_id');
    }
}
