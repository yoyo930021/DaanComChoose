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

//首頁
Route::get('/', function()
{
	$setting=Setting::find(1);
	return View::make('index')->with('settings',$setting);
});

//防xss 以及檢查來源
Route::when('*', 'csrf', array('post'));

/*========學生前端開始========*/
//登入
Route::post('/', 'StudentController@login');
//選課
Route::get('/choose','StudentController@choose');
//選課結果確認
Route::post('/choose','StudentController@wishchecked');
//選課結果
Route::get('/chooseresult','StudentController@wishresult');
//寫入選課結果
Route::post('/chooseresult','StudentController@writeresult');
//公告結果
Route::get('/result','StudentController@result');
//登出
Route::get('/logout','StudentController@logout');
/*========學生前端結束========*/

/*========後台後端開始========*/



/*========後台後端結束========*/



