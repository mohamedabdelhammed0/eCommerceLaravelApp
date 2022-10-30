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




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/products','ProductsController');
Route::resource('/categories','CategoriesController');
Route::post('/add-to-cart/{product}','CartController@add')->name('cart.add');
Route::get('/cart','CartController@index')->name('cart.index');
Route::get('/cart-cancel/{id}','CartController@cancel')->name('cart.cancel');
Route::get('/show/{product}','ProductsController@categoryShow')->name('products.category');
Route::resource('/orders','OrderController');
Route::get('/order/{id}', 'OrderController@show')->name('order.show');
Route::POST('/order/{id}', 'OrderController@destroy')->name('order.destroy');
Route::get('/','KeswaController@index')->name('kewsa');
Route::post('/size/{product}','KeswaController@updateSize')->name('update.size');
Route::get('/add/qty', 'QuantityController@create')->name('quantity.add');

