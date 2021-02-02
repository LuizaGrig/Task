<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/registration', 'SpaController@registration');
Route::post('/login', 'SpaController@login');
Route::post('/logout', 'SpaController@logout');
Route::post('/back', 'SpaController@back');




Route::post('/admin', 'TaskController@create')->middleware('login');
Route::get('/task', 'TaskController@getTasks');
Route::get('/tasksList', 'TaskController@getTasksList');
Route::get('/users/', 'TaskController@getUsers');
Route::post('/remove/{id}', 'TaskController@remove');
Route::post('/update/{id}', 'TaskController@update');

