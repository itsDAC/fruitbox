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

Route::resource('/auction', 'AuctionController');
Route::resource('/user', 'UserController');

Route::get('/login', 'AuthController@login');
Route::post('/login', 'AuthController@attempt');
Route::get('/logout', 'AuthController@logout');

// Check  if the user is logged in before allowing access to any
// of the routes in this group
Route::group(['middleware' => 'auth'], function() {
	Route::get('/', 'TestController@index');

	Route::resource('/auction', 'AuctionController');
	Route::resource('/bid', 'BidController');

});