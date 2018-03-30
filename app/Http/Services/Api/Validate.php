<?php
 namespace App\Http\Services\Api;
 use Validator;

 class Validate 
 {
    /**
     *  Validation for registration
     */
    public function validateRegistrationRequest($request)
    {
        $validator = Validator::make($request->all(), ['name' => 'required']);
        if ($validator->fails()) {
                return [ 'response_code'=>401,
                        'response' => 'error',
                        'message'=> "The Name field is required."
                ];            
        }
        $validator = Validator::make($request->all(), ['email' => 'nullable|email']);
        if ($validator->fails()) {
                return [ 'response_code'=>401,
                         'response' => 'error',
                         'message'=> "The email must be a valid email address."
                ];            
        }

        $validator = Validator::make($request->all(), ['email' => 'nullable|unique:users']);
        if ($validator->fails()) {
                return [ 'response_code'=>401,
                            'response' => 'error',
                        'message'=> "The email has already been taken."
                ];            
        }
        $validator = Validator::make($request->all(), ['contact' => 'required']);
            if ($validator->fails()) {
                    return [ 'response_code'=>401,
                            'response' => 'error',
                            'message'=> "The mobile No is required."
                    ];            
            }

         $validator = Validator::make($request->all(), ['contact' => 'regex:/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/']);
            if ($validator->fails()) {
                    return [ 'response_code'=>401,
                            'response' => 'error',
                            'message'=> "The mobile No must be 10 digit without country code."
                        ];            
            }
            $validator = Validator::make($request->all(), ['contact' => 'unique:users']);
            if ($validator->fails()) {
                    return [ 'response_code'=>401,
                            'response' => 'error',
                            'message'=> "The mobile No Number has already been taken."
                          ];            
            }
            $validator = Validator::make($request->all(), ['password'=> 'required']);
            if ($validator->fails()) {
            return ['response_code'=>401,
                    'response' => 'error',
                    'message'=>  "The password field is required."
                    ];            
            }
            $validator = Validator::make($request->all(), ['password'=> 'min:6']);
            if ($validator->fails()) {
                return ['response_code'=>401,
                        'response' => 'error',
                        'message'=> "The password must be at least 6 characters."
                        ];            
            }
             $validator = Validator::make($request->all(), ['password'=> 'max:20']);
            if ($validator->fails()) {
                return ['response_code'=>401,
                        'response' => 'error',
                        'message'=> "The password must less then 20 characters."
                        ];            
            }
            $validator = Validator::make($request->all(), ['password'=> 'confirmed']);
            if ($validator->fails()) {
                return ['response_code'=>401,
                        'response' => 'error',
                        'message'=> "The password and confirmation password doesn't match."
                        ];            
            }
      
    }
   /**
     * Validate Key is required
     */
    public function validateKey($request)
    {
            $validator = Validator::make($request->all(), ['key' => 'required']);
            if ($validator->fails()) {
                return [    'response_code'=>401,
                            'response' => 'error',
                            'message'=> "Please enter user Identity"
                       ];             
            } 
    }
    /**
     * Validate Otp for length and regex 
     */
    public function validateOtp($request)
    {
        $validator = Validator::make($request->all(), ['otp' => 'required']);
        if ($validator->fails()) {
            return ['response_code'=>401,
                    'response' => 'error',
                    'message'=> "The otp field is required."
                    ];            
        }
        $validator = Validator::make($request->all(), ['otp' => 'regex:/^\d{4}$/']);
        if ($validator->fails()) {
            return ['response_code'=>401,
                    'response' => 'error',
                    'message'=> "The otp must be 4 digit."
                    ];            
      }
    }

    /**
     * Change Password validation 
     */
    public function validatechangePassword($request)
    {
         $validator = Validator::make($request->all(), ['old_password'=> 'required']);
        if ($validator->fails()) {
            return ['response_code'=>401,
                    'response' => 'error',
                    'message'=> "The old password field is required."
                    ];            
        }
        $validator = Validator::make($request->all(), ['old_password'=> 'min:6']);
        if ($validator->fails()) {
            return ['response_code'=>401,
                    'response' => 'error',
                    'message'=> "The old password must be at least 6 characters."
                    ];            
        }
        $validator = Validator::make($request->all(), ['new_password'=> 'required']);
        if ($validator->fails()) {
            return ['response_code'=>401,
                    'response' => 'error',
                    'message'=>  "The new password field is required."
                    ];            
        }
        $validator = Validator::make($request->all(), ['new_password'=> 'min:6']);
        if ($validator->fails()) {
            return ['response_code'=>401,
                    'response' => 'error',
                    'message'=> "The new password must be at least 6 characters."
                    ];            
        }
           $validator = Validator::make($request->all(), ['new_password'=> 'max:20']);
        if ($validator->fails()) {
            return ['response_code'=>401,
                    'response' => 'error',
                    'message'=> "The new password must less  then 20 characters."
                    ];            
        }
        $validator = Validator::make($request->all(), ['new_password'=> 'confirmed']);
        if ($validator->fails()) {
            return ['response_code'=>401,
                    'response' => 'error',
                    'message'=>  "The new password confirmation does not match."
                    ];            
        }
    }
    
    /**
     * Reset Password Validation 
    */
    public function validateResetPassword($request)
    {
        $validator = Validator::make($request->all(), ['new_password'=> 'required']);
        if ($validator->fails()) {
            return [   'response_code'=>401,
                        'response' => 'error',
                        'message'=>  "The new password field is required."
                    ];            
        }
        $validator = Validator::make($request->all(), ['new_password'=> 'min:6']);
        if ($validator->fails()) {
            return [  'response_code'=>401,
                    'response' => 'error',
                    'message'=> "The new password must be at least 6 characters."
                ];            
        } 
         $validator = Validator::make($request->all(), ['new_password'=> 'max:20']);
            if ($validator->fails()) {
                return ['response_code'=>401,
                    'response' => 'error',
                    'message'=> "The password must less then  20 characters."
                        ];            
            }

        $validator = Validator::make($request->all(), ['new_password'=> 'confirmed']);
        if ($validator->fails()) {
            return [ 'response_code'=>401,
                    'response' => 'error',
                    'message'=>  "The new password confirmation does not match."
                ];            
        }
    }
    /**
     *  Validate Contact No
     */
    public function validateContact($request)
    {  
        $validator = Validator::make($request->all(), ['mobile_no'=> 'required']);
        if ($validator->fails()) {
                return [ 'response_code' => 401 ,
                        'response' => 'error',
                        'message'=> "The mobile no field is required."
                        ];            
        }
        $validator = Validator::make($request->all(), ['mobile_no' => 'regex:/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/']);
        if ($validator->fails()) {
        return [ 'response_code' => 401 ,
                'response' => 'error',
                'message'=> 'The Mobile Number must be 10 digit without country code.'
                ];            
        }
    }

    /**
     * Validate passowrod for new password 
      */
    public function validateNewPassword($request)
    {

        $validator = Validator::make($request->all(), ['new_password'=> 'required']);

        if ($validator->fails()) {
            return [   'response_code'=>401,
                        'response' => 'error',
                        'message'=>  "The new password field is required."
                    ];            
        }

        $validator = Validator::make($request->all(), ['new_password'=> 'min:6']);

        if ($validator->fails()) {
            return [  'response_code'=>401,
                    'response' => 'error',
                    'message'=> "The new password must be at least 6 characters."
                ];            
        } 

         $validator = Validator::make($request->all(), ['new_password'=> 'max:20']);

            if ($validator->fails()) {
                return ['response_code'=>401,
                    'response' => 'error',
                    'message'=> "The password must less then  20 characters."
                        ];            
            }

        $validator = Validator::make($request->all(), ['new_password'=> 'confirmed']);

        if ($validator->fails()) {
            return [ 'response_code'=>401,
                    'response' => 'error',
                    'message'=>  "The new password confirmation does not match."
                ];            
        }



    }

    /**
     * Validate Login Credential for Login page
     */
    public function validateLogin($request)
    {

            $validator = Validator::make($request->all(), ['mobile_no'=> 'required']);
            if ($validator->fails()) {
                    return [ 'response_code' => 401 ,
                            'response' => 'error',
                            'message'=> "The mobile no field is required."
                            ];            
            }
            $validator = Validator::make($request->all(), ['mobile_no' => 'regex:/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/']);
            if ($validator->fails()) {
                return [ 'response_code' => 401 ,
                         'response' => 'error',
                         'message'=> 'The Mobile Number must be 10 digit without country code.'
                        ];            
            }
            $validator = Validator::make($request->all(), ['password'=> 'required']);
            if ($validator->fails()) {
                return ['response_code'=>401,
                        'response' => 'error',
                        'message'=>  "The password field is required."
                        ];            
            }
            $validator = Validator::make($request->all(), ['password'=> 'min:6']);
            if ($validator->fails()) {
                return ['response_code'=>401,
                        'response' => 'error',
                        'message'=> "The password must be at least 6 characters."
                        ];            
            }
            $validator = Validator::make($request->all(), ['password'=> 'max:20']);
            if ($validator->fails()) {
                return ['response_code'=>401,
                        'response' => 'error',
                        'message'=> "The password must less  then 20 characters."
                        ];            
            }

    }

 }
 