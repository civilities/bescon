<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//权限路由
Auth::routes();

//前台路由
Route::get('/home', 'HomeController@index');

//资源路由
//Route::resource('','');

//后台路由
Route::group(['prefix'=>'admin'],function()
{
    Route::get('/', function() {
        return view('admin.index');
    });
    Route::resource('admin', 'AdminController');
//    Route::resource('goods', 'GoodsController');
});





