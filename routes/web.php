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
Route::get('save_master_responses', 'MasterResponseController@save');
Route::get('master_responses/get_master_responses/{id}/who_to_alert', 'MasterResponseController@showDeviceUsers');
Route::get('master_responses/{id}/edit', 'MasterResponseController@edit');
Route::patch('master_responses/{id}', 'MasterResponseController@update');

Route::get('device_alerts/get_device_alerts', 'DensityAlertController@get_device_alerts');
Route::get('save_device_alerts', 'DensityAlertController@save');


Route::get('who_to_alert/{id}/index', 'WhoToAlertController@index');
Route::get('who_to_alert/{id}/create', 'WhoToAlertController@create');
Route::post('who_to_alert/create', 'WhoToAlertController@store');
Route::get('who_to_alert/{id}/edit', 'WhoToAlertController@edit');
Route::patch('who_to_alert/{id}/index', 'WhoToAlertController@update');

Route::get('tickets/index', 'TicketController@index');
Route::get('tickets/{id}/create', 'TicketController@create');
Route::post('tickets/create', 'TicketController@store');
Route::get('tickets/{id}/edit', 'TicketController@edit');
Route::patch('tickets/index', 'TicketController@update');


Route::get('gitlab/callback', 'MasterResponseController@gitlabCallback');


//Route::resource('master_responses', 'MasterResponseController');

//Route::resource('who_to_alert', 'WhoToAlertController');
