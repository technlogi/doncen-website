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
            'result' => Category::where('status',1)->select('key','name')->get()
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
            'result' => Subcategory::where('status',1)->select('key','name')->get()
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
            'result' => Specification::where('status',1)->select('key','name')->get()
        ]);
    }
    /**
     * category To subcategory 
     */
    public function categoryTosubcategory(Request $request)
    {
        $category = Category::where('key',$request->key)->where('status',1)->first();
        return response()->json([
            'response' => 'success',
            'message' => "List of All Subcategories!",
            'result' => $category->subcategories
        ]);
    }  
    /**
     * subcategory To  Specification
     */
    public function subcategoryToSpecification(Request $request)
    {
        $subcategory = Subcategory::where('key',$request->key)->where('status',1)->first();
        return response()->json([
            'response' => 'success',
            'message' => "Specification of subcategory!",
            'result' => $subcategory->specifications
        ]);
    }
    /**
     * subcategory To Category
     */
    public function subcategoryToCategory(Request $request)
    {
        $subcategory = Subcategory::where('key',$request->key)->where('status',1)->first();
        return response()->json([
            'response' => 'success',
            'message' => "detail of category!",
            'result' => $subcategory->category
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
            'result' => $specifications->subcategory
        ]);
    }
}
