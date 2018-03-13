@extends('user.layout.master')

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
                        <form action="#">
                            <!-- language-dropdown -->
                            <div class="dropdown category-dropdown language-dropdown ">						
                                <a data-toggle="dropdown" href="#"><span class="change-text">United Kingdom</span> <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu  language-change">
                                    <li><a href="#">United Kingdom</a></li>
                                    <li><a href="#">United States</a></li>
                                    <li><a href="#">China</a></li>
                                    <li><a href="#">Russia</a></li>
                                </ul>								
                            </div><!-- language-dropdown -->
                            <!-- category-change -->
                            <div class="dropdown category-dropdown">						
                                <a data-toggle="dropdown" href="#"><span class="change-text">Select Category</span> <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu category-change">
                                    <li><a href="#">Fashion & Beauty</a></li>
                                    <li><a href="#">Cars & Vehicles</a></li>
                                    <li><a href="#">Electronics & Gedgets</a></li>
                                    <li><a href="#">Real Estate</a></li>
                                    <li><a href="#">Sports & Games</a></li>
                                </ul>								
                            </div><!-- category-change -->                          

                            <input type="text" class="form-control" placeholder="Type Your key word">
                            <button type="submit" class="form-control" value="Search">Search</button>
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
                                                <label for="all"><input type="checkbox" name="" id="all"> All</label>
                                                <label for="donor"><input type="checkbox" name="" id="donor"> Donor</label>
                                                <label for="helper-of-donor"><input type="checkbox" name="" id="helper-of-donor"> Helper of Donor</label>
                                                <label for="donee"><input type="checkbox" name="" id="donee"> Donee</label>
                                                <label for="helper-of-donee"><input type="checkbox" name="" id="helper-of-donee"> Helper of Donee</label>
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
                                                <h5><a href=""><i class="fa fa-caret-down"></i> All Categories</a></h5>
                                                <label for="hospitals"><input type="checkbox" name="" id="hospitals"> Hospitals<span>(1029)</span></label>
                                                <label for="foods"><input type="checkbox" name="" id="foods"> Foods<span>(1228)</span></label>
                                                <label for="clothes"><input type="checkbox" name="" id="clothes"> Clothes & Accessory<span>(178)</span></label>
                                                <label for="residence"><input type="checkbox" name="" id="residence"> Residence<span>(7163)</span></label>
                                                <label for="education"><input type="checkbox" name="" id="education"> Education<span>(8709)</span></label>                                                
                                                <label for="literature"><input type="checkbox" name="" id="literature"> Literature<span>(3129)</span></label>
                                                <label for="toys-&-sports"><input type="checkbox" name="" id="toys-&-sports"> Toys & Sports<span>(2019)</span></label>
                                                <label for="fmcg"><input type="checkbox" name="" id="fmcg"> FMCG<span>(323)</span></label>
                                                <label for="agriculture"><input type="checkbox" name="" id="agriculture"> Agriculture<span>(425)</span></label>
                                                <label for="services-&-time"><input type="checkbox" name="" id="services-&-time"> Services & Time<span>(3223)</span></label>                                                
                                                <label for="tours-&-traveling"><input type="checkbox" name="" id="tours-&-traveling"> Tours & Traveling<span>(3283)</span></label>
                                                <label for="helpline-number"><input type="checkbox" name="" id="helpline-number"> Helpline Number<span>(3221)</span></label>
                                                <label for="beast"><input type="checkbox" name="" id="beast"> Beast<span>(3221)</span></label>
                                                <label for="others"><input type="checkbox" name="" id="others"> Others<span>(3129)</span></label>


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
                                                <label for="blood"><input type="checkbox" name="" id="blood"> Blood<span>(425)</span></label>
                                                <label for="vegetable"><input type="checkbox" name="" id="vegetable"> Vegetable<span>(3223)</span></label>                                          
                                                <label for="lodgement"><input type="checkbox" name="" id="lodgement"> Lodgement<span>(3221)</span></label>
                                                <label for="study"><input type="checkbox" name="" id="study"> study<span>(3221)</span></label>         

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
                                                <label for="a+"><input type="checkbox" name="" id="a+"> A+<span>(435)</span></label>
                                                <label for="b-"><input type="checkbox" name="" id="b-"> B-<span>(23)</span></label>                                          
                                                <label for="ab+"><input type="checkbox" name="" id="ab+"> AB+<span>(322)</span></label>
                                                <label for="o+"><input type="checkbox" name="" id="o+"> O+<span>(321)</span></label>
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
                                                <label for="new"><input type="checkbox" name="new" id="new"> New</label>
                                                <label for="used"><input type="checkbox" name="used" id="used"> Used</label>
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
                                                <label for="any"><input type="checkbox" name="" id="any"> Any</label>
                                                <label for="free"><input type="checkbox" name="used" id="free"> Free</label>
                                                <label for="monetary"><input type="checkbox" name="" id="monetary"> Monetary</label>
                                                <label for="non-monetary"><input type="checkbox" name="used" id="non-monetary"> Non-Monetary</label>
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
                                                <label for="any-type"><input type="checkbox" name="new" id="any-type"> Any type</label>
                                                <label for="go-to-f2f"><input type="checkbox" name="used" id="go-to-f2f"> Go TO F2F</label>
                                                <label for="call-in-and-f2f"><input type="checkbox" name="new" id="call-in-and-f2f"> Call In And F2F</label>
                                                <label for="by-post"><input type="checkbox" name="used" id="by-post"> By Post</label>
                                                <label for="other-type"><input type="checkbox" name="used" id="other-type"> Other type</label>
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
                                            <a data-toggle="dropdown" href="#"><span class="change-text">Popular</span><i class="fa fa-caret-square-o-down"></i></a>
                                            <ul class="dropdown-menu category-change">
                                                <li><a href="#">Featured</a></li>
                                                <li><a href="#">Newest</a></li>
                                                <li><a href="#">All</a></li>
                                                <li><a href="#">Bestselling</a></li>
                                            </ul>								
                                        </div><!-- category-change -->														
                                    </div>							
                                </div><!-- featured-top -->	

                                <!-- ad-item -->
                                <div class="ad-item row">
                                    <!-- item-image -->
                                    <div class="item-image-box col-sm-4">
                                        <div class="item-image">
                                            <a href="details.html"><img src="{{ URL::asset('/uploads/images/listing/1.jpg')}}" alt="Image" class="img-responsive"></a>
                                        </div><!-- item-image -->
                                    </div>

                                    <!-- rending-text -->
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
                                            <a href="details.html"><img src="{{ URL::asset('/uploads/images/listing/2.jpg')}}" alt="Image" class="img-responsive"></a>
                                            <span class="featured-ad">Featured</span>
                                            <a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="Verified"><i class="fa fa-check-square-o"></i></a>
                                        </div><!-- item-image -->
                                    </div><!-- item-image-box -->

                                    <!-- rending-text -->
                                    <div class="item-info col-sm-8">
                                        <!-- ad-info -->
                                        <div class="ad-info">
                                            <h3 class="item-price">$25.00 <span>(Negotiable)</span></h3>
                                            <h4 class="item-title"><a href="#">Smartphone Original Cover</a></h4>
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
                                    <div class="item-image-box col-sm-4">
                                        <!-- item-image -->
                                        <div class="item-image">
                                            <a href="details.html"><img src="{{ URL::asset('/uploads/images/listing/3.jpg')}}" alt="Image" class="img-responsive"></a>
                                        </div><!-- item-image -->
                                    </div><!-- item-image-box -->

                                    <!-- rending-text -->
                                    <div class="item-info col-sm-8">
                                        <!-- ad-info -->
                                        <div class="ad-info">
                                            <h3 class="item-price">$890.00 <span>(Negotiable)</span></h3>
                                            <h4 class="item-title"><a href="#">Samsung Newest NoteBook</a></h4>
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
                                            <a href="details.html"><img src="{{ URL::asset('/uploads/images/listing/4.jpg')}}" alt="Image" class="img-responsive"></a>
                                            <span class="featured-ad">Featured</span>
                                        </div><!-- item-image -->
                                    </div><!-- item-image-box -->

                                    <!-- rending-text -->
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
                                <!-- ad-item -->
                                <div class="ad-item row">
                                    <div class="item-image-box col-sm-4">
                                        <!-- item-image -->
                                        <div class="item-image">
                                            <a href="details.html"><img src="{{ URL::asset('/uploads/images/listing/5.jpg')}}" alt="Image" class="img-responsive"></a>
                                        </div><!-- item-image -->
                                    </div><!-- item-image-box -->

                                    <!-- rending-text -->
                                    <div class="item-info col-sm-8">
                                        <!-- ad-info -->
                                        <div class="ad-info">
                                            <h3 class="item-price">$890.00 <span>(Negotiable)</span></h3>
                                            <h4 class="item-title"><a href="#">Asus Modern Laptop</a></h4>
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
                                            <a href="details.html"><img src="{{ URL::asset('/uploads/images/listing/6.jpg')}}" alt="Image" class="img-responsive"></a>
                                            <span class="featured-ad">Featured</span>
                                        </div><!-- item-image -->
                                    </div><!-- item-image-box -->

                                    <!-- rending-text -->
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
                                            <a href="details.html"><img src="{{ URL::asset('/uploads/images/listing/7.jpg')}}" alt="Image" class="img-responsive"></a>
                                        </div><!-- item-image -->
                                    </div><!-- item-image-box -->

                                    <!-- rending-text -->
                                    <div class="item-info col-sm-8">
                                        <!-- ad-info -->
                                        <div class="ad-info">
                                            <h3 class="item-price">$890.00 <span>(Negotiable)</span></h3>
                                            <h4 class="item-title"><a href="#">Philips Disital Headphone</a></h4>
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
                                            <a href="details.html"><img src="{{ URL::asset('/uploads/images/listing/8.jpg')}}" alt="Image" class="img-responsive"></a>
                                            <span class="featured-ad">Featured</span>
                                        </div><!-- item-image -->
                                    </div><!-- item-image-box -->

                                    <!-- rending-text -->
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

                                <!-- ad-section -->						
                                <div class="ad-section text-center">
                                    <a href="#"><img src="{{ URL::asset('/uploads/images/ads/3.jpg')}}" alt="Image" class="img-responsive"></a>
                                </div><!-- ad-section -->

                                <!-- ad-item -->
                                <div class="ad-item row">
                                    <div class="item-image-box col-sm-4">
                                        <!-- item-image -->
                                        <div class="item-image">
                                            <a href="details.html"><img src="{{ URL::asset('/uploads/images/listing/9.jpg')}}" alt="Image" class="img-responsive"></a>
                                        </div><!-- item-image -->
                                    </div><!-- item-image-box -->

                                    <!-- rending-text -->
                                    <div class="item-info col-sm-8">
                                        <!-- ad-info -->
                                        <div class="ad-info">
                                            <h3 class="item-price">$890.00 <span>(Negotiable)</span></h3>
                                            <h4 class="item-title"><a href="#">Samsung Disital Camera</a></h4>
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
                                            <a href="details.html"><img src="{{ URL::asset('/uploads/images/listing/10.jpg')}}" alt="Image" class="img-responsive"></a>
                                        </div><!-- item-image -->
                                    </div><!-- item-image-box -->

                                    <!-- rending-text -->
                                    <div class="item-info col-sm-8">
                                        <!-- ad-info -->
                                        <div class="ad-info">
                                            <h3 class="item-price">$890.00 <span>(Negotiable)</span></h3>
                                            <h4 class="item-title"><a href="#">Sony Sound System</a></h4>
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
                                            <a href="details.html"><img src="{{ URL::asset('/uploads/images/listing/11.jpg')}}" alt="Image" class="img-responsive"></a>
                                        </div><!-- item-image -->
                                    </div><!-- item-image-box -->

                                    <!-- rending-text -->
                                    <div class="item-info col-sm-8">
                                        <!-- ad-info -->
                                        <div class="ad-info">
                                            <h3 class="item-price">$890.00 <span>(Negotiable)</span></h3>
                                            <h4 class="item-title"><a href="#">Walton Flat 56" Monitor</a></h4>
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
                                            <a href="details.html"><img src="{{ URL::asset('/uploads/images/listing/12.jpg')}}" alt="Image" class="img-responsive"></a>
                                        </div><!-- item-image -->
                                    </div><!-- item-image-box -->

                                    <!-- rending-text -->
                                    <div class="item-info col-sm-8">
                                        <!-- ad-info -->
                                        <div class="ad-info">
                                            <h3 class="item-price">$800.00</h3>
                                            <h4 class="item-title"><a href="#">Cannon Disital Camera</a></h4>
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
                                    <div class="item-image-box col-sm-4">
                                        <!-- item-image -->
                                        <div class="item-image">
                                            <a href="details.html"><img src="{{ URL::asset('/uploads/images/listing/13.jpg')}}" alt="Image" class="img-responsive"></a>
                                        </div><!-- item-image -->
                                    </div><!-- item-image-box -->

                                    <!-- rending-text -->
                                    <div class="item-info col-sm-8">
                                        <!-- ad-info -->
                                        <div class="ad-info">
                                            <h3 class="item-price">$890.00 <span>(Negotiable)</span></h3>
                                            <h4 class="item-title"><a href="#">Samsung Smart Watch</a></h4>
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
                                            <a href="details.html"><img src="{{ URL::asset('/uploads/images/listing/14.jpg')}}" alt="Image" class="img-responsive"></a>
                                        </div><!-- item-image -->
                                    </div><!-- item-image-box -->

                                    <!-- rending-text -->
                                    <div class="item-info col-sm-8">
                                        <!-- ad-info -->
                                        <div class="ad-info">
                                            <h3 class="item-price">$890.00 <span>(Negotiable)</span></h3>
                                            <h4 class="item-title"><a href="#">Accer Thinest Laptop</a></h4>
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
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user"></i> </a>											
                                            </div><!-- item-info-right -->
                                        </div><!-- ad-meta -->
                                    </div><!-- item-info -->
                                </div><!-- ad-item -->	

                                <!-- pagination  -->
                                <div class="text-center">
                                    <ul class="pagination ">
                                        <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                                        <li><a href="#">1</a></li>
                                        <li class="active"><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">...</a></li>
                                        <li><a href="#">10</a></li>
                                        <li><a href="#">20</a></li>
                                        <li><a href="#">30</a></li>
                                        <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>			
                                    </ul>
                                </div><!-- pagination  -->					
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
                        <a href="ad-post.html" class="btn btn-primary">Donate Now</a>
                    </div>
                </div><!-- row -->
            </div><!-- contaioner -->
        </section><!-- something-sell -->

@endsection
