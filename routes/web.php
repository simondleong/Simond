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
        /* photos routes */
        Route::post('/photos/upload', 'PhotoController@upload');
        Route::post('/photos/set/{id}', 'PhotoController@setProfilePicture');
        Route::post('/photos/delete/{id}', 'PhotoController@deletePicture');
        Route::get('/photos', function () {
            return view('photo');
        });

        Route::group(['middleware' => ['PhotoCheck']], function () {
            Route::get('/profile', 'UserController@showProfileForm');
            Route::post('/profile', 'UserController@updateProfile');

            Route::get('/password', function () {
                return view('password');
            });
            Route::post('/password', 'UserController@updatePassword');

            /* homepage */
            Route::get('/home', function () {
                return view('homepage');
            });

            /* match */
            Route::get('/match', 'MatchController@findMatch');

            /* match profile */
            Route::get('/profile/details/{id}', 'MatchController@viewProfile');

            /* request for date */
            Route::post('/request-date', 'DateController@requestDate');

            /* dates */
            Route::get('/dates/sent', 'DateController@viewSent');
            Route::get('/dates/received', 'DateController@viewReceived');
            Route::get('/profile/date/{id}', 'DateController@viewDate');
            Route::get('/profile/date/{id}/process-payment', 'PaymentController@processPayment');
            Route::get('/profile/date/{id}/execute', 'PaymentController@executePayment');
            Route::post('/date/{id}/update', 'DateController@update');
            Route::post('/date/{id}/update-sender', 'PaymentController@updateSender');
            Route::post('/date/{id}/update-receiver', 'PaymentController@updateReceiver');

            /* messages / chats */
            Route::get('/chats', 'DateController@viewChats');
            Route::get('/chat/{id}', 'MessageController@index');
            Route::get('/messages/{id}', 'MessageController@fetchMessages');
            Route::post('/messages/{id}', 'MessageController@sendMessage');
        });


        /* logout route */
        Route::get('/logout', 'UserController@logout');
    });
});