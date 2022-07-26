<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

// Routes for guests
Route::get('/', function () {
    return Auth::user() ? redirect('/home') : view('welcome');
});

Auth::routes();

Route::get('auth/{provider}', 'App\Http\Controllers\Auth\LoginController@redirectToProvider');

Route::get('auth/{provider}/callback', 'App\Http\Controllers\Auth\LoginController@handleProviderCallback');

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Routes for authenticated user
Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'App\Http\Controllers\HomeController@index')
        ->name('home');

    Route::get('profile/{id}', 'App\Http\Controllers\ProfileController@show')
        ->name('profile');

    Route::get('profile/{id}/edit', 'App\Http\Controllers\ProfileController@edit')
        ->name('edit_profile');

    Route::put('profile/{id}', 'App\Http\Controllers\ProfileController@update');

    Route::post('search', 'App\Http\Controllers\SearchController@searchUser')
        ->name('search_user');

    Route::post('posts/like/{post_id}', 'App\Http\Controllers\LikeController@like');

    Route::post('follow/{user_id}', 'App\Http\Controllers\FollowController@follow')
        ->name('follow_user');
});

// Routes for auth user with verified email address
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('posts/create', 'App\Http\Controllers\PostController@create')
        ->name('create_post');

    Route::post('posts/', 'App\Http\Controllers\PostController@store')
        ->name('store_post');

    Route::delete('posts/{id}', 'App\Http\Controllers\PostController@destroy')
        ->name('destroy_post');
});


