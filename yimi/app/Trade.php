<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
    protected $table = 'trades';

    public function orders()
    {
    	return $this->hasMany('App\Order', 'trade_id');
    }

    public function customer()
    {
    	return $this->belongsTo('App\Customer', 'customer_id');
    }
}
