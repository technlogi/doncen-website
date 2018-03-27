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
                </div><!-- banner -->


                <div class="section slider">					
                    <div class="row">
                        <!-- carousel -->
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
                                <h2>{{ $dontaion_post->is_urgent ? 'Urgent': "" }}<span class="pull-right">
                                 @if($dontaion_post->consideration == '0')
                                  {{ 'Free' }}
                                 @elseif($dontaion_post->consideration == '1')
                                  <div title="{{$dontaion_post->consideration_detail}}">Non-Monetary</div>
                                 @else
                                  <div title="{{$dontaion_post->consideration_detail}}">Monetary</div>
                                 @endif 
                                  
                                </span></h2>
                                <h3 class="title">{{$dontaion_post->title}}</h3>
                                <p><span>Offered by: <a href="#">{{$user->name}}</a></span>
                                    <span> Ad ID:<a href="#" class="time"> {{$dontaion_post->post_no}}</a></span></p>
                                <span class="icon"><i class="fa fa-clock-o"></i><a href="#">{{ $dontaion_post->created_at }}</a></span>
                                <span class="icon"><i class="fa fa-map-marker"></i><a href="#">{{ $city->name. ', '.$state->name.', '.$country->name }}</a></span>
                                <span class="icon"><i class="fa fa-suitcase "></i><a href="#">{{ $user_type->name }} <strong></strong></a></span>

                                <!-- short-info -->
                                <div class="short-info">
                                    <h4>Short Info</h4>
                                    <p><strong>Condition: </strong><a href="#">{{ $dontaion_post->condition ==1 ? "New" : "old"  }}</a> </p>
                                    <!-- <p><strong>Brand: </strong><a href="#">Apple</a> </p>
                                    <p><strong>Features: </strong><a href="#">Camera,</a> <a href="#">Dual SIM,</a> <a href="#">GSM,</a> <a href="#">Touch screen</a> </p>
                                    <p><strong>Model: </strong><a href="#">iPhone 6</a></p> -->
                                </div><!-- short-info -->

                                <!-- contact-with -->
                                <div class="contact-with">
                                    <h4>Contact with </h4>
                                    <span class="btn btn-red show-number">
                                        <i class="fa fa-phone-square"></i>
                                        <span class="hide-text">Click to show phone number </span> 
                                        <span class="hide-number">012-1234567890</span>
                                    </span>
                                    <a href="#" class="btn"><i class="fa fa-envelope-square"></i>Reply by email</a>
                                </div><!-- contact-with -->

                                <!-- social-links -->
                                <div class="social-links">
                                    <h4>Share this ad</h4>
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
                                    <li><i class="fa fa-shopping-cart"></i><a href="#">Delivery: Meet in person</a></li>
                                    <li><i class="fa fa-user-plus"></i><a href="#">More ads by <span>Yury Corporation</span></a></li>
                                    <li><i class="fa fa-print"></i><a href="#">Print this ad</a></li>
                                    <li><i class="fa fa-reply"></i><a href="#">Send to a friend</a></li>
                                    <li><i class="fa fa-heart-o"></i><a href="#">Save ad as Favorite</a></li>
                                    <li><i class="fa fa-exclamation-triangle"></i><a href="#">Report this ad</a></li>
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
                                    <h4>Recommended Ads for You</h4>
                                </div>
                                <!-- ad-item -->
                                <div class="ad-item row">
                                    <!-- item-image -->
                                    <div class="item-image-box col-sm-4">
                                        <div class="item-image">
                                            <a href="details.html"><img src="{{ URL::asset('/uploads/images/trending/1.jpg')}}" alt="Image" class="img-responsive"></a>
                                        </div><!-- item-image -->
                                    </div>								

                                    <div class="item-info col-sm-8">
                                        <!-- ad-info -->
                                        <div class="ad-info">
                                            <h3 class="item-price">$800.00</h3>
                                            <h4 class="item-title"><a href="#">Apple TV - Everything you need to know!</a></h4>
                                            <div class="item-cat">
                                                <span><a href="#">Electronics & Gedgets</a></span> /
                                                <span><a href="#">Tv & Video</a></span>
                                            </div>										
                                        </div><!-- ad-info -->

                                        <!-- ad-meta -->
                                        <div class="ad-meta">
                                            <div class="meta-content">
                                                <span class="dated"><a href="#">7 Jan, 16  10:10 pm </a></span>
                                                <a href="#" class="tag"><i class="fa fa-tags"></i> New</a>
                                            </div>										
                                            <!-- item-info-right -->
                                            <div class="user-option pull-right">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                                <a class="online" href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user"></i> </a>
                                            </div><!-- item-info-right -->
                                        </div><!-- ad-meta -->
                                    </div><!-- item-info -->
                                </div><!-- ad-item -->

                                <!-- ad-item -->
                                <div class="ad-item row">
                                    <div class="item-image-box col-sm-4">
                                        <!-- item-image -->
                                        <div class="item-image">
                                            <a href="details.html"><img src="{{ URL::asset('/uploads/images/trending/2.jpg')}}" alt="Image" class="img-responsive"></a>
                                        </div><!-- item-image -->
                                    </div><!-- item-image-box -->


                                    <div class="item-info col-sm-8">
                                        <!-- ad-info -->
                                        <div class="ad-info">
                                            <h3 class="item-price">$250.00 <span>(Negotiable)</span></h3>
                                            <h4 class="item-title"><a href="#">Bark Furniture, Handmade Bespoke Furniture</a></h4>
                                            <div class="item-cat">
                                                <span><a href="#">Home Appliances</a></span> /
                                                <span><a href="#">Sofa</a></span>
                                            </div>										
                                        </div><!-- ad-info -->

                                        <!-- ad-meta -->
                                        <div class="ad-meta">
                                            <div class="meta-content">
                                                <span class="dated"><a href="#">7 Jan, 16  10:10 pm </a></span>
                                                <a href="#" class="tag"><i class="fa fa-tags"></i> Used</a>
                                            </div>									
                                            <!-- item-info-right -->
                                            <div class="user-option pull-right">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user"></i> </a>
                                            </div><!-- item-info-right -->
                                        </div><!-- ad-meta -->
                                    </div><!-- item-info -->
                                </div><!-- ad-item -->

                                <!-- ad-item -->
                                <div class="ad-item row">
                                    <div class="item-image-box col-sm-4">
                                        <!-- item-image -->
                                        <div class="item-image">
                                            <a href="details.html"><img src="{{ URL::asset('/uploads/images/trending/3.jpg')}}" alt="Image" class="img-responsive"></a>
                                        </div><!-- item-image -->
                                    </div><!-- item-image-box -->


                                    <div class="item-info col-sm-8">
                                        <!-- ad-info -->
                                        <div class="ad-info">
                                            <h3 class="item-price">$890.00 <span>(Negotiable)</span></h3>
                                            <h4 class="item-title"><a href="#">Samsung Galaxy S6 Edge</a></h4>
                                            <div class="item-cat">
                                                <span><a href="#">Electronics & Gedgets</a></span> /
                                                <span><a href="#">Mobile Phone</a></span>
                                            </div>										
                                        </div><!-- ad-info -->									

                                        <!-- ad-meta -->
                                        <div class="ad-meta">
                                            <div class="meta-content">
                                                <span class="dated"><a href="#">7 Jan, 16  10:10 pm </a></span>
                                                <a href="#" class="tag"><i class="fa fa-tags"></i> Used</a>
                                            </div>									
                                            <!-- item-info-right -->
                                            <div class="user-option pull-right">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Dealer"><i class="fa fa-suitcase"></i> </a>
                                            </div><!-- item-info-right -->
                                        </div><!-- ad-meta -->
                                    </div><!-- item-info -->
                                </div><!-- ad-item -->	

                                <!-- ad-item -->
                                <div class="ad-item row">
                                    <div class="item-image-box col-sm-4">
                                        <!-- item-image -->
                                        <div class="item-image">
                                            <a href="details.html"><img src="{{ URL::asset('/uploads/images/trending/4.jpg')}}" alt="Image" class="img-responsive"></a>
                                        </div><!-- item-image -->
                                    </div><!-- item-image-box -->


                                    <div class="item-info col-sm-8">
                                        <!-- ad-info -->
                                        <div class="ad-info">
                                            <h3 class="item-price">$800.00</h3>
                                            <h4 class="item-title"><a href="#">Rick Morton- Magicius Chase</a></h4>
                                            <div class="item-cat">
                                                <span><a href="#">Books & Magazines</a></span> /
                                                <span><a href="#">Story book</a></span>
                                            </div>										
                                        </div><!-- ad-info -->

                                        <!-- ad-meta -->
                                        <div class="ad-meta">
                                            <div class="meta-content">
                                                <span class="dated"><a href="#">7 Jan, 16  10:10 pm </a></span>
                                                <a href="#" class="tag"><i class="fa fa-tags"></i> Used</a>
                                            </div>									
                                            <!-- item-info-right -->
                                            <div class="user-option pull-right">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user"></i> </a>
                                            </div><!-- item-info-right -->
                                        </div><!-- ad-meta -->
                                    </div><!-- item-info -->
                                </div><!-- ad-item -->
                            </div>
                        </div><!-- recommended-ads -->

                        <div class="col-sm-4 text-center">
                            <div class="recommended-cta">					
                                <div class="cta">
                                    <!-- single-cta -->						
                                    <div class="single-cta">
                                        <!-- cta-icon -->
                                        <div class="cta-icon icon-secure">
                                            <img src="{{ URL::asset('/uploads/images/icon/13.png')}}" alt="Icon" class="img-responsive">
                                        </div><!-- cta-icon -->

                                        <h4>Secure Trading</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                    </div><!-- single-cta -->

                                    <!-- single-cta -->
                                    <div class="single-cta">
                                        <!-- cta-icon -->
                                        <div class="cta-icon icon-support">
                                            <img src="{{ URL::asset('/uploads/images/icon/14.png')}}" alt="Icon" class="img-responsive">
                                        </div><!-- cta-icon -->

                                        <h4>24/7 Support</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                    </div><!-- single-cta -->


                                    <!-- single-cta -->
                                    <div class="single-cta">
                                        <!-- cta-icon -->
                                        <div class="cta-icon icon-trading" >
                                            <img src="{{ URL::asset('/uploads/images/icon/15.png')}}" alt="Icon" class="img-responsive">
                                        </div><!-- cta-icon -->

                                        <h4>Easy Trading</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                    </div><!-- single-cta -->

                                    <!-- single-cta -->
                                    <div class="single-cta">
                                        <h5>Need Help?</h5>
                                        <p><span>Give a call on</span><a href="tellto:08048100000"> 08048100000</a></p>
                                    </div><!-- single-cta -->
                                </div>
                            </div><!-- cta -->
                        </div><!-- recommended-cta-->
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
});
</script>
@endpush