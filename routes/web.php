<?php

use Illuminate\Support\Facades\Redis;

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
    Redis::publish('test-channel', json_encode(['message' => 'Hello world!']));
});

Route::get('pub', 'RedisPubController')->name('redis.pub');

Route::get('cart', 'CartController@create')->name('cart.create');
Route::post('cart', 'CartController@store')->name('cart.store');
Route::post('cart/delete', 'CartController@destroy')->name('cart.destroy');
