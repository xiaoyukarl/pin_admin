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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {

    $redis = app('redis.connection');
    var_dump($redis->get('cityInfo'),\Illuminate\Support\Str::slug(env('APP_NAME', 'laravel'), '_').'_database_');
});


Route::group([ 'prefix' => 'back', 'as' => 'back.','namespace' => 'Back'], function () {

    Route::get('login', 'securityController@showLoginForm')->name('login.show');
    Route::post('login', 'securityController@login')->name('login.post');
    Route::get('logout', 'securityController@logout')->name('logout');

});

Route::group([ 'prefix' => 'back', 'middleware' => ['admin','permission'],'as' => 'back.','namespace' => 'Back'], function () {

    Route::get('index', 'IndexController@index')->name('index.index');
    Route::get('index/env', 'IndexController@env')->name('index.env');

    Route::resource('module', 'ModuleController');
    Route::get('module/delete/{id}', 'ModuleController@delete')->name('module.delete');
    Route::resource('module_value', 'ModuleValueController');
    Route::get('module_value/delete/{id}', 'ModuleValueController@delete')->name('module_value.delete');
    Route::resource('admin', 'AdminController');
    Route::resource('roles', 'RolesController');
    Route::resource('city', 'CityController');
    Route::resource('setting', 'SettingController');
    Route::resource('order', 'OrderController');
    Route::get('order/enable/{id}', 'OrderController@enable')->name('order.enable');
    Route::resource('banner', 'BannerController');


});