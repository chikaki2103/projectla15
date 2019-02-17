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

// Route::get('/welcome', function(){
// 	Cart::add('192ao12', 'Product 1', 1, 9.99);
// 	Cart::add('1239ad0', 'Product 2', 2, 5.95, ['size' => 'large']);
// 	return view('welcome');

// });
Route::post('/welcomestore','AdminController@store');


Route::prefix('/')->group(function () {
	Route::get('/', 'ShopController@index')->name('realpage');
	Route::get('/quickview/{id}', 'ShopController@modaladd');
	Route::post('/add2cart/{id}', 'ShopController@add2cart');
	Route::post('/delete-cart/{id}', 'ShopController@destroy');
	Route::get('/detail/{id}', 'ShopController@detail');
	Route::get('/shoppingcart', 'ShopController@shopcart');
	Route::get('/updatecart/{id}', 'ShopController@update');
	Route::post('/getcl', 'ShopController@getcl');
	Route::post('/getquan', 'ShopController@getquantity');
	Route::post('/order', 'ShopController@order');
});


Route::prefix('user')->group(function () {
	Auth::routes();
	Route::get('/home', 'HomeController@index')->name('home');

});

Route::prefix('admin')->group(function () {
	//Auth::routes();
	// Route::get('/home', 'HomeController@index')->name('home');
	// Route::resource('/admin','AdminController'); 

	//login logout
	// Route::get('/login', function () {
 //    return view('admin-auth.login');
	// });
	Route::get('login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'AuthAdmin\LoginController@login');
    Route::post('logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');

	Route::get('/home', 'AdminController@index')->name('adminhome');
	// Route::post('login', 'AuthAdmin\LoginController@login');
	// Route::post('logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');
	// register
	Route::get('register', 'AuthAdmin\RegisterController@showRegistrationForm')->name('admin.register');
	Route::post('register', 'AuthAdmin\RegisterController@register');
	
	//user
	Route::resource('/user','UserController'); 
	
	// Route::get('/user', 'UserController@index');	
	Route::post('/userajax', 'UserController@getlist');	
	//enduser
	//bill
	Route::get('/bill', 'BillController@index')->name('bill.index');
	Route::get('/delbill/{id}', 'BillController@delbill');	
	Route::post('/billtable', 'BillController@getlist');
	Route::get('/checkbill/{id}', 'BillController@check');
	Route::get('/process/{id}', 'BillController@process');
	Route::get('/statistic', 'BillController@statistic');
	//product
	Route::get('/product', 'ProductController@index');
	Route::get('/product/create', 'ProductController@create');
	Route::post('/productajax', 'ProductController@productList');
	Route::post('/product/store', 'ProductController@store');
	Route::delete('/product/{id}', 'ProductController@destroy');
	Route::get('/product/{id}/edit', 'ProductController@edit');
	Route::post('/product/update', 'ProductController@update');

	Route::get('/product-detail/{id}', 'ProductDetailController@prodeList');
	Route::post('/product-detail-ajax', 'ProductDetailController@prodeList');
	Route::post('/product-detail/store', 'ProductDetailController@store');
	Route::get('/product-detail/{id}/edit', 'ProductDetailController@edit');
	Route::post('/product-detail/update/{id}', 'ProductDetailController@update');
	Route::delete('/product-detail/delete/{id}', 'ProductDetailController@destroy');
	// Route::get('/product/{id}/edit', 'ProductController@editt');			
	//endproduct
		
});

