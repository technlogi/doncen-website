<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Api\Validate;
use App\Http\Services\Api\AuthServices;
use App\Models\User;

class AuthController extends Controller
{
    protected $validate;
    protected $authServices;
    
    public function __construct(Validate $validate,AuthServices $authServices)
    {
        $this->validate = $validate;
        $this->authServices = $authServices;
    }
   
    /**
     * Login ohter function 
      */
      public function login(Request $request)
      {

      }
    /**
    * To Register a user and send otp to email and contact no 
    */
    public function register(Request $request)
    {
        if($this->validate->validateRegistrationRequest($request)) return $this->validate->validateRegistrationRequest($request);
            try{
                $this->authServices->createUser($request);
                // if(!empty($request->email)){
                //     Mail::to($request->email)->send(new RegistrationOTP($user));
                // } 
                $user = User::where('contact',$request->contact)->first();
                return response()->json([
                    'response' => 'success',
                    'message' => ['success' => "OTP has been sent." ,'otp' =>$user->otp, 'key' =>$user->key  ]
                ]);
            }catch(\Exception  $exception){
                $user = User::where('contact',$request->contact)->first();
                if($user->is_verify == 0){
                    return response()->json([
                        'response' => 'success',
                        'message' => "You are alerady Registred just verified your contact."
                    ]);
                }else{
                    return response()->json([
                        'response' => 'error',
                        'message' => "You are alerady verified user."
                    ]);
            }
            return response()->json([
                'response_code'=>401,
                'response' => 'error',
                'message' => 'Email and Contact alerady been taken.',
            ]);
        }        
    }
   
    /**
     *  To get Otp from user site 
    */
    public function getOtp(Request $request)
    {
        if($this->validate->validateKey($request)) return $this->validate->validateKey($request);
        if($this->authServices->checkUser($request->key)) return $this->authServices->checkUser($request->key);
        try{
            $user = User::Where('key', $request->key)->first();
                return response()->json([
                        'response' => 'success',
                        'result' => [
                            'otp' => $user->otp
                        ],
                ]);
        }catch(\Exception  $exception){
            return [
                    'response_code' => 401,
                    'response' => 'error',
                    'message' => 'Invalid Request.',
            ];
        }
    }
    
    /**
     *  To submit the otp and cheak wheter otp is right/wrong 
    */
    public function submitOtp(Request $request)
    {  
        if($this->validate->validateOtp($request)) return $this->validate->validateOtp($request);
        if($this->validate->validateKey($request)) return $this->validate->validateKey($request);
        if($this->authServices->checkUser($request->key)) return $this->authServices->checkUser($request->key);
        try{
                $user = User::Where('key', $request->key)->first();
                if($user->otp == $request->otp){
                    $user->otp = generateOtp();
                    $user->status = 1;
                    $user->is_verify = 1;
                    $user->save();
                    return response()->json([
                            'response' => 'success',
                            'message' => 'OTP matched. Your Registration is Completed.',
                    ]);
                }else{
                    return response()->json([
                            'response_code' => 401,
                            'response' => 'error',
                            'message' => 'OTP not matched. Please try again.',
                    ]);
                }
        }catch(\Exception  $exception){
            return response()->json([
                    'response_code' => 401,
                    'response' => 'error',
                    'message' => 'Invalid request.',
            ]);
        }
    }

    /**
     * Change password old password is required
    */
    public function changePassword(Request $request)
    {
        if($this->validate->validatechangePassword($request)) return $this->validate->validatechangePassword($request);
        try{
            $user =\App\User::Where('key', $request->key)->where('status',1)->first();
             if (!(Hash::check($request->old_password, $user->password))) {
                return response()->json([
                        'response' => 'error',
                        'message' => "Your current password does not matches with the password you provided. Please try again.",
                 ], 401);
            }
            if(strcmp($request->old_password, $request->new_password) == 0){
                return response()->json([
                        'response' => 'error',
                        'message' => "New Password cannot be same as your current password. Please choose a different password.",
                 ], 401);
            }
                $user->password = bcrypt($request->new_password);
                $user->save();
                return response()->json([
                        'response' => 'success',
                        'message' => "Password changed successfully !",
                 ]);
             
           } catch(\Exception  $exception){
                 return response()->json([
                        'response' => 'error',
                        'message' => 'Invalid request.',
                 ], 401);
                }
    }

    /**
     * Forgot Password
     */
    public function forgotPassword(Request $request)
    {
        if($this->validate->validateContact($request)) return $this->validate->validateContact($request);
        try{
            $user = User::Where('contact', $request->mobile_no)->where('status',1)->first();
            $user->otp = generateOTP();
            $user->save();
            return response()->json([
                      'response' => 'success',
                      'message' => 'OTP sent.',
                      'OTP' => $user->otp
               ]);
          }catch(\Exception  $exception){
               return response()->json([
                      'response_code' => 401,
                      'response' => 'error',
                      'message' => 'Mobile Number not found in database.',
               ]);
          }
    }

    /**
     * Reset Password Only new_password and confirm password
     */
    public function resetPassword(Request $request)
    {
        if($this->validate->validateContact($request)) return $this->validate->validateContact($request);
        if($this->validate->validateNewPassword($request)) return $this->validate->validateNewPassword($request);
        try{
          $user = User::Where('contact', $request->mobile_no)->first();
          $user->password = bcrypt($request->new_password);
          $user->save();
          return response()->json([
                    'response' => 'success',
                    'message' => 'Password reset Successfully.',
             ]);
        }catch(\Exception  $exception){
             return response()->json([
                    'response_code' => 401,
                    'response' => 'error',
                    'message' => 'Mobile Number not found in database.',
             ]);
        }
    }    

    /**
     * User Info
    */
    public function getAuthUser(Request $request)
    {
      if($this->validate->validateKey($request)) return $this->validate->validateKey($request);
      if($this->authServices->checkUser($request->key)) return $this->authServices->checkUser($request->key);
      
      try{
        $user = User::where('key',$request->token)->select('name','email','contact as mobile_no')->where('is_verify',1)->where('status',1)->first();
        // $user_info =     DB::table('users as u')
        //                     ->select('u.first_name','u.referral_code as ref_code','u.last_name','u.key','u.contact AS mobile','u.account_no AS wallet_no','u.email','LT.login_type_name AS user_type','u.user_name')
        //                     ->join('login_types as LT','u.user_types_id','=','LT.id')
        //                     ->where('u.id',$user->id)
        //                     ->first();
          
        // $profile = DB::table('user_profiles')->where('user_id',$user->id)->select('profile_pic')->first();
        // if($profile){
        //     $profile_url = profile_pic(). $profile->profile_pic;
        // }else{
        //     $profile_url = profile_pic().'preview.jpg';
        // }
        // $user_data_image = array_add((array)$user_info, 'profile_pic', $profile_url);
        // $user_data       = array_add((array)$user_data_image, 'available_balance', $this->availableBalance($request->token));
        return response()->json([
               'response' => 'success',
               'result' => $user
             ]);
        }catch(\Exception  $exception){
            return response()->json([
                    'response_code' => 401,
                    'response' => 'error',
                    'message' => 'Invalid token.',
                ]);
        }
    }
}