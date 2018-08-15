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

Route::post('/login', 'UserController@login');


Route::group(['middleware' => ['AuthUser']], function () {

    Route::get('/preferences', 'PreferenceController@showPreferencesForm');
    Route::post('/preferences', 'PreferenceController@update');

    Route::group(['middleware' => ['PreferenceCheck']], function () {
        Route::get('/profile', 'UserController@showProfileForm');
        Route::post('/profile', 'UserController@updateProfile');

        Route::get('/password', function () {
            return view('password');
        });
        Route::post('/password', 'UserController@updatePassword');

        Route::get('/logout', 'UserController@logout');
    });
});