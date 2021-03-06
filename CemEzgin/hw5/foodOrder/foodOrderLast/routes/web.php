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
    return view('index2');
});

Route::get('restaurant', 'RestaurantController@index');
Route::get('restaurant/{id?}', 'RestaurantController@show');
Route::get('food/{restaurantId?}', 'FoodController@index');
Route::get('order/{id?}', 'OrderController@index');
