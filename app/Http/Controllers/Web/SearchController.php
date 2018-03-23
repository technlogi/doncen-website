<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
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

     //consideration search 
     public function category(Request $request)
     {
         if($request->data == '1'){
             $donation_posts =  DB::table('donation_posts')->where('status',1)->where('donation_type_id',1)->orderBy('created_at','desc')->limit(10)->get();
         }else if($request->data == '2'){
            $donation_posts =  DB::table('donation_posts')->where('status',1)->where('donation_type_id',2)->orderBy('created_at','desc')->limit(10)->get();
         }else if($request->data == '3'){
            $donation_posts =  DB::table('donation_posts')->where('status',1)->where('donation_type_id',3)->orderBy('created_at','desc')->limit(10)->get();
         }else if($request->data == '4'){
            $donation_posts =  DB::table('donation_posts')->where('status',1)->where('donation_type_id',4)->orderBy('created_at','desc')->limit(10)->get();
         }else{
            $donation_posts =  DB::table('donation_posts')->where('status',1)->orderBy('created_at','desc')->limit(10)->get();
         }                        
         echo $this->printData($donation_posts,array(), array());
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
}
