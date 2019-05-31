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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['namespace' => 'Product', 'middleware' => 'auth'], function()
{
    Route::get('products', 'ProductsController@index')->name('products.index');
    Route::get('products/get-data', 'ProductsController@getTableData')->name('products.get-data');
    Route::get('products/create', 'ProductsController@create')->name('products.create');
    Route::post('products/store', 'ProductsController@store')->name('products.store');
    Route::get('products/{id}/edit', 'ProductsController@edit')->name('products.edit');
    Route::post('products/{id}/update', 'ProductsController@update')->name('products.update');
    Route::post('products/delete', 'ProductsController@delete')->name('products.delete');
});