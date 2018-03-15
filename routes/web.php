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

Route::get('/', 'User\UserController@home');
/** ============================================================================================================================================
 *                                                           Adminsite Or Admin Panel
 * ============================================================================================================================================
 */
Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');
  // Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  // Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');


                             //////////////////////////
                            ////// Donation Item//////
                           //////////////////////////
  Route::get('/donation/item/category',          [ 'uses' => 'Admin\DonationItemController@category',             'as'=>'admin.donationItem.category.category']);
  Route::post('/donation/item/category',         [ 'uses' => 'Admin\DonationItemController@categories',           'as'=>'admin.donationItem.category.categories']);
  Route::post('/donation/item/create/category',  [ 'uses' => 'Admin\DonationItemController@store_category',       'as'=>'admin.donationItem.category.create']);
  

  Route::get('/donation/item/sub-category',           [ 'uses' => 'Admin\DonationItemController@subCategory',          'as'=>'admin.donationItem.subCategory.subCategory']);
  Route::post('/donation/item/sub-category',          [ 'uses' => 'Admin\DonationItemController@subcategories',        'as'=>'admin.donationItem.subCategory.subcategories']);
  Route::post('/donation/item/create/sub-category',   [ 'uses' => 'Admin\DonationItemController@store_subcategories',  'as'=>'admin.donationItem.subCategory.create']);
  
  
  Route::get('/donation/item/specification',           [ 'uses' => 'Admin\DonationItemController@specification',               'as'=>'admin.donationItem.specification.specification']);
  Route::post('/donation/item/specification',          [ 'uses' => 'Admin\DonationItemController@specifications',              'as'=>'admin.donationItem.specification.specifications']);
  Route::post('/donation/item/create/specification',   [ 'uses' => 'Admin\DonationItemController@store_specifications',        'as'=>'admin.donationItem.specification.create']);
  
                             //////////////////////////
                            ////// Locations    //////
                           //////////////////////////
  Route::get('/location/country',        [ 'uses' => 'Admin\LocationController@country',             'as'=>'admin.Location.country.country']);
  Route::post('/location/country',       [ 'uses' => 'Admin\LocationController@countries',           'as'=>'admin.Location.country.countries']);
  
  Route::get('/location/state',          [ 'uses' => 'Admin\LocationController@state',              'as'=>'admin.Location.state.state']);
  Route::post('/location/state',         [ 'uses' => 'Admin\LocationController@states',             'as'=>'admin.Location.state.states']);
  
  Route::get('/location/city',           [ 'uses' => 'Admin\LocationController@city',                'as'=>'admin.Location.city.city']);
  Route::post('/location/city',          [ 'uses' => 'Admin\LocationController@cities',              'as'=>'admin.Location.city.cities']);  
  



















});
/** ============================================================================================================================================
 *                                                           Website Or User Panel
 * ============================================================================================================================================
 */
Route::group(['prefix' => 'user'], function () {
  Route::get('/login', 'UserAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'UserAuth\LoginController@login');
  Route::post('/logout', 'UserAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'UserAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'UserAuth\RegisterController@register');

  Route::post('/password/email', 'UserAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'UserAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'UserAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'UserAuth\ResetPasswordController@showResetForm');
});





Route::get('/aboutus',['uses' =>'User\UserController@aboutUs','as'=>'user.aboutUs']);
Route::get('/index',['uses' =>'User\UserController@home','as'=>'user.home']);
Route::get('/categories',['uses' =>'User\UserController@categories','as'=>'user.categories']);
Route::get('/details',['uses' =>'User\UserController@details','as'=>'user.details']);
Route::get('/faq',['uses' =>'User\UserController@faq','as'=>'user.faq']);
Route::get('/favourite-ads',['uses' =>'User\UserController@favourite_ads','as'=>'user.favourite_ads']);
Route::get('/my-profile',['uses' =>'User\UserController@myProfile','as'=>'user.myProfile']);

Route::get('/published',['uses' =>'User\UserController@published','as'=>'user.published']);
Route::get('/delete-account',['uses' =>'User\UserController@deleteAccount','as'=>'user.deleteAccount']);


Route::get('/donation-post-details',['uses' =>'User\UserController@adPostDetails','as'=>'user.adPostDetails']);



Route::get('/donation/category',      ['uses' =>'User\UserController@addPost',                       'as'=>'web.donation.category']);
Route::post('/getsubcatory',          [ 'uses' => 'User\UserController@getSubcategory',              'as'=>'web.categorie.subcategories']);  
Route::post('/getspecification',      [ 'uses' => 'User\UserController@getSpecification',            'as'=>'web.categorie.specification']);  
Route::post('/donation/form',         [ 'uses' => 'User\UserController@postDetails',                 'as'=>'web.categorie.postDetails']);  
Route::get('/donation/form',          [ 'uses' => 'User\UserController@addPost',                     'as'=>'web.donation.form']);  





