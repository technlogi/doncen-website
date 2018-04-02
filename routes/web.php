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
  Route::get('/donation/item/category',          [ 'uses' => 'Admin\DonationItemController@category',             'as'=>'admin.donationItem.category.category'   ]);
  Route::post('/donation/item/category',         [ 'uses' => 'Admin\DonationItemController@categories',           'as'=>'admin.donationItem.category.categories' ]);
  Route::post('/donation/item/create/category',  [ 'uses' => 'Admin\DonationItemController@store_category',       'as'=>'admin.donationItem.category.create'     ]);
                                /* Sub Category */
  Route::get('/donation/item/sub-category',           [ 'uses' => 'Admin\DonationItemController@subCategory',          'as'=>'admin.donationItem.subCategory.subCategory'  ]);
  Route::post('/donation/item/sub-category',          [ 'uses' => 'Admin\DonationItemController@subcategories',        'as'=>'admin.donationItem.subCategory.subcategories']);
  Route::post('/donation/item/create/sub-category',   [ 'uses' => 'Admin\DonationItemController@store_subcategories',  'as'=>'admin.donationItem.subCategory.create'       ]);
                                /* Specification  */
  Route::get('/donation/item/specification',           [ 'uses' => 'Admin\DonationItemController@specification',               'as'=>'admin.donationItem.specification.specification' ]);
  Route::post('/donation/item/specification',          [ 'uses' => 'Admin\DonationItemController@specifications',              'as'=>'admin.donationItem.specification.specifications']);
  Route::post('/donation/item/create/specification',   [ 'uses' => 'Admin\DonationItemController@store_specifications',        'as'=>'admin.donationItem.specification.create'        ]);
                             //////////////////////////
                            ////// Locations    //////
                           //////////////////////////
                                 /* Country  */
  Route::get('/location/country',        [ 'uses' => 'Admin\LocationController@country',             'as'=>'admin.Location.country.country'   ]);
  Route::post('/location/country',       [ 'uses' => 'Admin\LocationController@countries',           'as'=>'admin.Location.country.countries' ]);
  Route::post('/create/country',         [ 'uses' => 'Admin\LocationController@store_country',       'as'=>'admin.Location.country.create'    ]);
  
                                  /* State  */
  Route::get('/location/state',          [ 'uses' => 'Admin\LocationController@state',              'as'=>'admin.Location.state.state'        ]);
  Route::post('/location/state',         [ 'uses' => 'Admin\LocationController@states',             'as'=>'admin.Location.state.states'       ]);
  Route::post('/create/state',           [ 'uses' => 'Admin\LocationController@store_state',        'as'=>'admin.Location.state.create'       ]);
                                  /* City  */
  Route::get('/location/city',           [ 'uses' => 'Admin\LocationController@city',                'as'=>'admin.Location.city.city'         ]);
  Route::post('/location/city',          [ 'uses' => 'Admin\LocationController@cities',              'as'=>'admin.Location.city.cities'       ]);  
  Route::post('/create/city',            [ 'uses' => 'Admin\LocationController@store_city',          'as'=>'admin.Location.city.create'       ]);  
  
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
                            /////////////////////////
                           //// User Controller ////
                           /////////////////////////
                              /* reset passowrd */                     
  Route::get('/password/reset',             ['uses'=>'UserAuth\RegistrationController@resetPasswordForm',  'as'=>'user.auth.passwords.resetPassword']);
  Route::post('/cheak/contact',             ['uses'=>'UserAuth\RegistrationController@cheakContact',       'as'=>'user.resetpassword.cheakContact']);
  Route::get('/password/reset/{token}',     ['uses'=>'UserAuth\RegistrationController@ResetOtpForm',       'as'=>'user.resetpassword.OtpForm']);
  Route::post('/password/reset/{token}',    ['uses'=>'UserAuth\RegistrationController@ResetCheckOtp',      'as'=>'user.resetpassword.cheakOtp']);
  
  Route::get('/reset/password/{key}',       ['uses'=>'UserAuth\RegistrationController@showResetPasswordForm', 'as'=>'user.resetpassword.resetPasswordForm']);
  Route::post('/reset/password/{key}',      ['uses'=>'UserAuth\RegistrationController@resetPassword',   'as'=>'user.resetpassword.resetpassword']);
  

  Route::get('/delete-account',                   [ 'uses' =>  'User\UserController@deleteAccount',           'as' => 'user.deleteAccount'       ]);
  Route::get('/my-donation',                      [ 'uses' =>  'User\UserController@myDonation',              'as' => 'user.myDonation'          ]);
  Route::get('/urgent-requirement',               [ 'uses' =>  'User\UserController@urgentRequirement',       'as' => 'user.urgent.requirement'  ]);
  Route::post('/get-donation/list',               [ 'uses' => 'Web\SearchController@getMyDonation',           'as' => 'user.get.donationList'    ]);
  Route::post('/get-complete/donation/list',      [ 'uses' => 'Web\SearchController@getCompleteDonation',     'as' => 'user.get.completeDonation']);
  Route::get('/panding-donation',                 [ 'uses' =>  'User\UserController@pandingDonation',         'as' => 'user.pandingDonation'    ]);
  Route::post('/panding/donation/list',           [ 'uses' => 'Web\SearchController@getpandingDonation',      'as' => 'user.panding.donation']);
  
  
  Route::get('/complete-donation',        [ 'uses' =>  'User\UserController@completeDonation',      'as'=> 'user.complete.donation'      ]);
  Route::post('/get-urgent/list',         [ 'uses' => 'Web\SearchController@getUrgentRequirement',  'as' => 'user.get.urgentRequirement' ]);
  Route::get('/complete-dontation/{key}', [ 'uses' => 'User\UserController@donationComplete',       'as' => 'user.donation.complete'     ]);



  Route::post('/change/password', ['uses'=> 'User\UserController@changePassword',   'as' => 'user.change.password' ]);
  Route::post('/update/profile',  ['uses'=> 'User\UserController@updateProfile',    'as' => 'user.update.profile'  ]);
  Route::post('/contact-us',      ['uses'=> 'User\UserController@contactUs',        'as' => 'user.contact.us'      ]);
  
  
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



Route::post('/search',             [  'uses' => 'Web\CategoryController@searchCategory',           'as' => 'web.categorie.searchCategory']);  
Route::get('/search',              [  'uses' => 'Web\CategoryController@searchCategory',           'as' => 'web.categorie.searchCategory']);  



Route::get('/donation/form/{key}',      [  'uses' => 'Web\WebController@donationDetailForm',           'as' => 'web.donation.DetailForm' ]);
Route::post('/donation/form/{key}',     [ 'uses'=> 'Web\WebController@store_donation_detail',          'as'=> 'web.donation.create'      ]);
Route::get('/donation/category/{key}',  [  'uses' => 'Web\CategoryController@searchCategory',     'as' => 'home.category.details' ]);



















Route::get('/about-us',['uses' =>'Web\WebController@aboutUs','as'=>'web.main.aboutUs']);
Route::get('/contact-us',['uses' =>'Web\WebController@contactUs','as'=>'web.main.contactUs']);


// Route::get('/index',['uses' =>'User\UserController@home','as'=>'user.home']);
Route::get('/faq',['uses' =>'User\UserController@faq','as'=>'user.faq']);
// Route::get('/favourite-ads',['uses' =>'User\UserController@favourite_ads','as'=>'user.favourite_ads']);


Route::get('/donation/detail/{key}',['uses' =>'Web\WebController@donationDetail','as'=>'search.donation.details']);

                                              //////////////////////////////
                                             ////// Search Controller /////
                                            //////////////////////////////



Route::post('/get-featured',           [  'uses' => 'Web\SearchController@getDonationPost',         'as' => 'web.home.getDonation' ]);
Route::post('/get-featured/list',      [  'uses' => 'Web\SearchController@getItemOnLoad',           'as' => 'web.home.getItemOnLoad' ]);

Route::post('/get/condition',          ['uses'=> 'Web\SearchController@condition',      'as'=> 'search.condition.condition'           ]);
Route::post('/get/consideration',      ['uses'=> 'Web\SearchController@consideration',  'as'=> 'search.consideration.consideration'   ]);
Route::post('/get/category',           ['uses'=> 'Web\SearchController@category',       'as'=> 'search.categories.category'           ]);
Route::post('/get/donation-type',      ['uses'=> 'Web\SearchController@donationType',       'as'=> 'search.donationcategories.Type'       ]);



Route::post('/search/city',             ['as'=>'home.search.city',              'uses'=> 'Web\CityController@getCity']);
Route::post('/search/by-search-bar',    ['as'=>'home.searchPage.searchItem',    'uses'=> 'Web\SearchController@getItem']);
Route::post('/search/by-dorpdown',      ['as'=>'search.dropdown.search',        'uses'=> 'Web\SearchController@dropDownSearchItem']);
Route::post('/search/category',         ['as'=>'home.search.category',          'uses'=> 'Web\CategoryController@getCategory']);


Route::post('/subcategory/list',        ['as'=>'search.category.subcategory',          'uses'=> 'Web\CategoryController@getSubcategory']);
Route::post('/specification/list',        ['as'=>'search.subcategory.specification',   'uses'=> 'Web\SubcategoryController@getSpecification']);
Route::post('/print/specific/list',        ['as'=>'search.specification.list',          'uses'=> 'Web\SearchController@getSpecificList']);

