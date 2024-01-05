  <!-- header -->
  <header id="header1" class="clearfix" style="position: fixed; z-index: 99;  width: 100%; box-shadow: 0px 1px 8px #ccc;">
            <!-- navbar -->
            <nav class="navbar navbar-default">
                <div class="">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="padding: 0px;">    
                        
                        <!-- Mobile menu button -->
                        <div class="col-xs-2 hidden-sm hidden-md hidden-lg hidden-xl mobile-menu" style="max-width: 60px; padding-right: 0px !important;">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" style="float:left;" >
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        
                        <!-- navbar-header -->
                        <div class="col-xs-4 col-sm-6 col-md-2 col-lg-2 col-xl-2 navbar-header">
                            <a  ss="navbar-brand" href="{{ route('web.home') }}"><img class="img-responsive" src="{{ URL::asset('/uploads/images/doncen-logo.svg')}}" alt="Logo" style="max-width: 130px; margin-top: 5px"></a>
                        </div>
                        <!-- /navbar-header -->
                        
                        <!--<div class="navbar-left">-->
                        <div class="hidden-xs hidden-sm col-md-6 col-lg-6 col-xl-6 navbar-left">    
                            <div class="collapse navbar-collapse" >
                                <ul class="nav navbar-nav">
                                    <!--<li><a href="{{ route('web.home') }}">Home</a></li>-->
                                    <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Covid <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li><a href="https://www.cowin.gov.in" target="_blank">Vaccination Center</a></li>
											<li><a href="https://selfregistration.cowin.gov.in" target="_blank">Registration for Vaccination</a></li>
                                            <li><a href="https://dashboard.cowin.gov.in/" target="_blank">India on Covid-19</a></li>
                                            <li><a href="https://covid19.who.int/" target="_blank">WHO on Covid-19</a></li>
										</ul>
									</li>
                                    <li>
                                    	<a href="{{ route('web.categorie.searchCategory') }}/dd-1">all categories</a>
                                    </li>
                                     
                                    


                                    
                                </ul>
                            </div>
                        </div>
                        
                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 col-xl-4 float-right text-right action-btn">
                            <!-- sign-in -->                    
                            <ul class="sign-in">
                                <!-- <li><i class="fa fa-user"></i></li> -->
                                <li>@if(!Auth::guard('user')->check())
                                        <a href="{{ url('/user/login') }}"><i class="fa fa-user-o"></i> Log in </a>
                                    
                                    @elseif(Auth::guard('user')->user()->name == "")
                                        <a href="{{ route('user.home') }}"><i class="fa fa-user"></i> My Account </a>
                                    
                                    @else
                                        <a href="{{ route('user.home') }}"><i class="fa fa-user"></i> {{Auth::guard('user')->user()->name}}</a>    
                                        
                                    @endif</li>
                                    <li></li>
                                <!-- <li><a href="signup.html">Register</a></li> -->
                            </ul><!-- sign-in -->   
                            

                            <a href="{{ route('web.donation.category') }}" class="btn btn-main" >DONATE</a>
                            <a href="{{ route('web.donation.category') }}" class="btn btn-main" >REQUEST</a>
                        </div>

                        

                        <style>
                            @media only screen and (max-width: 768px){
                                .btn-main {
                                    
                                    font-size: 10px;
                                }

                            }

                        </style>
                        
                        <!--<div class="navbar-left">-->
                        <div class="col-xs-12 col-sm-12 hidden-md hidden-lg hidden-xl navbar-left">    
                            <div class="collapse navbar-collapse" id="navbar-collapse">
                                <ul class="nav navbar-nav">
                                    <!--<li><a href="{{ route('web.home') }}">Home</a></li>-->
                                    <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Covid <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="https://www.cowin.gov.in" target="_blank">Vaccination Center</a></li>
                                            <li><a href="https://selfregistration.cowin.gov.in" target="_blank">Registration for Vaccination</a></li>
                                            <li><a href="https://dashboard.cowin.gov.in/" target="_blank">India on Covid-19</a></li>
                                            <li><a href="https://covid19.who.int/" target="_blank">WHO on Covid-19</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{ route('web.categorie.searchCategory') }}">all categories</a>
                                    </li>
                                     
                                    
                                    @if(!Auth::guard('user')->check())
                                        <li><a href="{{ url('/user/login') }}"><i class="fa fa-user-o"></i>  Log in </a></li>
                                    
                                    @elseif(Auth::guard('user')->user()->name == "")
                                        <a href="{{ route('user.home') }}"><i class="fa fa-user"></i> My Account </a>
                                    
                                    @else
                                        <a href="{{ route('user.home') }}"><i class="fa fa-user"></i> {{Auth::guard('user')->user()->name}}</a> 
                                    

                                    @endif
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                        
                    <!-- nav-right -->
                </div><!-- container -->
            </nav><!-- navbar -->
        </header><!-- header -->
        