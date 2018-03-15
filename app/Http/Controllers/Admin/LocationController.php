<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Country;
use \App\Models\State;
use \App\Models\City;


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
    /**
     * State
     */
    public function state()
    {
        return view('admin.panel.location.state.state');
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

    /**
     * City
     */
    public function city()
    {
        return view('admin.panel.location.city.city');
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
}
