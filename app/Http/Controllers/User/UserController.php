<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Models\Category;
use \App\Models\Subcategory;

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
            $var .= '<li><a class="subcategory" id="'. $subcategory->key.'" aria-controls="platelets" role="tab" data-toggle="tab">
                            '.$subcategory->name.'
                        </a>
                    </li>';
        }
        return $var.'</ul>' ;
    }
    public function getSpecification(Request $request)
    {
        $subcategory = Subcategory::where('key',$request->key)->first();
        $specifications = $subcategory->specifications;
        $var = ' <ul role="tablist">';
        foreach($specifications as $specification){
            $var .= '<li><a class="specification" id="'. $specification->key.'" aria-controls="platelets" role="tab" data-toggle="tab">
                            '.$specification->name.'
                        </a>
                    </li>';
        }
        return $var.'</ul>' ;
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
