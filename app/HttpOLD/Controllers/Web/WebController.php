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
class WebController extends Controller
{
    //home  
    public function home()
    {
        if (Session::has('specification')) {
			return redirect()->route('web.donation.DetailForm',Session::get('specification'));
		}
        $categories = Category::where('status',1)->orderBy('name','asc')->get();
            foreach($categories as $category){
              $count =  DB::select("SELECT  COUNT(donation_posts.id) as total_count                    
                                    FROM categories                 
                                    JOIN subcategories ON categories.id = subcategories.category_id                 
                                    JOIN specifications ON subcategories.id = specifications.subcategory_id                 
                                    JOIN donation_posts ON specifications.id = donation_posts.specification_id                 
                                    WHERE donation_posts.status = 1  and categories.key ='$category->key' GROUP BY categories.key");
                if(!empty($count)){
                    $category->total_post = $count[0]->total_count ;
                }else{
                    $category->total_post = 0;
                }
            }
        $cities = City::where('status',1)->orderBy('created_at','asc')->get();
        $titles = DB::table('donation_posts')->where('status',1)->select('title')->get();
        return view('web.page.home',compact('titles','categories','cities'));
    }
   
    //donation Form
    public function donationDetails(Request $request)
    {
        if (Auth::guard('user')->check()){
            $user = Auth::guard('user')->user()->id;
        }else{
            session(['specification' => $request->specification]);
            session()->flash('error', 'You must logged in before filling Dontation form.');
           return redirect('/user/login');
        }
        return redirect()->route('web.donation.DetailForm',$request->specification);
    }
   
    //donation details form 
    public function donationDetailForm($key)
    {
        try{
            if (Session::has('specification')) {
                Session::forget('specification');
            }
            $specification = Specification::where('key',$key)->first();
            $subcategory = $specification->subcategory;
            $category = $subcategory->category;
            $user = Auth::guard('user')->user();
            $user_types = DB::table('user_types')->select('name','key')->where('status',1)->get();
          
			return view('web.page.donation_detail',compact('specification','subcategory','category','user_types','key','user'));
        }catch(\Exception $e){
            return redirect()->route('web.donation.category')->with('error','Please select category, subcategory and specifications.');
        }
    }
   
    //store donation post
    public function store_donation_detail(StoreDonationDetailRequest $request)
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
            $helper_geo = file_get_contents($url.'?address='.urlencode($request->helper_address).'&sensor='.$sensor.'&region='.$region.'&key='.$key);
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
        
      session()->flash('success','Donation form posted Successfully.');
     return redirect('/user/dashboard');
    }
  
    //rander a view to all request of ajax
    public function printData($results,$city,$category)
    {
         $print = '';
        if(!empty($results)){
            foreach($results as $result){
             if(!empty($result)){
                    if(empty($city)){
                        $city =  City::where('id',$result->city_id)->where('status',1)->first();
                    }
                    if(empty($category)){
                        $specification =  Specification::where('id',$result->specification_id)->where('status',1)->first();
                        $subcategory = $specification->subcategory;
                        $category = $subcategory->category;
                    }
                    $donation_image = DB::table('donation_images')
                        ->where('donation_post_id',$result->id)
                        ->where('status',1)
                        ->first();
                    if(!empty($donation_image)){
                        $result->image = DONATION_POST_IMAGE($donation_image->image);
                    }else{
                        $result->image = DONATION_POST_IMAGE('preview.jpg');
                    }
                        
                    $print .= '  <!-- ad-item -->
                        <div class="category-item row">
                        <!-- item-image -->
                        <div class="item-image-box col-sm-3">
                            <div class="item-image">';
                                if(!empty($result->image)){
                                   $print .='<a href="details.html"><img src="'.$result->image.'" alt="Image" class="img-responsive"></a>';
                                }else{
                                    $print .='<a href="details.html"><img src="/images/uploads/donation_post/preview.jpg" alt="Image" class="img-responsive"></a>';
                                }    
                                $print .= '<a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="Verified"><i class="fa fa-check-square-o"></i></a>
                            </div><!-- item-image -->
                        </div>
                        <!-- rending-text -->
                        <div class="item-info col-sm-9">
                            <!-- ad-info -->
                            <div class="ad-info">
                                <h3 class="item-price">'.$result->title .'</h3>
                                <h4 class="item-title">'. $result->description.'</h4>
                                <div class="item-cat">
                                    <span><a href="#">'.$category->name .'</a></span> 
                                </div>	
                            </div><!-- ad-info -->

                            <!-- ad-meta -->
                            <div class="ad-meta">
                                <div class="meta-content">
                                    <span class="dated"><a href="#">'.\Carbon\Carbon::parse($result->created_at)->format('d-m-Y h:i A').' </span>
                                    <a href="#" class="tag"><i class="fa fa-tags"></i> ';
                                    if($result->condition == 1) {

                                        $print .= "New";
                                    }
                                        else{
                                        $print .= "Used";
                                    }
                                        $print .='</a>

                                    <a href="#" class="tag"><i class="fa fa-map-marker"></i> '. $city->name .'</a>,
                                    <a href="#" class="tag"> '. $city->state->name .'</a>,
                                    <a href="#" class="tag"> '. $city->state->country->name .'</a>.
                                </div>									
                                <!-- item-info-right -->
                                <div class="user-option pull-right">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="'. $city->name .'"><i class="fa fa-map-marker"></i> </a>';
                                    
                                    $print .=  '<a class="online" href="#" data-toggle="tooltip" data-placement="top" title="Dealer"><i class="fa fa-suitcase"></i> </a>											
                                </div><!-- item-info-right -->
                            </div><!-- ad-meta -->
                        </div><!-- item-info -->
                    </div><!-- ad-item -->';
                }else{
                    $print .= '<div class="alert alert-info">There is No Dontaion Post.</div>'; 
                }
            }   
        } else {
            $print .= '<div class="alert alert-info">There is No Dontaion Post.</div>'; 
        }
        return $print;
    }
    

    public function addToFavoriate($key)
    {
        if (Auth::guard('user')->check()){
            $user = Auth::guard('user')->user()->id;
        }else{
            session()->flash('error', 'You must logged in before add favoriate donation post.');
            return redirect('/user/login');
        }
        $id = DB::table('donation_posts')->where('key',$key)->select('key','id')->first();
        if(DB::table('favourite_posts')->where('user_id',$user)->where('donation_post_id',$id->id)->count() > 0){
            $status = DB::table('favourite_posts')->where('user_id',$user)->where('donation_post_id',$id->id)->first()->status;
            DB::table('favourite_posts')->where('user_id',$user)
                                       ->where('donation_post_id',$id->id)
                                       ->update(['status' => !$status ]);     
            if($status){
                return redirect()->back()->with('error',"This donation is remove from your favoriate list!");
            }                                   
        }else{
            DB::table('favourite_posts')->insert([
            'user_id' => $user,
            'donation_post_id' => $id->id,
            'status' => 1,
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
            ]);
        }
        return redirect()->back()->with('success',"This donation is add to your favoriate list!");
        // $user_identity = $key;
        // return view('web.main.add_to_favoriate',compact('user_identity'));
    }
    
    public function aboutUs()
    {
        return view('web.main.aboutUs');
    }
    public function contactUs()
    {
        return view('web.main.contactUs');
        
    }
    public function donationDetail($key)
    {
	
        if(DB::table('donation_posts')->where('key',$key)->where('status',1)->count() > 0 ){
            $dontaion_post = DB::table('donation_posts')->where('key',$key)->where('status',1)->first();
            $donation_images = DB::table('donation_images')->where('donation_post_id',$dontaion_post->id)->get();
            $city = City::where('id',$dontaion_post->city_id)->first();
            $state = $city->state;
            $country = $state->country;
            $spectification = Specification::where('id',$dontaion_post->specification_id)->first();
            $subcategory = $spectification->subcategory;
            $category = $subcategory->category;
            $user_type = DB::table('user_types')->where('id',$dontaion_post->user_type_id)->first();
             $user = DB::table('users')->where('id',$dontaion_post->user_id)->select('name','contact','email')->first();
           
			$donation_type = DB::table('donation_types')->where('id',$dontaion_post->donation_type_id)->first();
            $user_identity  = $key;
			
			/* Visitor Detail Store Start */
			
				/* Update Donation Post View */
					$count = intval($dontaion_post->post_view_counter) + 1;
						DB::table('donation_posts')
						->where('key',$key)
						->update(['post_view_counter' =>$count]);
				/* Update Donation Post View */
				
			 DonationPostView::create([
				'key'=>$key,
				'donation_post_id'=>$dontaion_post->id,
				'user_id'=>$dontaion_post->user_id,
				'system_code'=>request()->ip(),
				'status'=>1
				
			]);
			/* Visitor Detail Store End */
			
            return view('web.page.details',compact('dontaion_post',
                                                   'donation_images',
                                                   'city', 'user',
                                                   'state', 'donation_type',
                                                   'country','user_identity',
                                                   'category',
                                                   'subcategory',
                                                   'spectification','user_type'));
        }else{
            return view('web.main.404');
        }
    }
}
