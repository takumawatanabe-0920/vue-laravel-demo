<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return 'Hello, World!!!';
});

Route::group([
    "prefix" => "tasks"
], function () {
    Route::get('/', 'App\Http\Controllers\TaskController@index');
    Route::post('/', 'App\Http\Controllers\TaskController@store');
    Route::get('/{taskId}', 'App\Http\Controllers\TaskController@show');
    Route::put('/{taskId}', 'App\Http\Controllers\TaskController@update');
    Route::delete('/{taskId}', 'App\Http\Controllers\TaskController@destroy');
});
