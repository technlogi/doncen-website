<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Category;
use \App\Models\Subcategory;
use \App\Models\Specification;


class DonationItemController extends Controller
{
    /**
     *  Country Section 
    */
    public function category()
    { 
       return view('admin.panel.donationItem.category.category');
    }
    public function categories(Request $request)
    {   
        $show= ''; //route('posts.show',$category->id);
        $edit = '';// route('posts.edit',$category->id);
           $categories = dataTable(
                [0 =>'id',1 =>'name',2=> 'title',3=> 'created_at',4=> 'key'],
                'categories' ,
                'title',
                $request,
                $show ,
                $edit
            );
            echo json_encode($categories);  
    }



    /**
     *  State Section 
    */
    public function subCategory()
    { 
       return view('admin.panel.donationItem.subCategory.sub_category');
    }
    public function subcategories(Request $request)
    { 
         
                $columns = array( 
                    0 =>'id',
                    1 =>'name',
                    2=> 'type',
                    3=> 'created_at',
                    4=> 'key',
                );

                $totalData = Subcategory::count();

                $totalFiltered = $totalData; 

                $limit = $request->input('length');
                $start = $request->input('start');
                $order = $columns[$request->input('order.0.column')];
                $dir = $request->input('order.0.dir');

                if(empty($request->input('search.value')))
                {            
                    $categories = Subcategory::offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
                }
                else {
                $search = $request->input('search.value'); 

                $categories =  Subcategory::where('id','LIKE',"%{$search}%")
                            ->orWhere('name', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

                $totalFiltered = Subcategory::where('id','LIKE',"%{$search}%")
                            ->orWhere('name', 'LIKE',"%{$search}%")
                            ->count();
                }

                $data = array();
                if(!empty($categories))
                {
                    $i=0;
                foreach ($categories as $category)
                {
                    // $show =  route('posts.show',$category->id);
                    // $edit =  route('posts.edit',$category->id);
                    $nestedData['id'] = ++$i;
                    $nestedData['name'] = $category->name;
                    $nestedData['type'] = $category->type;
                    $nestedData['created_at'] = date('j M Y h:i a',strtotime($category->created_at));
                    $nestedData['options'] = "&emsp;<a href='{}' title='SHOW' ><span class='glyphicon glyphicon-list'></span></a>
                                            &emsp;<a href='{}' title='EDIT' ><span class='glyphicon glyphicon-edit'></span></a>";
                    $data[] = $nestedData;

                    }
                }
                $json_data = array(
                    "draw"            => intval($request->input('draw')),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered), 
                    "data"            => $data   
                    );

                echo json_encode($json_data); 

    }

    /**
     *  city Section 
    */
    public function specification()
    { 
       return view('admin.panel.donationItem.specification.specification');
    }
    public function specifications(Request $request)
    { 
         
                $columns = array( 
                    0 =>'id',
                    1 =>'name',
                    2=> 'type',
                    3=> 'created_at',
                    4=> 'key',
                );

                $totalData = Specification::count();

                $totalFiltered = $totalData; 

                $limit = $request->input('length');
                $start = $request->input('start');
                $order = $columns[$request->input('order.0.column')];
                $dir = $request->input('order.0.dir');

                if(empty($request->input('search.value')))
                {            
                    $categories = Specification::offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
                }
                else {
                $search = $request->input('search.value'); 

                $categories =  Specification::where('id','LIKE',"%{$search}%")
                            ->orWhere('name', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

                $totalFiltered = Specification::where('id','LIKE',"%{$search}%")
                            ->orWhere('name', 'LIKE',"%{$search}%")
                            ->count();
                }

                $data = array();
                if(!empty($categories))
                {
                    $i=0;
                foreach ($categories as $category)
                {
                    // $show =  route('posts.show',$category->id);
                    // $edit =  route('posts.edit',$category->id);
                    $nestedData['id'] = ++$i;
                    $nestedData['name'] = $category->name;
                    $nestedData['type'] = $category->type;
                    $nestedData['created_at'] = date('j M Y h:i a',strtotime($category->created_at));
                    $nestedData['options'] = "&emsp;<a href='{}' title='SHOW' ><span class='glyphicon glyphicon-list'></span></a>
                                            &emsp;<a href='{}' title='EDIT' ><span class='glyphicon glyphicon-edit'></span></a>";
                    $data[] = $nestedData;

                    }
                }
                $json_data = array(
                    "draw"            => intval($request->input('draw')),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered), 
                    "data"            => $data   
                    );

                echo json_encode($json_data); 

    }

}
