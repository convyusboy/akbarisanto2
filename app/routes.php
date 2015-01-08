<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@getHome');
Route::get('home', 'HomeController@getHome');
Route::get('dev/menu', 'HomeController@getDevMenu');
Route::get('dev/ori', 'HomeController@getDevOri');
Route::get('dev/header', 'HomeController@getDevHeader');
Route::post('mail', 'HomeController@postMail');

// Route::controller('admin/portfolio', 'PortfolioController');
// Route::controller('admin/blog', 'BlogController');
// Route::controller('admin/photo', 'PhotoController');
// Route::controller('admin', 'AdminController');
