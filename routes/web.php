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


/** ============================================================================================================================================
 *                                                           Adminsite Or Admin Panel
 * ============================================================================================================================================
 */
Route::group(['prefix' => 'admin'], function () {
                             //////////////////////////////////
                            ////// Admin Authantication //////
                           //////////////////////////////////
                                  /* Login  */
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');
                                    /* Registeration */
  // Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  // Route::post('/register', 'AdminAuth\RegisterController@register');
                                    /* Password  */
  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
                             //////////////////////////
                            ////// Donation Item//////
                           //////////////////////////
                                  /* Category */
  Route::get('/donation/item/category',          [ 'uses' => 'Admin\DonationItemController@category',             'as'=>'admin.donationItem.category.category']);
  Route::post('/donation/item/category',         [ 'uses' => 'Admin\DonationItemController@categories',           'as'=>'admin.donationItem.category.categories']);
  Route::post('/donation/item/create/category',  [ 'uses' => 'Admin\DonationItemController@store_category',       'as'=>'admin.donationItem.category.create']);
                                /* Sub Category */
  Route::get('/donation/item/sub-category',           [ 'uses' => 'Admin\DonationItemController@subCategory',          'as'=>'admin.donationItem.subCategory.subCategory']);
  Route::post('/donation/item/sub-category',          [ 'uses' => 'Admin\DonationItemController@subcategories',        'as'=>'admin.donationItem.subCategory.subcategories']);
  Route::post('/donation/item/create/sub-category',   [ 'uses' => 'Admin\DonationItemController@store_subcategories',  'as'=>'admin.donationItem.subCategory.create']);
                                /* Specification  */
  Route::get('/donation/item/specification',           [ 'uses' => 'Admin\DonationItemController@specification',               'as'=>'admin.donationItem.specification.specification']);
  Route::post('/donation/item/specification',          [ 'uses' => 'Admin\DonationItemController@specifications',              'as'=>'admin.donationItem.specification.specifications']);
  Route::post('/donation/item/create/specification',   [ 'uses' => 'Admin\DonationItemController@store_specifications',        'as'=>'admin.donationItem.specification.create']);
                             //////////////////////////
                            ////// Locations    //////
                           //////////////////////////
                                 /* Country  */
  Route::get('/location/country',        [ 'uses' => 'Admin\LocationController@country',             'as'=>'admin.Location.country.country']);
  Route::post('/location/country',       [ 'uses' => 'Admin\LocationController@countries',           'as'=>'admin.Location.country.countries']);
  Route::post('/create/country',         [ 'uses' => 'Admin\LocationController@store_country',       'as'=>'admin.Location.country.create']);
  
                                  /* State  */
  Route::get('/location/state',          [ 'uses' => 'Admin\LocationController@state',              'as'=>'admin.Location.state.state']);
  Route::post('/location/state',         [ 'uses' => 'Admin\LocationController@states',             'as'=>'admin.Location.state.states']);
  Route::post('/create/state',           [ 'uses' => 'Admin\LocationController@store_state',        'as'=>'admin.Location.state.create']);
                                  /* City  */
  Route::get('/location/city',           [ 'uses' => 'Admin\LocationController@city',                'as'=>'admin.Location.city.city']);
  Route::post('/location/city',          [ 'uses' => 'Admin\LocationController@cities',              'as'=>'admin.Location.city.cities']);  
  Route::post('/create/city',          [ 'uses' => 'Admin\LocationController@store_city',          'as'=>'admin.Location.city.create']);  
  
});
/** ============================================================================================================================================
 *                                                           User Panel
 * ============================================================================================================================================
 */
Route::group(['prefix' => 'user'], function () {
  Route::get('/login', 'UserAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'UserAuth\LoginController@login');
  Route::post('/logout', 'UserAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'UserAuth\RegistrationController@showRegistrationForm')->name('register');
  Route::post('/register', 'UserAuth\RegistrationController@register');
  Route::get('/register/otp/{key}', ['uses'=>'UserAuth\RegistrationController@showOtpForm','as'=>'user.registration.otpForm']);
  Route::post('/register/otp', ['uses'=>'UserAuth\RegistrationController@otpSubmit','as'=>'user.registration.otpSubmit']);
  
  Route::get('/delete-account',['uses' =>'User\UserController@deleteAccount','as'=>'user.deleteAccount']);
  

  Route::post('/password/email', 'UserAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'UserAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'UserAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'UserAuth\ResetPasswordController@showResetForm');


  Route::post('/change/password', ['uses'=> 'User\UserController@changePassword', 'as' => 'user.change.password']);
  Route::post('/update/profile', ['uses'=> 'User\UserController@updateProfile', 'as' => 'user.update.profile']);
  
});
/** ============================================================================================================================================
 *                                                           Web Site
 * ============================================================================================================================================
 */
                                             //////////////////////////
                                            ////// Web   Site   //////
                                           //////////////////////////
Route::get('/',                   [  'uses' => 'Web\WebController@home',                      'as' => 'web.home'                      ]);
Route::get('/donation/category',  [  'uses' => 'Web\CategoryController@donationCategory',     'as' => 'web.donation.category'         ]);
Route::get('/donation/form',      [  'uses' => 'Web\CategoryController@donationCategory',     'as' => 'web.donation.form'             ]);  
Route::post('/getsubcatory',      [  'uses' => 'Web\SubcategoryController@getSubcategory',    'as' => 'web.categorie.subcategories'   ]);  
Route::post('/getspecification',  [  'uses' => 'Web\SpecificationController@getSpecification','as' => 'web.categorie.specification'   ]);  
Route::post('/donation/form',     [  'uses' => 'Web\WebController@donationDetails',           'as' => 'web.categorie.donationDetails' ]);



Route::get('/search',             [  'uses' => 'Web\CategoryController@searchCategory',           'as' => 'web.categorie.searchCategory']);  

Route::post('/search',             [  'uses' => 'Web\CategoryController@searchCategory',           'as' => 'web.categorie.searchCategory']);  



Route::get('/donation/form/{key}',     [  'uses' => 'Web\WebController@donationDetailForm',           'as' => 'web.donation.DetailForm' ]);
Route::post('/donation/form/{key}',    [ 'uses'=> 'Web\WebController@store_donation_detail',          'as'=> 'web.donation.create']);

Route::post('/get-featured',           [  'uses' => 'Web\WebController@getDonationPost',           'as' => 'web.home.getDonation' ]);
Route::post('/get-featured/list',      [  'uses' => 'Web\WebController@getItemOnLoad',           'as' => 'web.home.getItemOnLoad' ]);

Route::get('/getcity', 'Web\CityController@getCity');

Route::get('/donation/category/{key}',  [  'uses' => 'Web\CategoryController@categoryDetail',     'as' => 'home.category.details' ]);


Route::post('/search/city',    ['as'=>'home.search.city',    'uses'=>'Web\CityController@getCity']);
Route::post('/search/by-search-bar',    ['as'=>'home.searchPage.searchItem',    'uses'=>'Web\WebController@getItem']);
Route::post('/search/by-dorpdown',    ['as'=>'home.searchPage.dropDownSearchItem',    'uses'=>'Web\WebController@dropDownSearchItem']);
Route::post('/search/category',['as'=>'home.search.category','uses'=>'Web\CategoryController@getCategory']);
























Route::get('/about-us',['uses' =>'Web\WebController@aboutUs','as'=>'web.main.aboutUs']);
Route::get('/contact-us',['uses' =>'Web\WebController@contactUs','as'=>'web.main.contactUs']);


// Route::get('/index',['uses' =>'User\UserController@home','as'=>'user.home']);
// Route::get('/details',['uses' =>'User\UserController@details','as'=>'user.details']);
Route::get('/faq',['uses' =>'User\UserController@faq','as'=>'user.faq']);
// Route::get('/favourite-ads',['uses' =>'User\UserController@favourite_ads','as'=>'user.favourite_ads']);
// Route::get('/my-profile',['uses' =>'User\UserController@myProfile','as'=>'user.myProfile']);




