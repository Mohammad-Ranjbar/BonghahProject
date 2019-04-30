<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;

Auth::routes();


Route::get('register/confirm/{token}','ConfirmController@confirmEmail');

Route::get('/','PagesController@home');

Route::resource('banners','BannersController');

Route::get('{zip}/{street}', 'BannersController@show');


Route::post('{zip}/{street}/photos', 'BannersController@addPhotos')->name('addPhotos');










Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
