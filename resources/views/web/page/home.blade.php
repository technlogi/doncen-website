@extends('user.layout.master')

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
                                   <!-- <div class="dropdown category-dropdown"> 						
                                            <input type="text" name="location" placeholder="Enter city/state/country">
                                         <a data-toggle="dropdown" href="#"><span class="change-text">Select City</span> <i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown-menu language-change">
                                            @foreach($cities as $city)
                                                <li><a href="#">{{$city->name}}</a></li>
                                            @endforeach
                                        </ul>								 
                                    </div>--><!-- language-dropdown -->
                                    <!-- category-change -->
                                    <!-- <div class="dropdown category-dropdown">						
                                        <a data-toggle="dropdown" href="#"><span class="change-text">Select Category</span> <i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown-menu category-change">
                                            <li><a href="#">Fashion & Beauty</a></li>
                                            <li><a href="#">Cars & Vehicles</a></li>
                                            <li><a href="#">Electronics & Gedgets</a></li>
                                            <li><a href="#">Real Estate</a></li>
                                            <li><a href="#">Sports & Games</a></li>
                                        </ul>								
                                    </div> -->
                                    <!-- category-change -->
                                    <input list="cities" type="text" class="form-control" name="location" placeholder="Select City">
                                    <datalist id="cities">
                                        @foreach($cities as $city)
                                                <option value="{{$city->name}}" >{{$city->state->name}}, {{$city->state->country->name}}</option>
                                        @endforeach                                  
                                    </datalist>
                                    <input list="cateogry" type="text" class="form-control" name="location" placeholder="Select Category">
                                    <datalist id="cateogry">
                                        @foreach($specifications as $specification)
                                                <option value="{{$specification->name}}" >{{$specification->subcategory->name}}, {{$specification->subcategory->category->name}}</option>
                                        @endforeach                                  
                                    </datalist>
                                    <input list="title" type="text" class="form-control" name="location" placeholder="Type Your key word">
                                    <datalist id="title">
                                        @foreach($titles as $title)
                                                <option value="{{ $title->title }}" />
                                        @endforeach                                  
                                    </datalist>

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
                                    <span class="category-quantity">(1298)</span>
                                </a>
                            </li><!-- category-item -->
                        @endforeach
                        </ul>				
                    </div><!-- category-ad -->	
                </div>
                <!-- featureds -->
                <div class="section featureds">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="featured-top">
                                <h4>Featured Ads</h4>
                            </div>
                        </div>
                    </div>

                    <!-- featured-slider -->
                    <div class="featured-slider">
                        <div id="featured-slider-two" >
                            <!-- featured -->
                            <div class="featured">
                                <div class="featured-image">
                                    <a href="details.html"><img src="{{ URL::asset('/uploads/images/featured/1.jpg')}}" alt="" class="img-respocive"></a>
                                    <a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="Verified"><i class="fa fa-check-square-o"></i></a>
                                </div>

                                <!-- ad-info -->
                                <div class="ad-info">
                                    <h3 class="item-price">$800.00</h3>
                                    <h4 class="item-title"><a href="#">Apple MacBook Pro with Retina Display</a></h4>
                                    <div class="item-cat">
                                        <span><a href="#">Electronics & Gedgets</a></span> 
                                    </div>
                                </div><!-- ad-info -->

                                <!-- ad-meta -->
                                <div class="ad-meta">
                                    <div class="meta-content">
                                        <span class="dated"><a href="#">7 Jan 10:10 pm </a></span>
                                    </div>									
                                    <!-- item-info-right -->
                                    <div class="user-option pull-right">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-suitcase"></i> </a>											
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- featured -->

                            <div class="featured">
                                <div class="featured-image">
                                    <a href="details.html"><img src="{{ URL::asset('/uploads/images/featured/2.jpg')}}" alt="" class="img-respocive"></a>
                                </div>

                                <!-- ad-info -->
                                <div class="ad-info">
                                    <h3 class="item-price">$25000.00</h3>
                                    <h4 class="item-title"><a href="#">2016 Bugatti Veyron Sport Middlecar</a></h4>
                                    <div class="item-cat">
                                        <span><a href="#">Cars & Vehicles</a></span> 
                                    </div>
                                </div><!-- ad-info -->

                                <!-- ad-meta -->
                                <div class="ad-meta">
                                    <div class="meta-content">
                                        <span class="dated"><a href="#">7 Jan 10:10 pm </a></span>
                                    </div>									
                                    <!-- item-info-right -->
                                    <div class="user-option pull-right">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user"></i> </a>											
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- featured -->

                            <div class="featured">
                                <div class="featured-image">
                                    <a href="details.html"><img src="{{ URL::asset('/uploads/images/featured/3.jpg')}}" alt="" class="img-respocive"></a>
                                    <a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="Verified"><i class="fa fa-check-square-o"></i></a>
                                </div>

                                <!-- ad-info -->
                                <!-- ad-info -->
                                <div class="ad-info">
                                    <h3 class="item-price">$250.00 <span class="negotiable">(Negotiable)</span></h3>
                                    <h4 class="item-title"><a href="#">Vivster Acoustic Guitar</a></h4>
                                    <div class="item-cat">
                                        <span><a href="#">Music & Art</a></span> 
                                    </div>
                                </div><!-- ad-info -->

                                <!-- ad-meta -->
                                <div class="ad-meta">
                                    <div class="meta-content">
                                        <span class="dated"><a href="#">7 Jan 10:10 pm </a></span>
                                    </div>									
                                    <!-- item-info-right -->
                                    <div class="user-option pull-right">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-suitcase"></i> </a>											
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- featured -->

                            <div class="featured">
                                <div class="featured-image">
                                    <a href="details.html"><img src="{{ URL::asset('/uploads/images/trending/4.jpg')}}" alt="" class="img-respocive"></a>
                                </div>

                                <!-- ad-info -->
                                <div class="ad-info">
                                    <h3 class="item-price">$50.00</h3>
                                    <h4 class="item-title"><a href="#">Rick Morton- Magicius Chase</a></h4>
                                    <div class="item-cat">
                                        <span><a href="#">Books & Magazines</a></span> 
                                    </div>
                                </div><!-- ad-info -->

                                <!-- ad-meta -->
                                <div class="ad-meta">
                                    <div class="meta-content">
                                        <span class="dated"><a href="#">7 Jan 10:10 pm </a></span>
                                    </div>									
                                    <!-- item-info-right -->
                                    <div class="user-option pull-right">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user"></i> </a>											
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- featured -->

                            <div class="featured">
                                <div class="featured-image">
                                    <a href="details.html"><img src="{{ URL::asset('/uploads/images/trending/3.jpg')}}" alt="" class="img-respocive"></a>
                                </div>

                                <!-- ad-info -->
                                <div class="ad-info">
                                    <h3 class="item-price">$380.00</h3>
                                    <h4 class="item-title"><a href="#">Samsung Galaxy S6 Edge</a></h4>
                                    <div class="item-cat">
                                        <span><a href="#">Electronics & Gedgets</a></span> 
                                    </div>
                                </div><!-- ad-info -->

                                <!-- ad-meta -->
                                <div class="ad-meta">
                                    <div class="meta-content">
                                        <span class="dated"><a href="#">7 Jan 10:10 pm </a></span>
                                    </div>									
                                    <!-- item-info-right -->
                                    <div class="user-option pull-right">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user"></i> </a>											
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- featured -->
                            <!-- featured -->
                            <div class="featured">
                                <div class="featured-image">
                                    <a href="details.html"><img src="{{ URL::asset('/uploads/images/featured/1.jpg')}}" alt="" class="img-respocive"></a>
                                    <a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="Verified"><i class="fa fa-check-square-o"></i></a>
                                </div>

                                <!-- ad-info -->
                                <div class="ad-info">
                                    <h3 class="item-price">$800.00</h3>
                                    <h4 class="item-title"><a href="#">Apple MacBook Pro with Retina Display</a></h4>
                                    <div class="item-cat">
                                        <span><a href="#">Electronics & Gedgets</a></span> 
                                    </div>
                                </div><!-- ad-info -->

                                <!-- ad-meta -->
                                <div class="ad-meta">
                                    <div class="meta-content">
                                        <span class="dated"><a href="#">7 Jan 10:10 pm </a></span>
                                    </div>									
                                    <!-- item-info-right -->
                                    <div class="user-option pull-right">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-suitcase"></i> </a>											
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- featured -->

                            <div class="featured">
                                <div class="featured-image">
                                    <a href="details.html"><img src="{{ URL::asset('/uploads/images/featured/2.jpg')}}" alt="" class="img-respocive"></a>
                                </div>

                                <!-- ad-info -->
                                <div class="ad-info">
                                    <h3 class="item-price">$25000.00</h3>
                                    <h4 class="item-title"><a href="#">2016 Bugatti Veyron Sport Middlecar</a></h4>
                                    <div class="item-cat">
                                        <span><a href="#">Cars & Vehicles</a></span> 
                                    </div>
                                </div><!-- ad-info -->

                                <!-- ad-meta -->
                                <div class="ad-meta">
                                    <div class="meta-content">
                                        <span class="dated"><a href="#">7 Jan 10:10 pm </a></span>
                                    </div>									
                                    <!-- item-info-right -->
                                    <div class="user-option pull-right">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user"></i> </a>											
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- featured -->

                            <div class="featured">
                                <div class="featured-image">
                                    <a href="details.html"><img src="{{ URL::asset('/uploads/images/featured/3.jpg')}}" alt="" class="img-respocive"></a>
                                    <a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="Verified"><i class="fa fa-check-square-o"></i></a>
                                </div>

                                <!-- ad-info -->
                                <!-- ad-info -->
                                <div class="ad-info">
                                    <h3 class="item-price">$250.00 <span class="negotiable">(Negotiable)</span></h3>
                                    <h4 class="item-title"><a href="#">Vivster Acoustic Guitar</a></h4>
                                    <div class="item-cat">
                                        <span><a href="#">Music & Art</a></span> 
                                    </div>
                                </div><!-- ad-info -->

                                <!-- ad-meta -->
                                <div class="ad-meta">
                                    <div class="meta-content">
                                        <span class="dated"><a href="#">7 Jan 10:10 pm </a></span>
                                    </div>									
                                    <!-- item-info-right -->
                                    <div class="user-option pull-right">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-suitcase"></i> </a>											
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- featured -->

                        </div><!-- featured-slider -->
                    </div><!-- #featured-slider -->
                </div><!-- featureds -->

                <!-- ad-section -->						
                <div class="ad-section text-center">
                    <a href="#"><img src="{{ URL::asset('/uploads/images/ads/3.jpg')}}" alt="Image" class="img-responsive"></a>
                </div><!-- ad-section -->

                <!-- trending-ads -->
                <div class="section trending-ads">
                    <div class="section-title tab-manu">
                        <h4>Trending Ads</h4>
                        <!-- Nav tabs -->      
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#recent-ads"  data-toggle="tab">Recent Ads</a></li>
                            <li role="presentation"><a href="#popular" data-toggle="tab">Popular Ads</a></li>
                            <li role="presentation"><a href="#hot-ads"  data-toggle="tab">Hot Ads</a></li>
                        </ul>
                    </div>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- tab-pane -->
                        <div role="tabpanel" class="tab-pane fade in active" id="recent-ads">
                            <!-- ad-item -->
                            <div class="ad-item row">
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
                            <div class="ad-item row">
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

                            <!-- ad-item -->
                            <div class="ad-item row">
                                <div class="item-image-box col-sm-3">
                                    <!-- item-image -->
                                    <div class="item-image">
                                        <a href="details.html"><img src="{{ URL::asset('/uploads/images/trending/4.jpg')}}" alt="Image" class="img-responsive"></a>
                                        <a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="Verified"><i class="fa fa-check-square-o"></i></a>
                                    </div><!-- item-image -->
                                </div><!-- item-image-box -->

                                <!-- rending-text -->
                                <div class="item-info col-sm-9">
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

                            <!-- ad-item -->
                            <div class="ad-item row">
                                <div class="item-image-box col-sm-3">
                                    <!-- item-image -->
                                    <div class="item-image">
                                        <a href="details.html"><img src="{{ URL::asset('/uploads/images/trending/3.jpg')}}" alt="Image" class="img-responsive"></a>
                                    </div><!-- item-image -->
                                </div><!-- item-image-box -->

                                <!-- rending-text -->
                                <div class="item-info col-sm-9">
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
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-suitcase"></i> </a>											
                                        </div><!-- item-info-right -->
                                    </div><!-- ad-meta -->
                                </div><!-- item-info -->
                            </div><!-- ad-item -->		

                        </div><!-- tab-pane -->

                        <!-- tab-pane -->
                        <div role="tabpanel" class="tab-pane fade" id="popular">

                            <div class="ad-item row">
                                <div class="item-image-box col-sm-3">
                                    <!-- item-image -->
                                    <div class="item-image">
                                        <a href="details.html"><img src="{{ URL::asset('/uploads/images/trending/3.jpg')}}" alt="Image" class="img-responsive"></a>
                                    </div><!-- item-image -->
                                </div><!-- item-image-box -->


                                <div class="item-info col-sm-9">
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
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-suitcase"></i> </a>											
                                        </div><!-- item-info-right -->
                                    </div><!-- ad-meta -->
                                </div><!-- item-info -->
                            </div><!-- ad-item -->	

                            <!-- ad-item -->
                            <div class="ad-item row">
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

                            <div class="ad-item row">
                                <!-- item-image -->
                                <div class="item-image-box col-sm-3">
                                    <div class="item-image">
                                        <a href="details.html"><img src="{{ URL::asset('/uploads/images/trending/1.jpg')}}" alt="Image" class="img-responsive"></a>
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
                            <div class="ad-item row">
                                <div class="item-image-box col-sm-3">
                                    <!-- item-image -->
                                    <div class="item-image">
                                        <a href="details.html"><img src="{{ URL::asset('/uploads/images/trending/4.jpg')}}" alt="Image" class="img-responsive"></a>
                                        <a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="Verified"><i class="fa fa-check-square-o"></i></a>
                                    </div><!-- item-image -->
                                </div><!-- item-image-box -->

                                <!-- rending-text -->
                                <div class="item-info col-sm-9">
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
                        </div><!-- tab-pane -->

                        <!-- tab-pane -->
                        <div role="tabpanel" class="tab-pane fade" id="hot-ads">

                            <div class="ad-item row">
                                <div class="item-image-box col-sm-3">
                                    <!-- item-image -->
                                    <div class="item-image">
                                        <a href="details.html"><img src="{{ URL::asset('/uploads/images/trending/4.jpg')}}" alt="Image" class="img-responsive"></a>
                                        <a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="Verified"><i class="fa fa-check-square-o"></i></a>
                                    </div><!-- item-image -->
                                </div><!-- item-image-box -->

                                <!-- rending-text -->
                                <div class="item-info col-sm-9">
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

                            <!-- ad-item -->
                            <div class="ad-item row">
                                <!-- item-image -->
                                <div class="item-image-box col-sm-3">
                                    <div class="item-image">
                                        <a href="details.html"><img src="{{ URL::asset('/uploads/images/trending/1.jpg')}}" alt="Image" class="img-responsive"></a>
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


                            <div class="ad-item row">
                                <div class="item-image-box col-sm-3">
                                    <!-- item-image -->
                                    <div class="item-image">
                                        <a href="details.html"><img src="{{ URL::asset('/uploads/images/trending/3.jpg')}}" alt="Image" class="img-responsive"></a>
                                    </div><!-- item-image -->
                                </div><!-- item-image-box -->

                                <!-- ad-item -->
                                <div class="item-info col-sm-9">
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
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-suitcase"></i> </a>											
                                        </div><!-- item-info-right -->
                                    </div><!-- ad-meta -->
                                </div><!-- item-info -->
                            </div><!-- ad-item -->	

                            <!-- ad-item -->
                            <div class="ad-item row">
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
                                <div class="cta-icon icon-trading">
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