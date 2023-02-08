<?php

use App\Helpers\Websocket;
use App\Helpers\WebSocketHandler;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SendController;
use BeyondCode\LaravelWebSockets\Facades\WebSocketsRouter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('hello');
});

Route::get('/send', SendController::class);

Route::Fallback(function() {
    return view('404');
});
