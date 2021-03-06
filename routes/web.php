<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;//lo agregue yo porque daba error abajo al no estar definido

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

Route::get('/', 'MainController@index')->name('main');
Route::resource('products','ProductController');
//Route::get('products', 'ProductController@index')->name('products.index');

//Route::get('products/create', 'ProductController@create')->name('products.create');
Route::resource('products.carts','ProductCartController')->only(['store','destroy']);
Route::resource('carts','CartController')->only(['index']);
Route::resource('orders','OrderController')->only(['create','store']);
Route::resource('orders.payments','OrderPaymentController')->only(['create','store']);
//Route::post('products', 'ProductController@store')->name('products.store');
//Route::get('products/{product}','ProductController@show')->name('products.show');
//Route::get('products/{product:title}','ProductController@show')->name('products.show'); en caso de querer buscar por el titulo
//Route::get('products/{product}/edit', 'ProductController@edit')->name('products.edit');

//Route::match(['put','patch'],'products/{product}', 'ProductController@update')->name('products.update');

//Route::delete('products/{product}','ProductController@destroy')->name('products.destroy');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
