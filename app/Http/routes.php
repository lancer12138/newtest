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

// Route::get('/', 'WelcomeController@index');

// Route::get('home', 'HomeController@index');

Route::get('/','HomeController@index');
Route::get('pages/{id}','PagesController@show');
Route::post('comment/store','CommentsController@store');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// Route::get('auth/login','Auth\AuthController@getLogin');
// Route::get('auth/login','Auth\AuthController@postLogin');
// Route::get('auth/logout','Auth\AuthController@getLogout');

Route::group(['prefix' => 'admin','namespace' => 'Admin','middleware' => 'auth'], function(){

	Route::get('/','AdminHomeController@index');
	Route::resource('pages','PagesController');
	Route::resource('comments','CommentsController');
	Route::resource('articles','ArticlesController');
});