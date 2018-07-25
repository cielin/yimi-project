<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSku extends Model
{
    protected $table = 'product_skus';

    public function product()
    {
    	return $this->belongsTo('App\Product', 'product_id');
    }
}
