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
            session()->flash('error', 'You Must Login First For create Dontation.');
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
        
        $city = City::where('name','LIKE','%'.$request->city.'%')->first();
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
        
      session()->flash('success','Donation Post Created Successfully.');
     return redirect('/user/dashboard');
    }
    //get featured add by donation key
    public function getDonationPost(Request $request)
    {
        $categories = Category::where('status',1)->where('key',$request->key)->first();
        $results = array();
        foreach($categories->subcategories as $subcategory){
            $donations =   DB::table('donation_posts')
                            ->where('specification_id',$subcategory->id)
                            ->where('status',1)
                            ->where('is_urgent',1)
                            ->get ();
            if(!empty($donations)){
                foreach($donations as $donation){
                    array_push($results,$donation);
                }
            }
        }
        echo $this->printData($results,array(), $categories);
    }

    //return search function data to screen
    public function getItem(Request $request)
    {
        //'.$request->city_search_box.'
       $city = \App\Models\City::where('name','LIKE','%indore%')->where('status',1)->first();
       $category = \App\Models\Category::where('name','LIKE','%'.$request->category_box.'%')->where('status',1)->first();
       if(!empty($category)){
            $subcategories = $category->subcategories;
       }else{
            $subcategories ='';
       }
       $results = array();
       if(!empty($subcategories))
        {
               foreach($subcategories as $subcategory)
               {
                if(!empty($subcategory))
                {
                    $specifications = $subcategory->specifications;
                    foreach ($specifications as $specification)
                    {
                        $donation_posts =  DB::table('donation_posts')
                                            ->where('status',1)
                                            ->where('specification_id',$specification->id)
                                            ->where('city_id',$city->id)
                                            ->orWhere('title','LIKE','%'.$request->word_box .'%')
                                            ->where('specification_id',$specification->id)
                                            ->where('city_id',$city->id)
                                            ->orWhere('description','LIKE','%'.$request->word_box .'%')
                                            ->where('specification_id',$specification->id)
                                            ->where('city_id',$city->id)
                                            ->get();
                        if(!empty($donation_posts))
                        {
                            foreach($donation_posts as $donation)
                            {
                                $donation_image = DB::table('donation_images')
                                                    ->where('donation_post_id',$donation->id)
                                                    ->where('status',1)
                                                    ->first();
                                if(!empty($donation_image)){
                                    $donation->image = DONATION_POST_IMAGE($donation_image->image);
                                }else{
                                    $donation->image = DONATION_POST_IMAGE('preview.jpg');
                                }
                                array_push($results,$donation);
                            }
                        }
                    }
                } 
            }
        }  
      echo $this->printData($results,$city, $category);
    }
    
    //return search function drop down serch item 
    public function dropDownSearchItem(Request $request)
    {
        if($request->id == 2)
        {
            $donation_posts =  DB::table('donation_posts')
                                ->where('status',1)
                                ->orderBy('created_at','desc')
                                ->limit(5)
                                ->get();
                                
            echo $this->printData($donation_posts,array(), array());
        }elseif ($request->id == 3) { 
                $donation_posts =  DB::table('donation_posts')
                                    ->where('status',1)
                                    ->where('is_urgent',1)
                                    ->orderBy('created_at','desc')
                                    ->limit(10)
                                    ->get();
                echo $this->printData($donation_posts,array(), array());
        }else{
            $donation_posts =  DB::table('donation_posts')
            ->where('status',1)
            ->get();
            echo $this->printData($donation_posts,array(), array());
        }
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

    //on load of page call function to print table
    public function getItemOnLoad()
    {
        $donation_posts =  DB::table('donation_posts')
                            ->where('status',1)
                            ->orderBy('created_at','desc')
                            ->limit(10)
                            ->get();
        echo $this->printData($donation_posts,array(), array());
    }
}
