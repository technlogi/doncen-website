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
  






























    public function aboutUs()
    {
        return view('web.aboutUs');
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
   
    
}
