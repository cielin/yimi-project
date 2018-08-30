<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\ProductCollection;
use App\CustomerAddress;
use App\Customer;

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
        $user = Auth::user();
        $addresses = CustomerAddress::where('customer_id', $user->id)
            ->orderBy('updated_at', 'desc')
            ->get();

    	return View::make('my.addresses')->with('addresses', $addresses);
    }

    public function showPasswordReset()
    {
    	return View::make('my.password_reset');
    }

    public function showUnion()
    {
    	return View::make('my.union');
    }

    public function saveAddress(Request $request)
    {
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                'consignee' => 'required|string|max:255',
                'mobile' => 'required|digits:11',
                'province' => 'required',
                'city' => 'required',
                'district' => 'required',
                'address' => 'required',
                'postcode' => 'digits:6'
            ]);

            if ($validator->fails()) {
                return Redirect::back()
                    ->withErrors($validator)
                    ->withInput();
            }

            try {
                $item = new CustomerAddress();
                $item->consignee = $request->input('consignee');
                $item->mobile = $request->input('mobile');
                $item->province = $request->input('province');
                $item->city = $request->input('city');
                $item->district = $request->input('district');
                $item->address = $request->input('address');
                $item->postcode = $request->input('postcode');

                $customer = Customer::find(Auth::user()->id);
                $customer->addresses()->save($item);
                
                return redirect('my/addresses');
            }
            catch (\Exception $e) {
                return Redirect::back()
                    ->withErrors($e->getMessage())
                    ->withInput();
            }
        }
        else {
            return Redirect::back()
                ->withErrors("Unauthorized")
                ->withInput();
        }
    }

    public function destroyAddress(CustomerAddress $address)
    {
        try {
            $customer = Customer::find(Auth::user()->id);
            $customer->addresses()->delete($address);
        }
        catch (\Exception $e) {
            echo $e->getMessage();
            return;
        }

        return redirect('my/addresses');
    }

    public function uploadAvatar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nickname' => 'required|string|max:8',
            'avatar' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->responseForJson(ERR_ACCESS_DENID, $validator->errors());
        }
        $user_id = Auth::id();
        $avatar = $request->file('avatar')->store('/public/'.date('Y-m-d').'/avatars');
        $avatar = Storage::url($avatar);

        $resource = Resource::insertGetId(['type'=>1, 'resource'=>$avatar]);
        $Data=['user_id'=>$user_id,'avatar'=>$resource,'nickname'=>$request->nickname];
        try {
            $edit = UserProfile::where('user_id',$user_id)->update($Data);
            if ($edit) {
                return $this->responseForJson(ERR_OK, 'upload success');
            }
            return $this->responseForJson(ERR_CREATE, 'upload fail');
        }
        catch (\Exception $exception) {
            return $this->responseForJson(ERR_ACCESS_DENID, $exception->getMessage());
        }
    }
}
