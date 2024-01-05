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
                ['id','image','name','title','created_at','key'],
                'categories' ,
                'title',
                $request,
                $show= '', 
                $edit = '',
                $delete ='admin.donationItem.category.delete',
                $status ='admin.donationItem.category.status'
            );
           // echo "<pre>";
           // print_r($categories);
           // exit();
            echo json_encode($categories);  
    }
    public function store_category(Request $request)
    {


        if ($request->hasFile('image')) {
            $extension = $request->image->getClientOriginalExtension();
            $fileName = date('ymdhis')."-".str_random(4).".".$extension;
            $folderpath  = base_path('/images/uploads/svg/');
            $request->image->move($folderpath , $fileName);
        }else{
            $fileName = '';
        }
        // echo "<pre>";
        // print_r( $request->all() );
        // exit();

        // $data = [
        //     'key'=> generateKey(3),
        //     'title' => $request->title,
        //     'name' => $request->name,
        //     'image' => $fileName,
        //     'created_at' => new \DateTime(),
        //     'updated_at' => new \DateTime()
        // ];
        // print_r();
        // exit();
        // $user_add_category = $_POST['user_add_category']; // static variable
// print_r($user_add_category);
// exit();
        if(isset($_POST['user_add_category']) && $_POST['user_add_category'] == '1')
        {
            $category_name = $_POST['category_name']; // Input name
            $key = generateKey(3);
            $insert_category =    DB::table('categories')->insertGetId([
                    'key'=> $key,
                    'title' => $category_name,
                    'name' => $category_name,
                    'image' => 'defult.svg',
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime()
                ]);
             
            return $key;
         
        }
        else
        {

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
           // $subcategorys = dataTable(
           //      ['id','image','name','created_at','key'],
           //      'subcategories' ,
           //      'name',  
                $subcategorys = dataTable(
                // ['id','category_id','name','created_at','key'],
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

        


        if(isset($_POST['user_add_subcategory']) && $_POST['user_add_subcategory'] == '1')
        {
            // $user_add_subcategory = $_POST['user_add_subcategory']; // static variable
            $subcategory_name = $_POST['subcategory_name']; // Input name
            $new_category_id = $_POST['new_category_id']; // Input name
            $key = generateKey(3);
            $category = Category::where('key',$_POST['new_category_id'])->first();
            DB::table('subcategories')->insert([
                'key'=>$key,
                'category_id'=> $category->id,
                'name' => $subcategory_name,
            // 'type' => $request->type,
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime()
            ]);
            return $key;
        }
        else
        {
            $category = Category::where('key',$request->id)->first();
            DB::table('subcategories')->insert([
                'key'=> generateKey(3),
                'category_id'=> $category->id,
                'name' => $request->name,
            // 'type' => $request->type,
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime()
            ]);
            echo "   Sub Category create Successfully";
        }
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
                // ['id','image','name','created_at','key'],
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

        
        // print_r($_POST);

        

        if(isset($_POST['user_add_specification']) && $_POST['user_add_specification'] == '1')
        {
        // $user_add_specification = $_POST['user_add_specification']; // static variable
        $new_subcategory_id = $_POST['new_subcategory_id']; // Input name
        $specification_name = $_POST['specification_name']; // Input name
           $Subcategory = Subcategory::where('key',$new_subcategory_id)->first();
           $key = generateKey(6);
           // dd($Subcategory);
           // die('Yes');
           DB::table('specifications')->insert([
            'key'=>$key,
            'subcategory_id'=>$Subcategory->id,
            'name' => $specification_name,
            'status' => 1,
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]); 
           return $key;
       }
       else
       {

        $Subcategory = Subcategory::where('key',$request->id)->first();
        DB::table('specifications')->insert([
            'key'=> generateKey(6),
            'subcategory_id'=>$Subcategory->id,
            'name' => $request->name,
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]); 
        echo "  Specification create Successfully";
    }
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
