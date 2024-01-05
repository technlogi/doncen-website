@extends('user.layout.master')
@section('title','Home')

@section('content')

 <section id="home-one-info" class="clearfix home-one">
            <!-- world -->
            <div id="banner-two" class="parallax-section">
                <div class="row text-center">
                    <!-- banner -->
                    <div class="col-sm-12 ">
                        <div class="banner">
                       	    	
                            <h1 class="title">World’s Largest Donation Portal </h1>
                            <h3>DonCen! Donate anything, whatever you can think.</h3>
                            <!-- banner-form -->
                            <div class="banner-form">
                                 <form method="post" id="search_form" action="{{ url('/search')}}">
                                     
                                     {{ csrf_field() }}
                                    <!-- <div class="dropdown category-dropdown"> 						
                                        <input type="text" name="city_search_box" placeholder="Enter City" id='search_text'>
                                    </div> -->
                                    <div class="dropdown category-dropdown">		
                                        <input type="text"  list="cityBrowsers" name="city_search_box" placeholder="Enter City" />
                                        <datalist id="cityBrowsers" >
                                            @foreach($cities as $city)
                                            <option value="{{$city->name}}" >
                                            @endforeach
                                        </datalist>
                                    </div>

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
                                     <button type="submit" class="form-control" value="Search">Search</button>
                                </form>
                             </div>
                             <!-- banner-form -->
                           <!-- banner-socail -->
                           <!-- <ul class="banner-socail">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            </ul> -->
                            <!-- banner-socail -->
                        </div>
                    </div><!-- banner -->
                </div><!-- row -->
            </div><!-- world -->

            <div class="container">
                <div class="row">
                    <div class="section category-ad1 text-center">
                        <ul class="category-list">	
                        @foreach($categories as $category)
                            <li class="category-item">
                                <a href="{{ route('home.category.details', $category->key ) }}">
                                    <div class="category-icon">
                                    @if($category->image != '')
                                        <img src="{{ $category->image }}" alt="{{$category->name}}">  
                                    @endif
                                    </div>
                                    <span class="category-title">{{$category->name}}</span>
                                    <span class="category-quantity">({{$category->total_post}})</span>
                                </a>
                            </li><!-- category-item -->
                        @endforeach
                        </ul>				
                    </div><!-- category-ad -->	
                </div>
                   <!-- trending-ads -->
                   <div class="section trending-ads">
                    <div class="section-title tab-manu">
                        <h4>Urgent Donation</h4>
                        <!-- Nav tabs -->      
                        <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" value="1" class="categoryTab"><a href="#1" data-toggle="tab">All</a></li>
                        @foreach($categories as $category)
                            <li role="presentation" value="{{ $category->key}}" class="categoryTab"><a href="#{{ $category->key}}"  data-toggle="tab">{{ $category->name }}</a></li>
                        @endforeach
                        </ul>
                    </div>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- tab-pane -->
                        <div role="tabpanel" class="tab-pane fade in active" id="recent-ads">
                          <div class="appendText"></div>
                        </div><!-- tab-pane -->
                    </div>
                </div><!-- trending-ads -->			
             
                <!-- cta -->
                <div class="cta text-center">
                    <div class="row">
                        <!-- single-cta -->
                        <div class="col-sm-4">
                            <div class="single-cta">
                                <!-- cta-icon -->
                                <div class="cta-icon icon-secure">
                                    <img src="{{ URL::asset('/uploads/images/icon/13.png')}}" alt="Icon" class="img-responsive">
                                </div><!-- cta-icon -->

                                <h4>Easy search</h4>
                                <p>Customised search your requirement based on category, location, preference, urgency etc.</p>
                            </div>
                        </div><!-- single-cta -->

                        <!-- single-cta -->
                        <div class="col-sm-4">
                            <div class="single-cta">
                                <!-- cta-icon -->
                                <div class="cta-icon icon-support">
                                    <img src="{{ URL::asset('/uploads/images/icon/14.png')}}" alt="Icon" class="img-responsive">
                                </div><!-- cta-icon -->

                                <h4>Direct communicate</h4>
                                <p>You may directly call to the relevant person and fulfill your needs.</p>
                            </div>
                        </div><!-- single-cta -->

                        <!-- single-cta -->
                        <div class="col-sm-4">
                            <div class="single-cta">
                                <!-- cta-icon -->
                                <div class="cta-icon icon-Trending">
                                    <img src="{{ URL::asset('/uploads/images/icon/15.png')}}" alt="Icon" class="img-responsive">
                                </div><!-- cta-icon -->

                                <h4>Meet personally</h4>
                                <p>Meet the actual person and complete your donation from your heart with smile.</p>
                            </div>
                        </div><!-- single-cta -->
                    </div><!-- row -->
                </div><!-- cta -->											
            </div><!-- container -->
        </section><!-- home-one-info -->
        <section id="download" class="clearfix parallax-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h2><u>Coming soon on</u></h2>
                    </div>
                </div><!-- row -->

                <!-- row -->
                <div class="row">
                    <!-- download-app -->
                    <div class="col-sm-6">
                        <a href="#" class="download-app">
                            <img src="{{ URL::asset('/uploads/images/icon/16.png')}}" alt="Image" class="img-responsive">
                            <span class="pull-left">
                                <span>available on</span>
                                <strong>Google Play</strong>
                            </span>
                        </a>
                    </div><!-- download-app -->

                    <!-- download-app -->
                    <div class="col-sm-6">
                        <a href="#" class="download-app">
                            <img src="{{ URL::asset('/uploads/images/icon/17.png')}}" alt="Image" class="img-responsive">
                            <span class="pull-left">
                                <span>available on</span>
                                <strong>App Store</strong>
                            </span>
                        </a>
                    </div><!-- download-app -->

                    <!-- download-app -->
                   <!-- <div class="col-sm-4">
                        <a href="#" class="download-app">
                            <img src="{{ URL::asset('/uploads/images/icon/18.png')}}" alt="Image" class="img-responsive">
                            <span class="pull-left">
                                <span>available on</span>
                                <strong>Windows Store</strong>
                            </span>
                        </a>
                    </div> -->
                     <!-- download-app -->
                </div><!-- row -->
            </div><!-- contaioner -->
        </section><!-- download -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@push('javaScript')
<script src="{{ URL::asset('/js/user/js/jquery.min.js')}}"></script>
<script src="{{ URL::asset('/js/user/js/jquery-ui.min.js')}}"></script>

<script>
$(document).ready(function(){
    function initializeAddress() {
      var input = document.getElementById('search_text');
      var options = {
        types: ['geocode'] //this should work !
      };
      var autocomplete = new google.maps.places.Autocomplete(input, options);
    }
    google.maps.event.addDomListener(window, 'load', initializeAddress);
    // var page = 1; //track user scroll as page number, right now page number is 1
    // $(window).scroll(function() { //detect page scroll
    //     if($(window).scrollTop() + $(window).height() >= $(document).height() * 0.7) { //if user scrolled from top to bottom of the page
    //         page++; //page number increment
    //         append_html("{{ URL::route('web.home.getItemOnLoad')}}",{page: page});
    //     }
    // });       
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    append_html("{{ URL::route('web.home.getItemOnLoad')}}",{page: 0});
    function append_html(url , data) {
        $.ajax({
            type        : 'POST',
            url         : url, // the url where we want to POST
            data         : {data :data},
            success: function(data){
                    $('.appendText').html(data);
            }
        });
    }
    $(document).on('click','.categoryTab',function(){
         key = $(this).attr('value');
         $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $.ajax({
            type        : 'POST',
            url         : "{{ URL::route('web.home.getDonation')}}", // the url where we want to POST
            data        : {key: key},
            success: function(data){
                $('.appendText').html(data);
           }
      });
    });
    // $("#search_text").autocomplete({
    //     source: function(request, response) {
    //         $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             }
    //        });
    //         $.ajax({
    //             type: "POST",
    //             url: "{{ route('home.search.city') }}",
    //             dataType: "json",
    //             data: {
    //                 city : request.term
    //             },
    //             success: function(data) {
    //                 response(data);
                    
    //             }
    //         });
    //     },
    //   minLength: 2,
    // });
    // $("#category_box").autocomplete({
    //     source: function(request, response) {
    //         $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             }
    //        });
    //         $.ajax({
    //             type: "POST",
    //             url: "{{ route('home.search.category') }}",
    //             dataType: "json",
    //             data: {
    //                 category : request.term
    //             },
    //             success: function(data) {
    //                 response(data);
    //             }
    //         });
    //     },
    //   minLength: 1,
    // });
    // $("#search_form").submit(function(e){
    //      e.preventDefault();
    // });
});
</script>
@endpush