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
    return view('dashboard.index');
});

Route::get('/register/step1', function () {
    return view('register.step1');
});

Route::get('/register/step2/{user_id}', function () {
    return view('register.step2');
});

Route::get('/register/step3/{user_id}', function () {
    return view('register.step3');
});

Route::get('/register/finish', function () {
    return view('register.finish');
});

Route::get('/login', function () {
    return view('register.login');
});

Route::get('/donation', 'DonationController@index');

Route::get('/register', 'RegisterController@index');
