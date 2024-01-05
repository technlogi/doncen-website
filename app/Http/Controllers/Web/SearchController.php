<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use \App\Models\City,\App\Models\Category,\App\Models\Subcategory,\App\Models\Specification;
use Session;
use Url;

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
		//print_r($result);
		//die();
		echo $this->printData($result,array(), array()); 
	} 

	/* Return All The Query of Form its Result to Print Function */
	public function getItem(Request $request,$page='0')
	{

		// echo 'Hello';
       	// echo '<pre>';
        // print_r($request->data);
        // die();
        
            

        if (Auth::guard('user')->check())
        {
            $user_id = Auth::guard('user')->user()->id;

            $user_id_sql =  "AND user_id != '".$user_id."' ";
        }
        else
        {
			$user_id_sql = "";
        }


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

		if(isset($request->data['urgentitem']) && !empty($request->data['urgentitem']))
		{

			$dropdownSearch=$request->data['urgentitem'];
			
			$dropdownSearch_sql="AND is_urgent='1' ORDER BY id desc";
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
				// print_r($sql); die;
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

				//  echo"<pre>"; print_r($sql); echo"</pre>";
				// die(); 

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
			

			if(!empty($specificationFormarrayIDs))
			{
				$res = "'" . implode( "','",$specificationFormarrayIDs) . "'";
				$specifications_sql="AND specification_id IN(".$res.")"; 
			}
			else
			{
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
					
				}
				else
				{
					
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
					if($genderForm[$i]['value']=='all'){
						$genderFormarray[]=''; 
					}else{
						$genderFormarray[]=$genderForm[$i]['value']; 
					}

					

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


			
			
			$sql="select count(donation_posts.id) as total_post 

			from donation_posts 

			where status = '1'
			and is_complete = '0'
			and expired_at > NOW()


			".$user_id_sql."

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
		//print_r($donation_results);
		//post found - 10 

			$per_page = 20;
		// echo $total = count($donation_results);

			$total = $donation_results[0]->total_post;
		// die();

			$total_page = ceil($total / $per_page);
			// echo $total_page;
			// die();

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
			created_at,

			complete_title,
			complete_msg,
			
			post_view_counter,
			expired_at

			from donation_posts  

			where status = '1' 
			and is_complete = '0'
			and expired_at > NOW()

			".$user_id_sql."

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




			$donationFinalResults = DB::select(DB::raw($Finalsql));

		// echo "<pre>";				
		// 	// post found - its works		
		// print_r($donationFinalResults);
		// die();

			if ($total_page > 0) 
			{

				/* Pagination */
				echo "<p></p>";
				echo "<p><b>".$total."</b> posts for you</p>";
			}
	// print_r($donationFinalResults); die;
			echo $this->printData($donationFinalResults,array(), array());	 
		//	die();
			if ($total_page > 0) 
			{

				/* Pagination */
				
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

										// for($i=1;$i<=$total_page;$i++)
				if(($total_page - 4) < $current_page)
				{
					$current = $total_page;
				}
				else
				{
					$current = $current_page + 4;
				}
				for($i=$current_page ; $i <=$current ; $i++)
				{
					if($i == $current_page){ $class = 'page-item active';}
					else{$class = 'page-item';}

					echo '<li class="'.$class.'"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
				}

				if($current_page < ($total_page - 4))
				{
					echo '<li class="page-item"><a class="page-link" href="?page='.$total_page.'">...'.$total_page.'</a></li>';
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
          

		}

		public function getRecomandatePost(Request $request)
		{
			// echo "<pre>";
			// print_r($request->data);
			// die();
			//DB::enableQueryLog();
			$donation_posts =  DB::table('donation_posts')
								
								->where('status',1)
								
								
								// ->where('specification_id',$request->data['specification'])
								 
								->Where('id','!=', $request->data['id'])
								->Where('city_id',$request->data['city_id'])
								
					            ->orderBy('created_at','desc')
								->limit(2)
								
								->get();
								// ->toSql();

			// echo "<pre>";
			// print_r($donation_posts);
			// die();

			echo $this->printData($donation_posts,array(), array());
		}

		/* Print Data of Ajax Final Result */
		public function printData($results,$city,$category,$pageId='0')
		{
		// echo "<pre>";
		// print_r($results);
		// die;



			$v='';
			$print = '';
			if(!empty($results)){
				foreach($results as $key=>$result){
                 
				// echo "<pre>";
				// 		print_r($results);
				// 		die;
					//Is Working Here - Haresh

					if(!empty($result)){

						// echo "<pre>";
						// print_r($result);
						// die;
                    // if(empty($city)){
                    //     $city =  City::where('id',$result->city_id)->where('status',1)->first();
                    // }
						$city =  City::where('id',$result->city_id)->where('status',1)->first();
                    // echo "<pre>";
            		// print_r($city);
            		// die;

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



    				// $success_story = DB::table('donation_posts_story')->where('donation_post_id',$result->id)->count();
					//$success_story = DB::table('donation_posts_story')->where('donation_post_id',$result->id);
					// print_r($success_story);
					// die();

    				// $success_story_get= DB::table('donation_posts_story')->where('donation_post_id','70')->get();
    				// print_r($success_story_get);

						$success_story_image = DB::table('user_posts_story_images')->where('donation_post_id',$result->id)->get();
						
					// print_r($result);
					// die();
						




                       	if($result->complete_title)
                       	{

	                       	$print.=' <div class="modal fade" id="myModall1" role="dialog">
											<div class="modal-dialog">

											<!-- Modal content-->
											<div class="modal-content">
											<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title" style="color: #ff0000 !important;">View Success Story</h4>
											</div>
											<div class="modal-body">

												<div class="description">
					                                <h4> '.$result->complete_title .' </h4>
					                            </div>
									';
                       	
								// echo $print;
								// die();		
								if($success_story_image)
								{
									
									
									// var/www/html
									// $folderpath  = base_path('images/uploads/user_success_image/');

									// domain
									$base_path = URL::asset('images/uploads/user_success_image//');

								
									$print.='
													<div id="product-carousel" class="carousel slide" data-ride="carousel">
													  <!-- Wrapper for slides -->
													  <div class="carousel-inner" role="listbox">
													    
												';		        
												
												$k= 0;
												foreach($success_story_image as $success_image)
												{	
													
													$image = $base_path.'/'.$success_image->image;
													$alt=str_replace(' ','-',$category->name).'-'.str_replace(' ','-',$subcategory->name).'-'.str_replace(' ','-',$specification->name).'-'.str_replace(' ','-',$result->title);

													if($k++ == 0)
													{
														$print.='
															     <!-- item -->
															    <div class="item active">
															      <div class="carousel-image">
															        <!-- image-wrapper -->

															        	<img src="'.$image.'" alt="'.$alt.'" class="img-responsive" style="max-height: 461px; margin-left: auto; margin-right: auto;">
																     </div>
															    </div>
															    <!-- item -->
														';
													}
													else
													{
														$print.='
															     <!-- item -->
															    <div class="item">
															      <div class="carousel-image">
															        <!-- image-wrapper -->

															        	<img src="'.$image.'"  alt="'.$alt.'" class="img-responsive" style="max-height: 461px; margin-left: auto; margin-right: auto;">
																     </div>
															    </div>
															    <!-- item -->
														';
													}
													
												}
												
												$print.='

													      
													    
													  </div>
													  <!-- carousel-inner -->
													  <!-- Controls -->
													  <a class="left carousel-control" href="#product-carousel" role="button" data-slide="prev">
													    <i class="fa fa-chevron-left"></i>
													  </a>
													  <a class="right carousel-control" href="#product-carousel" role="button" data-slide="next">
													    <i class="fa fa-chevron-right"></i>
													  </a>
													  <!-- Controls -->
													  <!-- Indicators -->
													  <ol class="carousel-indicators">
												';		        
												
												$i = 0;
												foreach($success_story_image as $success_image)
												{	
													$image = $base_path.'/'.$success_image->image;
													$alt=str_replace(' ','-',$category->name).'-'.str_replace(' ','-',$subcategory->name).'-'.str_replace(' ','-',$specification->name).'-'.str_replace(' ','-',$result->title);

													$print.='
														       	<li data-target="#product-carousel" data-slide-to="'.$i++.'" class="">
															      <img src="'.$image.'" alt="'.$alt.'" class="img-responsive">
															    </li>
													';
												}
												
												$print.='
													    
													    
													  </ol>
													</div>
										';
								}
								
						
						

							$print.='			
											
											<div class="description">
				                                <p> '.$result->complete_msg.'</p>
				                            </div>
								';
										
										
								// <div class="user-images">
					   		//                          <img src="'.$result->complete_media.'" alt="User Images" class="img-responsive">
					   		//                      </div>

										//echo "<pre>";
										//$print.=''.print_r($success_story_image);
										
									




										$print.='   </div>
										</div>
										</div>
										</div>';

									

						}

					// 			print_r($result);
					// die();
		
		// echo $print;
		// die;

						if(!empty($donation_image)){
							
							if($donation_image->file_type!="video"){
								$result->image = DONATION_POST_IMAGE($donation_image->image);
								
							}else{
								$result->image = DONATION_POST_IMAGE('preview_video.jpg');
							}
							             

							
						}else{
							$result->image = DONATION_POST_IMAGE('preview.jpg');
						}

// $print .= ' 
//  <div class="ad-item row">
//                 <div class="item-image-box col-sm-3 col-xs-12  col-md-3 col-lg-3 col-xl-3" style="padding: 0;">
//                   <!-- item-image -->
//                   <div class="item-image ">
//                     <a href="details.html"><img src="https://doncen.org/images/uploads/donation_post/2209010744346Hco.jpg" alt="Image" class="img-responsive" style="width: 100%;"></a>
//                     <span class="featured-ad">URGENT</span>
//                     <a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="Verified" data-original-title="Verified" style="right: 0;background:none;font-size:14px;padding:0px;"><i class="fa fa-check-square-o"></i></a>
//                   </div><!-- item-image -->
//                 </div><!-- item-image-box -->
                
//                 <!-- rending-text -->
//                 <div class="item-info col-sm-9"  style="padding: 0;">
//                   <!-- ad-info -->
//                   <div class="ad-info" style="line-height: normal;">
//                     <h3 class="item-price">Want to donate<!-- <span>(Negotiable)</span> --></h3>
//                     <!-- <h4 class="item-title"><a href="#">Smartphone Original Cover</a></h4> -->
//                     <div class="item-cat">
//                       <span><a href="#">Food & Beverages >> Bakery, Cakes & Dairy >> Cookies, Rusk & Khari</a></span> /
//                       <span><a href="#">Sofa</a></span>
//                     </div>  
//                     <br> <!-- Add Star -->
//                        <div class="rate" style="color: #a0a0a0;">
//                             <div class="my">
//                                 <div class="star-rating">
//                                 <span class="star" style="font-size: 24px; padding-right:2px;">★</span><span class="star" style="font-size: 24px;padding-right:2px;">★</span><span class="star" style="font-size: 24px;padding-right:2px;">★</span><span class="star" style="font-size: 24px;padding-right:2px;">★</span><span class="star" style="font-size: 24px;padding-right:2px;">★</span>
//                                 </div>
//                             </div>
//                         </div>
//                            <!-- Star End -->                  
//                   </div><!-- ad-info -->
                  
                 
//                   <!-- ad-meta -->
//                   <div class="ad-meta " style="position: absolute;padding-left: 10px;">
//                     <div class="meta-content col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8" style="line-height: normal;">
//                       <a href="javascript:void(0)">01-09-2022 19:44  </a>

//                       <!-- <a href="https://doncen.org/donation-post-detail/omyx3gd7c24d06540n9l514"><i class="fa fa-tags"></i> New </a> -->
//                       <br>    
//                       <!-- <i class="fa fa-map-marker"></i> Indore Physical Academy Mp, Shiv Moti Nagar, Indore, Madhya Pradesh, India    -->

//                       <a href="https://doncen.org/donation-post-detail/omyx3gd7c24d06540n9l514"><i class="fa fa-map-marker"></i> Indore Madhya Pradesh India 
//                       </a>
//                     </div>                 
//                     <!-- item-info-right -->
//                     <div class="user-option pull-right" style="    padding-right: 10px;
// ">
//                       <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
//                       <a class="online" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dealer"><i class="fa fa-suitcase"></i> </a>                     
//                     </div><!-- item-info-right -->
//                   </div><!-- ad-meta -->
//                 </div><!-- item-info -->
//               </div><!-- ad-item -->
// ';



							$print .= '  <!-- ad-item 123 -->
										<!-- ad-item -->
							<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'">
                                 <div class="ad-item row">
                                 	<!-- item-image-box -->
                					<div class="item-image-box col-sm-3 col-xs-12  col-md-3 col-lg-3 col-xl-3" style="padding: 0;">
				                  		<!-- item-image -->
				                  		<div class="item-image ">';
				                  		// $print .= $result->id;
				                  		$alt=str_replace(' ','-',$category->name).'-'.str_replace(' ','-',$subcategory->name).'-'.str_replace(' ','-',$specification->name).'-'.str_replace(' ','-',$result->title);

										if(!empty($result->image)){
											$print .='<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><img src="'.$result->image.'" alt="'.$alt.'" class="img-responsive" ></a>';

												
										}else{
											$print .='<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><img src="/images/uploads/donation_post/preview.jpg" alt="'.$alt.'" class="img-responsive" ></a>';
										}    

										if($result->is_urgent == 1){
											$print .= '<span class="featured-ad">URGENT</span>';
										}


										// if($result->is_verified == 1){
										// 	$print .= ' <a href="'. route("search.donation.details",$result->key).'" class="verified" data-toggle="tooltip" data-placement="left" title="Verified" data-original-title="Verified" style="right: 0;background:none;font-size:14px;padding:0px;"><i class="fa fa-check-square-o"></i></a>';
										// }

										$print .= ' 
										 </div><!-- item-image -->
                					</div><!-- item-image-box -->';
                   
                    				$print .= '<!-- rending-text -->
                					<div class="item-info col-sm-9"  style="padding: 0;">
 										<!-- ad-info -->
 											<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'">
                 						 		<div class="ad-info" >
                    								<h3 class="item-price">'.$result->title .'</h3>';

                    								
                    
                    






					// $print .= '  <!-- ad-item 123 -->
					// 	<a href="'. route("search.donation.details",$result->key).'">
					// 		<div class="ad-item row">
					// 			<!-- item-image-box -->
     //            					<div class="item-image-box col-sm-3 col-xs-12  col-md-3 col-lg-3 col-xl-3" style="padding: 0;">
				 //                  		<!-- item-image -->
				 //                  		<div class="item-image ">';
		   //                          	// $print .= $result->id;
					// 					if(!empty($result->image)){
					// 							$print .='<a href="'. route("search.donation.details",$result->key).'"><img src="'.$result->image.'" alt="Image" class="img-responsive" style="height: 151px;object-fit: fill;"></a>';
									
											
											
					// 					}else{
					// 						$print .='<a href="'. route("search.donation.details",$result->key).'"><img src="/images/uploads/donation_post/preview.jpg" alt="Image" class="img-responsive" style="height: 151px;object-fit: fill;"></a>';
					// 					}    

					// 					if($result->is_urgent == 1){
					// 						$print .= '<a href="'. route("search.donation.details",$result->key).'" class="verified" data-toggle="tooltip" data-placement="left" title="Verified">Urgent</a>';
					// 					}

		   //                              // $print .= '<!--<a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="Verified"><i class="fa fa-check-square-o"></i></a>-->

					// 					$print .= ' <a href="'. route("search.donation.details",$result->key).'">
					// 				</div><!-- item-image -->
					// 			</div>
					// 			<!-- rending-text -->
 

					// 			<div class="item-info col-xs-12 col-sm-9 col-md-9 col-lg-9 col-xl-9">
					// 				<!-- ad-info -->
					// 				<div class="ad-info col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="padding-left: 0px; /* padding-bottom: 0px; */ position: initial;"> </a>';

					// 				$print .= '<a href="'. route("search.donation.details",$result->key).'"><div class="ad-info1 col-xs-8 col-sm-10 col-md-10 col-lg-10 col-xl-10 d-flex" style="display: flex;">
					// 				<h3 class="item-price">'.$result->title .'</h3>
					// 				</div> </a>';

                  

						// $print .= '  <!-- ad-item 123 -->
						// <a href="'. route("search.donation.details",$result->key).'">
						// 	<div class="category-item row">
						// 		<!-- item-image -->
						// 		<div class="item-image-box col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
						// 			<div class="item-image"> ';
		    //                         	// $print .= $result->id;
						// 				if(!empty($result->image)){
						// 						$print .='<a href="'. route("search.donation.details",$result->key).'"><img src="'.$result->image.'" alt="Image" class="img-responsive" style="height: 151px;object-fit: fill;"></a>';
									
											
											
						// 				}else{
						// 					$print .='<a href="'. route("search.donation.details",$result->key).'"><img src="/images/uploads/donation_post/preview.jpg" alt="Image" class="img-responsive" style="height: 151px;object-fit: fill;"></a>';
						// 				}    

						// 				if($result->is_urgent == 1){
						// 					$print .= '<a href="'. route("search.donation.details",$result->key).'" class="verified" data-toggle="tooltip" data-placement="left" title="Verified">Urgent</a>';
						// 				}

		    //                             // $print .= '<!--<a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="Verified"><i class="fa fa-check-square-o"></i></a>-->

						// 				$print .= ' <a href="'. route("search.donation.details",$result->key).'">
						// 			</div><!-- item-image -->
						// 		</div>
						// 		<!-- rending-text -->
 

						// 		<div class="item-info col-xs-12 col-sm-9 col-md-9 col-lg-9 col-xl-9">
						// 			<!-- ad-info -->
						// 			<div class="ad-info col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="padding-left: 0px; /* padding-bottom: 0px; */ position: initial;"> </a>';

						// 			$print .= '<a href="'. route("search.donation.details",$result->key).'"><div class="ad-info1 col-xs-8 col-sm-10 col-md-10 col-lg-10 col-xl-10 d-flex" style="display: flex;">
						// 			<h3 class="item-price">'.$result->title .'</h3>
						// 			</div> </a>';


						// echo "<pre>";
						// print_r($result);
						// echo $print;  // its working here
						// die;     
						// $dt=\Carbon\Carbon::now()->addDays(7)->format('Y-m-d\TH:i');
						//{{Carbon\Carbon::now()->addDays(7)->format("Y-m-d\TH:i")}}	

					//haresh start
						// if(Auth::guard('user')->check()){
		    //                       				// dd(Auth::guard('user')->user()->id );
		    //                       				// exit();
						// 						// echo "<pre>";
						// 						//   print_r($result->expired_at);
						// 						//   die();

												
						// 	if(Auth::guard('user')->user()->id == $result->user_id)
						// 	{

								
						// 		if($result->consideration == '0')
						// 		{
									
						// 				// 	echo "<pre>";
						// 				// print_r($result);  //its working

						// 				//  die;  
										
						// 			// $print .=   '<br><a href="'. route("search.donation.details",$result->key).'"><span class="text-color pull-right">Free</span> </a>' ;

						// 			// echo $print;
						// 			// die; 

									
						// 			// $print .=   '<a href="" data-toggle="modal" data-target="#date" title="Click to report" style="color: #55b23d !important; padding-top:2px;" ><span class=" pull-right " > <i class="fa fa-calendar" style="padding-right: 7px;">Expired_at</i></span></a>' ;
									

						// 			//  this code not work

						// 			// comment below code - haresh

						// 			$print.=' <div class="modal fade" id="date" role="dialog">
						// 			<div class="modal-dialog">

						// 			<!-- Modal content-->
						// 			<div class="modal-content">
						// 			<div class="modal-header">
						// 			<button type="button" class="close" style="color: #ff0000 !important;" data-dismiss="modal">&times;</button>
						// 			<h4 class="modal-title" style="color: #ff0000 !important;">Update Expire Date</h4>
						// 			</div>
						// 			<form id="contact-form" class="contact-form" name="contact-form" method="post" enctype="multipart/form-data" action = "'. route("user.updatedate").'">
						// 			<div class="modal-body">
						// 			<div class="row">
						// 			'.csrf_field().'

						// 			<div class="col-sm-12">
						// 			<div class="form-group">
						// 			<input type="hidden" name="post_id" value="'.$result->id.'"/>
									
						// 			<input type="datetime-local" class="form-control" name="expiry" value="'.\Carbon\Carbon::parse($result->expired_at)->format('Y-m-d\TH:i').'" autocomplete="on">

						// 			</div>             
						// 			</div>   


						// 			</div>

						// 			</div>
						// 			<div class="modal-footer">
						// 			<div class="form-group">
						// 			<button type="submit" class="btn btn-danger pull-right">Submit</button>
						// 			</div>
						// 			</div>
						// 			</form>
						// 			</div>
						// 			</div>
						// 			</div>';

						// 			// echo $print;
						// 			// die; 
						// 				// echo "<pre>";
						// 				// print_r($result);  //not working working

						// 				//  die;
							
						// 		}else if ($result->consideration == '1'){
						// 			$print .= '<a href="'. route("search.donation.details",$result->key).'"><span class="text-color pull-right" title="'.$result->consideration_detail.'">'.$result->consideration_detail.'</span> </a>';
						// 		}else{
						// 			$print .= '<a href="'. route("search.donation.details",$result->key).'"><span class="text-color pull-right" title="'.$result->consideration_detail.'">'.$result->consideration_detail.'</span></a>';
						// 		}

						
						// 		if($result->is_complete == 0)
						// 		{
									
						// 			// echo $print;
						// 			// echo "<pre>";
						// 			// print_r($result);
						// 			//  		die; 
						// 				// this code not work

						// 				// echo $print;
						// 				// 	die; 

						// 				//error in $result->post_view_counter
						// 			// 	echo $print;
						// 			// die; 

						// 			// $print .=   '
						// 			// <div style=" cursor: pointer;">
						// 			//  <a href="javascript:void(0)" data-toggle="modal" data-target="#myModall12" title="Interested"  >
	     //    //                           <i class="fa fa-eye"></i><span> '.$result->post_view_counter.' </span></a>
	     //    //                         </div>';

						// 			//$result->post_view_counter   - no such param available
									
						// 			$print.=' <div class="modal fade" id="myModall12" role="dialog">
						// 			<div class="modal-dialog">

						// 			<!-- Modal content-->
						// 			<div class="modal-content">
						// 			<div class="modal-header">
						// 			<button type="button" class="close" style="color: #ff0000 !important;" data-dismiss="modal">&times;</button>
						// 			<h4 class="modal-title" style="color: #ff0000 !important;">List of Views</h4>
						// 			</div>
						// 			<div class="modal-body">
						// 			   <table class="table">
						// 					<thead>
						// 					  <tr>
						// 						<th>S.No.</th>
						// 						<th>Name</th>
						// 					  </tr>
						// 					</thead>
						// 					<tbody>
						// 				  ';
								
						// 		   $views = DB::table('donation_posts_views')->where('donation_posts_views.donation_post_id','=',$result->id)->select('users.name','users.image','donation_posts_views.donation_post_id')->join('users','users.id', '=','donation_posts_views.user_id')->get();
						// 			   // print_r($views); // no data
						// 			   // die;
						// 		   foreach ($views as $kyy => $viewd) {
						// 						$kyy = $kyy+1;
						// 						 $print .=' <tr>
						// 										<td>'.$kyy.'</td>
						// 										<td>'.$viewd->name.'</td>
						// 									  </tr>';
															
						// 				 }                  
						// 				$print .= '</tbody>
						// 				   </table>
						// 			';      
						// 			// foreach ($views as $kyy => $vi_ew) {

						// 			// 	$print.= '<tr><td>'.$kyy+1.'</td><td>'.$vi_ew->name;.'</td><td><img src="'.$vi_ew->image.'" alt="Image" class="img-responsive"></td></tr>';
						// 			// }




						// 			$print.='   </div>
						// 			</div>
						// 			</div>
						// 			</div>';
						// 			// this code is working
	     //                            $print .='<div class="dots-menu btn-group" style="float: right;">
						// 			  <a data-toggle="dropdown" ><i class="fa fa-ellipsis-v" style="font-size: 20px; padding: 10px; cursor: pointer;" title="Action button"></i></a>
									 
						// 			  <ul class="dropdown-menu">
						// 			    <li><a href="'.route("web.donation.edit.form",[$result->key]) .'" title="Update post" ><i class="fa fa-pencil-square-o"></i> Update</a></li>
									    
						// 			    <li><a href="'. route("user.donation.complete",[$result->key]) .'"   title="Close/Complete post"  ><i  class="fa fa-flag-o" ></i> Close Post</a></li>

						// 			    <li><a href=""  data-toggle="modal" data-target="#date" title="Extend post expiry"  ><i  class="fa fa-calendar" ></i> Extend</a></li>

						// 			    <li class="delete-row">
						// 			      <a href="'. route("user.donation.delete",[$result->key]) .'"  title="Delete post"><i class="fa fa-trash-o"></i> Delete</a>
						// 			    </li>
									    
									    
						// 			  </ul>
						// 			</div>' ;

						// 			// echo $print;
						// 			// 		die; 
										
						// 			// $print .=   '<a href="'. route("user.donation.complete",[$result->key]) .'">
						// 			// <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2 col-xl-2" style="padding-right: 0px;">
						// 			// <span class=" pull-right btn-pending" title="Make it complete"> Pending</span>
						// 			// </div>
						// 			// </a>
						// 			// ' ;
									

						// 			$print.= '
						// 			<div class="modal fade" id="open_pendingModal" role="dialog">
						// 			<div class="modal-dialog">

						// 			<!-- Modal content-->
						// 			<div class="modal-content">
						// 			<div class="modal-header">
						// 			<button type="button" class="close" style="color: #ff0000 !important;" data-dismiss="modal">&times;</button>
						// 			<h4 class="modal-title" style="color: #ff0000 !important;"> Success Story </h4>
						// 			</div>
						// 			<form  class="" name="contact-form" method="POST" action="'.route("user.donation.complete",[$result->key]).'"  enctype="multipart/form-data">
						// 			<div class="modal-body">
						// 			<div class="row">

						// 			<input type="hidden" name="key" value="'.$result->key.'">
						// 			<input type="hidden" name="key" value="32g8a1i8e3c0kbql915f914">
						// 			<div class="col-sm-12">
						// 			<div class="form-group">
						// 			<select class="form-control" name="complete_title" id="">
						// 			<option value="">Select Rating</option>
						// 			<option value="1">1</option>
						// 			<option value="2">2</option>
						// 			<option value="3">3</option>
						// 			<option value="4">4</option>
						// 			</select>
						// 			getItem  </div>             
						// 			</div>

						// 			<div class="col-sm-12">
						// 			<div class="form-group">
						// 			<input type="file" name ="image_file">
						// 			</div>
						// 			</div>
						// 			<div class="col-sm-12">
						// 			<div class="form-group">
						// 			<textarea name="complete_msg"  class="form-control" value="" rows="7" placeholder=" Description"></textarea>                                                 </div>             
						// 			</div>     
						// 			</div>

						// 			<div class="modal-footer">
						// 			<div class="form-group">
						// 			<input type="submit" class="btn btn-danger pull-right" value="Submit Your Story" name="submit">
						// 			</div>
						// 			</div>
						// 			</div>

						// 			</form>
						// 			</div>
						// 			</div>
						// 			</div>';

									

						// 		}
						// 		else
						// 		{
		    //                                 if(empty(trim($result->complete_title)))
									
						// 			//if($result->complete_title==' ')
						// 			{
										
						// 				$print .='<div class="dots-menu btn-group" style="float: right;">
						// 			  <a data-toggle="dropdown" ><i class="fa fa-ellipsis-v" style="font-size: 20px; padding: 5px; cursor: pointer;" title="Action button"></i></a>
									 
						// 			  <ul class="dropdown-menu">
									  
						// 			    <li><a href="javascript:void(0)" data-toggle="modal" data-target="#myModall"   title="Success Story"  ><i class="fa fa-edit"></i> Success Story</a></li>

									   	    
						// 			  </ul>

									
						// 			</div>' ;

									


						// 		$print.=' <div class="modal fade" id="myModall" role="dialog">
						// 		<div class="modal-dialog">

						// 		<!-- Modal content-->
						// 		<div class="modal-content">
						// 		<div class="modal-header">
						// 		<button type="button" class="close" style="color: #00a651 !important;" data-dismiss="modal">&times;</button>
						// 		<h4 class="modal-title" >Write success story of the post</h4>
						// 		</div>
						// 		<div class="modal-body">
						// 		<form id="contact-form" onsubmit="return checks()" class="contact-form" name="contact-form" method="post" enctype="multipart/form-data"  action = "'. route("user.storycomplete",[$result->key]).'">
								
						// 		<div class="modal-body">
						// 				<div class="row">
						// 				'.csrf_field().'

						// 				<div class="col-sm-12">
						// 				<div class="form-group">
						// 				<input type="hidden" name="post_id" value="'.$result->id.'"/>
						// 				<span>Title</span>
						// 				<input type="text" name="title" id="report" class="form-control"  rows="7" placeholder="Title" required>
										
						// 				<li class="error-li"  id="title_error" style="display:none;"> Title must have minimum 5 characters.</li>
						// 				</div>             
						// 				</div>   
						// 				<div class="col-sm-12">
						// 				<div class="form-group">
						// 				<span>Image</span>
						// 				<input type="file" name="image_file[]" id="report2" class="form-control" value="Title" rows="7" placeholder="image" accept="image/*" multiple/>
										
										
						// 				</div>           
										             
						// 				</div>   

						// 				<div class="col-sm-12">
						// 				<div class="form-group">
						// 				<span>Sucess Story</span>
										
						// 				<textarea name="desc" id="report3" class="form-control" value="" rows="7" placeholder="Sucess Story" required></textarea>
										
						// 				<li class="error-li"  id="desc_error" style="display:none;"> Description must have minimum 5 characters.</li>
						// 				</div>             
						// 				</div>   
						// 				</div>

						// 				</div>
						// 				<div class="modal-footer">
						// 				<div class="form-group">
						// 				<button type="submit" class="btn btn-main pull-right">Submit Post Story</button>
						// 				</div>
						// 				</div>
						// 		</form>
						// 		';





						// 		$print.='   </div>
						// 		</div>
						// 		</div>
						// 		</div>';


						// 		//    echo $print ;
									
						// 		//    die;

						// 			// $print.='<div class="modal fade" id="myModall" role="dialog">
						// 			// 	<div class="modal-dialog">

						// 			// 	<!-- Modal content-->
						// 			// 	<div class="modal-content">
						// 			// 	<div class="modal-header">
						// 			// 	<button type="button" class="close" style="color: #ff0000 !important;" data-dismiss="modal">&times;</button>
						// 			// 	<h4 class="modal-title" style="color: #ff0000 !important;">Write Your Sucess Story</h4>
						// 			// 	</div>
						// 			// 	<form id="contact-form" class="contact-form" name="contact-form" method="post" enctype="multipart/form-data" action=""'. route("user.storycomplete").'"">
						// 			// 	<div class="modal-body">
						// 			// 	<div class="row">
						// 			// 	'.csrf_field().'

						// 			// 	<div class="col-sm-12">
						// 			// 	<div class="form-group">
						// 			// 	<input type="hidden" name="post_id" value="'.$result->id.'"/>
						// 			// 	<input type="text" name="title" id="report" class="form-control" value="Title" rows="7" placeholder="Title">

						// 			// 	</div>             
						// 			// 	</div>   
						// 			// 	<div class="col-sm-12">
						// 			// 	<div class="form-group">

						// 			// 	<input type="file" name="image_file[]" id="report" class="form-control" value="Title" rows="7" placeholder="image" multiple/>

						// 			// 	</div>             
						// 			// 	</div>   

						// 			// 	<div class="col-sm-12">
						// 			// 	<div class="form-group">
						// 			// 	<textarea name="desc" id="report" class="form-control" value="" rows="7" placeholder="Sucess Story"></textarea>

						// 			// 	</div>             
						// 			// 	</div>   
						// 			// 	</div>

						// 			// 	</div>
						// 			// 	<div class="modal-footer">
						// 			// 	<div class="form-group">
						// 			// 	<button type="submit" class="btn btn-danger pull-right">Submit Your Story</button>
						// 			// 	</div>
						// 			// 	</div>
						// 			// 	</form>
						// 			// 	</div>
						// 			// 	</div>
						// 			// 	</div>';

						// 		// 		echo "<pre>";					
						// 		// 		//print_r($result);
						// 		//    echo $print ;
									
						// 		//    die;
									
						// 			}
						// 			else
						// 			{

									 
										
						// 				$print .=   '<div class="dots-menu btn-group" style="float: right;">
      //                                     <a data-toggle="dropdown" ><i class="fa fa-ellipsis-v" style="font-size: 20px;" ></i></a>
                                         
      //                                     <ul class="dropdown-menu">
                                            
      //                                       <li>
      //                                       <a href="javascript:void(0)" data-toggle="modal" data-target="#myModall1" title="Click to report"  ><i class="fa fa-eye" > Success story</i></a>

      //                                       </li>
                                           
                                           

      //                                     </ul>
      //                                   </div>' ;

										
						// 						// <li><a href="javascript:void(0);"><i class="fa fa-thumbs-up" ></i>  Completed</li>
										

									

						// 			}


						// 		}

						// 	}
						// }

						//haresh end
						// echo $print;  not working
						// die;
		                               // <a href="'. route("search.donation.details",$result->key).'"><h4 class="item-title">'. $result->description.'</h4></a>


                        $review = DB::table('donation_post_review')->where('donation_post_id','=',$result->id)->avg('rate_input');
                         $review=ceil($review);
						$print .='
						<div class="item-cat">
	                      <span><a href="#">'.$category->name.' >> '.$subcategory->name.' >> '. $specification->name.'</a></span>
	                    </div>

						<div class="" >
		                      <a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'" style="color: #727171;"><i class="fa fa-map-marker"></i>
		                      '. $city->name .' '. $city->state->name .' '. $city->state->country->name .' 
		                      </a>
	                    </div> 	

	                    	 ';

                    	
						 


						// $print .= '<a href="'. route("search.donation.details",$result->key).'">
					 // 		<div class="item-cat col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						// 		<span>'.$category->name.' >> '.$subcategory->name.' >> '. $specification->name.'</span></a> <br>';

						// $review=ceil($review);
						//  $print .='
						  
						//   <div class="rate">
						//     <div class="my">
      //                           <div class="star-rating">
      //                           ';
	                                
	     //                            // print_r($review);
	                                

	     //                            for($i=1; $i <= 5; $i++){
	                                	


	     //                            	if($i <= $review){

	     //                            		// echo $i;

	     //                            		 $print .='<span class="star" style="font-size: 24px; padding:2px; color: #deb217;">&#9733;</span>';


	     //                            	}
	     //                            	else{
	                                		
	     //                            		$print .='<span class="star" style="font-size: 24px; padding:2px;">&#9733;</span>';
	     //                            		// deb217
	     //                            	}
	     //                            }
	     //                            // die();
      //                   $print .='
      //                           </div>
      //                     	</div>
						// </div>';
						
						// if ($review == 0) {
						//   $print .='
						  
						

						// // echo $print;
						// // die;
						
						// }
						
						 $print .='  <!-- ad-meta -->
                  <div class="ad-meta " style="position: absolute;padding-left: 10px;">
                    <div class="meta-content col-xs-7 col-sm-7 col-md-7 col-lg-7 col-xl-7" style="line-height: normal;">
                      <a href="javascript:void(0)">'.\Carbon\Carbon::parse($result->created_at)->format('d-m-Y H:i').'  </a>
 
                   ';

                    $print .='
								 <!-- Add Star -->
		                       <div class="rate" style="color: #a0a0a0;">
		                            <div class="my">
		                                <div class="star-rating">';
												// print_r($review);
				                                

				                                for($i=1; $i <= 5; $i++){
				                                	


				                                	if($i <= $review){

				                                		// echo $i;

				                                		 $print .='<span class="star" style="font-size: 20px; padding-right:2px; color: #deb217;">&#9733;</span>';


				                                	}
				                                	else{
				                                		
				                                		$print .='<span class="star" style="font-size: 20px; padding-right:2px;">&#9733;</span>';
				                                		// deb217
				                                	}
				                                }
				                                // die();
			                        $print .='

		                                
		                                </div>
		                            </div>
		                        </div>
		                           <!-- Star End -->                  
		                  </div><!-- ad-info -->
						

		                  ';





                    $print .=' <!-- item-info-right -->
                    <div class="user-option pull-right" style="    padding-right: 10px;">';

                   if(Auth::guard('user')->check()){
		                          				// dd(Auth::guard('user')->user()->id );
		                          				// exit();
												// echo "<pre>";
												//   print_r($result->expired_at);
												//   die();

												
							if(Auth::guard('user')->user()->id == $result->user_id)
							{

								
								if($result->consideration == '0')
								{
									
										// 	echo "<pre>";
										// print_r($result);  //its working

										//  die;  
										
									// $print .=   '<br><a href="'. route("search.donation.details",$result->key).'"><span class="text-color pull-right">Free</span> </a>' ;

									// echo $print;
									// die; 

									
									// $print .=   '<a href="" data-toggle="modal" data-target="#date" title="Click to report" style="color: #55b23d !important; padding-top:2px;" ><span class=" pull-right " > <i class="fa fa-calendar" style="padding-right: 7px;">Expired_at</i></span></a>' ;
									

									//  this code not work

									// comment below code - haresh

									$print.=' <div class="modal fade" id="date" role="dialog">
									<div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
									<div class="modal-header">
									<button type="button" class="close" style="color: #ff0000 !important;" data-dismiss="modal">&times;</button>
									<h4 class="modal-title" style="color: #ff0000 !important;">Update Expire Date</h4>
									</div>
									<form id="contact-form" class="contact-form" name="contact-form" method="post" enctype="multipart/form-data" action = "'. route("user.updatedate").'">
									<div class="modal-body">
									<div class="row">
									'.csrf_field().'

									<div class="col-sm-12">
									<div class="form-group">
									<input type="hidden" name="post_id" value="'.$result->id.'"/>
									
									<input type="datetime-local" class="form-control" name="expiry" value="'.\Carbon\Carbon::parse($result->expired_at)->format('Y-m-d\TH:i').'" autocomplete="on">

									</div>             
									</div>   


									</div>

									</div>
									<div class="modal-footer">
									<div class="form-group">
									<button type="submit" class="btn btn-danger pull-right">Submit</button>
									</div>
									</div>
									</form>
									</div>
									</div>
									</div>';

									// echo $print;
									// die; 
										// echo "<pre>";
										// print_r($result);  //not working working

										//  die;
							
								}else if ($result->consideration == '1'){
									$print .= '<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><span class="text-color pull-right" title="'.$result->consideration_detail.'">'.$result->consideration_detail.'</span> </a>';
								}else{
									$print .= '<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><span class="text-color pull-right" title="'.$result->consideration_detail.'">'.$result->consideration_detail.'</span></a>';
								}

						
								if($result->is_complete == 0)
								{
									
									// echo $print;
									// echo "<pre>";
									// print_r($result);
									//  		die; 
										// this code not work

										// echo $print;
										// 	die; 

										//error in $result->post_view_counter
									// 	echo $print;
									// die; 

									// $print .=   '
									// <div style=" cursor: pointer;">
									//  <a href="javascript:void(0)" data-toggle="modal" data-target="#myModall12" title="Interested"  >
	        //                           <i class="fa fa-eye"></i><span> '.$result->post_view_counter.' </span></a>
	        //                         </div>';

									//$result->post_view_counter   - no such param available
									
									$print.=' <div class="modal fade" id="myModall12" role="dialog">
									<div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
									<div class="modal-header">
									<button type="button" class="close" style="color: #ff0000 !important;" data-dismiss="modal">&times;</button>
									<h4 class="modal-title" style="color: #ff0000 !important;">List of Views</h4>
									</div>
									<div class="modal-body">
									   <table class="table">
											<thead>
											  <tr>
												<th>S.No.</th>
												<th>Name</th>
											  </tr>
											</thead>
											<tbody>
										  ';
								
								   $views = DB::table('donation_posts_views')->where('donation_posts_views.donation_post_id','=',$result->id)->select('users.name','users.image','donation_posts_views.donation_post_id')->join('users','users.id', '=','donation_posts_views.user_id')->get();
									   // print_r($views); // no data
									   // die;
								   foreach ($views as $kyy => $viewd) {
												$kyy = $kyy+1;
												 $print .=' <tr>
																<td>'.$kyy.'</td>
																<td>'.$viewd->name.'</td>
															  </tr>';
															
										 }                  
										$print .= '</tbody>
										   </table>
									';      
									// foreach ($views as $kyy => $vi_ew) {

									// 	$print.= '<tr><td>'.$kyy+1.'</td><td>'.$vi_ew->name;.'</td><td><img src="'.$vi_ew->image.'" alt="Image" class="img-responsive"></td></tr>';
									// }




									$print.='   </div>
									</div>
									</div>
									</div>';
									// this code is working
	                                $print .='<div class="dots-menu btn-group" style="float: right;font-size: 14px;">
									  <a data-toggle="dropdown" ><i class="fa fa-ellipsis-v" style="font-size: 20px; padding: 10px; cursor: pointer;" title="Action button"></i></a>
									 
									  <ul class="dropdown-menu">
									    <li><a href="'.route("web.donation.edit.form",[$result->key]) .'" title="Update post" style="font-size: 14px;"><i class="fa fa-pencil-square-o"></i> Update</a></li>
									    
									    <li><a href="'. route("user.donation.complete",[$result->key]) .'"   title="Close/Complete post" style="font-size: 14px;" ><i  class="fa fa-flag-o" ></i> Close Post</a></li>

									    <li><a href=""  data-toggle="modal" data-target="#date" title="Extend post expiry" style="font-size: 14px;"  ><i  class="fa fa-calendar" ></i> Extend</a></li>

									    <li class="delete-row">
									      <a href="'. route("user.donation.delete",[$result->key]) .'"  title="Delete post" style="font-size: 14px;"><i class="fa fa-trash-o"></i> Delete</a>
									    </li>
									    
									    
									  </ul>
									</div>' ;

									// echo $print;
									// 		die; 
										
									// $print .=   '<a href="'. route("user.donation.complete",[$result->key]) .'">
									// <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2 col-xl-2" style="padding-right: 0px;">
									// <span class=" pull-right btn-pending" title="Make it complete"> Pending</span>
									// </div>
									// </a>
									// ' ;
									

									$print.= '
									<div class="modal fade" id="open_pendingModal" role="dialog">
									<div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
									<div class="modal-header">
									<button type="button" class="close" style="color: #ff0000 !important;" data-dismiss="modal">&times;</button>
									<h4 class="modal-title" style="color: #ff0000 !important;"> Success Story </h4>
									</div>
									<form  class="" name="contact-form" method="POST" action="'.route("user.donation.complete",[$result->key]).'"  enctype="multipart/form-data">
									<div class="modal-body">
									<div class="row">

									<input type="hidden" name="key" value="'.$result->key.'">
									<input type="hidden" name="key" value="32g8a1i8e3c0kbql915f914">
									<div class="col-sm-12">
									<div class="form-group">
									<select class="form-control" name="complete_title" id="">
									<option value="">Select Rating</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									</select>
									getItem  </div>             
									</div>

									<div class="col-sm-12">
									<div class="form-group">
									<input type="file" name ="image_file">
									</div>
									</div>
									<div class="col-sm-12">
									<div class="form-group">
									<textarea name="complete_msg"  class="form-control" value="" rows="7" placeholder=" Description"></textarea>                                                 </div>             
									</div>     
									</div>

									<div class="modal-footer">
									<div class="form-group">
									<input type="submit" class="btn btn-danger pull-right" value="Submit Your Story" name="submit">
									</div>
									</div>
									</div>

									</form>
									</div>
									</div>
									</div>';

									

								}
								else
								{
		                                    if(empty(trim($result->complete_title)))
									
									//if($result->complete_title==' ')
									{
										
										$print .='<div class="dots-menu btn-group" style="float: right;">
									  <a data-toggle="dropdown" ><i class="fa fa-ellipsis-v" style="font-size: 20px; padding: 5px; cursor: pointer;" title="Action button"></i></a>
									 
									  <ul class="dropdown-menu">
									  
									    <li><a href="javascript:void(0)" data-toggle="modal" data-target="#myModall"   title="Success Story"  style="font-size: 14px;" ><i class="fa fa-edit"></i> Success Story</a></li>

									   	    
									  </ul>

									
									</div>' ;

									


								$print.=' <div class="modal fade" id="myModall" role="dialog">
								<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
								<div class="modal-header">
								<button type="button" class="close" style="color: #00a651 !important;" data-dismiss="modal">&times;</button>
								<h4 class="modal-title" >Write success story of the post</h4>
								</div>
								<div class="modal-body">
								<form id="contact-form" onsubmit="return checks()" class="contact-form" name="contact-form" method="post" enctype="multipart/form-data"  action = "'. route("user.storycomplete",[$result->key]).'">
								
								<div class="modal-body">
										<div class="row">
										'.csrf_field().'

										<div class="col-sm-12">
										<div class="form-group">
										<input type="hidden" name="post_id" value="'.$result->id.'"/>
										<span>Title</span>
										<input type="text" name="title" id="report" class="form-control"  rows="7" placeholder="Title" required>
										
										<li class="error-li"  id="title_error" style="display:none;"> Title must have minimum 5 characters.</li>
										</div>             
										</div>   
										<div class="col-sm-12">
										<div class="form-group">
										<span>Image</span>
										<input type="file" name="image_file[]" id="report2" class="form-control" value="Title" rows="7" placeholder="image" accept="image/*" multiple/>
										
										
										</div>           
										             
										</div>   

										<div class="col-sm-12">
										<div class="form-group">
										<span>Sucess Story</span>
										
										<textarea name="desc" id="report3" class="form-control" value="" rows="7" placeholder="Sucess Story" required></textarea>
										
										<li class="error-li"  id="desc_error" style="display:none;"> Description must have minimum 5 characters.</li>
										</div>             
										</div>   
										</div>

										</div>
										<div class="modal-footer">
										<div class="form-group">
										<button type="submit" class="btn btn-main pull-right">Submit Post Story</button>
										</div>
										</div>
								</form>
								';





								$print.='   </div>
								</div>
								</div>
								</div>';


								//    echo $print ;
									
								//    die;

									// $print.='<div class="modal fade" id="myModall" role="dialog">
									// 	<div class="modal-dialog">

									// 	<!-- Modal content-->
									// 	<div class="modal-content">
									// 	<div class="modal-header">
									// 	<button type="button" class="close" style="color: #ff0000 !important;" data-dismiss="modal">&times;</button>
									// 	<h4 class="modal-title" style="color: #ff0000 !important;">Write Your Sucess Story</h4>
									// 	</div>
									// 	<form id="contact-form" class="contact-form" name="contact-form" method="post" enctype="multipart/form-data" action=""'. route("user.storycomplete").'"">
									// 	<div class="modal-body">
									// 	<div class="row">
									// 	'.csrf_field().'

									// 	<div class="col-sm-12">
									// 	<div class="form-group">
									// 	<input type="hidden" name="post_id" value="'.$result->id.'"/>
									// 	<input type="text" name="title" id="report" class="form-control" value="Title" rows="7" placeholder="Title">

									// 	</div>             
									// 	</div>   
									// 	<div class="col-sm-12">
									// 	<div class="form-group">

									// 	<input type="file" name="image_file[]" id="report" class="form-control" value="Title" rows="7" placeholder="image" multiple/>

									// 	</div>             
									// 	</div>   

									// 	<div class="col-sm-12">
									// 	<div class="form-group">
									// 	<textarea name="desc" id="report" class="form-control" value="" rows="7" placeholder="Sucess Story"></textarea>

									// 	</div>             
									// 	</div>   
									// 	</div>

									// 	</div>
									// 	<div class="modal-footer">
									// 	<div class="form-group">
									// 	<button type="submit" class="btn btn-danger pull-right">Submit Your Story</button>
									// 	</div>
									// 	</div>
									// 	</form>
									// 	</div>
									// 	</div>
									// 	</div>';

								// 		echo "<pre>";					
								// 		//print_r($result);
								//    echo $print ;
									
								//    die;
									
									}
									else
									{

									 
										
										$print .=   '<div class="dots-menu btn-group" style="float: right;">
                                          <a data-toggle="dropdown" ><i class="fa fa-ellipsis-v" style="font-size: 20px;" ></i></a>
                                         
                                          <ul class="dropdown-menu">
                                            
                                            <li>
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#myModall1" title="Click to report"  ><i class="fa fa-eye" > Success story</i></a>

                                            </li>
                                           
                                           

                                          </ul>
                                        </div>' ;

										
												// <li><a href="javascript:void(0);"><i class="fa fa-thumbs-up" ></i>  Completed</li>
										

									

									}


								}

							}
						}



						if(Auth::guard('user')->check()){
		                          			
							if(Auth::guard('user')->user()->id == $result->user_id)
							{
								if($result->is_complete == 0)
								{
								
								  
	                               $print .=  '<a href="javascript:void(0)" data-toggle="modal" data-target="#myModall12" title="'.$result->post_view_counter.'"  ><span   data-toggle="tooltip" data-placement="top" title="'.$result->post_view_counter.'"><i class="fa fa-eye"></i> </span> </a>';
	                           }

							}
						}
                    if($user_type->id == '1')
						{

							// echo "<pre>";
							// print_r($result);  //its working

							// 	die;

							$print .=  ' <a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><span  data-toggle="tooltip" data-placement="top" title="'. $user_type->name .'"><i class="fa fa-share-square-o"></i> </span> </a>';

				

						}
						else if($user_type->id == '3')
						{
							$print .=  ' <a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><span  data-toggle="tooltip" data-placement="top" title="'. $user_type->name .'"><i class="fa fa-shopping-basket"></i> </span></a>';
						}
						else 
						{
							$print .=  ' <a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><span  data-toggle="tooltip" data-placement="top" title="'. $user_type->name .'"><i class="fa fa-handshake-o"></i> </span> </a>';


						}

						

						if(!empty($result->helper_status)){
							if($result->helper_status){
								$print .=  '<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><span   data-toggle="tooltip" data-placement="top" title="Organization"><i class="fa fa-building"></i> </span> </a>';
							}else {
								$print .=  '<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><span   data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user-secret"></i> </span> </a>';
							}
						}else{
							if($result->d_status){
								$print .=  '<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><span   data-toggle="tooltip" data-placement="top" title="Organization"><i class="fa fa-building"></i> </span> </a>';
							}else {
								$print .=  '<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><span   data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user-secret"></i> </span> </a>';
							}
						}

						if(Auth::guard('user')->check()){
		                          			
							if(Auth::guard('user')->user()->id == $result->user_id)
							{
								if($result->is_complete == 0)
								{
								
								  $print .=  '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top"  title="Free"  > <span  style="font-size: 15px;"> Free </span>  </a>';
	                              
	                           }

							}
						}



                     // $print .=  '  <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                     //  <a class="online" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dealer"><i class="fa fa-suitcase"></i> </a> ';

                     $print .=  '                     
                    </div><!-- item-info-right -->
                  </div><!-- ad-meta -->
				</div><!-- item-info -->
              </div><!-- ad-item -->
              </div><!-- ad-item -->
              ';


      //              $print .=
      //              '<div class="ad-meta col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="bottom: 0;/* position: absolute; */" >
                        
						// <div class="meta-content col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
						// <a href="javascript:void(0)">'.\Carbon\Carbon::parse($result->created_at)->format('d-m-Y H:i').' </span> </a>

						// <!-- <a href="'. route("search.donation.details",$result->key).'"><i class="fa fa-tags"></i> ';


						// // echo $print;
						// // die;

						// if($result->condition == 1) 
						// 	$print .= "New";
						// else
						// 	$print .= "Used";
						// $print .=' </a> -->
						// <br>    
						// <!-- <i class="fa fa-map-marker"></i> '. $result->address .'    -->

						// <a href="'. route("search.donation.details",$result->key).'"><i class="fa fa-map-marker"></i> '. $city->name .' '. $city->state->name .' '. $city->state->country->name .' 
						// </div>									
						// <!-- item-info-right -->
						// <div class="user-option text-right col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4" style="display: flex;"> 

						// </a>'; 



						// if($user_type->id == '1')
						// {

						// 	// echo "<pre>";
						// 	// print_r($result);  //its working

						// 	// 	die;

						// 	$print .=  ' <a href="'. route("search.donation.details",$result->key).'"><span  data-toggle="tooltip" data-placement="top" title="'. $user_type->name .'"><i class="fa fa-share-square-o"></i> </span> </a>';

				

						// }
						// else if($user_type->id == '3')
						// {
						// 	$print .=  ' <a href="'. route("search.donation.details",$result->key).'"><span  data-toggle="tooltip" data-placement="top" title="'. $user_type->name .'"><i class="fa fa-shopping-basket"></i> </span></a>';
						// }
						// else 
						// {
						// 	$print .=  ' <a href="'. route("search.donation.details",$result->key).'"><span  data-toggle="tooltip" data-placement="top" title="'. $user_type->name .'"><i class="fa fa-handshake-o"></i> </span> </a>';


						// }

						// if(!empty($result->helper_status)){
						// 	if($result->helper_status){
						// 		$print .=  '<a href="'. route("search.donation.details",$result->key).'"><span   data-toggle="tooltip" data-placement="top" title="Organization"><i class="fa fa-building"></i> </span> </a>';
						// 	}else {
						// 		$print .=  '<a href="'. route("search.donation.details",$result->key).'"><span   data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user-secret"></i> </span> </a>';
						// 	}
						// }else{
						// 	if($result->d_status){
						// 		$print .=  '<a href="'. route("search.donation.details",$result->key).'"><span   data-toggle="tooltip" data-placement="top" title="Organization"><i class="fa fa-building"></i> </span> </a>';
						// 	}else {
						// 		$print .=  '<a href="'. route("search.donation.details",$result->key).'"><span   data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user-secret"></i> </span> </a>';
						// 	}
						// }

						// 						// $print .=  '<a href="'. route("search.donation.details",$result->key).'"><span   data-toggle="tooltip" data-placement="top" title="Write a Review"><i class="fa fa-pencil"></i> </span> </a>';

						// $print .=  '</div><!-- item-info-right -->

						// </div>
						// </div><!-- ad-info -->


						// </div><!-- item-info -->
						// </div><!-- ad-item -->
						// </div><!-- row -->
						// ';

					}
					$sucess_story=0;
				}

            //  echo "<pre>";
            // 		print_r($city);
            // 		die;
				
			}else{
				$print = '<div class="alert alert-info" style="margin-top: 15px;"><center>There is no donation post related to your search.</center></div>';
			}
			
            		// echo $print;
            		// die();
			return $print;


		}	

		public function getDonationPost(Request $request)
		{

			$results = array();
			if($request->key == 1){
				$results =  DB::table('donation_posts')
				->where('status',1)
				->orderBy('created_at','desc')
				->limit(20)
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
					->limit(20)
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

			$posts =  DB::table('favourite_posts')->where('user_id',Auth::guard('user')->user()->id)->where('status',1)->limit(20)->get();
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
				echo '<div class="alert alert-info">There is no favorite post.</div>';
			}
		}



    //get list of product 
		public function getMyDonation(Request $request)
		{
			$donation_posts =  DB::table('donation_posts')->where('status',1) ->where('user_id',Auth::guard('user')->user()->id)    ->orderBy('created_at','desc')->limit(20)->get();

			if(!empty($donation_posts[0])){                    
				echo $this->printData($donation_posts,array(), array());
			}else{
				echo '<div class="alert alert-info">There is no post.</div>';
			}
		}


    //list of urgent donation of user by user id
		public function getUrgentRequirement(Request $request)
		{
			$donation_posts =  DB::table('donation_posts')->where('status',1)->where('is_urgent',1) ->where('user_id',Auth::guard('user')->user()->id)    ->orderBy('created_at','desc')->limit(20)->get();
			if(!empty($donation_posts[0])){                    
				echo $this->printData($donation_posts,array(), array());
			}else{
				echo '<div class="alert alert-info">There is no urgent post.</div>';
			}
		}

    //list of all complete donation by user
		public function getCompleteDonation(Request $requset)
		{
			$donation_posts =  DB::table('donation_posts_completed')->where('status',1)->where('is_complete',1) ->where('user_id',Auth::guard('user')->user()->id)->orderBy('created_at','desc')->limit(20)->get();
			if(!empty($donation_posts[0])){
				// echo "<pre>";     
				// print_r($donation_posts);
				// die();               
				echo $this->printData($donation_posts,array(), array());
			}else{
				echo '<div class="alert alert-info">There is no post completed.</div>';
			}
		}

		public function getpandingDonation(Request $request)
		{
			$donation_posts =  DB::table('donation_posts')->where('status',1)->where('is_complete',0) ->where('user_id',Auth::guard('user')->user()->id)    ->orderBy('created_at','desc')->limit(20)->get();
			if(!empty($donation_posts[0]))
			{                    
				echo $this->printData($donation_posts,array(), array());
			}else
			{
				echo '<div class="alert alert-info">There is no post pending.</div>';
			}
		}




		public function sucessstory(Request $request)
		{


    	// $donation_posts =  DB::table('donation_posts')->where('status',1) ->where('user_id',Auth::guard('user')->user()->id)    ->orderBy('created_at','desc')->limit(20)->get();
     //    if(!empty($donation_posts[0])){                    
     //        echo $this->printData($donation_posts,array(), array());
     //    }else{
     //        echo '<div class="alert alert-info">There is no Donation Post.</div>';
     //    }

    		// echo '<div class="alert alert-info">There is no Panding Donation Post.</div>';
		}


    // public function sucessstory(Request $request)
    // { 
    //     if (Auth::guard('user')->check()){
    //         $user = Auth::guard('user')->user()->id;
    //     }else{
    //         session()->flash('error', 'You must logged in before report against any post.');
    //        return redirect('/user/login');
    //     }
    //     $this->validate($request , [
    //         'report_subject' => 'required|min:5',
    //         'report' => 'required|min:10'
    //     ]);

    //     $id = DB::table('donation_posts')->where('key',$request->key)->select('key','id')->first();
    //     DB::table('donation_post_story')->insert([
    //        'report' => $request->report,
    //        'key' => generateKey(17),
    //        'report_subject' => $request->report_subject,
    //        'user_id' => $user,
    //        'donation_post_id' => $id->id,
    //        'created_at' => new \DateTime(),
    //        'updated_at' => new \DateTime()
    //     ]);

    //     session()->flash('error', 'Repost against this post has been submitted.');
    //     return redirect(URL::previous());
    // }


		/* My Account Functions End */
	} 
