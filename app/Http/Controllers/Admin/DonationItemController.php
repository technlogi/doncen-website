<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Category;
use \App\Models\Subcategory;
use \App\Models\Specification;
use DB;

class DonationItemController extends Controller
{
    /**
     * Category
    */
    public function category()
    { 
        return view('admin.panel.donationItem.category.category');
    }
    public function categories(Request $request)
    {   
           $categories = dataTable(
                ['id','name','title','created_at','key'],
                'categories' ,
                'title',
                $request,
                $show= '', 
                $edit = '',
                $delete ='',
                $status =''
            );
            echo json_encode($categories);  
    }
    public function store_category(Request $request)
    {
        DB::table('categories')->insert([
            'key'=> generateKey(3),
            'title' => $request->title,
            'name' => $request->name,
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]);
        echo "  Category create Successfully";
    }


    /**
     *  SubCategory
    */
    public function subCategory()
    { 
        $categories =  Category::select('key','name')->get();
       return view('admin.panel.donationItem.subCategory.sub_category',compact('categories'));
    }
    public function subcategories(Request $request)
    { 
           $subcategorys = dataTable(
                ['id','name','type','created_at','key'],
                'subcategories' ,
                'name',
                $request,
                $show= '', //route('posts.show',$category->id),
                $edit = '',// route('posts.edit',$category->id),
                $delete ='',
                $status =''
            );
            echo json_encode($subcategorys);  
    }
    public function store_subcategories(Request $request)
    {
        $category = Category::where('key',$request->id)->first();
        DB::table('subcategories')->insert([
            'key'=> generateKey(3),
            'category_id'=> $request->id,
            'name' => $request->name,
            'type' => $request->type,
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]);
        echo "Sub Category create Successfully";
    }


    /**
     *  Specification 
    */
    public function specification()
    { 
        $subcategories =  Subcategory::select('key','name')->get();
       return view('admin.panel.donationItem.specification.specification',compact('subcategories'));
    }
    public function specifications(Request $request)
    { 
           $specifications = dataTable(
                [0 =>'id',1 =>'name',2=> 'type',3=> 'created_at',4=> 'key'],
                'specifications' ,
                'name',
                $request,
                $show= '', //route('posts.show',$category->id),
                $edit = '',// route('posts.edit',$category->id),
                $delete ='',
                $status =''
            );
            echo json_encode($specifications);  
    }

    public function store_specifications(Request $request)
    { 
        $Subcategory = Subcategory::where('key',$request->id)->first();
        DB::table('specifications')->insert([
            'key'=> generateKey(6),
            'subcategory_id'=> $Subcategory->id,
            'name' => $request->name,
            'type' => $request->type,
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]);
        echo "Specification create Successfully";
    }
}
