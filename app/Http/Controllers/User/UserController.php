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
        if(!Auth::guard('user')->check()){
            return redirect()->route('login')->with('error','You must login first.');
        }
        $city_name = explode(', ',$request->city);
        // // ===============================================================================================
        // print_r($city_name);
        // $length = sizeof($city_name);
        //  if($length >= 1){       
        //     $country_name = $city_name[$length -1 ];
        //     $country = DB::table('countries')->where('name','LIKE',$country_name)->first();
        //     if(empty($country)){
        //         $state = DB::table('states')->where('name','LIKE',$country_name)->first();
        //         if(empty($state)){
        //             $city = DB::table('cities')->where('name','LIKE',$country_name)->first();
        //             if(empty($city)){
        //                 $id = DB::table('countries')->insertGetId(['name' =>$country_name,'key'=>generateKey(8),'sort_name'=>$country_name,'status'=>1,'created_at'=>new \DateTime(),'updated_at'=>new \DateTime() ]);
        //                 $id = DB::table('states')->insertGetId(['name' =>$country_name,'key'=>generateKey(8),'sort_name'=>$country_name,'status'=>1,'created_at'=>new \DateTime(),'updated_at'=>new \DateTime() ]);
                        
        //             }else{
        //                 return $city;
        //             }
        //         }
        //     }
        //   }
        //   if($length >= 2){
        //     $state_name = $city_name[$length - 2 ];
        //     $country = DB::table('countries')->where('name','LIKE',$city_name[$length -1 ])->first();
        //     $state = DB::table('states')->where('name','LIKE',$state_name)->first();
        //     if(empty($state)){
        //         $city = DB::table('cities')->where('name','LIKE',$state_name)->first();
        //         if(empty($city)){
        //             $id = DB::table('state')->insertGetId(['name' =>$state_name,'key'=>generateKey(8),'country_id'=>$country->id,'status'=>1,'created_at'=>new \DateTime(),'updated_at'=>new \DateTime() ]);
        //         }
        //     }
        //  }
        //  if($length >= 3){
        //     $state_name = $city_name[$length - 3 ];
        //     $state = DB::table('states')->where('name','LIKE',$city_name[$length - 2 ])->first();
        //     $city = DB::table('cities')->where('name','LIKE',$state_name)->first();
        //     if(empty($city)){
        //         $id = DB::table('state')->insertGetId(['name' =>$state_name,'key'=>generateKey(8),'country_id'=>$state->id,'status'=>1,'created_at'=>new \DateTime(),'updated_at'=>new \DateTime() ]);
        //     }
        //  }
        //   echo $country_name;


        // ===============================================================================================
        $city = \App\Models\City::where('name','LIKE','%'.$city_name[sizeof($city_name)-3].'%')->first();
         User::where('id',Auth::guard('user')->user()->id)
         ->update([
             'city_id' => $city->id,
             'address' => $request->city
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
        $total_post = DB::table('donation_posts')->where('user_id',$id)->where('status',1)->count();
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
        if(!Auth::guard('user')->check()){
            return redirect()->route('login')->with('error','You must login first.');
        }
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
