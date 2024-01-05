<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use \App\Models\City,\App\Models\Category,\App\Models\Subcategory,\App\Models\Specification;
use Session;
 
class SearchController extends Controller
{
    
    /*  When Page Load At Time This Function Call */

	public function getItemOnLoad(Request $request)
    {
			 $donation_posts =  DB::table('donation_posts')
								->where('status',1)
								->orderBy('created_at','desc')
								->limit(15)
								->get();
			$result = array();
			foreach($donation_posts as $Val)
			{
					$result[] = $Val;
			}	
			echo $this->printData($result,array(), array()); 
    } 
    
    /* Return All The Query of Form its Result to Print Function */
    public function getItem(Request $request,$page='0')
    {
        
       //  // echo 'Hello';
       // echo '<pre>';
       //  print_r($request->data);
       //  die();

        // SORT BY 
		$dropdownSearch_sql="";
		if(isset($request->data['dropdownSearch']) && !empty($request->data['dropdownSearch']))
        {
        
            $dropdownSearch=$request->data['dropdownSearch'];
			
			 if($dropdownSearch=="1") //Latest
			{
				$dropdownSearch_sql="ORDER BY id desc";
			}elseif($dropdownSearch=="2") //Oldest
			{
				$dropdownSearch_sql="ORDER BY id asc";
			}
			elseif($dropdownSearch=="3") //Urgent
			{
				$dropdownSearch_sql="AND is_urgent='1' ORDER BY id desc";
			}
			elseif($dropdownSearch=="4") // Price: Low-High
			{
				$dropdownSearch_sql="ORDER BY consideration_detail asc";
			}
			elseif($dropdownSearch=="5") // Price: High-Low
			{
				$dropdownSearch_sql="ORDER BY consideration_detail desc";
			}
			else{
				
				$dropdownSearch_sql="ORDER BY id desc";
			} 
			//echo $dropdownSearch_sql;
		//die();			
			
            
        }

$dropdownSearch_sql="";
		if(isset($request->data['dropdownSearchd']) && !empty($request->data['dropdownSearchd']))
        {
        
            $dropdownSearch=$request->data['dropdownSearchd'];
			
			 if($dropdownSearchd=="1") //Latest
			{
				$dropdownSearch_sql="ORDER BY id desc";
			}elseif($dropdownSearch=="2") //Oldest
			{
				$dropdownSearch_sql="ORDER BY id asc";
			}
			elseif($dropdownSearch=="3") //Urgent
			{
				$dropdownSearch_sql="AND is_urgent='1' ORDER BY id desc";
			}
			elseif($dropdownSearch=="4") // Price: Low-High
			{
				$dropdownSearch_sql="ORDER BY consideration_detail asc";
			}
			elseif($dropdownSearch=="5") // Price: High-Low
			{
				$dropdownSearch_sql="ORDER BY consideration_detail desc";
			}
			else{
				
				$dropdownSearch_sql="ORDER BY id desc";
			} 
			//echo $dropdownSearch_sql;
		//die();			
			
            
        }
        
		
		//$category=array();
		$city_sql="";
		if(isset($request->data['data']) && !empty($request->data['data']))
        {
			// City SQL
			$search_form=$request->data['data'];
            $city_name=$search_form[0]['value'];
			if(isset($city_name)){
				$city_ids = search_city( $city_name);
				if(!empty($city_ids))
                {
                 $city_id=$city_ids[0];
                 $city_sql="AND city_id='".$city_id."'"; 
                }else{
				 // $city_sql="AND city_id='X'"; 	
				 $city_sql="AND city_id='X'"; 	
				}
			}
			
		
            
			// Category SQL	
			$category_box=$search_form[1]['value'];	
			if(isset($category_box) && !empty($category_box))
			{
				//$category = Category::where('name','LIKE',''.$request->data['data'][1]['value'])->where('status',1)->first();
				$sql="SELECT specifications.id FROM categories
						JOIN subcategories ON categories.id = subcategories.category_id
						JOIN specifications ON subcategories.id = specifications.subcategory_id
						WHERE categories.status = 1 AND subcategories.status = 1 AND specifications.status = 1
						AND categories.name LIKE '%".$category_box."%' "; 
				$results = DB::select( DB::raw($sql) );
				$specifications_id = array_column($results, 'id');
				if(!empty($specifications_id))
				{
					$specifications_id_data[]=$specifications_id;
				}else{
					$specifications_id_data=array();
				}	
			}
			
			
			
			// Word_box SQL	
			$word_box=$search_form[2]['value'];
			$word_box_sql="";
			if(isset($word_box) && !empty($word_box))
			{
				$w_b=explode(" ",$word_box);
				$w_b=array_values(array_filter($w_b));
				$put_sql=array();
				for($i=0;$i<count($w_b);$i++)
				{
					if($i==0)
					{
						// $put_sql[]="CONCAT (title, description) LIKE '%".$w_b[$i]."%'";
						$put_sql[]="CONCAT (title) LIKE '%".$w_b[$i]."%'";
					}else{
						// $put_sql[]="OR CONCAT (title, description) LIKE '%".$w_b[$i]."%'";
						$put_sql[]="OR CONCAT (title) LIKE '%".$w_b[$i]."%'";
					}
				} 
				$word_box_sql="AND (".implode(" ",$put_sql).")";
			}
			else
			{
				$word_box_sql='';
			}
			
		}
		else
		{
				$word_box_sql='';
			
		}
		
		//LOOKING FOR
		$looking_for_sql="";
		if(isset($request->data['looking_for']) && !empty($request->data['looking_for']))
        {
            $looking_for=$request->data['looking_for'];
            $looking_array=array();
            for($i=0;$i<count($looking_for);$i++)
            {
                $looking_array[]=$looking_for[$i]['value']; 
            }
            if(!empty($looking_array))
				{
					$looking_array = "'" . implode( "','",$looking_array) . "'";
					$looking_for_sql="AND user_type_id IN(".$looking_array.")";
				}else{
					$looking_for_sql="";
				}
		}
		
		
		
		
		// Category Form Ids

		if(Session::has('homePageCategoryId'))
		{
			$categoryId = Session::get('homePageCategoryId');
				$sql="SELECT specifications.id FROM categories
						JOIN subcategories ON categories.id = subcategories.category_id
						JOIN specifications ON subcategories.id = specifications.subcategory_id
						WHERE categories.status = 1 AND subcategories.status = 1 AND specifications.status = 1
						AND categories.id IN (".$categoryId.") "; 
				$results = DB::select( DB::raw($sql) );
				$specifications_id = array_column($results, 'id');
				
				if(!empty($specifications_id))
				{
					$categoryFormIDS[]=$specifications_id;
					
				}else{
					$categoryFormIDS=array();
				}
				
			session()->forget('homePageCategoryId');
		}
		else if(isset($request->data['categoryForm']) && !empty($request->data['categoryForm']))
        {
            $categoryForm=$request->data['categoryForm'];
            $categoryFormarray=array();
            for($i=0;$i<count($categoryForm);$i++)
            {
                $categoryFormarray[]=$categoryForm[$i]['value']; 
            }
			$categoryFormarrayids = "'" . implode( "','",$categoryFormarray) . "'";
				$sql="SELECT specifications.id FROM categories
						JOIN subcategories ON categories.id = subcategories.category_id
						JOIN specifications ON subcategories.id = specifications.subcategory_id
						WHERE categories.status = 1 AND subcategories.status = 1 AND specifications.status = 1
						AND categories.id IN (".$categoryFormarrayids.") "; 
				$results = DB::select( DB::raw($sql) );
				$specifications_id = array_column($results, 'id');
				
				if(!empty($specifications_id))
				{
					$categoryFormIDS[]=$specifications_id;
					
				}else{
					$categoryFormIDS=array();
				}
		}
		
		// print_r($categoryFormIDS);
		// die();
		
		// SubCateogry Result
		//$subCategoryFormarrayIDS=array();
		if(isset($request->data['subCategoryForm']) && !empty($request->data['subCategoryForm']))
		{
			$subCategoryFormarrayIDS=array();
			$subCategoryForm=$request->data['subCategoryForm'];
			$subCategoryFormarray=array();
			for($i=0;$i<count($subCategoryForm);$i++)
			{
			$subCategoryFormarray[]=$subCategoryForm[$i]['value']; 
			}
			//echo  $subCategoryFormids=implode(',', $subCategoryFormarray);
			
			$subCategoryFormaIDS = "'" . implode( "','",$subCategoryFormarray) . "'";
			//echo $subCategoryFormaIDS;
			$sql="SELECT specifications.id FROM subcategories
						JOIN specifications ON subcategories.id = specifications.subcategory_id
						WHERE subcategories.status = 1 AND specifications.status = 1
						AND subcategories.id IN (".$subCategoryFormaIDS.") "; 
				$results = DB::select( DB::raw($sql) );
				$sub_cat_specifications_id = array_column($results, 'id');
				$subCategoryFormarrayIDS=$sub_cat_specifications_id;
				
				/* echo"<pre>"; print_r($specifications_id); echo"</pre>";
			die(); */

		}
		// Specification Data
		$specificationFormarrayIDs=array();
		if(isset($request->data['specificationForm']) && !empty($request->data['specificationForm']))
			{
				$specificationForm=$request->data['specificationForm'];
				$specificationFormarray=array();
				for($i=0;$i<count($specificationForm);$i++)
				{
				$specificationFormarray[]=$specificationForm[$i]['value']; 
				}
				$specificationFormarrayIDs=$specificationFormarray;
				
			}
			
		//	conditionForm
		$conditionFormSQL="";
		if(isset($request->data['conditionForm']) && !empty($request->data['conditionForm']))
		{
			$conditionForm=$request->data['conditionForm'];
			$sconditionFormarray=array();
			for($i=0;$i<count($conditionForm);$i++)
			{
				$sconditionFormarray[]=$conditionForm[$i]['value']; 
			}
			if(!empty($sconditionFormarray))
			{
				$sconditionFormarrayIDS = "'" . implode( "','",$sconditionFormarray) . "'";
				$conditionFormSQL="AND `condition` IN(".$sconditionFormarrayIDS.")";
			}else{
				$conditionFormSQL="";	
			}
		}
		
		//considerationTypeForm
		$considerationTypeFormSQL="";
		if(isset($request->data['considerationTypeForm']) && !empty($request->data['considerationTypeForm']))
		{
			$considerationTypeForm=$request->data['considerationTypeForm'];
			$considerationTypeFormarray=array();
			for($i=0;$i<count($considerationTypeForm);$i++)
			{
			$considerationTypeFormarray[]=$considerationTypeForm[$i]['value']; 
			}
			$sonsiderationTypeFormids=implode(',', $considerationTypeFormarray);
			
			if(!empty($considerationTypeFormarray))
			{
				$considerationTypeFormarrayIDS = "'" . implode( "','",$considerationTypeFormarray) . "'";
				$considerationTypeFormSQL="AND consideration IN(".$considerationTypeFormarrayIDS.")";
			}else{
				$considerationTypeFormSQL="";	
			}

		}
		
		// donationTypeForm
		$donationTypeFormSQL="";
		if(isset($request->data['donationTypeForm']) && !empty($request->data['donationTypeForm']))
			{
				$donationTypeForm=$request->data['donationTypeForm'];
				$donationTypeFormarray=array();
				for($i=0;$i<count($donationTypeForm);$i++)
				{
					$donationTypeFormarray[]=$donationTypeForm[$i]['value']; 
				}
				
				 if(!empty($donationTypeFormarray))
				{
					$donationTypeFormarrayIDS = "'" . implode( "','",$donationTypeFormarray) . "'";
					$donationTypeFormSQL="AND donation_type_id IN(".$donationTypeFormarrayIDS.")";
				}else{
					$donationTypeFormSQL="";	
				 }
			}
			
			
			
			
			//	preferenceTypeForm
			$preferenceTypeFormSQL="";
			if(isset($request->data['preferenceTypeForm']) && !empty($request->data['preferenceTypeForm']))
			{
				$preferenceTypeForm=$request->data['preferenceTypeForm'];
				$preference=$preferenceTypeForm[0]['value']; 
				$preferenceTypeFormSQL="AND preference='".$preference."'";
			}
			
			//	preferenceTypeFormHandi
			$preferenceTypeFormHandiSQL="";
			if(isset($request->data['preferenceTypeFormHandi']) && !empty($request->data['preferenceTypeFormHandi']))
			{
				$preferenceTypeFormHandi=$request->data['preferenceTypeFormHandi'];
				$preference=$preferenceTypeFormHandi[0]['value']; 
				$preferenceTypeFormHandiSQL="AND preference_is_handicap='".$preference."'";
				 
			}
			
			
			
			
			//	preferenceTypeFormGenderList
			$preferenceTypeFormGenderListSQL="";
			if(isset($request->data['preferenceTypeFormGenderList']) && !empty($request->data['preferenceTypeFormGenderList']))
			{
				$genderForm=$request->data['preferenceTypeFormGenderList'];
				$genderFormarray=array();
				for($i=0;$i<count($genderForm);$i++)
				{
					$genderFormarray[]=$genderForm[$i]['value']; 
				}
				
				$put_sql=array();
				for($i=0;$i<count($genderFormarray);$i++)
				{
					if($i==0)
					{
						$put_sql[]="preference_gender LIKE '%".$genderFormarray[$i]."%'";
					}else{
						$put_sql[]="OR preference_gender LIKE '%".$genderFormarray[$i]."%'";
					}
				} 
				$preferenceTypeFormGenderListSQL="AND (".implode(" ",$put_sql).")";
				
			}
			
			//	preferenceTypeFormAge
			$preferenceTypeFormAgeListSQL="";
			if(isset($request->data['preferenceTypeFormAge']) && !empty($request->data['preferenceTypeFormAge']))
			{
				$ageForm=$request->data['preferenceTypeFormAge'];
				$ageFormarray=array();
				for($i=0;$i<count($ageForm);$i++)
				{
					$ageFormarray[]=$ageForm[$i]['value']; 
				}
				
				$put_sql=array();
				for($i=0;$i<count($ageFormarray);$i++)
				{
					if($i==0)
					{
						$put_sql[]="preference_gender LIKE '%".$ageFormarray[$i]."%'";
					}else{
						$put_sql[]="OR preference_gender LIKE '%".$ageFormarray[$i]."%'";
					}
				} 
				$preferenceTypeFormAgeListSQL="AND (".implode(" ",$put_sql).")";
				
			}
		// echo "<pre>";
		// print_r($specificationFormarrayIDs);
		// print_r(isset($subCategoryFormarrayIDS));
		// print_r(isset($categoryFormIDS));
		// print_r(isset($specifications_id_data));
		// die();	
			if(!empty($specificationFormarrayIDs))
			{
				


				$res = "'" . implode( "','",$specificationFormarrayIDs) . "'";
				$specifications_sql="AND specification_id IN(".$res.")"; 
			}else{
				/* if(!empty($subCategoryFormarrayIDS)) */
				 if(isset($subCategoryFormarrayIDS)) 
				{
					
					if(!empty($subCategoryFormarrayIDS))
					{
						$res = "'" . implode( "','",$subCategoryFormarrayIDS) . "'";
						$specifications_sql="AND specification_id IN(".$res.")";
					}else{
						$specifications_sql="";
					}
					
				}else{
					
					if(isset($categoryFormIDS))
					{
						if(isset($specifications_id_data) && !empty($specifications_id_data))
							{
								$input_cat=$specifications_id_data[0];
							}else{
								$input_cat=array();
							}
							//echo"<pre>"; print_r($input_cat); echo"</pre>";
							
						if(isset($categoryFormIDS) && !empty($categoryFormIDS))
							{
								if(!empty($input_cat))
									{
										$array_merge=array_merge($input_cat,$categoryFormIDS[0]);
										$array_values=array_values(array_unique($array_merge));
										$res = "'" . implode( "','",$array_values) . "'";
										$specifications_sql="AND specification_id IN(".$res.")"; 
									}else{
										$res = "'" . implode( "','",$categoryFormIDS[0]) . "'";
										$specifications_sql="AND specification_id IN(".$res.")";
									}
							}else{
									if(!empty($input_cat))
									{
										$res = "'" . implode( "','",$input_cat) . "'";
										$specifications_sql="AND specification_id IN(".$res.")";
									}else{
										$specifications_sql="";
									}
								
							}	
					}else{

							
							if(isset($specifications_id_data))
							{
								if(!empty($specifications_id_data))
								{
									$res = "'" . implode( "','",$specifications_id_data[0]) . "'";
									$specifications_sql="AND specification_id IN(".$res.")";
								}else{
									$specifications_sql="";	
								}
							}else{
								$specifications_sql="";
							}
					}
				}
			}
			
		 $sql="select count(donation_posts.id) as total_post 
		 		
		 		from donation_posts 
		 		
		 		where status = '1'
		 		and is_complete = '0'

			".$city_sql." 
			".$specifications_sql." 
			".$word_box_sql." 
			".$looking_for_sql." 
			".$conditionFormSQL." 
			".$considerationTypeFormSQL." 
			".$donationTypeFormSQL." 
			".$preferenceTypeFormSQL." 
			".$preferenceTypeFormGenderListSQL." 
			".$preferenceTypeFormAgeListSQL." 
			".$preferenceTypeFormHandiSQL." 
			".$dropdownSearch_sql.""; 
		
		


		$donation_results = DB::select(DB::raw($sql));
		
		// dd();

		$per_page = 20;
		// echo $total = count($donation_results);

		$total = $donation_results[0]->total_post;
		// die();

		$total_page = ceil($total / $per_page);
		
		if(!isset($request->data['page'])){
			$current_page=1;
		}else{
			$current_page=$request->data['page'];
		}
		if($request->data['page']==0)
		{
			$current_page=1;
		}

		$k=($current_page-1)* $per_page;

		if(empty($dropdownSearch_sql))
		{
			$dropdownSearch_sql = "ORDER BY id desc";
		} 
		
		 $Finalsql="select

					id,
					`key`,
					user_id,
					specification_id,
					user_type_id,
					city_id,
					is_urgent,
					title,
					description,
					address,
					is_complete,
					consideration,
					consideration_detail,
					`condition`,
					helper_status,
					d_status,
					created_at
							
				 			
				from donation_posts  

			where status = '1' 
			and is_complete = '0'

			".$city_sql." 
			".$specifications_sql." 
			".$word_box_sql." 
			".$looking_for_sql." 
			".$conditionFormSQL." 
			".$considerationTypeFormSQL." 
			".$donationTypeFormSQL." 
			".$preferenceTypeFormSQL." 
			".$preferenceTypeFormGenderListSQL." 
			".$preferenceTypeFormAgeListSQL." 
			".$preferenceTypeFormHandiSQL." 
			".$dropdownSearch_sql." 

			LIMIT $k,$per_page";

		// die();


											
		$donationFinalResults = DB::select(DB::raw($Finalsql));
		
		// echo "<pre>";						
		// print_r($donationFinalResults);
		// die();						

								if ($total_page > 0) 
								{
							     /* Pagination */
							     echo "<p></p>";
							     echo "<p><b>".$total."</b> posts for you</p>";
							     echo '<nav aria-label="Page navigation example">
								  <ul class="pagination">';
								 /* Previous Disabled Conditions */
									if($current_page>1)
									{
										echo '<li class="page-item">
										<a class="page-link" href="?page='.($current_page-1).'" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
										<span class="sr-only">Previous</span>
									  </a>
										</li>';
									}
									else
									{
										echo '<li class="page-item">
										<a style="cursor:no-drop;" class="page-link disabled"  aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
										<span class="sr-only">Previous</span>
									  </a>
										</li>';
									}	
									
										for($i=1;$i<=$total_page;$i++)
										{
											echo '<li class="page-item"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
										}
									/* Next Disabled Conditions */		
									if($current_page < $total_page)
									{
										echo '<li class="page-item">
										<a class="page-link" href="?page='.($current_page+1).'" aria-label="Next">
											<span aria-hidden="true">&raquo;</span>
											<span class="sr-only">Next</span>
										  </a>
										</li>';
									}
									else{
										echo '<li class="page-item">
										<a  style="cursor:no-drop;" class="page-link"  aria-label="Next">
											<span aria-hidden="true">&raquo;</span>
											<span class="sr-only">Next</span>
										  </a>
										</li>';
									}		
									echo '</ul>
										</nav>';
							}	
		echo $this->printData($donationFinalResults,array(), array());	 
		die();
		
    }
	
	    public function getRecomandatePost(Request $request)
		{
			$donation_posts =  DB::table('donation_posts')
								->where('status',1)
								->where('specification_id',$request->data['specification'])
								->orWhere('city_id',$request->data['id'])
								->orderBy('created_at','desc')
								->limit(2)
								->get();
			echo $this->printData($donation_posts,array(), array());
		}
	
	/* Print Data of Ajax Final Result */
    public function printData($results,$city,$category,$pageId='0')
    {
		// echo "<pre>";
		// print_r($results);
		// die;
		
		$print = '';
        if(!empty($results)){
			foreach($results as $key=>$result){
				 
            if(!empty($result)){
                    // if(empty($city)){
                    //     $city =  City::where('id',$result->city_id)->where('status',1)->first();
                    // }
                    $city =  City::where('id',$result->city_id)->where('status',1)->first();
            //         echo "<pre>";
            // 		print_r($city);
            // 		die;
                    
                    // if(empty($category)){
                    //     $specification =  Specification::where('id',$result->specification_id)->where('status',1)->first();
                    //     $subcategory = $specification->subcategory;
                    //     $category = $subcategory->category;
                    // }else {
                    //     $specification =  Specification::where('id',$result->specification_id)->where('status',1)->first();
                    //     $subcategory = $specification->subcategory;
                    // }
                    
                    $specification =  Specification::where('id',$result->specification_id)->where('status',1)->first();
                    $subcategory = $specification->subcategory;
                    $category = $subcategory->category;
                    
                    $user_type = DB::table('user_types')
                            ->where('id',$result->user_type_id)
                            ->where('status',1)
                            ->first();
                    $donation_image = DB::table('donation_images')
                        ->where('donation_post_id',$result->id)
                        ->where('status',1)
                        ->first();
                    
                    if(!empty($donation_image)){
                        $result->image = DONATION_POST_IMAGE($donation_image->image);
                    }else{
                        $result->image = DONATION_POST_IMAGE('preview.jpg');
                    }
                       
                    $print .= '  <!-- ad-item 123 -->
                    	<a href="'. route("search.donation.details",$result->key).'">
	                        <div class="category-item row">
		                        <!-- item-image -->
		                        <div class="item-image-box col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
		                            <div class="item-image"> </a>';
		                                if(!empty($result->image)){
		                                $print .='<a href="'. route("search.donation.details",$result->key).'"><img src="'.$result->image.'" alt="Image" class="img-responsive"></a>';
		                                }else{
		                                    $print .='<a href="'. route("search.donation.details",$result->key).'"><img src="/images/uploads/donation_post/preview.jpg" alt="Image" class="img-responsive"></a>';
		                                }    
		                                
		                                if($result->is_urgent == 1){
		                                    $print .= '<a href="'. route("search.donation.details",$result->key).'" class="verified" data-toggle="tooltip" data-placement="left" title="Verified">Urgent</a>';
		                                }
		                                
		                                // $print .= '<!--<a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="Verified"><i class="fa fa-check-square-o"></i></a>-->
		                                
		                                $print .= ' <a href="'. route("search.donation.details",$result->key).'">
		                            </div><!-- item-image -->
		                        </div>
		                        <!-- rending-text -->
		                        <div class="item-info col-xs-12 col-sm-9 col-md-9 col-lg-9 col-xl-9">
		                            <!-- ad-info -->
		                            <div class="ad-info col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="padding-left: 0px; padding-bottom: 0px; position: initial;"> </a>';
		                          		
		                            	$print .= '<a href="'. route("search.donation.details",$result->key).'"><div class="ad-info1 col-xs-8 col-sm-10 col-md-10 col-lg-10 col-xl-10">
			                            				<h3 class="item-price">'.$result->title .'</h3>
			                            			</div> </a>
		                            				';

		                          		if(Auth::guard('user')->check()){
		                                    if(Auth::guard('user')->user()->id == $result->user_id){
		                                      	if($result->is_complete == 0){
		                                      		$print .=   '<a href="'. route("user.donation.complete",[$result->key]) .'">
		                                      					<div class="col-xs-4 col-sm-2 col-md-2 col-lg-2 col-xl-2" style="padding-right: 0px;">
		                                      						<span class=" pull-right btn-pending" title="Make it complete"> Pending</span>
		                                      					</div>
		                                      					</a>	' ;
		                                      	}
		                                      	else{

		                                      		$print .=   '
		                                      					<a href="'. route("search.donation.details",$result->key).'">
		                                      					<div class="col-xs-4 col-sm-2 col-md-2 col-lg-2 col-xl-2" style="padding-right: 0px;">
		                                      						<a style="font-size:25px;" href="javascript:void(0);"><span class=" pull-right btn-complete" title="Donation Completed"> Completed</span></a>
		                                      					</div>
		                                      					</a>
		                                      					' ;
		                                      		
		                                      	}
		                                    }
		                                  }

		                                if($result->consideration == '0'){
		                                $print .=   '<a href="'. route("search.donation.details",$result->key).'"><span class="text-color pull-right">Free</span> </a>' ;
		                                }else if ($result->consideration == '1'){
		                                    $print .= '<a href="'. route("search.donation.details",$result->key).'"><span class="text-color pull-right" title="'.$result->consideration_detail.'">'.$result->consideration_detail.'</span> </a>';
		                                }else{
		                                    $print .= '<a href="'. route("search.donation.details",$result->key).'"><span class="text-color pull-right" title="'.$result->consideration_detail.'">'.$result->consideration_detail.'</span></a>';
		                                }
		                               
		                               // <a href="'. route("search.donation.details",$result->key).'"><h4 class="item-title">'. $result->description.'</h4></a>
		                                
		                                

		                                
		                                $print .= '<a href="'. route("search.donation.details",$result->key).'"> <div class="item-cat col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
		                                    <span>'.$category->name.' >> '.$subcategory->name.' >> '. $specification->name.'</span> 
		                                </div>



		                             	<div class="ad-meta col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="bottom: 0; position: absolute;" >

			                                <div class="meta-content col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
			                                    <a href="javascript:void(0)">'.\Carbon\Carbon::parse($result->created_at)->format('d-m-Y H:i').' </span> </a>
			                                    
			                                    <!-- <a href="'. route("search.donation.details",$result->key).'"><i class="fa fa-tags"></i> ';
			                                    if($result->condition == 1) 
			                                        $print .= "New";
			                                        else
			                                        $print .= "Used";
			                                        $print .=' </a> -->
			                                    <br>    
			                                    <!-- <i class="fa fa-map-marker"></i> '. $result->address .'    -->
			                                    
			                                    <a href="'. route("search.donation.details",$result->key).'"><i class="fa fa-map-marker"></i> '. $city->name .' '. $city->state->name .' '. $city->state->country->name .' 
			                                </div>									
			                                <!-- item-info-right -->
			                                <div class="user-option text-right col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4"> </a>
			                                 '; 
			                              
			                                 if($user_type->id == '1'){
			                                    $print .=  ' <a href="'. route("search.donation.details",$result->key).'"><span  data-toggle="tooltip" data-placement="top" title="'. $user_type->name .'"><i class="fa fa-share-square-o"></i> </span> </a>';
			                                 }else if($user_type->id == '3'){
			                                    $print .=  ' <a href="'. route("search.donation.details",$result->key).'"><span  data-toggle="tooltip" data-placement="top" title="'. $user_type->name .'"><i class="fa fa-shopping-basket"></i> </span></a>';
			                                 }else {
			                                    $print .=  ' <a href="'. route("search.donation.details",$result->key).'"><span  data-toggle="tooltip" data-placement="top" title="'. $user_type->name .'"><i class="fa fa-handshake-o"></i> </span> </a>';
			                                 }

			                                 if(!empty($result->helper_status)){
			                                    if($result->helper_status){
			                                        $print .=  '<a href="'. route("search.donation.details",$result->key).'"><span   data-toggle="tooltip" data-placement="top" title="Organization"><i class="fa fa-building"></i> </span> </a>';
			                                    }else {
			                                        $print .=  '<a href="'. route("search.donation.details",$result->key).'"><span   data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user-secret"></i> </span> </a>';
			                                    }
			                                }else{
			                                    if($result->d_status){
			                                        $print .=  '<a href="'. route("search.donation.details",$result->key).'"><span   data-toggle="tooltip" data-placement="top" title="Organization"><i class="fa fa-building"></i> </span> </a>';
			                                    }else {
			                                        $print .=  '<a href="'. route("search.donation.details",$result->key).'"><span   data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user-secret"></i> </span> </a>';
			                                    }
			                                }
			                                 
			                                    
			                                    $print .=  '</div><!-- item-info-right -->

		                                </div>
		                            </div><!-- ad-info -->

		                            
		                        </div><!-- item-info -->
		                    </div><!-- ad-item -->
		                
		                 ';
					
				}
            }   
            //  echo "<pre>";
            // 		print_r($city);
            // 		die;
				
        }else{
            $print = '<div class="alert alert-info"><center>There is no donation post related to your search.</center></div>';
        }
		return $print;
		
    }	
	
	 public function getDonationPost(Request $request)
    {
	
        $results = array();
        if($request->key == 1){
            $results =  DB::table('donation_posts')
                            ->where('status',1)
                            ->orderBy('created_at','desc')
                            ->limit(15)
                            ->get();
            $categories = array();
        }else{
            $categories = Category::where('status',1)->where('key',$request->key)->first();
        }
        if(!empty($categories)){
            session(['scroll.categories' => $categories]);
            foreach($categories->subcategories as $subcategory){
                $donations =   DB::table('donation_posts')
                                ->where('specification_id',$subcategory->id)
                                ->where('status',1)
                                ->where('is_urgent',1)
                                ->orderBy('created_at','desc')
								  ->limit(15)
                                ->get ();
                if(!empty($donations)){
                    foreach($donations as $donation){
                        array_push($results,$donation);
                    }
                }
            }
        }
        echo $this->printData($results,array(), $categories);
    }  
	
	
	
   
   /* My Account Functions Start */
	
	    //favoriate donation
    public function getfavoriateDonation(Request $request)
    {
		
        $posts =  DB::table('favourite_posts')->where('user_id',Auth::guard('user')->user()->id)->where('status',1)->get();
        $results = array();
        // foreach($posts as $post){
        //     $donation_post = DB::table('donation_posts')
        //                             ->where('status',1)
        //                             ->where('id',$post->id)->first();
        //     if(!empty($donation_post)){
        //        array_push($results,$donation_post);
        //     }
        // }
        foreach($posts as $post){
            $donation_post = DB::table('donation_posts')
                                    ->where('status',1)
                                    ->where('id',$post->donation_post_id)
                                    ->first();
            if(!empty($donation_post)){
		       array_push($results,$donation_post);
            }
        }
        if(!empty($results)){                    
            echo $this->printData($results,array(), array());
        }else{
            echo '<div class="alert alert-info">There is no Favorite Donation Post.</div>';
        }
    }

	
	
    //get list of product 
    public function getMyDonation(Request $request)
    {
	    $donation_posts =  DB::table('donation_posts')->where('status',1) ->where('user_id',Auth::guard('user')->user()->id)    ->orderBy('created_at','desc')->get();
        if(!empty($donation_posts[0])){                    
            echo $this->printData($donation_posts,array(), array());
        }else{
            echo '<div class="alert alert-info">There is no Donation Post.</div>';
        }
    }
	
 
    //list of urgent donation of user by user id
    public function getUrgentRequirement(Request $request)
    {
	    $donation_posts =  DB::table('donation_posts')->where('status',1)->where('is_urgent',1) ->where('user_id',Auth::guard('user')->user()->id)    ->orderBy('created_at','desc')->get();
        if(!empty($donation_posts[0])){                    
            echo $this->printData($donation_posts,array(), array());
        }else{
            echo '<div class="alert alert-info">There is no Donation Post.</div>';
        }
    }
    
    //list of all complete donation by user
    public function getCompleteDonation(Request $requset)
    {
	   $donation_posts =  DB::table('donation_posts')->where('status',1)->where('is_complete',1) ->where('user_id',Auth::guard('user')->user()->id)    ->orderBy('created_at','desc')->get();
        if(!empty($donation_posts[0])){                    
            echo $this->printData($donation_posts,array(), array());
        }else{
            echo '<div class="alert alert-info">There is no Complete Donation Post.</div>';
        }
    }
    
      public function getpandingDonation(Request $request)
    {
        $donation_posts =  DB::table('donation_posts')->where('status',1)->where('is_complete',0) ->where('user_id',Auth::guard('user')->user()->id)    ->orderBy('created_at','desc')->get();
        if(!empty($donation_posts[0])){                    
            echo $this->printData($donation_posts,array(), array());
        }else{
            echo '<div class="alert alert-info">There is no Panding Donation Post.</div>';
        }
    }



     public function sucessstory(Request $request)
    {
    	echo '<form action="/action_page.php">
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" value="John"><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname" value="Doe"><br><br>
  <input type="submit" value="Submit">
</form> ';


    	// $donation_posts =  DB::table('donation_posts')->where('status',1) ->where('user_id',Auth::guard('user')->user()->id)    ->orderBy('created_at','desc')->limit(20)->get();
     //    if(!empty($donation_posts[0])){                    
     //        echo $this->printData($donation_posts,array(), array());
     //    }else{
     //        echo '<div class="alert alert-info">There is no Donation Post.</div>';
     //    }

    		// echo '<div class="alert alert-info">There is no Panding Donation Post.</div>';
    }
	
   /* My Account Functions End */
} 
