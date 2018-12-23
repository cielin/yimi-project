<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    protected $table = 'notify';

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id');
    }
	
}
