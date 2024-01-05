@extends('user.layout.master')
@section('title','Category List')
@section('content')

<!-- <style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 225px;  /* The height is 225 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
       #cat_link{
          background: none!important;
          border: none;
          padding: 0!important;
          /*optional*/
          font-family: arial, sans-serif;
          /*input has OS specific font-family*/
          color: #fff;
          text-decoration: none;
          cursor: pointer;
       }
       #search_form1{
        display: inline-block;
       }
       .my .star-rating {
            display: flex;
            /*flex-direction: row-reverse;*/
            font-size: 2.5em;
            padding: 0 0.2em;
            text-align: center;
            /*width: 5em;*/
            display: flex;
            justify-content: space-between;
        }

        .my .star-rating input {
          display:none;
        }

        .my .star-rating label {
          color:#ccc;
          cursor:pointer;
        }

        .my .star-rating :checked ~ label {
          color:#f90;
        }

        .my .star-rating label:hover,
        .my .star-rating label:hover ~ label {
          color:#fc0;
        }

        /* explanation */

        .my article {
          background-color:#ffe;
          box-shadow:0 0 1em 1px rgba(0,0,0,.25);
          color:#006;
          font-family:cursive;
          font-style:italic;
          margin:4em;
          max-width:30em;
          padding:2em;
        }


    </style>
<style type="text/css">
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.test-slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.test-slider:before {
    position: absolute;
    content: "";
    height: 20px;
    width: 20px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
}


input:checked + .test-slider {
  background-color: #2196F3;
}

input:focus + .test-slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .test-slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.test-slider.round {
  border-radius: 34px;
}

.test-slider.round:before {
  border-radius: 50%;
}
</style>
<style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 225px;  /* The height is 225 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
       #cat_link{
          background: none!important;
          border: none;
          padding: 0!important;
          /*optional*/
          font-family: arial, sans-serif;
          /*input has OS specific font-family*/
          color: #fff;
          text-decoration: none;
          cursor: pointer;
       }
       #search_form1{
        display: inline-block;
       }
       *{
    margin: 0;
    padding: 0;
}
.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}


    </style> -->
<style >
  

</style>

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
                    <form method="post" id="search_form" class="search_form" action="#" autocomplete="off">
                                    
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
                                          <!-- <?php
                                        
                                                // print_r($homeCategory);
                                            
                                            // die();
                                            ?> -->
                                <!-- language-dropdown -->
                            <!-- <div class="dropdown category-dropdown"> 						
                                <input type="text" name="city_search_box" placeholder="Enter City" id="city_search_box" class="city_search_box" value="{{ old('city_search_box') }}">
                            </div> -->
                            <!-- language-dropdown -->
                            <!-- <div class="dropdown category-dropdown">		
                                <input type="text"  list="cityBrowsers" value="{{$homeCity}}" name="city_search_box" placeholder="Enter City" id=''>
                                <datalist id="cityBrowsers" class="cityBrowsers" >
                                    @foreach($cities as $city)
                                    <option value="{{$city->name}}">
                                    @endforeach
                                </datalist>
                            </div> -->

                             

                            <div class="dropdown category-dropdown">       
                                <input type="text"  list="cityBrowsers" value="{{$homeCity}}" name="city_search_box" class="city_search_box" placeholder="Enter City" autocomplete="off" />
                                <datalist id="cityBrowsers" >
                                                        


                                </datalist>

                            </div>


                            <div class="dropdown category-dropdown">		
                               <input type="text"  list="browsers" name="category_box" value="{{$homeCategory}}" placeholder="Enter Category" id='category_box' class='category_box'  autocomplete="off" >
                                <datalist id="browsers" class="browsers" >
                                    @foreach($categories as $category)
                                    <option value="{{$category->name}}" >
                                    @endforeach
                                </datalist>
                            </div> 
                            <!-- <div class="dropdown category-dropdown">
                                <input type="text" name="word_box" placeholder="Type Your key word" value="{{$homeword}}">
                            </div> -->
                               <div class="dropdown category-dropdown">
                                        <input type="text" list="search_text" value="{{$homeword}}" name="word_box" class="search_text word_box"  placeholder="What are you looking for today" autocomplete="off" >

                                        <datalist id="search_text" >
                                            
                                        </datalist>
                                    </div>
                            <button type="submit" class="form-control"  value="Search">Search</button>
                        </form>
                    </div>
                    <!-- banner-form -->
                </div>

                <div class="category-info">	
                    <div class="row">
                        <!-- accordion-->
                        <div  class="hidden-xs hidden-sm col-md-3 col-lg-3 col-xl-3">
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
                                             <form method="post" id="myForm" class="myForm myForm_normal">
                                              @php
                                              $i=1;
                                              @endphp
                                            @foreach($user_types as $user_type)
                                                   <label class="checkbox-design">
                                                        <input type="checkbox" name="ut" class="categoryClass lookingFor@php echo $i;  @endphp"  value="{{ $user_type->id }}">{{ $user_type->name}}
                                                        <span class="checkmark"></span>
                                                    </label>
                                                   <!-- <label for="donor"><input type="checkbox" name="ut" class="categoryClass" value="{{ $user_type->id }}"> {{ $user_type->name}}</label> -->
                                                   @php
                                              $i++;
                                              @endphp
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
                                                <form method="post" id="categoryForm" class="categoryForm categoryForm_normal">
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
                                                            
                                                            <input type="checkbox" name="ct" class="selectCategory"  {{$homeCategory==$category->name?"data-in='".$homeCategory."'":''}}  value="{{$category->id}}">{{$category->name}}
                                                            <!--<span>({{$category->total_post}})</span>-->
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

                                        <div id="sub-categories" class="sub-categories panel-collapse collapse ">

                                            <!-- panel-body -->
                                            <div class="panel-body">
                                               <form method="post" id="subCategoryForm" class="subCategoryForm subCategoryForm_normal">
                                                <div class="subcategories">
                                                    
                                                     @php
                                                        echo $print;
                                                    @endphp


                                                </div>
                                              </form>
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

                                        <div id="specification" class="specification panel-collapse collapse ">

                                            <!-- panel-body -->
                                            <div class="panel-body">
                                              <form method="post" id="specificationForm" class="specificationForm specificationForm_normal">
                                                <div class="specificationHtml">
                                                  
                                                      @php
                                                          echo $sp;
                                                      @endphp

                                                </div>
                                              </form>
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
                                            <form method="post" id="conditionForm" class="conditionForm conditionForm_normal">
                                                <label class="checkbox-design"><input type="checkbox" class="newSearch conditionInput" name="cd" id="newSearch" value="1"> New <span class="checkmark"></span></label>
                                                <label class="checkbox-design"><input type="checkbox" class="usedSearch conditionInput" name="cd" id="usedSearch" value="2"> Used <span class="checkmark"></span></label>
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
                                            <form method="post" id="considerationTypeForm" class="considerationTypeForm considerationTypeForm_normal">
                                                <label class="checkbox-design anyConsideration"><input type="checkbox" name="cs" id="anyConsideration" class="considerationType" value="5"> Any <span class="checkmark"></span></label>
                                                <label class="checkbox-design freeConsideration"><input type="checkbox" name="cs" id="freeConsideration" class="considerationType"  value="0"> Free <span class="checkmark"></span></label>
                                                <label class="checkbox-design monetaryConsideration"><input type="checkbox" name="cs" id="monetaryConsideration" class="considerationType"  value="2"> Monetary <span class="checkmark"></span></label>
                                                <label class="checkbox-design nonMonetaryConsideration"><input type="checkbox" name="cs" id="nonMonetaryConsideration" class="considerationType"  value="1"> Non-Monetary <span class="checkmark"></span></label>
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
                                                <form method="post" id="donationTypeForm" class="donationTypeForm donationTypeForm_normal">
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
                  												<form method="post" id="preferenceTypeFormGenderList" class="preferenceTypeFormGenderList preferenceTypeFormGenderList_normal">
                  												<label class="checkbox-design"><input type="checkbox" name="all" id="All" value="all" class="All preference">  All <span class="checkmark"></span></label>
                                                                  <label class="checkbox-design"><input type="checkbox" name="gender" value="gender" id="gender" class="gender preference">Gender <span class="checkmark"></span></label>
                                                                  <label class="checkbox-design"><input type="checkbox" name="age" id="age" value="age" class="preference">Age <span class="age checkmark"></span></label>
                  												</form>
                  											</div><!-- panel-body -->
                                        </div>
                                    </div><!-- panel -->                                    
                                </div><!-- panel-group -->
                            </div>
                        </div><!-- accordion-->

                        <!-- recommended-ads -->
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">				
                            <div class="section recommended-ads">
                                







<!--  <div class="dropdown category-dropdown">
                                      <h5>Sort by:</h5>           
                                      <a data-toggle="dropdown" href="#"><span class="change-text">Popular</span><i class="fa fa-caret-square-o-down"></i></a>
                                      <ul class="dropdown-menu category-change">
                                        <li><a href="#">Featured</a></li>
                                        <li><a href="#">Newest</a></li>
                                        <li><a href="#">All</a></li>
                                        <li><a href="#">Bestselling</a></li>
                                      </ul>               
                                    </div> -->
                                    <!-- category-change --> 


                                <!--<div class="featured-top">-->
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <h4 class="hidden-xs hidden-sm" style="font-size: 15px;padding-bottom: 3px;margin-top: 13px;">Sort by: </h4>
                                        <!-- haresh start-->
                                       
                                      
                                        <select id="dropdownSearch" class="dropdownSearch form-control" style="margin-top: 13px;height: 30px;width: 150px;display: inline;">
                                            <!-- <option value="">Sort by</option> -->
                                            <option id="dropdownOption1" value="1">Latest</option>
                                            <option id="dropdownOption2" value="2">Oldest</option>
                                            <!-- <option value="3">Urgent</option> -->
                                            <option id="dropdownOption4" value="4">Price: Low-High</option>
                                            <option  id="dropdownOption5" value="5">Price: High-Low</option>
                                            
                                        </select>
                                        
                                         <!--   <a data-toggle="dropdown" href="#"><span class="change-text">Popular </span><i class="fa fa-caret-square-o-down"></i></a>
                                          <ul class="dropdown-menu category-change">
                                            <li><a href="#">Featured</a></li>
                                            <li><a href="#">Newest</a></li>
                                            <li><a href="#">All</a></li>
                                            <li><a href="#">Bestselling</a></li>
                                          </ul>   -->
                                         <!-- haresh emd -->
                                    </div>
                                    <!--<div class="dropdown pull-right">-->

                                 <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div style="float: right;text-align: center;display: inline-flex;align-items: center;">
                                        <!--  <h4 class="hidden-xs hidden-sm" style="margin-bottom: 20px;font-size: 15px;/* padding-bottom: 3px; */">Urgent </h4><br> -->
                                         <h4   style="margin-bottom: 20px;font-size: 15px;/* padding-bottom: 3px; */">Urgent </h4>
                                        <label class="switch" style="margin-top: 5px; height: 28px;/* width: 55px;padding-bottom: 3px; */"><!-- <span >Urgent</span> -->
                                          <input type="checkbox" value="3" id="urgentitem" class="urgentitem">
                                          <span class="test-slider round" ></span>
                                        </label>
                                         <h5 class="hidden-md hidden-lg hidden-xl"><a href="#" class=" fa fa-filter" data-toggle="modal" data-backdrop="static" data-keyboard="true" data-target="#shipping_detail" id="popup" style="font-size: 18px;color: #0072bc;"><h4 class="popup hidden-xs hidden-sm"> Filter</h4></a></h5>
                                        
                                    </div>
                                </div>
                                <!-- haresh start -->
                                   <!--  <div class="col-xs-6 col-sm-6 hidden-md hidden-lg hidden-xl" style="text-align: right;">
                                        <h5><a href="#" class="fa fa-filter" data-toggle="modal" data-backdrop="static" data-keyboard="true" data-target="#shipping_detail" id="popup"><h4 class="popup hidden-xs hidden-sm"> Filter</h4></a></h5>
                                        
                                    </div> -->
                                <!-- haresh end -->
                                    
                                    <!--</div>							-->
                                </div><!-- featured-top -->	
                             <div class="appendText"></div>
                             <div class="ajax-loading">
                                <img src="{{ asset('images/uploads/loading.gif') }}" alt="loading" />
                            </div>
                            </div>
                        </div><!-- recommended-ads -->
                    </div>	
                </div>
            </div><!-- container -->
        </section><!-- main -->


        <section id="something-sell" class="something-sell clearfix parallax-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h2 class="title">Do you have anything to Donate?</h2>
                        <h4>Donate anything, whatever you can think on Doncen.org</h4>
                        <a href="{{ route('web.donation.category') }}" class="btn btn-primary">Donate Now</a>
                    </div>
                </div><!-- row -->
            </div><!-- contaioner -->
        </section><!-- something-sell -->
        
        <!-- / Shipping Details modal -->
        <div class="modal fade shipping_detail" id="shipping_detail" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Filter</h4>
                    </div>
                    <div class="modal-body">
                        <div class="category-info">	
                            <div class="row">
                                <!-- accordion-->
                                <div class="col-xs-12 col-sm-12 hidden-md hidden-lg hidden-xl ">
                                    <div class="accordion">
                                        <!-- panel-group -->
                                        <div class="panel-group" id="accordion">
                                            <div class="panel-default panel-faq">
                                                <!-- panel-heading -->
                                                <div class="panel-heading">
                                                    <a data-toggle="collapse" data-parent="#accordion" href=".accordion-four">
                                                        <h4 class="panel-title">
                                                            Looking For
                                                            <span class="pull-right"><i class="fa fa-angle-down "></i></span>
                                                        </h4>
                                                    </a>
                                                </div><!-- panel-heading -->
        
                                                <div id="accordion-four" class="accordion-four panel-collapse collapse in">
                                                    <!-- panel-body -->
                                                    <div class="panel-body">
                                                     <form method="post" id="myForm1" class="myForm myForm_modal">
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
                                                    <a data-toggle="collapse" data-parent="#accordion" href=".accordion-one">
                                                        <h4 class="panel-title">Categories<span class="pull-right"><i class="fa fa-angle-down"></i></span></h4>
                                                    </a>
                                                </div><!-- panel-heading -->
        
                                                <div id="accordion-one" class="accordion-one panel-collapse collapse  @if(Session::has('homePageCategoryId')) in @endif">
        
                                                    <!-- panel-body -->
                                                    <div class="panel-body">
                                                        <form method="post" id="categoryForm1" class="categoryForm categoryForm_modal">
                                                           
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
                                                                    <input type="checkbox" name="ct" class="selectCategory"  {{$homeCategory==$category->name?"data-in='".$homeCategory."'":''}}  value="{{$category->id}}">{{$category->name}}
                                                                    <!--<span>({{$category->total_post}})</span>-->
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
                                                    <a data-toggle="collapse" data-parent="#accordion" href=".sub-categories">
                                                        <h4 class="panel-title">Sub-Categories<span class="pull-right"><i class="fa fa-angle-down"></i></span></h4>
                                                    </a>
                                                </div><!-- panel-heading -->
        
                                                <div id="sub-categories" class="sub-categories panel-collapse collapse ">
        
                                                    <!-- panel-body -->
                                                    <div class="panel-body">
                                                      <form method="post" id="subCategoryForm1" class="subCategoryForm subCategoryForm_modal">
                                                        <div class="subcategories">
                                                          
                                                            @php
                                                                echo $print;
                                                            @endphp

                                                        </div>
                                                      </form>
                                                    </div><!-- panel-body -->
                                                </div>
                                            </div><!-- panel -->
                                            <!-- panel -->
                                            <div class="panel-default panel-faq">                                        
                                                <!-- panel-heading -->
                                                <div class="panel-heading">
                                                    <a data-toggle="collapse" data-parent="#accordion" href=".specification">
                                                        <h4 class="panel-title">Specification<span class="pull-right"><i class="fa fa-angle-down"></i></span></h4>
                                                    </a>
                                                </div><!-- panel-heading -->
        
                                                <div id="specification" class="specification panel-collapse collapse ">
        
                                                    <!-- panel-body -->
                                                    <div class="panel-body">
                                                      <form method="post" id="specificationForm1" class="specificationForm specificationForm_modal">
                                                        <div class="specificationHtml">
                                                          
                                                            @php
                                                                echo $sp;
                                                            @endphp

                                                        </div>
                                                      </form>
                                                    </div><!-- panel-body -->
                                                </div>
                                            </div><!-- panel -->
        
                                            <!-- panel -->
                                            <div class="panel-default panel-faq">
                                                <!-- panel-heading -->
                                                <div class="panel-heading">
                                                    <a data-toggle="collapse" data-parent="#accordion" href=".accordion-two">
                                                        <h4 class="panel-title">Condition<span class="pull-right"><i class="fa fa-angle-down"></i></span></h4>
                                                    </a>
                                                </div><!-- panel-heading -->
        
                                                <div id="accordion-two" class="accordion-two panel-collapse collapse">
                                                    <!-- panel-body -->
                                                    <div class="panel-body">
                                                    <form method="post" id="conditionForm1" class="conditionForm conditionForm_modal">
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
                                                    <a data-toggle="collapse" data-parent="#accordion" href=".accordion-three">
                                                        <h4 class="panel-title">
                                                            Consideration
                                                            <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                                                        </h4>
                                                    </a>
                                                </div><!-- panel-heading -->
        
                                                <div id="accordion-three" class="accordion-three panel-collapse collapse">
                                                    <!-- panel-body -->
                                                    <div class="panel-body">
                                                    <form method="post" id="considerationTypeForm1" class="considerationTypeForm considerationTypeForm_modal">
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
                                                    <a data-toggle="collapse" data-parent="#accordion" href=".type-of-donation">
                                                        <h4 class="panel-title">Type of Donation<span class="pull-right"><i class="fa fa-angle-down"></i></span></h4>
                                                    </a>
                                                </div><!-- panel-heading -->
        
                                                <div id="type-of-donation" class="type-of-donation panel-collapse collapse">
                                                    <!-- panel-body -->
                                                    <div class="panel-body">
                                                        <form method="post" id="donationTypeForm1" class="donationTypeForm donationTypeForm_modal">
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
                                                    <a data-toggle="collapse" data-parent="#accordion" href=".preference">
                                                        <h4 class="panel-title">Preference<span class="pull-right"><i class="fa fa-angle-down"></i></span></h4>
                                                    </a>
                                                </div><!-- panel-heading -->
        
                                                <div id="preference" class="preference panel-collapse collapse">
                                                    <!-- panel-body -->
                                                    <div class="panel-body">
                            												<form method="post" id="preferenceTypeFormGenderList1" class="preferenceTypeFormGenderList preferenceTypeFormGenderList_modal">
                                												<label class="checkbox-design"><input type="checkbox" name="all" id="All" value="all" class="preference">  All <span class="checkmark"></span></label>
                                                          <label class="checkbox-design"><input type="checkbox" name="gender" value="gender" id="gender" class="preference">Gender <span class="checkmark"></span></label>
                                                          <label class="checkbox-design"><input type="checkbox" name="age" id="age" value="age" class="preference">Age <span class="checkmark"></span></label>
                            												</form>
                            											</div><!-- panel-body -->
                                                </div>
                                            </div><!-- panel -->                                    
                                        </div><!-- panel-group -->
                                    </div>
                                </div><!-- accordion-->
                            </div>	
                        </div>
                    </div>
        
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default block-tab" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- / Shipping Details modal -->
        
        <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@push('javaScript')

<script>


 // Fetch URL from address bar and prepare for function 
  //haresh start
  var str=window.location.href;
  //alert(str);
  var last = str.substring(str.lastIndexOf("donation-near-me/") + 17, str.length);
  //alert(last);
  var end_array=[];

           var convert_to_array = last.split('/');
            for(var i=0; i < convert_to_array.length; i++){
                const key_value = convert_to_array [i].split(/-(.*)/s);
                end_array[key_value [0]] = key_value [1];
            }

            console.log(end_array);
            const keys=Object.keys(end_array);
            console.log(keys);
            for(let k of keys ){
              
              if(k=='city'){
                
                $('.city_search_box').val(end_array[k].replace(/-/g,' '));
              }
              if(k=='cdd'){
                
                $('.category_box').val(end_array[k].replace(/-/g,' '));
                //Cloths-&-Accessories
              }
              if(k=='find'){
                
                $('.word_box').val(end_array[k].replace(/-/g,' '));
              }

              if(k=='ut'){
               // alert(end_array[k]);
                 var convert_ut_array = end_array[k].split('-aNd-');

                console.log(convert_ut_array);
               // alert(end_array[k]);
                  for(let u=0;u<convert_ut_array.length;u++ ){
                      $("input[name=ut]").each( function () {
                         if( $(this).closest("label").text().trim()==convert_ut_array[u].replace(/-/g,' ') ){
                         
                          $(this).prop("checked", true);
                         }
                     });
                    }
              }

              if(k=='urgent'){
               // alert(end_array[k]);
                 var convert_all_array = end_array[k].split('-aNd-');
                //console.log(convert_all_array);

                  for(let u=0;u<convert_all_array.length;u++ ){
                      $("input[id=urgentitem]").each( function () {
                         if(true){
                         
                          $(this).prop("checked", true);
                         }
                     });
                    }
              }

               if(k=='dd'){
                        // alert(end_array[k].replace('-',' '));
                        // alert($("option[id=dropdownOption"+end_array[k]+"]").text());
              
                          $("option[id=dropdownOption"+end_array[k]+"]").prop("selected", true);
                     
              }

              if(k=='ct'){
               // alert(end_array[k]);
                 var convert_ct_array = end_array[k].split('-aNd-');
                //console.log(convert_ct_array);

                  for(let u=0;u<convert_ct_array.length;u++ ){
                      $("input[name=ct]").each( function () {
                         if( $(this).closest("label").text().trim()==convert_ct_array[u].replace(/-/g,' ')){
                         
                            $(this).prop("checked", true);
                            


                         }
                     });
                    }
              }

              if(k=='st'){
               // alert(end_array[k]);
                 var convert_st_array = end_array[k].split('-aNd-');
                //console.log(convert_st_array);

                  for(let u=0;u<convert_st_array.length;u++ ){
                      $("input[name=st]").each( function () {
                         if( $(this).closest("label").text().trim()==convert_st_array[u].replace(/-/g,' ') ){
                         
                          $(this).prop("checked", true);
                         }
                     });
                    }
              }

               if(k=='sp'){
               // alert(end_array[k]);
                 var convert_sp_array = end_array[k].split('-aNd-');
                //console.log(convert_sp_array);

                  for(let u=0;u<convert_sp_array.length;u++ ){
                      $("input[name=sp]").each( function () {

                        const lastIndex = convert_sp_array[u].lastIndexOf('-');

                        const replacement = ' ';

                        const replaced =
                          convert_sp_array[u].substring(0, lastIndex) +
                          replacement +
                          convert_sp_array[u].substring(lastIndex + 1);

                         if($(this).closest("label").text().trim()==replaced){
                         
                          $(this).prop("checked", true);
                         }
                     });
                    }
              }


              if(k=='cd'){
               // alert(end_array[k]);
                 var convert_cd_array = end_array[k].split('-aNd-');
                //console.log(convert_cd_array);

                  for(let u=0;u<convert_cd_array.length;u++ ){
                      $("input[name=cd]").each( function () {
                         if( $(this).closest("label").text().trim()==convert_cd_array[u].replace(/-/g,' ') ){
                         
                          $(this).prop("checked", true);
                         }
                     });
                    }
              }

              if(k=='cs'){
               // alert(end_array[k]);
                 var convert_cs_array = end_array[k].split('-aNd-');
                //console.log(convert_cs_array);

                  for(let u=0;u<convert_cs_array.length;u++ ){
                      $("input[name=cs]").each( function () {
                         if( $(this).closest("label").text().trim()==convert_cs_array[u].replace(/-/g,' ')){
                         
                          $(this).prop("checked", true);
                         }
                     });
                    }
              }

              if(k=='td'){
               // alert(end_array[k]);
                 var convert_td_array = end_array[k].split('-aNd-');
                //console.log(convert_td_array);

                  for(let u=0;u<convert_td_array.length;u++ ){
                      $("input[name=td]").each( function () {
                         if($(this).closest("label").text().trim()==convert_td_array[u].replace(/-/g,' ') ){
                         
                          $(this).prop("checked", true);
                         }
                     });
                    }
              }

              if(k=='sx'){
               // alert(end_array[k]);
                 var convert_gender_array = end_array[k].split('-aNd-');
                //console.log(convert_gender_array);

                  for(let u=0;u<convert_gender_array.length;u++ ){
                      $("input[name=gender]").each( function () {
                         if( $(this).closest("label").text().trim().toLowerCase()==convert_gender_array[u].replace(/-/g,' ') ){
                         
                          $(this).prop("checked", true);
                         }
                     });
                    }
              }


              if(k=='ag'){
               // alert(end_array[k]);
                 var convert_age_array = end_array[k].split('-aNd-');
                //console.log(convert_age_array);

                  for(let u=0;u<convert_age_array.length;u++ ){
                      $("input[name=age]").each( function () {
                         if( $(this).closest("label").text().trim().toLowerCase()==convert_age_array[u].replace(/-/g,' ') ){
                         
                          $(this).prop("checked", true);
                         }
                     });
                    }
              }

              if(k=='all'){
               // alert(end_array[k]);
                 var convert_all_array = end_array[k].split('-aNd-');
                //console.log(convert_all_array);

                  for(let u=0;u<convert_all_array.length;u++ ){
                      $("input[name=all]").each( function () {
                         if( $(this).closest("label").text().trim().toLowerCase()==convert_all_array[u].replace(/-/g,' ') ){
                         
                          $(this).prop("checked", true);
                         }
                     });
                    }
              }










            }

//haresh end
    var timer = null;
    $('.search_text').keyup(function(){ 
        
        var query = $(this).val();
        var _token = $('input[name="_token"]').val();

        clearTimeout(timer); 
        timer = setTimeout(function(){
        
         // alert( _token);
         $.ajax({
          url:"{{ route('web.search_text_autocomplate') }}", 
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#search_text').fadeIn();  
            $('#search_text').html(data);
          }
         });
        } , 30)
    });

    var timer = null;
    $('.city_search_box').keyup(function(){ 
        
        var query = $(this).val();
        var _token = $('input[name="_token"]').val();

        clearTimeout(timer); 
        timer = setTimeout(function(){
        
         // alert( _token);
         $.ajax({
          url:"{{ route('web.city_search') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){

           $('#cityBrowsers').fadeIn();  
            $('#cityBrowsers').html(data);
          }
         });
        } , 30)
    });
$(function(){
   
   // function initializeAddress() {
   //    var input = document.getElementById('city_search_box');
   //    var options = {
   //      types: ['geocode'] //this should work !
   //    };
   //    var autocomplete = new google.maps.places.Autocomplete(input, options);
   //  }
   
   // google.maps.event.addDomListener(window, 'load', initializeAddress);
   //  var page = 1;      
   //  $.ajaxSetup({
   //      headers: {
   //          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   //      }
   //  });
	
    
   ////// Working ajax_call and checked by Haresh
    function call_ajax(url,data){
      
      
      // alert(url);
      //console.log(data);
      //alert(JSON.stringify(data));


      const myJSON = JSON.stringify(data);
      localStorage.setItem("testJSON", myJSON);

      // Retrieving data:
      let text = localStorage.getItem("testJSON");
      let obj = JSON.parse(text);

      //alert(myJSON);
              

      // for(let u=0;u<obj.looking_for.length;u++ ){
       
      //      document.getElementById("demo").innerHTML=obj.looking_for[u].value;
      //      }
      
      // }

      

    // Display URL in address bar 
      var str = window.location.href;
      var last = str.substring(str.lastIndexOf("donation-near-me/") + 17, str.length);

      // data.append(end_array);
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

                    $('.appendText').children().hide();
            },
            success: function(data){
                if(data.length == 0){
                    $('.ajax-loading').html("<div class='alert alert-info'><center>No more records!</center></div>");
                    return;
                }
                $('.ajax-loading').hide(); 
                $('.appendText').html(data);

              
                  // Set URL
                   $('title').text('Doncen | Donation Center near me');
                                $('meta[name="title"]').attr('content','Doncen | Donation Center near me');
                                $('meta[property="og:title"]').attr('content','Doncen | Donation Center near me');
                                $('meta[name="twitter:title"]').attr('content','Doncen | Donation Center near me');


                   // var url_common2 = str.substring(0,str.lastIndexOf("/") + 1);
                   var url_common = str.substring(0,str.lastIndexOf("donation-near-me/") + 17);

                   

                   // var url_common = 'https://doncen.org/donation-near-me/';
                   var meta_value='';
                  
                  let city_search_box_str='';  
                  if($('.city_search_box').val()!=''){
                   city_search_box_str=$('.city_search_box').val();  

                        city_search_box_str=city_search_box_str.replace(/ /g,'-');
                         

                         meta_value=meta_value+','+city_search_box_str;
                         $('title').text('Doncen | Donation in '+city_search_box_str);

                          $('meta[name="title"]').attr('content','Doncen | Donation in '+city_search_box_str);
                                $('meta[property="og:title"]').attr('content','Doncen | Donation in '+city_search_box_str);
                                $('meta[name="twitter:title"]').attr('content','Doncen | Donation in '+city_search_box_str);

                         url_common=url_common+'city-'+city_search_box_str+'/';

                  }
                  else
                  {
                    city_search_box_str=' near you';
                  }



                  let category_box_str='';  
                  if($('.category_box').val()!=''){
                   category_box_str=$('.category_box').val();  

                        category_box_str=category_box_str.replace(/ /g,'-');
                         url_common=url_common+'cdd-'+category_box_str+'/';

                         meta_value=meta_value+','+category_box_str;
                         $('title').text('Doncen | Donation of '+category_box_str+' in '+city_search_box_str);

                         $('meta[name="title"]').attr('content','Doncen | Donation of '+category_box_str+' in '+city_search_box_str);
                                $('meta[property="og:title"]').attr('content','Doncen | Donation of '+category_box_str+' in '+city_search_box_str);
                                $('meta[name="twitter:title"]').attr('content','Doncen | Donation of '+category_box_str+' in '+city_search_box_str);


                  }

                  let word_box_str='';  
                  if($('.word_box').val()!=''){
                   word_box_str=$('.word_box').val();  

                        word_box_str=word_box_str.replace(/ /g,'-')
                         url_common=url_common+'find-'+word_box_str+'/';
                         meta_value=meta_value+','+word_box_str;


                  }

                 
                  //ut - looking for

                  // let fields = $(".myForm").serializeArray();
                  // let ut_str='';
                  // let ut_arr=[];
                       
                  //  jQuery.each(fields, function(i, field){
                  //     ut_arr.push(field.value);
                  //  });
                  //  ut_arr = [...new Set(ut_arr)];
                  //   ut_str=ut_arr.join(',');

                  //  if(ut_str!=''){
                  //        url_common=url_common+'ut='+ut_str+'+';

                  //  }

                  let ut_str='';
                  let ut_arr=[];
                  let url_str_arr=[];
                  let url_str='';
                   let fields=obj.looking_for;
                   jQuery.each(fields, function(i, field){
                      ut_arr.push(field.value);
                      $("input[name=ut]").each( function () {
   
                            if($(this).val()==field.value){
                              meta_value=meta_value+','+$(this).closest("label").text().trim();
                               url_str_arr.push($(this).closest("label").text().trim().replace(/ /g,'-'));
                              //alert(meta_value);
                            }
                       });
                   });
                   ut_arr = [...new Set(ut_arr)];
                    ut_str=ut_arr.join(',');

                     url_str_arr = [...new Set(url_str_arr)];
                    url_str=url_str_arr.join('-aNd-');

                   
                   if(ut_str!=''){
                     //    url_common=url_common+'ut-'+ut_str+'/';

                   }

                   if(url_str!=''){
                         url_common=url_common+'ut-'+url_str+'/';

                   }

                   //category

                   let ct_str='';
                  let ct_arr=[];
                         
                  let ct_title_arr=[];

                  url_str_arr=[];
                  url_str='';

                  fields=obj.categoryForm;
                   jQuery.each(fields, function(i, field){
                      ct_arr.push(field.value);
                      

                        $("input[name=ct]").each( function () {
   
                            if($(this).val()==field.value){
                              meta_value=meta_value+','+$(this).closest("label").text().trim();
                              ct_title_arr.push($(this).closest("label").text().trim());
                               url_str_arr.push($(this).closest("label").text().trim().replace(/ /g,'-'));

                            }
                       });

                   });
                   ct_arr = [...new Set(ct_arr)];
                    ct_str=ct_arr.join(',');

                    url_str_arr = [...new Set(url_str_arr)];
                    url_str=url_str_arr.join('-aNd-');


                   if(ct_str!=''){
                       //  url_common=url_common+'ct-'+ct_str+'/';

                          if(url_str!=''){
                                 url_common=url_common+'ct-'+url_str+'/';

                           }
              //alert(url_str);

                        //$('checkbox[name=ct]').
                        
                         var ct_title_arr2= [...new Set(ct_title_arr)];
                           var  ct_title_str=ct_title_arr2.join(', ');

                       
                                $('title').text('Doncen | Donation of '+ct_title_str+' in '+city_search_box_str);

                                 $('meta[name="title"]').attr('content','Doncen | Donation of '+ct_title_str+' in '+city_search_box_str);
                                $('meta[property="og:title"]').attr('content','Doncen | Donation of '+ct_title_str+' in '+city_search_box_str);
                                $('meta[name="twitter:title"]').attr('content','Doncen | Donation of '+ct_title_str+' in '+city_search_box_str);

                       
                         //sub catgory

                           let st_str='';
                          let st_arr=[];
                          let st_title_arr=[];

                           url_str_arr=[];
                          url_str='';

                           fields=obj.subCategoryForm;
                           jQuery.each(fields, function(i, field){
                              st_arr.push(field.value);

                                  $("input[name=st]").each( function () {
       
                                      if($(this).val()==field.value){
                                        meta_value=meta_value+','+$(this).closest("label").text().trim();
                                        //alert(meta_value);
                                        st_title_arr.push($(this).closest("label").text().trim());
                                         url_str_arr.push($(this).closest("label").text().trim().replace(/ /g,'-'));
                                      }
                                 });
                           });
                           st_arr = [...new Set(st_arr)];
                            st_str=st_arr.join(',');

                            url_str_arr = [...new Set(url_str_arr)];
                            url_str=url_str_arr.join('-aNd-');


                           if(st_str!=''){
                              //   url_common=url_common+'st-'+st_str+'/';

                                 if(url_str!=''){
                                    url_common=url_common+'st-'+url_str+'/';

                                  }


                                var st_title_arr2 = [...new Set(st_title_arr)];
                                var st_title_arr_str=st_title_arr2.join(', ');

                                $('title').text('Doncen | Donation of '+st_title_arr_str+' under '+ct_title_str+' in '+city_search_box_str);

                                 $('meta[name="title"]').attr('content','Doncen | Donation of '+st_title_arr_str+' under '+ct_title_str+' in '+city_search_box_str);
                                $('meta[property="og:title"]').attr('content','Doncen | Donation of '+st_title_arr_str+' under '+ct_title_str+' in '+city_search_box_str);
                                $('meta[name="twitter:title"]').attr('content','Doncen | Donation of '+st_title_arr_str+' under '+ct_title_str+' in '+city_search_box_str);

                                //specification
                                let title_sp='';

                                 let sp_str='';
                                let sp_arr=[];
                          let sp_title_arr=[];

                           url_str_arr=[];
                          url_str='';

                                 fields=obj.specificationForm;
                                 jQuery.each(fields, function(i, field){
                                    sp_arr.push(field.value);
                                      $("input[name=sp]").each( function () {
   
                                          if($(this).val()==field.value){
                                            meta_value=meta_value+','+$(this).closest("label").text().trim();
                                            title_sp=title_sp+' '+$(this).closest("label").text().trim();
                                           
                                        sp_title_arr.push($(this).closest("label").text().trim());

                                         url_str_arr.push($(this).closest("label").text().trim().replace(/ /g,'-'));

                                            //alert(meta_value);

                                          }
                                     });
                                 });

                                 

                                 sp_arr = [...new Set(sp_arr)];
                                  sp_str=sp_arr.join(',');

                                  url_str_arr = [...new Set(url_str_arr)];
                            url_str=url_str_arr.join('-aNd-');

                                 

                                 if(sp_str!=''){
                                    //   url_common=url_common+'sp-'+sp_str+'/';

                                       if(url_str!=''){
                                             url_common=url_common+'sp-'+url_str+'/';

                                       }

                                         var  sp_title_arr2 = [...new Set(sp_title_arr)];
                                        var sp_title_str=sp_title_arr2.join(', ');



                                      $('title').text('Doncen | Donation of '+sp_title_str+' of '+st_title_arr_str+' under '+ct_title_str+' in '+city_search_box_str);

                                       $('meta[name="title"]').attr('content','Doncen | Donation of '+sp_title_str+' of '+st_title_arr_str+' under '+ct_title_str+' in '+city_search_box_str);
                                $('meta[property="og:title"]').attr('content','Doncen | Donation of '+sp_title_str+' of '+st_title_arr_str+' under '+ct_title_str+' in '+city_search_box_str);
                                $('meta[name="twitter:title"]').attr('content','Doncen | Donation of '+sp_title_str+' of '+st_title_arr_str+' under '+ct_title_str+' in '+city_search_box_str);

                                     //$('meta[name=description]').attr('content', final_meta);
                                 }

                           }

                          

                   }

                   


                    let cd_str='';
                  let cd_arr=[];

                   url_str_arr=[];
                          url_str='';


                    fields=obj.conditionForm;
                   jQuery.each(fields, function(i, field){
                      cd_arr.push(field.value);
                          $("input[name=cd]").each( function () {
       
                                if($(this).val()==field.value){
                                  meta_value=meta_value+','+$(this).closest("label").text().trim();

                                   url_str_arr.push($(this).closest("label").text().trim().replace(/ /g,'-'));

                                  //alert(meta_value);
                                }
                           });
                   });
                   cd_arr = [...new Set(cd_arr)];
                    cd_str=cd_arr.join(',');

                     url_str_arr = [...new Set(url_str_arr)];
                            url_str=url_str_arr.join('-aNd-');


                   if(cd_str!=''){
                      //   url_common=url_common+'cd-'+cd_str+'/';

                   }
                    if(url_str!=''){
                         url_common=url_common+'cd-'+url_str+'/';

                   }


                   let cs_str='';
                  let cs_arr=[];
                  url_str_arr=[];
                          url_str='';

                    fields=obj.considerationTypeForm;
                   jQuery.each(fields, function(i, field){
                      cs_arr.push(field.value);

                          $("input[name=cs]").each( function () {
       
                                if($(this).val()==field.value){
                                  meta_value=meta_value+','+$(this).closest("label").text().trim();
                                   url_str_arr.push($(this).closest("label").text().trim().replace(/ /g,'-'));

                                  //alert(meta_value);
                                }
                           });
                   });
                   cs_arr = [...new Set(cs_arr)];
                    cs_str=cs_arr.join(',');

                     url_str_arr = [...new Set(url_str_arr)];
                            url_str=url_str_arr.join('-aNd-');


                   if(cs_str!=''){
                       //  url_common=url_common+'cs-'+cs_str+'/';

                   }
                   if(url_str!=''){
                         url_common=url_common+'cs-'+url_str+'/';

                   }

                   let td_str='';
                  let td_arr=[];
                  url_str_arr=[];
                          url_str='';

                    fields=obj.donationTypeForm;
                   jQuery.each(fields, function(i, field){
                      td_arr.push(field.value);

                          $("input[name=td]").each( function () {
       
                                if($(this).val()==field.value){
                                  // meta_value=meta_value+','+$(this).closest("label").text().trim();
                                  td_meta_value = $(this).closest("label").text().trim();
                                   url_str_arr.push($(this).closest("label").text().trim().replace(/ /g,'-'));

                                  //alert(meta_value);
                                }
                           });

                   });
                   td_arr = [...new Set(td_arr)];
                    td_str=td_arr.join(',');
                    url_str_arr = [...new Set(url_str_arr)];
                            url_str=url_str_arr.join('-aNd-');

                   if(td_str!=''){
                       //  url_common=url_common+'td-'+td_str+'/';

                   }
                    if(url_str!=''){
                         url_common=url_common+'td-'+url_str+'/';

                   }




                  let gender_str='';
                  let gender_arr=[];
                  url_str_arr=[];
                          url_str='';

                    fields=obj.preferenceTypeFormGenderList;
                   jQuery.each(fields, function(i, field){
                      if(field.value=='gender'){
                        gender_arr.push(field.value);
                       url_str_arr.push($(this).closest("label").text().trim().replace(/ /g,'-'));

                      }else{
                        
                      }
                      
                   });
                   gender_arr = [...new Set(gender_arr)];
                    gender_str=gender_arr.join(',');
                     url_str_arr = [...new Set(url_str_arr)];
                            url_str=url_str_arr.join('-aNd-');

                   if(gender_str!=''){
                         url_common=url_common+'sx-'+gender_str+'/';

                   }

                   //  if(url_str!=''){
                   //       url_common=url_common+'sx-'+url_str+'/';

                   // }


                  let age_str='';
                  let age_arr=[];
                   url_str_arr=[];
                          url_str='';

                   fields=obj.preferenceTypeFormGenderList;
                   jQuery.each(fields, function(i, field){
                      if(field.value=='age'){
                        age_arr.push(field.value);
                       url_str_arr.push($(this).closest("label").text().trim().replace(/ /g,'-'));

                      }
                      
                   });
                   age_arr = [...new Set(age_arr)];
                    age_str=age_arr.join(',');
                    url_str_arr = [...new Set(url_str_arr)];
                            url_str=url_str_arr.join('-aNd-');

                   if(age_str!=''){
                         url_common=url_common+'ag-'+age_str+'/';

                   }
                    if(url_str!=''){
                       //  url_common=url_common+'ag-'+url_str+'/';

                   }

                   let all_str='';
                  let all_arr=[];
                  url_str_arr=[];
                          url_str='';
                    fields=obj.preferenceTypeFormGenderList;
                   jQuery.each(fields, function(i, field){
                    if(field.value=='all'){
                       all_arr.push(field.value);
                       url_str_arr.push($(this).closest("label").text().trim().replace(/ /g,'-'));

                      }

                      
                   });
                   all_arr = [...new Set(all_arr)];
                    all_str=all_arr.join(',');
                     url_str_arr = [...new Set(url_str_arr)];
                            url_str=url_str_arr.join('-aNd-');

                   if(all_str!=''){
                         url_common=url_common+'all-'+all_str+'/';

                   }
                   if(url_str!=''){
                       //  url_common=url_common+'all-'+url_str+'/';

                   }




                   if(obj.urgentitem){

                        let urgent_str='';
                        let urgent_arr=[];
                        url_str_arr=[];
                          url_str='';

                        fields=obj.urgentitem;
                       // alert(fields);

                       //jQuery.each(fields, function(i, field){
                        if(fields==3){
                           urgent_arr.push(fields);
                         url_str_arr.push('yes');

                        }

                         if(fields=='urgent'){
                         // url_str_arr.push('urgent');
                         
                        }

                          
                        // });
                        urgent_arr = [...new Set(urgent_arr)];
                        urgent_str=urgent_arr.join(',');
                        url_str_arr = [...new Set(url_str_arr)];
                            url_str=url_str_arr.join('-aNd-');

                        if(urgent_str!=''){
                           //  url_common=url_common+'urgent-'+urgent_str+'/';

                        }
                         if(url_str!=''){
                          url_common=url_common+'urgent-'+url_str+'/';

                         }


                   }
                   
                   if(obj.dropdownSearch){

                        let dropdown_str='';
                        let dropdown_arr=[];

                        url_str_arr=[];
                          url_str='';

                        fields=obj.dropdownSearch;
                       // alert(fields);

                       //jQuery.each(fields, function(i, field){
                       // if(fields==3){
                           dropdown_arr.push(fields);
                       url_str_arr.push(fields);

                       // }

                          
                        // });
                        dropdown_arr = [...new Set(dropdown_arr)];
                        dropdown_str=dropdown_arr.join(',');
                        
                         url_str_arr = [...new Set(url_str_arr)];
                            url_str=url_str_arr.join('-aNd-');

                        if(dropdown_str!=''){
                            url_common=url_common+'dd-'+dropdown_str+'/';


                        }

                         if(url_str!=''){
                          // url_common=url_common+'dd-'+$("option[id=dropdownOption"+dropdown_str+"]").text().trim().replace(/ /g,'-')+'/';

                         }


                   }
                   
                   

                    
                    // var dropdownSearch=$('.dropdownSearch').val();
                    // if($("#urgentitem").prop('checked') == true){
                    //      var urgentitem=$('.urgentitem').val();
                    // }
                    
                     // var dropdownSearchd=$('.dropdownage').val();

                   //remove last + sign
                  
                  //let first_char=meta_value.slice(0);
                  //if(first_char==','){

                   // meta_value.substring(1)
                    
                    meta_value =  meta_value.substring(1);
                  //}
                  let meta_arr=meta_value.split(',');
                  meta_arr=[...new Set(meta_arr)];
                  meta_value=meta_arr.join(', ');

                  final_meta = 'Doncen is the next generation Donation Center near me which is running online on www.doncen.org i.e. worlds largest donation portal. Here you may donate anything, whatever you can think at any time any where world wide. You may become a Donor , Helper of Donor , Donee , Helper of Donee. You can give or take anything as donation near your place which might be more than money ' +meta_value+'.';

                  //alert(meta_arr);

                    $('meta[name=description]').attr('content', final_meta);

                    if(meta_value != '')
                      {
                        $('meta[name=keywords]').attr('content', meta_value);
                      }
                      else
                      {
                          $('meta[name=keywords]').attr('content', 'Doncen | Donation of '+sp_title_str+' of '+st_title_arr_str+' under '+ct_title_str+' in '+city_search_box_str); 
                      }


                  let last_char=url_common.slice(-1);
                  if(last_char=='/'){
                    
                    url_common = url_common.slice(0, url_common.length - 1);
                  }


                  //alert(url_common);


                window.history.replaceState("", "",url_common);


                //window.addEventListener('popstate');
	
            }
        });
    }
	
	
	@if(!Session::has('search'))
		/* call_ajax("{{ URL::route('web.home.getItemOnLoad')}}",{page: 0}); */
		SearchFormSubmit();
	@endif
   
    /* New Js Code Start*/
	
	
	
	/* For Home Page Re-Direct Search Values Call  End */
    $(".search_form").submit(function(e){
         e.preventDefault();
		 
         /*Get all the forms data*/
         /* var dropdownSearch=$('.dropdownSearch').val();
         var search_form=$('.search_form').serializeArray();
         var looking_for=$('.myForm').serializeArray();
         var categoryForm=$('.categoryForm').serializeArray();
         var subCategoryForm=$('.subCategoryForm').serializeArray();
         var specificationForm=$('.specificationForm').serializeArray();
         var conditionForm=$('.conditionForm').serializeArray();
         var considerationTypeForm=$('.considerationTypeForm').serializeArray();
         var donationTypeForm=$('.donationTypeForm').serializeArray();
         var preferenceTypeFormGenderList=$('.preferenceTypeFormGenderList').serializeArray();
            console.log($('.search_form').serializeArray());
            console.log($('.myForm').serializeArray());
         
        call_ajax("{{ route('home.searchPage.searchItem') }}",{
                    page: 1,
                    dropdownSearch:dropdownSearch,
                    data: $('.search_form').serializeArray(),
                    looking_for: $('.myForm').serializeArray(),
                    categoryForm: $('.categoryForm').serializeArray(),
                    subCategoryForm:$('.subCategoryForm').serializeArray(),
                    specificationForm:$('.specificationForm').serializeArray(),
                    conditionForm:$('.conditionForm').serializeArray(),
                    considerationTypeForm:$('.considerationTypeForm').serializeArray(),
                    donationTypeForm:$('.donationTypeForm').serializeArray(),
                    preferenceTypeFormGenderList:$('.preferenceTypeFormGenderList').serializeArray()
        }); */
		SearchFormSubmit();
    });

    /* New Js Code End*/

    $('.urgentitem').change(function(){


        SearchFormSubmit();
    });
/* For Home Page Re-Direct Search Values Call  Start */
	/*Get all the forms data*/
			function SearchFormSubmit(value)
			{
					// alert('In');dropdownage
                    /*Get all the forms data*/
					 var dropdownSearch=$('.dropdownSearch').val();
                   
                   if($("#urgentitem").prop('checked') == true){
                         var urgentitem=$('.urgentitem').val();
                    }
                    
            var dropdownSearchd=$('.dropdownage').val();
                     // alert(dropdownSearch);
					 var search_form=$('.search_form').serializeArray();
          
					 //var looking_for=$('.myForm').serializeArray();
           // var categoryForm=$('.categoryForm').serializeArray();
           //           console.log(categoryForm); 
           // var subCategoryForm=$('.subCategoryForm').serializeArray();
           // var specificationForm=$('.specificationForm').serializeArray();
           // var conditionForm=$('.conditionForm').serializeArray();
           // var considerationTypeForm=$('.considerationTypeForm').serializeArray();
           // var donationTypeForm=$('.donationTypeForm').serializeArray();
           // var preferenceTypeFormGenderList=$('.preferenceTypeFormGenderList').serializeArray();
          //haresh start
         // alert(value);
         // alert(dropdownSearch);
         // alert(window.innerWidth);


          // if(value=="normal" || (urgentitem > 0) ){
          if(window.innerWidth > 991){

           // alert('Yes');
             var looking_for=$('.myForm_normal').serializeArray();
             var categoryForm=$('.categoryForm_normal').serializeArray();
             var subCategoryForm=$('.subCategoryForm_normal').serializeArray();
             var specificationForm=$('.specificationForm_normal').serializeArray();
             var conditionForm=$('.conditionForm_normal').serializeArray();
             var considerationTypeForm=$('.considerationTypeForm_normal').serializeArray();
             var donationTypeForm=$('.donationTypeForm_normal').serializeArray();
             var preferenceTypeFormGenderList=$('.preferenceTypeFormGenderList_normal').serializeArray(); 
         }
         else{
            // alert('No');
            var looking_for=$('.myForm_modal').serializeArray();
             var categoryForm=$('.categoryForm_modal').serializeArray();
             var subCategoryForm=$('.subCategoryForm_modal').serializeArray();
             var specificationForm=$('.specificationForm_modal').serializeArray();
             var conditionForm=$('.conditionForm_modal').serializeArray();
             var considerationTypeForm=$('.considerationTypeForm_modal').serializeArray();
             var donationTypeForm=$('.donationTypeForm_modal').serializeArray();
             var preferenceTypeFormGenderList=$('.preferenceTypeFormGenderList_modal').serializeArray(); 
         }
          
					
				

            let looking_for_jsonObject = looking_for.map(JSON.stringify);
            looking_for_uniqueSet = new Set(looking_for_jsonObject);
            looking_for = Array.from(looking_for_uniqueSet).map(JSON.parse);

             let categoryForm_jsonObject = categoryForm.map(JSON.stringify);
            categoryForm_uniqueSet = new Set(categoryForm_jsonObject);
            categoryForm = Array.from(categoryForm_uniqueSet).map(JSON.parse);

            let subCategoryForm_jsonObject = subCategoryForm.map(JSON.stringify);
            subCategoryForm_uniqueSet = new Set(subCategoryForm_jsonObject);
            subCategoryForm = Array.from(subCategoryForm_uniqueSet).map(JSON.parse);

            let specificationForm_jsonObject = specificationForm.map(JSON.stringify);
            specificationForm_uniqueSet = new Set(specificationForm_jsonObject);
            specificationForm = Array.from(specificationForm_uniqueSet).map(JSON.parse);
            //alert(subCategoryForm_jsonObject);

            let conditionForm_jsonObject = conditionForm.map(JSON.stringify);
            conditionForm_uniqueSet = new Set(conditionForm_jsonObject);
            conditionForm = Array.from(conditionForm_uniqueSet).map(JSON.parse);

             let considerationTypeForm_jsonObject = considerationTypeForm.map(JSON.stringify);
            considerationTypeForm_uniqueSet = new Set(considerationTypeForm_jsonObject);
            considerationTypeForm = Array.from(considerationTypeForm_uniqueSet).map(JSON.parse);
            
             let donationTypeForm_jsonObject = donationTypeForm.map(JSON.stringify);
            donationTypeForm_uniqueSet = new Set(donationTypeForm_jsonObject);
            donationTypeForm = Array.from(donationTypeForm_uniqueSet).map(JSON.parse);

            let preferenceTypeFormGenderList_jsonObject = preferenceTypeFormGenderList.map(JSON.stringify);
            preferenceTypeFormGenderList_uniqueSet = new Set(preferenceTypeFormGenderList_jsonObject);
            preferenceTypeFormGenderList = Array.from(preferenceTypeFormGenderList_uniqueSet).map(JSON.parse);
          // console.log(looking_for);
           //haresh end
				// POPUP
				// 	 var looking_for=$('.myForm1').serializeArray();
				// 	 var categoryForm=$('.categoryForm1').serializeArray();
				// 	 var subCategoryForm=$('.subCategoryForm1').serializeArray();
				// 	 var specificationForm=$('.specificationForm1').serializeArray();
				// 	 var conditionForm=$('.conditionForm1').serializeArray();
				// 	 var considerationTypeForm=$('.considerationTypeForm1').serializeArray();
				// 	 var donationTypeForm=$('.donationTypeForm1').serializeArray();
				// 	 var preferenceTypeFormGenderList=$('.preferenceTypeFormGenderList1').serializeArray();
					 
						// console.log($('.search_form').serializeArray());
						// console.log($('.myForm').serializeArray());
					
					// POPUP	
				// 		console.log($('.myForm1').serializeArray());
					 
					call_ajax("{{ route('home.searchPage.searchItem') }}",{
            //haresh:end_array,
								page: 0 ,
								dropdownSearch:dropdownSearch,
                                dropdownSearchd:dropdownSearchd,
                                urgentitem:urgentitem,
                                // console.log(dropdownSearchd);
								data: $('.search_form').serializeArray(),
                looking_for:looking_for,
								// looking_for: $('.myForm').serializeArray(),
                categoryForm: categoryForm,
								// categoryForm: $('.categoryForm').serializeArray(),
                subCategoryForm:subCategoryForm,
								// subCategoryForm:$('.subCategoryForm').serializeArray(),
                specificationForm:specificationForm,
								// specificationForm:$('.specificationForm').serializeArray(),
                conditionForm:conditionForm,
								// conditionForm:$('.conditionForm').serializeArray(),
                considerationTypeForm:considerationTypeForm,
								// considerationTypeForm:$('.considerationTypeForm').serializeArray(),
                donationTypeForm:donationTypeForm,
								// donationTypeForm:$('.donationTypeForm').serializeArray(),
                preferenceTypeFormGenderList:preferenceTypeFormGenderList
								// preferenceTypeFormGenderList:$('.preferenceTypeFormGenderList').serializeArray()
								
             
							// POPUP	
								// looking_for: $('.myForm1').serializeArray(),
								// categoryForm: $('.categoryForm1').serializeArray(),
								// subCategoryForm:$('.subCategoryForm1').serializeArray(),
								// specificationForm:$('.specificationForm1').serializeArray(),
								// conditionForm:$('.conditionForm1').serializeArray(),
								// considerationTypeForm:$('.considerationTypeForm1').serializeArray(),
								// donationTypeForm:$('.donationTypeForm1').serializeArray(),
								// preferenceTypeFormGenderList:$('.preferenceTypeFormGenderList1').serializeArray()

			});
		}
		
	
	@if($homeCity!='' || $homeCategory!='' || $homeword!='')
			SearchFormSubmit();
	@endif
		


    //Get list of category and subcateegory
		$('.categoryClass').click(function() {
      //haresh start
        //remove  below comment 

       let formId=$(this).closest('form').attr("id");
       let value='';
       
        if(formId=='myForm1'){
        
         value='modal';
        }else{
        
           value='normal';
        
        }
  
			SearchFormSubmit(value);
    });

	 //Get list of consideration
    $('.considerationType').click(function() {
      //haresh start
        //remove  below comment 

       let formId=$(this).closest('form').attr("id");
       let value='';
       
        if(formId=='considerationTypeForm1'){
        
         value='modal';
        }else{
        
           value='normal';
        
        }
  
      SearchFormSubmit(value);
    });
  
	/* preference */
		$('.preference').click(function() {

       let formId=$(this).closest('form').attr("id");
       let value='';
       
        if(formId=='preferenceTypeFormGenderList1'){
        
         value='modal';
        }else{
        
           value='normal';
        
        }

			SearchFormSubmit(value);
    });	
    $('.selectCategory').click(function() {
       	
        var _token = $('input[name="_token"]').val();
        // alert('start');
       
        let formId=$(this).closest('form').attr("id");
        let value='';
       
        if(formId=='categoryForm1'){
        
         value='modal';
        }else{
        
           value='normal';
        
        }

        // SearchFormSubmit(value);
// $('.subcategories').empty();

        // alert('process');
        $('.subcategories').html('');
		$.ajax({
            type        : 'POST',
			// dataType    : 'JSON',
            url         : "{{ URL::route('search.category.subcategory') }}", // the url where we want to POST
            data        : {data: $('.categoryForm_'+value).serialize(), _token:_token},

            success:function(data){
                
                // alert('12');
                // alert(data);
                
                $('.subcategories').html(data);
                
            },
             error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error: ' + textStatus + ' ' + errorThrown);
                  }
        });

      $('.specificationHtml').html('');

      SearchFormSubmit(value);

     

    });

    //drop down search
    $("#dropdownSearch").on('change',function(){
			SearchFormSubmit();
    });

      $("#dropdownage").on('click',function(){
        // alert('hello');
            SearchFormSubmit();
    });

    //category wise search
    $(".donationTypeCategory").click(function() {

        let formId=$(this).closest('form').attr("id");
       let value='';
       
        if(formId=='donationTypeForm1'){
        
         value='modal';
        }else{
        
           value='normal';
        
        }

			SearchFormSubmit(value);
    });

    //anyConsideration wise search
   //  $("#considerationTypeForm").click(function() {
			// SearchFormSubmit();
   //  });

    //condition wise search
    $(".conditionInput").click(function() {

		 let formId=$(this).closest('form').attr("id");
       let value='';
       
        if(formId=='conditionForm1'){
        
         value='modal';
        }else{
        
           value='normal';
        
        }

      SearchFormSubmit(value);
    });
   
    $(document).on('click','.selectSubCategory',function(){

        let formId=$(this).closest('form').attr("id");
       let value='';
       
        if(formId=='subCategoryForm1'){
        
         value='modal';
        }else{
        
           value='normal';
        
        }

		$('.specificationHtml').html('');
		 $.ajax({
				type        : 'POST',
				url         : "{{ URL::route('search.subcategory.specification') }}", // the url where we want to POST
				data        : {data: $('.subCategoryForm_'+value).serialize()},
				success: function(data){
					$('.specificationHtml').html(data);
				}
			});

     SearchFormSubmit(value);

    });
    
    $(document).on('click','.selectSpecifiction',function(){
          let formId=$(this).closest('form').attr("id");
       let value='';
       
        if(formId=='specificationForm1'){
        
         value='modal';
        }else{
        
           value='normal';
        
        }
    		SearchFormSubmit(value);
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
    @if($homeCategory!='')
      $(".selectCategory[data-in]").trigger( "click" );
    @endif
});


function updateCheckbox(value){
  // let lookingFor='looking'+value;
  //alert(value);
  // for(let u=0;u<convert_ut_array.length;u++ ){
  //                     $("input[name=ut]").each( function () {
  //                        if( $(this).val()==convert_ut_array[u] ){
                         
  //                         $(this).attr("checked", true);
  //                        }
  //                    });
  //                   }

        // if($(".lookingFor"+value).attr("checked",true)){
        //   $(".lookingFor"+value).attr("checked",false);
        // }else{
        //   $(".lookingFor"+value).attr("checked",true);
        // }
        //alert($(".lookingFor"+value).attr("checked"));
}

function getData(page){
					 var dropdownSearch=$('.dropdownSearch').val();
                       var dropdownSearchd=$('.dropdownage').val();
					 var search_form=$('.search_form').serializeArray();
					 var looking_for=$('.myForm').serializeArray();
					 var categoryForm=$('.categoryForm').serializeArray();
					 var subCategoryForm=$('.subCategoryForm').serializeArray();
					 var specificationForm=$('.specificationForm').serializeArray();
					 var conditionForm=$('.conditionForm').serializeArray();
					 var considerationTypeForm=$('.considerationTypeForm').serializeArray();
					 var donationTypeForm=$('.donationTypeForm').serializeArray();
					 var preferenceTypeFormGenderList=$('.preferenceTypeFormGenderList').serializeArray();
					 
			    // POPUP
				// 	 var looking_for=$('.myForm1').serializeArray();
				// 	 var categoryForm=$('.categoryForm1').serializeArray();
				// 	 var subCategoryForm=$('.subCategoryForm1').serializeArray();
				// 	 var specificationForm=$('.specificationForm1').serializeArray();
				// 	 var conditionForm=$('.conditionForm1').serializeArray();
				// 	 var considerationTypeForm=$('.considerationTypeForm1').serializeArray();
				// 	 var donationTypeForm=$('.donationTypeForm1').serializeArray();
				// 	 var preferenceTypeFormGenderList=$('.preferenceTypeFormGenderList1').serializeArray();
					 
					 // 	console.log($('.search_form').serializeArray());
						// console.log($('.myForm').serializeArray());
					 
					//POPUP
					   // console.log($('.myForm1').serializeArray());
					
					
					
					call_ajax("{{ route('home.searchPage.searchItem') }}",{
								page: page,
								dropdownSearch:dropdownSearch,
                                dropdownSearchd:dropdownSearchd,
								data: $('.search_form').serializeArray(),
								looking_for: $('.myForm').serializeArray(),
								categoryForm: $('.categoryForm').serializeArray(),
								subCategoryForm:$('.subCategoryForm').serializeArray(),
								specificationForm:$('.specificationForm').serializeArray(),
								conditionForm:$('.conditionForm').serializeArray(),
								considerationTypeForm:$('.considerationTypeForm').serializeArray(),
								donationTypeForm:$('.donationTypeForm').serializeArray(),
								preferenceTypeFormGenderList:$('.preferenceTypeFormGenderList').serializeArray()
								
				// 			//POPUP
				// 			    looking_for: $('.myForm1').serializeArray(),
				// 				categoryForm: $('.categoryForm1').serializeArray(),
				// 				subCategoryForm:$('.subCategoryForm1').serializeArray(),
				// 				specificationForm:$('.specificationForm1').serializeArray(),
				// 				conditionForm:$('.conditionForm1').serializeArray(),
				// 				considerationTypeForm:$('.considerationTypeForm1').serializeArray(),
				// 				donationTypeForm:$('.donationTypeForm1').serializeArray(),
				// 				preferenceTypeFormGenderList:$('.preferenceTypeFormGenderList1').serializeArray()
								
					
			});
			/* For Hash Value Change Duplicate Of call_ajax */
		
    /////  Not find -- where used - Haresh
    function call_ajax(url,data){
      
      // console.log(url);
      // console.log(data);
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
                    
                    $('.appendText').children().hide();
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
/* CHECK BOX CSS START*/
input[type='checkbox'] {
    -webkit-appearance:none;
    width:19px;
    height:20px;
    border:1px solid darkgray;
    /*border-radius:50%;*/
    /*outline:none;*/
    /*box-shadow:0 0 5px 0px gray inset;*/
    margin-left: 15px !important;
    margin-right: 10px;
    padding: 0px 1px;
}
input[type='checkbox']:hover {
    box-shadow:0 0 5px 0px #00a651 inset;
}
input[type='checkbox']:focus {
    -webkit-box-shadow: 2px 4px 2px 0px
#8888889e !important;
    box-shadow: 
rgba(136, 136, 136, 0.62) 2px 3px 5px 0px;
}
input[type='checkbox']:before {
    /*content:'\f00c';*/
    /*display:block;*/
    /*width:68%;*/
    /*height:68%;*/
    /*margin: 15% auto;    */
    /*border-radius:50%;    */
}
input[type='checkbox']:checked:before {
    background: #00a651;
    content:'\f00c';
    font-family: 'FontAwesome';
    color:#ffffff;
}

@media (max-width: 1199px) and (min-width: 992px){
		.ad-meta{
			width:100% !important;	
		}
        .item-info{
            min-height:152px !important;
        }

}

@media (min-width: 768px) and (max-width: 991px) {
    .banner-form-full.banner-form .form-control, .banner-form-full.banner-form .category-dropdown {
        width: 25%;
    }

    .ad-meta{
        width:100% !important;  
    }

    .item-info{
        min-height:152px !important;
    }

}

@media only screen and (max-width: 768px) {
	.ad-meta{
		width:100% !important;	
	}
	 /*.pull-right{
		float:none !important;
	}*/
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
	/*.item-info{
		min-height:234px !important;
	}*/
	/*.ad-info{
		padding:0px 0px !important;	
	}*/
	/*.ad-meta{
		z-index:1 !important;
		top:18% !important;
	}*/
	.item-image-box .item-image img{
		height:170px !important;
	}
	/*.ad-info span{
		 display:none !important;
	}*/
	/*.category-item{
		max-height:234px !important;
		min-height:234px !important;
	}*/
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