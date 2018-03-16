<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Country;
use \App\Models\State;
use \App\Models\City;
use DB;

class LocationController extends Controller
{
    /**
     * Country
     */
    public function country()
    {
        return view('admin.panel.location.country.country');
    }
    public function countries(Request $request)
    {
           $specifications = dataTable(
                ['id','name','created_at', 'key'],
                'countries' ,
                'name',
                $request,
                $show= '', //route('posts.show',$category->id),
                $edit = '',// route('posts.edit',$category->id),
                $delete ='',
                $status =''
            );
            echo json_encode($specifications);  
    }
    public function store_country(Request $request)
    {
        DB::table('countries')->insert([
            'key'=> generateKey(8),
            'name' => $request->name,
            'country_code' => $request->country_code,
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]);
      echo " Country create Successfully";
    
    }
    /**
     * State
     */
    public function state()
    {
        $countries = Country::all(); 
        return view('admin.panel.location.state.state',compact('countries'));
    }
    public function states(Request $request)
    {
        $state = dataTable(
            ['id','name','created_at', 'key'],
            'states' ,
            'name',
            $request,
            $show= '', //route('posts.show',$category->id),
            $edit = '',// route('posts.edit',$category->id),
            $delete ='',
            $status =''
        );
        echo json_encode($state);  

    }
    public function store_state(Request $request)
    {
        $country = Country::where('key',$request->country_id)->first();
        DB::table('states')->insert([
            'key'=> generateKey(9),
            'name' => $request->name,
            'country_id' => $country->id,
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]);
      echo " State create Successfully";
    }
    /**
     * City
     */
    public function city()
    {
        $states = State::all(); 
        return view('admin.panel.location.city.city',compact('states'));
    }
    public function cities(Request $request)
    {
        $state = dataTable(
            ['id','name','created_at', 'key'],
            'cities' ,
            'name',
            $request,
            $show= '', //route('posts.show',$category->id),
            $edit = '',// route('posts.edit',$category->id),
            $delete ='',
            $status =''
        );
        echo json_encode($state);  
    }
    public function store_city(Request $request)
    {
        $state = State::where('key',$request->state_id)->first();
        DB::table('cities')->insert([
            'key'=> generateKey(10),
            'name' => $request->name,
            'state_id' => $state->id,
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]);
      echo " City create Successfully";
    
    }
}
