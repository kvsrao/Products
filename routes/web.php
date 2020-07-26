<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
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

Auth::routes();
Route::get('/products','ProductController@index');

Route::middleware(['auth'])->group(function () {
    
    Route::get('/product', 'ProductController@create');
    Route::post('/product-register','ProductController@store');
    Route::get('/product-edit/{id}','ProductController@edit');
    Route::get('/product-delete/{id}','ProductController@destroy');
    Route::put('/product-update/{id}','ProductController@update');

});



Route::get('/home', 'HomeController@index')->name('home');
