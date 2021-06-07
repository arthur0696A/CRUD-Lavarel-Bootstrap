<?php

use Illuminate\Support\Facades\Route;
use App\Models\ModelProduct;

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

Route::resource('/products/', 'App\Http\Controllers\ProductController');
Route::get('/products', 'App\Http\Controllers\ProductController@index');
Route::get('/products/{products}', 'App\Http\Controllers\ProductController@show');
Route::get("/products/{id}/edit", 'App\Http\Controllers\ProductController@edit');
Route::put("/products/{id}", 'App\Http\Controllers\ProductController@update');
Route::delete("/products/{id}", 'App\Http\Controllers\ProductController@destroy');
