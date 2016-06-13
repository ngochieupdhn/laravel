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

// product
Route::any('/',  ['middleware' => 'auth', 'uses' => 'AdminController@index']);
Route::any('/admin/add',  ['middleware' => 'auth', 'uses' => 'AdminController@add']);


// category
Route::any('/category',  ['middleware' => 'auth', 'uses' => 'CategoryController@index']);
Route::any('/category/add',  ['middleware' => 'auth', 'uses' => 'CategoryController@add']);
Route::any('/category/edit/{id}',  ['middleware' => 'auth', 'uses' => 'CategoryController@edit']);

// user
Route::any('/user',  ['middleware' => 'auth', 'uses' => 'UserController@index']);
Route::any('/user/add',  ['middleware' => 'auth', 'uses' => 'UserController@add']);
Route::any('/user/edit/{id}',  ['middleware' => 'auth', 'uses' => 'UserController@edit']);

// view login
Route::get('login', function() {
  return view('login');
});

// post to login
Route::post('login', 'UserController@login');

// logout
Route::get('logout', 'UserController@logout');