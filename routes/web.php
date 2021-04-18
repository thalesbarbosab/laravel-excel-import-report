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

Route::get('/', function () {
    return view('welcome');
});

Route::get('customers/report/{customer?}','CustomerController@report')->name('customers.report');
Route::get('customers/import','CustomerController@import')->name('customers.import');
Route::post('customers/store-import','CustomerController@storeImport')->name('customers.storeImport');
Route::resource('customers','CustomerController');
