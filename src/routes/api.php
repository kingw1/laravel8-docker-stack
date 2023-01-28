<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::resource('products', ProductController::class);
    Route::post('logout', [AuthController::class, 'logout']);
});

// test only
// Route::get('/stores', function () {
//     $product = [
//         [
//             'id' => 1,
//             'ProductName' => 'iPhone 13 Pro Max',
//             'UnitPrice' => 45000,
//             'UnitInStock' => 10,
//             'ProductPicture' => 'https://www.mxphone.com/wp-content/uploads/2021/04/41117-79579-210401-iPhone12ProMax-xl-1200x675.jpg',
//             'CreatedDate' => '2021-11-22T00:00:00',
//             'ModifiedDate' => '2021-11-22T00:00:00',
//         ],
//         [
//             'id' => 2,
//             'ProductName' => 'iPad Pro 2021',
//             'UnitPrice' => 18500,
//             'UnitInStock' => 5,
//             'ProductPicture' => 'https://cdn.siamphone.com/spec/apple/images/ipad_pro_12.9%E2%80%91inch/com_1.jpg',
//             'CreatedDate' => '2021-11-22T00:00:00',
//             'ModifiedDate' => '2021-11-22T00:00:00',
//         ],
//         [
//             'id' => 3,
//             'ProductName' => 'Airpods Pro',
//             'UnitPrice' => 12500,
//             'UnitInStock' => 8,
//             'ProductPicture' => 'https://www.avtechguide.com/wp-content/uploads/2020/11/leaked-apple-airpods-pro-generation2-info_01-800x445.jpg',
//             'CreatedDate' => '2021-11-22T00:00:00',
//             'ModifiedDate' => '2021-11-22T00:00:00',
//         ],
//     ];

//     return $product;
// });
