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




Route::get('getusers','App\Http\Controllers\customer1@getusers');

Route::post('register','App\Http\Controllers\customer1@register');

Route::post('verfiy_otp','App\Http\Controllers\customer1@verfiy_otp');

Route::post('change_name','App\Http\Controllers\customer1@change_name');

Route::post('session','App\Http\Controllers\customer1@session');

Route::post('payment','App\Http\Controllers\payment@payment');

Route::post('create_order','App\Http\Controllers\Order@create');

Route::post('technican_offer','App\Http\Controllers\Order@technican_offer');

Route::get('getoffers','App\Http\Controllers\Order@getoffers');

Route::post('register_provider','App\Http\Controllers\technican@add_new_provider');

Route::post('/store-image',[\App\Http\Controllers\technican::class,'add_new_provider']);

Route::post('/provider_login',[\App\Http\Controllers\technican::class,'provider_login']);

Route::post('/session_provider',[\App\Http\Controllers\technican::class,'session']);

Route::post('/car_data',[\App\Http\Controllers\technican::class,'cardata']);


Route::post('/getrequests',[\App\Http\Controllers\Order::class,'getrequests']);

Route::post('/send_offer',[\App\Http\Controllers\Order::class,'send_offer']);

Route::post('/cancel_order',[\App\Http\Controllers\Order::class,'cancel_order']);

Route::get('/get_cars_data',[\App\Http\Controllers\Order::class,'getcar_data']);


//Route::any('sendverficationcode/{phonenumber}','App\Http\Controllers\customer1@sendverficationcode');
