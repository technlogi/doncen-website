<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Http\Requests\ContactUsRequest,
    \App\Http\Requests\UpdateProfileRequest,
    \App\Http\Requests\ChangePasswordRequest;
use \App\Models\User ,
    \App\Models\Category , 
    \App\Models\Subcategory ,
    \App\Models\Specification;
use DB;
use \Auth,\Hash,\Mail,\Session;

class UserController extends Controller
{

    public function __construct()
    {
        Session::forget('MobileNumber');
        Session::forget('changeMobileNumber');
    }

    public function  dashboard()
    {
            $users[] = Auth::user();
            $users[] = Auth::guard()->user();
            $users[] = Auth::guard('user')->user();
            // dd($users);
            $id = Auth::guard('user')->user()->id;
            $user = User::where('id',$id)->first();
            $total_post = DB::table('donation_posts')->where('user_id',$id)->count();
            if(Session::has('changeMobileNumber')){
                $changeMobileNumber = 0;
            }else{
                $changeMobileNumber = 1;
            }
            return view('user.home',compact('user','total_post','changeMobileNumber'));
    }

// Upload CSV Start
    public function uploadFile(Request $request){

    if ($request->input('submit') != null ){
// echo "<pre>";
// $destination =  base_path('images/uploads/');
// $imageUrl = 'https://drive.google.com/file/d/1wtzcqoKlUFyKrLEBSjnu9B9prw93Ut_f/view?usp=sharing';
// // $imageUrl = 'https://lh4.googleusercontent.com/Iq90mouraE7tJ8Kz0I6rwugIrnVbu12aUWOYZgOoVY8yTTVfhMyPK8gguLLMhSy6Cj8RqnYkQ0URgQ=w1227-h3.png';

//  if (!empty($imageUrl)) {
//                 file_put_contents(
//                     $destination . basename($imageUrl),
//                     file_get_contents($imageUrl)
//                 );
//             }
//             echo "complate";
//             exit();
//   $files = $request->file('file');
//   // print_r($files);

//                 $extension = $files->getClientOriginalExtension();
//                 // print_r($extension);
// // echo "hi";
//                 $extension = $files->getClientOriginalExtension();
//                 // print_r($extension);
//                 $fileName = date('ymdhis')."".str_random(4).".".$extension;
//                 $folderpath  = base_path('images/uploads/');
//                 $files->move($folderpath , $fileName);

//                 // $imagePath     ="../../uploads/product_images_temp/" . $gs_item_images; // file rename 
//                 $imagePath  = base_path('images/uploads/'.$fileName);
//                 // print_r($imagePath);
//                 chmod($imagePath, 0777); // assing permission
//             // exit();



// end

//         $path = 'http://technlogi.com/dev/school150/assets/img/logo.png';
// $filename = basename($path);

// Image::make($path)->save(base_path('images/uploads/' . $filename));
// exit();

      // $file = $request->file('file');


  $file = $request->file('file');
  // print_r($files);

                $extension = $file->getClientOriginalExtension();
                // print_r($extension);
// echo "hi";
                $extension = $file->getClientOriginalExtension();
                // print_r($extension);
                $filename = date('ymdhis')."".str_random(4).".".$extension;
            //     $folderpath  = base_path('images/uploads/');
            //     $file->move($folderpath , $filename);

            //     // $imagePath     ="../../uploads/product_images_temp/" . $gs_item_images; // file rename 
            //     $imagePath  = base_path('images/uploads/'.$filename);
            //     // print_r($imagePath);
            //     chmod($imagePath, 0777); // assing permission
            // // exit();


      // File Details 
      // $filename = $file->getClientOriginalName();
      // $extension = $file->getClientOriginalExtension();
      // $tempPath = $file->getRealPath();
      // $fileSize = $file->getSize();
      // $mimeType = $file->getMimeType();

      // Valid File Extensions
      $valid_extension = array("csv");

      // 2MB in Bytes
      // $maxFileSize = 2097152; 

      // Check file extension
      if(in_array(strtolower($extension),$valid_extension)){

   $extension = $file->getClientOriginalExtension();
                // print_r($extension);
                $filename = date('ymdhis')."".str_random(4).".".$extension;
                $folderpath  = base_path('images/uploads/postCSVimport/');
                $file->move($folderpath , $filename);

                // $imagePath     ="../../uploads/product_images_temp/" . $gs_item_images; // file rename 
                $filepath  = base_path('images/uploads/postCSVimport/'.$filename);
                // print_r($imagePath);
                chmod($filepath, 0777); // assing permission
		       
		          $file = fopen($filepath,"r");

		          $importData_arr = array();
		          $i = 0;

		        $count = 0; // set of page skip record

        while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
           $count++;
            if ($count < 3) { continue; }// Skip first row (Remove below comment if you want to skip the first row)
            $num = count($filedata );
            for ($c=0; $c < $num; $c++)
            {
                $importData_arr[$i][] = $filedata [$c];
            }
            $i++;
            }
          fclose($file);
  
          // Insert to MySQL database fo Helper Start
          foreach($importData_arr as $importData){
 					
 				


			// Specification start

				$specification_name = $importData[3]; // csv file in 3 = D
                $specification_query = DB::table('specifications')
                ->orWhere('name', 'LIKE',"%{$specification_name}%")
                ->first();
                $specification_id = $specification_query->id;
                
                if(empty($specification_id))
                {

					// Subcategory start
	 					$sub_category_name = $importData[2]; // csv file in 2 = B
	                    $subcategory_query = DB::table('subcategories')
	                    ->orWhere('name', 'LIKE',"%{$sub_category_name}%")
	                    ->first();
	                    $subcategory_id = $subcategory_query->id;
	                    if(empty($subcategory_id))
	                    {

	                   		// Category Start
			 					$category_name = $importData[1]; // csv file in 2 = B
			                    $category_query = DB::table('categories')
			                    ->orWhere('name', 'LIKE',"%{$category_name}%")
			                    // ->where('status',1)
			                    ->first();
			                    $category_id = $category_query->id;

			                    if(empty($category_id))
		                    	{
		                    		// Insert Category
		                    		$category_query = DB::table('categories')->insert([
						            "key"=> generateKey(14),
						             "name" =>$importData[1], // enter specification id
						             "title" =>$importData[1],
						             "image" =>$importData[1].'SVG',
						             "status" =>1,
						             "created_at" =>new \DateTime(),
	             					 "updated_at" =>new \DateTime(),
	             					   ]);
		                    		$category_id= $category_query->id;
						            
		                    	}
		                    	
		                    	$category_id = $category_id;

							// Category End

	                   		$subcategory_query = DB::table('subcategories')->insert([
					            "key"=> generateKey(14),
					            "category_id"=> $category_id,
					             "name" =>$importData[3], // enter subcategoy id
					             "status" =>1,
					             "created_at" =>new \DateTime(),
             					 "updated_at" =>new \DateTime(),
             					   ]);
                    		$subcategory_id= $subcategory_query->id;
	                    }

					// Subcategory End		                    	

               		 $specification_query = DB::table('specifications')->insert([
			            "key"=> generateKey(14),
			            "subcategory_id"=> $subcategory_id,
			             "name" =>$importData[3], // enter subcategoy id
			             "status" =>1,
			             "created_at" =>new \DateTime(),
     					 "updated_at" =>new \DateTime(),
     					   ]);
            		$specification_id= $specification_query->id;
                }
			// Specification End


            // City id Start

				$city_name = $importData[11]; // csv file in 3 = D
                $city_query = DB::table('cities')
                ->orWhere('name', 'LIKE',"%{$city_name}%")
                ->first();
                $cities_id = $city_query->id;
                
                if(empty($cities_id))
                {

					// country start
	 					$state_name = $importData[10]; // csv file in 2 = B
	                    $state_query = DB::table('states')
	                    ->orWhere('name', 'LIKE',"%{$state_name}%")
	                    ->first();
	                    $state_id = $state_query->id;
	                    if(empty($state_id))
	                    {

	                   		// country Start
			 					$countries_name = $importData[9]; // csv file in 2 = B
			                    $countries_query = DB::table('countries')
			                    ->orWhere('name', 'LIKE',"%{$countries_name}%")
			                    // ->where('status',1)
			                    ->first();
			                    $countries_id = $countries_query->id;

			                    if(empty($countries_id))
		                    	{
		                    		// Insert Countries
		                    		$countries_query = DB::table('categories')->insert([
						            "key"=> generateKey(14),
						             "sort_name" =>$importData[9], // enter specification id
						             "title" =>$importData[9],
						             "country_code" =>91,
						             "status" =>1,
						             "created_at" =>new \DateTime(),
	             					 "updated_at" =>new \DateTime(),
	             					   ]);
		                    		$countries_id= $countries_query->id;
						            
		                    	}
		                    	
		                    	$countries_id = $countries_id;

								// Countries End
		                    	// State start
	                   		$states_query = DB::table('states')->insert([
					            "key"=> generateKey(14),
					            "contry_id"=> $countries_id,
					             "name" =>$importData[10], // enter subcategoy id
					             "status" =>1,
					             "created_at" =>new \DateTime(),
             					 "updated_at" =>new \DateTime(),
             					   ]);
                    		$state_id= $states_query->id;
		                    	// State End
	                    }


               		 $cities_query = DB::table('cities')->insert([
			            "key"=> generateKey(14),
			            "state_id"=> $state_id,
			             "name" =>$importData[11], // enter subcategoy id
			             "status" =>1,
			             "created_at" =>new \DateTime(),
     					 "updated_at" =>new \DateTime(),
     					   ]);
            		$cities_id= $cities_query->id;
                }

            // City id end

	DB::table('donation_posts')->insert([
            "key"=> generateKey(14),
            "post_no"=> generatePostNO(),
             "user_id" =>Auth::guard('user')->user()->id,
             "specification_id" =>$specification_id, // enter specification id 
             "user_type_id" =>$importData[4],
             "title" =>$importData[5],
             "description" =>$importData[6],
             "condition" =>$importData[7],
             "city_id" =>$cities_id,
             "address" =>$importData[8],
             "lat" =>$_COOKIE['latitude'] ,
             "long" =>$_COOKIE['longitude'],
             "gps_location" =>'',
             "gps_lat" =>'',
             "gps_long" =>'',
             "donation_type_id" =>$importData[12],
             "donation_type_other" =>$importData[13],
             "preference" =>'',
             "preference_gender" =>$importData[14],
             "preference_age" =>$importData[15],
             "preference_is_handicap" =>$importData[16],
             "consideration" =>$importData[17],
             "consideration_detail" =>$importData[18],
             "is_urgent" =>$importData[19],
             "urgent_reason" =>$importData[20],
             "status" =>1,
             "system_code" =>'',
             "ip_address" =>$request->ip(),
             "is_complete" =>'',
             "post_view_counter" =>'',
             "post_report_counter" =>'',
             "created_at" =>new \DateTime(),
             "updated_at" =>new \DateTime(),
             "d_status" =>$importData[21],
             "d_user_id" =>'', // yaha pe bhi login user id hi ayega
             "d_name" =>$importData[22],
             "d_email" =>$importData[23],
             "d_contact" =>$importData[24],
             "d_city_id" =>$importData[28],
             "d_address" =>$importData[25],
             "d_lat" =>'', // current user ka hi aayega sir 
             "d_long" =>'', 
             "helper_status" =>'',
             "helper_user_id" =>'',
             "helper_name" =>'',
             "helper_email" =>'',
             "helper_contact" =>'',
             "helper_city_id" =>'',
             "helper_address" =>'',
             "helper_lat" =>'',
             "helper_long" =>'',
             "complete_title" =>'',
             "complete_msg" =>'',
             "complete_media" =>'',
        
      ]);
          }
          // Insert to MySQL database fo Helper End
         
          Session::flash('message','Import Successful.');


      }else{
         Session::flash('message','Invalid File Extension.');
      }

    }

    // Redirect to index
 return redirect()->back()->with("success","Import Successful !");
   }
// Upload CSV Endd

    //request for change passwordp
    public function changePassword(ChangePasswordRequest $request)
    {
 
       /* if (!(Hash::check($request->old_password, Auth::guard('user')->user()->password))) {
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
 
        if(strcmp($request->old_password, $request->new_password) == 0){
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }*/
        $user = Auth::guard('user')->user();
        $user->password = bcrypt($request->new_password);
        $user->save();
        return redirect()->back()->with("success","Password changed successfully !");
    }
    //request for update profile of user
    public function updateProfile(UpdateProfileRequest $request)
    {
        // echo "<pre>";
        // print_r(User::where('id',Auth::guard('user')->user()->id)->first()); die;
        if(!Auth::guard('user')->check()){
            return redirect()->route('user.login.loginForm')->with('error','You must login first.');
        }
        $search = explode(',',trim($request->city));
        $city = check_for_city($search);
        
        // Google >> Lat Long
            //Come from .env file for address to lat long (googleapi)
            // $url = env("MAP_API_URL");
            // $sensor = env("SENSOR");
            // $region = env("REGION");
            // $key = env("MAP_KEY");
            
            // if(!empty($request->city))
            // {
            //     $geo = file_get_contents($url.'?address='.urlencode($request->city).'&sensor='.$sensor.'&region='.$region.'&key='.$key);
            //     // $json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=$region");
                
                

            //     $geo = json_decode($geo, true); // Convert the JSON to an array
        
            //     if (isset($geo['status']) && ($geo['status'] == 'OK')) {
            //         $latitude = $geo['results'][0]['geometry']['location']['lat']; // Latitude
            //         $longitude = $geo['results'][0]['geometry']['location']['lng']; // Longitude
            //     }else{
            //         $latitude ="";
            //         $longitude= "";
            //     }
            // }
            // else
            // {
            //     $latitude ="";
            //     $longitude= "";
            // }



        User::where('id',Auth::guard('user')->user()->id)
         ->update([
             'city_id' => $city,
             'address' => $request->city,
             'name' => $request->user_name,
             'blood_groups_id' => $request->blood_groups_id,
             'email' => $request->email,
             'lat' => $request->latitude,
             'long' => $request->longitude
             ]);
        return redirect()->back()->with('success','Your profile update successfully.');   
    }
 
    //request for delete account of user
    public function deleteAccount()
    {
        if(!Auth::guard('user')->check()){
            return redirect()->route('user.login.loginForm')->with('error','You must login first.');
        }
        $id = Auth::guard('user')->user()->id;
        $user = User::where('id',$id)->first();
        $total_post = DB::table('donation_posts')->where('user_id',$id)->count();
        return view('user.page.deleteAccount',compact('user','total_post'));
    }


 public function deleteuserpost($id)
    {
        
        if(!Auth::guard('user')->check()){
            return redirect()->route('user.login.loginForm')->with('error','You must login first.');
        }
        // $id = Auth::guard('user')->user()->id;
        // $user = User::where('id',$id)->first();
        // $total_post = DB::table('donation_posts')->where('user_id',$id)->count();
        // return view('user.myDonation',compact('user','total_post'));
        

        // DB::table('donation_posts')->where('key', $id)->delete();

        $data =  DB::table('donation_posts')->where('key',$id)->get();
        
        
        foreach ($data as $p) {
        
               $v =  DB::table('donation_posts_deleted')->insert([
                    'key' => $p->key,
                    'title' => $p->title,
                    'post_no' => $p->post_no,
                    'user_id' => $p->user_id,
                    'specification_id' => $p->specification_id,
                    'user_type_id' => $p->user_type_id,
                    'description' => $p->description,
                    'condition' => $p->condition,
                    'city_id' => $p->city_id,
                    'address' => $p->address,
                    'lat' => $p->lat,
                    'long' => $p->long,
                    'gps_location' => $p->gps_location,
                    'gps_lat' => $p->gps_lat,
                    'gps_long' => $p->gps_long,
                    'donation_type_id' => $p->donation_type_id,
                    'donation_type_other' => $p->donation_type_other,
                    'preference' => $p->preference,
                    'preference_gender' => $p->preference_gender,
                    'preference_age' => $p->preference_age,
                    'preference_is_handicap' => $p->preference_is_handicap,
                    'consideration' => $p->consideration,
                    'consideration_detail' => $p->consideration_detail,
                    'is_urgent' => $p->is_urgent,
                    'urgent_reason' => $p->urgent_reason,
                    'status' => $p->status,
                    'is_complete' => $p->is_complete,
                    'expired_at' => $p->expired_at,
                    'system_code' => $p->system_code,
                    'ip_address' => $p->ip_address,
                    'post_view_counter' => $p->post_view_counter,
                    'post_report_counter' => $p->post_report_counter,
                    'is_complete' => $p->is_complete,
                    'd_status' => $p->d_status,
                    'd_user_id' => $p->d_user_id,
                    'd_name' => $p->d_name,
                    'd_email' => $p->d_email,
                    'd_contact' => $p->d_contact,
                    'd_city_id' => $p->d_city_id,
                    'd_address' => $p->d_address,
                    'd_lat' => $p->d_lat,
                    'd_long' => $p->d_long,
                    'helper_status' => $p->helper_status,
                    'helper_user_id' => $p->helper_user_id,
                    'helper_name' => $p->helper_name,
                    'helper_email' => $p->helper_email,
                    'helper_contact' => $p->helper_contact,
                    'helper_city_id' => $p->helper_city_id,
                    'helper_address' => $p->helper_address,
                    'helper_lat' => $p->helper_lat,
                    'helper_long' => $p->helper_long,
                    'complete_title' => $p->complete_title,
                    'complete_msg' => $p->complete_msg,
                    'complete_media' => $p->complete_media,
                    'created_at' => $p->created_at,
                    'updated_at' =>new \DateTime()

                 
                ]);
               
               DB::table('donation_posts')->where('key', $id)->delete();
               
        }
          DB::table('donation_posts')->where('key', $id)->delete();
        return redirect()->back()->with('success','Your Post Deleted successfully.');
    }

    
    /* Confirm Delete */
    public function deleteAccountAction()
    {
        if(!Auth::guard('user')->check()){
            return redirect()->route('user.login.loginForm')->with('error','You must login first.');
        }
        $id = Auth::guard('user')->user()->id;
        $user = User::where('id',$id)->first();
        $user->status = 0;
        $user->save();
         auth('user')->logout();
        
        return redirect('/user/login');
    }   
    //for specific user donation for logged in user only
    public function myDonation()
    {  
        if(!Auth::guard('user')->check()){
            return redirect()->route('user.login.loginForm')->with('error','You must login first.');
        }
        $id = Auth::guard('user')->user()->id;
        $user = User::where('id',$id)->first();
        $total_post = DB::table('donation_posts')->where('user_id',$id)->where('status',1)->count();
        // $views = DB::table('donation_posts_views')->where('donation_posts_views.donation_post_id',109)->select('donation_posts_views.*','users.image')->join('users','users.id', '=','donation_posts_views.user_id')->get();
      
        return view('user.page.myDonation',compact('user','total_post'));
    }

    public function pandingDonation()
    {
        if(!Auth::guard('user')->check()){
          return redirect()->route('user.login.loginForm')->with('error','You must login first.');
        }
        $id = Auth::guard('user')->user()->id;
        $user = User::where('id',$id)->first();
        $total_post = DB::table('donation_posts')->where('user_id',$id)->where('is_complete',0)->where('status',1)->count();
        return view('user.page.pandingDonation',compact('user','total_post'));
    }

    // public function  donationComplete()
    // {
    //     echo "<pre>";
    //     print_r($_POST);
    //     print_r($_FILES['images']['name']);
    //     exit();

    // }
    public function  donationComplete($key)
    {
        // echo $key;
        // print_r($_POST);
        // print_r($_FILES['images']['name']);
        // exit();
        //         $base_file_name     = $_FILES['image_file']['name'];    //Get file name
               
        //         $extension          = pathinfo($base_file_name, PATHINFO_EXTENSION); // Get upload file name extension
        //          // Get fiel name without exension
        //         $file_name         = date('ymdhis')."".str_random(4).".".$extension;

        //         move_uploaded_file($_FILES['image_file']['tmp_name'],'../../images/uploads/donation_post_temp/'.$file_name);
                
        //         $imagePath          = '../../images/uploads/donation_complate_story/'. $file_name; // file rename 
 
 
        //         chmod($imagePath, 0777); // assing permission

        //         $new_image_path     = $file_name;
                

        //         // $newImagePath       = "../../uploads/user_images/" . $new_image_path; // new file name 
        //         $newImagePath  = '../../images/uploads/donation_complate_story/'.$new_image_path; // new file name 
                
        //         $newImageQuality    = 50; // The compression quality of the new image to be created from 0 (worst) to 100 (best).
                
        //         // Load the original image into memory.
        //         $image              = imagecreatefromjpeg($imagePath);
                
        //         // If the image was loaded successfully, then recreate the image.
                
        //         if($image) {
        //             imagejpeg($image, $newImagePath, $newImageQuality);
        //             imagedestroy($image);

        //         }
        //         print_r($file_name);
        //             exit();
        //             if(!empty($complete_title))
        //             {
        //                 $complete_title = $_GET['complete_title'];
        //             }
        //             else
        //             {
        //                 $complete_title = '';
        //             }

        //             if(!empty($complete_msg))
        //             {
        //                 $complete_msg = $_GET['complete_msg'];
        //             }
        //             else
        //             {
        //                 $complete_msg = '';
        //             }

        //             if(!empty($complete_media))
        //             {
        //                 $complete_media = $complete_media;
        //             }
        //             else
        //             {
        //                 $complete_media = $file_name;
        //             }
        //             // End
        if(!Auth::guard('user')->check()){
            return redirect()->route('user.login.loginForm')->with('error','You must login first.');
        }
        $id = Auth::guard('user')->user()->id;
        DB::table('donation_posts')->where('key',$key)->update([
            'is_complete' => 1,
            // 'complete_title' => $complete_title,
            // 'complete_msg' => $complete_msg,
            // 'complete_media' => $complete_media,
            'updated_at' => new \DateTime(),
        ]);
        $data =  DB::table('donation_posts')->where('key',$key)->get();
      
       // dd($dataa);
        // print_r($dataa);
         // $didsd =$dataa->id;
         // $dtitlesd = $dataa->title;
        foreach ($data as $p) 
        {
       
               $v =  DB::table('donation_posts_completed')->insert([
                    'key' => $p->key,
                    'title' => $p->title,
                    'post_no' => $p->post_no,
                    'user_id' => $p->user_id,
                    'specification_id' => $p->specification_id,
                    'user_type_id' => $p->user_type_id,
                    'description' => $p->description,
                    'condition' => $p->condition,
                    'city_id' => $p->city_id,
                    'address' => $p->address,
                    'lat' => $p->lat,
                    'long' => $p->long,
                    'gps_location' => $p->gps_location,
                    'gps_lat' => $p->gps_lat,
                    'gps_long' => $p->gps_long,
                    'donation_type_id' => $p->donation_type_id,
                    'donation_type_other' => $p->donation_type_other,
                    'preference' => $p->preference,
                    'preference_gender' => $p->preference_gender,
                    'preference_age' => $p->preference_age,
                    'preference_is_handicap' => $p->preference_is_handicap,
                    'consideration' => $p->consideration,
                    'consideration_detail' => $p->consideration_detail,
                    'is_urgent' => $p->is_urgent,
                    'urgent_reason' => $p->urgent_reason,
                    'status' => $p->status,
                    'is_complete' => $p->is_complete,
                    'expired_at' => $p->expired_at,
                    'system_code' => $p->system_code,
                    'ip_address' => $p->ip_address,
                    'post_view_counter' => $p->post_view_counter,
                    'post_report_counter' => $p->post_report_counter,
                    'is_complete' => $p->is_complete,
                    'd_status' => $p->d_status,
                    'd_user_id' => $p->d_user_id,
                    'd_name' => $p->d_name,
                    'd_email' => $p->d_email,
                    'd_contact' => $p->d_contact,
                    'd_city_id' => $p->d_city_id,
                    'd_address' => $p->d_address,
                    'd_lat' => $p->d_lat,
                    'd_long' => $p->d_long,
                    'helper_status' => $p->helper_status,
                    'helper_user_id' => $p->helper_user_id,
                    'helper_name' => $p->helper_name,
                    'helper_email' => $p->helper_email,
                    'helper_contact' => $p->helper_contact,
                    'helper_city_id' => $p->helper_city_id,
                    'helper_address' => $p->helper_address,
                    'helper_lat' => $p->helper_lat,
                    'helper_long' => $p->helper_long,
                    'complete_title' => $p->complete_title,
                    'complete_msg' => $p->complete_msg,
                    'complete_media' => $p->complete_media,
                    'created_at' => $p->created_at,
                    'updated_at' =>new \DateTime()

                 
                ]);          
               DB::table('donation_posts')->where('key', $key)->delete();
               
        }
      // dd($dataa);



return redirect()->back()->with('success','Your donation post has been completed.');
}

public function completeDonation()
{
        if(!Auth::guard('user')->check()){
            return redirect()->route('user.login.loginForm')->with('error','You must login first.');
        }
        $id = Auth::guard('user')->user()->id;
        $user = User::where('id',$id)->first();
        $total_post = DB::table('donation_posts_completed')->where('user_id',$id)->where('is_complete',1)->where('status',1)->count();

        // print_r($total_post);
        // die();

      return view('user.page.CompleteDonation',compact('user','total_post'));
    }
    public function changeMobileNumber(Request $request){
      
        $this->validate($request ,[
             'mobile' => 'required|min:9',
        ]);
        $id = Auth::guard('user')->user()->id;
        $user = User::where('id',$id)->first();
        $message = "Dear User,
".$user->otp." is your one time password (OTP). Please enter the OTP to proceed.

Thank you
Team Doncen.org ";
        SMS_GATEWAY($request->mobile,$message);
        Session::put('changeMobileNumber',0);
        Session::put('MobileNumber',$request->mobile);
        return array('success'=>"OTP has been send to your new mobile number.");
    }
   


   public function contactUsGet()
    {
     
       return view('user.contact.us');  
    }


    
    public function contactUs(ContactUsRequest $request)
    {
      DB::table('contact_us')->insert([
          'key' => generateKey(15),
         'name' => $request->name,
         'email' => $request->email,
         'subject' => $request->subject,
         'message' => $request->message,
         'status' => 0,
         'created_at' => new \DateTime(),
         'updated_at' => new \DateTime(),
      ]);
      return redirect()->back()->with('success','Your Suggestion is submited We will contact You soon! Thank You.');   
    }

    public function  urgentRequirement()
    { 
        if(!Auth::guard('user')->check()){
            return redirect()->route('user.login.loginForm')->with('error','You must login first.');
        }
        $id = Auth::guard('user')->user()->id;
        $user = User::where('id',$id)->first();
        $total_post = DB::table('donation_posts')->where('user_id',$id)->where('is_urgent',1)->where('status',1)->count();
      return view('user.page.urgent',compact('user','total_post'));
    }

    public function favoriateDonation()
    {
        if(!Auth::guard('user')->check()){
            return redirect()->route('user.login.loginForm')->with('error','You must login first.');
        }
        $id = Auth::guard('user')->user()->id;
        $user = User::where('id',$id)->first();
        $total_post = DB::table('favourite_posts')->where('user_id',$id)->where('status',1)->count();
        // $all_fav_post = DB::table('favourite_posts')->where('user_id',$id)->where('status',1)->count();
        // return view('user.page.favoriateDonation',compact('user','total_post','all_fav_post'));
        return view('user.page.favoriateDonation',compact('user','total_post'));
    }

    public function faq()
    {
        return view('web.main.faq');
        // return redirect('/');
    } 
    public function favourite_ads()
    {
        return view('web.favourite_ads');
    } 
   
    public function published()
    {
        return view('web.published');
    }



 public function sucesspost()
    {
       if(!Auth::guard('user')->check()){
            return redirect()->route('user.login.loginForm')->with('error','You must login first.');
        }
        $id = Auth::guard('user')->user()->id;
        $user = User::where('id',$id)->first();
        $total_post = DB::table('donation_posts')->where('user_id',$id)->where('status',1)->count();
        return view('user.page.sucessstory',compact('user','total_post'));
        // return view('user.page.sucessstory');
    }


    public function storyComplete(Request $request)
    {
        // print_r($request->input(['post_id']));
        // die();
           
         if(!Auth::guard('user')->check()){
            return redirect()->route('user.login.loginForm')->with('error','You must login first.');
        }
        $id = Auth::guard('user')->user()->id;
        $user = User::where('id',$id)->first();


       

           DB::table('donation_posts')->where('id',$request->input(['post_id']))->update([
                    
                    'complete_title' =>  $request->input(['title']),
                    'complete_msg' => $request->input(['desc']),

                    // 'complete_media' => $request->input(['desc']),
                   
                    'updated_at' => new \DateTime()
        ]);

     
      if ($request->hasFile('image_file')) {

            $files = $request->file('image_file');
            
            // try 
            // {
                foreach($files as $file)
                {
                    // $imageName=$image->getClientOriginalName();
                    // $image->move(public_path().'images/uploads/user_success_image/', $imageName);
                    // $p_images[] = $imageName;
                    
                        
                        

                        $extension = $file->getClientOriginalExtension();
                        $fileName = $request->input(['post_id'])."_".date('YmdHis')."_".str_random(4).".".$extension;
                        $folderpath  = base_path('images/uploads/donation_post_temp/');
                        $file->move($folderpath , $fileName);

                        // $imagePath     ="../../uploads/product_images_temp/" . $gs_item_images; // file rename 
                        $imagePath  = base_path('images/uploads/donation_post_temp/'.$fileName);

                        chmod($imagePath, 0777); // assing permission

                        $new_image_path = $fileName;
                        
                        $newImagePath  = base_path('images/uploads/user_success_image/'.$new_image_path); // new file name 
                        
                        $newImageQuality = 50; // The compression quality of the new image to be created from 0 (worst) to 100 (best).
                        
                        // Load the original image into memory.
                        $image = imagecreatefromjpeg($imagePath);
                        
                        // If the image was loaded successfully, then recreate the image.
                        
                        if($image) {
                            imagejpeg($image, $newImagePath, $newImageQuality);
                            imagedestroy($image);

                        }



                    
                        // unlink($imagePath);
                        // New Code image upload  End 23-04-2021
                        DB::table('user_posts_story_images')->insert([
                            'donation_post_id' =>$request->post_id,
                            'key' => generateKey(12),
                            // 'file_type' => 'img',
                            'user_id' => $id,
                            'image' => $new_image_path,
                            'created_at'=> new \DateTime(),
                            
                        ]);
                
                      }  
            //  } catch (\Throwable $th) {
            //     echo "error While Uploading Image";
            // }

        }


        if ($request->hasFile('video_file')) {

            $files2 = $request->file('video_file');
            
            try 
            {

                foreach($files2 as $file2)
                {
                    // $videoName=$video->getClientOriginalName();
                    // $video->move(public_path().'images/uploads/user_success_image/', $videoName);
                    // $p_images[] = $imageName;
                    
                    
                    
                    $extension = $file2->getClientOriginalExtension();
                     $fileName = $request->input(['post_id'])."_".date('YmdHis')."_".str_random(4).".".$extension;

                    //  $ffprobe = FFMpeg\FFProbe::create();
                    //     $duration = $ffprobe
                    // ->format($file->getRealPath()) // extracts file information
                    // ->get('duration');
                    // return(round($duration) > $parameters[0]) ?false:true;
                    // print_r($duration);
                    // die();

                     $folderpath  = base_path('images/uploads/donation_post_temp/');
                     $file2->move($folderpath , $fileName);
     
                     // $imagePath     ="../../uploads/product_images_temp/" . $gs_item_images; // file rename 
                     $videoPath  = base_path('images/uploads/donation_post_temp/'.$fileName);
     
                     chmod($videoPath, 0777); // assing permission
     
                     $new_video_path = $fileName;
                     
                     $newImagePath  = base_path('images/uploads/user_success_image/'.$new_video_path); // new file name

        
                    
                        // unlink($imagePath);
                        // New Code image upload  End 23-04-2021
                        DB::table('user_posts_story_images')->insert([
                            'donation_post_id' =>$request->post_id,
                            'key' => generateKey(12),
                            // 'file_type' => 'video',
                            'user_id' => $id,
                            'image' => $new_video_path,
                            'created_at'=> new \DateTime(),
                            
                        ]);
            
                }
            } catch (\Throwable $th) {
                echo "error While Uploading Image";
            }      
                
        }




      // return redirect()->route('/user/my-post-complete')->with('success','');
      return redirect()->back()->with("success","Story submitted successfully.");
      // return redirect('/user/my-post-complete');
    }

     public function updateExpiredate(Request $request)
    {

            
         if(!Auth::guard('user')->check()){
            return redirect()->route('user.login.loginForm')->with('error','You must login first.');
        }
        $id = Auth::guard('user')->user()->id;
        $user = User::where('id',$id)->first();




           DB::table('donation_posts')->where('id',$request->post_id)->update([
                    
                'expired_at' =>$request->expiry
            ]);


      return redirect('/user/my-post');
    }
}
