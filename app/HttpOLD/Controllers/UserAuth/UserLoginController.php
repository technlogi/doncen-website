<?php

namespace App\Http\Controllers\UserAuth;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegistration,
    App\Http\Requests\ResetPasswordForm;
use App\Http\Controllers\Controller;
use App\Models\User;
use \Mail,\Auth,\Hash,\Session;

class UserLoginController extends Controller
{
               /* Registration Process  */
    //Show registration form to fill user details
    public function showLoginForm()
    {
        if (Auth::guard('user')->check()){
            session()->flash('error', 'You be logout for regirstration.');
           return redirect('/user/dashboard');
        }
        return view('user.auth.login');
    }
	
	public function showLoginViaOtp()
	{
		if (Auth::guard('user')->check()){
            session()->flash('error', 'You be logout for regirstration.');
           return redirect('/user/dashboard');
        }
        return view('user.auth.login_via_otp');
	}
	
    // store user information in db
    public function login(Request $request)
    {
    
	
      try{
            $user = User::where('contact',$request->contact)->where('status',1)->first();
          
            if($user->is_verify == 0 ){
               return redirect()->route('login')->with('error',"This contact No is not varified yet..");  
            }
			
            if(!empty($user)){
                $message = $user->otp." is your OTP for verification at the time of Login on Doncen.org";
                SMS_GATEWAY($user->contact,$message);
            }
            return redirect()->route('user.login.otpForm',$user->key)->with('success','OTP has been sent on your mobile.');   
            
        }catch (\Exception $e) {
               return redirect()->route('login')->with('error',"This contact No is not registred and varified..");
        }
    }
    public function redirect_form()
    {
        return redirect()->route('user.login')->with('error',"This contact No is not registred and varified..");
    }
    public function submitOtpForm(Request $request)
    {
        $user = User::where('contact',$request->contact)->where('status',1)->first();
        if($user){
            $message = $user->otp." is your OTP for verification at the time of Login on Doncen.org";
            SMS_GATEWAY($user->contact,$message);
            $user_identity = $user->key ;
        }else{
           return redirect()->back()->with('error',"Invalid Contact No.");
        }
       return redirect()->route('user.login.show.otpForm',$user_identity)->with('success','OTP has been sent on your mobile.'); 
    }
	
	
	public function submitPinForm(Request $request)
	{
		
		$this->validate($request,[
			'contact'=>'required|min:10|max:10',
			'password'=>'required'
		
		]);
		$user = User::where('contact',$request->contact)->where('status',1)->first();
        if($user){
          if($user->is_verify == 0 ){
               return redirect()->route('user.login.loginForm')->with('error',"This contact number is not varified yet.");  
          }
			if(Auth::guard('user')->attempt(['contact'=> $user->contact,'password'=>$request->password])){
                     $user->key = generateKey(1);
					$user->save();
                    if(Session::has('specification') && session('specification') !== ''){
                        return redirect()->route('web.donation.DetailForm', session('specification'));
                    }
                    return redirect('/user/dashboard');
                }else{
                    return redirect()->back()->with('error','Something went wrong.');
                }
        }
		else{
           return redirect()->back()->with('error',"Invalid Contact No.");
        }
       
	}
    //show otp from for registration
    public function showOtpForm($key)
    {
        $user = User::where('key',$key)->first();
        if($user){
            $user_identity = $user->key ;
            $otp = $user->otp;
        }else{
           return redirect()->back()->with('error',"Invalid Contact No.");
        }
        return view('user.auth.otp_form',compact('user_identity','user','otp'));
    }
                 /* Reset Password Process  */
    //cheak otp to complete registration process
    public function otpSubmit(Request $request)
    {
        $this->validate($request,[
            'otp'=>'required|regex:/^\d{4}$/'
        ],[
            'otp.required' => "Please Enter OTP.",
            'otp.regex' => "OTP must be 4 digit.",
            ]);
            
            if(User::where('key',$request->key)->count() > 0){
                $user = User::where('key',$request->key)->first();
                    if($user->otp == $request->otp){
                        $user->otp = generateOtp();
                        $user->key = generateKey(1);
                        
                if(Auth::guard('user')->loginUsingId($user->id)){
                    $user->save();
                    if(Session::has('specification') && session('specification') !== ''){
                        return redirect()->route('web.donation.DetailForm', session('specification'));
                    }
                    return redirect('/user/dashboard');
                }else{
                    return redirect()->back()->with('error','Something went wrong.');
                }
            }else{
                return redirect()->back()->with('error','Invalid OTP. Please try again.');
            }
        }else{
            return redirect()->back()->with('error','Something went wrong. Please Login again.');
        }
        
    }
     public function submitOtp(Request $request)
    {
        
         $this->validate($request,[
            'otp'=>'required|regex:/^\d{4}$/'
        ],[
            'otp.required' => "Please Enter OTP.",
            'otp.regex' => "OTP must be 4 digit.",
            ]);
          try{
              $id = Auth::guard('user')->user()->id;
              $user = User::where('id',$id)->first();
              if($user->otp == $request->otp){
                  $user->otp = generateOtp();
                  $user->contact = Session::get('MobileNumber');
                  $user->save();
                  Session::forget('MobileNumber');
                  Session::forget('changeMobileNumber');
                return redirect()->route('user.home')->with('success','Mobile number has been changed successfully.');    
              }else{
                return redirect()->back()->with('error','Invalid OTP. Please try again.');    
              }           

          }catch(\Exception $e){
              Session::forget('MobileNumber');
              Session::forget('changeMobileNumber');
              return redirect()->back()->with('error','This mobile number is alredy exist. Please try again.');
          }  
    }


}
