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

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/','PagesController@home');

Route::resource('banners','BannersController');

Route::get('{zip}/{street}', 'BannersController@show');


Route::post('{zip}/{street}/photos', 'BannersController@addPhotos')->name('addPhotos');










Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
