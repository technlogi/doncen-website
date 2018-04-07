@extends('user.layout.master')
@section('title','Category List')
@section('content')
   <!-- main -->
   <section id="main" class="clearfix category-page">
            <div class="container">
                <div class="breadcrumb-section">
                    <!--breadcrumb--> 
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li>Category</li>
                    </ol>
                    <!--breadcrumb--> 						
                    <h2 class="title">Category</h2>
                </div>
                <div class="banner">

                    <!-- banner-form -->
                    <div class="banner-form banner-form-full">
                        <form  id="search_form">
                                <!-- language-dropdown -->
                            <div class="dropdown category-dropdown"> 						
                                <input type="text" name="city_search_box" placeholder="Enter City" id="city_search_box">
                            </div><!-- language-dropdown -->

                            <div class="dropdown category-dropdown">		
                               <input type="text"  list="browsers" name="category_box" placeholder="Enter Category" id='category_box'>
                                <datalist id="browsers" >
                                    @foreach($categories as $category)
                                    <option value="{{$category->name}}" >
                                    @endforeach
                                </datalist>
                            </div> 
                            <div class="dropdown category-dropdown">
                                <input type="text" name="word_box" placeholder="Type Your key word">
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
                                                    <span class="pull-right"><i class="fa fa-minus "></i></span>
                                                </h4>
                                            </a>
                                        </div><!-- panel-heading -->

                                        <div id="accordion-four" class="panel-collapse collapse in">
                                            <!-- panel-body -->
                                            <div class="panel-body">
                                             <form method="post" id="myForm">
                                            @foreach($user_types as $user_type)
                                                   <label for="donor"><input type="checkbox" name="ut" class="categoryClass" value="{{ $user_type->id }}"> {{ $user_type->name}}</label>
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
                                                <h4 class="panel-title">Categories<span class="pull-right"><i class="fa fa-plus"></i></span></h4>
                                            </a>
                                        </div><!-- panel-heading -->

                                        <div id="accordion-one" class="panel-collapse collapse ">

                                            <!-- panel-body -->
                                            <div class="panel-body">
                                                <form method="post" id="categoryForm">
                                                   @foreach($categories as $category)
                                                        <label for="hospitals">
                                                            <input type="checkbox" name="ct" class="selectCategory" value="{{$category->id}}">{{$category->name}} 
                                                            <span> ({{$category->total_post}})</span>
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
                                                <h4 class="panel-title">Sub-Categories<span class="pull-right"><i class="fa fa-plus"></i></span></h4>
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
                                                <h4 class="panel-title">Specification<span class="pull-right"><i class="fa fa-plus"></i></span></h4>
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
                                                <h4 class="panel-title">Condition<span class="pull-right"><i class="fa fa-plus"></i></span></h4>
                                            </a>
                                        </div><!-- panel-heading -->

                                        <div id="accordion-two" class="panel-collapse collapse">
                                            <!-- panel-body -->
                                            <div class="panel-body">
                                            <form method="post" id="conditionForm">
                                                <label for="new"><input type="checkbox" class="conditionInput" name="cd" id="newSearch" value="1"> New</label>
                                                <label for="used"><input type="checkbox" class="conditionInput" name="cd" id="usedSearch" value="2"> Used</label>
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
                                                    <span class="pull-right"><i class="fa fa-plus"></i></span>
                                                </h4>
                                            </a>
                                        </div><!-- panel-heading -->

                                        <div id="accordion-three" class="panel-collapse collapse">
                                            <!-- panel-body -->
                                            <div class="panel-body">
                                            <form method="post" id="considerationTypeForm">
                                                <label for="any"><input type="checkbox" name="cs" id="anyConsideration" value="5"> Any</label>
                                                <label for="free"><input type="checkbox" name="cs" id="freeConsideration" value="0"> Free</label>
                                                <label for="monetary"><input type="checkbox" name="cs" id="monetaryConsideration" value="2"> Monetary</label>
                                                <label for="non-monetary"><input type="checkbox" name="cs" id="nonMonetaryConsideration" value="1"> Non-Monetary</label>
                                            </form>    
                                            </div><!-- panel-body -->
                                        </div>
                                    </div><!-- panel -->
                                    <!-- panel -->
                                    <div class="panel-default panel-faq">
                                        <!-- panel-heading -->
                                        <div class="panel-heading">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#type-of-donation">
                                                <h4 class="panel-title">Type of Donation<span class="pull-right"><i class="fa fa-plus"></i></span></h4>
                                            </a>
                                        </div><!-- panel-heading -->

                                        <div id="type-of-donation" class="panel-collapse collapse">
                                            <!-- panel-body -->
                                            <div class="panel-body">
                                                <form method="post" id="donationTypeForm">
                                                    @foreach($donation_types as $donation_type)
                                                        <label for="other-type"><input type="checkbox" name="td" value="{{$donation_type->id}}" class="donationTypeCategory"> {{$donation_type->name}}</label>
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
                                                <h4 class="panel-title">Preference<span class="pull-right"><i class="fa fa-plus"></i></span></h4>
                                            </a>
                                        </div><!-- panel-heading -->

                                        <div id="preference" class="panel-collapse collapse">
                                            <!-- panel-body -->
                                            <div class="panel-body">
                                                <label for="All"><input type="checkbox" name="" id="All">  All</label>
                                                <label for="gender"><input type="checkbox" name="" id="gender">  Gender</label>
                                                <label for="age"><input type="checkbox" name="" id="age">  Age</label>
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
                                    <h4>Recommended Ads for You</h4>
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
    var page = 1; //track user scroll as page number, right now page number is 1
    $(window).scroll(function() { //detect page scroll
        if($(window).scrollTop() + $(window).height() >= $(document).height() * 0.7) { //if user scrolled from top to bottom of the page
            page++; //page number increment
            append_html("{{ URL::route('web.home.getScrollData')}}",{page: page});
        }
    });         
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function append_html(url,data){
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
                $('.appendText').append(data);
            }
        });
    }
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
    call_ajax("{{ URL::route('web.home.getItemOnLoad')}}",{page: 0});
  
    // $("#city_search_box").autocomplete({
    //     source: function(request, response) {
    //         $.ajaxSetup({
    //                 headers: {
    //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //                 }
    //         });
    //             $.ajax({
    //                 type: "POST",
    //                 url: "{{ route('home.search.city') }}",
    //                 dataType: "json",
    //                 data: {
    //                     city : request.term
    //                 },
    //                 success: function(data) {
    //                     response(data);
    //                 }
    //             });
    //         },
    //     minLength: 2,
    // });
    // $("#category_box").autocomplete({
    //         source: function(request, response) {
    //             $.ajaxSetup({
    //                 headers: {
    //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //                 }
    //         });
    //             $.ajax({
    //                 type: "POST",
    //                 url: "{{ route('home.search.category') }}",
    //                 dataType: "json",
    //                 data: {
    //                     category : request.term
    //                 },
    //                 success: function(data) {
    //                     response(data);
    //                 }
    //             });
    //         },
    //     minLength: 1,
    // });
    $("#search_form").submit(function(e){
        e.preventDefault();
        call_ajax("{{ route('home.searchPage.searchItem') }}",$(this).serializeArray());
    });
    //Get list of category and subcateegory
    $('.categoryClass').click(function() {
        call_ajax("{{ URL::route('search.categories.category')}}",$('#myForm').serialize());
    });

    $('.selectCategory').click(function() {
        call_ajax("{{ URL::route('web.home.getCategoryData')}}",$('#categoryForm').serialize());
        $.ajax({
            type        : 'POST',
            url         : "{{ URL::route('search.category.subcategory') }}", // the url where we want to POST
            data        : {data: $('#categoryForm').serialize()},
            success: function(data){
                $('.subcategories').html(data);
            }
        });
    });


    
    //drop down search
    $("#dropdownSearch").on('click',function(){
        call_ajax( "{{ route('search.dropdown.search') }}",$(this).val());
    });

    //category wise search
    $(".donationTypeCategory").click(function() {
        call_ajax("{{ URL::route('search.donationcategories.Type')}}",$('#donationTypeForm').serialize());
    });

    //anyConsideration wise search
    $("#considerationTypeForm").click(function() {
        call_ajax("{{ URL::route('search.consideration.consideration')}}",$('#considerationTypeForm').serialize());
    });

    //condition wise search
    $(".conditionInput").click(function() {
         call_ajax("{{ URL::route('search.condition.condition')}}",$('#conditionForm').serialize());
    });
   
    $(document).on('click','.selectSubCategory',function(){
        call_ajax("{{ URL::route('web.home.getsubCategoryData')}}",$('#subCategoryForm').serialize());
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
        call_ajax("{{ URL::route('search.specification.list')}}",$('#specificationForm').serialize());
    });
});
</script>
@endpush