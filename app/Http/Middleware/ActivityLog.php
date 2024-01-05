<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Location;   //vendor/stevebauman/location/src
use URL;

echo "activity Log";
die();

class ActivityLog
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	
	public function handle($request, Closure $next)
	{

		
		function isMobileDevice() {
			    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo
			|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i"
			, $_SERVER["HTTP_USER_AGENT"]);
			}

			if(isMobileDevice()){
			    $device =  "Mobile";
			}
			else {
			    $device =  "Desktop";
			}

	
		$currentURL = URL::current();
		
		// $ip = $request->ip();
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

		$device_detail = $_SERVER['HTTP_USER_AGENT'];
		

		
		if(!empty($_COOKIE['latitude']))
		{

				$lat = $_COOKIE['latitude'];
				$lng = $_COOKIE['longitude'];

				$location_source = 'Location Share';
			}	
			else 
			{
				
				$data = Location::get($ip);
				if($data == true || $data != '' || !empty($date))
				{
				 	$lat = $data->latitude;
		         	$lng = $data->longitude;

		         	$location_source = 'IP Address';
	         	}
				else
				{
					$lat = '';
					$lng = '';
					$location_source = '';

				}
			}
		

		
			   
		$address_url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$lat.",".$lng."&key=AIzaSyAQsVSjofHfiWHWqai-0shuFexPke1-NEQ";

		   $ch = curl_init();
		   curl_setopt($ch, CURLOPT_URL, $address_url);
		   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		   $geoloc = json_decode(curl_exec($ch), true);


		   

			
			$full_address_arr = array_reverse($geoloc['results'][0]['address_components']);
			
			
			$live_city = $full_address_arr[3]['long_name'];
			// die();
			
			
			$is_indian_ip = array_search('India', array_column($full_address_arr, 'long_name'));
			 
			if(is_int($is_indian_ip) == false)
			{
				$access_allowed = "0";
				
			}
			else
			{
				
		    	$access_allowed = "1";
			}


			$full_add_1 = "";
			$full_add_2 = "";
			$full_add_3 = "";
			$full_add_4 = "";
			$full_add_5 = "";
			$full_add_6 = "";
			$full_add_7 = "";
			$full_add_8 = "";
			$full_add_9 = "";
			$full_add_10 = "";

			foreach ($full_address_arr as $key => $value) {
				$add[$key+1] = $value['long_name'];

			}

				foreach ($add as $key => $value) {

		
					if($key == 1){$full_add_1 = $value;}
					if($key == 2){$full_add_2 = $value;}
					if($key == 3){$full_add_3 = $value;}
					if($key == 4){$full_add_4 = $value;}
					if($key == 5){$full_add_5 = $value;}
					if($key == 6){$full_add_6 = $value;}
					if($key == 7){$full_add_7 = $value;}
					if($key == 8){$full_add_8 = $value;}
					if($key == 9){$full_add_9 = $value;}
					if($key == 10){$full_add_10 = $value;}
				}
			

			
					
		$uid = 0;
		$uType = 'Unknown';
		if(session()->get('login_user_59ba36addc2b2f9401580f014c7f58ea4e30989d') != ""){
			
			// $back_url = session()->get('_previous')['url'];
			// print_r($back_url);
			// exit();
			$uid = session()->get('login_user_59ba36addc2b2f9401580f014c7f58ea4e30989d');
			$uType = 'User';
		}
		if(session()->get('login_admin_59ba36addc2b2f9401580f014c7f58ea4e30989d') != ""){
			$uid = session()->get('login_admin_59ba36addc2b2f9401580f014c7f58ea4e30989d');
			$uType = 'Admin';
		}
		
		// $request->merge([
		//     'contact' => '123',
		// ]);
		
		// print_r($request->all());
		// die();
		
		$remark = json_encode($request->all());
		

// 		$response = response()->json($data);


		$url = "/";
		if(session()->get('_previous')['url'] != ""){
			$url = session()->get('_previous')['url'];
		}

		
		if (isset($_COOKIE['notification_token']) && !empty($_COOKIE['notification_token']) && $uid > 0) {
			
			$notification = $_COOKIE['notification_token'];

            DB::table('users')->where('id',$uid)
                              ->update(['notification_token' => $notification,
                              			'system_code' => $device,
                              			'ip_address' => $ip,
                              			'current_lat' => $lat,
                              			'current_long' => $lng,

                              			'current_add_1' => $full_add_1,
							            'current_add_2' => $full_add_2,
							            'current_add_3' => $full_add_3,
							            'current_add_4' => $full_add_4,
							            'current_add_5' => $full_add_5,
							            'current_add_6' => $full_add_6,
							            'current_add_7' => $full_add_7,
							            'current_add_8' => $full_add_8,
							            'current_add_9' => $full_add_9,
							            'current_add_10' => $full_add_10,

                          				'updated_at' => new \DateTime()]);  		
		}
			
		$id =  DB::table('activity_logs')->insertGetId([
            'key'=> generateKey(14),
            'user_type'=> $uType,
            'users_id'=> $uid,
            'action' =>  $request->route()->getName(),
            'url'=> $currentURL, 
            'remark' => $remark,
            'status' => 1,
            'device'=> $device,
            'device_detail' => $device_detail,
            'ip_address'=> $ip,

            
            // 'lat' => $data->latitude,
            'lat' => $lat,
            
            // 'long' =>$data->longitude,
            'long' =>$lng,

            'location_source' => $location_source,
            'access_allowed' => $access_allowed,

            'full_add_1' => $full_add_1,
            'full_add_2' => $full_add_2,
            'full_add_3' => $full_add_3,
            'full_add_4' => $full_add_4,
            'full_add_5' => $full_add_5,
            'full_add_6' => $full_add_6,
            'full_add_7' => $full_add_7,
            'full_add_8' => $full_add_8,
            'full_add_9' => $full_add_9,
            'full_add_10' => $full_add_10,
            


            'created_at'=> new \DateTime()
        ]);

		// dd($request);

		
		// Allow only Indian
		// if(is_int($is_indian_ip) == false)
		// 	{
		// 		echo "Access Denied";
		// 		die();
		// 	}
		// 	else
		// 	{
				
		//     	return $next($request);
		// 	}

		
		// Allow All world
		return $next($request);


	}
	
	
// 	public function handle($request, Closure $next)
// 	{
// 		$ip = $request->ip();
// 		$data = Location::get($ip);
// 		$uid = 0;
// 		if(session()->get('login_user_59ba36addc2b2f9401580f014c7f58ea4e30989d') != ""){
// 			$uid = session()->get('login_user_59ba36addc2b2f9401580f014c7f58ea4e30989d');
// 		}
// 		$remark = json_encode($request->all());
// 		$url = "/";
// 		if(session()->get('_previous')['url'] != ""){
// 			$url = session()->get('_previous')['url'];
// 		}
// 		$id =  DB::table('activity_logs')->insertGetId([
//             'key'=> generateKey(14),
//             'users_id'=> $uid,
//             'action' =>  $request->route()->getName(),
//             'url'=> $url, 
//             'remark' => $remark,
//             'status' => 1,
//             'system_code'=> $request->ip(),
//             'lat' => $data->latitude,
//             'long' =>$data->longitude,
//             'created_at'=> new \DateTime(),
//         ]);

// 	    return $next($request);
// 	}
}