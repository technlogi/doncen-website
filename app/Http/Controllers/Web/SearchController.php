<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use \App\Models\City,\App\Models\Category,\App\Models\Specification;

class SearchController extends Controller
{
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

    //condition search 
    public function condition(Request $request)
    {
        if($request->data == '1'){
            $donation_posts =  DB::table('donation_posts')
                                ->where('status',1)
                                ->where('condition',1)
                                ->orderBy('created_at','desc')
                                ->limit(10)
                                ->get();
        }else{
            $donation_posts =  DB::table('donation_posts')
                                ->where('status',1)
                                ->where('condition',2)
                                ->orderBy('created_at','desc')
                                ->limit(10)
                                ->get();
        }                   
        echo $this->printData($donation_posts,array(), array());
    }

    //consideration search 
    public function consideration(Request $request)
    {
        if($request->data == '5'){
            $donation_posts =  DB::table('donation_posts')
                                ->where('status',1)
                                ->orderBy('created_at','desc')
                                ->limit(10)
                                ->get();
        }else{
            $donation_posts =  DB::table('donation_posts')
            ->where('status',1)
            ->where('consideration',$request->data)
            ->orderBy('created_at','desc')
            ->limit(10)
            ->get();
        }                        
        echo $this->printData($donation_posts,array(), array());
    }

    //category search 
    public function category(Request $request)
    {
        $resutls = array();
        if(!empty($request->data)){
            $user_type_ids = explode("&ut=", $request->data);
            $user_type_ids[0] = substr($user_type_ids[0], 3);
            if(!empty($user_type_ids)){
                foreach($user_type_ids as $user_type_id){
                        $donation_posts =  DB::table('donation_posts')
                                            ->where('status',1)
                                            ->where('user_type_id',$user_type_id)
                                            ->get();
                        if(!empty($donation_posts)){
                            foreach($donation_posts as $donation_post){
                                if(!empty($donation_post)){
                                    array_push($resutls,$donation_post);
                                }                          
                            }             
                        }
                }
            } 
        }else{
            $resutls =  DB::table('donation_posts')
                                            ->where('status',1)
                                            ->get();
        }
        echo $this->printData($resutls,array(), array());
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
                    
                    $user_type = DB::table('user_types')
                            ->where('id',$result->user_type_id)
                            ->where('status',1)
                            ->first();
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
                                $print .='<a href="'. route("search.donation.details",$result->key).'"><img src="'.$result->image.'" alt="Image" class="img-responsive"></a>';
                                }else{
                                    $print .='<a href="'. route("search.donation.details",$result->key).'"><img src="/images/uploads/donation_post/preview.jpg" alt="Image" class="img-responsive"></a>';
                                }    
                                $print .= '<a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="Verified"><i class="fa fa-check-square-o"></i></a>
                            </div><!-- item-image -->
                        </div>
                        <!-- rending-text -->
                        <div class="item-info col-sm-9">
                            <!-- ad-info -->
                            <div class="ad-info">';
                          
                                if($result->consideration == '0'){
                                $print .=   '<span class="text-color pull-right">Free</span>' ;
                                }else if ($result->consideration == '1'){
                                    $print .= '<span class="text-color pull-right" title="'.$result->consideration_detail.'">Non-Monetary</span>';
                                }else{
                                    $print .= '<span class="text-color pull-right" title="'.$result->consideration_detail.'">Monetary</span>';
                                }
                                if(Auth::guard('user')->check()){
                                    if(Auth::guard('user')->user()->id == $result->user_id){
                                      $print .=   '<a href="'. route("user.donation.complete",[$result->key]) .'"><span class=" pull-right fa fa-edit" title="Make it complete"></span></a>' ;
                                    }
                                  }
                                $print .= '<h3 class="item-price">'.$result->title .'</h3>
                                <h4 class="item-title">'. $result->description.'</h4>
                                <div class="item-cat">
                                    <span><a href="#">'.$category->name.', '.$subcategory->name.', '. $specification->name.'</a></span> 
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
                                 '; 
                              
                                 if(($user_type->id == '3')  || ($user_type == '1')){
                                    $print .=  ' <a href="#" data-toggle="tooltip" data-placement="top" title="'. $user_type->name .'"><i class="fa fa-user"></i> </a>';
                                 }else{
                                    $print .=  ' <a href="#" data-toggle="tooltip" data-placement="top" title="'. $user_type->name .'"><i class="fa fa-users"></i> </a>';
                                 }
                                    $print .=  '<a class="online" href="#" data-toggle="tooltip" data-placement="top" title="Dealer"><i class="fa fa-suitcase"></i> </a>											
                                </div><!-- item-info-right -->
                            </div><!-- ad-meta -->
                        </div><!-- item-info -->
                    </div><!-- ad-item -->';
                }
            }   
        } 
        return $print;
    }

    //return search function drop down serch item 
    public function dropDownSearchItem(Request $request)
    {
        if($request->data == 2)
        {
            $donation_posts =  DB::table('donation_posts')
                                ->where('status',1)
                                ->orderBy('created_at','desc')
                                ->limit(5)
                                ->get();
                                
            echo $this->printData($donation_posts,array(), array());
        }elseif ($request->data == 3) { 
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
    
    //return search function data to screen
    public function getItem(Request $request)
    {
        $request->city_search_box = substr($request->city_search_box ,0,strpos($request->city_search_box,','));
        $city = City::where('name','LIKE','%'.$request->city_search_box.'%')->where('status',1)->first();
        $category = Category::where('name','LIKE','%'.$request->category_box.'%')->where('status',1)->first();
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
    
    //get and print of all category
    public function getSpecificList(Request $request)
    {
        $resutls = array();
        if(!empty($request->data)){
            $specification_ids = explode("&sp=", $request->data);
            $specification_ids[0] = substr($specification_ids[0], 3);
            if(!empty($specification_ids)){
                foreach($specification_ids as $specification_id){
                        $donation_posts =  DB::table('donation_posts')
                                            ->where('status',1)
                                            ->where('specification_id',$specification_id)
                                            ->get();
                        if(!empty($donation_posts)){
                            foreach($donation_posts as $donation_post){
                                if(!empty($donation_post)){
                                    array_push($resutls,$donation_post);
                                }                          
                            }             
                        }
                }
            } 
        }
        echo $this->printData($resutls,array(), array());
    }
    //donation type
    public function donationType(Request $request)
    {
        $resutls = array();
        if(!empty($request->data)){
            $donation_ids = explode("&td=", $request->data);
            $donation_ids[0] = substr($donation_ids[0], 3);
            if(!empty($donation_ids)){
                    foreach($donation_ids as $donation_id){
                    $donation_posts =  DB::table('donation_posts')->where('donation_type_id',$donation_id)->where('status',1)->get();
                    if(!empty($donation_posts)){
                        foreach($donation_posts as $donation_post){
                            if(!empty($donation_post)){
                                array_push($resutls,$donation_post);
                            }                          
                        }             
                    }
                }
            } 
        }
        echo $this->printData($resutls,array(), array());
    }

    //get list of product 
    public function getMyDonation(Request $request)
    {
        $donation_posts =  DB::table('donation_posts')->where('status',1) ->where('user_id',Auth::guard('user')->user()->id)    ->orderBy('created_at','desc')    ->limit(10)    ->get();
        if(!empty($donation_posts[0])){                    
            echo $this->printData($donation_posts,array(), array());
        }else{
            echo '<div class="alert alert-info">There is no Donation Post.</div>';
        }
    }

    //list of urgent donation of user by user id
    public function getUrgentRequirement(Request $request)
    {
        $donation_posts =  DB::table('donation_posts')->where('status',1)->where('is_urgent',1) ->where('user_id',Auth::guard('user')->user()->id)    ->orderBy('created_at','desc')    ->limit(10)    ->get();
        if(!empty($donation_posts[0])){                    
            echo $this->printData($donation_posts,array(), array());
        }else{
            echo '<div class="alert alert-info">There is no Donation Post.</div>';
        }
    }
    
    //list of all complete donation by user
    public function getCompleteDonation(Request $requset)
    {
        $donation_posts =  DB::table('donation_posts')->where('status',1)->where('is_complete',1) ->where('user_id',Auth::guard('user')->user()->id)    ->orderBy('created_at','desc')    ->limit(10)    ->get();
        if(!empty($donation_posts[0])){                    
            echo $this->printData($donation_posts,array(), array());
        }else{
            echo '<div class="alert alert-info">There is no Donation Post.</div>';
        }
    }
   
}
