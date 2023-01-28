<?php

use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/store', function () {
    Redis::set('bangkok', 'Krung Thep Maha Nakhon');
});

Route::get('/retrieve', function () {
    return Redis::get('bangkok');
});

Route::get('/send-mail', function () {
    Mail::to('king@king.com')->send(new TestMail);
});
