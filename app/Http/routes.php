<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::auth();

Route::get('/auth/login','Auth\AuthController@showLoginForm');

Route::get('/home', 'ProductController@index');

Route::resource('product','ProductController');

Route::get('/profile', 'ProfileController@getProfile');

Route::resource('editProfile', 'ProfileController', array('only' => array('edit', 'update')));

Route::get('/cart','CartController@index');

Route::get('/about','HomeController@about');
