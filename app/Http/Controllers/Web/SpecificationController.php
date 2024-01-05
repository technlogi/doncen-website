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
        $specifications = $subcategory->specifications->where('status', 1);
        $var = ' 
        <div class="section tab-content next-stap post-option">
                                <h4 class="hidden-xs" >Select a specification</h4>
                                <div role="tabpanel" class="">
                                </div>

        <ul role="tablist" class="new_added_specification" style="list-style: square;">';
        foreach($specifications as $specification){
            $var .= '<a class="specification" id="'. $specification->key.'" aria-controls="platelets" role="tab" data-toggle="tab"><li>
                            '.$specification->name.'
                    </li></a>';
        } 
        // $var.='<li class="other_specification_btn"> Other
                       
        //         </li>
        //         <span class="other_specification_input" style="display: none">
        //             <input type="hidden" name="user_add_specification" value="1"> 
        //             <input type="text" name="other_specification_new" autocomplete="off" placeholder="Add new specification">
        //             <input type="submit" class="add_specification btn-main" name="submit" value="Add">
        //          </span>
        //             ' ;

        return $var.'</ul>

        <div class="btn-section button_section" id="button_section">
                                    
                                    <form method="POST"  action="'.route("web.categorie.donationDetails") .'"> 
                                         '.csrf_field().'
                                        <input type="hidden" name="specification" id="specification_field" class="specification_field"  />
                                        <!-- <button type="text" class="btn"><a href="'. route('web.home') .'" >Cancel</a></button> -->
                                        <button type="submit" class="btn">Proceed</button>
                                    </form>   
                                </div>
                            </div>
        ' ;
    }

    

}
