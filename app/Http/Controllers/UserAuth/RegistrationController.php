<?php

namespace App\Http\Controllers\UserAuth;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegistration;
use App\Http\Requests\ResetPasswordForm;
use App\Http\Requests\ResetPassword;
use App\Http\Controllers\Controller;
use App\Models\User;
use \Mail,\Auth,\Hash,\Session;

class RegistrationController extends Controller
{
               /* Registration Process  */
    //Show registration form to fill user details
    public function showRegistrationForm()
    {
        if (Auth::guard('user')->check()){
            session()->flash('error', 'You be logout for regirstration.');
           return redirect('/user/dashboard');
        }
        return view('user.auth.register');
    }
    // store user information in db
    public function register(UserRegistration $request)
    { 
        //Come from .env file for address to lat long (googleapi)
        $url = env("MAP_API_URL");
        $sensor = env("SENSOR");
        $region = env("REGION");
        $key = env("MAP_KEY");
        
        if(!empty($request->address))
        {
            $geo = file_get_contents($url.'?address='.urlencode($request->address).'&sensor='.$sensor.'&region='.$region.'&key='.$key);
            // $json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=$region");
            $geo = json_decode($geo, true); // Convert the JSON to an array
    
            if (isset($geo['status']) && ($geo['status'] == 'OK')) {
                $latitude = $geo['results'][0]['geometry']['location']['lat']; // Latitude
                $longitude = $geo['results'][0]['geometry']['location']['lng']; // Longitude
            }else{
                $latitude ="";
                $longitude= "";
            }
        }
        else
        {
            $latitude ="";
            $longitude= "";
        }
      try{
        $search = explode(',',trim($request->address));
        $city = check_for_city($search);
        // $test_key=bcrypt($request->password);
        $input = $request->all();

                   // echo "<pre>";print_r($input);die;
        $user = User::where('contact',$request->contact)->first();  //returning null on registration
            if($user == null){

                $user_data=array();
                    $user_data['key']= generateKey(1);
                    $user_data['name'] = $request->name;
                    // 'email' => $request->email,
                    $user_data['contact'] = $request->contact;
                    $user_data['password'] = bcrypt($request->password);
                    $user_data['user_status'] = $request->user_status;
                    $user_data['lat'] = $latitude;
                    $user_data['long'] = $longitude;
                    $user_data['address'] = $request->address;
                    $user_data['city_id'] = $city;//->id;
                    $user_data['otp'] = generateOtp();
                    $user_data['system_code'] = '';
                    $user_data['ip_address'] = $request->ip();
                    $user_data['is_verify']= 0;
                    $user_data['status'] = 1;
                    
                           // echo "<pre>";print_r($city);echo "<hr>";print_r($input);echo "<hr>";print_r($user_data);die;
               $user = User::create($user_data);
               /*$user = User::create([
                    'key'=> generateKey(1),
                    'name' => $request->name,
                    // 'email' => $request->email,
                    'contact' => $request->contact,
                    'password' => bcrypt($request->password),
                    'user_status' => $request->user_status,	
                    'lat' => $latitude,
                    'long' => $longitude,
                    'address' => $request->address,
                    'city_id' => $city->id,
                    'otp' => generateOtp(),
                    'system_code' => $request->ip(),
                    'is_verify'=> 0,
                    'status' => 1
                    ]);*/
                        
                        //   echo "<pre>";print_r($$user_data);die;

                    $message = "Dear User,
".$user->otp." is your one time password (OTP). Please enter the OTP to proceed.

Thank you
Team Doncen.org ";
                    SMS_GATEWAY($user->contact,$message);
                        // Mail::send('emails.otp', ['user' => $user], function ($m) use ($user) {
                        //     $m->from('hello@app.com', 'Doncen.com');
                        //     $m->to($user->email, $user->name)->subject('Last step for registration!');
                        // });

                    return redirect()->route('user.registration.otpForm',$user->key)->with('success','OTP has been sent on your mobile. ');
            }
            else
            {
                if($user != null && $user->is_verify == 0)
                {
                    $user->name = $request->name;
                    $user->password = bcrypt($request->password);
                    $user->system_code = $request->ip();
                    $user->updated_at = new \DateTime();
                    
                    
                    
                    $user->otp = generateOtp();
                    $user->save();
                    
                    $message = "Dear User,
".$user->otp." is your one time password (OTP). Please enter the OTP to proceed.

Thank you
Team Doncen.org ";
                    SMS_GATEWAY($user->contact,$message);
                    return redirect()->route('user.registration.otpForm',$user->key)->with('success','OTP has been sent on your mobile. ');
                }
                else
                {
                    return redirect()->route('register')->with('error',"Alerady registered mobile number.");
                }
            }


        }catch (\Exception $e) {
            
               return redirect()->route('register')->with('error',"Something went wrong.");
        }
    }
    //show otp from for registration
    public function showOtpForm($key)
    {
        $user_identity = $key ;
        return view('user.auth.passwords.otp_form',compact('user_identity'));
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
                $user->is_verify = 1;
                $user->status = 1;
                	$user->save();
				  
				//   session()->flash('success','Registration Successfully.');
                // return redirect()->back()->with('success','Registration Successfully.');
                // Mail::send('emails.success', ['user' => $user], function ($m) use ($user) {
                //     $m->from('hello@app.com', 'Doncen.com');
                //     $m->to($user->email, $user->name)->subject('Registration Successfull on Doncen!');
                // });
                /* return view('web.page.registrationSuccess'); */
				
				if(Auth::guard('user')->loginUsingId($user->id)){
             
                    if(Session::has('specification') && session('specification') !== ''){
                        return redirect()->route('web.donation.DetailForm', session('specification'));
                    }
					
                    return redirect('/user/dashboard');
				}
				
             }else{
                return redirect()->back()->with('error','Invalid OTP. Please try again.');
            } 
        }else{
            return redirect()->back()->with('error','Something went wrong. Please register again.');
        }
        
    }
    

    // resend otp
    public function resendOtp($key)
    {
       $user = User::where('key',$key)->first();
       $message = "Dear User,
        ".$user->otp." is your one time password (OTP). Please enter the OTP to proceed.

        Thank you
        Team Doncen.org ";
            SMS_GATEWAY($user->contact,$message);
       return redirect()->back()->with('success','OTP has been resend on your mobile.');
    }
    //Enter mobile no to get otp page
    public function resetPasswordForm()
    {
        return view('user.auth.passwords.email');
    }
    
    //cheak Mobile No and send otp and redirect to otp window 
    public function cheakContact(ResetPasswordForm $request)
    {
        try{
            if(User::where('contact',$request->mobile_no)->count() > 0 )
            {
                $user = User::where('contact',$request->mobile_no)->first();
                // $message = "Dear User,
// ".$user->otp." is your one time password (OTP). Please enter the OTP to proceed.

// Thank you
// Team Doncen.org ";
                // SMS_GATEWAY($user->contact,$message);
            
                return redirect()->route('user.resetpassword.OtpForm',$user->key)->with('success','OTP has been sent on your mobile. ');   
            }else{
                return redirect()->back()->with('error','This Mobile no is not found in database.');
            }
        }catch (\Exception $e) {
            return redirect()->back()->with('error','Something went wrong. Please try again.');   
        }
    }
   // enter opt form for reset password
    public function ResetOtpForm($key)
    {
        $user_identity = $key ;
        return view('user.auth.passwords.OtpForm',compact('user_identity'));
    }
    //validate otp and redirect to reset password form 
    public function ResetCheckOtp(Request $request)
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
                 $user->save();
                 return redirect()->route('user.resetpassword.resetPasswordForm',$user->key)->with('success','Create New Password Here.');
             }else{
                 return redirect()->back()->with('error','Invalid OTP. Please try again.');
             }
         }else{
             return redirect()->back()->with('error','Something went wrong. Please try again.');
         }
    }
    //reset password form form enter new password
    public function showResetPasswordForm($key)
    {
        $user_identity = $key ;
        return view('user.auth.passwords.reset',compact('user_identity'));
    }
    //change password on click of submit button
    public function resetPassword(ResetPassword $request)
    {
        try{
            $user =  User::Where('key', $request->key)->where('status',1)->first();
            $user->password = bcrypt($request->password);
            $user->key = generateKey(1);
            $user->save();
            return redirect('/user/login')->with('success',"Password changed successfully!");
        }  catch(\Exception  $exception){
            return redirect('/user/login')->with('error',"Something went wrong!");
        }
    }

}
