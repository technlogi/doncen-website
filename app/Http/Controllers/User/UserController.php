<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function addPost()
    {
        return view('web.add_post');
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
