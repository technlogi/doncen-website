<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Models\User , \App\Models\Category , \App\Models\Subcategory , \App\Models\Specification;
use DB;
use \Auth;

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


  public function changePassword(Request $request)
  {
    $this->validate($request,[
        'old_password' => 'required|min:6',
        'new_password' => 'required|min:6|confirmed',
    ]);



  }
  public function updateProfile(Request $request)
  {
    $this->validate($request,[
        'user_name' => 'required|min:3',
        'email' => 'required|min:6',
    ]);

  }







    
   
    public function details()
    {
        return view('web.details');
    }
    public function faq()
    {
        return view('web.faq');
    } 
    public function favourite_ads()
    {
        return view('web.favourite_ads');
    } 
    public function myProfile()
    {
        return view('web.myProfile');
    } 
    public function published()
    {
        return view('web.published');
    }
    public function deleteAccount()
    {
        $id = Auth::guard('user')->user()->id;
        $user = User::where('id',$id)->first();
        $total_post = DB::table('donation_posts')->where('user_id',$id)->count();
        return view('user.page.deleteAccount',compact('user','total_post'));
    } 
   
    
}
