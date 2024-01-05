<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category,App\Models\Subcategory;


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
    public function getSpecification(Request $request)
    {
		$specifications_ids=array();
		if(isset($request->data2) && !empty($request->data2))
		{
			$specifications_ids = explode("&sp=", $request->data2);
			$specifications_ids[0] = substr($specifications_ids[0], 3);
		}
		//print_r($specifications_ids);
		
        $resutls = array();
        if(!empty($request->data)){
            $subCategory_ids = explode("&st=", $request->data);
            $subCategory_ids[0] = substr($subCategory_ids[0], 3);
            if(!empty($subCategory_ids)){
                foreach($subCategory_ids as $subcategory_id){
                    $subcategory =  Subcategory::where('id',$subcategory_id)->where('status',1)->first();
                    if(!empty($subcategory->specifications)){
                        foreach($subcategory->specifications as $specification){
                            if(!empty($specification)){
                                array_push($resutls,$specification);
                            }                          
                        }             
                    }
                }
            } 
        }
        $print = '<form method="post" id="specificationForm">';
        foreach($resutls as $result){
			if(in_array($result->id,$specifications_ids))
			{
				$cheked_status="checked";
			}else{
				$cheked_status="";
			}
			
            $print .= '<label class="checkbox-design"><input type="checkbox" name="sp" class="selectSpecifiction" value="'. $result->id.'" '.$cheked_status.'>'. $result->name .'<span class="checkmark"></span></label>';
        }
        $print .= '</form>';
        echo $print;
    }
}
