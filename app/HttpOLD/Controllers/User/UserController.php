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
use \Auth,\Hash,\Mail,\Session;

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
            if(Session::has('changeMobileNumber')){
                $changeMobileNumber = 0;
            }else{
                $changeMobileNumber = 1;
            }
            return view('user.home',compact('user','total_post','changeMobileNumber'));
    }

    //request for change passwordp
    public function changePassword(ChangePasswordRequest $request)
    {
 
       /* if (!(Hash::check($request->old_password, Auth::guard('user')->user()->password))) {
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
 
        if(strcmp($request->old_password, $request->new_password) == 0){
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }*/
        $user = Auth::guard('user')->user();
        $user->password = bcrypt($request->new_password);
        $user->save();
        return redirect()->back()->with("success","Password changed successfully !");
    }
    //request for update profile of user
    public function updateProfile(UpdateProfileRequest $request)
    {
    	// echo "<pre>";
    	// print_r(User::where('id',Auth::guard('user')->user()->id)->first()); die;
        if(!Auth::guard('user')->check()){
            return redirect()->route('login')->with('error','You must login first.');
        }
        $search = explode(', ',$request->city);
        $city = check_for_city($search);
         User::where('id',Auth::guard('user')->user()->id)
         ->update([
             'city_id' => $city->id,
             'address' => $request->city,
             'name' => $request->user_name,
             'email' => $request->email
             ]);
        return redirect()->back()->with('success','Your profile update successfully.');   
    }
 
    //request for delete account of user
    public function deleteAccount()
    {
        if(!Auth::guard('user')->check()){
            return redirect()->route('login')->with('error','You must login first.');
        }
        $id = Auth::guard('user')->user()->id;
        $user = User::where('id',$id)->first();
        $total_post = DB::table('donation_posts')->where('user_id',$id)->count();
        return view('user.page.deleteAccount',compact('user','total_post'));
    }
	
	/* Confirm Delete */
	public function deleteAccountAction()
	{
		if(!Auth::guard('user')->check()){
			return redirect()->route('login')->with('error','You must login first.');
		}
		$id = Auth::guard('user')->user()->id;
		$user = User::where('id',$id)->first();
		$user->status = 0;
		$user->save();
		 auth('user')->logout();
		
		return redirect('/user/login');
	} 	
    //for specific user donation for logged in user only
    public function myDonation()
    {
        if(!Auth::guard('user')->check()){
            return redirect()->route('login')->with('error','You must login first.');
        }
        $id = Auth::guard('user')->user()->id;
        $user = User::where('id',$id)->first();
        $total_post = DB::table('donation_posts')->where('user_id',$id)->where('status',1)->count();
        return view('user.page.myDonation',compact('user','total_post'));
    }

    public function pandingDonation()
    {
        if(!Auth::guard('user')->check()){
          return redirect()->route('login')->with('error','You must login first.');
        }
        $id = Auth::guard('user')->user()->id;
        $user = User::where('id',$id)->first();
        $total_post = DB::table('donation_posts')->where('user_id',$id)->where('is_complete',0)->where('status',1)->count();
        return view('user.page.pandingDonation',compact('user','total_post'));
    }

    public function  donationComplete($key)
    {
        if(!Auth::guard('user')->check()){
            return redirect()->route('login')->with('error','You must login first.');
        }
        $id = Auth::guard('user')->user()->id;
        DB::table('donation_posts')->where('key',$key)->where('user_id',$id)->update([
            'is_complete' => 1,
            'updated_at' => new \DateTime(),
        ]);
        return redirect()->back()->with('success','Donation Post is Completed');
    }
    
    public function completeDonation()
    {
        if(!Auth::guard('user')->check()){
            return redirect()->route('login')->with('error','You must login first.');
        }
        $id = Auth::guard('user')->user()->id;
        $user = User::where('id',$id)->first();
        $total_post = DB::table('donation_posts')->where('user_id',$id)->where('is_complete',1)->where('status',1)->count();
      return view('user.page.CompleteDonation',compact('user','total_post'));
    }
    public function changeMobileNumber(Request $request){
        $this->validate($request ,[
             'mobile' => 'required|min:9|regex:/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/',
        ]);
        $id = Auth::guard('user')->user()->id;
        $user = User::where('id',$id)->first();
        $message = $user->otp." is your OTP for verify your new mobile number on Doncen.org";
        SMS_GATEWAY($request->mobile,$message);
        Session::put('changeMobileNumber',0);
        Session::put('MobileNumber',$request->mobile);
        return redirect()->route('user.home')->with(['success'=>"OTP has been send to your new mobile number."]);
    }
   



    
    public function contactUs(ContactUsRequest $request)
    {
      DB::table('contact_us')->insert([
          'key' => generateKey(15),
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
        if(!Auth::guard('user')->check()){
            return redirect()->route('login')->with('error','You must login first.');
        }
        $id = Auth::guard('user')->user()->id;
        $user = User::where('id',$id)->first();
        $total_post = DB::table('donation_posts')->where('user_id',$id)->where('is_urgent',1)->where('status',1)->count();
      return view('user.page.urgent',compact('user','total_post'));
    }

    public function favoriateDonation()
    {
        if(!Auth::guard('user')->check()){
            return redirect()->route('login')->with('error','You must login first.');
        }
        $id = Auth::guard('user')->user()->id;
        $user = User::where('id',$id)->first();
        $total_post = DB::table('favourite_posts')->where('user_id',$id)->where('status',1)->count();
      return view('user.page.favoriateDonation',compact('user','total_post'));
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
