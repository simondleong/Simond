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
});

Route::get('/register', 'UserController@showRegisterForm');

Route::post('/register', 'UserController@register');

Route::get('/login', function () {
    return view('login');
});

Route::group(['middleware' => ['AuthUser']], function () {
    Route::get('/profile', 'UserController@showProfileForm');
    Route::get('/preferences', 'UserController@showPreferencesForm');
    Route::get('/password', function () {
        return view('password');
    });
});