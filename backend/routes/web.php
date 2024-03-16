<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return 'Hello, world!!!!!';
});

Route::get('/test', function () {
    return 'Hello, world!!!!!';
});

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('/signup', [RegisterController::class, 'store']);
    Route::post('/login', [RegisterController::class, 'login']);
    Route::post('/logout', [RegisterController::class, 'logout']);
});
