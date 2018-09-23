<?php

use Illuminate\Http\Request;
use App\Http\Middleware\CheckJWT;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'AuthController@auth');
Route::get('/get-donations', 'GeneralFormController@getDonations')->middleware(CheckJWT::class);
Route::get('/get-user-types', 'GeneralFormController@getUserTypes')->middleware(CheckJWT::class);
Route::post('/join-volunteer', 'GeneralFormController@joinVolunteer')->middleware(CheckJWT::class);
Route::post('/confirm-donate', 'GeneralFormController@confirmDonate')->middleware(CheckJWT::class);
Route::post('/step1', 'RegisterController@registerStep1')->middleware(CheckJWT::class);
Route::post('/step2', 'RegisterController@registerStep2')->middleware(CheckJWT::class);
Route::post('/step3', 'RegisterController@registerStep3')->middleware(CheckJWT::class);
Route::get('/step1', 'RegisterController@getRegisterStep1')->middleware(CheckJWT::class);
Route::get('/step2', 'RegisterController@getRegisterStep2')->middleware(CheckJWT::class);

// Veritrans
Route::post('/request-payment', 'PaymentController@requestVeritransUrl')->middleware(CheckJWT::class);

