<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return Auth::user() ? redirect('/home') : view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('auth/{provider}', 'App\Http\Controllers\Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'App\Http\Controllers\Auth\LoginController@handleProviderCallback');

Route::get('profile/{id}', 'App\Http\Controllers\ProfileController@show')->name('profile');

// create post (open the form)
Route::get('posts/create', function() {
    return view('create_post');
})->name('create_post');

// store post
Route::post('posts/', 'App\Http\Controllers\PostController@store')->name('store_post');

Route::delete('posts/{id}', 'App\Http\Controllers\PostController@destroy')->name('destroy_post');

Route::get('profile/{id}/edit', 'App\Http\Controllers\ProfileController@edit')->name('edit_profile');

Route::put('profile/{id}', 'App\Http\Controllers\ProfileController@update');
