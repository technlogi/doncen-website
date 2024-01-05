<?php

if (! function_exists('generateKey')) {
    function generateKey($table_id) {
        $alpha_key = '';
        $keys = range('a', 'z');
        $numeric = range(0, 9);

        for ($i = 0; $i <= 20; $i++) {
            if(rand(0,1)){
                $alpha_key .= $keys[array_rand($keys)] ;
            }else{
                $alpha_key .= $numeric[array_rand($numeric)] ;
            }
        }
        return $alpha_key . $table_id;
    }
    
}

if (! function_exists('generatePostNO')) {
    function generatePostNO() {
        $alpha_key = '';
        $numeric = range(1, 9);
        for ($i = 0; $i < 12; $i++) {
            $alpha_key .= $numeric[array_rand($numeric)] ;
        }
        return $alpha_key;
    }
}

if (! function_exists('dataTable')) {
    function dataTable($column,$table_name,$search_by,$request, $show , $edit , $delete , $status) {
        $totalData = DB::table($table_name)->count();

        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $column[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {            
            $informations = DB::table($table_name)
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
        }
        else {
        $search = $request->input('search.value'); 
        $informations =  DB::table($table_name)
                    ->orWhere($search_by, 'LIKE',"%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

        $totalFiltered = DB::table($table_name)
                    ->orWhere($search_by, 'LIKE',"%{$search}%")
                    ->count();
        }

        $data = array();
        if(!empty($informations))
        {
            $i=0;
            foreach ($informations as $category)
            {
                $nestedData['id'] = ++$i;
                foreach($column as $field){
                    if($field == 'created_at'){
                        $nestedData['created_at'] = date('j M Y h:i a',strtotime($category->created_at));
                    }else if($field == 'status'){
                        $nestedData['status'] = $category->status ? 'Active' : 'Deactive';
                    }else if($field == 'country_name'){
                        $state = \App\Models\State::where('key',$category->key)->first();
                        $nestedData['country_name'] = $state->country->name;;
                    }else if($field == 'state_name'){
                        $city = \App\Models\City::where('key',$category->key)->first();
                        $nestedData['state_name'] = $city->state->name;;
                    }else {
                        $nestedData[$field] = $category->$field;
                    }
                }
                $option = '';
                if($show != ''){
                    $show_link = route($show,$category->key);
                    $option = "&emsp;<a href='{$show_link}' title='SHOW' ><span class='fa fa-eye'></span></a>";
                }
                if($edit != ''){
                    $edit_link = route($edit,$category->key);
                    $option .= "&emsp;<a href='{$edit_link}' title='EDIT' ><span class='fa fa-edit'></span></a>";
                }
                if($delete != ''){
                    $delete_donation_link = route($delete,$category->key);
                    $option .= "&emsp;<a href='{$delete_donation_link}' title='DELETE' ><span class='fa fa-trash'></span></a>";
                }
                if($status != ''){
                    $status_link = route($status,$category->key);
                    if($category->status){
                        $option .= "&emsp;<a href='{$status_link}' title='Change Status To Deactive' ><span class='fa fa-check'></span></a>";
                    }else{
                        $option .= "&emsp;<a href='{$status_link}' title='Change Status To Active' ><span class='fa fa-close'></span></a>";
                    }
                }
                $nestedData['options'] = $option ;
                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw"            => intval($request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $data   
            );
        return $json_data;
       
    }
    
}


if (! function_exists('generateOtp')) {
    function generateOtp() {
        $alpha_key = '';
        $numeric = range(1, 9);
        for ($i = 0; $i < 4; $i++) {
            $alpha_key .= $numeric[array_rand($numeric)] ;
        }
        return $alpha_key;
    }
}

if(! function_exists('DONATION_POST_IMAGE')){
    function DONATION_POST_IMAGE($image){
      $company_url =  env('COMPANY_URL');
      $base_path = URL::asset('images/uploads/donation_post/'.$image);
      return $base_path;
    }
}
//user image
if(! function_exists('USER_IMAGE')){
    function USER_IMAGE($image){
      $company_url =  env('COMPANY_URL');
      $base_path = URL::asset('images/uploads/users/'.$image);
      return $base_path;
    }
}
//return full url for svg images
if(! function_exists('SVG_IMAGE')){
    function SVG_IMAGE($image){
      $base_path = URL::asset('uploads/svg/'.$image);
      return $base_path;
    }
}



if(! function_exists('SMS_GATEWAY')){
    function SMS_GATEWAY($mobileNumber,$message){
        $SenderID = "DONCEN";
        $routeId  = 1;
        $smsContentType = "english";
        $authKey = "c69dc2e355aff96fd734ccf11c43869";
        $postData = array(
            'mobileNumbers' => $mobileNumber,  //use multiple mobile number (987654321,987654320)           
            'smsContent' => $message,
            'senderId' => $SenderID,
            'routeId' => $routeId,  
            // 'groupId' => '0',     
            "smsContentType" =>'english',


        // With DLT
            'entityid' => '1201161104109699370',
            'tmid' => '',
            'templateid' => '1207161860726963172'

             // 'signature'='signature'

        );

        $data_json = json_encode($postData);
// echo "<pre>";
//         print_r($data_json);
//         exit();
        $url="http://msg.msgclub.net/rest/services/sendSMS/sendGroupSms?AUTH_KEY=".$authKey;


        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_HTTPHEADER => array('Content-Type: application/json','Content-Length: ' . strlen($data_json)),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data_json,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0
        ));
        //get response
        $output = curl_exec($ch);

        // echo "<pre>";
        // print_r($output);
        // exit();
        //Print error if any
        if(curl_error($ch))
        {
            echo 'error:' . curl_error($ch);
        }
        curl_close($ch);
        return $output;
       
    }
}



//search for city and cheak user exits or not

if(!function_exists('check_for_city')){
  function check_for_city($search){
    $length = sizeof($search);
    
    if($length >= 3){       
        
        $city_name    = $search[ $length - 3 ];
        $state_name   = $search[ $length - 2 ];
        $country_name = $search[ $length - 1 ];
        
        $country_check_country = DB::table('countries')->where('name','LIKE',ltrim($search[ $length - 1 ]))->first();
        if(empty($country_check_country)){
            
            // $state_check_country = DB::table('states')->where('name','LIKE',ltrim($search[ $length - 1 ]))->first();
            // if(empty($state_check_country)){
            //     $city_cheak_country = DB::table('cities')->where('name','LIKE',ltrim($search[ $length - 1 ]))->first();
            //     if(empty($city_cheak_country)){
            
                    $country_id = DB::table('countries')->insertGetId(['name' =>ltrim($search[ $length - 1 ]),'key'=>generateKey(8),'sort_name'=>ltrim($search[ $length - 1 ]),'status'=>1,'created_at'=>new \DateTime(),'updated_at'=>new \DateTime() ]);
                    $state_id = DB::table('states')->insertGetId(['name' =>ltrim($search[ $length - 2 ]),'key'=>generateKey(8),'country_id'=>$country_id,'status'=>1,'created_at'=>new \DateTime(),'updated_at'=>new \DateTime() ]);
                    $city_id = DB::table('cities')->insertGetId(['name' =>ltrim($search[ $length - 3 ]),'key'=>generateKey(8),'state_id'=>$state_id,'status'=>1,'created_at'=>new \DateTime(),'updated_at'=>new \DateTime() ]);
                    
                    return $city_id;
                    
            //     }else{
            //          return $error = "Country name exist in City records";
            //     }
            // }else{
            //     return $error = "Country name exist in State records";
            // }
    
        }else{
            $country_id = $country_check_country->id;
        }
        
        
        // $country_check_state = DB::table('countries')->where('name','LIKE',ltrim($search[ $length - 2 ]))->first();
        // if(empty($country_check_state)){
            
            $state_check_state = DB::table('states')->where('name','LIKE',ltrim($search[ $length - 2 ]))->first();
            if(empty($state_check_state)){
                
                // $city_check_state = DB::table('cities')->where('name','LIKE',ltrim($search[ $length - 2 ]))->first();
                // if(empty($city_check_state)){
                    
                    $state_id = DB::table('states')->insertGetId(['name' =>ltrim($search[ $length - 2 ]),'key'=>generateKey(8),'country_id'=>$country_id,'status'=>1,'created_at'=>new \DateTime(),'updated_at'=>new \DateTime() ]);
                    $city_id = DB::table('cities')->insertGetId(['name' =>ltrim($search[ $length - 3 ]),'key'=>generateKey(8),'state_id'=>$state_id,'status'=>1,'created_at'=>new \DateTime(),'updated_at'=>new \DateTime() ]);
                    
                    return $city_id;
      
                // }else{
                //     return $error = "State name exist in City records";
                    
                    
                // }
        
            }else{
                $state_id = $state_check_state->id;
            }
        
        // }
        // else{
        //     return $error = "State name exist in Country records";
        // }
        
        
        // $country_check_city = DB::table('countries')->where('name','LIKE',ltrim($search[ $length - 3 ]))->first();
        // if(empty($country_check_city)){
        //     $state_check_city = DB::table('states')->where('name','LIKE',ltrim($search[ $length - 3 ]))->first();
        //     if(empty($state_check_city)){
                
                $city_check_city = DB::table('cities')->where('name','LIKE',ltrim($search[ $length - 3 ]))->first();
                if(empty($city_check_city)){
                    
                    $city_id = DB::table('cities')->insertGetId(['name' =>ltrim($search[ $length - 3 ]),'key'=>generateKey(8),'state_id'=>$state_id,'status'=>1,'created_at'=>new \DateTime(),'updated_at'=>new \DateTime() ]);
                    return $city_id;
                
                }else{
                    $city_id = $city_check_city->id;
                    return $city_id;
                }
        
        //     }else{
        //         return $error = "State name exist in State records";
        //     }
        // }else{
        //     return $error = "City name exist in Country records";
        // }
        
     }  
    }
}


// if(!function_exists('check_for_city')){
//   function check_for_city($search){
//     $length = sizeof($search);
//     if($length >= 3){       
//         $country_name = $search[ $length - 1 ];
//         $state_name   = $search[ $length - 2 ];
//         $city_name    = $search[ $length - 3 ];

//         $country_check_country = DB::table('countries')->where('name','LIKE',$country_name)->first();
//         if(empty($country_check_country)){
//             $state_check_country = DB::table('states')->where('name','LIKE',$country_name)->first();
//             if(empty($state_check_country)){
//                 $city_cheak_country = DB::table('cities')->where('name','LIKE',$country_name)->first();
//                 if(empty($city_cheak_country)){
//                     $country = DB::table('countries')->insertGetId(['name' =>$country_name,'key'=>generateKey(8),'sort_name'=>$country_name,'status'=>1,'created_at'=>new \DateTime(),'updated_at'=>new \DateTime() ]);
//                 }else{
//                     return $city_cheak_country;
//                 }
//             }else{
//                 return $state_check_country;
//             }
//         }else{
//             return $country_check_country;
//         }
//         $state_check_country = DB::table('countries')->where('name','LIKE',$state_name)->first();
//         if(empty($state_check_country)){
//             $state_check_state = DB::table('states')->where('name','LIKE',$state_name)->first();
//             if(empty($state_check_state)){
//                 $city_check_state = DB::table('cities')->where('name','LIKE',$state_name)->first();
//                 if(empty($city_check_state)){
//                     $country = DB::table('countries')->where('name','LIKE',$country_name)->first();
//                     DB::table('states')->insertGetId(['name' =>$state_name,'key'=>generateKey(8),'country_id'=>$country->id,'status'=>1,'created_at'=>new \DateTime(),'updated_at'=>new \DateTime() ]);
//                 }else{
//                     return $city_check_state;
//                 }
//             }else{
//                 return $state_check_state;
//             }
//         }else{
//             return $state_check_country;
//         }
//         $city_check_country = DB::table('countries')->where('name','LIKE',$city_name)->first();
//         if(empty($city_check_country)){
//             $city_check_state = DB::table('states')->where('name','LIKE',$city_name)->first();
//             if(empty($city_check_state)){
//                 $city_check_city = DB::table('cities')->where('name','LIKE',$city_name)->first();
//                 if(empty($city_check_city)){
//                     $state = DB::table('states')->where('name','LIKE',$state_name)->first();
//                     DB::table('cities')->insertGetId(['name' =>$city_name,'key'=>generateKey(8),'state_id'=>$state->id,'status'=>1,'created_at'=>new \DateTime(),'updated_at'=>new \DateTime() ]);
//                   $city = DB::table('cities')->where('name','LIKE',$city_name)->first();
//                   return $city;
//                 }else{
//                     return $city_check_city;
//                 }
//             }else{
//                 return $city_check_state;
//             }
//         }else{
//             return $city_check_country;
//         }
//      }  
//     }
// }

if(!function_exists('search_city')){
  function search_city($city_name){
    $country_check_country = DB::table('countries')->where('name','LIKE',$city_name)->first();
    if(empty($country_check_country)){
        $state_check_country = DB::table('states')->where('name','LIKE',$city_name)->first();
        if(empty($state_check_country)){
            $city_cheak_country = DB::table('cities')->where('name','LIKE',$city_name)->first();
            if(empty($city_cheak_country)){
                return array();
            }else{
                return array('0'=> $city_cheak_country->id );
            }
        }else{
            $city_ids = array();
            $state = \App\Models\State::where('id',$state_check_country->id)->first();
            if(!empty($state)){
                foreach($state->cities as $city){
                    if(!empty($city)){
                        array_push($city_ids,$city->id);
                    }
                }
            }
            return $city_ids;
        }
    }else{
        $city_ids = array();
        $country = \App\Models\Country::where('id',$country_check_country->id)->first();
        if(!empty($country)){
            foreach($country->states as $state){
                if(!empty($state)){
                    foreach($state->cities as $city){
                        if(!empty($city)){
                            array_push($city_ids,$city->id);
                        }
                    }
                }
            }
        }
        return $city_ids;
    }
  }
}




