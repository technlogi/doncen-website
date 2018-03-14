<?php

if (! function_exists('generateKey')) {
    function generateKey($table_id) {
        $alpha_key = '';
        $keys = range('a', 'z');
        $numeric = range(0, 9);

        for ($i = 0; $i <= 20; $i++) {
            if(rand(0,1)){
                $alpha_key .= $keys[array_rand($keys)] ;
            }else{
                $alpha_key .= $numeric[array_rand($numeric)] ;
            }
        }
        return $alpha_key . $table_id;
    }
    
}




if (! function_exists('dataTable')) {
    function dataTable($column,$table_name,$search_by,$request, $show ,$edit) {
        $totalData = DB::table($table_name)->count();

        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $column[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {            
            $informations = DB::table($table_name)->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
        }
        else {
        $search = $request->input('search.value'); 
        $informations =  DB::table($table_name)
                    ->orWhere($search_by, 'LIKE',"%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

        $totalFiltered = DB::table($table_name)
                    ->orWhere($search_by, 'LIKE',"%{$search}%")
                    ->count();
        }

        $data = array();
        if(!empty($informations))
        {
        $i=0;
        foreach ($informations as $category)
        {
           
            $nestedData['id'] = ++$i;
            $nestedData['name'] = $category->name;
            $nestedData['title'] = $category->title;
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
        return $json_data;
       
    }
    
}