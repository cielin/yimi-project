<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\ProductCollection;
use App\CustomerAddress;
use App\Customer;
use App\CustomerComment;
use App\Order;
use Hash;

class MyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function changePassword(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with("error", "当前密码错误，请重新输入。");
        }
        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            return redirect()->back()->with("error", "新密码不能与当前密码相同，请输出不同的新密码。");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ], [
            'new-password.min' => '新密码至少6位。',
            'new-password.confirmed' => '两次密码输入不一致。',
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success", "密码修改成功。");
    }

    public function showInfo()
    {
    	$user = Auth::user();

    	return View::make('my.info')->with('user', $user);
    }

    public function showOrders()
    {
        $user = Auth::user();
        $orders = $user->orders()->paginate(10);

    	return View::make('my.order')->with('orders', $orders);
    }

    public function showOrderDetail($order_code)
    {
        $order = Order::where('order_code', $order_code)->first();

        return View::make('my.order_detail')->with('order', $order);
    }

    public function showCollections()
    {
        $user = Auth::user();
        $collection = ProductCollection::where('customer_id', $user->id)
            ->where('type', 1)
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

    public function showChangePassword()
    {
    	return View::make('my.changepassword');
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

    public function uploadImages(Request $request)
    {
        $errcode = 0;
        $message = "success";
        $path = "";

        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'avatar' => 'required'
            ]);
            if ($validator->fails()) {
                $errcode = 1;
                $message = $validator->errors()->first();
            } else {
                if ($request->hasFile('avatar')) {
                    if ($request->file('avatar')->isValid()) {
                        $avatar = $request->file('avatar');
                        $filename = $avatar->getClientOriginalName();
                        $filename = pathinfo($filename, PATHINFO_FILENAME);
                        $len = Str::length($filename) > 5 ? 5 : Str::length($filename);
                        $filename = Str::substr($filename, 0, $len);

                        $fullname = Str::slug(Str::random(12) . '-' . $filename) . '.' . $avatar->getClientOriginalExtension();
                        $uploaded_path = $avatar->storeAs('images/avatars', $fullname);

                        $image_width = Image::make(storage_path('app/public/' . $uploaded_path))->width();
                        $image_height = Image::make(storage_path('app/public/' . $uploaded_path))->height();

                        if ($image_width > $image_height) {
                            $image = Image::make(storage_path('app/public/' . $uploaded_path))
                                ->resize(null, 64, function ($constraint) {
                                    $constraint->aspectRatio();
                                });
                            Storage::put('thumbs/avatars/thumb_' . $fullname, $image->stream()->__toString());
                        } else {
                            $image = Image::make(storage_path('app/public/' . $uploaded_path))
                                ->resize(64, null, function ($constraint) {
                                    $constraint->aspectRatio();
                                });
                            Storage::put('thumbs/avatars/thumb_' . $fullname, $image->stream()->__toString());
                        }

                        if ($uploaded_path) {
                            $path = $fullname;
                        } else {
                            $errcode = 4;
                            $message = "文件上传失败。";
                        }
                    } else {
                        $errcode = 3;
                        $message = "无效的文件。";
                    }
                } else {
                    $errcode = 2;
                    $message = "请求参数中未找到图像文件。";
                }
            }
        } else {
            $errcode = 5;
            $message = "错误的请求。";
        }

        return response()->json(array('errcode' => $errcode, 'message' => $message, 'path' => $path));
    }

    public function saveComment(Request $request)
    {
        $errcode = 0;
        $msg = "success";

        return response()->json([
            'errcode' => 0,
            'msg' => 'success'
        ]);
        
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                'content' => 'required|string|min:10|max:500'
            ]);

            if ($validator->fails()) {
                return Redirect::back()
                    ->withErrors($validator)
                    ->withInput();
            }

            try {
                $comment = new CustomerComment();
                $comment->product_id = $product_id;
                $comment->content = $content;

                $customer = Customer::find(Auth::user()->id);
                $customer->reviews()->save($comment);

                return response()->json([
                    'errcode' => 0,
                    'msg' => 'success'
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'errcode' => 1,
                    'msg' => $e->getMessage()
                ]);
            }
        } else {
            return response()->json([
                'errcode' => 2,
                'msg' => 'unauthorized'
            ]);
        }
    }

    public function saveInfo(Request $request)
    {
        $uid = $request->input('uid');
        $nickname = $request->input('nickname');
        $sex = $request->input('gender');
        $birthday = $request->input('birthday');
        $avatar = $request->input('avatar');

        if ($uid !== "") {
            $customer = Customer::find($uid);
            $customer->nickname = $nickname;
            $customer->sex = $sex;
            $customer->birthday = $birthday;
            $customer->avatar = $avatar;

            $customer->save();

            return View::make('my.info')->with('user', $customer);
        }
        else {
            return Redirect::back()->withInput();
        } 
    }
}
