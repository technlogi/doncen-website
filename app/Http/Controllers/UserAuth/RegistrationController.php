<?php

namespace App\Http\Controllers\UserAuth;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegistration;
use App\Http\Controllers\Controller;
use App\Models\User;
use \Mail;

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
            'contact' => $request->contact,
            'password' => bcrypt($request->password),
            'otp' => generateOtp(),
            'is_verify'=> 0,
            'status' => 1
            ]);
            $message = $user->otp." is your OTP for verification at the time of registration on Doncen.org";
            SMS_GATEWAY($user->contact,$message);
            Mail::send('emails.otp', ['user' => $user], function ($m) use ($user) {
                $m->from('hello@app.com', 'Doncen.com');
                $m->to($user->email, $user->name)->subject('Last step for registration!');
            });
            return redirect()->route('user.registration.otpForm',$user->key)->with('success','OTP has been sent on your mobile.');   
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
                //   session()->flash('success','Registration Successfully.');
                // return redirect()->back()->with('success','Registration Successfully.');
                Mail::send('emails.success', ['user' => $user], function ($m) use ($user) {
                    $m->from('hello@app.com', 'Doncen.com');
                    $m->to($user->email, $user->name)->subject('Registration Successfull on Doncen!');
                });
                return view('web.page.registrationSuccess');
            }else{
                return redirect()->back()->with('error','Invalid OTP. Please try again.');
            }
        }else{
            return redirect()->back()->with('error','Something went wrong. Please register again.');
        }
        
    }
}
