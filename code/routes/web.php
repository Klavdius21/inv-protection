<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\MenuController;
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

Route::get('/', function (){
    return view('hello');
});
/*Route::get('/news', NewsController::class)->name('NewsHomepage');
Route::get('/hello', [MenuController::class, 'hello'])->name('hello');
Route::get('/home', [MenuController::class, 'home'])->name('home');
Route::get('/', MenuController::class)->name('Homepage');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news{id}');

Route::Fallback(function(){
    return view('404');
}
);*/
