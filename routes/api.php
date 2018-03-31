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
                      ///////////////////////////
                     /// Api/Auth Controller ///
                    ///////////////////////////
    Route::post('auth/login',            'Api\AuthController@login');
    Route::post('auth/logout',            'Api\AuthController@logout');
    
    Route::post('auth/registration',     'Api\AuthController@register');
    Route::post('auth/getOtp',           'Api\AuthController@getOtp');
    Route::post('auth/submitOtp',        'Api\AuthController@submitOtp');

    Route::post('auth/forgotPassword',   'Api\AuthController@forgotPassword');
    Route::post('auth/changePassword',         'Api\AuthController@changePassword');
    
    Route::post('auth/resetPassword',   'Api\AuthController@resetPassword');
    Route::post('auth/getAuthUser',   'Api\AuthController@getAuthUser');
               ////////////////////////
              //// Api Controller ////
             ////////////////////////
    Route::post('/categories',     'Api\ApiController@category');
    Route::post('/subcategories',  'Api\ApiController@subCategory');
    Route::post('/specifications', 'Api\ApiController@specification');

    Route::post('/category-to-subcategory', 'Api\ApiController@categoryTosubcategory');
    Route::post('/subcategory-to-specification', 'Api\ApiController@subcategoryToSpecification');

    Route::post('/subcategory-to-category', 'Api\ApiController@subcategoryToCategory');
    Route::post('/specification-to-subcategory', 'Api\ApiController@subcategoryToSpecification');
    
    
});    