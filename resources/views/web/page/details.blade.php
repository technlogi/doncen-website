@extends('user.layout.master')
@section('title','Donation Detail')
@section('content')
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
       .my .star-rating {
           
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
    <script  type="text/javascript">
        var category_name="{{ $category->name }}";
    </script>
  <!-- main -->
  <section id="main" class="clearfix details-page">
            <div class="container">
                <div class="breadcrumb-section">
                    <!-- breadcrumb -->
                    <ol class="breadcrumb">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li>
                            <form  id="search_form1" action="{{ url('/search')}}" >
                                {{ csrf_field() }}
                                <input type="hidden" name="city_search_box">
                                <input type="hidden" name="category_box" value="{{ $category->name }}">
                                <input type="hidden" name="word_box">
                                <input id="cat_link" type="submit" name="submit" value="category">
                            </form>
                        </li>
                        <li>Detail</li>
                    </ol><!-- breadcrumb -->						
                    <h2 class="title">{{ $category->name }}</h2>
                </div>

                <!-- <div class="section banner">				
                    
                    <div class="banner-form banner-form-full">
                          <form  id="search_form" action="{{ url('/search')}}" style="margin-bottom: 0px !important;">
                                {{ csrf_field() }}
                            <div class="dropdown category-dropdown"> 						
                                <input type="text" name="city_search_box" placeholder="Enter City" id="city_search_box">
                            </div>

                            <div class="dropdown category-dropdown">		
                                <input type="text" name="category_box" placeholder="Enter Category" id='category_box'>
                            </div> 
                            <div class="dropdown category-dropdown">
                                <input type="text" name="word_box" placeholder="Type Your key word">
                            </div>
                            <button type="submit" class="form-control"  value="Search">Search</button>
                        </form>
                    </div>
                </div> -->


                <div class="section slider">
                    
                    {!! $dontaion_post->is_urgent ? '<a href="javascript:void(0)" class="verified-detail" data-toggle="tooltip" data-placement="left" title="Verified">URGENT: <span>'.$dontaion_post->urgent_reason.'</span></a>' : "" !!}  
                    
                    
                    <!--<span><a href="javascript:void(0)" class="verified-detail" data-toggle="tooltip" data-placement="left" title="Verified">URGENT: <span>{{$dontaion_post->urgent_reason}}</span></a></span> 					-->
                    
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

                                <!-- Wrapper for slides 123456-->
                                <div class="carousel-inner" role="listbox" style="max-height:409px;" >
                                    <!-- item -->
                                        @php $k= 0 @endphp
                                        @foreach($donation_images as $donation_image)

                                            @php 
                                                $extension=pathinfo($donation_image->image,PATHINFO_EXTENSION);
                                            //dd($donation_image); 
                                            $alt=str_replace(' ','-',$category->name).'-'.str_replace(' ','-',$subcategory->name).'-'.str_replace(' ','-',$spectification->name).'-'.str_replace(' ','-',$dontaion_post->title);

                                            @endphp
                                        
                                            

                                            @if($k++ ==  0)
                                                <div class="item active"> 
                                                    <div class="carousel-image"  style="height: 409px;" >
                                                        <!-- image-wrapper -->
                                                       
                                                            @if ($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "gif")  
                                                            
                                                                <img  src="{{ DONATION_POST_IMAGE($donation_image->image)}}" alt="{{$alt}}" class="img-responsive" style="max-height:409px;margin-left: auto; margin-right: auto;height:409;width:614px;object-fit: contain;">
                                                                    
                                                            @else
                                                                    
                                                                    <video   controls class="img-responsive"   alt="{{$alt}}" style="max-height: 409px; margin-left: auto; margin-right: auto;height:320px;width:614px;object-fit: contain;">
                                                                        <source src="{{ DONATION_POST_IMAGE($donation_image->image)}}" type=@php echo '"video/'.$extension.'"'; @endphp >
                                                                        <source src="{{ DONATION_POST_IMAGE($donation_image->image)}}" type="video/mp4" >
                                                                        Your browser does not support the video tag.
                                                                    </video>
                                                            @endif


                                                        </div>
                                                </div><!-- item -->
                                            @else
                                            <div class="item">
                                                    <div class="carousel-image" style="height: 409px;">
                                                        <!-- image-wrapper -->
                                                        @if ($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "gif")  
                                                            
                                                                <img src="{{ DONATION_POST_IMAGE($donation_image->image)}}"   alt="{{$alt}}" class="img-responsive" style="height: 409px;width:614px; margin-left: auto; margin-right: auto;object-fit: contain;">
                                                      
                                                            @else
                                                                    
                                                                    <video   controls class="img-responsive"   alt="{{$alt}}" style="max-height: 409px; margin-left: auto; margin-right: auto;height:409px;width:614px;object-fit: contain;">
                                                                        <source src="{{ DONATION_POST_IMAGE($donation_image->image)}}" type=@php echo '"video/'.$extension.'"'; @endphp>
                                                                        <source src="{{ DONATION_POST_IMAGE($donation_image->image)}}" type="video/mp4" >
                                                                        Your browser does not support the video tag.
                                                                    </video>
                                                            @endif


                                                          </div>
                                                </div><!-- item -->
                                            @endif
                                        @endforeach
                                        @if($k == 0) 
                                            <div class="item active">
                                                <div class="carousel-image" style="height: 409px;">
                                                    <!-- image-wrapper -->
                                                    <img src="{{ DONATION_POST_IMAGE('preview.jpg')}}"   alt="{{$alt}}" class="img-responsive" style="max-height: 409px; margin-left: auto; height: 409px;width:614px; margin-right: auto;object-fit: contain;">
                                                </div>
                                            </div><!-- item -->
                                        @endif
                                    </div><!-- carousel-inner -->

                                <!-- Controls -->
                                    <a class="left carousel-control" href="#product-carousel" role="button" data-slide="prev" style="top: 30%; margin-top:0px;" >
                                        <i class="fa fa-chevron-left"></i>
                                    </a>
                                    <a class="right carousel-control" href="#product-carousel" role="button" data-slide="next" style="top: 30%; margin-top:0px;"  >
                                        <i class="fa fa-chevron-right"></i>
                                    </a><!-- Controls -->
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                @php $i = 0 @endphp

                                
                                    @foreach($donation_images as $donation_image)
                                        {{-- @if({{ DONATION_POST_IMAGE($donation_image->image)}}) --}}
                                        {{-- print_r(pathinfo({{$donation_image->image}}));  --}}
                                       @php 
                                        $extension=pathinfo($donation_image->image,PATHINFO_EXTENSION);
                                       //dd($donation_image); 
                                       $alt=str_replace(' ','-',$category->name).'-'.str_replace(' ','-',$subcategory->name).'-'.str_replace(' ','-',$spectification->name).'-'.str_replace(' ','-',$dontaion_post->title);
                                       @endphp

                                         @if ($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "gif")  
                                         
                                            <li data-target="#product-carousel" data-slide-to="{{ $i++ }}" class="active">
                                                <img src="{{ DONATION_POST_IMAGE($donation_image->image)}}"  alt="{{$alt}}" class="img-responsive" style="max-height: 105px; margin-left: auto; margin-right: auto;height: 105px;width:104px;">
                                            </li>
                                        @else
                                            <li data-target="#product-carousel" data-slide-to="{{ $i++ }}" class="active">
                                               <img src="{{ DONATION_POST_IMAGE('preview_video.jpg')}}"  alt="{{$alt}}" class="img-responsive" style="max-height: 105px; margin-left: auto; margin-right: auto;height: 105px;width:104px;">
                                                
                                                {{-- <video width="320" height="240" controls>
                                                    <source src="{{ DONATION_POST_IMAGE($donation_image->image)}}" type="video/*">
                                                    
                                                    Your browser does not support the video tag.
                                                </video> --}}

                                               
                                            </li>
                                        @endif
                                    @endforeach
                                </ol>
                            </div>
                        </div><!-- Controls -->	

                        <!-- slider-text -->
                        <div class="col-md-5">
                            <div class="slider-text">
                                <h2>
                                    <span class="pull-right">
                                        <!-- <a href="{{ route('web.donation.favoriate',$dontaion_post->key) }}">
                                            @if(!empty($favourite_posts))
                                                @if($favourite_posts->fav_status == 1)
                                                    <i class="fa fa-heart" style="font-size: 31px; color: orange;" title="added to favorite"></i>
                                                @else
                                                    <i class="fa fa-heart-o" style="font-size: 31px; color: orange;" title="add to favorite"></i>
                                                @endif
                                            @else
                                                <i class="fa fa-heart-o" style="font-size: 31px; color: orange;" title="add to favorite"></i>
                                            @endif
                                        </a><br> -->

                                        <div class="favorite" post="{{$dontaion_post->key}}">
                                            @if(!empty($favourite_posts))
                                                @if($favourite_posts->fav_status == 1)
                                                    <i class="fa fa-heart" style="font-size: 31px; color: orange;" title="Remove from favorite"></i>
                                                @else
                                                    <i class="fa fa-heart-o" style="font-size: 31px; color: orange;" title="Add to favorite"></i>
                                                @endif
                                            @else
                                                <i class="fa fa-heart-o" style="font-size: 31px; color: orange;" title="Add to favorite"></i>
                                            @endif
                                        </div><br>

                                        @if($dontaion_post->consideration == '0')
                                        <div class="text-color">{{ 'Free' }} </div>
                                        @elseif($dontaion_post->consideration == '1')
                                        <div title="{{$dontaion_post->consideration_detail}}" class="text-color">Non-Monetary</div>
                                        @else
                                        <div title="{{$dontaion_post->consideration_detail}}" class="text-color">Monetary</div>
                                        @endif 
                                    </span>
                                </h2>
                                <h3 class="title">{{$dontaion_post->title}}</h3>
                                <p><span>Category: </span><strong><a href="javascript:void(0)">{{ '   '.$category->name.' >> '.$subcategory->name.' >> '.$spectification->name}}</a></strong>
                                <p><span> Post ID: </span><strong>{{$dontaion_post->post_no}}</strong></p>
                                <p><span>Condition: </span> <strong>{{ $dontaion_post->condition == 1 ? "New" : "old"  }} </strong></p>
                                 <p><span>Type of Donation: </span> <strong> {{ $donation_type->name }}</strong></p>
                                <p><span>Location: </span><strong>{{ $dontaion_post->address  }}</strong></p>
                                <p><span><i class="fa fa-clock-o"></i></span><strong>{{date('d-m-Y H:i:s', strtotime($dontaion_post->created_at) ) }}</strong></p>
                                <p><span>Posted by: </span> <strong>{{!empty($user)?$user->name:''}} ({{ $user_type->name }}) since {{date('d-m-Y', strtotime($user->created_at) ) }}</strong></p>
                                <!-- <span class="icon"><i class="fa fa-map-marker"></i><a href="javascript:void(0)">{{ $city->name. ', '.$state->name.', '.$country->name }}</a></span> -->
                                
                                <!-- <span class="icon"><i class="fa fa-suitcase "></i>{{ $user_type->name }} <strong></strong></span> -->

                                <!-- short-info -->
                                    <!-- <p><strong>Brand: </strong><a href="javascript:void(0)">Apple</a> </p>
                                    <p><strong>Features: </strong><a href="javascript:void(0)">Camera,</a> <a href="#">Dual SIM,</a> <a href="#">GSM,</a> <a href="#">Touch screen</a> </p>
                                    <p><strong>Model: </strong><a href="javascript:void(0)">iPhone 6</a></p> -->

                                <!-- contact-with -->
                                <div class="contact-with">
                                    <!-- <h4>Contact with </h4> -->
                                        
                                    

                                    <a href="javascript:void(0)" class="direction" lat="{{$dontaion_post->lat}}" long="{{$dontaion_post->long}}">
                                        <span class="btn btn-red show-number">
                                            <i class="fa fa-map-marker"></i>
                                            <span class="">Direction</span> 
                                        </span>
                                    </a>
                                    
                                    <?php
                                        $currentURL = URL::current();

                                        if($dontaion_post->is_urgent =='1')
                                            {

                                                $urgent = 'URGENT: '.$dontaion_post->urgent_reason;
                                            }         
                                            else
                                            {
                                                $urgent = '';
                                            }

                                         $donation = $spectification->name.' '.$subcategory->name;    
                                        
                                        if(strpos($user_type->name, 'Donor') !== false)
                                        {
                                            $position = 'available';
                                        }
                                        elseif(strpos($user_type->name, 'Donee') !== false)
                                        {
                                            $position = 'required';
                                        }
                                        else
                                        {
                                            $position = '';
                                        }

                                        $heading = $dontaion_post->title.' under '.$donation.' '.$position;

                                        $location =  $city->name.', '.$state->name.', '.$country->name;
                                        // die();

                                    ?>
                                    <!-- description="{{$urgent}}  {{$heading}} at {{$location}} POSTED BY: {{$dontaion_post->d_name}} POSTED ON: {{date('d-m-Y', strtotime($dontaion_post->created_at) ) }} EXPIRED ON: {{date('d-m-Y', strtotime($dontaion_post->expired_at) ) }}" -->

                                    <!-- description="{{$urgent}} POSTED BY: {{$dontaion_post->d_name}} POSTED ON: {{date('d-m-Y', strtotime($dontaion_post->created_at) ) }} VALID THRU: {{date('d-m-Y', strtotime($dontaion_post->expired_at) ) }}" -->

                                    <a href="javascript:void(0)" class="share" 
                                        heading="{{$heading}}" 
                                        

                                        description="{{$urgent}}" 
                                        
                                        url="{{$currentURL}}">
                                        
                                        <span class="btn btn-red show-number">
                                            <i class="fa fa-share-alt"></i>
                                            <span class="">Share</span> 
                                        </span>
                                    </a>

                                    <a href="tel:{{ !empty($dontaion_post->d_contact) ? $dontaion_post->d_contact : $dontaion_post->helper_contact }}">
                                        <span class="btn btn-red show-number">
                                            <i class="fa fa-phone-square"></i>
                                            
                                             <span class="">Call</span>

                                            <!-- <span class="hide-text">{{ !empty($user)?$user->contact:'' }}</span>  -->
                                            <span class="hide-number"></span>
                                        </span>
                                    </a>

                                    

                                    

                                    <!-- <a href="mailto:{{ !empty($user)?$user->email:'' }}" class="btn" title="Click to email"><i class="fa fa-envelope-square" ></i>{{ !empty($user)?$user->email:'' }}</a> -->
                                
                                </div><!-- contact-with -->

                                    <p><span><i class="fa fa-exclamation-triangle" style="color: #ff0000 !important;"></i></span>  <strong><a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" title="Click to report" style="color: #ff0000 !important;">Report againt this post</a></strong></p>
  <p><span><i class="fa fa-pencil" style="color: #55b23d !important;"></i></span>  <strong><a href="javascript:void(0)" data-toggle="modal" data-target="#myModall" title="Click to report" style="color: #55b23d !important;">Write a review</a></strong></p>
                                    <div id="map"></div>
                                <!-- social-links -->
                               <!--  <div class="social-links">
                                    <h4>Share this post</h4>
                                    <ul class="list-inline">
                                        <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-tumblr-square"></i></a></li>
                                    </ul>
                                </div> --><!-- social-links -->						
                            </div>
                        </div><!-- slider-text -->				
                    </div>				
                </div><!-- slider -->

                <div class="description-info">
                    <div class="row">
                        <!-- description -->
                        <div class="col-md-8">
                            
                            <!-- <div class="section recommended-ads">
                                <div class="featured-top">
                                    <h4>Location</h4>
                                </div>
                            </div> -->
                            <!-- <div id="map"></div> -->

                            <div class="description">
                                <h4>Description</h4>
                                <p>{!! $dontaion_post->description !!}</p>
                            </div>

                            <div class="section recommended-ads">
                                <div class="featured-top">
                                    <h4>Recommended posts for You</h4>
                                </div>
                                <div class="appendText"></div>
                            </div>
                            
                            


                        </div><!-- description -->

                        <!-- description-short-info -->
                        <div class="col-md-4">					
                            <!--<div class="short-info">-->
                            <!--    <h4>Short Info</h4>-->
                                <!-- social-icon -->
                            <!--    <ul>-->
                                    <!-- <li><i class="fa fa-shopping-cart"></i>Type of Donation: {{ $donation_type->name }}</li> -->
                                    <!-- <li><i class="fa fa-user-plus"></i>More post by <span>{{!empty($user)?$user->name:''}}</span></li> -->
                                    <!-- <li><i class="fa fa-print"></i>Print this ad</li> -->
                                    <!-- <li><i class="fa fa-reply"></i><a href="#">Send to a friend</a></li> -->
                            <!--        <li><i class="fa fa-heart-o"></i><a href="{{ route('web.donation.favoriate',$dontaion_post->key) }}">Save post as Favorite</a></li>-->
                            <!--        <li><i class="fa fa-exclamation-triangle"></i><a href="#" data-toggle="modal" data-target="#myModal">Report this Donation post</a></li>-->
                            <!--    </ul> social-icon -->
                            <!--</div>-->
                            
                            
                            
                                <div class="section quick-rules">
                                    <h4>Quick rules</h4>
                                    <p class="lead">Donation through <a href="http://doncen.org" target="_blank">doncen.org</a> is free! However, all donation must follow our rules:</p>
                                    <ul>
                                        <li>Make sure you donate in the correct category.</li>
                                        <li>Be aware that your email or phone numbers in the donation post will be shown to our visitors so that they can contact you directly.</li>
                                        <li>Do not post the same donation more than once or repost within 48 hours.</li>
                                        <li>Do not upload pictures with watermarks.</li>
                                        <li>Do not post donation containing multiple items/services unless its a package deal.</li>
                                        <li>There is no definite way to identify a fraudulent donation so we urge you to practice good judgement and always be careful.</li>
                                    </ul>
                                </div>
                            
                        </div>                        
                    </div><!-- row -->
                </div><!-- description-info -->	             
                <div class="description-info">
                    <div class="row">


                        <!-- description -->
                        <div class="col-md-8">
                            
                            

                        </div>
                    </div><!-- description -->

                    <!-- description-short-info -->

                </div>
                <!-- row -->

                
                        <!-- MAP -->
                        <!-- END MAP -->


                        <!-- RECOMANDED Post -->
                <!--<div class="recommended-info">-->
                <!--    <div class="row">-->
                <!--        <div class="col-sm-8">				-->
                <!--            <div class="section recommended-ads">-->
                <!--                <div class="featured-top">-->
                <!--                    <h4>Recommended posts for You</h4>-->
                <!--                </div>-->
                <!--                <div class="appendText"></div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
            </div><!-- container -->
        </section><!-- main -->

        <!-- download -->
        <section id="something-sell" class="clearfix parallax-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h2 class="title">Do you have anything to Donate?</h2>
                        <h4>Donate anything, whatever you can think on Doncen.org</h4>
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
          <button type="button" class="close" style="color: #ff0000 !important;" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color: #ff0000 !important;">Report against this post</h4>
        </div>
        <form id="contact-form" class="contact-form" name="contact-form" method="post" action="{{ route('web.donation.storereprot',$user_identity)}}">
            <div class="modal-body">
                <div class="row">
                    {{csrf_field()}}
                    <input type="hidden" name="key" value="{{$user_identity}}"/>
                    <div class="col-sm-12">
                        <div class="form-group{{ $errors->has('report_subject') ? ' has-error' : '' }}">
                            <!-- <input name="report_subject" id="report_subject"  class="form-control" value="{{old('report_subject')}}" placeholder="Report reason"/>
                            @if ($errors->has('report_subject'))
                            <span class="help-block">
                                <strong>{{ $errors->first('report_subject') }}</strong>
                            </span>
                            @endif -->

                            <select class="form-control" name="report_subject" id="report_subject" >
                                <option value="">Select Reason</option>
                                <option value="Offensive content">Offensive content</option>
                                <option value="Fraud">Fraud</option>
                                <option value="Duplicate post">Duplicate post</option>
                                <option value="Object already completed">Object already completed</option>
                                <option value="Other">Other</option>
                              </select>

                        </div>             
                    </div>     
                    <div class="col-sm-12">
                        <div class="form-group{{ $errors->has('report') ? ' has-error' : '' }}">
                            <textarea name="report" id="report" class="form-control" value="{{old('report')}}" rows="7" placeholder="Report Description"></textarea>
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
                    <button type="submit" class="btn btn-danger pull-right">Submit Your Report</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>

   <div class="modal fade" id="myModall" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" style="color: #ff0000 !important;" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color: #00a651 !important;">Write a review</h4>
        </div>
        <form id="contact-form2" class="contact-form" name="contact-form" method="post" action="{{ route('web.donation.storereview',$user_identity)}}">
            <div class="modal-body">
                <div class="row">
                    {{csrf_field()}}
                    <input type="hidden" name="key" value="{{$user_identity}}"/>
                    <div class="col-sm-12">
                        <div class="form-group{{ $errors->has('report_subject') ? ' has-error' : '' }}">
                            <!-- <input name="report_subject" id="report_subject"  class="form-control" value="{{old('report_subject')}}" placeholder="Report reason"/>
                            @if ($errors->has('report_subject'))
                            <span class="help-block">
                                <strong>{{ $errors->first('report_subject') }}</strong>
                            </span>
                            @endif -->
                            <div class="my">
                                <div class="star-rating" style=" display: flex;
            flex-direction: row-reverse;
            font-size: 2.5em;
            padding: 0 0.2em;
            text-align: center;
            width: 5em;
            display: flex;
            justify-content: space-between;">
                        
                                  <input type="radio" id="5-stars" name="rate" value="5" />
                                  <label for="5-stars" class="star"> &#9733; </label>
                                  <input type="radio" id="4-stars" name="rate" value="4" />
                                  <label for="4-stars" class="star">&#9733;</label>
                                  <input type="radio" id="3-stars" name="rate" value="3" />
                                  <label for="3-stars" class="star">&#9733;</label>
                                  <input type="radio" id="2-stars" name="rate" value="2" />
                                  <label for="2-stars" class="star">&#9733;</label>
                                  <input type="radio" id="1-star" name="rate" value="1" />
                                  <label for="1-star" class="star">&#9733;</label>
                                </div>
                            </div>
                           <!--  <select class="form-control" name="report_subject" id="report_subject" >
                                <option value="">Select Reason</option>
                                <option value="Offensive content">Offensive content</option>
                                <option value="Fraud">Fraud</option>
                                <option value="Duplicate post">Duplicate post</option>
                                <option value="Object already completed">Object already completed</option>
                                <option value="Other">Other</option>
                              </select> -->

                        </div>             
                    </div>     
                    <div class="col-sm-12">
                        <div class="form-group{{ $errors->has('report') ? ' has-error' : '' }}">
                            <textarea name="review_subject" id="report" class="form-control" value="{{old('report')}}" rows="7" placeholder="Review Description"></textarea>
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
                    <button type="submit" class="btn btn-success pull-right">Submit Your Review</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
@if($dontaion_post->user_type_id == 1 || $dontaion_post->user_type_id == 2)
    @php
        $type = 'Donor';
        $helper_type = 'Helper of donor';
    @endphp
@else
    @php
        $type = 'Donee';
        $helper_type = 'Helper of donee';
    @endphp
@endif
        <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@push('javaScript')
<!-- <script src="{{ URL::asset('/js/user/js/jquery.min.js')}}"></script> -->
<!-- <script src="{{ URL::asset('/js/user/js/jquery-ui.min.js')}}"></script> -->



      <!--<div style="display:none">-->
      <!--  <pre>-->
      <!--      {{print_r($dontaion_post,true)}}-->
      <!--  </pre>-->
      <!--</div>-->

<script type="text/javascript">


                              // $('title').text('Doncen : Donation of '+ct_title_str);

                              //    $('meta[name="title"]').text('Doncen : Donation of '+ct_title_str);
                              //   $('meta[property="og:title"]').text('Doncen : Donation of '+ct_title_str);
                              //   $('meta[name="twitter:title"]').text('Doncen : Donation of '+ct_title_str);


      google.maps.event.addDomListener(window, 'load', initMap);
    function initMap() {
        //////// The location of Uluru
    
    // // DONATION Location
      var uluru  = {lat: {{ $dontaion_post->lat }}, lng: {{$dontaion_post->long}} };

    // // DONOR Location
      @if(!empty($dontaion_post->d_lat)){
        var uluru1  =   {lat: {{ $dontaion_post->d_lat }}, lng: {{$dontaion_post->d_long}} };
      }
      @endif

    // // HELPER Location
      @if(!empty($dontaion_post->helper_lat)){
        var uluru2  =   {lat: {{ $dontaion_post->helper_lat }}, lng: {{$dontaion_post->helper_long}} };
      }
      @endif 
        
      ///////// The map, centered at Uluru

      var map = new google.maps.Map(
          document.getElementById('map'), {zoom: 15  , center: uluru }
          );
      // The marker, positioned at Uluru
      var marker = new google.maps.Marker({position: uluru, map: map});
      marker.setIcon('https://doncen.org/uploads/icon/location-pointer.png');

      var marker1 = new google.maps.Marker({position: uluru1, map: map});
      marker1.setIcon('http://maps.google.com/mapfiles/ms/icons/red-dot.png');

      var marker2 = new google.maps.Marker({position: uluru2, map: map});
      marker2.setIcon('http://maps.google.com/mapfiles/ms/icons/yellow-dot.png');

//MAP
    google.maps.event.addListener(marker, 'click', (function(mm, tt) {
        return function() {
            infoWindow1.setContent(tt);
            infoWindow1.open(map, mm);
        }
    })(marker, createInfo('Donation area','where donation take place')));

   var infoWindow1 = new google.maps.InfoWindow({
        // content: 'hello1',
    });

    google.maps.event.addListener(marker1, 'click', (function(mm1, tt1) {
        return function() {
            infoWindow2.setContent(tt1);
            infoWindow2.open(map, mm1);
        }
    })(marker1, createInfo('{{$type}}','<a href="tel:{{ !empty($user)?$dontaion_post->d_contact:'' }}">{{ !empty($dontaion_post)?$dontaion_post->d_contact:'' }}</a>')));

   var infoWindow2 = new google.maps.InfoWindow({
        // content: 'hello1',
    });   

   google.maps.event.addListener(marker2, 'click', (function(mm1, tt1) {
        return function() {
            infoWindow3.setContent(tt1);
            infoWindow3.open(map, mm1);
        }
    })(marker2, createInfo('{{$helper_type}}','<a href="tel:{{ !empty($dontaion_post)?$dontaion_post->helper_contact:'' }}">{{ !empty($dontaion_post)?$dontaion_post->helper_contact:'' }}</a>')));

   var infoWindow3 = new google.maps.InfoWindow({
        // content: 'hello1',
    }); 

     google.maps.event.trigger(marker, 'click');
      google.maps.event.trigger(marker1, 'click');
       google.maps.event.trigger(marker2, 'click');


    }

    function createInfo(title, content) {
        return '<div class="infowindow"><strong>'+ title +'</strong><br>'+content+'</div>';
    }
</script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQsVSjofHfiWHWqai-0shuFexPke1-NEQ&callback=initMap">
</script>

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
  call_ajax("{{ URL::route('web.detail.getRecomandatePost')}}",{ specification:"{{ $spectification->id }}",city_id:"{{ $dontaion_post->city_id }}",id:"{{ $dontaion_post->id }}" });
  
  $("#city_search_box").keyup({
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
  $("#category_box").keyup({
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



  $(".share").click(function(){
     
    
    var heading = $(this).attr("heading");
    var description = $(this).attr("description");
    var url = $(this).attr("url");

    console.log(heading);

    if (navigator.share) {
          navigator.share({
            title: heading,
            text: description,
            url: url,
          })
            .then(() => console.log('Successful share'))
            .catch((error) => console.log('Error sharing', error));
        } 


  });


    $(".direction").click(function(){
     
            var lat = $(this).attr("lat");
            var long = $(this).attr("long");
            

            if /* if we're on iOS, open in Apple Maps */
                ((navigator.platform.indexOf("iPhone") != -1) || 
                 (navigator.platform.indexOf("iPad") != -1) || 
                 (navigator.platform.indexOf("iPod") != -1))
                window.open("maps://maps.google.com?q="+ lat +","+ long +"");
                // navigator.geolocation.getCurrentPosition(showPosition);

                

                // window.open("https://www.google.com/maps?saddr=Current+Location&daddr"+ lat +","+ long +"");



            else /* else use Google */

        // IN CASE OF OPEN LOCATION -- USE THIS URL
                window.open("http://maps.google.com/?q="+ lat +","+ long +"");

               

        // IN CASE OF OPEN DIRECTION PAGE -- USE THIS URL
                // window.open("https://maps.google.com/maps?daddr="+ lat +","+ long +"&amp;ll=");

        // IN CASE OF MAKE DIRECTION -- USE THIS URL
                // http://maps.google.com/maps?saddr=" + sourceLatitude + "," + sourceLongitude + "&daddr=" + destinationLatitude + "," + destinationLongitude


      });

    $('.favorite').on('click',function(){
        
          $post_key = $(this).attr('post');

          $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
         });
         
          $.ajax({
           type:'POST',
           url: "{{ URL::route('web.donation.favoriate') }}",
           data: { key: $post_key},
           success: function(data) {
               
                var result = data;

               // $('.appendSubCategory').append(data);
               $('.favorite i').hide();

               if (result == 'Added') {
                  $('.favorite').append('<i class="fa fa-heart" style="font-size:31px; color: orange;" title="Remove from favorite"></i>');
                } 
                
                if (result == 'Removed') 
                {
                  $('.favorite').append('<i class="fa fa-heart-o" style="font-size: 31px; color: orange;" title="Add to favorite"></i>');
                }   

           }
          });
       });
  
});
</script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
        <script type="text/javascript">
            $('#contact-form').validate({
                rules:{ 
                    report_subject:{
                      required:true,
                    },
                    report:{
                        required : true, 
                        minlength:10,

                    },
                },
                messages:{
                    report_subject:{
                        required: '<span style="color:red">Select Reason</span>',
                    }, 
                    report:{
                        required: '<span style="color:red">Enter Report Description</span>',
                        minlength:'<span style="color:red">The report must be at least 10 characters.</span>',

                    }, 
                },
            });

            $('#contact-form2').validate({
                rules:{ 
                    review_subject:{
                      required:true,
                        minlength:10,
                    },
                },
                messages:{
                    review_subject:{
                        required: '<span style="color:red">Enter Review Description</span>', minlength:'<span style="color:red">The report must be at least 10 characters.</span>',
                    }, 
                },
            });

           
        </script>


@endpush