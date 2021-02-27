<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/thongke/top5_sanpham_moinhat', 'Api\ApiController@thongke_top5_sanpham_moinhat')->name('api.thongke.top5_sanpham_moinhat');

Route::get('/sanpham/timkiem', 'Api\ApiController@timkiemsanpham')->name('api.sanpham.timkiem');

Route::get('thongke/sanpham', 'Api\ApiController@thongke_sanpham')->name('api.thongke.sanpham');
Route::get('thongke/khachhang', 'Api\ApiController@thongke_khachhang')->name('api.thongke.khachhang');
Route::get('thongke/donhang', 'Api\ApiController@thongke_donhang')->name('api.thongke.donhang');
Route::get('thongke/loaisanpham', 'Api\ApiController@thongke_loaisanpham')->name('api.thongke.loaisanpham');
