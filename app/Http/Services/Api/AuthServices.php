<?php

 namespace App\Http\Services\Api;
 use \App\Models\User;
 use DB;
 class AuthServices
 {
     
    /**
     * Create User for Registration 
     */
    public function createUser($request)
    {
         $otp = generateOTP(); //Helper Function
         $user = User::create([
             'key' =>generateKey(1),
             'name' =>$request->name,
             'contact' =>$request->contact,
             'email' => $request->email,
             'password' => bcrypt($request->password),
             'otp' => $otp,
             'is_verify' => 0,
             'status' => 0,
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s') 
         ]);
    }
 
    /**
     * Check User key it exists or not  
     */ 
    public function checkUser($key)
    {
        try{
          if(User::where('key',$key)->count() > 0 )
          {
            $user = User::where('key',$key)->where('status',1)->where('is_verify',1)->first();
          }else{
            return [
                'response_code' => 401,
                'response' => 'error',
                'message' => 'Invalid User Identity.',
            ];
          }
        }catch(\Exception  $exception){
            return [
                    'response_code' => 401,
                    'response' => 'error',
                    'message' => 'Invalid Request.',
            ];
        }
    }
 }