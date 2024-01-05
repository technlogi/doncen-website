@extends('user.layout.master')
@section('title','Category List')
@section('content')
   <!-- main -->   
   <section id="main" class="clearfix category-page">
            <div class="container">
                <div class="breadcrumb-section">
                    <!--breadcrumb--> 
                    <ol class="breadcrumb">
                         <li><a href="">Home</a></li>
                        <li>Search</li>
                    </ol>
                    <!--breadcrumb--> 						
                    <h2 class="title">Search to fulfill your needs</h2>
                </div>
                <div class="banner">

                    <!-- banner-form -->
                    <div class="banner-form banner-form-full">
                    <form method="post" id="search_form" action="#" autocomplete="off">
									@php
									      $Sessiondata = session()->get('search');
									@endphp
										  @if(!empty($Sessiondata))
											
														@if(!empty($Sessiondata[0]))
															@php
																$homeCity = $Sessiondata[0]['city_search_box'];
																$homeCategory = $Sessiondata[0]['category_box'];
																$homeword = $Sessiondata[0]['word_box'];
															@endphp
															@else
																@php
																$homeCity = '';
																$homeCategory = '';
																$homeword = '';
															@endphp
															
														@endif
												@else
													@php
													$homeCity = '';
													$homeCategory = '';
													$homeword = '';
												@endphp		
										  @endif
                                <!-- language-dropdown -->
                            <!-- <div class="dropdown category-dropdown"> 						
                                <input type="text" name="city_search_box" placeholder="Enter City" id="city_search_box" value="{{ old('city_search_box') }}">
                            </div> -->
                            <!-- language-dropdown -->
                            <div class="dropdown category-dropdown">		
                                <input type="text"  list="cityBrowsers" value="{{$homeCity}}" name="city_search_box" placeholder="Enter City" id=''>
                                <datalist id="cityBrowsers" >
                                    @foreach($cities as $city)
                                    <option value="{{$city->name}}">
                                    @endforeach
                                </datalist>
                            </div>


                            <div class="dropdown category-dropdown">		
                               <input type="text"  list="browsers" name="category_box" value="{{$homeCategory}}" placeholder="Enter Category" id='category_box'>
                                <datalist id="browsers" >
                                    @foreach($categories as $category)
                                    <option value="{{$category->name}}" >
                                    @endforeach
                                </datalist>
                            </div> 
                            <div class="dropdown category-dropdown">
                                <input type="text" name="word_box" placeholder="Type Your key word" value="{{$homeword}}">
                            </div>
                            <button type="submit" class="form-control"  value="Search">Search</button>
                        </form>
                    </div><!-- banner-form -->
                </div>

                <div class="category-info">	
                    <div class="row">
                        <!-- accordion-->
                        <div class="col-md-3 col-sm-4">
                            <div class="accordion">
                                <!-- panel-group -->
                                <div class="panel-group" id="accordion">
                                    <div class="panel-default panel-faq">
                                        <!-- panel-heading -->
                                        <div class="panel-heading">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#accordion-four">
                                                <h4 class="panel-title">
                                                    Looking For
                                                    <span class="pull-right"><i class="fa fa-angle-down "></i></span>
                                                </h4>
                                            </a>
                                        </div><!-- panel-heading -->

                                        <div id="accordion-four" class="panel-collapse collapse in">
                                            <!-- panel-body -->
                                            <div class="panel-body">
                                             <form method="post" id="myForm">
                                            @foreach($user_types as $user_type)
                                                   <label class="checkbox-design">
                                                        <input type="checkbox" name="ut" class="categoryClass" value="{{ $user_type->id }}">{{ $user_type->name}}
                                                        <span class="checkmark"></span>
                                                    </label>
                                                   <!-- <label for="donor"><input type="checkbox" name="ut" class="categoryClass" value="{{ $user_type->id }}"> {{ $user_type->name}}</label> -->
                                                @endforeach
                                            </form> 
                                            </div><!-- panel-body -->
                                        </div>
                                    </div><!-- panel -->
                                   
                                    <!-- panel -->
                                    <div class="panel-default panel-faq">                                        
                                        <!-- panel-heading -->
                                        <div class="panel-heading">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#accordion-one">
                                                <h4 class="panel-title">Categories<span class="pull-right"><i class="fa fa-angle-down"></i></span></h4>
                                            </a>
                                        </div><!-- panel-heading -->

                                        <div id="accordion-one" class="panel-collapse collapse  @if(Session::has('homePageCategoryId')) in @endif">

                                            <!-- panel-body -->
                                            <div class="panel-body">
                                                <form method="post" id="categoryForm">
                                                   @foreach($categories as $category)
                                                        <!-- <label for="{{$category->name}}">
															@php
																$catId = Session::get('homePageCategoryId');
                                                            @endphp
															<input type="checkbox" name="ct" class="selectCategory" @if(Session::has('homePageCategoryId')) {{$catId==$category->id?'checked':''}} @endif value="{{$category->id}}">{{$category->name}} 
                                                            <span> ({{$category->total_post}})</span>
                                                        </label> -->

                                                        <label class="checkbox-design">
                                                            @php
                                                                $catId = Session::get('homePageCategoryId');
                                                            @endphp
                                                            <input type="checkbox" name="ct" class="selectCategory" @if(Session::has('homePageCategoryId')) {{$catId==$category->id?'checked':''}} @endif value="{{$category->id}}">{{$category->name}}
                                                            <span>({{$category->total_post}})</span>
                                                            <span class="checkmark"></span>
                                                        </label>

                                                   @endforeach
                                                </form> 
                                            </div><!-- panel-body -->
                                        </div>
                                    </div><!-- panel -->
                                    <!-- panel -->
                                    <div class="panel-default panel-faq">                                        
                                        <!-- panel-heading -->
                                        <div class="panel-heading">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#sub-categories">
                                                <h4 class="panel-title">Sub-Categories<span class="pull-right"><i class="fa fa-angle-down"></i></span></h4>
                                            </a>
                                        </div><!-- panel-heading -->

                                        <div id="sub-categories" class="panel-collapse collapse ">

                                            <!-- panel-body -->
                                            <div class="panel-body">
                                                <div class="subcategories"></div>
                                            </div><!-- panel-body -->
                                        </div>
                                    </div><!-- panel -->
                                    <!-- panel -->
                                    <div class="panel-default panel-faq">                                        
                                        <!-- panel-heading -->
                                        <div class="panel-heading">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#specification">
                                                <h4 class="panel-title">Specification<span class="pull-right"><i class="fa fa-angle-down"></i></span></h4>
                                            </a>
                                        </div><!-- panel-heading -->

                                        <div id="specification" class="panel-collapse collapse ">

                                            <!-- panel-body -->
                                            <div class="panel-body">
                                                <div class="specificationHtml"></div>
                                            </div><!-- panel-body -->
                                        </div>
                                    </div><!-- panel -->

                                    <!-- panel -->
                                    <div class="panel-default panel-faq">
                                        <!-- panel-heading -->
                                        <div class="panel-heading">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#accordion-two">
                                                <h4 class="panel-title">Condition<span class="pull-right"><i class="fa fa-angle-down"></i></span></h4>
                                            </a>
                                        </div><!-- panel-heading -->

                                        <div id="accordion-two" class="panel-collapse collapse">
                                            <!-- panel-body -->
                                            <div class="panel-body">
                                            <form method="post" id="conditionForm">
                                                <label class="checkbox-design"><input type="checkbox" class="conditionInput" name="cd" id="newSearch" value="1"> New <span class="checkmark"></span></label>
                                                <label class="checkbox-design"><input type="checkbox" class="conditionInput" name="cd" id="usedSearch" value="2"> Used <span class="checkmark"></span></label>
                                            </form>     
                                            </div><!-- panel-body -->
                                        </div>
                                    </div><!-- panel -->

                                    <!-- panel -->
                                    <div class="panel-default panel-faq">
                                        <!-- panel-heading -->
                                        <div class="panel-heading">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#accordion-three">
                                                <h4 class="panel-title">
                                                    Consideration
                                                    <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                                                </h4>
                                            </a>
                                        </div><!-- panel-heading -->

                                        <div id="accordion-three" class="panel-collapse collapse">
                                            <!-- panel-body -->
                                            <div class="panel-body">
                                            <form method="post" id="considerationTypeForm">
                                                <label class="checkbox-design"><input type="checkbox" name="cs" id="anyConsideration" value="5"> Any <span class="checkmark"></span></label>
                                                <label class="checkbox-design"><input type="checkbox" name="cs" id="freeConsideration" value="0"> Free <span class="checkmark"></span></label>
                                                <label class="checkbox-design"><input type="checkbox" name="cs" id="monetaryConsideration" value="2"> Monetary <span class="checkmark"></span></label>
                                                <label class="checkbox-design"><input type="checkbox" name="cs" id="nonMonetaryConsideration" value="1"> Non-Monetary <span class="checkmark"></span></label>
                                            </form>    
                                            </div><!-- panel-body -->
                                        </div>
                                    </div><!-- panel -->
                                    <!-- panel -->
                                    <div class="panel-default panel-faq">
                                        <!-- panel-heading -->
                                        <div class="panel-heading">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#type-of-donation">
                                                <h4 class="panel-title">Type of Donation<span class="pull-right"><i class="fa fa-angle-down"></i></span></h4>
                                            </a>
                                        </div><!-- panel-heading -->

                                        <div id="type-of-donation" class="panel-collapse collapse">
                                            <!-- panel-body -->
                                            <div class="panel-body">
                                                <form method="post" id="donationTypeForm">
                                                    @foreach($donation_types as $donation_type)
                                                        <label class="checkbox-design"><input type="checkbox" name="td" value="{{$donation_type->id}}" class="donationTypeCategory"> {{$donation_type->name}} <span class="checkmark"></span></label>
                                                    @endforeach
                                                </form>    
                                            </div><!-- panel-body -->
                                        </div>
                                    </div><!-- panel -->

                                    <!-- panel -->
                                    <div class="panel-default panel-faq">
                                        <!-- panel-heading -->
                                        <div class="panel-heading">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#preference">
                                                <h4 class="panel-title">Preference<span class="pull-right"><i class="fa fa-angle-down"></i></span></h4>
                                            </a>
                                        </div><!-- panel-heading -->

                                        <div id="preference" class="panel-collapse collapse">
                                            <!-- panel-body -->
                                            <div class="panel-body">
												<form method="post" id="preferenceTypeFormGenderList">
												<label class="checkbox-design"><input type="checkbox" name="all" id="All" value="" class="preference">  All <span class="checkmark"></span></label>
                                                <label class="checkbox-design"><input type="checkbox" name="gender" value="gender" id="gender" class="preference">Gender <span class="checkmark"></span></label>
                                                <label class="checkbox-design"><input type="checkbox" name="age" id="age" value="age" class="preference">Age <span class="checkmark"></span></label>
												</form>
											</div><!-- panel-body -->
                                        </div>
                                    </div><!-- panel -->                                    
                                </div><!-- panel-group -->
                            </div>
                        </div><!-- accordion-->

                        <!-- recommended-ads -->
                        <div class="col-sm-8 col-md-9">				
                            <div class="section recommended-ads">
                                <!-- featured-top -->
                                <div class="featured-top">
                                    <h4>Recommended donation</h4>
                                    <div class="dropdown pull-right">

                                        <!-- category-change -->
                                        <div class="dropdown category-dropdown">
                                            <h5>Sort by:</h5>						
                                            <select id="dropdownSearch" class="form-controll" >
                                                <option value="1">All</option>
                                                <option value="2">Newest</option>
                                                <option value="3">Oldest</option>
                                                <option value="6">Urgent</option>
                                                <option value="4">Price Low-High</option>
                                                <option value="5">Price High-Low</option>
                                            </select>								
                                        </div><!-- category-change -->														
                                    </div>							
                                </div><!-- featured-top -->	
                             <div class="appendText"></div>
                             <div class="ajax-loading"><img src="{{ asset('images/uploads/loading.gif') }}" /></div>
                            </div>
                        </div><!-- recommended-ads -->
                    </div>	
                </div>
            </div><!-- container -->
        </section><!-- main -->


        <section id="something-sell" class="clearfix parallax-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h2 class="title">Do you have something-Donate?</h2>
                        <h4>Donate anything, whatever you can think on Doncen.com</h4>
                        <a href="{{ route('web.donation.category') }}" class="btn btn-primary">Donate Now</a>
                    </div>
                </div><!-- row -->
            </div><!-- contaioner -->
        </section><!-- something-sell -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@push('javaScript')
<script src="{{ URL::asset('/js/user/js/jquery.min.js')}}"></script>
<script src="{{ URL::asset('/js/user/js/jquery-ui.min.js')}}"></script>
<script>

$(function(){
    function initializeAddress() {
      var input = document.getElementById('city_search_box');
      var options = {
        types: ['geocode'] //this should work !
      };
      var autocomplete = new google.maps.places.Autocomplete(input, options);
    }
   
   google.maps.event.addDomListener(window, 'load', initializeAddress);
    var page = 1;      
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	
    function call_ajax(url,data){
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
            type        : 'POST',
            url         : url, // the url where we want to POST
            data        : {data: data},
            beforeSend: function()
            {
                $('.ajax-loading').show();
            },
            success: function(data){
                if(data.length == 0){
                    $('.ajax-loading').html("<div class='alert alert-info'><center>No more records!</center></div>");
                    return;
                }
                $('.ajax-loading').hide(); 
                $('.appendText').html(data);
	
            }
        });
    }
	
	
	@if(!Session::has('search'))
		/* call_ajax("{{ URL::route('web.home.getItemOnLoad')}}",{page: 0}); */
		SearchFormSubmit();
	@endif
   
    /* New Js Code Start*/
	
	
	
	/* For Home Page Re-Direct Search Values Call  End */
    $("#search_form").submit(function(e){
         e.preventDefault();
		 
         /*Get all the forms data*/
         /* var dropdownSearch=$('#dropdownSearch').val();
         var search_form=$('#search_form').serializeArray();
         var looking_for=$('#myForm').serializeArray();
         var categoryForm=$('#categoryForm').serializeArray();
         var subCategoryForm=$('#subCategoryForm').serializeArray();
         var specificationForm=$('#specificationForm').serializeArray();
         var conditionForm=$('#conditionForm').serializeArray();
         var considerationTypeForm=$('#considerationTypeForm').serializeArray();
         var donationTypeForm=$('#donationTypeForm').serializeArray();
         var preferenceTypeFormGenderList=$('#preferenceTypeFormGenderList').serializeArray();
            console.log($('#search_form').serializeArray());
            console.log($('#myForm').serializeArray());
         
        call_ajax("{{ route('home.searchPage.searchItem') }}",{
                    page: 1,
                    dropdownSearch:dropdownSearch,
                    data: $('#search_form').serializeArray(),
                    looking_for: $('#myForm').serializeArray(),
                    categoryForm: $('#categoryForm').serializeArray(),
                    subCategoryForm:$('#subCategoryForm').serializeArray(),
                    specificationForm:$('#specificationForm').serializeArray(),
                    conditionForm:$('#conditionForm').serializeArray(),
                    considerationTypeForm:$('#considerationTypeForm').serializeArray(),
                    donationTypeForm:$('#donationTypeForm').serializeArray(),
                    preferenceTypeFormGenderList:$('#preferenceTypeFormGenderList').serializeArray()
        }); */
		SearchFormSubmit();
    });

    /* New Js Code End*/



/* For Home Page Re-Direct Search Values Call  Start */
	/*Get all the forms data*/
			function SearchFormSubmit()
			{
					/*Get all the forms data*/
					 var dropdownSearch=$('#dropdownSearch').val();
					 var search_form=$('#search_form').serializeArray();
					 var looking_for=$('#myForm').serializeArray();
					 var categoryForm=$('#categoryForm').serializeArray();
					 var subCategoryForm=$('#subCategoryForm').serializeArray();
					 var specificationForm=$('#specificationForm').serializeArray();
					 var conditionForm=$('#conditionForm').serializeArray();
					 var considerationTypeForm=$('#considerationTypeForm').serializeArray();
					 var donationTypeForm=$('#donationTypeForm').serializeArray();
					 var preferenceTypeFormGenderList=$('#preferenceTypeFormGenderList').serializeArray();
						console.log($('#search_form').serializeArray());
						console.log($('#myForm').serializeArray());
					 
					call_ajax("{{ route('home.searchPage.searchItem') }}",{
								page: 0 ,
								dropdownSearch:dropdownSearch,
								data: $('#search_form').serializeArray(),
								looking_for: $('#myForm').serializeArray(),
								categoryForm: $('#categoryForm').serializeArray(),
								subCategoryForm:$('#subCategoryForm').serializeArray(),
								specificationForm:$('#specificationForm').serializeArray(),
								conditionForm:$('#conditionForm').serializeArray(),
								considerationTypeForm:$('#considerationTypeForm').serializeArray(),
								donationTypeForm:$('#donationTypeForm').serializeArray(),
								preferenceTypeFormGenderList:$('#preferenceTypeFormGenderList').serializeArray()

			});
		}
	
	@if($homeCity!='' || $homeCategory!='' || $homeword!='')
			SearchFormSubmit();
	@endif
		


    //Get list of category and subcateegory
		$('.categoryClass').click(function() {
			SearchFormSubmit();
    });
	
	/* preference */
		$('.preference').click(function() {
			SearchFormSubmit();
    });	
    $('.selectCategory').click(function() {
       	SearchFormSubmit();
		$.ajax({
            type        : 'POST',
			dataType    : 'JSON',
            url         : "{{ URL::route('search.category.subcategory') }}", // the url where we want to POST
            data        : {data: $('#categoryForm').serialize()},
            success: function(data){
                $('.subcategories').html(data);
            }
        });
    });

    //drop down search
    $("#dropdownSearch").on('change',function(){
			SearchFormSubmit();
    });

    //category wise search
    $(".donationTypeCategory").click(function() {
			SearchFormSubmit();
    });

    //anyConsideration wise search
    $("#considerationTypeForm").click(function() {
			SearchFormSubmit();
    });

    //condition wise search
    $(".conditionInput").click(function() {
		SearchFormSubmit();
    });
   
    $(document).on('click','.selectSubCategory',function(){
		SearchFormSubmit();
		 $.ajax({
				type        : 'POST',
				url         : "{{ URL::route('search.subcategory.specification') }}", // the url where we want to POST
				data        : {data: $('#subCategoryForm').serialize()},
				success: function(data){
					$('.specificationHtml').html(data);
				}
			});
    });
    
    $(document).on('click','.selectSpecifiction',function(){
    		SearchFormSubmit();
   });

});
</script>
<script type="text/javascript">
$(window).on('hashchange', function() {
	
    if (window.location.hash) {
        var page = window.location.hash.replace('#', '');
        if (page == Number.NaN || page <= 0) {
            return false;
        }else{
			
		}
    }
});

/* Pagination Script */
$(document).ready(function()
{
    $(document).on('click', '.pagination a',function(event)
    {
        event.preventDefault();
        $('li').removeClass('active');
        $(this).parent().addClass('active');
        var myurl = $(this).attr('href');
        var page=$(this).attr('href').split('page=')[1];
        getData(page);
    });
});


function getData(page){
					 var dropdownSearch=$('#dropdownSearch').val();
					 var search_form=$('#search_form').serializeArray();
					 var looking_for=$('#myForm').serializeArray();
					 var categoryForm=$('#categoryForm').serializeArray();
					 var subCategoryForm=$('#subCategoryForm').serializeArray();
					 var specificationForm=$('#specificationForm').serializeArray();
					 var conditionForm=$('#conditionForm').serializeArray();
					 var considerationTypeForm=$('#considerationTypeForm').serializeArray();
					 var donationTypeForm=$('#donationTypeForm').serializeArray();
					 var preferenceTypeFormGenderList=$('#preferenceTypeFormGenderList').serializeArray();
					 	console.log($('#search_form').serializeArray());
						console.log($('#myForm').serializeArray());
					 
					call_ajax("{{ route('home.searchPage.searchItem') }}",{
								page: page,
								dropdownSearch:dropdownSearch,
								data: $('#search_form').serializeArray(),
								looking_for: $('#myForm').serializeArray(),
								categoryForm: $('#categoryForm').serializeArray(),
								subCategoryForm:$('#subCategoryForm').serializeArray(),
								specificationForm:$('#specificationForm').serializeArray(),
								conditionForm:$('#conditionForm').serializeArray(),
								considerationTypeForm:$('#considerationTypeForm').serializeArray(),
								donationTypeForm:$('#donationTypeForm').serializeArray(),
								preferenceTypeFormGenderList:$('#preferenceTypeFormGenderList').serializeArray()
					
			});
			/* For Hash Value Change Duplicate Of call_ajax */
		function call_ajax(url,data){
			$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
				type        : 'POST',
				url         : url, // the url where we want to POST
				data        : {data: data},
				beforeSend: function()
				{
					$('.ajax-loading').show();
				},
				success: function(data){
					location.hash = page;
					if(data.length == 0){
						$('.ajax-loading').html("<div class='alert alert-info'><center>No more records!</center></div>");
						return;
					}
					$('.ajax-loading').hide(); 
					$('.appendText').html(data);
		
				}
		});
		
    }
        /*  */
}
</script>
<style>
@media (max-width: 1199px) and (min-width: 992px){
		.ad-meta{
			width:143% !important;	
		}
}

	@media only screen and (max-width: 768px) {
		.ad-meta{
			width:100% !important;	
		}
		 .pull-right{
			float:none !important;
		}
		.ad-meta .user-option a{
			width:initial !important;	
		}
		.ad-meta .meta-content{
				display:intial !important;
				vertical-align:intial !important;
		}
		.carousel-inner>.item>a>img, .carousel-inner>.item>img, .img-responsive, .thumbnail a>img, .thumbnail>img{
			//height:124px !important;
		}
		.item-info{
			min-height:234px !important;
		}
		.ad-info{
			padding:0px 0px !important;	
		}
		.ad-meta{
			z-index:1 !important;
			top:18% !important;
		}
		.item-image-box .item-image img{
			height:170px !important;
		}
		.ad-info span{
			 display:none !important;
		}
		.category-item{
			max-height:234px !important;
			min-height:234px !important;
		}
		.item-title{
			height:23px !important;
			overflow:hidden !important;
		}
		
}
</style>
@endpush
@php
Session::forget('search','');
Session::forget('homePageCategoryId','');
unset($homeCity);
unset($homeCategory);
unset($homeword);

@endphp