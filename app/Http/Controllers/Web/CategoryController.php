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

    public function categories()
    {
        $donation_posts = DB::table('donation_posts')->where('status',1)->get();
        foreach($donation_posts as $donation_post){
           if(DB::table('donation_images')->where('donation_post_id',$donation_post->id)->count() > 0){
            $image = DB::table('donation_images')->where('donation_post_id',$donation_post->id)->first();
            array_add((array)$donation_post ,'image_url',$image->image);
           }else{
            array_add((array)$donation_post ,'image_url',$image->image);
           }
        }
        return view('web.page.categories');
    }
}
