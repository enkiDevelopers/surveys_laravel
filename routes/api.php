<?php

use Illuminate\Http\Request;

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

//Agregando web services
//Agregando un comentar

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/token/{platformName}/{idUser}','apiController@checkPlatform');

Route::get('/numEncuestas/{token}/{idUser}','apiController@checkSurveys');
