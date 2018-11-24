<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Customer;
use App\ProductCollection;
use App\CustomerComment;

class CustomerController extends Controller
{
    public function doSignin(Request $request)
    {
    	$refer = $request->input('refer');
    	$credentials = $request->only('email', 'password');
		$remember_me = 'on';

		try {
			if (Auth::attempt($credentials)) {
				if (isset($refer) && $refer != "") {
					return redirect()->to($refer);
				}
				else {
					return redirect()->intended('/');
				}
			}

			return redirect()->intended('/');
			// return Redirect::route('admin.products.index');
		}
		catch (Exception $e) {
			echo var_dump($e);
		}
    }

    public function doSignout()
    {
    	Auth::logout();

    	return redirect()->intended('/');
    }

    public function doRegister(Request $request)
    {
        $refer = $request->input('refer');
        if (!isset($refer) || $refer == '') {
            $refer = env('SITE_BASE_URL');
        }

    	$validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
        	foreach ($validator->errors()->all() as $error) {
                echo $error;
            }
        }

        $customer = Customer::create(request(['nickname', 'email', 'password']));
        $customer->setToken();
        $customer->save();

        auth()->login($customer);

        return redirect()->to($refer);
    }

    public static function isCollected($uid, $pid, $type)
    {
        $collect = ProductCollection::where('customer_id', $uid)
            ->where('product_id', $pid)
            ->where('type', $type)
            ->where('status', 1)
            ->first();

        if ($collect !== null) {
            return true;
        }
        else {
            return false;
        }
    }

    public static function isReviewed($uid, $oid, $pid)
    {
        $review = CustomerComment::where('customer_id', $uid)
            ->where('order_id', $oid)
            ->where('product_id', $pid)
            ->first();

        if ($review !== null) {
            return true;
        }
        else {
            return false;
        }
    }
}
