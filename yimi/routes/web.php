<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('test', function(){
	return view('test');
});

Route::get('/', 'HomeController@index');

Route::get('signin', array('as' => 'signin.get', 'uses' => 'CustomerController@signin'));
Route::post('signin', array('as' => 'signin.post', 'uses' => 'CustomerController@doSignin'));
Route::get('signout', array('as' => 'signout', 'uses' => 'CustomerController@doSignout'));
Route::get('register', array('as' => 'register.get', 'uses' => 'CustomerController@register'));
Route::post('register', array('as' => 'register.post', 'uses' => 'CustomerController@doRegister'));

Route::get('brands/f/{first}', 'BrandsController@getBrandsByFirst');
Route::get('search', 'ProductCategoriesController@search');
Route::post('search', array('as' => 'categories.search', 'uses' => 'ProductCategoriesController@search'));

Route::resource('products', 'ProductsController');
Route::resource('categories', 'ProductCategoriesController');
Route::resource('brands', 'BrandsController');
Route::resource('designers', 'DesignersController');
Route::resource('articles', 'ArticlesController');

Route::get('login', 'HomeController@index')->name('login');

Route::middleware(['auth'])->group(function() {
	Route::get('my/info', 'MyController@showInfo');
	Route::get('my/orders', 'MyController@showOrders');
	Route::get('my/collections', 'MyController@showCollections');
	Route::get('my/comments', 'MyController@showComments');
	Route::get('my/messages', 'MyController@showMessages');
	Route::get('my/addresses', 'MyController@showAddresses');
	Route::get('my/password_reset', 'MyController@showPasswordReset');
	Route::get('my/union', 'MyController@showUnion');
});
