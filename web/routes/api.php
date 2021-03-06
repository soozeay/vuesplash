<?php

use Illuminate\Support\Facades\Auth;
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

Route::post('/register', 'Auth\RegisterController@register')->name('register');

Route::post('/login', 'Auth\LoginController@login')->name('login');

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/user', function() {
  return Auth::user();
})->name('user');

Route::middleware('cors')->group(function () {
  Route::get('/login/google', 'GoogleController@redirectToGoogle')->name('google.login');
  Route::get('/login/google/callback', 'GoogleController@handleGoogleCallback')->name('google.callback');
});
