<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Api\Validate;
use \App\Models\Category,\App\Models\Subcategory,\App\Models\User,\App\Models\Specification;
use DB;
class ApiController extends Controller
{
    protected $validate;
    
    public function __construct(Validate $validate)
    {
        $this->validate = $validate;
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
    public function submitDonationForm(Request $request){
      if($this->validate->validateDonationForm($request)) return $this->validate->validateDonationForm($request);
      if($this->validate->validateKey($request)) return $this->validate->validateKey($request);
  
        if (User::where('key',$request->key)->count() > 0 ){
          $user = User::where('key',$request->key)->first()->id;
        }else{
            return [
                'response_code' => 401,
                'response' => 'error',
                'message' => 'User Is not valid.',
            ];
        }
        try{
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
                'system_code' =>$request->ip(),
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
          array_push($results,array(
                'key' =>$donation_post->key,
                'post_no' =>$donation_post->post_no,
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
          )) ;           	

        }
        return [
            'response' => 'success',
             'massage' => "All Post list",
            'result' => $results,
        ];
    }
    
    public function getDonation(Request $request)
    {
        if($this->validate->validateKey($request)) return $this->validate->validateKey($request);  
    }

}
