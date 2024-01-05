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
                $delete ='admin.Location.country.delete',
                $status ='admin.Location.country.status'
            );
            echo json_encode($specifications);  
    }
    public function store_country(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // exit();
        DB::table('countries')->insert([
            'key'=> generateKey(8),
            'name' => $request->name,
            'country_code' => $request->country_code,
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]);
      echo " Country create Successfully";
    
    }
    //change city status
    public function status_country($key)
    {
        if(DB::table('countries')->where('key',$key)->count() > 0){
            $country = DB::table('countries')->where('key',$key)->first();
            DB::table('countries')->where('key',$key)->
                                        update([
                                        'status' => !$country->status 
                                        ]);
            return redirect()->back()->with('success','Status change successfully.');    
        }else{
            return redirect()->back()->with('error',"Something is worng.");    
        }                        
    }
    //delete donatation from donation table
    public function delete_country($key)
    {
        if(DB::table('countries')->where('key',$key)->count() > 0){
            DB::table('countries')->where('key',$key)->delete();
            return redirect()->back()->with('success','Country removed successfully.');    
        }else{
            return redirect()->back()->with('error',"Something went worng.");    
        }                        
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
            ['id','name','country_name','created_at', 'key'],
            'states' ,
            'name',
            $request,
            $show= '', //route('posts.show',$category->id),
            $edit = '',// route('posts.edit',$category->id),
            $delete ='admin.Location.state.delete',
            $status ='admin.Location.state.status'
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
    //change city status
    public function status_state($key)
    {
        if(DB::table('states')->where('key',$key)->count() > 0){
            $city = DB::table('states')->where('key',$key)->first();
            DB::table('states')->where('key',$key)->
                                        update([
                                        'status' => !$city->status 
                                        ]);
            return redirect()->back()->with('success','Status change successfully.');    
        }else{
            return redirect()->back()->with('error',"Something is worng.");    
        }                        
    }
    //delete donatation from donation table
    public function delete_state($key)
    {
        if(DB::table('states')->where('key',$key)->count() > 0){
            DB::table('states')->where('key',$key)->delete();
            return redirect()->back()->with('success','State removed successfully.');    
        }else{
            return redirect()->back()->with('error',"Something went worng.");    
        }                        
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
            ['id','name','state_name','created_at', 'key'],
            'cities' ,
            'name',
            $request,
            $show= '', //route('posts.show',$category->id),
            $edit = '',// route('posts.edit',$category->id),
            $delete ='admin.Location.city.delete',
            $status ='admin.Location.city.status'
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

     //change city status
     public function status_city($key)
     {
         if(DB::table('cities')->where('key',$key)->count() > 0){
             $city = DB::table('cities')->where('key',$key)->first();
             DB::table('cities')->where('key',$key)->
                                         update([
                                         'status' => !$city->status 
                                         ]);
             return redirect()->back()->with('success','Status change successfully.');    
         }else{
             return redirect()->back()->with('error',"Something is worng.");    
         }                        
     }
     //delete donatation from donation table
     public function delete_city($key)
     {
         if(DB::table('cities')->where('key',$key)->count() > 0){
             DB::table('cities')->where('key',$key)->delete();
             return redirect()->back()->with('success','City removed successfully.');    
         }else{
             return redirect()->back()->with('error',"Something went worng.");    
         }                        
     }
}
