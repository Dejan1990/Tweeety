<?php

use App\Http\Controllers\TweetController;
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
    return view('index');
});

Route::middleware('auth')->group(function () {

    Route::controller(TweetController::class)->group(function () {
        Route::get('/tweets', 'index')->name('tweets.index');
        Route::post('/tweets', 'store');
    });

});