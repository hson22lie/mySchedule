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

Route::get('/','ScheduleController@index');

Route::post('/schedule','ScheduleController@create');
Route::get('/schedule','ScheduleController@get');
Route::delete('/schedule','ScheduleController@delete');