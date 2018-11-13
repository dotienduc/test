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
Route::get('index', 'PageController@index');
Route::get('loaisanpham/{type}', 'PageController@loaisanpham');
Route::get('detail/{id}', 'PageController@detail');
Route::get('about', 'PageController@about');
Route::get('contacts', 'PageController@contacts');
Route::get('add/{id}', 'PageController@addtocart');
Route::get('del/{id}', 'PageController@remove');
Route::get('checkout', 'PageController@getCheckout');
Route::post('checkout', 'PageController@postCheckout');
//Login
Route::get('login', 'PageController@getLogin');
Route::post('login', 'PageController@postLogin');
//Singup
Route::get('singup', 'PageController@getSingup');
Route::post('singup', 'PageController@postSingup');
Route::get('logout', 'PageController@logout');
Route::get('search', 'PageController@search');
