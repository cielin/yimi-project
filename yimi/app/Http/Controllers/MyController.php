<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\ProductCollection;

class MyController extends Controller
{
    public function showInfo()
    {
    	$user = Auth::user();

    	return View::make('my.info')->with('user', $user);
    }

    public function showOrders()
    {
    	return View::make('my.order');
    }

    public function showCollections()
    {
        $user = Auth::user();
        $collection = ProductCollection::where('customer_id', $user->id)
            ->where('status', 1)
            ->paginate(9);

    	return View::make('my.collection')->with('collection', $collection);
    }

    public function showComments()
    {
    	return View::make('my.comments');
    }

    public function showMessages()
    {
    	return View::make('my.messages');
    }

    public function showAddresses()
    {
    	return View::make('my.addresses');
    }

    public function showPasswordReset()
    {
    	return View::make('my.password_reset');
    }

    public function showUnion()
    {
    	return View::make('my.union');
    }
}
