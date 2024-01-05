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
use App\Models\FavouritePosts;
use DB;
use App\Models\User;
use \Auth,\Session;
class WebController extends Controller
{
    //home  
    public function home()
    {
        
       
        if (Session::has('specification')) {
			return redirect()->route('web.donation.DetailForm',Session::get('specification'));
		}
        

        $categories = DB::table('categories')
                        ->select(
                                            // count(donation_posts.id) as total_post, 
                                    DB::raw('
                                            "" as total_post,
                                            categories.key,
                                            categories.name,
                                            categories.image')
                                
                                )
                        ->join('subcategories','subcategories.category_id','=','categories.id')
                        ->join('specifications','specifications.subcategory_id','=','subcategories.id')
                        // ->join('donation_posts','specifications.id','=','donation_posts.specification_id')
                        
                        ->where('categories.status', '1')
                        
                        // ->where('donation_posts.status', '1')
                        // ->where('donation_posts.is_complete', '0')

                        ->groupBy('categories.key')
                        ->orderBy('categories.id','asc')
                        ->get();

        // print_r($categories);
        // die();
            
        $cities = City::where('status',1)->orderBy('created_at','asc')->get();
        $titles = DB::table('donation_posts')->where('status',1)->select('title')->get();
        return view('web.page.home',compact('titles','categories','cities'));
    }
   

//Header search city autocomplete  
    public function city_search(Request $request)
    {
        
        if($request->get('query'))
        {
            
            $query = $request->get('query');

            $cities =  DB::select("SELECT cities.name as name                    
                                    FROM cities                 
                                                     
                                    JOIN donation_posts ON cities.id = donation_posts.city_id                 
                                    
                                    WHERE cities.status = 1
                                    
                                    AND donation_posts.status = 1
                                    AND donation_posts.is_complete = 0  
                                    
                                    AND cities.name LIKE '%$query%' 

                                    group by cities.name

                                    limit 10
                                    
                                    ");

            
            if (count($cities) != 0) 
            {
              

              // $output = '<datalist>';
             $output = '';
              foreach($cities as $row)
              {
                
                $output .= ' <option value="'.$row->name.'" > ';

              }
              echo $output;
              }
            else
            {
                echo '<option value="No post available in this area" >';
            }
        }
        
        
    }


// Donation Category selection page    
    public function auto_complate_list(Request $request)
    {

     if($request->get('query'))
     {

      $query = $request->get('query');
      
      // dd($query);

      // $query_arr = explode(' ', $query);
      // print_r($query_arr);
      // die();
      
      $data = DB::table('categories')
                ->select(
                        'categories.name as category_name',
                        'subcategories.name as subcategory_name',
                        'specifications.name as specification_name', 
                        'specifications.key as specification_key')
                ->join('subcategories','subcategories.category_id','=','categories.id')
                ->join('specifications','specifications.subcategory_id','=','subcategories.id')
                
                
                ->where(DB::raw("CONCAT(categories.name,' ', subcategories.name, ' ', specifications.name)"), 'LIKE', "%{$query}%")

                // ->whereIn(DB::raw("CONCAT(categories.name,' ', subcategories.name, ' ', specifications.name)"), $query_arr)

                // ->where('name', 'LIKE', "%{$query}%")

                ->where('categories.status', '1')
                ->where('subcategories.status', '1')
                ->where('specifications.status', '1')

                
                ->groupBy('specifications.key')

                ->limit(10)
                
                ->get();


      if (count($data) > 0) 
      {
          
        
          // $output = '<datalist>';
         $output = '';
          foreach($data as $row)
          {
            $output .= '<input type="hidden" name="spcificaton_key" value='.$row->specification_key.'>';
            
            $string = $row->category_name.' >> '.$row->subcategory_name.' >> '.$row->specification_name;
            
            $output .= ' <option value="'.$string.'" > ';

          }
          // $output .= '</datalist>';
          echo $output;
          }
        else
        {
            echo '';
        }
     }
    }
//donation Form

// Donation Category selection page    
    public function search_text_autocomplate(Request $request)
    {
     if($request->get('query'))
     {

      $query = $request->get('query');
      
      
    $data = DB::table('subcategories')
                ->select(
                        
                        'subcategories.name as subcategory_name',
                        
                        'specifications.name as specification_name', 
                        'specifications.key as specification_key',

                        'donation_posts.title'
                            )
                ->join('specifications','specifications.subcategory_id','=','subcategories.id')
                ->join('donation_posts','specifications.id','=','donation_posts.specification_id')
                
                ->where(DB::raw("CONCAT(subcategories.name, ' ', specifications.name, ' ', donation_posts.title)"), 'LIKE', "%{$query}%")

                // ->where('name', 'LIKE', "%{$query}%")

                
                ->where('subcategories.status', '1')
                ->where('specifications.status', '1')

                ->where('donation_posts.status', '1')
                ->where('donation_posts.is_complete', '0')


                ->limit(10)
                
                ->get();

      
      
      if (count($data) != 0) 
      {
          
       
         $output = '';
          foreach($data as $row)
          {
            
            
            // $output .= '<input type="hidden" name="spcificaton_key" value='.$row->specification_key.'>';
            
            $string = $row->subcategory_name.' '.$row->specification_name.' '.$row->title;
            
            $output .= ' <option value="'.$string.'" > ';

          }
          // $output .= '</datalist>';
          echo $output;
          // exit();
           // <li><a href="#">'.$row->category_name.' >> '.$row->subcategory_name.' >> '.$row->specification_name.'</a></li>
        }
        else
        {
            echo '<option value="Related post not available" >';
        }
     }
    }
//donation Form
    public function donationDetails(Request $request)
    {
        

        if($request->specification_search) // Check is it from search form ??
        {
            
            $specification = $request->specification_search;  // Search String eg. Hospital >> Blood >> A+

            $explod_specification_name = explode('>>', $specification);
            

            $get_last_specification_name = end($explod_specification_name);
            
            $spcification_name = trim($get_last_specification_name," ");

            // dd($spcification_name);
            // $spcification_name = str_replace( array( ' ', '"','' ), '', $get_last_specification_name);
            
            $get_specification_key  = DB::table('specifications')->select('key')->where('name',$spcification_name)->first();
            
            // dd($get_specification_key);

            if(!empty($get_specification_key))
            {
                session(['specification' => $get_specification_key->key]);

                if (Auth::guard('user')->check())
                {
                    $user = Auth::guard('user')->user()->id;
                    return redirect()->route('web.donation.DetailForm', $get_specification_key->key);
                }
                else
                {
                    // session(['specification' => $request->specification]);
                    session()->flash('error', 'You must logged in before filling form.');
                    return redirect('/user/login');
                }


            }
            else
            {

                session()->flash('error', 'Please select valid category.');
                return redirect('/donation/category');
            } 

        }
        else
        {
            

            session(['specification' => $request->specification]); // Select category option

            if (Auth::guard('user')->check())
            {
                $user = Auth::guard('user')->user()->id;
                
                return redirect()->route('web.donation.DetailForm',$request->specification);
            }
            else
            {
                // session(['specification' => $request->specification]);
                session()->flash('error', 'You must logged in before filling form.');
                return redirect('/user/login');
            }
        }
        
        
    }
   
    //donation details form 
    public function donationDetailForm($key)
    {
        try{
            if (Session::has('specification')) {
                Session::forget('specification');
            }
            $posts =array();
            $specification = Specification::where('key',$key)->first();
            $subcategory = $specification->subcategory;
            $category = $subcategory->category;
            $user = Auth::guard('user')->user();

            
            $user_types = DB::table('user_types')->select('name','key')->where('status',1)->get();
          
			return view('web.page.donation_detail',compact('specification','subcategory','category','user_types','key','user','posts'));


        }catch(\Exception $e){
            return redirect()->route('web.donation.category')->with('error','Please select category, subcategory and specifications.');
        }
    }

     public function donationEditDetailForm($key)
    {
        try{
     
            $posts = DB::table('donation_posts')->where('key',$key)->first();
            $specification = Specification::where('id',$posts->specification_id)->first();
            $subcategory = $specification->subcategory;
            $category = $subcategory->category;
            $user = Auth::guard('user')->user();
            $user_types = DB::table('user_types')->select('name','key')->where('status',1)->get();
            return view('web.page.donation_detail',compact('specification','subcategory','category','user_types','key','user','posts'));
            
        }catch(\Exception $e){
            return redirect()->route('web.donation.category')->with('error','Please select category, subcategory and specifications.');
        }
    }
   
    //store donation post
    public function store_donation_detail(StoreDonationDetailRequest $request)
    {   
        

       //  echo date_format($request->expiry,"Y-m-d H:i:s"); 
       // dd($request);

        if (Auth::guard('user')->check()){
            $user = Auth::guard('user')->user()->id;
        }
        else{
            session()->flash('error', 'You Must Login First For create Dontation.');
           return redirect('/user/login');
        }

          

        // if (isset($city_geo['status']) && ($city_geo['status'] == 'OK')) {
        //         $city_lat = $city_geo['results'][0]['geometry']['location']['lat']; // Latitude
        //         $city_long = $city_geo['results'][0]['geometry']['location']['lng']; // Longitude
        //     }else{
        //         $city_lat ="";
        //         $city_long= "";
        //     }
        
  

        // if (isset($d_geo['status']) && ($d_geo['status'] == 'OK')) {
        //       $d_lat = $d_geo['results'][0]['geometry']['location']['lat']; // Latitude
        //       $d_long = $d_geo['results'][0]['geometry']['location']['lng']; // d_long
        //   }else{
        //       $d_lat ="";
        //       $d_long= "";
        //   }


        

        // if (isset($helper_geo['status']) && ($helper_geo['status'] == 'OK')) {
        //         $helper_lat = $helper_geo['results'][0]['geometry']['location']['lat']; // Latitude
        //         $helper_long = $helper_geo['results'][0]['geometry']['location']['lng']; // Longitude
        //     }else{
        //         $helper_lat ="";
        //         $helper_long= "";
        //     }


        
        $search = explode(',',trim($request->city));
        $city_id = check_for_city($search);
        
        
        
        $d_search = explode(',',trim($request->address));
        $d_city_id = check_for_city($d_search);
        
        
        $helper_address_search = explode(',',trim($request->helper_address));
        $helper_city = check_for_city($helper_address_search);
        
        if($helper_city){
               $helper_city_id = $helper_city;
        }else{
            $helper_city_id = null;
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


        if ($request->file('video_file')) {
               
            try {
                 $file = $request->file('video_file');
                //  print_r( $files);
                //  die();
                 $extension = $file->getClientOriginalExtension();
                 if( $extension=="mp4" || $extension=="mov" || $extension=="webm"){
                   
                 }else{
                    session()->flash('error', 'Something went wrong in your form.');
                    echo "error video 1";

                    die();
                 }
                 
            } catch (\Throwable $th) {
               // echo "Error While Uploading Video";
                session()->flash('error', 'Something went wrong in your form.');
                die();
            }
        }
          
        if ($request->file('image_file')) {
                $files = $request->file('image_file');

           

                try {
                    foreach($files as $file){
                        $extension = $file->getClientOriginalExtension();
                        if($extension=="jpg" || $extension=="jpeg" || $extension=="png" || $extension=="gif"){
                           

                           
                        }else{
                             session()->flash('error', 'Something went wrong in your form.');
                            // echo "error image 1";

                            die();
                        }
                    
                     }
                 
            } catch (\Throwable $th) {
               // echo "Error While Uploading Video";
                session()->flash('error', 'Something went wrong in your form.');
                die();
            }
        }
                    

                        // $extension = $file->getClientOriginalExtension();      

                     //      echo $request->city;
                     // die();
                     //    dd($request);

        if(isset($request->donation) && isset($request->condition)  && isset($request->title) && isset($request->city_lat) && isset($request->city_long)  && isset($request->expiry)  && isset($request->preference)  && isset($request->donation_type)  && isset($request->is_urgent) && isset($request->consideration) && isset($request->city) ) 
        {

                // echo "Hew 2";
                // die();

                if($request->mobile_no != ""){
                    $check_number_id = DB::table('users')->where('contact',$request->mobile_no)->first();
                    if (!$check_number_id) { 
                        $doner_id = User::create([
                        'key'=> generateKey(1),
                        'name' => $request->name,
                        // 'email' => $request->email,
                        'contact' => $request->mobile_no,
                        'password' => "",
                        'user_status' => "", 
                        'lat' => $request->d_lat,
                        'long' => $request->d_long,
                        'address' => $request->address,
                        'city_id' => $d_city_id,
                        'otp' => "",
                        'system_code' => "",
                        'is_verify'=> 0,
                        'status' => 1
                        ]);
                        $last_d_id = $doner_id->id;
                    }else{
                        $last_d_id = $check_number_id->id;
                    }
                }
            

            if($request->helper_mobile_no !=""){
                    $check_helper_number = DB::table('users')->where('contact', $request->helper_mobile_no)->first();

                    if (!$check_helper_number) {
                         $last_helper_id = User::create([
                        'key'=> generateKey(1),
                        'name' => $request->helper_name,
                        // 'email' => $request->email,
                        'contact' => $request->helper_mobile_no,
                        'password' => "",
                        'user_status' => "", 
                        'lat' => $request->helper_lat,
                        'long' => $request->helper_long,
                        'address' => $request->helper_address,
                        'city_id' => $helper_city_id,
                        'otp' => "",
                        'system_code' => "",
                        'is_verify'=> 0,
                        'status' => 1
                        ]);
                        $last_h_id = $last_helper_id->id;
                    }else{
                        $last_h_id = $check_helper_number->id;
                    }
                }
                else{
                    $last_h_id = null;
                }
                // echo $user;
                // echo $request;


            $specification = Specification::where('key',$request->key)->first();
           
          if (empty($request->updated_id)) {
                
                $id =  DB::table('donation_posts')->insertGetId([
                    'key'=> generateKey(14),
                    'post_no'=> generatePostNO(),
                    'user_id' =>  $user ,
                    'specification_id'=> $specification->id, 
                    'user_type_id' => $request->donation,
                    'title' => $request->title,
                    'description'=> $request->description,
                    'condition' => $request->condition,
                    'city_id' =>$city_id,
                    'address' => $request->city,
                    
                    // 'lat' => $city_lat,
                    // 'long' => $city_long,
                    'lat' => $request->city_lat,
                    'long' => $request->city_long,

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
                    'urgent_reason' => $request->urgent_reason,
                    'd_status' => $request->d_status ,//0-Individual | 1-Organization   
                    'd_name'    => $request->name ,
                    'd_email'=> $request->email ,
                    'd_contact'=> $request->mobile_no ,
                    'd_city_id' => $d_city_id,
                    'd_address'=> $request->address ,
                    
                    // 'd_lat' => $d_lat, 
                    // 'd_long' => $d_long,
                    'd_lat' => $request->d_lat, 
                    'd_long' => $request->d_long,

                    'd_user_id' => $last_d_id,
                    
                    'helper_status'=> $request->helper_status ,                                       // 0-Individual | 1-Organization  
                    'helper_name'=> $request->helper_name ,
                    'helper_email'=> $request->helper_email ,
                    'helper_contact'=> $request->helper_mobile_no ,
                    'helper_city_id' => $helper_city_id,
                    'helper_address'    => $request->helper_address, 
                    
                    // 'helper_lat' => $helper_lat, 
                    // 'helper_long' => $helper_long,
                    'helper_lat' => $request->helper_lat, 
                    'helper_long' => $request->helper_long,

                    'helper_user_id' => $last_h_id,
                    'status' =>1 ,
                    // 'expired_at'=> (str_replace("T", " ", $request->expiry).':00'),
                    // 'expired_at'=> date_format($request->expiry,"Y-m-d H:i:s"),
                    
                    'expired_at'=> date("Y-m-d H:i:s",strtotime($request->expiry)),
                    
                    'created_at'=> new \DateTime(),
                    'updated_at'=> new \DateTime()
                ]);

            }else{
         
                $datau = array(
                    'title' => $request->title,
                    'description'=> $request->description,
                    'condition' => $request->condition,
                    'city_id' =>$city_id,
                    'address' => $request->city,
                    
                    // 'lat' => $city_lat,
                    // 'long' => $city_long,
                    'lat' => $request->city_lat,
                    'long' => $request->city_long,
                    'donation_type_id' => $request->donation_type,
                    'donation_type_other' => $request->donation_type_other,
                    'preference' =>$request->preference,                              //0-new | 1-anyone    
                    'preference_gender' => $gender,              // 1-male | 2-female | 3-other 
                    'preference_age' => $age,                   //1-0to14 | 2-14to30 | 3-30to60 | 4-above60 
                    'consideration' => $request->consideration,                   //0-free | 1-Non-Monetary | 2-Monetary    
                    'consideration_detail'=> $request->consideration_detail,
                    'is_urgent'=> $request->is_urgent ,                          // 0-no | 1-yes
                    'urgent_reason' => $request->urgent_reason,
                    'updated_at'=> new \DateTime()
                );  
                $id =  DB::table('donation_posts')->where('key',$request->updated_id)->update($datau );

            } 

            if (empty($request->donation_post_id)) {     
                                
                        $img_donation_post_id = $id;
                        
                }else{
                     
                        $img_donation_post_id = $request->donation_post_id;
                                
                } 

            if ($request->file('image_file')) 
            {
                $files = $request->file('image_file');

                //              dd($request->file('image_file'));
                // die();   
                // print_r($files[0]);

                // dd($files[0]->getMimeType());

                try {
                        foreach($files as $file)
                        {
                        
                        
                        

                            $extension = $file->getClientOriginalExtension();
                            // echo  $extension;
                            // die();
                            
                            //    dd($file->getMimeType());
                            // die();
                            // dd($file->getMimeType());

                            $file_type = $file->getMimeType();

                            
                            $fileName = $img_donation_post_id."_".date('YmdHis')."_".str_random(4).".".$extension;
                            

                            $folderpath  = base_path('images/uploads/donation_post/');
                            

                            $file->move($folderpath , $fileName);

            
                            // $imagePath     ="../../uploads/product_images_temp/" . $gs_item_images; // file rename 
                            $imagePath  = base_path('images/uploads/donation_post/'.$fileName);
            
                            chmod($imagePath, 0777); // assing permission
            
                            $new_image_path = $fileName;
                            
                            $newImagePath  = base_path('images/uploads/donation_post/'.$new_image_path); // new file name 
                            
                            $newImageQuality = 50; // In JPG The compression quality of the new image to be created from 0 (worst) to 100 (best).
                            
                            // Load the original image into memory.
                            
                            
                            //  echo $file_type;
                           // dd(imagecreatefrompng($imagePath));

                            if($file_type == "image/png"){
                                $image = imagecreatefrompng($imagePath);
                                $newImageQuality = 5;   // In PNG 0 to 9
                                if($image) {
                                 
                                    imagepng($image, $newImagePath, $newImageQuality);
                                   //       echo "Png here";
                                   // dd(imagecreatefrompng($imagePath));    
                                    
                                   imagedestroy($image);
                                  // echo "Png YES";
                
                                }
                            } 
                            else if($file_type == "image/gif"){
                               
                                // $image = imagecreatefromgif($imagePath);
                                // if($image) {
                                    
                                   
                                //     imagegif($image, $newImagePath);

                                //    imagedestroy($image);
                                //  //  echo "gif YES";
                                //}
                
                            
                            }
                            else
                            {
                                $image = imagecreatefromjpeg($imagePath);
                                if($image) {
                                    imagejpeg($image, $newImagePath, $newImageQuality);
                                   
                                        imagedestroy($image);

                                       // echo "jpg YES";
                                }
                            }

                            
                           // dd();
                            // $image = imagecreatefromjpeg($imagePath);
                            //     if($image) {
                            //         imagejpeg($image, $newImagePath, $newImageQuality);
                            //        imagedestroy($image);
                                    
                            //     }
                            
                            
                            
                            
                            // If the image was loaded successfully, then recreate the image.
                            
                            // if($image) {
                            //     imagejpeg($image, $newImagePath, $newImageQuality);
                            //     imagepng($image, $newImagePath, $newImageQuality);
                            //     imagegif($image, $newImagePath, $newImageQuality);

                            //     imagedestroy($image);
            
                            // }
                            // unlink($imagePath);
                            // New Code image upload  End 23-04-2021
                            
                            if (empty($request->donation_post_id)) {     
                                DB::table('donation_images')->insert([
                                    'donation_post_id' => $id ,
                                    'key' => generateKey(12),
                                    'file_type' => 'img',
                                    'image' => $new_image_path,
                                    'status' =>1 ,
                                    'created_at'=> new \DateTime(),
                                    'updated_at'=> new \DateTime()
                                ]);
                            }else{
                                 DB::table('donation_images')->insert([
                                    'donation_post_id' => $request->donation_post_id,
                                    'key' => generateKey(12),
                                    'file_type' => 'img',
                                    'image' => $new_image_path,
                                    'status' =>1 ,
                                    'created_at'=> new \DateTime(),
                                    'updated_at'=> new \DateTime()
                                ]);
                            }

                        }
                    } catch (\Throwable $th) {
                        echo "error While Uploading Image";
                    }
                    
            }


            if ($request->file('video_file')) {
               
                try {
                 $file = $request->file('video_file');
                //  print_r( $files);
                //  die();
                 $extension = $file->getClientOriginalExtension();
                     $fileName = $img_donation_post_id."_".date('YmdHis')."_".str_random(4).".".$extension;

                    //  $ffprobe = FFMpeg\FFProbe::create();
                    //     $duration = $ffprobe
                    // ->format($file->getRealPath()) // extracts file information
                    // ->get('duration');
                    // return(round($duration) > $parameters[0]) ?false:true;
                    // print_r($duration);
                    // die();

                     $folderpath  = base_path('images/uploads/donation_post/');
                     $file->move($folderpath , $fileName);
     
                     // $imagePath     ="../../uploads/product_images_temp/" . $gs_item_images; // file rename 
                     $videoPath  = base_path('images/uploads/donation_post/'.$fileName);
     
                     chmod($videoPath, 0777); // assing permission
     
                     $new_video_path = $fileName;
                     
                     $newImagePath  = base_path('images/uploads/donation_post/'.$new_video_path); // new file name 
                     
                    
                 if (empty($request->donation_post_id)) {     
                     DB::table('donation_images')->insert([
                         'donation_post_id' => $id ,
                         'key' => generateKey(12),
                         'file_type' => 'video',
                         'image' => $new_video_path,
                         'status' =>1 ,
                         'created_at'=> new \DateTime(),
                         'updated_at'=> new \DateTime()
                     ]);
                  }else{
                      DB::table('donation_images')->insert([
                         'donation_post_id' => $request->donation_post_id,
                         'key' => generateKey(12),
                         'file_type' => 'video',
                         'image' => $new_video_path,
                         'status' =>1 ,
                         'created_at'=> new \DateTime(),
                         'updated_at'=> new \DateTime()
                     ]);
                  }
                } catch (\Throwable $th) {
                    echo "Error While Uploading Video";
                    die(); 
                }
                
             }

       
        

            session()->flash('success','Donation form posted Successfully.');
            return redirect('/user/my-post');

        }
        else
        {
            session()->flash('error', 'Something went wrong in your form.');
            return redirect('/user/my-post');


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
    

    

    public function addToFavoriate(Request $request)
    {
        if (Auth::guard('user')->check()){
            $user = Auth::guard('user')->user()->id;
        }else{
            session()->flash('error', 'You must logged in before add to favorite list.');
            return redirect('/user/login');
        }
        $id = DB::table('donation_posts')->where('key',$request->key)->select('key','id')->first();
        if(DB::table('favourite_posts')->where('user_id',$user)->where('donation_post_id',$id->id)->count() > 0){
            $status = DB::table('favourite_posts')->where('user_id',$user)->where('donation_post_id',$id->id)->first()->status;
            DB::table('favourite_posts')->where('user_id',$user)
                                       ->where('donation_post_id',$id->id)
                                       ->update(['status' => !$status ]);     
            if($status){

                return 'Removed';
                // return redirect()->back()->with('error',"This donation is remove from your favoriate list!");
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
        



        return 'Added'; 
        
    }
    
    public function covid19()
    {
        return view('web.main.covid19');
    }
    public function getStateVaccineData()
    {
        
    }
    public function getVaccineData()
    {
        
    }



    public function aboutUs()
    {
        return view('web.main.aboutUs');
    }
    public function contactUs()
    {
        return view('web.main.contactUs');
        
    }
    public function termsOfUse()
    {
        return view('web.main.termsOfUse');
        
    }
    public function policy()
    {
        return view('web.main.policy');
        
    }
    public function donationDetail($key)
    {
        // echo "process";
        // exit();

        $key=substr($key, (strripos($key,'-') + 1));
        // print_r($key);
        // die();

        // $key = $key;
	
        if(DB::table('donation_posts')->where('key',$key)->where('status',1)->count() > 0 ){
            
            $dontaion_post = DB::table('donation_posts')->where('key',$key)->where('status',1)->first();
            $is_urgent = $dontaion_post->is_urgent;
            
            $favourite_posts = DB::table('donation_posts')->select('favourite_posts.status as fav_status')->join('favourite_posts','favourite_posts.donation_post_id','=','donation_posts.id')->where('donation_posts.key',$key)->where('donation_posts.status',1)->first();
            $donation_images = DB::table('donation_images')->where('donation_post_id',$dontaion_post->id)->get();

            $donation_images_main = DB::table('donation_images')->where('donation_post_id',$dontaion_post->id)->first();

            $city = City::where('id',$dontaion_post->city_id)->first();
            $state = $city->state;
            $country = $state->country;
            $spectification = Specification::where('id',$dontaion_post->specification_id)->first();
            $subcategory = $spectification->subcategory;
            $category = $subcategory->category;
            $user_type = DB::table('user_types')->where('id',$dontaion_post->user_type_id)->first();
             $user = DB::table('users')->where('id',$dontaion_post->user_id)->select('name','contact','email','created_at')->first();
           
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
                                                   'donation_images_main',
                                                   'city', 'user',
                                                   'state', 'donation_type',
                                                   'country','user_identity',
                                                   'category',
                                                   'subcategory',
                                                   'spectification','user_type', 'favourite_posts','is_urgent'));
                                                   // 'spectification','user_type', 'favourite_posts'));
        }else{
            return view('web.main.404');
        }
    }
}
