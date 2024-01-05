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
Route::group(['middleware'=>'activitylog'],function(){
	Route::group(['prefix' => 'admin'], function () {
	                             //////////////////////////////////
	                            ////// Admin Authantication //////
	                           //////////////////////////////////
	  // Route::get('/home', 'Admin\DashBoardController@dashboard')->name('home');     
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
	  Route::get('/change/category/status/{key}',    [ 'uses' => 'Admin\DonationItemController@status_category',      'as'=>'admin.donationItem.category.status'     ]);
	  Route::get('/change/category/delete/{key}',    [ 'uses' => 'Admin\DonationItemController@delete_category',      'as'=>'admin.donationItem.category.delete'     ]);
	  
	                                /* Sub Category */
	  Route::get('/donation/item/sub-category',           [ 'uses' => 'Admin\DonationItemController@subCategory',          'as'=>'admin.donationItem.subCategory.subCategory'  ]);
	  Route::post('/donation/item/sub-category',          [ 'uses' => 'Admin\DonationItemController@subcategories',        'as'=>'admin.donationItem.subCategory.subcategories']);
	  Route::post('/donation/item/create/sub-category',   [ 'uses' => 'Admin\DonationItemController@store_subcategories',  'as'=>'admin.donationItem.subCategory.create'       ]);
	  Route::get('/change/subcategory/status/{key}',      [ 'uses' => 'Admin\DonationItemController@status_subcategory',   'as'=>'admin.donationItem.subCategory.status'     ]);
	  Route::get('/change/subcategory/delete/{key}',      [ 'uses' => 'Admin\DonationItemController@delete_subcategory',   'as'=>'admin.donationItem.subCategory.delete'     ]);
	                                /* Specification  */
	  Route::get('/donation/item/specification',           [ 'uses' => 'Admin\DonationItemController@specification',               'as'=>'admin.donationItem.specification.specification' ]);
	  Route::post('/donation/item/specification',          [ 'uses' => 'Admin\DonationItemController@specifications',              'as'=>'admin.donationItem.specification.specifications']);
	  Route::post('/donation/item/create/specification',   [ 'uses' => 'Admin\DonationItemController@store_specifications',        'as'=>'admin.donationItem.specification.create'        ]);
	  Route::get('/change/specification/status/{key}',     [ 'uses' => 'Admin\DonationItemController@status_specifications',       'as'=>'admin.donationItem.specification.status'     ]);
	  Route::get('/change/specification/delete/{key}',     [ 'uses' => 'Admin\DonationItemController@delete_specifications',       'as'=>'admin.donationItem.specification.delete'     ]);
	                             //////////////////////////
	                            ////// Locations    //////
	                           //////////////////////////
	                                 /* Country  */
	  Route::get('/location/country',        [ 'uses' => 'Admin\LocationController@country',             'as'=>'admin.Location.country.country'   ]);
	  Route::post('/location/country',       [ 'uses' => 'Admin\LocationController@countries',           'as'=>'admin.Location.country.countries' ]);
	  Route::post('/create/country',         [ 'uses' => 'Admin\LocationController@store_country',       'as'=>'admin.Location.country.create'    ]);
	  Route::get('/country/status/{key}',    [ 'uses' => 'Admin\LocationController@status_country',      'as'=>'admin.Location.country.status'    ]);
	  Route::get('/country/delete/{key}',    [ 'uses' => 'Admin\LocationController@delete_country',      'as'=>'admin.Location.country.delete'    ]);
	  
	                                  /* State  */
	  Route::get('/location/state',          [ 'uses' => 'Admin\LocationController@state',              'as'=>'admin.Location.state.state'        ]);
	  Route::post('/location/state',         [ 'uses' => 'Admin\LocationController@states',             'as'=>'admin.Location.state.states'       ]);
	  Route::post('/create/state',           [ 'uses' => 'Admin\LocationController@store_state',        'as'=>'admin.Location.state.create'       ]);
	  Route::get('/state/status/{key}',      [ 'uses' => 'Admin\LocationController@status_state',       'as'=>'admin.Location.state.status'       ]);
	  Route::get('/state/delete/{key}',      [ 'uses' => 'Admin\LocationController@delete_state',       'as'=>'admin.Location.state.delete'       ]);
	                                  /* City  */
	  Route::get('/location/city',           [ 'uses' => 'Admin\LocationController@city',                'as'=>'admin.Location.city.city'         ]);
	  Route::post('/location/city',          [ 'uses' => 'Admin\LocationController@cities',              'as'=>'admin.Location.city.cities'       ]);  
	  Route::post('/create/city',            [ 'uses' => 'Admin\LocationController@store_city',          'as'=>'admin.Location.city.create'       ]);
	  Route::get('/city/status/{key}',       [ 'uses' => 'Admin\LocationController@status_city',         'as'=>'admin.Location.city.status'       ]);
	  Route::get('/city/delete/{key}',       [ 'uses' => 'Admin\LocationController@delete_city',         'as'=>'admin.Location.city.delete'       ]);  
	    
	    
	                            ///////////////////////
	                           ////   Donations  /////
	                          ///////////////////////
	  Route::get('/donations',                [ 'uses' => 'Admin\DonationController@donation',                'as'=>'admin.donations.donation'      ]);
	  Route::post('/donation/lists',          [ 'uses' => 'Admin\DonationController@donations',               'as'=>'admin.donations.donations'     ]);
	  Route::get('/donation/status/{key}',    [ 'uses' => 'Admin\DonationController@donationStatus',          'as'=>'admin.donations.status'        ]);
	  Route::get('/donation/delete/{key}',    [ 'uses' => 'Admin\DonationController@donationDelete',          'as'=>'admin.donations.delete'        ]);
	  Route::get('/donation/{key}',           [ 'uses' => 'Admin\DonationController@donationShow',            'as'=>'admin.donations.show'          ]);
	                            //////////////////////
	                           ///// Contact Us /////
	                          //////////////////////
	  Route::get('/contact-us',                [ 'uses' => 'Admin\ContactUsController@contactUs',                'as'=>'admin.contact.contactUs'      ]); 
	  Route::post('/contact-us',               [ 'uses' => 'Admin\ContactUsController@contacts',                 'as'=>'admin.contact.contacts'       ]);  
	  Route::get('/contact-us/status/{key}',   [ 'uses' => 'Admin\ContactUsController@status_contact_us',        'as'=>'admin.contact.status'         ]); 
	  Route::get('/contact-us/delete/{key}',   [ 'uses' => 'Admin\ContactUsController@delete_contact_us',        'as'=>'admin.contact.delete'         ]); 
	                            ///////////////////
	                           ///// Report  /////
	                          ///////////////////
	  Route::get('/report',                [ 'uses' => 'Admin\ReportController@report',                 'as'=>'admin.report.reports'      ]); 
	  Route::post('/reports',              [ 'uses' => 'Admin\ReportController@reports',                'as'=>'admin.report.lists'        ]);  

	  
	                        
	  
	});
	/** ============================================================================================================================================
	 *                                                           User Panel
	 * ============================================================================================================================================
	 */
	Route::group(['prefix' => 'user'], function () {
	  // Route::get('/login', 'UserAuth\LoginController@showLoginForm')->name('login');
	  //Route::post('/login', 'UserAuth\LoginController@login');
	  //Route::post('/login', 'UserAuth\UserLoginController@login');
	  Route::post('/login', 'UserAuth\LoginController@login');

	//   Route::get('/dashboard', function () {
	//     $users[] = Auth::user();
	//     $users[] = Auth::guard()->user();
	//     $users[] = Auth::guard('user')->user();
	//     //dd($users);

	//     return view('user.home');
	// })->name('home');


		/* Log In Via OTP Route Start */
		
		
			  Route::get('/login-via-otp',            ['uses'=>'UserAuth\UserLoginController@showLoginViaOtp',  'as'=> 'user.login.showLoginViaOtp']);
			  Route::post('/login/otp', ['uses'=>'UserAuth\UserLoginController@submitOtpForm',  'as'=> 'user.login.otpForm']);
			  Route::get('/login/otp/{key}',  ['uses'=>'UserAuth\UserLoginController@showOtpForm',    'as'=> 'user.login.show.otpForm']);
			  Route::post('/login/otp/{key}', ['uses'=>'UserAuth\UserLoginController@otpSubmit',      'as'=> 'user.login.otpSubmit']);
		
		/* Log In Via OTP Route End */
		
		/* Log In Via PIN  Start*/
			  
			  Route::get('/login',            ['uses'=>'UserAuth\UserLoginController@showLoginForm',  'as'=> 'user.login.loginForm']);
			  Route::post('/login/pin', ['uses'=>'UserAuth\UserLoginController@submitPinForm',  'as'=> 'user.login.pinForm']);
			  
		/* Log In Via PIN  End*/
	  
	  // Route::get('/login/otp',        ['uses' =>'UserAuth\UserLoginController@redirect_form', 'as'=>'user.login']);


	  Route::post('/logout', 'UserAuth\LoginController@logout')->name('logout'); 

	  Route::get('/register', 'UserAuth\RegistrationController@showRegistrationForm')->name('register');
	  Route::post('/register', 'UserAuth\RegistrationController@register');
	  Route::get('/register/otp/{key}', ['uses'=>'UserAuth\RegistrationController@showOtpForm','as'=>'user.registration.otpForm']);
	  Route::post('/register/otp', ['uses'=>'UserAuth\RegistrationController@otpSubmit','as'=>'user.registration.otpSubmit']);
	                            /////////////////////////
	                           //// User Controller ////
	                           /////////////////////////
	                              /* reset passowrd */                     
	  // Route::get('/password/reset',             ['uses'=>'UserAuth\RegistrationController@resetPasswordForm',  'as'=>'user.auth.passwords.resetPassword']);
	  Route::post('/cheak/contact',             ['uses'=>'UserAuth\RegistrationController@cheakContact',       'as'=>'user.resetpassword.cheakContact']);
	  Route::get('/password/reset/{token}',     ['uses'=>'UserAuth\RegistrationController@ResetOtpForm',       'as'=>'user.resetpassword.OtpForm']);
	  Route::post('/password/reset/{token}',    ['uses'=>'UserAuth\RegistrationController@ResetCheckOtp',      'as'=>'user.resetpassword.cheakOtp']);
	  
	  // Route::get('/reset/password/{key}',       ['uses'=>'UserAuth\RegistrationController@showResetPasswordForm', 'as'=>'user.resetpassword.resetPasswordForm']);
	  // Route::post('/reset/password/{key}',      ['uses'=>'UserAuth\RegistrationController@resetPassword',   'as'=>'user.resetpassword.resetpassword']);
	  

	  Route::get('/delete-account',                   [ 'uses' =>  'User\UserController@deleteAccount',           'as' => 'user.deleteAccount'       ]);
	  Route::get('/delete-account-action',                   [ 'uses' =>  'User\UserController@deleteAccountAction',           'as' => 'user.deleteAccountAction'       ]);
	  Route::get('/my-donation',                      [ 'uses' =>  'User\UserController@myDonation',              'as' => 'user.myDonation'          ]);
	  Route::get('/urgent-requirement',               [ 'uses' =>  'User\UserController@urgentRequirement',       'as' => 'user.urgent.requirement'  ]);
	  Route::post('/get-donation/list',               [ 'uses' => 'Web\SearchController@getMyDonation',           'as' => 'user.get.donationList'    ]);
	  Route::post('/get-complete/donation/list',      [ 'uses' => 'Web\SearchController@getCompleteDonation',     'as' => 'user.get.completeDonation']);
	  Route::get('/panding-donation',                 [ 'uses' =>  'User\UserController@pandingDonation',         'as' => 'user.pandingDonation'    ]);
	  Route::post('/panding/donation/list',           [ 'uses' => 'Web\SearchController@getpandingDonation',      'as' => 'user.panding.donation']);
	  Route::get('/favourite-donation',               [ 'uses' =>  'User\UserController@favoriateDonation',       'as' => 'user.favoriateDonation'    ]);
	  Route::post('/favourite/donation/list',         [ 'uses' => 'Web\SearchController@getfavoriateDonation',    'as' => 'user.favoriate.donation']);
	  
	  Route::get('/complete-donation',        [ 'uses' =>  'User\UserController@completeDonation',      'as'=> 'user.complete.donation'      ]);
	  Route::post('/get-urgent/list',         [ 'uses' => 'Web\SearchController@getUrgentRequirement',  'as' => 'user.get.urgentRequirement' ]);
	  Route::get('/complete-dontation/{key}', [ 'uses' => 'User\UserController@donationComplete',       'as' => 'user.donation.complete'     ]);



	  Route::post('/change/password',       ['uses'=> 'User\UserController@changePassword',      'as' => 'user.change.password' ]);
	  
	  Route::post('/change/mobile-number', ['uses'=> 'User\UserController@changeMobileNumber',   'as' => 'user.change.contact' ]);
	  Route::post('/submit/otp/mobile-number', ['uses'=> 'UserAuth\UserLoginController@submitOtp',   'as' => 'user.change.submitOtp' ]);

	  Route::post('/update/profile',  ['uses'=> 'User\UserController@updateProfile',    'as' => 'user.update.profile'  ]);
	  Route::post('/contact-us',      ['uses'=> 'User\UserController@contactUs',        'as' => 'user.contact.us'      ]);
	  
	});
		
		Route::group(['middleware'=>'user'],function(){
			
			Route::get('/donation/detail/{key}',['uses' =>'Web\WebController@donationDetail','as'=>'search.donation.details']);
			
		});

	  /* Donation Detail */
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
	Route::get('/donation/category/{key}',  [  'uses' => 'Web\CategoryController@categoryIdStoreInSession',     'as' => 'home.category.details' ]);





	Route::get('/about-us',['uses' =>'Web\WebController@aboutUs','as'=>'web.main.aboutUs']);
	Route::get('/contact-us',['uses' =>'Web\WebController@contactUs','as'=>'web.main.contactUs']);


	// Route::get('/index',['uses' =>'User\UserController@home','as'=>'user.home']);
	Route::get('/faq',['uses' =>'User\UserController@faq','as'=>'user.faq']);
	// Route::get('/favourite-ads',['uses' =>'User\UserController@favourite_ads','as'=>'user.favourite_ads']);

	 

	                                              //////////////////////////////
	                                             ////// Search Controller /////
	                                            //////////////////////////////



	Route::post('/get-featured',           [  'uses' => 'Web\SearchController@getDonationPost',         'as' => 'web.home.getDonation' ]);
	Route::get('/getPagingData/{page}',           [  'uses' => 'Web\SearchController@GetPagingData',         'as' => 'web.home.getPaging' ]);
	Route::post('/get-featured/list',      [  'uses' => 'Web\SearchController@getItemOnLoad',           'as' => 'web.home.getItemOnLoad' ]);
	 
	Route::post('/get-recomanded/list',    [  'uses' => 'Web\SearchController@getRecomandatePost',      'as' => 'web.detail.getRecomandatePost' ]);
	 
	/*
	Old
	Route::post('/get-scrollData',         [  'uses' => 'Web\SearchController@getScrollData',           'as' => 'web.home.getScrollData' ]);
	Route::post('/get-categories',         [  'uses' => 'Web\SearchController@getCategoryData',         'as' => 'web.home.getCategoryData' ]);
	Route::post('/get-subcategories',      [  'uses' => 'Web\SearchController@getsubCategoryData',      'as' => 'web.home.getsubCategoryData' ]);
	*/



	Route::get('/donation/report/{key}',      [  'uses' => 'Admin\ReportController@reportForm',          'as' => 'web.donation.reprot' ]);
	Route::post('/donation/report/{key}',     [  'uses' => 'Admin\ReportController@storeReport',         'as' => 'web.donation.storereprot' ]);
	Route::get('/donation/report/status/{key}',[  'uses' => 'Admin\ReportController@reportStatus',       'as' => 'admin.reprot.status' ]);
	Route::get('/donation/report/delete/{key}',[  'uses' => 'Admin\ReportController@reportDelete',       'as' => 'admin.reprot.delete' ]);


	Route::get('/donation/favoriate/{key}',   [  'uses' => 'Web\WebController@addToFavoriate',      'as' => 'web.donation.favoriate' ]);


	/* Old 
			Route::post('/get/condition',          ['uses'=> 'Web\SearchController@condition',      'as'=> 'search.condition.condition'           ]);
			Route::post('/get/consideration',      ['uses'=> 'Web\SearchController@consideration',  'as'=> 'search.consideration.consideration'   ]);
	 
	 */
	 
	/*
		Old
		Route::post('/get/category',           ['uses'=> 'Web\SearchController@category',       'as'=> 'search.categories.category'           ]);
		Route::post('/get/donation-type',      ['uses'=> 'Web\SearchController@donationType',       'as'=> 'search.donationcategories.Type'       ]);
	*/




	Route::post('/search/city',             ['as'=>'home.search.city',              'uses'=> 'Web\CityController@getCity']);

	/* All Query Used This Routes  In search Controller start */
	Route::post('/search/by-search-bar',    ['as'=>'home.searchPage.searchItem',    'uses'=> 'Web\SearchController@getItem']);
	/* All Query Used This Routes  In search Controller End */

	/*
		Old
	 Route::post('/search/by-dorpdown',      ['as'=>'search.dropdown.search',        'uses'=> 'Web\SearchController@dropDownSearchItem']);
	 
	*/
	 Route::post('/search/category',         ['as'=>'home.search.category',          'uses'=> 'Web\CategoryController@getCategory']);


	Route::post('/subcategory/list',        ['as'=>'search.category.subcategory',          'uses'=> 'Web\CategoryController@getSubcategory']);
	Route::post('/specification/list',        ['as'=>'search.subcategory.specification',   'uses'=> 'Web\SubcategoryController@getSpecification']);
	Route::post('/print/specific/list',        ['as'=>'search.specification.list',          'uses'=> 'Web\SearchController@getSpecificList']);

/* Search Controller  New Routes Start */

/* Route::get('/search',['uses'=>'Web\CategoryController@searchCategory','as' => 'web.categorie.searchCategory']);  

 */
/* Search Controller  New Routes End */
});
	// BIODATA
	Route::get('/biodata/form',     [ 'uses'=> 'Web\BioDataController@biodataDetailForm']);
	Route::post('/biodata/form',     [ 'uses'=> 'Web\BioDataController@store_biodata_detail',          'as'=> 'web.bioData.create'      ]);