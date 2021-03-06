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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'web'], function () {
	Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'role:admin']], function () {
		Route::resource('jabatan', 'JabatanController');
		Route::resource('karyawan', 'KaryawanController');
	});
});