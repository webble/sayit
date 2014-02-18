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



Route::get('/', function() {

	// GET
//	$response = API::get('http://localhost/sayit/public/api/article?' . http_build_query(array(
//		'with' => 'user, channel',
//		'search' => '@boy',
//	)));
//	dd($response);

	// POST
	$response = API::post('http://localhost/sayit/public/api/article', array(
		'user' => 'boy@swis.nl',
		'title' => 'Test via remote request',
		'markdown' =>
<<<EOT
# Een test titel
Gewone tekst
EOT
	));

	dd($response);

});