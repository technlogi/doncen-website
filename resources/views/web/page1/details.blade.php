@extends('user.layout.master')
@section('title','Donation Detail')
@section('content')
  <!-- main -->
  <section id="main" class="clearfix details-page">
            <div class="container">
                <div class="breadcrumb-section">
                    <!-- breadcrumb -->
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#">category</a></li>
                        <li>Detail</li>
                    </ol><!-- breadcrumb -->						
                    <h2 class="title">{{ $category->name }}</h2>
                </div>

                <div class="section banner">				
                    <!-- banner-form -->
                    <div class="banner-form banner-form-full">
                          <form  id="search_form" action="{{ url('/search')}}">
                                <!-- language-dropdown -->{{ csrf_field() }}
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
                </div><!-- banner -->


                <div class="section slider">					
                    <div class="row">
                        <!-- carousel -->
                        @if (Session::has('error'))
                         <div class="alert alert-danger"><center>{{ Session::get('error') }}</center></div>
                       @endif
                       @if (Session::has('success'))
                          <div class="alert alert-success"><center>{{ Session::get('success') }}</center></div>
                       @endif
                         <div class="col-md-7">
                            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                @php $i = 0 @endphp 
                               
                                    @foreach($donation_images as $donation_image)
                                        <li data-target="#product-carousel" data-slide-to="{{ $i++ }}" class="active">
                                            <img src="{{ DONATION_POST_IMAGE($donation_image->image)}}" alt="Carousel Thumb" class="img-responsive">
                                        </li>
                                    @endforeach
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <!-- item -->
                                        @php $k= 0 @endphp
                                        @foreach($donation_images as $donation_image)
                                            @if($k++ ==  0)
                                                <div class="item active">
                                                    <div class="carousel-image">
                                                        <!-- image-wrapper -->
                                                        <img src="{{ DONATION_POST_IMAGE($donation_image->image)}}" alt="Featured Image" class="img-responsive">
                                                    </div>
                                                </div><!-- item -->
                                            @else
                                            <div class="item">
                                                    <div class="carousel-image">
                                                        <!-- image-wrapper -->
                                                        <img src="{{ DONATION_POST_IMAGE($donation_image->image)}}" alt="Featured Image" class="img-responsive">
                                                    </div>
                                                </div><!-- item -->
                                            @endif
                                        @endforeach
                                        @if($k == 0) 
                                            <div class="item active">
                                                <div class="carousel-image">
                                                    <!-- image-wrapper -->
                                                    <img src="{{ DONATION_POST_IMAGE('preview.jpg')}}" alt="Featured Image" class="img-responsive">
                                                </div>
                                            </div><!-- item -->
                                        @endif
                                    </div><!-- carousel-inner -->

                                <!-- Controls -->
                                <a class="left carousel-control" href="#product-carousel" role="button" data-slide="prev">
                                    <i class="fa fa-chevron-left"></i>
                                </a>
                                <a class="right carousel-control" href="#product-carousel" role="button" data-slide="next">
                                    <i class="fa fa-chevron-right"></i>
                                </a><!-- Controls -->
                            </div>
                        </div><!-- Controls -->	

                        <!-- slider-text -->
                        <div class="col-md-5">
                            <div class="slider-text">
                                <h2>{{ $dontaion_post->is_urgent ? 'Urgent': "" }}<span>{{ $dontaion_post->is_urgent ? '( '.$dontaion_post->urgent_reason.' )' : '' }}</span>
                                    
                                <span class="pull-right">
                                    @if($dontaion_post->consideration == '0')
                                    <div class="text-color">{{ 'Free' }} </div>
                                    @elseif($dontaion_post->consideration == '1')
                                    <div title="{{$dontaion_post->consideration_detail}}" class="text-color">Non-Monetary</div>
                                    @else
                                    <div title="{{$dontaion_post->consideration_detail}}" class="text-color">Monetary</div>
                                    @endif 
                                </span></h2>
                                <h3 class="title">{{$dontaion_post->title}}</h3>
                                <p><span>Post : <a href="#">{{ '   '.$category->name.', '.$subcategory->name.', '.$spectification->name}}</a></span>

                                <p><span>Offered by: <a href="#">{{$user->name}}</a></span>
                                    <span> Post ID:<a href="#" class="time"> {{$dontaion_post->post_no}}</a></span></p>
                                <span class="icon"><i class="fa fa-clock-o"></i><a href="#">{{date('d-m-Y H:i:s', strtotime($dontaion_post->created_at) ) }}</a></span>
                                <!-- <span class="icon"><i class="fa fa-map-marker"></i><a href="#">{{ $city->name. ', '.$state->name.', '.$country->name }}</a></span> -->
                                <span class="icon"><i class="fa fa-map-marker"></i><a href="#">{{ $dontaion_post->address  }}</a></span>
                                
                                <span class="icon"><i class="fa fa-suitcase "></i><a href="#">{{ $user_type->name }} <strong></strong></a></span>

                                <!-- short-info -->
                                <div class="short-info">
                                    <p><strong>Condition: </strong><a href="#">{{ $dontaion_post->condition == 1 ? "New" : "old"  }}</a> </p>
                                    <!-- <p><strong>Brand: </strong><a href="#">Apple</a> </p>
                                    <p><strong>Features: </strong><a href="#">Camera,</a> <a href="#">Dual SIM,</a> <a href="#">GSM,</a> <a href="#">Touch screen</a> </p>
                                    <p><strong>Model: </strong><a href="#">iPhone 6</a></p> -->
                                </div><!-- short-info -->

                                <!-- contact-with -->
                                <div class="contact-with">
                                    <h4>Contact with </h4>
                                    <span class="btn btn-red show-number">
                                        <i class="fa fa-phone-square"></i>
                                        <span class="hide-text">{{ $user->contact }}</span> 
                                        <span class="hide-number"></span>
                                    </span>
                                    <a href="#" class="btn"><i class="fa fa-envelope-square"></i>{{ $user->email }}</a>
                                </div><!-- contact-with -->

                                <!-- social-links -->
                                <div class="social-links">
                                    <h4>Share this post</h4>
                                    <ul class="list-inline">
                                        <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-tumblr-square"></i></a></li>
                                    </ul>
                                </div><!-- social-links -->						
                            </div>
                        </div><!-- slider-text -->				
                    </div>				
                </div><!-- slider -->

                <div class="description-info">
                    <div class="row">
                        <!-- description -->
                        <div class="col-md-8">
                            <div class="description">
                                <h4>Description</h4>
                                <p>{{ $dontaion_post->description }}</p>
                            </div>
                        </div><!-- description -->

                        <!-- description-short-info -->
                        <div class="col-md-4">					
                            <div class="short-info">
                                <h4>Short Info</h4>
                                <!-- social-icon -->
                                <ul>
                                    <li><i class="fa fa-shopping-cart"></i><a href="#">Type of Donation: {{ $donation_type->name }} </a></li>
                                    <li><i class="fa fa-user-plus"></i><a href="#">More post by <span>{{$user->name}}</span></a></li>
                                    <li><i class="fa fa-print"></i><a href="#">Print this ad</a></li>
                                    <!-- <li><i class="fa fa-reply"></i><a href="#">Send to a friend</a></li> -->
                                    <li><i class="fa fa-heart-o"></i><a href="{{ route('web.donation.favoriate',$dontaion_post->key) }}">Save post as Favorite</a></li>
                                    <li><i class="fa fa-exclamation-triangle"></i><a href="#" data-toggle="modal" data-target="#myModal">Report this Donation post</a></li>
                                </ul><!-- social-icon -->
                            </div>
                        </div>
                    </div><!-- row -->
                </div><!-- description-info -->	

                <div class="recommended-info">
                    <div class="row">
                        <div class="col-sm-8">				
                            <div class="section recommended-ads">
                                <div class="featured-top">
                                    <h4>Recommended posts for You</h4>
                                </div>
                                <div class="appendText"></div>
                            </div>
                        </div><!-- recommended-ads -->
                    </div><!-- row -->
                </div><!-- recommended-info -->
            </div><!-- container -->
        </section><!-- main -->

        <!-- download -->
        <section id="something-sell" class="clearfix parallax-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h2 class="title">Do you have something-Donate?</h2>
                        <h4>Donate anything, whatever you can think on Doncen.com</h4>
                        <a href="{{route('web.donation.category')}}" class="btn btn-primary">Donate Now</a>
                    </div>
                </div><!-- row -->
            </div><!-- contaioner -->
        </section><!-- download -->
         <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Report this Donation post</h4>
        </div>
        <form id="contact-form" class="contact-form" name="contact-form" method="post" action="{{ route('web.donation.storereprot',$user_identity)}}">
            <div class="modal-body">
                <div class="row">
                    {{csrf_field()}}
                    <input type="hidden" name="key" value="{{$user_identity}}"/>
                    <div class="col-sm-12">
                        <div class="form-group{{ $errors->has('report_subject') ? ' has-error' : '' }}">
                            <input name="report_subject" id="report_subject" name="report_subject" class="form-control" value="{{old('report_subject')}}" placeholder="Report Subject"/>
                            @if ($errors->has('report_subject'))
                            <span class="help-block">
                                <strong>{{ $errors->first('report_subject') }}</strong>
                            </span>
                        @endif
                        </div>             
                    </div>     
                    <div class="col-sm-12">
                        <div class="form-group{{ $errors->has('report') ? ' has-error' : '' }}">
                            <textarea name="report" id="report" name="report" class="form-control" value="{{old('report')}}" rows="7" placeholder="Report message ?"></textarea>
                            @if ($errors->has('report'))
                            <span class="help-block">
                                <strong>{{ $errors->first('report') }}</strong>
                            </span>
                        @endif
                        </div>             
                    </div>     
                </div>
            
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary pull-right">Submit Your Report</button>
                </div>
            </div>
        </form>
      </div>
      
    </div>
  </div>
  
        <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@push('javaScript')
<script src="{{ URL::asset('/js/user/js/jquery.min.js')}}"></script>
<script src="{{ URL::asset('/js/user/js/jquery-ui.min.js')}}"></script>

<script>
$(function(){
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
        success: function(data){
            $('.appendText').html(data);
        }
    });
  }
  call_ajax("{{ URL::route('web.detail.getRecomandatePost')}}",{ specification:"{{ $spectification->id }}",id:"{{ $dontaion_post->city_id }}" });
  
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
});
</script>
@endpush