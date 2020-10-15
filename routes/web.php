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

Route::get('/', 'lessonscontroller@index');;

Auth::routes();


Route::get('/', 'lessonscontroller@index')->name('home');
Route::get('/lesson/{lesson}', 'LessonsController@show');

Route::post('/purchase', 'CartController@store');
Route::get('/purchase' , 'CartController@index');
Route::put('/purchase/{cartlesson}','CartController@update')->name('update');
Route::delete('/purchase/{cartlesson}','CartController@destroy')->name('delete');

Route::get('/purchase/buy', 'BuyController@index');
Route::post('/purchase/buy', 'BuyController@store');