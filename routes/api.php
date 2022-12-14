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

Route::get('/get_cars_data',[\App\Http\Controllers\cars::class,'getcar_data']);

Route::post('/add_user_car',[\App\Http\Controllers\cars::class,'addusercar']);

Route::post('/get_user_data',[\App\Http\Controllers\cars::class,'getusercars']);

Route::post('/update_order_data',[\App\Http\Controllers\Order::class,'update_order_data']);

Route::post('/getOrder_data',[\App\Http\Controllers\Order::class,'getOrder_data']);

Route::post('/getOrder_data_tech',[\App\Http\Controllers\Order::class,'getOrder_data_tech']);

Route::post('/cancel_order_tech',[\App\Http\Controllers\Order::class,'cancel_order_tech']);

Route::post('/update_price',[\App\Http\Controllers\Order::class,'update_price']);

Route::get('/order_state',[\App\Http\Controllers\Order::class,'get_order_state']);

Route::get('/get_user_cards',[\App\Http\Controllers\customer1::class,'get_user_cards']);

Route::post('/add_card',[\App\Http\Controllers\customer1::class,'register_card']);


Route::post('/getcard_data',[\App\Http\Controllers\customer1::class,'getcard_data']);

Route::post('/payed_amount',[\App\Http\Controllers\Order::class,'payed_amount']);

Route::get('/getprice',[\App\Http\Controllers\Order::class,'getprice']);

Route::get('/order_data',[\App\Http\Controllers\Order::class,'order_data']);

Route::get('/delete_over_flow_offers',[\App\Http\Controllers\Order::class,'delete_offers']);


Route::post('/register_token',[\App\Http\Controllers\customer1::class,'register_token']);


Route::get('/get_transactions',[\App\Http\Controllers\customer1::class,'get_transactions']);
Route::get('/get_current_balance',[\App\Http\Controllers\customer1::class,'get_current_balance']);


Route::post('/update_tech_location',[\App\Http\Controllers\technican::class,'update_tech_location']);



Route::post('/get_user_history',[\App\Http\Controllers\customer1::class,'get_orders']);

Route::get('/get_tech_locations',[\App\Http\Controllers\customer1::class,'get_tech_locations']);

Route::get('/get_tech_history',[\App\Http\Controllers\technican::class,'get_orders_tech']);


Route::post('/delete_card',[\App\Http\Controllers\customer1::class,'delete_card']);

Route::post('/delete_car',[\App\Http\Controllers\customer1::class,'delete_car']);

Route::get('/getvouter',[\App\Http\Controllers\customer1::class,'getvouter']);


Route::post('/add_admin',[\App\Http\Controllers\admin::class,'add_admin']);
