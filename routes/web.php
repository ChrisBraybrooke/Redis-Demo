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





  
    // Redis::set('user-1', json_encode(['name' => 'Christian Braybrooke', 'email' => 'chris@purplemountmedia.com']));

   // Redis::rpush('scores', json_encode(['user' => 1, 'score' => 4]));
    // return Redis::lrange('scores', 1, 1);
    // Redis::publish('test-channel', json_encode(['message' => request()->message]));
});
