<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Http\Requests\ContactUsRequest,
    \App\Http\Requests\UpdateProfileRequest,
    \App\Http\Requests\ChangePasswordRequest;
use \App\Models\User ,
    \App\Models\Category , 
    \App\Models\Subcategory ,
    \App\Models\Specification;
use DB;
use \Auth,\Hash;

class UserController extends Controller
{
    public function  dashboard()
    {
            $users[] = Auth::user();
            $users[] = Auth::guard()->user();
            $users[] = Auth::guard('user')->user();
            // dd($users);
            $id = Auth::guard('user')->user()->id;
            $user = User::where('id',$id)->first();
            $total_post = DB::table('donation_posts')->where('user_id',$id)->count();



            return view('user.home',compact('user','total_post'));
    }

    //request for change passwordp
    public function changePassword(ChangePasswordRequest $request)
    {
 
        if (!(Hash::check($request->old_password, Auth::guard('user')->user()->password))) {
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
 
        if(strcmp($request->old_password, $request->new_password) == 0){
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        $user = Auth::guard('user')->user();
        $user->password = bcrypt($request->new_password);
        $user->save();
        return redirect()->back()->with("success","Password changed successfully !");
    }
    //request for update profile of user
    public function updateProfile(UpdateProfileRequest $request)
    {

    }

    //request for delete account of user
    public function deleteAccount()
    {
        $id = Auth::guard('user')->user()->id;
        $user = User::where('id',$id)->first();
        $total_post = DB::table('donation_posts')->where('user_id',$id)->count();
        return view('user.page.deleteAccount',compact('user','total_post'));
    } 
    //for specific user donation for logged in user only
    public function myDonation()
    {
        $id = Auth::guard('user')->user()->id;
        $user = User::where('id',$id)->first();
        $total_post = DB::table('donation_posts')->where('user_id',$id)->where('status',1)->count();
        return view('user.page.myDonation',compact('user','total_post'));
    }


    public function contactUs(ContactUsRequest $request)
    {
        
    }







    public function faq()
    {
        return view('web.faq');
    } 
    public function favourite_ads()
    {
        return view('web.favourite_ads');
    } 
   
    public function published()
    {
        return view('web.published');
    }
}
