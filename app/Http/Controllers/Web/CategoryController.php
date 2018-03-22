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
        return view('web.page.categories',compact('categories','subcategories','specifications','donation_types'));
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


  
}


