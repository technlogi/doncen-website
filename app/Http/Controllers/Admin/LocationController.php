<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Country;
use \App\Models\State;
use \App\Models\City;


class LocationController extends Controller
{
    
    public function country()
    {
        return view('admin.panel.location.country.country');
    }
    public function countries(Request $request)
    {
        $columns = array( 
            0 =>'id',
            1 =>'name',
            2=> 'created_at',
            3=> 'key',
        );

        $totalData = Country::count();

        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {            
            $categories = Country::offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
        }
        else {
        $search = $request->input('search.value'); 

        $categories =  Country::where('id','LIKE',"%{$search}%")
                    ->orWhere('name', 'LIKE',"%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

        $totalFiltered = Country::where('id','LIKE',"%{$search}%")
                    ->orWhere('name', 'LIKE',"%{$search}%")
                    ->count();
        }

        $data = array();
        if(!empty($categories))
        {
            $i=0;
        foreach ($categories as $category)
        {
            // $show =  route('posts.show',$category->id);
            // $edit =  route('posts.edit',$category->id);
            $nestedData['id'] = ++$i;
            $nestedData['name'] = $category->name;
            $nestedData['created_at'] = date('j M Y h:i a',strtotime($category->created_at));
            $nestedData['options'] = "&emsp;<a href='{}' title='SHOW' ><span class='glyphicon glyphicon-list'></span></a>
                                    &emsp;<a href='{}' title='EDIT' ><span class='glyphicon glyphicon-edit'></span></a>";
            $data[] = $nestedData;

            }
        }
        $json_data = array(
            "draw"            => intval($request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $data   
            );

        echo json_encode($json_data); 
    }

    public function state()
    {
        return view('admin.panel.location.state.state');
    }
    public function states(Request $request)
    {
        $columns = array( 
            0 =>'id',
            1 =>'name',
            2=> 'created_at',
            3=> 'key',
        );

        $totalData = State::count();

        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {            
            $states = State::offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
        }
        else {
        $search = $request->input('search.value'); 

        $states =  State::where('id','LIKE',"%{$search}%")
                    ->orWhere('name', 'LIKE',"%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

        $totalFiltered = State::where('id','LIKE',"%{$search}%")
                    ->orWhere('name', 'LIKE',"%{$search}%")
                    ->count();
        }

        $data = array();
        if(!empty($states))
        {
            $i=0;
        foreach ($states as $state)
        {
            // $show =  route('posts.show',$state->id);
            // $edit =  route('posts.edit',$state->id);
            $nestedData['id'] = ++$i;
            $nestedData['name'] = $state->name;
            $nestedData['created_at'] = date('j M Y h:i a',strtotime($state->created_at));
            $nestedData['options'] = "&emsp;<a href='{}' title='SHOW' ><span class='glyphicon glyphicon-list'></span></a>
                                    &emsp;<a href='{}' title='EDIT' ><span class='glyphicon glyphicon-edit'></span></a>";
            $data[] = $nestedData;

            }
        }
        $json_data = array(
            "draw"            => intval($request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $data   
            );

        echo json_encode($json_data); 

    }


    public function city()
    {
        return view('admin.panel.location.city.city');
    }
    public function cities(Request $request)
    {
        $columns = array( 
            0 =>'id',
            1 =>'name',
            2=> 'created_at',
            3=> 'key',
        );

        $totalData = City::count();

        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {            
            $cities = City::offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
        }
        else {
        $search = $request->input('search.value'); 

        $cities =  City::where('id','LIKE',"%{$search}%")
                    ->orWhere('name', 'LIKE',"%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

        $totalFiltered = City::where('id','LIKE',"%{$search}%")
                    ->orWhere('name', 'LIKE',"%{$search}%")
                    ->count();
        }

        $data = array();
        if(!empty($cities))
        {
            $i=0;
        foreach ($cities as $city)
        {
            // $show =  route('posts.show',$city->id);
            // $edit =  route('posts.edit',$city->id);
            $nestedData['id'] = ++$i;
            $nestedData['name'] = $city->name;
            $nestedData['created_at'] = date('j M Y h:i a',strtotime($city->created_at));
            $nestedData['options'] = "&emsp;<a href='{}' title='SHOW' ><span class='glyphicon glyphicon-list'></span></a>
                                    &emsp;<a href='{}' title='EDIT' ><span class='glyphicon glyphicon-edit'></span></a>";
            $data[] = $nestedData;

            }
        }
        $json_data = array(
            "draw"            => intval($request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $data   
            );

        echo json_encode($json_data); 

    }
}
