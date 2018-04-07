<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use \App\Models\City,\App\Models\Category,\App\Models\Subcategory,\App\Models\Specification;

class SearchController extends Controller
{
    //on load of page call function to print table
    public function getItemOnLoad(Request $request)
    {
        $page = $request->data['page'];
        $perPage = 2;
        $offset = ($page * $perPage) - $perPage;
        $donation_posts =  DB::table('donation_posts')
                            ->where('status',1)
                            ->orderBy('created_at','desc')
                            ->get();
       $dontion = $donation_posts->slice($offset,$perPage); 
        echo $this->printData($dontion,array(), array());
    }

    //on load of page call function to print table
    public function getRecomandatePost(Request $request)
    {
        $donation_posts =  DB::table('donation_posts')
                            ->where('status',1)
                            ->where('specification_id',$request->data['specification'])
                            ->orWhere('city_id',$request->data['id'])
                            ->orderBy('created_at','desc')
                            ->limit(2)
                            ->get();
        echo $this->printData($donation_posts,array(), array());
    }

    //favoriate donation
    public function getfavoriateDonation(Request $request)
    {
        $posts =  DB::table('favorite_posts')->where('user_id',Auth::guard('user')->user()->id)->where('status',1)->get();
        $results = array();
        foreach($posts as $post){
            $donation_post = DB::table('donation_posts')
                                    ->where('status',1)
                                    ->where('id',$post->id)->first();
            if(!empty($donation_post)){
               array_push($results,$donation_post);
            }
        }
        if(!empty($results)){                    
            echo $this->printData($results,array(), array());
        }else{
            echo '<div class="alert alert-info">There is no favoriate Donation Post.</div>';
        }
    }

    //condition search 
    public function condition(Request $request)
    {
        $resutls = array();
        if(!empty($request->data)){
            $condition_ids = explode("&cd=", $request->data);
            $condition_ids[0] = substr($condition_ids[0], 3);
            print_r($condition_ids);
            if(!empty($condition_ids)){
                session(['scroll.condition_ids' => $condition_ids]);
                foreach($condition_ids as $condition){
                    $donation_posts =  DB::table('donation_posts')
                                        ->where('status',1)
                                        ->where('condition',$condition)
                                        ->orderBy('created_at','desc')
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

    //consideration search 
    public function consideration(Request $request)
    {
        $resutls = array();
        if(!empty($request->data)){
            $considaration_ids = explode("&cs=", $request->data);
            $considaration_ids[0] = substr($considaration_ids[0], 3);
            if(!empty($considaration_ids)){
                session(['scroll.considaration_ids' => $considaration_ids]);
                foreach($considaration_ids as $considaration_id){
                        if($considaration_id == 5 ){
                            $resutls =  DB::table('donation_posts')
                                        ->where('status',1)
                                        ->orderBy('created_at','desc')
                                        ->get();
                                         break;
                        }else{
                            $donation_posts =  DB::table('donation_posts')
                                ->where('status',1)
                                ->where('consideration',$considaration_id)
                                ->orderBy('created_at','desc')
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
        }
        echo $this->printData($resutls,array(), array());
    }

    //category search 
    public function category(Request $request)
    {
        $resutls = array();
        if(!empty($request->data)){
            $user_type_ids = explode("&ut=", $request->data);
            $user_type_ids[0] = substr($user_type_ids[0], 3);
            if(!empty($user_type_ids)){
                session(['scroll.user_type_ids' => $user_type_ids]);
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
                    }else {
                        $specification =  Specification::where('id',$result->specification_id)->where('status',1)->first();
                        $subcategory = $specification->subcategory;
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
                              
                                 if($user_type->id == '1'){
                                    $print .=  ' <a href="#" data-toggle="tooltip" data-placement="top" title="'. $user_type->name .'"><i class="fa fa-share-square-o"></i> </a>';
                                 }else if($user_type->id == '3'){
                                    $print .=  ' <a href="#" data-toggle="tooltip" data-placement="top" title="'. $user_type->name .'"><i class="fa fa-shopping-basket"></i> </a>';
                                 }else {
                                    $print .=  ' <a href="#" data-toggle="tooltip" data-placement="top" title="'. $user_type->name .'"><i class="fa fa-handshake-o"></i> </a>';
                                 }

                                 if(!empty($result->helper_status)){
                                    if($result->helper_status){
                                        $print .=  '<a  href="#" data-toggle="tooltip" data-placement="top" title="Organization"><i class="fa fa-building"></i> </a>';
                                    }else {
                                        $print .=  '<a  href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user-secret"></i> </a>';
                                    }
                                }else{
                                    if($result->d_status){
                                        $print .=  '<a  href="#" data-toggle="tooltip" data-placement="top" title="Organization"><i class="fa fa-building"></i> </a>';
                                    }else {
                                        $print .=  '<a  href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user-secret"></i> </a>';
                                    }
                                }
                                 
                                    
                                    $print .=  '</div><!-- item-info-right -->
                            </div><!-- ad-meta -->
                        </div><!-- item-info -->
                    </div><!-- ad-item -->';
                }
            }   
        }else{
            $print = '<div class="alert alert-info"><center>There is no donation post related to your search.</center></div>';
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
                                ->get();
                                
            echo $this->printData($donation_posts,array(), array());
        }elseif ($request->data == 3) { 
                $donation_posts =  DB::table('donation_posts')
                                    ->where('status',1)
                                    ->orderBy('created_at','asc')
                                    ->get();
                echo $this->printData($donation_posts,array(), array());
        }elseif ($request->data == 4) { 
            $donation_posts =  DB::table('donation_posts')
                                ->where('status',1)
                                ->orderBy('consideration_detail','asc')
                                ->get();
            echo $this->printData($donation_posts,array(), array());
       }elseif ($request->data == 5) { 
          $donation_posts =  DB::table('donation_posts')
                            ->where('status',1)
                            ->orderBy('consideration_detail','desc')
                            ->get();
            echo $this->printData($donation_posts,array(), array());
        }elseif ($request->data == 6) { 
            $donation_posts =  DB::table('donation_posts')
                                ->where('status',1)
                                ->where('is_urgent',1)
                                ->orderBy('created_at','desc')
                                ->get();
            echo $this->printData($donation_posts,array(), array());
        }
       else{
            $donation_posts =  DB::table('donation_posts')
                                ->where('status',1)
                                ->get();
            echo $this->printData($donation_posts,array(), array());
        }
    }
    
    //return search function data to screen
    public function getItem(Request $request)
    {
        $page = $request->data['page'];
        $perPage = 2;
        $offset = ($page * $perPage) - $perPage;
        $city_name = explode(', ',$request->data['data'][0]['value']);
        $city_ids = search_city( $city_name[0] ); //helper for find city ids
        $category = Category::where('name','LIKE',''.$request->data['data'][1]['value'])->where('status',1)->first();
        if(!empty($category)){
                $subcategories = $category->subcategories;
        }else{
                $subcategories ='';
        }
        $specification_ids = array();
        if(!empty($subcategories)){
            foreach($subcategories as $subcategory) {
                if(!empty($subcategory)) {
                    foreach ($subcategory->specifications as $specification){
                        if(!empty($specification)){
                          array_push($specification_ids,$specification->id);    
                        }
                    }
                } 
            }
        }  
            $donation_posts =  DB::table('donation_posts')
                        ->where('status',1)
                        ->whereIn('city_id',$city_ids)
                        ->whereIn('specification_id',$specification_ids)
                        // ->orWhere('title','LIKE','%'.$request->data['data'][2]['value'].'%')
                        // ->orWhere('description','LIKE','%'.$request->data['data'][2]['value'].'%')
                        ->get();
            $results = array();
            session(['scroll.specification_ids' => $specification_ids]);
            session(['scroll.categories' => $category]);
            if(!empty($donation_posts)){
                foreach($donation_posts as $donation){
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
        $dontion = $donation_posts->slice($offset,$perPage); 
        echo $this->printData($results,array(), $category);
    }

    //get featured add by donation key
    public function getDonationPost(Request $request)
    {

        $results = array();
        if($request->key == 1){
            $results =  DB::table('donation_posts')
                            ->where('status',1)
                            ->orderBy('created_at','desc')
                            ->limit(2)
                            ->get();
            $categories = array();
        }else{
            $categories = Category::where('status',1)->where('key',$request->key)->first();
        }
        if(!empty($categories)){
            session(['scroll.categories' => $categories]);
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
                session(['scroll.specification_ids' => $specification_ids]);
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
                session(['scroll.donation_ids' => $donation_ids]);
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

    public function getScrollData(Request $request)
    {
        $page = $request->data['page'];
        $perPage = 2;
        $offset = ($page * $perPage) - $perPage;
        $query = DB::table('donation_posts')
                ->where('status',1)
                ->orderBy('created_at','desc');

        if ($request->session()->has('scroll.donation_ids')){
            foreach($request->session()->get('scroll.donation_ids') as $donation_id){
                $query->orWhere('donation_type_id', '=', $donation_id);
            }
        }
        if ($request->session()->has('scroll.specification_ids')){
            foreach($request->session()->get('scroll.specification_ids') as $specification_id){
                $query->orWhere('specification_id', '=', $specification_id);
            }
        }
        if ($request->session()->has('scroll.considaration_ids')){
            foreach($request->session()->get('scroll.considaration_ids') as $considaration_id){
                $query->orWhere('consideration', '=', $considaration_id);
            }
        }
        if ($request->session()->has('scroll.condition_id')){
            foreach($request->session()->get('scroll.condition_id') as $condition_id){
                $query->orWhere('condition', '=',  $condition_id);
            }
        }
        if ($request->session()->has('scroll.user_type_ids')){
            foreach($request->session()->get('scroll.user_type_ids') as $user_type_id){
                $query->orWhere('donation_type_id', '=', $user_type_id);
            }
        }
        $donation_posts = $query->get();
        $dontion = $donation_posts->slice($offset,$perPage); 
        echo $this->printData($dontion,array(), array());
    }

    //get list of product 
    public function getMyDonation(Request $request)
    {
        $donation_posts =  DB::table('donation_posts')->where('status',1) ->where('user_id',Auth::guard('user')->user()->id)    ->orderBy('created_at','desc')    ->limit(2)    ->get();
        if(!empty($donation_posts[0])){                    
            echo $this->printData($donation_posts,array(), array());
        }else{
            echo '<div class="alert alert-info">There is no Donation Post.</div>';
        }
    }
    //Cateogry for on click to show data
    public function getCategoryData(Request $request)
    {
        $resutls = array();
        if(!empty($request->data)){
            $category_ids = explode("&ct=", $request->data);
            $category_ids[0] = substr($category_ids[0], 3);
            if(!empty($category_ids)){
                foreach($category_ids as $category_id){
                    $categories = Category::where('id',$category_id)->first();
                    if(!empty($categories)){
                        foreach($categories->subcategories as $subcatogry) {
                            if(!empty($subcatogry)){
                                foreach($subcatogry->specifications as $specification) {
                                    $donation_posts =  DB::table('donation_posts')
                                                        ->where('status',1)
                                                        ->where('specification_id',$specification->id)
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
                    }    
                }
            } 
        }
        echo $this->printData($resutls,array(), array());
    }
    //SubCateogry for on click to show data
    public function getsubCategoryData(Request $request)
    {
        $resutls = array();
        if(!empty($request->data)){
            $subcateogry_ids = explode("&st=", $request->data);
            $subcateogry_ids[0] = substr($subcateogry_ids[0], 3);
            if(!empty($subcateogry_ids)){
                foreach($subcateogry_ids as $subcateogry_id){
                    $subcatogry = Subcategory::where('id',$subcateogry_id)->first();
                    if(!empty($subcatogry)){
                        foreach($subcatogry->specifications as $specification) {
                            $donation_posts =  DB::table('donation_posts')
                                                ->where('status',1)
                                                ->where('specification_id',$specification->id)
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
            } 
        }
        echo $this->printData($resutls,array(), array());
    }

    //list of urgent donation of user by user id
    public function getUrgentRequirement(Request $request)
    {
        $donation_posts =  DB::table('donation_posts')->where('status',1)->where('is_urgent',1) ->where('user_id',Auth::guard('user')->user()->id)    ->orderBy('created_at','desc')    ->limit(2)    ->get();
        if(!empty($donation_posts[0])){                    
            echo $this->printData($donation_posts,array(), array());
        }else{
            echo '<div class="alert alert-info">There is no Donation Post.</div>';
        }
    }
    
    //list of all complete donation by user
    public function getCompleteDonation(Request $requset)
    {
        $donation_posts =  DB::table('donation_posts')->where('status',1)->where('is_complete',1) ->where('user_id',Auth::guard('user')->user()->id)    ->orderBy('created_at','desc')    ->limit(2)    ->get();
        if(!empty($donation_posts[0])){                    
            echo $this->printData($donation_posts,array(), array());
        }else{
            echo '<div class="alert alert-info">There is no Complete Donation Post.</div>';
        }
    }
    
    public function getpandingDonation(Request $request)
    {
        $donation_posts =  DB::table('donation_posts')->where('status',1)->where('is_complete',0) ->where('user_id',Auth::guard('user')->user()->id)    ->orderBy('created_at','desc')    ->limit(2)    ->get();
        if(!empty($donation_posts[0])){                    
            echo $this->printData($donation_posts,array(), array());
        }else{
            echo '<div class="alert alert-info">There is no Panding Donation Post.</div>';
        }
    }
} 
