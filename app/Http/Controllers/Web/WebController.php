<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Models\Category;
use \App\Models\Subcategory;
use \App\Models\Specification;
use \App\Models\City;
use DB;
use \Auth;
class WebController extends Controller
{

    public function home()
    {
        $cities = City::where('status',1)->get();
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
        $specifications = Specification::where('status',1)->get();
        $titles = DB::table('donation_posts')->where('status',1)->select('title')->get();
        return view('web.page.home',compact('cities','specifications','titles','categories'));
    }
    public function donationDetails(Request $request)
    {
        if (Auth::guard('user')->check()){
            $user = Auth::guard('user')->user()->id;
        }else{
            session()->flash('error', 'You Must Login First For create Dontation.');
           return redirect('/user/login');
        }
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
        if (Auth::guard('user')->check()){
            $user = Auth::guard('user')->user()->id;
        }else{
            session()->flash('error', 'You Must Login First For create Dontation.');
           return redirect('/user/login');
        }

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
        
        $city = City::where('name','LIKE',$request->city)->first();
        $specification = Specification::where('key',$request->key)->first();
        DB::table('donation_posts')->insert([
            'key'=> generateKey(14),
            'post_no'=> generatePostNO(),
            'user_id' =>  $user	,
            'specification_id'=> $specification->id, 
            'user_type_id' => $request->donation,
            'title' => $request->title,
            'description'=> $request->description,
            'condition' => $request->condition,
            'city_id' =>$city->id ,
            'donation_type_id' => $request->donation_type,
            'donation_type_other' => $request->donation_type_other,
            'preference' =>$request->preference,                              //0-new | 1-anyone	
            'preference_gender' => implode(',',$request->preference_gender),              // 1-male | 2-female | 3-other	
            'preference_age' => implode(',',$request->preference_age),                   //1-0to14 | 2-14to30 | 3-30to60 | 4-above60	
            'preference_is_handicap'=> $request->preference_is_handicap,   // 0-no | 1-yes	
            'consideration' => $request->consideration,                   //0-free | 1-Non-Monetary | 2-Monetary	
            'consideration_detail'=> $request->consideration_detail,
            'is_urgent'=> $request->is_urgent ,                          // 0-no | 1-yes
            'urgent_reason'	=> $request->urgent_reason,
            'd_status' => $request->d_status ,//0-Individual | 1-Organization	
            'd_name'	=> $request->name ,
            'd_email'=> $request->email ,
            'd_contact'=> $request->mobile_no ,
            'd_address'=> $request->address ,
            'helper_status'=> $request->helper_status ,                                       // 0-Individual | 1-Organization	
            'helper_name'=> $request->helper_name ,
            'helper_email'=> $request->helper_email ,
            'helper_contact'=> $request->helper_contact ,
            'helper_address'	=> $request->helper_address, 
            'status' =>1 ,
            'created_at'=> new \DateTime(),
            'updated_at'=> new \DateTime()
      ]);
      session()->flash('success','Donation Ads Create Successfully.');
     return redirect('/user/dashboard');
    }

   
}
