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
                            <h1 class="title">World’s Largest Donation Portal  </h1>
                            <h3>DonCen! Donate anything, whatever you can think.</h3>
                            <!-- banner-form -->
                            <div class="banner-form">
                                 <form action="#">
                                     <!-- language-dropdown -->
                                  <div class="dropdown category-dropdown"> 						
                                      <a data-toggle="dropdown" href="#"><span class="change-text">United Kingdom</span> <i class="fa fa-angle-down"></i></a>
                                        <!-- <div class="dropdown category-dropdown"> 						
                                                    <input type="text" name="location" placeholder="Enter city/state/country">
                                                <a data-toggle="dropdown" href="#"><span class="change-text">Select City</span> <i class="fa fa-angle-down"></i></a>
                                                <ul class="dropdown-menu language-change">
                                                <li><a href="#">United Kingdom</a></li>
                                                <li><a href="#">United States</a></li>
                                                <li><a href="#">China</a></li>
                                                <li><a href="#">Russia</a></li>
                                            </ul>								
                                        </div><!-- language-dropdown -->
                                       </ul>								 
                                    </div>--><!-- language-dropdown -->
                                    <!-- category-change -->
                                    <div class="dropdown category-dropdown">						
                                         <a data-toggle="dropdown" href="#"><span class="change-text">Select Category</span> <i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown-menu category-change">
                                             <li><a href="#">Fashion & Beauty</a></li>
                                            <li><a href="#">Real Estate</a></li>
                                             <li><a href="#">Sports & Games</a></li>
                                         </ul>								
                                    </div> 
                                   
                                    
 
                                  <input type="text" class="form-control" placeholder="Type Your key word">
                                     <button type="submit" class="form-control" value="Search">Search</button>
                                </form>
                             </div><!-- banner-form -->
                           <!-- banner-socail -->
                            <ul class="banner-socail">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            </ul><!-- banner-socail -->
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
                                <a href="categories.html">
                                    <div class="category-icon">
                                    @if($category->image != '')
                                        <img src="{{ URL::asset('/uploads/svg/'.$category->image.'') }}" alt="{{$category->name}}">  
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
                        @foreach($categories as $category)
                            <li role="presentation" value="{{ $category->key}}" class="categoryTab"><a href="#{{ $category->key}}"  data-toggle="tab">{{ $category->name }}</a></li>
                        @endforeach
                        </ul>
                    </div>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- tab-pane -->
                        <div role="tabpanel" class="tab-pane fade in active" id="recent-ads">
                            <!-- ad-item -->
                            <div class=" row">
                                <!-- item-image -->
                                <div class="item-image-box col-sm-3">
                                    <div class="item-image">
                                        <a href="details.html"><img src="{{ URL::asset('/uploads/images/listing/1.jpg')}}" alt="Image" class="img-responsive"></a>
                                        <a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="Verified"><i class="fa fa-check-square-o"></i></a>
                                    </div><!-- item-image -->
                                </div>

                                <!-- rending-text -->
                                <div class="item-info col-sm-9">
                                    <!-- ad-info -->
                                    <div class="ad-info">
                                        <h3 class="item-price">$50.00</h3>
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
                                            <a href="#" class="tag"><i class="fa fa-tags"></i> Used</a>
                                        </div>									
                                        <!-- item-info-right -->
                                        <div class="user-option pull-right">
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                            <a class="online" href="#" data-toggle="tooltip" data-placement="top" title="Dealer"><i class="fa fa-suitcase"></i> </a>											
                                        </div><!-- item-info-right -->
                                    </div><!-- ad-meta -->
                                </div><!-- item-info -->
                            </div><!-- ad-item -->

                            <!-- ad-item -->
                            <div class="row">
                                <div class="item-image-box col-sm-3">
                                    <!-- item-image -->
                                    <div class="item-image">
                                        <a href="details.html"><img src="{{ URL::asset('/uploads/images/trending/2.jpg')}}" alt="Image" class="img-responsive"></a>
                                    </div><!-- item-image -->
                                </div><!-- item-image-box -->

                                <!-- rending-text -->
                                <div class="item-info col-sm-9">
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
                                            <a class="online" href="#" data-toggle="tooltip" data-placement="top" title="Dealer"><i class="fa fa-suitcase"></i> </a>											
                                        </div><!-- item-info-right -->
                                    </div><!-- ad-meta -->
                                </div><!-- item-info -->
                            </div><!-- ad-item -->
                      
                        </div><!-- tab-pane -->
                        
                    </div>
                </div><!-- trending-ads -->			

              

                <!-- ad-section -->						
                <div class="ad-section text-center">
                    <a href="#"><img src="{{ URL::asset('/uploads/images/ads/3.jpg')}}" alt="Image" class="img-responsive"></a>
                </div><!-- ad-section -->

             
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

                                <h4>Secure Trading</h4>
                                <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie</p>
                            </div>
                        </div><!-- single-cta -->

                        <!-- single-cta -->
                        <div class="col-sm-4">
                            <div class="single-cta">
                                <!-- cta-icon -->
                                <div class="cta-icon icon-support">
                                    <img src="{{ URL::asset('/uploads/images/icon/14.png')}}" alt="Icon" class="img-responsive">
                                </div><!-- cta-icon -->

                                <h4>24/7 Support</h4>
                                <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit</p>
                            </div>
                        </div><!-- single-cta -->

                        <!-- single-cta -->
                        <div class="col-sm-4">
                            <div class="single-cta">
                                <!-- cta-icon -->
                                <div class="cta-icon icon-Trending">
                                    <img src="{{ URL::asset('/uploads/images/icon/15.png')}}" alt="Icon" class="img-responsive">
                                </div><!-- cta-icon -->

                                <h4>Easy Trading</h4>
                                <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram</p>
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
                        <h2>Download on App Store</h2>
                    </div>
                </div><!-- row -->

                <!-- row -->
                <div class="row">
                    <!-- download-app -->
                    <div class="col-sm-4">
                        <a href="#" class="download-app">
                            <img src="{{ URL::asset('/uploads/images/icon/16.png')}}" alt="Image" class="img-responsive">
                            <span class="pull-left">
                                <span>available on</span>
                                <strong>Google Play</strong>
                            </span>
                        </a>
                    </div><!-- download-app -->

                    <!-- download-app -->
                    <div class="col-sm-4">
                        <a href="#" class="download-app">
                            <img src="{{ URL::asset('/uploads/images/icon/17.png')}}" alt="Image" class="img-responsive">
                            <span class="pull-left">
                                <span>available on</span>
                                <strong>App Store</strong>
                            </span>
                        </a>
                    </div><!-- download-app -->

                    <!-- download-app -->
                    <div class="col-sm-4">
                        <a href="#" class="download-app">
                            <img src="{{ URL::asset('/uploads/images/icon/18.png')}}" alt="Image" class="img-responsive">
                            <span class="pull-left">
                                <span>available on</span>
                                <strong>Windows Store</strong>
                            </span>
                        </a>
                    </div><!-- download-app -->
                </div><!-- row -->
            </div><!-- contaioner -->
        </section><!-- download -->


@endsection
@push('javaScript')
<script src="{{ URL::asset('/js/user/js/jquery.min.js')}}"></script>
<script>
$(document).ready(function(){
    $(document).on('click','.categoryTab',function(){
         key = $(this).attr('value');
      
        $.ajax({
            type        : 'POST', 
            url         : "{{ URL::route('web.home.getDonation')}}", // the url where we want to POST
            data        : {'id': key}, 
            success: function(data){
                alert(data);
            }
        });
    });

});
</script>
@endpush