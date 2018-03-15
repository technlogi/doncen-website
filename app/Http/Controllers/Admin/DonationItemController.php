<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Category;
use \App\Models\Subcategory;
use \App\Models\Specification;


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
    public function create_category()
    {
       return view('admin.panel.donationItem.category.create');
    }


    /**
     *  SubCategory
    */
    public function subCategory()
    { 
       return view('admin.panel.donationItem.subCategory.sub_category');
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

    /**
     *  Specification 
    */
    public function specification()
    { 
       return view('admin.panel.donationItem.specification.specification');
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

}
