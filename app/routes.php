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

Route::controller('admin/work', 'AdminWorkController');
Route::controller('admin/story', 'AdminStoryController');
Route::controller('admin/collection', 'AdminCollectionController');
Route::controller('admin/gallery', 'AdminGalleryController');
Route::controller('admin', 'AdminController');
