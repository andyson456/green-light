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

Route::get('master_responses/get_master_responses', 'MasterResponseController@get_master_response');
Route::get('device_alerts/get_device_alerts', 'DensityAlertController@get_device_alerts');
Route::get('save_device_alerts', 'DensityAlertController@save');
Route::get('save_master_responses', 'MasterResponseController@save');
//Route::get('master_responses/{id}/edit', 'MasterResponseController@edit');

Route::resource('master_responses', 'MasterResponseController');
