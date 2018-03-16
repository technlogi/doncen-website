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
        
        return redirect()->route('web.donation.DetailForm',$request->specification);
    }
    public function donationDetailForm($key)
    {
        $specification = Specification::where('key',$key)->first();
        $subcategory = $specification->subcategory;
        $category = $subcategory->category;
        $user_types = DB::table('user_types')->select('name','key')->where('status',1)->get();
        return view('web.page.donation_detail',compact('specification','subcategory','category','user_types','key'));
    }
    public function store_donation_detail(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'donation' => 'required',
            'donation_type' => 'required',
            'preference_gender' =>'required',
            'preference_age' =>'required',
            'condition' =>'required',
            'title' =>'required',
            'description' => 'required',
            'city' => 'required',
            'name' =>'required',
            'email' => 'required|email',
            'mobile_no' => 'required|min:9',
            'address' => 'required|min:5',
            'helper_email' => 'nullable|email',
            'helper_mobile_no' => 'nullable|min:8',
            'helper_address'=> 'nullable|min:5'
            
        ]);
    }

   
}
