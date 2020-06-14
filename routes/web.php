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
Route::post('/order', 'PageController@order');
Route::get('/detail/{id}', 'PageController@detail');


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

    Route::get('/profile', 'UserController@index');
    Route::post('/profile', 'UserController@update');

    /*========================================================
      Quản lý hệ thống
      ========================================================
    */
    Route::resource('cat', 'CatController');
    Route::resource('product', 'ProductController');
    Route::resource('member', 'MemberController');
    Route::resource('order', 'OrderController');
    Route::resource('store', 'StoreController');
    Route::post('hotel/{id}/service', 'HotelController@service');
    Route::resource('post', 'PostController');
    Route::resource('service', 'ServiceController');
    Route::resource('book', 'BookController');
    Route::resource('user', 'UserController');
});
