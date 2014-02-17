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


Route::bind('article', function($slug) {
	return ArticleRepository::findBySlug($slug);
});

Route::resource('article', 'ArticleController');
Route::resource('channel', 'ChannelController');
Route::resource('api/article', 'Api\ArticleController');