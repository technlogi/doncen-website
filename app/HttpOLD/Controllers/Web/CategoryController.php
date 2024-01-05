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
        $categories = Category::all();
        return view('web.page.donation_category',compact('categories'));
    }

    public function searchCategory(Request $request)
    {
        if($request->has('_token')){
            Session::push('search', [
                'city_search_box'=> $request->city_search_box,
                'category_box'=> $request->category_box,
                'word_box' => $request->word_box
            ]);
        }else{
            Session::forget('search','');
        }
        $categories = Category::where('status',1)->orderBy('name','asc')->get();
        foreach($categories as $key => $category){
          $count =  DB::select("SELECT  COUNT(donation_posts.id) as total_count                    
                                FROM categories                 
                                JOIN subcategories ON categories.id = subcategories.category_id                 
                                JOIN specifications ON subcategories.id = specifications.subcategory_id                 
                                JOIN donation_posts ON specifications.id = donation_posts.specification_id                 
                                WHERE donation_posts.status = 1  and categories.key ='$category->key' GROUP BY categories.key") ;
            if(!empty($count)){
                $category->total_post = $count[0]->total_count ;
            }else{
                $category->total_post = 0;
            }
        }
        $subcategories = \App\Models\Subcategory::where('status',1)->get();
        $specifications = \App\Models\Specification::where('status',1)->get();
        $cities = \App\Models\City::where('status',1)->orderBy('name','asc')->get();
        $donation_types = DB::table('donation_types')->where('status',1)->get();
        $user_types = DB::table('user_types')->where('status',1)->get();
        // $count = $category->total_post;

        return view('web.page.search',compact('categories','subcategories','specifications','donation_types','user_types','cities'));
    }
   
    //for home search and get category
    public function getCategory(Request $request) {
        $query = $request->category;
        $categories = Category::where('name','LIKE','%'.$query.'%')->get();
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
		/* echo"<pre>"; print_r($request->data); echo"</pre>";
		echo"<pre>"; print_r($request->data2); echo"</pre>"; 
		echo"<pre>"; print_r($request->data3); echo"</pre>"; */
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
		$print = '<form method="post" id="subCategoryForm">';
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
				
				$print2 = '<form method="post" id="specificationForm">';
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
		
		
        
		echo json_encode(array($print, $print2));
		
		
		
		
    }    
    public function donationCategorySearch(Request $request)
    {
       return  redirect()->route('web.categorie.searchCategory')->with('data',$request) ;
    }
	
	public function categoryIdStoreInSession($key)
	{
		Session::forget('homePageCategoryId');
		Session::put('homePageCategoryId',$key);
	    return  redirect()->route('web.categorie.searchCategory');
		
	}
}


