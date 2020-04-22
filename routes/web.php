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
    return redirect('login');
});
//ketika ada yang redirect ke registrasi maka akan diarahkan ke login

Route::match(['get','post'],'/register',function(){
    return redirect('login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('user', 'UserController');
//petugas
Route::resource('petugas', 'PetugasController')->except(['show']);
//dinkes
Route::resource('dinkes', 'dinkesController')->except(['show']);
//bakuda
Route::resource('bakuda', 'BakudaController')->except(['show']);
//aktivitas
Route::resource('aktivitas','AktivitasController');
//report_berkas
Route::resource('report_data', 'ReportBerkas');

});