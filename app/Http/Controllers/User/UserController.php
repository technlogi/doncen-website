<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Models\Category;
use \App\Models\Subcategory;
use \App\Models\Specification;
use DB;

class UserController extends Controller
{
    public function addPost()
    {
        $categories = Category::all();
        return view('web.add_post',compact('categories'));
    }
  
    public function getSubcategory(Request $request)
    {
        $category = Category::where('key',$request->key)->first();
        $subcategories = $category->subcategories;
        $var = ' <ul role="tablist">';
        foreach($subcategories as $subcategory){
            $var .= '<a class="subcategory" id="'. $subcategory->key.'" aria-controls="platelets" role="tab" data-toggle="tab"><li>
                            '.$subcategory->name.'
                    </li></a>';
        }
        return $var.'</ul>' ;
    }
    public function getSpecification(Request $request)
    {
        $subcategory = Subcategory::where('key',$request->key)->first();
        $specifications = $subcategory->specifications;
        $var = ' <ul role="tablist">';
        foreach($specifications as $specification){
            $var .= '<a class="specification" id="'. $specification->key.'" aria-controls="platelets" role="tab" data-toggle="tab"><li>
                            '.$specification->name.'
                    </li></a>';
        }
        return $var.'</ul>' ;
    }


    public function postDetails(Request $request)
    {
        $specification = Specification::where('key',$request->specification)->first();
        $subcategory = $specification->subcategory;
        $category = $subcategory->category;
        $user_types = DB::table('user_types')->select('name','key')->where('status',1)->get();
        return view('web.adPostDetails',compact('specification','subcategory','category','user_types'));
    }






























    public function aboutUs()
    {
        return view('web.aboutUs');
    }
    public function home()
    {
        return view('web.home');
    }
    public function categories()
    {
        return view('web.categories');
    }
    public function details()
    {
        return view('web.details');
    }
    public function faq()
    {
        return view('web.faq');
    } 
    public function favourite_ads()
    {
        return view('web.favourite_ads');
    } 
    public function myProfile()
    {
        return view('web.myProfile');
    } 
    public function published()
    {
        return view('web.published');
    }
    public function deleteAccount()
    {
        return view('web.deleteAccount');
    } 
    public function adPostDetails()
    {
        return view('web.adPostDetails');
    } 
    
}
