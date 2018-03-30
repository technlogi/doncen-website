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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['api','cors']], function () {
    //Route::post('auth/register/success','UserAuth\ApiRegisterController@registrationSuccess');
    Route::post('auth/registration',     'Api\AuthController@register');
    Route::post('auth/getOtp',           'Api\AuthController@getOtp');
    Route::post('auth/submitOtp',        'Api\AuthController@submitOtp');

    Route::post('auth/forgotPassword',   'Api\AuthController@forgotPassword');
    Route::post('auth/changePassword',         'Api\AuthController@changePassword');
    
    Route::post('auth/resetPassword',   'Api\AuthController@resetPassword');
    Route::post('auth/getAuthUser ',   'Api\AuthController@getAuthUser');
    
});    