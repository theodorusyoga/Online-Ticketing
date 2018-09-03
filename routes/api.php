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
Route::get('/get-donations', 'AuthController@getDonations')->middleware(CheckJWT::class);
Route::get('/get-user-types', 'AuthController@getUserTypes')->middleware(CheckJWT::class);
Route::post('/join-volunteer', 'AuthController@joinVolunteer')->middleware(CheckJWT::class);
Route::post('/confirm-donate', 'AuthController@confirmDonate')->middleware(CheckJWT::class);
