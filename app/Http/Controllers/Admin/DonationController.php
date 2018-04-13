<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class DonationController extends Controller
{
    //view for donation to render first page
    public function donation()
    {
        $states =\App\Models\State::all(); 
        return view('admin.panel.donations.donation',compact('states'));
    }
    //get donations item by ajax
    public function donations(Request $request)
    {
        $donations = $this->dataTable(
            ['id','user','category','address','title','created_at','description','status', 'key'],
            'donation_posts' ,
            $request,
            $show= 'admin.donations.show', //route('posts.show',$category->id),
            $edit = '',                     // route('posts.edit',$category->id),
            $delete = 'admin.donations.delete',
            $status = 'admin.donations.status'
        );
        echo json_encode($donations);  
    }
    public function dataTable($column,$table_name,$request, $show , $edit , $delete , $status) {
        $totalData = DB::table($table_name)->count();

        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $column[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {            
            $donation_posts = DB::table($table_name)
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy('created_at','desc')
                    ->get();
        }
        else {
        $search = $request->input('search.value'); 
        $donation_posts =  DB::table($table_name)
                    ->join('users','users.id','=','donation_posts.user_id')
                    ->join('user_types','user_types.id','=','donation_posts.user_type_id')
                    ->join('specifications','specifications.id','=','donation_posts.specification_id')
                    ->join('subcategories','subcategories.id','=','specifications.subcategory_id')
                    ->join('categories','categories.id','=','subcategories.category_id')
                    ->orWhere('donation_posts.title', 'LIKE',"%{$search}%")
                    ->orWhere('description', 'LIKE',"%{$search}%")
                    ->orWhere('categories.name', 'LIKE',"%{$search}%")
                    ->orWhere('subcategories.name', 'LIKE',"%{$search}%")
                    ->orWhere('specifications.name', 'LIKE',"%{$search}%")
                    ->orWhere('donation_posts.address', 'LIKE',"%{$search}%")
                    ->orWhere('users.name', 'LIKE',"%{$search}%")
                    ->orWhere('user_types.name', 'LIKE',"%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    // ->orderBy($order,$dir)
                    ->orderBy('donation_posts.created_at','desc')
                    ->get();

        $totalFiltered = DB::table($table_name)
                    ->join('users','users.id','=','donation_posts.user_id')
                    ->join('user_types','user_types.id','=','donation_posts.user_type_id')
                    ->join('specifications','specifications.id','=','donation_posts.specification_id')
                    ->join('subcategories','subcategories.id','=','specifications.subcategory_id')
                    ->join('categories','categories.id','=','subcategories.category_id')
                    ->orWhere('donation_posts.title', 'LIKE',"%{$search}%")
                    ->orWhere('description', 'LIKE',"%{$search}%")
                    ->orWhere('categories.name', 'LIKE',"%{$search}%")
                    ->orWhere('subcategories.name', 'LIKE',"%{$search}%")
                    ->orWhere('specifications.name', 'LIKE',"%{$search}%")
                    ->orWhere('donation_posts.address', 'LIKE',"%{$search}%")
                    ->orWhere('users.name', 'LIKE',"%{$search}%")
                    ->orWhere('user_types.name', 'LIKE',"%{$search}%")
                    ->orWhere('description', 'LIKE',"%{$search}%")
                    ->count();
        }

        $data = array();
        if(!empty($donation_posts))
        {
            $i=0;
            foreach ($donation_posts as $donation_post)
            {
                $nestedData['id'] = ++$i;
                foreach($column as $field){
                    if($field == 'created_at'){
                        $nestedData['created_at'] = date('j M Y h:i a',strtotime($donation_post->created_at));
                    }else if($field == 'status'){
                        $nestedData['status'] = $donation_post->status ? 'Active' : 'Deactive';
                    }else if($field == 'user'){
                         $user = DB::table('users')->where('id',$donation_post->user_id)->first();
                         $user_type = DB::table('user_types')->where('id',$donation_post->user_type_id)->first();
                         $user_name = empty($user) ? '' : $user->name;
                         $nestedData['user'] = $user_name.' ('.$user_type->name.') ';
                    }else if($field == 'category'){
                        $specification = \App\Models\Specification::where('id',$donation_post->specification_id)->first();
                        $subcategory = $specification->subcategory;
                        $category = $subcategory->category; 
                        $nestedData['category'] = $specification->name.', '.$subcategory->name.', '.$category->name;
                    }else if($field == 'location'){
                        $nestedData['address'] = $donation_post->address;
                    }else{
                        $nestedData[$field] = $donation_post->$field;
                    }
                }
                $option = '';
                if($show != ''){
                    $show_link = route($show,$donation_post->key);
                    $option = "&emsp;<a href='{$show_link}' title='SHOW' ><span class='fa fa-eye'></span></a>";
                }
                if($edit != ''){
                    $edit_link = route($edit,$donation_post->key);
                    $option .= "&emsp;<a href='{$edit_link}' title='EDIT' ><span class='fa fa-edit'></span></a>";
                }
                if($delete != ''){
                    $delete_donation_link = route($delete,$donation_post->key);
                    $option .= "&emsp;<a href='{$delete_donation_link}' title='DELETE' ><span class='fa fa-trash'></span></a>";
                }
                if($status != ''){
                    $status_link = route($status,$donation_post->key);
                    if($donation_post->status){
                        $option .= "&emsp;<a href='{$status_link}' title='Change Status To Deactive' ><span class='fa fa-check'></span></a>";
                    }else{
                        $option .= "&emsp;<a href='{$status_link}' title='Change Status To Active' ><span class='fa fa-close'></span></a>";
                    }
                }
                $nestedData['options'] = $option ;
            $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw"            => intval($request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $data   
            );
        return $json_data;
       
    }
    //change donation status
    public function donationStatus($key)
    {
        if(DB::table('donation_posts')->where('key',$key)->count() > 0){
            $donation = DB::table('donation_posts')->where('key',$key)->first();
            DB::table('donation_posts')->where('key',$key)->
                                        update([
                                        'status' => !$donation->status 
                                        ]);
            return redirect()->back()->with('success','Status change successfully.');    
        }else{
            return redirect()->back()->with('error',"Donation post doen't exists at all.");    
        }                        
    }
    //delete donatation from donation table
    public function donationDelete($key)
    {
        if(DB::table('donation_posts')->where('key',$key)->count() > 0){
            DB::table('donation_posts')->where('key',$key)->delete();
            return redirect()->back()->with('success','Post deleted successfully.');    
        }else{
            return redirect()->back()->with('error',"Something went worng//.");    
        }                        
    }
    //
    public function donationShow($key)
    {
        if(DB::table('donation_posts')->where('key',$key)->count() > 0){
            $donation = DB::table('donation_posts')->where('key',$key)->first();
            $user = DB::table('users')->where('id',$donation->user_id)->first();
            $user_name = empty($user) ? '' : $user->name; 
            $user_type = DB::table('user_types')->where('id',$donation->user_type_id)->first();
            $specification = \App\Models\Specification::where('id',$donation->specification_id)->first();
            $donation_types =  DB::table('donation_types')->where('id',$donation->donation_type_id)->first();
            return view('admin.panel.donations.show',compact('donation','user_name','specification','user_type'));    
        }else{
            return redirect()->back()->with('error',"Something went worng.");    
        }            
    }
}
