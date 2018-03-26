<?php

namespace App\Http\Controllers\Web;

use App\Specification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Models\Subcategory;

class SpecificationController extends Controller
{
    public function getSpecification(Request $request)
    {
        $subcategory = Subcategory::where('key',$request->key)->first();
        $specifications = $subcategory->specifications;
        $var = ' <ul role="tablist">';
        foreach($specifications as $specification){
            $var .= '<a class="specification" id="'. $specification->key.'" aria-controls="platelets" role="tab" data-toggle="tab"><li>
                            '.$specification->name.'
                    </li></a>';
        }
        return $var.'</ul>' ;
    }

    

}
