<?php

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
    return view('welcome');
})->name('home');

// /user/
Route::get('/user/login', 'User\LoginController@showLogin')
    ->name('user.login');

Route::get('/user/login/go', 'Auth\AuthController@redirectToProvider')
    ->name('user.login.go');

Route::get('/user/logout', 'User\LoginController@showLogout')
    ->name('user.logout');

Route::get('/user/auth/continue', 'Auth\AuthController@handleProviderCallback');
