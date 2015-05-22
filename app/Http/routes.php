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

Route::get('/auth/login', ['as' => 'login', 'uses' => 'HomeController@login']);

Route::post('/auth/login', ['as' => 'postLogin', 'uses' => 'HomeController@postLogin']);

Route::get('/auth/logout', ['as' => 'logout', 'uses' => 'HomeController@logout']);

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', ['as' => 'dashboard', 'uses' =>  'HomeController@dashboard']);

    Route::resource('/post', 'PostController');
    
});
