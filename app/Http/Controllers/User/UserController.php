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
use \Auth,\Hash,\Mail;

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
        // $request->city = substr($request->city ,0,strpos($request->city,','));
        //  User::where('id',Auth::guard('user')->user()->id)
        //  ->update([
        //         'city' => $request->city
        //      ]);
      
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
    public function  donationComplete($key)
    {
        $id = Auth::guard('user')->user()->id;
        DB::table('donation_posts')->where('key',$key)->where('user_id',$id)->update([
            'is_complete' => 1,
            'updated_at' => new \DateTime(),
        ]);
        return redirect()->back()->with('success','Donation Post is Completed');
    }
    
    public function completeDonation()
    {
        $id = Auth::guard('user')->user()->id;
        $user = User::where('id',$id)->first();
        $total_post = DB::table('donation_posts')->where('user_id',$id)->where('status',1)->count();
      return view('user.page.CompleteDonation',compact('user','total_post'));
    }

    public function contactUs(ContactUsRequest $request)
    {
      DB::table('contact_us')->insert([
         'name' => $request->name,
         'email' => $request->email,
         'subject' => $request->subject,
         'message' => $request->message,
         'status' => 0,
         'created_at' => new \DateTime(),
         'updated_at' => new \DateTime(),
      ]);
      return redirect()->back()->with('success','Your Suggestion is submited We will contact You soon! Thank You.');   
    }

    public function  urgentRequirement()
    { 
        $id = Auth::guard('user')->user()->id;
        $user = User::where('id',$id)->first();
        $total_post = DB::table('donation_posts')->where('user_id',$id)->where('status',1)->count();
      return view('user.page.urgent',compact('user','total_post'));
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
