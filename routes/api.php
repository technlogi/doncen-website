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
                      ///////////////////////////
                     /// Api/Auth Controller ///
                    ///////////////////////////
                            /* Login */
    Route::post('auth/login',                   'Api\AuthController@login'                     );
    Route::post('auth/logout',                  'Api\AuthController@logout'                    );
                            /* Registration */
    Route::post('auth/registration',            'Api\AuthController@register'                  );
    Route::post('auth/getOtp',                  'Api\AuthController@getOtp'                    );
    Route::post('auth/submitOtp',               'Api\AuthController@submitOtp'                 );
                            /* Forgot Password */
    // Route::post('auth/forgotPassword',          'Api\AuthController@forgotPassword'            );
                            /* Change Password */
    Route::post('auth/changePassword',          'Api\AuthController@changePassword'            );
                            /* Reset Password */
    Route::post('auth/resetPassword',           'Api\AuthController@resetPassword'             );
                            /*  Authanticate User Info */
    Route::post('auth/getAuthUser',             'Api\AuthController@getAuthUser'               );
                            /* Update Fcm Id */
    Route::post('auth/updateFcmId',             'Api\AuthController@updateFcmId'               );
                       ////////////////////////
                      //// Api Controller ////
                     ////////////////////////
                        /* List of All */
    Route::post('/categories',                   'Api\ApiController@category'                  );
    Route::post('/subcategories',                'Api\ApiController@subCategory'               );
    Route::post('/specifications',               'Api\ApiController@specification'             );
                            /* Forward RelationShip */
    Route::post('/category-to-subcategory',      'Api\ApiController@categoryTosubcategory'     );
    Route::post('/subcategory-to-specification', 'Api\ApiController@subcategoryToSpecification');
                            /* Backward RelationShiop */
    Route::post('/subcategory-to-category',      'Api\ApiController@subcategoryToCategory'     );
    Route::post('/specification-to-subcategory', 'Api\ApiController@specificationToSubcategory');

                    ////////////////////////////
                   ///// Dontation Deatils/////
                  ////////////////////////////
    Route::post('/submit/donation',           'Api\ApiController@submitDonationForm');
    Route::post('/donations',                 'Api\ApiController@donations');
    
	Route::post('/search-donation',                 'Api\ApiController@searchDonationPost');
    
	Route::post('/get-donation',                 'Api\ApiController@getDonation');
    // Route::post('/list/donations' , 'Api\ApiController@donations');
     
});    

