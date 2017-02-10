<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


$router->group(['prefix' => 'work'], function($router){
	$router->get('/', function(){
		return view('welcome');
	});

	$router->get('/add', function(){
		return view('welcome');
	});

	$router->get('/sendweekwork', function(){
		return view('welcome');
	});

	$router->get('/lists', [
		'uses' => 'WorkController@lists'
	]);

	$router->get('/recentlists', [
		'uses' => 'WorkController@recentLists'
	]);
});

$router->resource('work', 'WorkController', [
	'only' => ['store']
]);


Route::resource('article', 'ArticlesController');