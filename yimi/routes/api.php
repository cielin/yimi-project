<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Authorization, Content-Type');
header('Access-Control-Allow-Methods', '*');
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:api']], function () {
    Route::post('collect_product', 'ProductsController@collect');
    Route::post('upload_image', 'MyController@uploadImages');
    Route::post('upload_comment_image', 'MyController@uploadCommentImages');
});

Route::get('get_items', 'UtilController@getItems');
