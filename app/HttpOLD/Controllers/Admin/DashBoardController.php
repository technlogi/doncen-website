<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use \App\Models\User;
use DB;
use \Carbon;
class DashBoardController extends Controller
{
    public function dashboard()
    {
        $users[] = Auth::user();
        $users[] = Auth::guard()->user();
        $users[] = Auth::guard('admin')->user();

        $top_users       = $this->users();
        $urgents         = $this->urgent();
        $lives           = $this->live();
        
        $categories      = $this->categories(); 
        $subcategories   = $this->subCategories(); 
        $specifications  = $this->specifications();

        $countries       = $this->countries();
        $states          = $this->states();
        $cities          = $this->cities(); 
        


        $total_user = User::count();
        $total_specification = DB::table('specifications')->where('status',1)->count();
        $total_category      = DB::table('categories')->where('status',1)->count();
        $total_subcategory   = DB::table('subcategories')->where('status',1)->count();
        $total_post = DB::table('donation_posts')->count();
        $total_urgent = DB::table('donation_posts')->where('status',1)->where('is_urgent',1)->count();
        $total_live   = DB::table('donation_posts')->where('status',1)->where('is_urgent',0)->count();
        

        $query  = DB::table('donation_posts')
                    ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as total'))
                    ->where('status',1)
                    ->groupBy('date')
                    ->orderBy('total', 'desc');

         if(!empty($query) && $query->first()){
	        $max =  $query->first()->total; 
         }else{
         	  $max = 0;
         }
        
        $total  = ceil( $max / 100)*100;
       
        $dates = DB::select(' SELECT DATE(created_at) as date,count(*) as total 
                             FROM donation_posts t 
                             WHERE created_at >= DATE_ADD(CURDATE(), INTERVAL - 12 DAY) and status = 1
                             GROUP BY date
                             order by date ASC');
        $labels = array();
        $data = array(); 
        foreach($dates as $date){
            array_push($labels, date('d F', strtotime($date->date)) );
            array_push($data,  $date->total );
        }
        $users_lists = User::all();
        $user_status = array(
                    '0' => User::where('status',1)->where('is_verify',1)->count(),
                    '1' => User::where('status',0)->where('is_verify',1)->count(),
                    '2' => User::where('is_verify',0)->count()
                    );
                return view('admin.home',compact('total_user',
                                         'specifications',
                                         'subcategories',
                                         'categories',
                                         'top_users','urgents','total_post',
                                         'total_specification',
                                         'total_category',
                                         'total_subcategory',
                                         'countries',
                                         'states',
                                         'cities',
                                         'lives',
                                         'total_live',
                                         'total_urgent',
                                         'total',
                                         'labels','data',
                                         'user_status'
                                        ));
    }

    public function specifications()
    {
        $specifications = DB::table('donation_posts')
                        ->select('specification_id',DB::raw('count(specification_id) as count'))
                        ->where('status',1)
                        ->groupBy('specification_id')
                        ->orderBy(DB::raw('count(specification_id)'),'desc')
                        ->limit(5)
                        ->get();
        $array = array();
       
        foreach($specifications as $specification){
            $s = DB::table('specifications')->where('status',1)->where('id',$specification->specification_id)->first();
            if(!empty($s)){
               array_push($array , ['name'=> $s->name,'count'=>$specification->count]);
            }    
        }
        return $array;                    
    }
    
    public function users()
    {
        $users = DB::table('donation_posts')
                    ->select('user_id',DB::raw('count(user_id) as count'))
                    ->where('status',1)
                    ->groupBy('user_id')
                    ->orderBy(DB::raw('count(user_id)'),'desc')
                    ->limit(5)
                    ->get();
        $array = array();
        foreach($users as $user){
        $s = User::where('id',$user->user_id)->first();
            if(!empty($s)){
               array_push($array , ['name'=> $s->name, 'count'=>$user->count]);
            }    
        }
        return $array;  
    }
    
    public function urgent()
    {
        $urgents = DB::table('donation_posts')
                    ->select('created_at','post_no','specification_id','city_id','user_id')
                    ->where('status',1)
                    ->where('is_urgent',1)
                    ->limit(7)
                    ->get();
        $array =  array();
        foreach($urgents as $urgent){
            $user =  User::where('id',$urgent->user_id)->first();
            $specification = \App\Models\Specification::where('id',$urgent->specification_id)->first();
            $subcategory   = $specification->subcategory;
            $category      = $subcategory->category;
            $city = \App\Models\City::where('id',$urgent->city_id)->first();
            $state = $city->state;
            $country  = $state->country;
            array_push($array, array('datetime' => date('j M Y h:i a',strtotime($urgent->created_at)),
                                     'post_no' => $urgent->post_no,
                                     'image' =>    $category->image,
                                     'category' => $category->name.'->'.$subcategory->name.'->'.$specification->name,
                                     'location' => $city->name.', '.$state->name.', '.$country->name,
                                     'person' => $user->name,
                                     'contact' => $user->contact
            ));
        }
        return $array;
    }
    public function live()
    {
        $urgents = DB::table('donation_posts')
                    ->select('created_at','post_no','specification_id','city_id','user_id')
                    ->where('status',1)
                    ->where('is_urgent',0)
                    ->limit(7)
                    ->get();
        $array =  array();
        foreach($urgents as $urgent){
            $user =  User::where('id',$urgent->user_id)->first();
            $specification = \App\Models\Specification::where('id',$urgent->specification_id)->first();
            $subcategory   = $specification->subcategory;
            $category      = $subcategory->category;
            $city = \App\Models\city::where('id',$urgent->city_id)->first();
            $state = $city->state;
            $country  = $state->country;
            array_push($array, array('datetime' => date('j M Y h:i a',strtotime($urgent->created_at)),
                                     'post_no' => $urgent->post_no,
                                     'image' =>    $category->image,
                                     'category' => $category->name.'->'.$subcategory->name.'->'.$specification->name,
                                     'location' => $city->name.', '.$state->name.', '.$country->name,
                                     'person' => $user->name,
                                     'contact' => $user->contact
            ));
        }
        return $array;
    }
    public function cities()
    {
        $cities = DB::table('donation_posts')
                    ->select('city_id',DB::raw('count(city_id) as count'))
                    ->where('status',1)
                    ->groupBy('city_id')
                    ->orderBy(DB::raw('count(city_id)'),'desc')
                    ->limit(5)
                    ->get();
        $array = array();
        foreach($cities as $city){
            $s = DB::table('cities')->where('status',1)->where('id',$city->city_id)->first();
            if(!empty($s)){
                array_push($array , ['name'=> $s->name,'count'=>$city->count]);
            }    
        }
        return $array;                 
    }
    public function states()
    {
      $states =   DB::select("SELECT COUNT(*) as count,states.name 
                                    FROM states
                                    JOIN cities on cities.state_id = states.id 
                                    JOIN donation_posts on donation_posts.city_id = cities.id 
                                    GROUP BY states.name
                                    LIMIT 5");
     return $states;
    }
    public function countries()
    {
        $countries =   DB::select("SELECT COUNT(*) as count,countries.name 
                                  FROM countries
                                  JOIN states  on  states.country_id = countries.id
                                  JOIN cities  on  cities.state_id = states.id 
                                  JOIN donation_posts on donation_posts.city_id = cities.id 
                                  GROUP BY countries.name 
                                  LIMIT 5
                               ");
        return $countries;

    }

    public function categories()
    {
        $category =   DB::select("SELECT COUNT(*) as count,categories.name 
                                 FROM categories
                                 JOIN subcategories  on  subcategories.category_id = categories.id
                                 JOIN specifications on subcategories.id = specifications.subcategory_id 
                                 JOIN donation_posts on donation_posts.specification_id = specifications.id 
                                 GROUP BY categories.name 
                                 LIMIT 5
                                ");
        return $category;
    }
    public function subCategories()
    {
      $subcategory =   DB::select("SELECT COUNT(*) as count,subcategories.name 
                                    FROM subcategories
                                    JOIN specifications on subcategories.id = specifications.subcategory_id 
                                    JOIN donation_posts on donation_posts.specification_id = specifications.id 
                                    GROUP BY subcategories.name
                                    LIMIT 5");
     return $subcategory;
    }
}
