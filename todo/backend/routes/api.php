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

Route::group(['middleware' => ['api']], function () {
    Route::post('todos', 'TodoController@create');
    Route::get('todos', 'TodoController@fetch');
    Route::get('todos/{todoId}', 'TodoController@fetchOne');
    Route::delete('todos/{todoId}', 'TodoController@delete');
    Route::patch('todos/{todoId}', 'TodoController@update');
});