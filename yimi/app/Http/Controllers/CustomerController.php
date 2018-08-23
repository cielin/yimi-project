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
    	$nickname = $request->input('nickname');
    	$email = $request->input('email');
    	$password = $request->input('password');
    	$password_confirmation = $request->input('password_confirmation');

    	$validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
        	foreach ($validator->errors()->all() as $error) {
                echo $error;
            }
        }

        return;
        
    	// return Customer::create([
     //        'email' => $data['email'],
     //        'password' => Hash::make($data['password']),
     //    ]);
    }

    public static function isCollected($uid, $pid)
    {
        $collect = ProductCollection::where('customer_id', $uid)
            ->where('product_id', $pid)
            ->where('status', 1)
            ->first();

        if ($collect !== null) {
            return true;
        }
        else {
            return false;
        }
    }
}
