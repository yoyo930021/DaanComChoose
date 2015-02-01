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

Route::get('/', function()
{
	$setting=Setting::find(1);
	return View::make('index')->with('settings',$setting);
});
Route::post('/', 'StudentController@login');

Route::get('/choose','StudentController@choose');

Route::get('/logout','StudentController@logout');

