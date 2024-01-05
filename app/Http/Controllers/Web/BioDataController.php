<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use \App\Http\Requests\StoreDonationDetailRequest;
use \App\Http\Requests\StoreBiodataDetailRequest;
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
    public function store_biodata_detail(StoreBiodataDetailRequest $request)
    {  
    	
        if (Auth::guard('user')->check()){
            $user = Auth::guard('user')->user()->id;
        }else{
            session()->flash('error', 'You Must Login First For insert biodata details.');
           return redirect('/user/login');
        }
    try{ 
        $url = env("MAP_API_URL");
        $sensor = env("SENSOR");
        $region = env("REGION");
        $key = env("MAP_KEY");
        $d_geo = file_get_contents($url.'?address='.urlencode($request->location).'&sensor='.$sensor.'&region='.$region.'&key='.$key);
        // $d_geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($request->address).'&sensor=false');
        $d_geo = json_decode($d_geo, true); // Convert the JSON to an array

        if (isset($d_geo['status']) && ($d_geo['status'] == 'OK')) {
            $lat = $d_geo['results'][0]['geometry']['location']['lat']; // Latitude
            $long = $d_geo['results'][0]['geometry']['location']['lng']; // d_long
        }else{
            $lat ="";
            $long= "";
        }
    }catch(\Exception $e){$lat ="";$long= "";}

        $specification = Specification::where('key',$request->key)->first();
        $id =  DB::table('biodata')->insertGetId([
            'key'=> generateKey(14),
            'first_name'=> $request->firstname,
            'middle_name' =>  $request->middlename,
            'last_name'=> $request->lastname, 
            'gender' => $request->gender,
            'father_fname' => $request->father_firstname,
            'father_mname'=> $request->father_middlename,
            'father_lname' => $request->father_lastname,
            'dob' =>$request->dob,
            'place_of_birth' => $request->placeofbirth,
            'place_of_birth_district' => $request->placeofbirthdist,
            'description' => $request->description,
            'mother_tounge' =>$request->mother_tounge,
            'religion' => $request->religion,
            'birth_place_lat' => $lat,
            'birth_place_long' => $long,               
            'height' => $request->height,             
            'weight' => $request->weight,                 
            'skin_color_tone'=> $request->skin_color,   
            'photo' => 'test',                   	
            'martial_status'=> $request->marital_status,
            'address'=> $request->address1 ,                         
            'location'	=> $request->location,
            'edu_qualification' => $request->edu_quali ,
            'other_qualification'	=> $request->other_quali ,
            'candidate_profession'=> $request->profession ,
            'candidate_post'=> $request->candi_post ,
            'candidate_yearly_income' => $request->candi_income,
            'ofc_address' => $request->ofc_address,
            'candidate_father_business'=> $request->father_business ,
            'candidate_father_yearly_income' => $request->candi_father_income, 
            'candidate_mother_name' => $request->mother_name,
            'candidate_mother_business'=> $request->candi_mother_business ,  
            'living_in'=> $request->living_type ,
            'house'=> $request->house_type ,
            'number_of_brother'=> $request->number_of_brother ,
            'number_of_sister' => $request->number_of_sister,
            'brother_marital_status'	=> $request->bro_marital_status, 
            'sister_marital_status' => $request->sis_marital_status, 
            'maternal_uncle_surname' => $request->metrnal_uncle_lname,
            'number_of_maternal_uncle' => $request->number_of_metarnal_uncles,
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
