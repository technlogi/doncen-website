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
		
		$result = Category::where('status',1)->select('key','name','image')->get();
        /* check Result */
		if(count($result) > 0)
		{
			return response()->json([
				'response' => 'success',
				'message' => "List of All Categories!",
				'result' => $result
			]);
			
		}	
		else
		{
			return response()->json([
					'response_code' => '401',
					'response' => 'error',
					'message' => "No Record Found"
				]);
		}
    }
   /**
    * List of all subCategory
     */
    public function  subCategory()
    {
		$result = Subcategory::where('status',1)->select('key','name')->get();
        if(count($result) > 0)
		{
		
			return response()->json([
				'response' => 'success',
				'message' => "List of All Categories!",
				'result' => $result 
			]);
		}
		else
		{
			return response()->json([
					'response_code' => '401',
					'response' => 'error',
					'message' => "No Record Found"
				]);
		}		
    }
   /**
    * List of all specification 
     */
    public function  specification()
    {
		$result = Specification::where('status',1)->select('key','name')->get();
        if(count($result) > 0)
		{
		
			return response()->json([
				'response' => 'success',
				'message' => "List of All Categories!",
				'result' =>$result 
			]);
		}
		else
		{
			return response()->json([
					'response_code' => '401',
					'response' => 'error',
					'message' => "No Record Found"
				]);
		}		

    }
    /**
     * category To subcategory 
     */
    public function categoryTosubcategory(Request $request)
    {
		/* Field Empty Check */
		if($request->key!='')
		{
			$category = Category::where('key',$request->key)->where('status',1)->first();
			/* Check Result */
			if(count($category) > 0)
			{
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
			else
			{
				return response()->json([
					'response_code' => '401',
					'response' => 'error',
					'message' => "No Record Found"
				]);
			}
			
		}
		else
		{
			return response()->json([
				'response_code' => '401',
				'response' => 'error',
				'message' => "Key is Empty"
			]);
		}
    }  
    /**
     * subcategory To  Specification
     */
    public function subcategoryToSpecification(Request $request)
    {
	   if($request->key!='')
	   {
			$subcategory = Subcategory::where('key',$request->key)->where('status',1)->first();
			if(count($subcategory) > 0)
			{
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
			else
			{
				return response()->json([
					'response_code' => '401',
					'response' => 'error',
					'message' => "No Record Found"
				]);
			}	
		}
		else
		{
			return response()->json([
				'response_code' => '401',
				'response' => 'error',
				'message' => "Key is Empty"
			]);
		}		
    }
    /**
     * subcategory To Category
     */
    public function subcategoryToCategory(Request $request)
    {
		if($request->key!='')
		{
			$subcategory = Subcategory::where('key',$request->key)->where('status',1)->first();
			if(count($subcategory) > 0)
			{
					return response()->json([
						'response' => 'success',
						'message' => "detail of category!",
						'result' => array('key'=>$subcategory->category->key ,'name'=>$subcategory->category->name)
					]);
			}
			else
			{
				return response()->json([
					'response_code' => '401',
					'response' => 'error',
					'message' => "Key is Empty"
				]);
			}
		}
		else
		{
	 		return response()->json([
				'response_code' => '401',
				'response' => 'error',
				'message' => "Key is Empty"
			]);
		}
    }  
    /**
     * specification To Subcategory
     */
    public function specificationToSubcategory(Request $request)
    {
		if($request->key!='')
		{
	
			$specifications = Specification::where('key',$request->key)->where('status',1)->first();
			if(count($specifications) > 0)
			{
				return response()->json([
					'response' => 'success',
					'message' => "detail of subcategory!",
					'result' => array('key'=>$specifications->subcategory->key,'name' => $specifications->subcategory->name)
				]);
				
			}
			else
			{
					return response()->json([
						'response_code' => '401',
						'response' => 'error',
						'message' => "No Record Found"
					]);
			}
		}
		else
		{
	 		return response()->json([
				'response_code' => '401',
				'response' => 'error',
				'message' => "Key is Empty"
			]);
		}
    }
 /**
     *  Donation form
    */
    public function submitDonationForm(Request $request)
    {
		//return DB::table('donation_posts')->orderBy('id','desc')->limit(1)->get();
		/* d_lat d_long Find Start */
		
			try{ 
				$d_geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($request->donation_address).'&sensor=false');
				$d_geo = json_decode($d_geo, true); // Convert the JSON to an array
				
				if (isset($d_geo['status']) && ($d_geo['status'] == 'OK')) {
					$d_lat = $d_geo['results'][0]['geometry']['location']['lat']; // Latitude
					$d_long = $d_geo['results'][0]['geometry']['location']['lng']; // d_long
				}else{
					$d_lat ="";
					$d_long= "";
				}
			}catch(\Exception $e){$d_lat ="";$d_long= "";}
			/* d_lat d_long Find End */
			/* Helper Lat Long Find Start */
			 try{
					$helper_geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($request->helper_address).'&sensor=false');
					$helper_geo = json_decode($helper_geo, true); // Convert the JSON to an array

					if (isset($helper_geo['status']) && ($helper_geo['status'] == 'OK')) {
						$helper_lat = $helper_geo['results'][0]['geometry']['location']['lat']; // Latitude
						$helper_long = $helper_geo['results'][0]['geometry']['location']['lng']; // Longitude
					}else{
						$helper_lat ="";
						$helper_long= "";
					}
			}catch(\Exception $e){$helper_lat ="";$helper_long= "";}
			/* Helper Lat Long Find End */
		/* Note:user_id In Pass key of user table */
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
                'key'					=> generateKey(14),
                'post_no'				=> generatePostNO(),
                'user_id' 				=> $user,
                'specification_id'		=> $specification->id, 
                'user_type_id' 			=> $request->user_type_id,
                'title' 				=> $request->title,
                'description'			=> $request->description,
                'condition' 			=> $request->condition,
                'city_id' 				=> $city->id,
                'address'				=> $request->donation_address,
                'lat' 					=> $request->lat,
                'long' 					=> $request->long,
                'system_code' 			=> $request->system_code,
                'donation_type_id' 		=> $request->donation_type_id,
                'donation_type_other' 	=> $request->donation_type_other,
                'preference' 			=> $request->preference,                              //0-new | 1-anyone	
                'preference_gender' 	=> $request->preference_gender,              // 1-male | 2-female | 3-other	
                'preference_age' 		=> $request->preference_age,                   //1-0to14 | 2-14to30 | 3-30to60 | 4-above60	
                'preference_is_handicap'=> $request->preference_is_handicap,   // 0-no | 1-yes	
                'consideration' 		=> $request->consideration,                   //0-free | 1-Non-Monetary | 2-Monetary	
                'consideration_detail'	=> $request->consideration_detail,
                'is_urgent'				=> $request->is_urgent,                          // 0-no | 1-yes
                'urgent_reason'			=> $request->urgent_reason,
                'd_status' 				=> $request->d_status,//0-Individual | 1-Organization	/* Donation Type */
                'd_name'				=> $request->d_name ,
                'd_email'				=> $request->d_email,
                'd_contact'				=> $request->d_contact,
                'd_city_id' 			=> $d_city->id,
                'd_address'				=> $request->d_address,
				'd_lat'					=> $d_lat, 
				'd_long'				=> $d_long,
				'helper_status'			=> $request->helper_status,                                       // 0-Individual | 1-Organization	
                'helper_name'			=> $request->helper_name ,
                'helper_email'			=> $request->helper_email ,
                'helper_contact'		=> $request->helper_contact ,
				'helper_lat'			=> $helper_lat, 
				'helper_long' 			=> $helper_long,
                'helper_city_id' 		=> $helper_city_id,
                'helper_address'		=> $request->helper_address, 
                'status' 				=> 1,
                'created_at'			=> new \DateTime(),
                'updated_at'			=> new \DateTime()
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
        if(count($donation_posts) > 0)
		{
			

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
		else
		{
			return [
                'response_code' => 401,
                'response' => 'error',
                'message' => 'No Data Found',
            ];
		}	
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
                  if(!empty($user)){
                      $user_name = $user->name;
                  }else{
                      $user_name= '';
                  }
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
                          'key' =>                  $donation_item->key,
                          'post_no' =>              $donation_item->post_no,
                          'donation_image' =>       $image,
                          'donation_title' =>       $donation_item->title,
                          'donation_description' => $donation_item->description,
                          'donation_address' =>     $donation_item->address,
                          'donation_latitude' =>    $donation_item->lat,
                          'donation_longitude' =>   $donation_item->long,
                          'helper_name' =>          $donation_item->helper_name,
                          'helper_email' =>         $donation_item->helper_email,
                          'helper_contact' =>       $donation_item->helper_contact,
                          'helper_address' =>       $donation_item->helper_address,
                          'd_name' =>               $donation_item->d_name,
                          'd_email' =>              $donation_item->d_email,
                          'd_contact' =>            $donation_item->d_contact,
                          'd_address' =>            $donation_item->d_address, 
                          'user_name' =>            $user_name,
                          'user_image' =>           $user_image,
                          'specifications' =>       $specifications->name,
                          'subcategory' =>          $subcategory->name,
                          'category' =>             $category->name,
                          'user_type' =>            $user_type->name,
                          'donation_type' =>        $donation_type->name,
                          'is_complete' =>          $is_complete,
                          'condition' =>            $condition,
                          'donation_status' =>      $status,
                          'd_status' =>             $d_status,
                          'is_urgent' =>            $is_urgent,
                          'urgent_reason' =>        $urgent_reason,
                          'consideration' =>        $consideration
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
	
	/* Search Function Start */
    public function searchDonationPost(Request $request)
    {
        // SORT BY 
		$dropdownSearch_sql="";
        $dropdownSearch=$request->get('dropdownSearch');
		if(isset($dropdownSearch) && !empty($dropdownSearch))
        {
			if($dropdownSearch=="1")
			{
				$dropdownSearch_sql="ORDER BY id desc";
			}elseif($dropdownSearch=="2")
			{
				$dropdownSearch_sql="ORDER BY id desc";
			}
			elseif($dropdownSearch=="3")
			{
				$dropdownSearch_sql="ORDER BY id asc";
			}
			elseif($dropdownSearch=="4")
			{
				$dropdownSearch_sql="ORDER BY consideration_detail asc";
			}
			elseif($dropdownSearch=="5")
			{
				$dropdownSearch_sql="ORDER BY consideration_detail desc";
			}
			elseif($dropdownSearch=="6")
			{
				$dropdownSearch_sql="AND is_urgent='1' ORDER BY id desc";
			}else{
				$dropdownSearch_sql="ORDER BY id desc";
			}				
        }
		
		//$category=array();
		$city_sql="";
		$search_form = $request->get('data');
		if(isset($search_form) && !empty($search_form))
        {
			// City SQL
            $city_name   =    $search_form[0]['value'];
			
			if(isset($city_name)){
				$city_ids = search_city( $city_name);
				
				if(!empty($city_ids))
                {
                 $city_id=$city_ids[0];
                 $city_sql="AND city_id='".$city_id."'"; 
                }else{
				 $city_sql="AND city_id='X'"; 	
				}
			}
			
		
            if(isset($search_form[1]))
			{
				// Category SQL	
				$category_box=$search_form[1]['value'];	
				if(isset($category_box) && !empty($category_box))
				{
					//$category = Category::where('name','LIKE',''.$request->data['data'][1]['value'])->where('status',1)->first();
					$sql="SELECT specifications.id FROM categories
							JOIN subcategories ON categories.id = subcategories.category_id
							JOIN specifications ON subcategories.id = specifications.subcategory_id
							WHERE categories.status = 1 AND subcategories.status = 1 AND specifications.status = 1
							AND categories.name LIKE '%".$category_box."%' "; 
					$results = DB::select( DB::raw($sql) );
					$specifications_id = array_column($results, 'id');
					if(!empty($specifications_id))
					{
						$specifications_id_data[]=$specifications_id;
					}else{
						$specifications_id_data=array();
					}	
				}
				
			}
			else
			{
						$specifications_id_data=array();
			}
			
			
			
			// Word_box SQL	
			if(isset($search_form[2]))
			{

					$word_box=$search_form[2]['value'];
					$word_box_sql="";
					if(isset($word_box) && !empty($word_box))
					{
						$w_b=explode(" ",$word_box);
						$w_b=array_values(array_filter($w_b));
						$put_sql=array();
						for($i=0;$i<count($w_b);$i++)
						{
							if($i==0)
							{
								$put_sql[]="CONCAT (title, description) LIKE '%".$w_b[$i]."%'";
							}else{
								$put_sql[]="OR CONCAT (title, description) LIKE '%".$w_b[$i]."%'";
							}
						} 
						$word_box_sql="AND (".implode(" ",$put_sql).")";
					}
					else
					{
						$word_box_sql='';
					}
		    }
			else
			{
					$word_box_sql='';
			}
			
		}
		else
		{
				$word_box_sql='';
		}
		
		//LOOKING FOR
		$looking_for_sql="";
        $looking_for=$request->get('looking_for');
		if(isset($looking_for) && !empty($looking_for))
        {
            $looking_array=array();
            for($i=0;$i<count($looking_for);$i++)
            {
				if($looking_for[$i]['value']!='')
				{
					$looking_array[]=$looking_for[$i]['value']; 
				}
            }
            if(!empty($looking_array))
				{
					$looking_array = "'" . implode( "','",$looking_array) . "'";
					$looking_for_sql="AND user_type_id IN(".$looking_array.")";
				}else{
					$looking_for_sql="";
				}
		}
		
		
		
		
		// Category Form Ids

		
        $categoryForm=$request->get('categoryForm');
		if(isset($categoryForm) && !empty($categoryForm))
        {
            $categoryFormarray=array();
            for($i=0;$i<count($categoryForm);$i++)
            {
				if($categoryForm[$i]['value']!='')
				{
					$categoryFormarray[]=$categoryForm[$i]['value']; 
				}
            }
			if(!empty($categoryFormarray))
			{
				$categoryFormarrayids = "'" . implode( "','",$categoryFormarray) . "'";
					$sql="SELECT specifications.id FROM categories
							JOIN subcategories ON categories.id = subcategories.category_id
							JOIN specifications ON subcategories.id = specifications.subcategory_id
							WHERE categories.status = 1 AND subcategories.status = 1 AND specifications.status = 1
							AND categories.key IN (".$categoryFormarrayids.") "; 
					$results = DB::select( DB::raw($sql) );
					$specifications_id = array_column($results, 'id');
					
					if(!empty($specifications_id))
					{
						$categoryFormIDS[]=$specifications_id;
						
					}else{
						$categoryFormIDS=array();
					}
			
			}
			else
			{
				$categoryFormIDS=array();
			}
		}
		
		
		
		// SubCateogry Result
		//$subCategoryFormarrayIDS=array();
		$subCategoryForm=$request->get('subCategoryForm');
		if(isset($subCategoryForm) && !empty($subCategoryForm))
		{
			$subCategoryFormarrayIDS=array();
			$subCategoryFormarray=array();
			for($i=0;$i<count($subCategoryForm);$i++)
			{
				if($subCategoryForm[$i]['value']!='')
				{
					$subCategoryFormarray[]=$subCategoryForm[$i]['value']; 
				}
			}
			//echo  $subCategoryFormids=implode(',', $subCategoryFormarray);
			
			if(!empty($subCategoryFormarray))
			{
				
				$subCategoryFormaIDS = "'" . implode( "','",$subCategoryFormarray) . "'";
				//echo $subCategoryFormaIDS;
				$sql="SELECT specifications.id FROM subcategories
							JOIN specifications ON subcategories.id = specifications.subcategory_id
							WHERE subcategories.status = 1 AND specifications.status = 1
							AND subcategories.key IN (".$subCategoryFormaIDS.") "; 
					$results = DB::select( DB::raw($sql) );
					$sub_cat_specifications_id = array_column($results, 'id');
					$subCategoryFormarrayIDS=$sub_cat_specifications_id;
					
			}
			else
			{
				$subCategoryFormarrayIDS = '';
			}	
			
				/* echo"<pre>"; print_r($specifications_id); echo"</pre>";
			die(); */

		}
		// Specification Data
		$specificationFormarrayIDs=array();
		$specificationForm=$request->get('specificationForm');
		if(isset($specificationForm) && !empty($specificationForm))
		{
			$specificationFormarray=array();
			for($i=0;$i<count($specificationForm);$i++)
			{
				if($specificationForm[$i]['value']!='')
				{
					$specificationFormarray[]=$specificationForm[$i]['value']; 
				}
			}
			$specificationFormarrayIDs=$specificationFormarray;
			
		}
			
		//	conditionForm
		$conditionFormSQL="";
		$conditionForm=$request->get('conditionForm');
		if(isset($conditionForm) && !empty($conditionForm))
		{
			$sconditionFormarray=array();
			for($i=0;$i<count($conditionForm);$i++)
			{
				if($conditionForm[$i]['value']!='')
				{
					$sconditionFormarray[]=$conditionForm[$i]['value']; 
				}
			}
			if(!empty($sconditionFormarray))
			{
				$sconditionFormarrayIDS = "'" . implode( "','",$sconditionFormarray) . "'";
				$conditionFormSQL="AND `condition` IN(".$sconditionFormarrayIDS.")";
			}else{
				$conditionFormSQL="";	
			}
		}
		
		//considerationTypeForm
		$considerationTypeFormSQL="";
		$considerationTypeForm=$request->get('considerationTypeForm');
		if(isset($considerationTypeForm) && !empty($considerationTypeForm))
		{
			$considerationTypeFormarray=array();
			for($i=0;$i<count($considerationTypeForm);$i++)
			{
				if($considerationTypeForm[$i]['value']!='')
				{
					$considerationTypeFormarray[]=$considerationTypeForm[$i]['value']; 
				}
			}
			$sonsiderationTypeFormids=implode(',', $considerationTypeFormarray);
			
			if(!empty($considerationTypeFormarray))
			{
				$considerationTypeFormarrayIDS = "'" . implode( "','",$considerationTypeFormarray) . "'";
				$considerationTypeFormSQL="AND consideration IN(".$considerationTypeFormarrayIDS.")";
			}else{
				$considerationTypeFormSQL="";	
			}

		}
		
		// donationTypeForm
		$donationTypeFormSQL="";
		$donationTypeForm=$request->get('donationTypeForm');
		if(isset($donationTypeForm) && !empty($donationTypeForm))
			{
				$donationTypeFormarray=array();
				for($i=0;$i<count($donationTypeForm);$i++)
				{
					if($donationTypeForm[$i]['value']!='')
					{
						$donationTypeFormarray[]=$donationTypeForm[$i]['value']; 
					}
				}
				
				 if(!empty($donationTypeFormarray))
				{
					$donationTypeFormarrayIDS = "'" . implode( "','",$donationTypeFormarray) . "'";
					$donationTypeFormSQL="AND donation_type_id IN(".$donationTypeFormarrayIDS.")";
				}else{
					$donationTypeFormSQL="";	
				 }
			}
			
			
			
			
			//	preferenceTypeForm
			$preferenceTypeFormSQL="";
			$preferenceTypeForm=$request->get('preferenceTypeForm');
			if(isset($preferenceTypeForm) && !empty($preferenceTypeForm))
			{
				$preference=$preferenceTypeForm[0]['value']; 
				$preferenceTypeFormSQL="AND preference='".$preference."'";
			}
			
			//	preferenceTypeFormHandi
			$preferenceTypeFormHandiSQL="";
			$preferenceTypeFormHandi=$request->get('preferenceTypeFormHandi');
			if(isset($preferenceTypeFormHandi) && !empty($preferenceTypeFormHandi))
			{
				$preference=$preferenceTypeFormHandi[0]['value']; 
				$preferenceTypeFormHandiSQL="AND preference_is_handicap='".$preference."'";
				 
			}
			
			
			
			
			//	preferenceTypeFormGenderList
			$preferenceTypeFormGenderListSQL="";
			$genderForm=$request->get('preferenceTypeFormGenderList');
			if(isset($genderForm) && !empty($genderForm))
			{
				$genderFormarray=array();
				for($i=0;$i<count($genderForm);$i++)
				{
					$genderFormarray[]=$genderForm[$i]['value']; 
				}
				
				$put_sql=array();
				for($i=0;$i<count($genderFormarray);$i++)
				{
					if($i==0)
					{
						$put_sql[]="preference_gender LIKE '%".$genderFormarray[$i]."%'";
					}else{
						$put_sql[]="OR preference_gender LIKE '%".$genderFormarray[$i]."%'";
					}
				} 
				$preferenceTypeFormGenderListSQL="AND (".implode(" ",$put_sql).")";
				
			}
			
			//	preferenceTypeFormAge
			$preferenceTypeFormAgeListSQL="";
			$ageForm=$request->get('preferenceTypeFormAge');
			if(isset($ageForm) && !empty($ageForm))
			{
				$ageFormarray=array();
				for($i=0;$i<count($ageForm);$i++)
				{
					$ageFormarray[]=$ageForm[$i]['value']; 
				}
				
				$put_sql=array();
				for($i=0;$i<count($ageFormarray);$i++)
				{
					if($i==0)
					{
						$put_sql[]="preference_gender LIKE '%".$ageFormarray[$i]."%'";
					}else{
						$put_sql[]="OR preference_gender LIKE '%".$ageFormarray[$i]."%'";
					}
				} 
				$preferenceTypeFormAgeListSQL="AND (".implode(" ",$put_sql).")";
				
			}
			
		if(!empty($specificationFormarrayIDs))
			{
				$res = "'" . implode( "','",$specificationFormarrayIDs) . "'";
				$specifications_sql="AND specification_id IN(".$res.")"; 
			}else{
				/* if(!empty($subCategoryFormarrayIDS)) */
				 if(isset($subCategoryFormarrayIDS)) 
				{
					
					if(!empty($subCategoryFormarrayIDS))
					{
						$res = "'" . implode( "','",$subCategoryFormarrayIDS) . "'";
						$specifications_sql="AND specification_id IN(".$res.")";
					}else{
						//$specifications_sql="AND specification_id IN('X')";
						$specifications_sql="";
					}
					
				}else{
					
					if(isset($categoryFormIDS))
					{
						if(isset($specifications_id_data) && !empty($specifications_id_data))
							{
								$input_cat=$specifications_id_data[0];
							}else{
								$input_cat=array();
							}
							//echo"<pre>"; print_r($input_cat); echo"</pre>";
							
						if(isset($categoryFormIDS) && !empty($categoryFormIDS))
							{
								if(!empty($input_cat))
									{
										$array_merge=array_merge($input_cat,$categoryFormIDS[0]);
										$array_values=array_values(array_unique($array_merge));
										$res = "'" . implode( "','",$array_values) . "'";
										$specifications_sql="AND specification_id IN(".$res.")"; 
									}else{
										$res = "'" . implode( "','",$categoryFormIDS[0]) . "'";
										$specifications_sql="AND specification_id IN(".$res.")";
									}
							}else{
									if(!empty($input_cat))
									{
										$res = "'" . implode( "','",$input_cat) . "'";
										$specifications_sql="AND specification_id IN(".$res.")";
									}else{
										//$specifications_sql="AND specification_id IN('X')";
										$specifications_sql="";
									}
								
							}	
					}else{

							if(isset($specifications_id_data))
							{
								if(!empty($specifications_id_data))
								{
									$res = "'" . implode( "','",$specifications_id_data[0]) . "'";
									$specifications_sql="AND specification_id IN(".$res.")";
								}else{
									//$specifications_sql="AND specification_id IN('X')";	
									$specifications_sql="";
								}
							}else{
								$specifications_sql="";
							}
					}
				}
			}
			
		$sql="select * from donation_posts where status='1' 
			".$city_sql." 
			".$specifications_sql." 
			".$word_box_sql." 
			".$looking_for_sql." 
			".$conditionFormSQL." 
			".$considerationTypeFormSQL." 
			".$donationTypeFormSQL." 
			".$preferenceTypeFormSQL." 
			".$preferenceTypeFormGenderListSQL." 
			".$preferenceTypeFormAgeListSQL." 
			".$preferenceTypeFormHandiSQL." 
			".$dropdownSearch_sql.""; 
			 
		$donation_results = DB::select(DB::raw($sql));
		
		if(count($donation_results) > 0)
		{
			return response()->json([
					'response' => 'success',
					'message' => "Search Result",
					'result' =>$donation_results
				]);
		}
		else
		{
			 return [
                'response_code' => 401,
                'response' => 'error',
                'message' => 'No Data Found.',
            ];
		}		
		
    }
	
	/* Search Function End */

}
