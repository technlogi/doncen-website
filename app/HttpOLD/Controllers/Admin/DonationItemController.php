<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Category;
use \App\Models\Subcategory;
use \App\Models\Specification;
use DB;

class DonationItemController extends Controller
{
    /**
     * Category
    */
    public function category()
    { 
        return view('admin.panel.donationItem.category.category');
    }
    public function categories(Request $request)
    {   
           $categories = dataTable(
                ['id','name','title','created_at','key'],
                'categories' ,
                'title',
                $request,
                $show= '', 
                $edit = '',
                $delete ='admin.donationItem.category.delete',
                $status ='admin.donationItem.category.status'
            );
            echo json_encode($categories);  
    }
    public function store_category(Request $request)
    {
        // if ($request->hasFile('image')) {
        //     $extension = $request->image->getClientOriginalExtension();
        //     $fileName = date('ymdhis')."-".str_random(4).".".$extension;
        //     $folderpath  = base_path('images/uploads/svg/');
        //     $request->image->move($folderpath , $fileName);
        // }else{
        //     $fileName = '';
        // }
        // print_r( $request->all() );
            
        DB::table('categories')->insert([
            'key'=> generateKey(3),
            'title' => $request->title,
            'name' => $request->name,
            'image' => $fileName,
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]);
        echo "  Category create Successfully";
    }
    //change city status
    public function status_category($key)
    {
        if(DB::table('categories')->where('key',$key)->count() > 0){
            $country = DB::table('categories')->where('key',$key)->first();
            DB::table('categories')->where('key',$key)->
                                        update([
                                        'status' => !$country->status 
                                        ]);
            return redirect()->back()->with('success','Status change successfully.');    
        }else{
            return redirect()->back()->with('error',"Something is worng.");    
        }                        
    }
    //delete donatation from donation table
    public function delete_category($key)
    {
        if(DB::table('categories')->where('key',$key)->count() > 0){
            DB::table('categories')->where('key',$key)->delete();
            return redirect()->back()->with('success','Country removed successfully.');    
        }else{
            return redirect()->back()->with('error',"Something went worng.");    
        }                        
    }

    /**
     *  SubCategory
    */
    public function subCategory()
    { 
        $categories =  Category::select('key','name')->get();
       return view('admin.panel.donationItem.subCategory.sub_category',compact('categories'));
    }
    public function subcategories(Request $request)
    { 
           $subcategorys = dataTable(
                ['id','name','created_at','key'],
                'subcategories' ,
                'name',
                $request,
                $show= '', //route('posts.show',$category->id),
                $edit = '',// route('posts.edit',$category->id),
                $delete ='admin.donationItem.subCategory.delete',
                $status ='admin.donationItem.subCategory.status'
            );
            echo json_encode($subcategorys);  
    }
    public function store_subcategories(Request $request)
    {
        $category = Category::where('key',$request->id)->first();
        DB::table('subcategories')->insert([
            'key'=> generateKey(3),
            'category_id'=> $category->id,
            'name' => $request->name,
            'type' => $request->type,
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]);
        echo "   Sub Category create Successfully";
    }
    //change city status
    public function status_subcategory($key)
    {
        if(DB::table('subcategories')->where('key',$key)->count() > 0){
            $country = DB::table('subcategories')->where('key',$key)->first();
            DB::table('subcategories')->where('key',$key)->
                                        update([
                                        'status' => !$country->status 
                                        ]);
            return redirect()->back()->with('success','Status change successfully.');    
        }else{
            return redirect()->back()->with('error',"Something is worng.");    
        }                        
    }
    //delete donatation from donation table
    public function delete_subcategory($key)
    {
        if(DB::table('subcategories')->where('key',$key)->count() > 0){
            DB::table('subcategories')->where('key',$key)->delete();
            return redirect()->back()->with('success','Sub Categories removed successfully.');    
        }else{
            return redirect()->back()->with('error',"Something went worng.");    
        }                        
    }



    /**
     *  Specification 
    */
    public function specification()
    { 
        $subcategories =  Subcategory::select('key','name')->get();
       return view('admin.panel.donationItem.specification.specification',compact('subcategories'));
    }
    public function specifications(Request $request)
    { 
           $specifications = dataTable(
                ['id','name','created_at','key'],
                'specifications' ,
                'name',
                $request,
                $show= '', //route('posts.show',$category->id),
                $edit = '',// route('posts.edit',$category->id),
                $delete ='admin.donationItem.specification.delete',
                $status ='admin.donationItem.specification.status'
            );
            echo json_encode($specifications);  
    }

    public function store_specifications(Request $request)
    { 
        $Subcategory = Subcategory::where('key',$request->id)->first();
        DB::table('specifications')->insert([
            'key'=> generateKey(6),
            'subcategory_id'=> $Subcategory->id,
            'name' => $request->name,
            'type' => $request->type,
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]);
        echo "  Specification create Successfully";
    }
    //change city status
    public function status_specifications($key)
    {
        if(DB::table('specifications')->where('key',$key)->count() > 0){
            $country = DB::table('specifications')->where('key',$key)->first();
            DB::table('specifications')->where('key',$key)->
                                        update([
                                        'status' => !$country->status 
                                        ]);
            return redirect()->back()->with('success','Status change successfully.');    
        }else{
            return redirect()->back()->with('error',"Something is worng.");    
        }                        
    }
    //delete donatation from donation table
    public function delete_specifications($key)
    {
        if(DB::table('specifications')->where('key',$key)->count() > 0){
            DB::table('specifications')->where('key',$key)->delete();
            return redirect()->back()->with('success','Sub Categories removed successfully.');    
        }else{
            return redirect()->back()->with('error',"Something went worng.");    
        }                        
    }

}
