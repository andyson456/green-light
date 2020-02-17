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

Route::get('get_master_responses', 'Controller@get_master_response');
Route::get('get_device_alerts', 'Controller@get_device_alerts');
Route::get('save_device_alerts', 'DensityAlertController@save');
Route::get('save_master_responses', 'MasterResponseController@save');
Route::get('addDevice', 'MasterResponseController@addDevice');
