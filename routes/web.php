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

// One line route syntax
Route::view('/', 'home');
Route::view('contact', 'contact');
Route::view('about-us', 'about');
Route::get('customers', 'CustomersController@index');
Route::get('customers/create', 'CustomersController@create');
Route::post('customers', 'CustomersController@store');
Route::get('customers/{customer}','CustomersController@show');
Route::get('customers/{customer}/edit','CustomersController@edit');
Route::patch('customers/{customer}','CustomersController@update');



Route::get('items', 'ItemsController@index');
Route::get('items/create', 'ItemsController@create');
Route::post('items', 'ItemsController@store');
Route::get('items/{item}', 'ItemsController@show');
Route::get('items/{item}/edit', 'ItemsController@edit');
Route::patch('items', 'ItemsController@update');
Route::delete('items', 'ItemsController@destroy');

