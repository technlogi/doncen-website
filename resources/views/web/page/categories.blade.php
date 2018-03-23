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
                                <input type="text" name="category_box" placeholder="Enter Category" id='category_box'>
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
                                                   @foreach($categories as $category)
                                                        <label for="hospitals">
                                                            <input type="checkbox" name="" >{{$category->name}} 
                                                            <span> ({{$category->total_post}})</span>
                                                        </label>
                                                   @endforeach
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
                                                @foreach($subcategories as $subcategory)
                                                      <label for="blood"><input type="checkbox" name="" id="blood">{{ $subcategory->name}}<span></span></label>
                                                @endforeach


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
                                                @foreach($specifications as $specification)
                                                    <label for="a+"><input type="checkbox" name="" id="a+">{{$specification->name }}<span></span></label>
                                                @endforeach

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
                                                <label for="new"><input type="checkbox" name="new" id="newSearch"> New</label>
                                                <label for="used"><input type="checkbox" name="used" id="usedSearch"> Used</label>
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
                                                <label for="any"><input type="checkbox" name="" id="anyConsideration"> Any</label>
                                                <label for="free"><input type="checkbox" name="used" id="freeConsideration"> Free</label>
                                                <label for="monetary"><input type="checkbox" name="" id="monetaryConsideration"> Monetary</label>
                                                <label for="non-monetary"><input type="checkbox" name="used" id="nonMonetaryConsideration"> Non-Monetary</label>
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
                                            @foreach($donation_types as $donation_type)
                                                <label for="other-type"><input type="checkbox" name="used" id="other-type" value="{{$donation_type->id}}" class="donationTypeCategory"> {{$donation_type->name}}</label>
                                            @endforeach
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
                                                <option value="3">Urgent</option>
                                                <option value="1">Featured</option>
                                            </select>								
                                        </div><!-- category-change -->														
                                    </div>							
                                </div><!-- featured-top -->	
                             <div class="appendText"></div>
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
        success: function(data){
            $('.appendText').html(data);
        }
    });
  }
  call_ajax("{{ URL::route('web.home.getItemOnLoad')}}",0);
  
  $("#city_search_box").autocomplete({
    source: function(request, response) {
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
           });
            $.ajax({
                type: "POST",
                url: "{{ route('home.search.city') }}",
                dataType: "json",
                data: {
                    city : request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
    minLength: 2,
  });
  $("#category_box").autocomplete({
        source: function(request, response) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
           });
            $.ajax({
                type: "POST",
                url: "{{ route('home.search.category') }}",
                dataType: "json",
                data: {
                    category : request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
      minLength: 1,
  });
  $("#search_form").submit(function(e){
    e.preventDefault();
    call_ajax("{{ route('home.searchPage.searchItem') }}",$(this).serializeArray());
  });
    //drop down search
  $("#dropdownSearch").on('click',function(){
      call_ajax( "{{ route('search.dropdown.search') }}",$(this).val());
  });

       ///category wise search
  $(".donationTypeCategory").on('click',function(){
      call_ajax("{{ URL::route('search.categories.category')}}",$(this).val());
  });
        ///anyConsideration wise search
  $("#anyConsideration").on('click',function(){
    call_ajax("{{ URL::route('search.consideration.consideration')}}",5);
  });
  $("#freeConsideration").on('click',function(){
    call_ajax("{{ URL::route('search.consideration.consideration')}}",0);
  });
  $("#monetaryConsideration").on('click',function(){
    call_ajax("{{ URL::route('search.consideration.consideration')}}",1);
  });
  $("#nonMonetaryConsideration").on('click',function(){
    call_ajax("{{ URL::route('search.consideration.consideration')}}",2);
  });

     //condition wise search
  $("#newSearch").on('click',function(){
    call_ajax("{{ URL::route('search.condition.condition')}}",1);
  });
  $("#usedSearch").on('click',function(){
    call_ajax("{{ URL::route('search.condition.condition')}}",2);
  });


  //
//   $('.categoryClass').on('click',function(){
//     call_ajax("{{ URL::route('search.categories.category')}}",$(this).val());
//   });
    $('.categoryClass').click(function() {
        call_ajax("{{ URL::route('search.categories.category')}}",$('#myForm').serialize());
    });


});
</script>
@endpush