<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use \App\Http\Requests\StoreDonationDetailRequest;
use App\Http\Controllers\Controller;
use \App\Models\Category;
use \App\Models\Subcategory;
use \App\Models\Specification;
use \App\Models\City;
use App\Models\DonationPostView;
use DB;
use \Auth,\Session;
class BioDataController extends Controller
{
   
    //donation details form 
    public function biodataDetailForm()
    {   
		return view('web.bioData.bio_data');
    }

    public function encrypt_decrypt($action, $string) {
        $output = false;
        $encrypt_method = "AES-256-CBC";

        $secret_key = '{imSC}5^JL*qkL*w';
        $secret_iv = '6@@P)*!gm8KcL28j';

        $key = hash('sha256', $secret_key);
        $key = substr($key, 0, 32);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if ($action == 'decrypt') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }
   
    //store donation post
    public function store_biodata_detail(StoreDonationDetailRequest $request)
    {  
        if (Auth::guard('user')->check()){
            $user = Auth::guard('user')->user()->id;
        }else{
            session()->flash('error', 'You Must Login First For create Dontation.');
           return redirect('/user/login');
        }
    try{ 
        $url = env("MAP_API_URL");
        $sensor = env("SENSOR");
        $region = env("REGION");
        $key = env("MAP_KEY");
        $d_geo = file_get_contents($url.'?address='.urlencode($request->address).'&sensor='.$sensor.'&region='.$region.'&key='.$key);
        // $d_geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($request->address).'&sensor=false');
        $d_geo = json_decode($d_geo, true); // Convert the JSON to an array

        if (isset($d_geo['status']) && ($d_geo['status'] == 'OK')) {
            $d_lat = $d_geo['results'][0]['geometry']['location']['lat']; // Latitude
            $d_long = $d_geo['results'][0]['geometry']['location']['lng']; // d_long
        }else{
            $d_lat ="";
            $d_long= "";
        }
    }catch(\Exception $e){$d_lat ="";$d_long= "";}
        try{
            $url = env("MAP_API_URL");
            $sensor = env("SENSOR");
            $region = env("REGION");
            $key = env("MAP_KEY");
            $helper_geo = file_get_contents($url.'?address='.urlencode($request->address).'&sensor='.$sensor.'&region='.$region.'&key='.$key);
            // $helper_geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($request->helper_address).'&sensor=false');
            $helper_geo = json_decode($helper_geo, true); // Convert the JSON to an array

            if (isset($helper_geo['status']) && ($helper_geo['status'] == 'OK')) {
                $helper_lat = $helper_geo['results'][0]['geometry']['location']['lat']; // Latitude
                $helper_long = $helper_geo['results'][0]['geometry']['location']['lng']; // Longitude
            }else{
                $helper_lat ="";
                $helper_long= "";
            }
        }catch(\Exception $e){$helper_lat ="";$helper_long= "";} 
        try{
            $url = env("MAP_API_URL");
            $sensor = env("SENSOR");
            $region = env("REGION");
            $key = env("MAP_KEY");
            $city_geo = file_get_contents($url.'?address='.urlencode($request->city).'&sensor='.$sensor.'&region='.$region.'&key='.$key);
            // $city_geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($request->city).'&sensor=false');
            $city_geo = json_decode($city_geo, true); // Convert the JSON to an array

            if (isset($city_geo['status']) && ($city_geo['status'] == 'OK')) {
                $city_lat = $city_geo['results'][0]['geometry']['location']['lat']; // Latitude
                $city_long = $city_geo['results'][0]['geometry']['location']['lng']; // Longitude
            }else{
                $city_lat ="";
                $city_long= "";
            }
        }catch(\Exception $e){$city_lat ="";$city_long= "";} 


        $search = explode(', ',$request->city);
        $city = check_for_city($search);
        $d_search = explode(', ',$request->address);
        $d_city = check_for_city($d_search);
        $helper_address_search = explode(', ',$request->helper_address);
        $helper_city = check_for_city($helper_address_search);
        if($helper_city){
                $helper_id = $helper_city->id;
        }else{
            $helper_id = 1;
        }
        if($request->preference_gender){
            $gender = implode(',',$request->preference_gender);
        }else{
            $gender = "";
        }
        if($request->preference_age){
            $age = implode(',',$request->preference_age);
        }else{
            $age = "";
        }
        $specification = Specification::where('key',$request->key)->first();
        $id =  DB::table('donation_posts')->insertGetId([
            'key'=> generateKey(14),
            'post_no'=> generatePostNO(),
            'user_id' =>  $user	,
            'specification_id'=> $specification->id, 
            'user_type_id' => $request->donation,
            'title' => $request->title,
            'description'=> $request->description,
            'condition' => $request->condition,
            'city_id' =>$city->id ,
            'address' => $request->city,
            'lat' => $city_lat,
            'long' => $city_long,
            'system_code' =>$request->ip(),
            'donation_type_id' => $request->donation_type,
            'donation_type_other' => $request->donation_type_other,
            'preference' =>$request->preference,                              //0-new | 1-anyone	
            'preference_gender' => $gender,              // 1-male | 2-female | 3-other	
            'preference_age' => $age,                   //1-0to14 | 2-14to30 | 3-30to60 | 4-above60	
            'preference_is_handicap'=> $request->preference_is_handicap,   // 0-no | 1-yes	
            'consideration' => $request->consideration,                   //0-free | 1-Non-Monetary | 2-Monetary	
            'consideration_detail'=> $request->consideration_detail,
            'is_urgent'=> $request->is_urgent ,                          // 0-no | 1-yes
            'urgent_reason'	=> $request->urgent_reason,
            'd_status' => $request->d_status ,//0-Individual | 1-Organization	
            'd_name'	=> $request->name ,
            'd_email'=> $request->email ,
            'd_contact'=> $request->mobile_no ,
            'd_city_id' => $d_city->id,
            'd_address'=> $request->address ,
            'd_lat' => $d_lat, 
            'd_long' => $d_long,
            'helper_status'=> $request->helper_status ,                                       // 0-Individual | 1-Organization	
            'helper_name'=> $request->helper_name ,
            'helper_email'=> $request->helper_email ,
            'helper_contact'=> $request->helper_mobile_no ,
            'helper_city_id' => $helper_id,
            'helper_address'	=> $request->helper_address, 
            'helper_lat' => $helper_lat, 
            'helper_long' => $helper_long,
            'status' =>1 ,
            'created_at'=> new \DateTime(),
            'updated_at'=> new \DateTime()
        ]);
        if ($request->hasFile('image_file')) {
            $files = $request->file('image_file');
            foreach($files as $file){
                $extension = $file->getClientOriginalExtension();
                $fileName = $id."-".date('ymdhis')."-".str_random(4).".".$extension;
                $folderpath  = base_path('images/uploads/donation_post/');
                $file->move($folderpath , $fileName);
                DB::table('donation_images')->insert([
                    'donation_post_id' => $id ,
                    'key' => generateKey(12),
                    'image' => $fileName,
                    'status' =>1 ,
                    'created_at'=> new \DateTime(),
                    'updated_at'=> new \DateTime()
                ]);
            }
        }
        
      session()->flash('success','Bio Data form posted Successfully.');
     return redirect('/user/dashboard');
    }
}
