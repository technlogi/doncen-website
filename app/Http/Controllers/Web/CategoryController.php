<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use DB;

class CategoryController extends Controller
{
    public function donationCategory()
    {
        $categories = Category::all();
        return view('web.page.donation_category',compact('categories'));
    }

    public function searchCategory()
    {
        $categories = Category::where('status',1)->get();
        foreach($categories as $category){
          $count =  DB::select("SELECT  COUNT(donation_posts.id) as total_count                    
                                FROM categories                 
                                JOIN subcategories ON categories.id = subcategories.category_id                 
                                JOIN specifications ON subcategories.id = specifications.subcategory_id                 
                                JOIN donation_posts ON specifications.id = donation_posts.specification_id                 
                                WHERE donation_posts.status = 1  and categories.key ='$category->key' GROUP BY categories.key");
            if(!empty($count)){
                $category->total_post = $count[0]->total_count ;
            }else{
                $category->total_post = 0;
            }
        }
        $subcategories = \App\Models\Subcategory::where('status',1)->get();
        $specifications = \App\Models\Specification::where('status',1)->get();
        $donation_types = DB::table('donation_types')->where('status',1)->get();
        $user_types = DB::table('user_types')->where('status',1)->get();
        return view('web.page.search',compact('categories','subcategories','specifications','donation_types','user_types'));
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
        $print = '<form method="post" id="subCategoryForm">';
        foreach($resutls as $result){
            $print .= '<label for="blood"><input type="checkbox" name="st" class="selectSubCategory" value="'. $result->id.'">'. $result->name .'<span></span></label>';
        }
        $print .= '</form>';
        echo $print;
    }    
    public function donationCategorySearch(Request $request)
    {
       return  redirect()->route('web.categorie.searchCategory')->with('data',$request) ;
    }
    public function  categoryDetail(){
        
    }
}


