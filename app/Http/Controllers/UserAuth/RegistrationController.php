<?php

namespace App\Http\Controllers\UserAuth;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegistration;
use App\Http\Controllers\Controller;
use App\Models\User;
class RegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('user.auth.register');
    }
    public function register(UserRegistration $request)
    {
      try{
       $user = User::create([
            'key'=> generateKey(1),
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->mobile_no,
            'password' => bcrypt($request->password),
            'otp' => generateOtp(),
            'is_verify'=> 0,
            'status' => 1
            ]);
            return redirect()->route('user.registration.otpForm',$user->key)->with('success','OTP is send to Email Id provided.');   
       }catch (\Exception $e) {
        return redirect()->back()->with('error','User Alerady exist with this Email Id.');   
       }
    }
    
    public function showOtpForm($key)
    {
        $user_identity = $key ;
        return view('user.auth.passwords.otp_form',compact('user_identity'));
    }
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
                $user->is_verify = 1;
                $user->status = 1;
                $user->save();
                  session()->flash('success','Registration Successfully.');
                return redirect()->back()->with('success','Registration Successfully.');
            }else{
                return redirect()->back()->with('error','Invalid OTP. Please try again.');
            }
        }else{
            return redirect()->back()->with('error','You are not valid User.Please Registration Again.');
        }
        
    }
}
