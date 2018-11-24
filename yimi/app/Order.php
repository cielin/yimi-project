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

	const ORDER_STATUS = array(
		'pending_payment' => '等待付款',
		'processing' => '订单处理中',
		'on_hold' => '订单挂起',
		'pending_ship' => '等待发货',
		'shipped' => '已发货',
		'cancelled' => '已取消',
		'completed' => '已完成'
	);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
    protected $table = 'orders';

	public function items()
	{
		return $this->hasMany('App\OrderItem', 'order_id');
	}

	public function customer()
	{
		return $this->belongsTo('App\Customer', 'customer_id');
	}

	public function order_status_histories()
	{
		return $this->hasMany('App\OrderStatusHistories', 'order_id');
	}

	public function reviews()
	{
		return $this->hasMany('App\CustomerComment', 'order_id');
	}
}
