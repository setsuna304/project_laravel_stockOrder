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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/storehouse', 'HomeController@index')->name('home');
Route::resource('/', 'ListorderController');
Route::resource('/backoffice', 'StockorderController');
Route::resource('/basket', 'BasketCController');
Route::resource('/payorder', 'PayController');
Route::get('/auth/facebook','FacebookAuthController@redirect');
Route::get('/auth/facebook/callback','FacebookAuthController@handleFacebookCallback');