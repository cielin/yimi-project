<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	/**
	 * Constants status
	 */
	const PENDING_PAYMENT = "pending_payment";
	const PROCESSING = "processing";
	const ON_HOLD = "on_hold";
	const PENDING_SHIP = "pending_ship";
	const SHIPPED = "shipped";
	const CANCELLED = "cancelled";
	const COMPLETED = "completed";

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
    protected $table = 'orders';

    public function trade()
    {
    	return $this->belongsTo('App\Trade', 'trade_id');
    }
}
