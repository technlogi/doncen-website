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
                    }else{
                        $nestedData[$field] = $category->$field;
                    }
                }
                $option = '';
                if($show != ''){
                    $show_link = route('admin.Location.country.country');
                    $option = "&emsp;<a href='{$show_link}' title='SHOW' ><span class='fa fa-eye'></span></a>";
                }
                if($edit != ''){
                    $edit_link = route($edit,$category->key);
                    $option .= "&emsp;<a href='{$edit_link}' title='EDIT' ><span class='fa fa-edit'></span></a>";
                }
                if($delete != ''){
                    $option .= "&emsp;<a href='{$delete}' title='DELETE' ><span class='fa fa-trash'></span></a>";
                }
                if($status != ''){
                    $option .= "&emsp;<a href='{$delete}' title='DELETE' ><span class='fa fa-user'></span></a>";
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
//return full url for svg images
if(! function_exists('SVG_IMAGE')){
    function SVG_IMAGE($image){
      $base_path = URL::asset('uploads/svg/'.$image);
      return $base_path;
    }
}



if(! function_exists('SMS_GATEWAY')){
    function SMS_GATEWAY($mobileNumber,$message){
        $SenderID = "DonCen";
        $routeId  = 1;
        $smsContentType = "english";
        $authKey = "c69dc2e355aff96fd734ccf11c43869";
        $postData = array(
            'mobileNumbers' => $mobileNumber,        
            'smsContent' => $message,
            'senderId' => $SenderID,
            'routeId' => $routeId,       
            "smsContentType" =>'english'
        );
        $data_json = json_encode($postData);
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
        //Print error if any
        if(curl_errno($ch))
        {
            echo 'error:' . curl_error($ch);
        }
        curl_close($ch);
        return $output;
    }
}



