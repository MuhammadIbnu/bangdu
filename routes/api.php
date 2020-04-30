<?php

use Illuminate\Http\Request;

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
Route::get('semua_berkas','api\BerkasController@index');
Route::post('aktivasi','api\WarisController@aktivasi');
Route::post('berkas','api\BerkasController@berkas')->middleware('auth:api_waris');



Route::group(['prefix' => 'waris'], function () {
    Route::post('register', 'api\auth\AuthWaris\RegisterController@register');
    Route::post('login', 'api\auth\AuthWaris\LoginController@login');
    Route::get('me','api\WarisController@me')->middleware('auth:api_waris');
});
Route::group(['prefix' => 'petugas'], function () {
    Route::post('login', 'api\auth\AuthPetugas\LoginController@login');
    Route::get('berkasBaru', 'Api\BerkasController@dataMasuk')->middleware('auth:api_petugas');
    Route::post('berkas/{data}', 'Api\BerkasController@confirmed_I')->middleware('auth:api_petugas');
    Route::post('acc/{data}', 'Api\BerkasController@confirmed_III')->middleware('auth:api_petugas');
    
});
Route::group(['prefix' => 'dinkes'], function () {
    Route::post('login', 'api\auth\AuthDinkes\LoginController@login');
    Route::post('berkas/{data}', 'Api\BerkasController@confirmed_II')->middleware('auth:api_dinkes');
});