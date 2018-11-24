<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductCategory;
use App\Customer;
use App\ProductCollection;
use App\Spotlight;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function index()
    {
    	return redirect()->route('categories.index');
    }

    public function show($slug)
    {
    	$product = Product::where('slug', $slug)->first();
        $featured_products = Product::where('is_featured', 1)
            ->where('id', '<>', $product->id)
            ->where('state', 'active')
            ->orderBy('updated_at', 'desc')
            ->limit(8)
            ->get();

    	return View::make('products.show')
            ->with('active', 'categories')
    		->with('product', $product)
            ->with('featured_products', $featured_products);
    }

    protected function MakeSign($data = '', $secret = '')
    {
        ksort($data);
        $buff = "";
        foreach ($data as $k => $v)
        {
            if ($k != "sign") {
                $buff .= $k . "=" . $v . "&";
            }
        }
        $string = trim($buff, "&");
        $string = $string . "&secret=" . $secret;
        $string = md5($string);
        $result = strtoupper($string);

        return $result;
    }

    protected function isValidTimeStamp($timestamp)
    {
        return ((string) (int) $timestamp === $timestamp) 
            && ($timestamp <= PHP_INT_MAX)
            && ($timestamp >= ~PHP_INT_MAX);
    }

    public function collect(Request $request)
    {
        $secret = "f0842b09ad765c3daee190fd90a6e6ef";
        $private_key = config('apisec.private_key');
        $sign = $request->input('sign');
        $errcode = 0;
        $message = "success";
        $action = "collected";

        openssl_private_decrypt(base64_decode($sign), $token, $private_key); 

        if ($token != $this->MakeSign($request->all(), $secret)) {
            $errcode = 1;
            $message = "Token校验失败";
        }

        $id = $request->input('id');
        $type = $request->input('type');
        $client_t = $request->input('timestamp');
        $server_t = time();
        if (!$this->isValidTimeStamp($client_t) || (int)$server_t - (int)$client_t < 0 || (int)$server_t - (int)$client_t > 5000) {
            $errcode = 2;
            $message = "请求超时";
        }

        $user = Auth::user();
        if ($user === null) {
            $errcode = 3;
            $message = "用户未登录";
        }

        if ($type == 1) {
            $product = Product::where('id', $id)->first();
            if ($product === null) {
                $errcode = 4;
                $message = "无法获取该ID对应的商品";
            }

            $product_collection = ProductCollection::where('product_id', $product->id)
                ->where('customer_id', $user->id)
                ->first();
            if ($product_collection === null) {
                try {
                    $product_collection = new ProductCollection();
                    $product_collection->product_id = $product->id;
                    $product_collection->customer_id = $user->id;
                    if ($product->state === "active") {
                        $product_collection->is_active = 1;
                    } else {
                        $product_collection->is_active = 0;
                    }
                    $product_collection->product_title = $product->name;
                    $product_collection->product_featured_image = $product->featured_image;
                    $product_collection->type = 1;

                    $product_collection->save();
                } catch (Exception $e) {
                    $errcode = 5;
                    $message = $e->message();
                }
            } else {
                try {
                    if ($product_collection->status === 1) {
                        $product_collection->status = 0;
                        $action = "removed";
                    } else {
                        $product_collection->status = 1;
                    }

                    $product_collection->save();
                } catch (Exception $e) {
                    $errcode = 5;
                    $message = $e->message();
                }
            }
        }
        else {
            $spot = Spotlight::where('id', $id)->first();
            if ($spot === null) {
                $errcode = 4;
                $message = "无法获取该ID对应的好物";
            }

            $product_collection = ProductCollection::where('product_id', $spot->id)
                ->where('customer_id', $user->id)
                ->first();
            if ($product_collection === null) {
                try {
                    $product_collection = new ProductCollection();
                    $product_collection->product_id = $spot->id;
                    $product_collection->customer_id = $user->id;
                    $product_collection->is_active = 1;
                    $product_collection->product_title = $spot->title;
                    $product_collection->product_featured_image = $spot->image;
                    $product_collection->type = 2;

                    $product_collection->save();
                } catch (Exception $e) {
                    $errcode = 5;
                    $message = $e->message();
                }
            } else {
                try {
                    if ($product_collection->status === 1) {
                        $product_collection->status = 0;
                        $action = "removed";
                    } else {
                        $product_collection->status = 1;
                    }

                    $product_collection->save();
                } catch (Exception $e) {
                    $errcode = 5;
                    $message = $e->message();
                }
            }
        }

        $result = array('errcode' => $errcode, 'message' => $message, 'action' => $action);
        return json_encode($result);
    }
}
