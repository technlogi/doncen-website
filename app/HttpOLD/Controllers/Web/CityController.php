<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{

    public function getCity(Request $request) {
        $query = $request->city;
        $cities=City::where('name','LIKE','%'.$query.'%')->get();
        $data=array();
        foreach ($cities as $city) {
                $data[]=array('value'=>$city->name.','.$city->state->name.','.$city->state->country->name );
        }
        if(count($data))
                return $data;
        else
            return ['value'=>'No Result Found'];
    }
}
