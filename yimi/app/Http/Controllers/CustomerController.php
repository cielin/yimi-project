<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

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
					return redirect()->intended('home');
				}
			}

			return redirect()->intended('welcome');
			// return Redirect::route('admin.products.index');
		}
		catch (Exception $e) {
			echo var_dump($e);
		}
    }
}
