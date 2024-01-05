<?php

Route::get('/dashboard', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('user')->user();

    $id = Auth::guard('user')->user()->id;
    $user = \App\Models\User::where('id',$id)->first();
    $total_post = DB::table('donation_posts')->where('user_id',$id)->count();
    $blood_group = DB::table('blood_groups')->get();
    
    return view('user.home',compact('user','total_post', 'blood_group'));
})->name('home')->middleware('activitylog');

// Route::get('/dashboard',['as' =>'user.home','uses'=> 'User\UserController@dashboard']);