<?php

use Illuminate\Support\Facades\Route;

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
Route::any('home', [\App\Http\Controllers\Order::class,'getorders'])->name('home');
Route::any('/add-admin', function () {
    return view('backend.pages.admin.add-admin');
})->name('add-admin');
Route::any('/show-admin',[\App\Http\Controllers\admin::class,'show_admin'])->name('show-admin');
Route::any('/add-technicians', function () {
    return view('backend.pages.technicians.add-technicians');
})->name('add-technicians');
Route::any('/show-technicians', [\App\Http\Controllers\technican::class,'show_tech'])->name('show-technicians');

Route::any('/getorders', [\App\Http\Controllers\Order::class,'getorders'])->name('getorders');


Route::any('/getorders_in_progress', [\App\Http\Controllers\Order::class,'getorders_in_progress']
)->name('getorders_in_progress');

Route::any('/getusers', [\App\Http\Controllers\customer1::class,'getusers'])->name('getusers');


Route::get('/', function () {
    return view('backend/pages/admin/add-admin');
})->name('admin');

Route::get('register_provider',function (){

    return view('register_provider');
});
Route::get('car_data',function (){

    return view('assign_cars_data');
});
