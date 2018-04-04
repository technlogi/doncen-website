<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Models\Category,\App\Models\Subcategory,\App\Models\Specification;
class ApiController extends Controller
{
   /**
    * List of all category
     */
    public function  category()
    {
        return response()->json([
            'response' => 'success',
            'message' => "List of All Categories!",
            'result' => Category::where('status',1)->select('key as category_key','name','image')->get()
        ]);
    }
   /**
    * List of all subCategory
     */
    public function  subCategory()
    {
        return response()->json([
            'response' => 'success',
            'message' => "List of All Categories!",
            'result' => Subcategory::where('status',1)->select('key as subcategory_key','name')->get()
        ]);
    }
   /**
    * List of all specification 
     */
    public function  specification()
    {
        return response()->json([
            'response' => 'success',
            'message' => "List of All Categories!",
            'result' => Specification::where('status',1)->select('key as specification_key','name')->get()
        ]);
    }
    /**
     * category To subcategory 
     */
    public function categoryTosubcategory(Request $request)
    {
        $category = Category::where('key',$request->category_key)->where('status',1)->first();
        $results = array();
        foreach($category->subcategories as $subCategory)
        {
            $sub = array('subcategory_key'=> $subCategory->key,'name' =>$subCategory->name);
            array_push($results,$sub);
        }
        return response()->json([
            'response' => 'success',
            'message' => "List of All Subcategories!",
            'result' => $results
        ]);
    }  
    /**
     * subcategory To  Specification
     */
    public function subcategoryToSpecification(Request $request)
    {
        $subcategory = Subcategory::where('key',$request->subcategory_key)->where('status',1)->first();
        $results = array();
        foreach($subcategory->specifications as $specification)
        {
            $specific = array('specification_key'=> $specification->key,'name' =>$specification->name);
            array_push($results,$specific);
        }
        return response()->json([
            'response' => 'success',
            'message' => "Specification of subcategory!",
            'result' => $results
        ]);
    }
    /**
     * subcategory To Category
     */
    public function subcategoryToCategory(Request $request)
    {
        $subcategory = Subcategory::where('key',$request->subcategory_key)->where('status',1)->first();
        return response()->json([
            'response' => 'success',
            'message' => "detail of category!",
            'result' => array('category_key'=>$subcategory->category->key ,'name'=>$subcategory->category->name)
        ]);
    }  
    /**
     * specification To Subcategory
     */
    public function specificationToSubcategory(Request $request)
    {
        $specifications = Specification::where('key',$request->key)->where('status',1)->first();
        return response()->json([
            'response' => 'success',
            'message' => "detail of subcategory!",
            'result' => array('subcategory_key'=>$specifications->subcategory->key,'name' => $specifications->subcategory->name)
        ]);
    }

 
}
