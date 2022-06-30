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
Route::any('/', function () {
    return view('backend.pages.home.home');
})->name('home');
Route::any('/add-admin', function () {
    return view('backend.pages.admin.add-admin');
})->name('add-admin');
Route::any('/show-admin', function () {
    return view('backend.pages.admin.show-admin');
})->name('show-admin');
Route::any('/add-technicians', function () {
    return view('backend.pages.technicians.add-technicians');
})->name('add-technicians');
Route::any('/show-technicians', function () {
    return view('backend.pages.technicians.show-technicians');
})->name('show-technicians');



Route::get('/', function () {
    return view('backend/pages/admin/add-admin');
})->name('admin');

Route::get('register_provider',function (){

    return view('register_provider');
});
Route::get('car_data',function (){

    return view('assign_cars_data');
});
