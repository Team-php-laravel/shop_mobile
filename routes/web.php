<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Page Routes
|--------------------------------------------------------------------------
|
|
*/

Route::get('/', 'PageController@home');
Route::get('/home', 'PageController@home');
Route::get('/sale', 'PageController@sale');
Route::get('/cat/{id}', 'PageController@cat');
Route::get('/news', 'PageController@news');
Route::get('/new-detail/{id}', 'PageController@newDetail');
Route::post('/order', 'PageController@order');
Route::get('/detail/{id}', 'PageController@detail');
Route::post('/cart', 'PageController@cart');
Route::post('/orderCart', 'PageController@orderCart');
Route::get('/cart', 'PageController@getCart');


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
|
*/

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'namespace' => 'Admin'], function () {


    Route::get('/', 'DashboardController@index');
    Route::get('/chart', 'DashboardController@show');

    Route::get('/profile', 'UserController@index');
    Route::post('/profile', 'UserController@update');

    /*========================================================
      Quản lý hệ thống
      ========================================================
    */
    Route::get('/dt', 'DashboardController@index');
    Route::resource('/export', 'ExportController');
    Route::resource('bh', 'BaoHanhController');
    Route::resource('news', 'NewController');
    Route::resource('cat', 'CatController');
    Route::resource('product', 'ProductController');
    Route::resource('member', 'MemberController');
    Route::resource('ncc', 'NccController');
    Route::resource('order', 'OrderController');
    Route::resource('store', 'StoreController');
    Route::post('hotel/{id}/service', 'HotelController@service');
    Route::resource('post', 'PostController');
    Route::resource('service', 'ServiceController');
    Route::resource('book', 'BookController');
    Route::resource('user', 'UserController');
});
