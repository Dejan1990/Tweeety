<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TweetLikeController;

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

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile/{user:username}', 'show')->name('profile');
        Route::get('/profile/{user:username}/edit', 'edit')->name('profile.edit')->middleware('can:edit,user');
        Route::put('/profile/{user:username}/update', 'update')->name('profile.update');
    });

    Route::post('/profiles/{user}/follow', FollowController::class)->name('follow');

    Route::get('explore', ExploreController::class)->name('explore');

    Route::controller(TweetLikeController::class)->group(function () {
        Route::post('/tweets/{tweet}/like', 'store');
        Route::delete('/tweets/{tweet}/like', 'destroy');
    });

});



