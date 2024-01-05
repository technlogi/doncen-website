@extends('user.layout.master')
@section('title','Home')

@section('content')
<style>
.section{
	overflow:hidden;
}
</style>


 <section id="home-one-info" class="clearfix home-one">
            <!-- world -->
            <div id="banner-two" class="parallax-section">
                <div class="row text-center">
                    <!-- banner -->
                    <div class="col-sm-12 ">
                        <div class="banner" >
                       	    	
                            <h1 class="title">Donate ANYTHING, whatever you can think</h1>
                            <h3>You may become a Donor, Donee, Helper of Donor/Donee</h3>
                            
                            <a href="{{ route('web.donation.category') }}" class="btn-main btn">DONATE NOW</a>
                            <a href="{{ route('web.donation.category') }}" class="btn-main btn">REQUEST NOW</a>
                            
                            <!-- banner-form -->
                            <div class="banner-form">
                                 <form method="post" id="search_form" action="{{ url('/donation-near-me/dd-1')}}">
                                     
                                     {{ csrf_field() }}
                                    <!-- <div class="dropdown category-dropdown"> 						
                                        <input type="text" name="city_search_box" placeholder="Enter City" id='search_text'>
                                    </div> -->
                                    <div class="dropdown category-dropdown">		
                                        <input type="text"  list="cityBrowsers" name="city_search_box" class="city_search_box" placeholder="Enter City" autocomplete="off" style="line-height: normal !important;">
                                        <datalist id="cityBrowsers" >
                                                                


                                        </datalist>

                                    </div>

                                    <div class="dropdown category-dropdown">		
                                        <input type="text"  list="browsers" name="category_box" class="category_box" placeholder="Enter Category" id='category_box'  autocomplete="off" style="line-height: normal !important;">
                                        <datalist id="browsers" >
                                            @foreach($categories as $category)
                                            <option value="{{$category->name}}" >
                                            @endforeach
                                        </datalist>
                                    </div> 
                                    

                                    <div class="dropdown category-dropdown">
                                        <input type="text" list="search_text" name="word_box" class="search_text word_box"  placeholder="What are you looking for today" autocomplete="off" style="line-height: normal !important;">

                                        <datalist id="search_text" >
                                            
                                        </datalist>
                                    </div>


                                    <div class="action"> 
                                     

                                     <button  type="submit" disabled="disabled" class="form-control search_btn" value="Search">Search</button>
                                     </div>
                                </form>
                             </div>
                             <!-- banner-form -->
                           <!-- banner-socail -->
                           <ul class="banner-socail">
                                <li><a href="https://www.facebook.com/doncen.org/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://www.instagram.com/doncenorg/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                <!-- <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li> -->
                            </ul>
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

                                @php
                                    $alt=str_replace(' ','-',$category->name);
                                @endphp
                            <li class="category-item">
                                <!-- <form method="post" class="categoryForm" action="{{ route('home.category.details')}}">{{ route('home.searchPage.searchItem') }} -->
                                <a href="{{ route('web.categorie.searchCategory') }}/cdd-{{$alt}}/dd-1">
                                 {{ csrf_field() }}
                                    <input type="hidden" value="{{$category->name}}" name="category_name" />
                                 

                                <!-- <a href="{{ route('home.category.details', $category->name) }}"> -->
                                    <div class="category-icon">
                                    
                                    @if($category->image != '')
                                        <img src="{{ URL::asset('/uploads/svg')}}/{{ $category->image }}" alt="{{$alt}}">  
                                    @endif
                                    </div>
                                    <!-- <input type="submit" name="submit" value="{{$category->name}}"> -->
                                    <span class="category-title">{{$category->name}}</span>
                                    <!-- <span class="category-quantity">({{$category->total_post}})</span> -->
                                
                                <!-- </a> -->

                                </a>
                            </li><!-- category-item -->
                            
                        @endforeach
                        </ul>				
                    </div><!-- category-ad -->	
                </div>
                   <!-- trending-ads -->
                   <!-- <div class="section trending-ads">
                    <div class="section-title tab-manu">
                        <h4>Urgent Donation</h4> -->
                        <!-- Nav tabs -->      
                        <!-- <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" value="1" class="categoryTab"><a href="#1" data-toggle="tab">All</a></li> -->
                        <!-- @foreach($categories as $category) -->
                            <!-- <li role="presentation" value="{{ $category->key}}" class="categoryTab"><a href="#{{ $category->key}}"  data-toggle="tab">{{ $category->name }}</a></li> -->
                        <!-- @endforeach
                        </ul>
                    </div> -->

                    <!-- Tab panes -->
                    <!-- <div class="tab-content"> -->
                        <!-- tab-pane -->
                       <!--  <div role="tabpanel" class="tab-pane fade in active" id="recent-ads">
                          <div class="appendText"></div>
                        </div> --><!-- tab-pane -->
                    <!-- </div>
                </div> --><!-- trending-ads -->			
             
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
                                <p>You may directly contact to the relevant person and fulfill your needs.</p>
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
                        <h2><u>Coming soon</u></h2>
                    </div>
                </div><!-- row -->

                <!-- row -->
                <div class="row">
                    <!-- download-app -->
                    <div class="col-sm-6">
                        <a href="JavaScript:Void(0);" class="download-app">
                            <img src="{{ URL::asset('/uploads/images/icon/16.png')}}" alt="Image" class="img-responsive">
                            <span class="pull-left">
                                <span>available on</span>
                                <strong>Google Play</strong>
                            </span>
                        </a>
                    </div><!-- download-app -->

                    <!-- download-app -->
                    <div class="col-sm-6">
                        <a href="JavaScript:Void(0);" class="download-app">
                            <img src="{{ URL::asset('/uploads/images/icon/17.png')}}" alt="Image" class="img-responsive">
                            <span class="pull-left">
                                <span>available on</span>
                                <strong>App Store</strong>
                            </span>
                        </a>
                    </div><!-- download-app -->

                    
                </div><!-- row -->
            </div><!-- contaioner -->
        </section><!-- download -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@push('javaScript')


<script>



$(document).ready(function(){

    $(".city_search_box").on("change paste keyup", function(){
        if($(".city_search_box").val().length > 0){
            $('.search_btn').removeAttr('disabled');
        }else if($(".category_box").val().length == 0 && $(".city_search_box").val().length == 0 && $(".word_box").val().length == 0){
             $('.search_btn').attr('disabled','disabled');
        }
    });

    $(".category_box").on("change paste keyup",function(){
        if($(".category_box").val().length > 0){
            $('.search_btn').removeAttr('disabled');
        }else if($(".category_box").val().length == 0 && $(".city_search_box").val().length == 0 && $(".word_box").val().length == 0){
             $('.search_btn').attr('disabled','disabled');
        }
    });

    $(".word_box").on("change paste keyup",function(){
        if($(".word_box").val().length > 0){
            $('.search_btn').removeAttr('disabled');
        }else if($(".category_box").val().length == 0 && $(".city_search_box").val().length == 0 && $(".word_box").val().length == 0){
             $('.search_btn').attr('disabled','disabled');
        }
    });



    

    // function initializeAddress() {
    //   var input = document.getElementById(.search_text');
    //   var options = {
    //     types: ['geocode'] //this should work !
    //   };
    //   var autocomplete = new google.maps.places.Autocomplete(input, options);
    // }
    

    // google.maps.event.addDomListener(window, 'load', initializeAddress);


    // var page = 1; //track user scroll as page number, right now page number is 1
    // $(window).scroll(function() { //detect page scroll
    //     if($(window).scrollTop() + $(window).height() >= $(document).height() * 0.7) { //if user scrolled from top to bottom of the page
    //         page++; //page number increment
    //         append_html("{{ URL::route('web.home.getItemOnLoad')}}",{page: page});
    //     }
    // });


    // $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    // });
    // append_html("{{ URL::route('web.home.getItemOnLoad')}}",{page: 0});
    // function append_html(url , data) {
    //     $.ajax({
    //         type        : 'POST',
    //         url         : url, // the url where we want to POST
    //         data         : {data :data},
    //         success: function(data){
    //                 $('.appendText').html(data);
    //         }
    //     });
    // }


    // $(document).on('click','.categoryTab',function(){
    //      key = $(this).attr('value');
    //      $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             }
    //     });
    //     $.ajax({
    //         type        : 'POST',
    //         url         : "{{ URL::route('web.home.getDonation')}}", // the url where we want to POST
    //         data        : {key: key},
    //         success: function(data){
    //             $('.appendText').html(data);
    //        }
    //   });
    // });

    

    // var timer = null;
    // $('.city_search_box').keydown(function(){
    //        clearTimeout(timer); 
    //        timer = setTimeout(doStuff, 1000)
    // });

    // function doStuff() {
    //     // alert('do stuff');

    //     var query = $(this).val();
    //     // alert(query);
    //     // if(query != '')
    //     // {
    //      var _token = $('input[name="_token"]').val();
    //      // alert( _token);
    //      $.ajax({
    //       url:"{{ route('web.city_search') }}",
    //       method:"POST",
    //       data:{query:query, _token:_token},
    //       success:function(data){
    //        $('#cityBrowsers').fadeIn();  
    //         $('#cityBrowsers').html(data);
    //       }
    //      });
    // }
    




 

    $(document).on('click', '.categoryForm', function(){  
        
        $(this).submit();

    });  

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
        } , 1000)
    });


 // $(document).on('click', 'li', function(){  
 //        $('#specification').val($(this).text());  
 //        $('#search_text').fadeOut();  
 //    });  


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
        } , 1000)
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
<!-- <div id="result"> -->
<!-- <script type="text/javascript">
     

$(document).ready(function(){

        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var positionInfo = "Your current position is (" + "Latitude: " + position.coords.latitude + ", " + "Longitude: " + position.coords.longitude + ")";
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                alert(latitude);
                alert(latitude);
                // document.getElementById("result").innerHTML = positionInfo;
                  //ajax call 
                $.ajax({
                 url: "/",
                 type :get,
                 data: { 
                            testing_lat: latitude,
                            longitude: $longitude 
                        }
            });    
            });
        } else {
            alert("Sorry, your browser does not support HTML5 geolocation.");
        }
});
</script> -->
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
			min-height:535px !important;
		}
		.ad-info{
			padding:0px 16px !important;	
		}
		.ad-meta{
			z-index:1 !important;
			top:10% !important;
			right:0px !important;
			width:100% !important;
			margin:0% !important;
			border-left:1px solid #f3f3f3 !important;
			//border-right:1px solid #f3f3f3 !important;
		}
		.item-image-box .item-image img{
			height:170px !important;
		}
		.ad-info span{
			 display:none !important;
		}
		.category-item{
			max-height:234px !important;
			/*min-height:234px !important;*/
		}
		.item-title{
			height:23px !important;
			overflow:hidden !important;
		}
		.meta-content .dated{
			display:none;
		}
		.user-option{
			display:none !important;
		}
}
</style>
@endpush