<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use \App\Http\Requests\StoreDonationDetailRequest;
use App\Http\Controllers\Controller;
use \App\Models\Category;
use \App\Models\Subcategory;
use \App\Models\Specification;
use \App\Models\City;
use DB;
use \Auth;
class WebController extends Controller
{

    public function home()
    {
        $categories = Category::where('status',1)->get();
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
        $titles = DB::table('donation_posts')->where('status',1)->select('title')->get();
        return view('web.page.home',compact('titles','categories'));
    }
    //donation Form
    public function donationDetails(Request $request)
    {
        if (Auth::guard('user')->check()){
            $user = Auth::guard('user')->user()->id;
        }else{
            session()->flash('error', 'You must logged in before filling Dontation form.');
           return redirect('/user/login');
        }
        return redirect()->route('web.donation.DetailForm',$request->specification);
    }
    //donation details form 
    public function donationDetailForm($key)
    {
        $specification = Specification::where('key',$key)->first();
        $subcategory = $specification->subcategory;
        $category = $subcategory->category;
        $user_types = DB::table('user_types')->select('name','key')->where('status',1)->get();
        return view('web.page.donation_detail',compact('specification','subcategory','category','user_types','key'));
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
        
        $city_name = explode(', ',$request->city);
        $city = City::where('name','LIKE','%'.$city_name[sizeof($city_name)-3].'%')->first();
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
            'lat' => '',
            'long' => '',
            'donation_type_id' => $request->donation_type,
            'donation_type_other' => $request->donation_type_other,
            'preference' =>$request->preference,                              //0-new | 1-anyone	
            'preference_gender' => implode(',',$request->preference_gender),              // 1-male | 2-female | 3-other	
            'preference_age' => implode(',',$request->preference_age),                   //1-0to14 | 2-14to30 | 3-30to60 | 4-above60	
            'preference_is_handicap'=> $request->preference_is_handicap,   // 0-no | 1-yes	
            'consideration' => $request->consideration,                   //0-free | 1-Non-Monetary | 2-Monetary	
            'consideration_detail'=> $request->consideration_detail,
            'is_urgent'=> $request->is_urgent ,                          // 0-no | 1-yes
            'urgent_reason'	=> $request->urgent_reason,
            'd_status' => $request->d_status ,//0-Individual | 1-Organization	
            'd_name'	=> $request->name ,
            'd_email'=> $request->email ,
            'd_contact'=> $request->mobile_no ,
            'd_address'=> $request->address ,
            'helper_status'=> $request->helper_status ,                                       // 0-Individual | 1-Organization	
            'helper_name'=> $request->helper_name ,
            'helper_email'=> $request->helper_email ,
            'helper_contact'=> $request->helper_contact ,
            'helper_address'	=> $request->helper_address, 
            'status' =>1 ,
            'created_at'=> new \DateTime(),
            'updated_at'=> new \DateTime()
      ]);
        if(!empty($request->image_file)){
           foreach($request->image_file as $image_file){
                $imageName = uniqid('img_').time().'.'.$image_file->getClientOriginalExtension();
                $image_file->move(public_path('images/uploads/donation_post/'), $imageName);
                DB::table('donation_images')->insert([
                    'donation_post_id' => 9,
                    'key' => generateKey(12),
                    'image' => $imageName,
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
                                    if($result->condition == 1) 
                                        $print .= "New";
                                        else
                                        $print .= "Used";
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
            

            return view('web.page.details',compact('dontaion_post',
                                                   'donation_images',
                                                   'city', 'user',
                                                   'state',
                                                   'country',
                                                   'category',
                                                   'subcategory',
                                                   'spectification','user_type'));
        }else{
            return view('web.main.404');
        }
    }
}
