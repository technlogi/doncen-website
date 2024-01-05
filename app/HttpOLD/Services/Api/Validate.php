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

        // $validator = Validator::make($request->all(), ['email' => 'nullable|email']);

        // if ($validator->fails()) {

        //         return [ 'response_code'=>401,

        //                  'response' => 'error',

        //                  'message'=> "The email must be a valid email address."

        //         ];            

        // }



        // $validator = Validator::make($request->all(), ['email' => 'nullable|unique:users']);

        // if ($validator->fails()) {

        //         return [ 'response_code'=>401,

        //                     'response' => 'error',

        //                 'message'=> "The email has already been taken."

        //         ];            

        // }

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

            $validator = Validator::make($request->all(), ['password'=> 'min:4']);

            if ($validator->fails()) {

                return ['response_code'=>401,

                        'response' => 'error',

                        'message'=> "The password must be at least 4 digits."

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

        //  $validator = Validator::make($request->all(), ['old_password'=> 'required']);

        // if ($validator->fails()) {

        //     return ['response_code'=>401,

        //             'response' => 'error',

        //             'message'=> "The old password field is required."

        //             ];            

        // }

        // $validator = Validator::make($request->all(), ['old_password'=> 'min:4']);

        // if ($validator->fails()) {

        //     return ['response_code'=>401,

        //             'response' => 'error',

        //             'message'=> "The old password must be at least 4 digits."

        //             ];            

        // }

        $validator = Validator::make($request->all(), ['new_password'=> 'required']);

        if ($validator->fails()) {

            return ['response_code'=>401,

                    'response' => 'error',

                    'message'=>  "The new password field is required."

                    ];            

        }

        $validator = Validator::make($request->all(), ['new_password'=> 'min:4']);

        if ($validator->fails()) {

            return ['response_code'=>401,

                    'response' => 'error',

                    'message'=> "The new password must be at least 4 digits."

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

        $validator = Validator::make($request->all(), ['new_password'=> 'min:4']);

        if ($validator->fails()) {

            return [  'response_code'=>401,

                    'response' => 'error',

                    'message'=> "The new password must be at least 4 digits."

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



        $validator = Validator::make($request->all(), ['new_password'=> 'min:4']);



        if ($validator->fails()) {

            return [  'response_code'=>401,

                    'response' => 'error',

                    'message'=> "The new password must be at least 4 digits."

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

            // $validator = Validator::make($request->all(), ['password'=> 'required']);

            // if ($validator->fails()) {

            //     return ['response_code'=>401,

            //             'response' => 'error',

            //             'message'=>  "The password field is required."

            //             ];            

            // }

            // $validator = Validator::make($request->all(), ['password'=> 'min:4']);

            // if ($validator->fails()) {

            //     return ['response_code'=>401,

            //             'response' => 'error',

            //             'message'=> "The password must be at least 4 characters."

            //             ];            

            // }

            // $validator = Validator::make($request->all(), ['password'=> 'max:20']);

            // if ($validator->fails()) {

            //     return ['response_code'=>401,

            //             'response' => 'error',

            //             'message'=> "The password must less  then 20 characters."

            //             ];            

            // }



    }

    

        

    /**

     *  Donation form validation

      */

    public function validateDonationForm($request)

    {

        $validator = Validator::make($request->all(), ['title'=> 'required']);

        if ($validator->fails()) {

                return [ 'response_code' => 401 ,

                        'response' => 'error',

                        'message'=> "The title field is required."

                        ];            

        }

        $validator = Validator::make($request->all(), ['user_id'=> 'required']);

        if ($validator->fails()) {

                return [ 'response_code' => 401 ,

                        'response' => 'error',

                        'message'=> "The User Identity is required."

                        ];            

        }

        $validator = Validator::make($request->all(), ['title' => 'min:5']);

        if ($validator->fails()) {

            return [ 'response_code' => 401 ,

                     'response' => 'error',

                     'message'=> 'The title field must have min 5 character.'

                    ];            

        }

        $validator = Validator::make($request->all(), ['description' => 'required']);

        if ($validator->fails()) {

            return [ 'response_code' => 401 ,

                     'response' => 'error',

                     'message'=> 'The Description field is required.'

                    ];            

        }

        $validator = Validator::make($request->all(), ['description' => 'min:10']);

        if ($validator->fails()) {

            return [ 'response_code' => 401 ,

                     'response' => 'error',

                     'message'=> 'The Description field must have min 10 character.'

                    ];            

        }

      

        // $validator = Validator::make($request->all(), ['donation'=> 'required']);

        // if ($validator->fails()) {

        //     return ['response_code'=>401,

        //             'response' => 'error',

        //             'message'=>  "The Donation field is required."

        //             ];            

        // }

        

        $validator = Validator::make($request->all(), ['user_type_id'=> 'required']);

        if ($validator->fails()) {

            return ['response_code'=>401,

                    'response' => 'error',

                    'message'=>  "Please select User type."

                    ];            

        }

        $validator = Validator::make($request->all(), ['system_code'=> 'required']);

        if ($validator->fails()) {

            return ['response_code'=>401,

                    'response' => 'error',

                    'message'=>  "Please system code as fcm Id."

                    ];            

        }

        $validator = Validator::make($request->all(), ['preference'=> 'required']);

        if ($validator->fails()) {

            return ['response_code'=>401,

                    'response' => 'error',

                    'message'=>  "Please select preference."

                    ];            

        }

        $validator = Validator::make($request->all(), ['consideration'=> 'required']);

        if ($validator->fails()) {

            return ['response_code'=>401,

                    'response' => 'error',

                    'message'=>  "Please select consideration."

                    ];            

        }

        

        $validator = Validator::make($request->all(), ['donation_type_id'=> 'required']);

        if ($validator->fails()) {

            return ['response_code'=>401,

                    'response' => 'error',

                    'message'=>  "The Donation Type field is required."

                    ];            

        }

        $validator = Validator::make($request->all(), ['preference_is_handicap'=> 'required']);

        if ($validator->fails()) {

            return ['response_code'=>401,

                    'response' => 'error',

                    'message'=>  "Select prefrence handicap or not."

                    ];            

        }

        $validator = Validator::make($request->all(), ['specification_key'=> 'required']);

        if ($validator->fails()) {

            return ['response_code'=>401,

                    'response' => 'error',

                    'message'=>  "The specification  key is required."

                    ];            

        }

        $validator = Validator::make($request->all(), ['preference_gender'=> 'required']);

        if ($validator->fails()) {

            return ['response_code'=>401,

                    'response' => 'error',

                    'message'=>  "The Preference Gender field is required."

                    ];            

        }

        $validator = Validator::make($request->all(), ['preference_age'=> 'required']);

        if ($validator->fails()) {

            return ['response_code'=>401,

                    'response' => 'error',

                    'message'=>  "The Preference age field is required."

                    ];            

        }

        $validator = Validator::make($request->all(), ['condition'=> 'required']);

        if ($validator->fails()) {

            return ['response_code'=>401,

                    'response' => 'error',

                    'message'=>  "Please select condition of donation."

                    ];            

        }



        

        $validator = Validator::make($request->all(), ['image_file1'=> 'mimes:jpeg,jpg,png,gif']);

        if ($validator->fails()) {

                return [ 'response_code' => 401 ,

                        'response' => 'error',

                        'message'=> "Please select valid image formate."

                        ];            

        }

        $validator = Validator::make($request->all(), ['image_file2'=> 'mimes:jpeg,jpg,png,gif']);

        if ($validator->fails()) {

                return [ 'response_code' => 401 ,

                        'response' => 'error',

                        'message'=> "Please select valid image formate."

                        ];            

        } $validator = Validator::make($request->all(), ['image_file3'=> 'mimes:jpeg,jpg,png,gif']);

        if ($validator->fails()) {

                return [ 'response_code' => 401 ,

                        'response' => 'error',

                        'message'=> "Please select valid image formate."

                        ];            

        } $validator = Validator::make($request->all(), ['image_file4'=> 'mimes:jpeg,jpg,png,gif']);

        if ($validator->fails()) {

                return [ 'response_code' => 401 ,

                        'response' => 'error',

                        'message'=> "Please select valid image formate."

                        ];            

        }

        $validator = Validator::make($request->all(), ['d_contact'=> 'required']);

        if ($validator->fails()) {

                return [ 'response_code' => 401 ,

                        'response' => 'error',

                        'message'=> "The Doner/Donee mobile no field is required."

                        ];            

        }

        $validator = Validator::make($request->all(), ['d_contact' => 'regex:/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/']);

        if ($validator->fails()) {

        return [ 'response_code' => 401 ,

                'response' => 'error',

                'message'=> 'The Mobile Number must be 10 digit without country code.'

                ];            

        }

        $validator = Validator::make($request->all(), ['helper_contact' => 'nullable|regex:/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/']);

        if ($validator->fails()) {

        return [ 'response_code' => 401 ,

                'response' => 'error',

                'message'=> 'The Helper Mobile Number must be 10 digit without country code.'

                ];            

        }

        $validator = Validator::make($request->all(), ['d_email' => 'required|email']);

        if ($validator->fails()) {

                return [ 'response_code'=>401,

                         'response' => 'error',

                         'message'=> "The email must be a valid email address."

                ];            

        }

        $validator = Validator::make($request->all(), ['helper_email' => 'nullable|email']);

        if ($validator->fails()) {

                return [ 'response_code'=>401,

                         'response' => 'error',

                         'message'=> "The email must be a valid email address."

                ];            

        }

        $validator = Validator::make($request->all(), ['d_name' => 'required']);

        if ($validator->fails()) {

                return [ 'response_code'=>401,

                         'response' => 'error',

                         'message'=> "The Doner/Donee name filed is required."

                ];            

        }

        $validator = Validator::make($request->all(), ['d_address'=> 'required']);

        if ($validator->fails()) {

            return ['response_code'=>401,

                    'response' => 'error',

                    'message'=>  "The Doner/Donee Address filed is required."

                    ];            

        }

        $validator = Validator::make($request->all(), ['d_address'=> 'min:6']);

        if ($validator->fails()) {

            return ['response_code'=>401,

                    'response' => 'error',

                    'message'=>  "Doner/Donee Adress must be min 5 character."

                    ];            

        }

        $validator = Validator::make($request->all(), ['d_address'=> 'regex:/(.*[,]){3}/u']);

        if ($validator->fails()) {

            return ['response_code'=>401,

                    'response' => 'error',

                    'message'=>  "Please Enter proper address. Ex: (Address, City, State, Country)."

                    ];            

        }

        $validator = Validator::make($request->all(), ['d_status'=> 'required']);

        if ($validator->fails()) {

            return ['response_code'=>401,

                    'response' => 'error',

                    'message'=>  "Please select Doner/Donee type."

                    ];            

        }

        $validator = Validator::make($request->all(), ['helper_address'=> 'nullable']);

        if ($validator->fails()) {

            return ['response_code'=>401,

                    'response' => 'error',

                    'message'=>  "The Address filed is required."

                    ];            

        }

        $validator = Validator::make($request->all(), ['helper_address'=> 'min:6']);

        if ($validator->fails()) {

            return ['response_code'=>401,

                    'response' => 'error',

                    'message'=>  "Adress must be min 5 character."

                    ];            

        }

        $validator = Validator::make($request->all(), ['helper_address'=> 'regex:/(.*[,]){3}/u']);

        if ($validator->fails()) {

            return ['response_code'=>401,

                    'response' => 'error',

                    'message'=>  "Please Enter proper address. Ex: (Address, City, State, Country)."

                    ];            

        }

        $validator = Validator::make($request->all(), ['donation_address'=> 'required']);

        if ($validator->fails()) {

            return ['response_code'=>401,

                    'response' => 'error',

                    'message'=>  "The Donation Address filed is required."

                    ];            

        }

        $validator = Validator::make($request->all(), ['donation_address'=> 'min:6']);

        if ($validator->fails()) {

            return ['response_code'=>401,

                    'response' => 'error',

                    'message'=>  "Donation Address must be min 5 character."

                    ];            

        }

        $validator = Validator::make($request->all(), ['donation_address'=> 'regex:/(.*[,]){3}/u']);

        if ($validator->fails()) {

            return ['response_code'=>401,

                    'response' => 'error',

                    'message'=>  "Please Enter proper address. Ex: (Address, City, State, Country)."

                    ];            

        }

        $validator = Validator::make($request->all(), ['is_urgent'=> 'required']);

        if ($validator->fails()) {

            return ['response_code'=>401,

                    'response' => 'error',

                    'message'=>  "The Urgent option is required."

                    ];            

        }

    }

 }

 