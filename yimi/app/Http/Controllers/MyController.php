<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

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
    	return View::make('my.collection');
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
