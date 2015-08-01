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

Route::get('/airports/list', 'AirportsController@all');
Route::get('/trips/{id}/flights', 'FlightsController@flights')->where(array('id' => '[0-9]+'));
Route::post('/trips/{name?}', 'TripsController@create');
Route::put('/trips/{id}/{name}', 'TripsController@edit')->where(array(
	'id' 	=> '[0-9]+',
	'name'	=> '[\w\s-]{1,255}'
));
Route::delete('/trips/{id}/flights/{flightId}', 'FlightsController@delete')->where(array(
	'id' 	   => '[0-9]+',
	'flightId' => '[0-9]+'
));
Route::post('/trips/{id}/flights/{originId}/{destId}', 'FlightsController@addFlight')->where(array(
	'id' 	   => '[0-9]+',
	'originId' => '[0-9]+',
	'destId'   => '[0-9]+'
));

Route::delete('/trips/{id}', 'TripsController@delete')->where(array('id' => '[0-9]+'));