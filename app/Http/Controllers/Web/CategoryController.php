<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category,App\Models\Subcategory;
use DB;
use Session;
class CategoryController extends Controller
{
    public function donationCategory()
    {
        // $categories = Category::where('status',1)->orderBy('name','asc')->get();

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
                        
        return view('web.page.donation_category',compact('categories'));
    }


    public function donationEditCategory($key)
    {               

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
        return view('web.page.donation_category',compact('categories'));
    }

    public function searchCategory(Request $request)
    {
        
        // print_r($request->str);
        // die();

        if(isset( $request->str)){
             $url_string = $request->str;
             // echo $url_string ;

            // die(); 

            $convert_to_array = explode('/', $url_string);

        //     echo "<pre>";
       // print_r($convert_to_array);
        // die();
        

            for($i=0; $i < count($convert_to_array ); $i++){
                
                // $new_Str=str_replace('-aNd-',',',$convert_to_array [$i]);
                // echo $new_Str;

                // $key_value = explode('-', $new_Str);
                 // $key_value = explode('-', $convert_to_array[$i]);

                 list($before, $after) = explode('-', $convert_to_array[$i], 2);
                 
                 $after_comma =str_replace('-aNd-',',',$after);

                 $after_final =str_replace('-',' ',$after_comma);
                
                 // print_r($after);
                 // print_r($before);

                // $end_array[$key_value [0]] = $key_value [1];

                $end_array[$before] = $after_final;                 


            }

        }
        
       

        // echo "<pre>";
        // print_r($end_array);
      //  die();
        
        // print_r($request->city_search_box);
        // print_r($request->category_box);
        // print_r($request->word_box);
        

        

        if(session()->get('search') > 0)
        {
            $Sessiondata = session()->get('search');
            $category_box = $Sessiondata[0]['category_box'];
        }

        Session::forget('search','');

        // print_r($category_box);
        // die();

        
        if($request->has('_token') ){
            Session::push('search', [
                'city_search_box'=> $request->city_search_box,
                'category_box'=> $request->category_box,
                'word_box' => $request->word_box
            ]);
        }
        elseif(!empty($category_box))
        {
            
            

            Session::push('search', [
                
                'city_search_box'=> '',
                'category_box'=> $category_box,
                'word_box' => ''
            ]);

        }
        else{
            Session::forget('search','');
        }

        // $Sessiondata = session()->get('search');
        // print_r(session()->get('search'));
        // die();
        

        // $categories = Category::where('status',1)->orderBy('name','asc')->get();
        // foreach($categories as $key => $category){
        //   $count =  DB::select("SELECT  COUNT(donation_posts.id) as total_count                    
        //                         FROM categories                 
        //                         JOIN subcategories ON categories.id = subcategories.category_id                 
        //                         JOIN specifications ON subcategories.id = specifications.subcategory_id                 
        //                         JOIN donation_posts ON specifications.id = donation_posts.specification_id                 
        //                         WHERE donation_posts.status = 1  and categories.key ='$category->key' GROUP BY categories.key") ;
        //     if(!empty($count)){
        //         $category->total_post = $count[0]->total_count ;
        //     }else{
        //         $category->total_post = 0;
        //     }
        // }

        $categories = DB::table('categories')
                        ->select(
                                            // count(donation_posts.id) as total_post, 
                                    DB::raw('
                                            "" as total_post,
                                            categories.id,
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
        
        // $subcategories = \App\Models\Subcategory::where('status',1)->get();
        // $specifications = \App\Models\Specification::where('status',1)->get();


                $sp = '';
                 $print = '';
               if(isset($end_array['ct'])){
                     $category_array = explode(',', $end_array['ct']);
                    

                    $subcategory_ids=array();
                    // if(isset($request->data2) && !empty($request->data2))
                    // {
                    //     $subcategory_ids = explode("&st=", $request->data2);
                    //     $subcategory_ids[0] = substr($subcategory_ids[0], 3);
                    // }
                    
                    $resutls = array();
                    if(!empty($category_array)){

                        // $category_ids = explode("&ct=", $request->data);
                        // $category_ids[0] = substr($category_ids[0], 3);
                        
                        // if(!empty($category_ids)){
                            foreach($category_array as $category_id){
                                $category =  Category::where('name',$category_id)->where('status',1)->first();
                                if(!empty($category->subcategories)){
                                    foreach($category->subcategories as $subcategory){
                                        if(!empty($subcategory)){
                                            array_push($resutls,$subcategory);
                                        }                          
                                    }             
                                }
                            }
                        // } 
                    }

                    
                    


                    $subcat_ids=array();
                    $print = '';
                    foreach($resutls as $result){
                        if(in_array($result->id,$subcategory_ids))
                        {
                            $cheked_status="checked";
                            $subcat_ids[]=$result->id;
                        }else{
                            $cheked_status="";
                        }
                        $print .= '<label class="checkbox-design"><input type="checkbox" name="st" class="selectSubCategory" value="'. $result->id.'" '.$cheked_status.' />'. $result->name .'<span class="checkmark"></span></label>';
                        
                    }
                    $print .= '';



                    //get Spectification list
                    if(isset($end_array['st'])){

                        $subcategory_array = explode(',', $end_array['st']);
                        $specifications_ids=array();

                        $resutls = array();
                        if(!empty($subcategory_array)){

                               foreach($subcategory_array as $subcategory_id){
                                    $subcategory =  Subcategory::where('name',$subcategory_id)->where('status',1)->first();
                                    if(!empty($subcategory->specifications)){
                                        foreach($subcategory->specifications as $specification){
                                            if(!empty($specification)){
                                                array_push($resutls,$specification);
                                            }                          
                                        }             
                                    }
                                }
                            
                        }



                        $sp = '';
                        foreach($resutls as $result){
                            if(in_array($result->id,$specifications_ids))
                            {
                                $cheked_status="checked";
                            }else{
                                $cheked_status="";
                            }
                            
                            $sp .= '<label class="checkbox-design"><input type="checkbox" name="sp" class="selectSpecifiction" value="'. $result->id.'" '.$cheked_status.'>'. $result->name .'<span class="checkmark"></span></label>';
                        }
                        $sp .= '';

                    }

                     
                    
               } 
            
                    

             //  echo $sp;
             // die();

        $cities = \App\Models\City::where('status',1)->orderBy('name','asc')->get();
        $donation_types = DB::table('donation_types')->where('status',1)->get();
        $user_types = DB::table('user_types')->where('status',1)->get();
        // $count = $category->total_post;

        return view('web.page.search',compact('categories','subcategories','specifications','donation_types','user_types','cities','print','sp'));
    }
   
    //for home search and get category
    public function getCategory(Request $request) {
        $query = $request->category;
        $categories = Category::where('name','LIKE','%'.$query.'%')->where('status',1)->get();
        $data=array();
        foreach ($categories  as $category) {
                $data[]=array('value'=>$category->name  );
        }
        if(count($data))
                return $data;
        else
            return ['value'=>'No Result Found'];
    }

    public function getSubcategory(Request $request)
    {
		 
         
        // print_r($request->data3);

         
         // echo"<pre>"; print_r($request->data); echo"</pre>";
		// echo"<pre>"; print_r($request->data2); echo"</pre>"; 
		// echo"<pre>"; print_r($request->data3); echo"</pre>"; 

        // die();
		$subcategory_ids=array();
		if(isset($request->data2) && !empty($request->data2))
		{
			$subcategory_ids = explode("&st=", $request->data2);
			$subcategory_ids[0] = substr($subcategory_ids[0], 3);
		}
		
        $resutls = array();
        if(!empty($request->data)){
            $category_ids = explode("&ct=", $request->data);
            $category_ids[0] = substr($category_ids[0], 3);
            if(!empty($category_ids)){
                foreach($category_ids as $category_id){
                    $category =  Category::where('id',$category_id)->where('status',1)->first();
                    if(!empty($category->subcategories)){
                        foreach($category->subcategories as $subcategory){
                            if(!empty($subcategory)){
                                array_push($resutls,$subcategory);
                            }                          
                        }             
                    }
                }
            } 
        }

        

		$subcat_ids=array();
		$print = '<form method="post" id="subCategoryForm" class="subCategoryForm">';
        foreach($resutls as $result){
			if(in_array($result->id,$subcategory_ids))
			{
				$cheked_status="checked";
				$subcat_ids[]=$result->id;
			}else{
				$cheked_status="";
			}
			$print .= '<label class="checkbox-design"><input type="checkbox" name="st" class="selectSubCategory" value="'. $result->id.'" '.$cheked_status.' />'. $result->name .'<span class="checkmark"></span></label>';
			
		}
        $print .= '</form>';
		
        // print_r($print);
        // die();
		
	// Specification
		$specifications_ids=array();
		if(isset($request->data3) && !empty($request->data3))
		{
			$specifications_ids = explode("&sp=", $request->data3);
			$specifications_ids[0] = substr($specifications_ids[0], 3);
		}
		
		
		
		$resutls1 = array();
        if(!empty($subcat_ids)){
            
                foreach($subcat_ids as $subcategory_id){
                    $subcategory =  Subcategory::where('id',$subcategory_id)->where('status',1)->first();
                    if(!empty($subcategory->specifications)){
                        foreach($subcategory->specifications as $specification){
                            if(!empty($specification)){
                                array_push($resutls1,$specification);
                            }                          
                        }             
                    }
                }
				
				$print2 = '<form method="post" id="specificationForm" class="specificationForm">';
				foreach($resutls1 as $result){
					if(in_array($result->id,$specifications_ids))
					{
						$cheked_status="checked";
					}else{
						$cheked_status="";
					}
					
					$print2 .= '<label class="checkbox-design"><input type="checkbox" name="sp" class="selectSpecifiction" value="'. $result->id.'" '.$cheked_status.'>'. $result->name .'<span class="checkmark"></span></label>';
				}
				$print2 .= '</form>';
            
        }else{
			$print2="";
		}
		
		
       echo $print;
       //  die();
        // return $print;
		// echo json_encode(array($print, $print2));
		
		
		
		
    }    
    public function donationCategorySearch(Request $request)
    {
       return  redirect()->route('web.categorie.searchCategory')->with('data',$request) ;
    }
	
	public function categoryIdStoreInSession(Request $request)
	{
       // print_r($request->$key);
        // $query = $request->_token;
        // $query = $key;
        // print_r($query);
            // Session::forget('search','');
		// Session::forget('homePageCategoryId');
		// Session::put('homePageCategoryId',$key);

        Session::forget('search','');


        $category_name = $_POST['category_name'];
        $token = $_POST['_token'];

        if($token){
            Session::push('search', [
                'category_box'=> $category_name,
                'tokenTemp'=> $token
                // 'word_box' => $request->word_box
            ]);
        }else{
            Session::forget('search','');
        }

        // $Sessiondata = session()->get('search');
        // print_r(session()->get('search'));
        // // echo $homeCity;
        // // echo $homeCategory;
        // // echo $homeword;
        // die();

        

	    return  redirect()->route('web.categorie.searchCategory');
		
	}


    // public function categoryIdStoreInSession($key)
    // {
    //     // print_r($key);
    //     // die();

    //     Session::forget('homePageCategoryId');
    //     Session::put('homePageCategoryId',$key);


    //     if($request->has('_token')){
    //         Session::push('search', [
    //             'city_search_box'=> $request->city_search_box,
    //             'category_box'=> $request->category_box,
    //             'word_box' => $request->word_box
    //         ]);
    //     }else{
    //         Session::forget('search','');
    //     }

        

    //     return  redirect()->route('web.categorie.searchCategory');
        
    // }
}


