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

//Route::any('sendverficationcode/{phonenumber}','App\Http\Controllers\customer1@sendverficationcode');
