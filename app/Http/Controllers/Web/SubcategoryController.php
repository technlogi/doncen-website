<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class SubcategoryController extends Controller
{
    public function getSubcategory(Request $request)
    {
        $category = Category::where('key',$request->key)->first();
        $subcategories = $category->subcategories;
        $var = ' <ul role="tablist">';
        foreach($subcategories as $subcategory){
            $var .= '<a class="subcategory" id="'. $subcategory->key.'" aria-controls="platelets" role="tab" data-toggle="tab"><li>
                            '.$subcategory->name.'
                    </li></a>';
        }
        return $var.'</ul>' ;
    }
}
