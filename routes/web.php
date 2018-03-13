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
});

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





Route::get('/user/add/post',['uses' =>'User\UserController@addPost','as'=>'user.add.post']);
Route::get('/user/aboutus',['uses' =>'User\UserController@aboutUs','as'=>'user.aboutUs']);
Route::get('/user/index',['uses' =>'User\UserController@home','as'=>'user.home']);
Route::get('/user/categories',['uses' =>'User\UserController@categories','as'=>'user.categories']);
Route::get('/user/details',['uses' =>'User\UserController@details','as'=>'user.details']);
Route::get('/user/faq',['uses' =>'User\UserController@faq','as'=>'user.faq']);
Route::get('/user/favourite-ads',['uses' =>'User\UserController@favourite_ads','as'=>'user.favourite_ads']);
Route::get('/user/my-profile',['uses' =>'User\UserController@myProfile','as'=>'user.myProfile']);

Route::get('/user/published',['uses' =>'User\UserController@published','as'=>'user.published']);
Route::get('/user/delete-account',['uses' =>'User\UserController@deleteAccount','as'=>'user.deleteAccount']);


Route::get('/user/donation-post-details',['uses' =>'User\UserController@adPostDetails','as'=>'user.adPostDetails']);




