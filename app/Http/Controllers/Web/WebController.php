<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Models\Category;
use \App\Models\Subcategory;
use \App\Models\Specification;
use DB;

class WebController extends Controller
{

    public function home()
    {
        return view('web.page.home');
    }
  
   
  

    public function donationDetails(Request $request)
    {
        $specification = Specification::where('key',$request->specification)->first();
        $subcategory = $specification->subcategory;
        $category = $subcategory->category;
        $user_types = DB::table('user_types')->select('name','key')->where('status',1)->get();
        return view('web.page.donation_detail',compact('specification','subcategory','category','user_types'));
    }


   
}
