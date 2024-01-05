<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Api\Validate;
use App\Http\Services\Api\ApiServices;
use \App\Models\Category,\App\Models\Subcategory,\App\Models\Specification,
    \App\Models\User, \App\Models\City;
use DB;
class ApiController extends Controller
{
    protected $validate;
    protected $apiService;

    public function __construct(Validate $validate,ApiServices $apiService)
    {
        $this->validate = $validate;
        $this->apiService = $apiService;
    }
   /**
    * List of all category
     */
    public function  category()
    {
        return response()->json([
            'response' => 'success',
            'message' => "List of All Categories!",
            'result' => Category::where('status',1)->select('key','name','image')->get()
        ]);
    }
   /**
    * List of all subCategory
     */
    public function  subCategory()
    {
        return response()->json([
            'response' => 'success',
            'message' => "List of All Categories!",
            'result' => Subcategory::where('status',1)->select('key','name')->get()
        ]);
    }
   /**
    * List of all specification 
     */
    public function  specification()
    {
        return response()->json([
            'response' => 'success',
            'message' => "List of All Categories!",
            'result' => Specification::where('status',1)->select('key','name')->get()
        ]);
    }
    /**
     * category To subcategory 
     */
    public function categoryTosubcategory(Request $request)
    {
        $category = Category::where('key',$request->key)->where('status',1)->first();
        $results = array();
        foreach($category->subcategories as $subCategory)
        {
            $sub = array('key'=> $subCategory->key,'name' =>$subCategory->name);
            array_push($results,$sub);
        }
        return response()->json([
            'response' => 'success',
            'message' => "List of All Subcategories!",
            'result' => $results
        ]);
    }  
    /**
     * subcategory To  Specification
     */
    public function subcategoryToSpecification(Request $request)
    {
        $subcategory = Subcategory::where('key',$request->key)->where('status',1)->first();
        $results = array();
        foreach($subcategory->specifications as $specification)
        {
            $specific = array('key'=> $specification->key,'name' =>$specification->name);
            array_push($results,$specific);
        }
        return response()->json([
            'response' => 'success',
            'message' => "Specification of subcategory!",
            'result' => $results
        ]);
    }
    /**
     * subcategory To Category
     */
    public function subcategoryToCategory(Request $request)
    {
        $subcategory = Subcategory::where('key',$request->key)->where('status',1)->first();
        return response()->json([
            'response' => 'success',
            'message' => "detail of category!",
            'result' => array('key'=>$subcategory->category->key ,'name'=>$subcategory->category->name)
        ]);
    }  
    /**
     * specification To Subcategory
     */
    public function specificationToSubcategory(Request $request)
    {
        $specifications = Specification::where('key',$request->key)->where('status',1)->first();
        return response()->json([
            'response' => 'success',
            'message' => "detail of subcategory!",
            'result' => array('key'=>$specifications->subcategory->key,'name' => $specifications->subcategory->name)
        ]);
    }

    /**
     *  Donation form
    */
    public function submitDonationForm(Request $request)
    {
      if($this->validate->validateDonationForm($request)) return $this->validate->validateDonationForm($request);
      
  
        if (User::where('key',$request->user_id)->count() > 0 ){
          $user = User::where('key',$request->user_id)->first()->id;
        }else{
            return [
                'response_code' => 401,
                'response' => 'error',
                'message' => 'Invalid User.',
            ];
        }
        try{
            $search = explode(', ',$request->donation_address);
            $city = check_for_city($search);
            $d_search = explode(', ',$request->d_address);
            $d_city = check_for_city($d_search);
            if(!empty($request->helper_address)){
                $helper_address_search = explode(', ',$request->helper_address);
                $helper_city = check_for_city($helper_address_search);
                $helper_city_id = $helper_city->id;
            }else{
                $helper_city_id = null;
            }
            $specification = Specification::where('key',$request->specification_key)->first();
            $id =  DB::table('donation_posts')->insertGetId([
                'key'=> generateKey(14),
                'post_no'=> generatePostNO(),
                'user_id' =>  $user	,
                'specification_id'=> $specification->id, 
                'user_type_id' => $request->user_type_id,
                'title' => $request->title,
                'description'=> $request->description,
                'condition' => $request->condition,
                'city_id' =>$city->id ,
                'address' => $request->donation_address,
                'lat' => $request->lat,
                'long' => $request->long,
                'system_code' =>$request->system_code,
                'donation_type_id' => $request->donation_type_id,
                'donation_type_other' => $request->donation_type_other,
                'preference' =>$request->preference,                              //0-new | 1-anyone	
                'preference_gender' => $request->preference_gender,              // 1-male | 2-female | 3-other	
                'preference_age' => $request->preference_age,                   //1-0to14 | 2-14to30 | 3-30to60 | 4-above60	
                'preference_is_handicap'=> $request->preference_is_handicap,   // 0-no | 1-yes	
                'consideration' => $request->consideration,                   //0-free | 1-Non-Monetary | 2-Monetary	
                'consideration_detail'=> $request->consideration_detail,
                'is_urgent'=> $request->is_urgent ,                          // 0-no | 1-yes
                'urgent_reason'	=> $request->urgent_reason,
                'd_status' => $request->d_status ,//0-Individual | 1-Organization	
                'd_name'	=> $request->d_name ,
                'd_email'=> $request->d_email ,
                'd_contact'=> $request->d_contact ,
                'd_city_id' => $d_city->id,
                'd_address'=> $request->d_address ,
                'helper_status'=> $request->helper_status ,                                       // 0-Individual | 1-Organization	
                'helper_name'=> $request->helper_name ,
                'helper_email'=> $request->helper_email ,
                'helper_contact'=> $request->helper_contact ,
                'helper_city_id' => $helper_city_id,
                'helper_address'	=> $request->helper_address, 
                'status' =>1 ,
                'created_at'=> new \DateTime(),
                'updated_at'=> new \DateTime()
            ]);
 
            if(!empty($request->image_file1))
                $this->apiService->uploadDonationImage($request->image_file1,$id);
            if(!empty($request->image_file2))
                $this->apiService->uploadDonationImage($request->image_file2,$id);
            if(!empty($request->image_file3))
                $this->apiService->uploadDonationImage($request->image_file3,$id);
            if(!empty($request->image_file4))
                $this->apiService->uploadDonationImage($request->image_file4,$id);
          
              
            return response()->json([
                'response' => 'success',
                'message' => "Donation Form create successfully",
            ]);    
        }catch(\Exception  $exception){
            return [
                'response_code' => 401,
                'response' => 'error',
                'message' => 'something went horribly wrong.',
            ];
        }
    }
    /**
     * Get All List of donation
      */
    public function getAllDonation(Request $request)
    {
        $results = array();
        $donation_posts = DB::table('donation_posts')->where('status',1)->get();
        foreach($donation_posts as $donation_post){
            $user = User::where('id',$donation_post->user_id)->where('status',1)->first();
            $specifications = Specification::where('id',$donation_post->specification_id)->first();
            $subcategory = $specifications->subcategory;
            $category = $subcategory->category;
            $user_type = DB::table('user_types')->where('id',$donation_post->user_type_id)->first();
            $donation_type = DB::table('donation_types')->where('id',$donation_post->donation_type_id)->first();
            $condition = $donation_post->condition == 1 ? "New" : "old";
            $is_complete = $donation_post->is_complete ? "Complete" : "Pandding" ;
            $status = $donation_post->status ? "Active" : "Deactive" ;
            $helper_status = $donation_post->helper_status ? "Organization" : "Individual" ;
            $d_status = $donation_post->d_status ? "Organization" : "Individual" ;
            $is_urgent = $donation_post->is_urgent ? "Urgent" : "" ;
            $urgent_reason =  $donation_post->urgent_reason ? $donation_post->urgent_reason : "" ;
            $consideration = $donation_post->consideration ? $donation_post->consideration ==1 ? "Non-Monetary" : "Monetary" : "Free" ;
            $urgent_reason =  $donation_post->urgent_reason ? $donation_post->urgent_reason : "" ;
            $donation_image = DB::table('donation_images')
                                ->where('donation_post_id',$donation_post->id)
                                ->where('status',1)
                                ->first();
                if(!empty($donation_image)){
                    $image = DONATION_POST_IMAGE($donation_image->image);
                }else{
                    $image = DONATION_POST_IMAGE('preview.jpg');
                }
                $donation_posts =  DB::table('donation_posts')
                                    ->select('key','post_no','title','description','address','lat',
                                    'long','helper_name',
                                    'helper_email',
                                    'helper_contact',
                                    'helper_address','d_name',
                                    'd_email',
                                    'd_contact',
                                    'd_address')
                                    ->where('id',$donation_post->id)
                                    ->first();
           array_push($results,
            array(
                'key' =>$donation_post->key,
                'post_no' =>$donation_post->post_no,
                'image' => $image,
                'title' =>$donation_post->title,
                'description' =>$donation_post->description,
                'address' =>$donation_post->address,
                'latitude' =>$donation_post->lat,
                'longitude' =>$donation_post->long,
                'helper_name' =>$donation_post->helper_name,
                'helper_email' =>$donation_post->helper_email,
                'helper_contact' =>$donation_post->helper_contact,
                'helper_address' =>$donation_post->helper_address,
                'donner_name' =>$donation_post->d_name,
                'donner_email' =>$donation_post->d_email,
                'donner_contact' =>$donation_post->d_contact,
                'donner_address' =>$donation_post->d_address, 
                'user_name' => $user->name,
                'specifications' => $specifications->name,
                'subcategory' => $subcategory->name,
                'category' => $category->name,
                'user_type' => $user_type->name,
                'donation_type' => $donation_type->name,
                'is_complete' => $is_complete,
                'condition' => $condition,
                'status' => $status,
                'd_status' => $d_status,
                'is_urgent' => $is_urgent,
                'urgent_reason' => $urgent_reason,
                'consideration' => $consideration
            )
          ) ;           	

        }
        return [
            'response' => 'success',
             'massage' => "All Post list",
            'result' => $results,
        ];
    }
    
    /**
     * Get Specific donation on based of key
    */
    public function getDonation(Request $request)
    {
       if($this->validate->validateKey($request)) return $this->validate->validateKey($request);  
        if(DB::table('donation_posts')->where('key',$request->key)->count() > 0 ){
            $donation_post = DB::table('donation_posts')->where('key',$request->key)
                                        ->where('status',1)
                                        ->first();
            $donation_image = DB::table('donation_images')
                                    ->where('donation_post_id',$donation_post->id)
                                    ->where('status',1)
                                    ->first();
            if(!empty($donation_image)){
                $image = DONATION_POST_IMAGE($donation_image->image);
            }else{
                $image = DONATION_POST_IMAGE('preview.jpg');
            }
            $user_type = DB::table('user_types')->where('id',$donation_post->user_type_id)->first();
            $user = User::where('id',$donation_post->user_id)->where('status',1)->first();
            $donation_type   = DB::table('donation_types')->where('id',$donation_post->donation_type_id)->first();
            $specifications  = Specification::where('id',$donation_post->specification_id)->first();
            $subcategory     = $specifications->subcategory;
            $category        = $subcategory->category;
            $array =   array(
                'key' =>$donation_post->key,
                'post_no' =>$donation_post->post_no,
                'image' => $image,
                'title' =>$donation_post->title,
                'description' =>$donation_post->description,
                'address' =>$donation_post->address,
                'latitude' =>$donation_post->lat,
                'longitude' =>$donation_post->long,
                'helper_name' =>$donation_post->helper_name,
                'helper_email' =>$donation_post->helper_email,
                'helper_contact' =>$donation_post->helper_contact,
                'helper_address' =>$donation_post->helper_address,
                'donner_name' =>$donation_post->d_name,
                'donner_email' =>$donation_post->d_email,
                'donner_contact' =>$donation_post->d_contact,
                'donner_address' =>$donation_post->d_address, 
                'user_name' => $user->name,
                'specifications' => $specifications->name,
                'subcategory' => $subcategory->name,
                'category' => $category->name,
                'user_type' => $user_type->name,
                'donation_type' => $donation_type->name,
                'is_complete' => $donation_post->is_complete ? "Complete" : "Pandding",
                'condition' => $donation_post->condition == 1 ? "New" : "old",
                'status' => $donation_post->status ? "Active" : "Deactive" ,
                'd_status' => $donation_post->d_status ? "Organization" : "Individual",
                'is_urgent' => $donation_post->is_urgent ? "Urgent" : "" ,
                'urgent_reason' => $donation_post->urgent_reason ? $donation_post->urgent_reason : "" ,
                'consideration' =>  $donation_post->consideration ? $donation_post->consideration ==1 ? "Non-Monetary" : "Monetary" : "Free",
                'created_at' => $donation_post->created_at
            );
           return response()->json([
                'response' => 'success',
                'message' => "Specifica donation with key:-".$request->key."" ,
                'results'=> $array
            ]); 
        }else{
            return [
                'response_code' => 401,
                'response' => 'error',
                'message' => 'Invalid Key.',
            ];
        }  
    }
    /**
     * Document of all post and formate 
     * make image url and give full detail 
     * also give all empty result
      */
    public function searchPost($donation_posts)
    {
        $results = array();
        if(!empty($donation_posts)){
            foreach($donation_posts as $donation_post){
                //$donation_posts = DB::table('donation_posts')->where('status',1)->get();
                $user = User::where('id',$donation_post->user_id)->where('status',1)->first();
                $specifications = Specification::where('id',$donation_post->specification_id)->first();
                $subcategory = $specifications->subcategory;
                $category = $subcategory->category;
                $user_type = DB::table('user_types')->where('id',$donation_post->user_type_id)->first();
                $donation_type = DB::table('donation_types')->where('id',$donation_post->donation_type_id)->first();
                $condition = $donation_post->condition == 1 ? "New" : "old";
                $is_complete = $donation_post->is_complete ? "Complete" : "Pandding" ;
                $status = $donation_post->status ? "Active" : "Deactive" ;
                $helper_status = $donation_post->helper_status ? "Organization" : "Individual" ;
                $d_status = $donation_post->d_status ? "Organization" : "Individual" ;
                $is_urgent = $donation_post->is_urgent ? "Urgent" : "" ;
                $urgent_reason =  $donation_post->urgent_reason ? $donation_post->urgent_reason : "" ;
                $consideration = $donation_post->consideration ? $donation_post->consideration ==1 ? "Non-Monetary" : "Monetary" : "Free" ;
                $urgent_reason =  $donation_post->urgent_reason ? $donation_post->urgent_reason : "" ;
                $donation_image = DB::table('donation_images')->where('donation_post_id',$donation_post->id)->where('status',1)->first();
                    if(!empty($donation_image)){
                        $image = DONATION_POST_IMAGE($donation_image->image);
                    }else{
                        $image = DONATION_POST_IMAGE('preview.jpg');
                    }
                    if(!empty($user->profile_pic)){
                        $user_image = USER_IMAGE($user->profile_pic);
                    }else{
                        $user_image = USER_IMAGE('preview.jpg');
                    }
                    $donation_item =  DB::table('donation_posts')
                                        ->select('key','post_no','title','description','address','lat',
                                                    'long','helper_name',
                                                    'helper_email',
                                                    'helper_contact',
                                                    'helper_address','d_name',
                                                    'd_email',
                                                    'd_contact',
                                                    'd_address')
                                        ->where('id',$donation_post->id)
                                        ->first();
                array_push($results,
                    array(
                        'key' =>$donation_item->key,
                        'post_no' =>$donation_item->post_no,
                        'donation_image' => $image,
                        'donation_title' =>$donation_item->title,
                        'donation_description' =>$donation_item->description,
                        'donation_address' =>$donation_item->address,
                        'donation_latitude' =>$donation_item->lat,
                        'donation_longitude' =>$donation_item->long,
                        'helper_name' =>$donation_item->helper_name,
                        'helper_email' =>$donation_item->helper_email,
                        'helper_contact' =>$donation_item->helper_contact,
                        'helper_address' =>$donation_item->helper_address,
                        'd_name' =>$donation_item->d_name,
                        'd_email' =>$donation_item->d_email,
                        'd_contact' =>$donation_item->d_contact,
                        'd_address' =>$donation_item->d_address, 
                        'user_name' => $user->name,
                        'user_image' =>  $user_image,
                        'specifications' => $specifications->name,
                        'subcategory' => $subcategory->name,
                        'category' => $category->name,
                        'user_type' => $user_type->name,
                        'donation_type' => $donation_type->name,
                        'is_complete' => $is_complete,
                        'condition' => $condition,
                        'donation_status' => $status,
                        'd_status' => $d_status,
                        'is_urgent' => $is_urgent,
                        'urgent_reason' => $urgent_reason,
                        'consideration' => $consideration
                    )
                ) ;           	

            }
        }
       return $results;
    }
    /**
     * Get all post if page=0 
     * else 
     *  return 10 post when on behalf of page no
     */
    public function donations(Request $request)
    {
        $page = $request->offset ? $request->offset : 0;
        $perPage = 2;
        $offset = $page ?  ($page * $perPage) - $perPage : 0;

        $query = DB::table('donation_posts')
                    ->where('status',1)
                    ->orderBy('created_at','desc');

            if (!empty($request->donation_type_ids)){
                $donation_type_ids = explode(', ',$request->donation_type_ids);
                $query->orWhereIn('donation_type_id',array_values($donation_type_ids));
            }
            if(!empty($request->city_name)){
                $city_name = explode(', ',$request->city_name);
                $city_ids = search_city( $city_name[0] ); //helper for find city ids
                $query->orWhereIn('city_id',array_values($city_ids));
                if(!empty($request->keyword))
                {
                    $query->orWhere('description','LIKE','%'.$request->keyword.'%');
                    $query->orWhere('title','LIKE','%'.$request->keyword.'%');
                }
            }
            if (!empty($request->category_ids)){
                $category_ids = explode(', ',$request->category_ids);
                $ids = array();
                if(!empty($category_ids)){
                    foreach($category_ids as $category_id){
                        $category = Category::where('id',$category_id)->where('status',1)->first();
                        if(!empty($category)){
                            foreach($category->subcategories as $subcatogry) {
                                if(!empty($subcatogry)){
                                    foreach($subcatogry->specifications as $specification) {
                                        array_push($ids,$specification->id);
                                    }    
                                }
                            }  
                        }    
                    }
                } 
                $query->orWhereIn('specification_id',array_values($ids));
            }
            if (!empty($request->subcategory_ids)){
                $subcategory_ids = explode(', ',$request->subcategory_ids);
                $ids = array();
                if(!empty($subcategory_ids)){
                    foreach($subcategory_ids as $subcateogry_id){
                        $subcatogry = Subcategory::where('id',$subcateogry_id)->where('status',1)->first();
                            if(!empty($subcatogry)){
                                foreach($subcatogry->specifications as $specification) {
                                    array_push($ids,$specification->id);
                                }    
                            }
                    }
                }
                $query->orWhereIn('specification_id',array_values($ids)); 
            }
            if (!empty($request->specification_ids)){
                $specification_ids = explode(', ',$request->specification_ids);
                $query->orWhereIn('specification_id',array_values($specification_ids));
            }
            if (!empty($request->conditions)){
                $conditions = explode(', ',$request->conditions);
                $query->orWhereIn('condition',array_values($conditions));
            }
            if (!empty($request->considerations)){
                $considerations = explode(', ',$request->considerations);
                $query->orWhereIn('consideration',array_values($considerations));
            }
            if(!empty($request->sort_by)){
                if($request->sort_by == 2)
                  $query->orderBy('created_at','desc');
                else if ($request->sort_by == 3)
                  $query->orderBy('created_at','asc') ;
                else if ($request->sort_by == 4)
                  $query->orderBy('consideration_detail','asc');  
                else if ($request->sort_by == 5)
                  $query->orderBy('consideration_detail','desc');  
                else if ($request->sort_by == 6)
                  $query->where('is_urgent',1);  
                else
                  $query->where('status',1);  
            }
            if(!empty($request->user_urgent_donations)){
                if (User::where('key',$request->key)->count() > 0 ){
                    $user = User::where('key',$request->key)->first()->id;
                }else{
                    return [
                        'response_code' => 401,
                        'response' => 'error',
                        'message' => 'Invalid User.',
                    ];
                }
                $query->where('is_urgent',1);
                $query->where('user_id',$user);
            }
            if(!empty($request->user_complete_donations)){
                if (User::where('key',$request->key)->count() > 0 ){
                    $user = User::where('key',$request->key)->first()->id;
                }else{
                    return [
                        'response_code' => 401,
                        'response' => 'error',
                        'message' => 'Invalid User.',
                    ];
                }
                $query->where('is_complete',1);
                $query->where('user_id',$user);
            }
            if(!empty($request->user_pandding_donations)){
                if (User::where('key',$request->key)->count() > 0 ){
                    $user = User::where('key',$request->key)->first()->id;
                }else{
                    return [
                        'response_code' => 401,
                        'response' => 'error',
                        'message' => 'Invalid User.',
                    ];
                }
                $query->where('is_complete',0);
                $query->where('user_id',$user);
            }
            if(!empty($request->user_all_donations)){
                if (User::where('key',$request->key)->count() > 0 ){
                    $user = User::where('key',$request->key)->first()->id;
                }else{
                    return [
                        'response_code' => 401,
                        'response' => 'error',
                        'message' => 'Invalid User.',
                    ];
                }
                $query->where('user_id',$user);
            }
        
        $donation_posts = $query->get();
        $dontions = $page ?  $donation_posts->slice($offset,$perPage) : $donation_posts; 
        return response()->json([
            'response' => 'success',
            'message' => "List of donations",
            'offset' => $page,
            'results'=> $this->searchPost($dontions)
        ]); 
    }

}
