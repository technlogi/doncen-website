  <!-- header -->
  <header id="header" class="clearfix">
            <!-- navbar -->
            <nav class="navbar navbar-default">
                <div class="">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="padding: 0px;">    
                        
                        <!-- Mobile menu button -->
                        <div class="col-xs-1 hidden-sm hidden-md hidden-lg hidden-xl mobile-menu" >
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" style="float:left;" >
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        
                        <!-- navbar-header -->
                        <div class="col-xs-7 col-sm-3 col-md-3 col-lg-3 col-xl-3 navbar-header">
                            <a  ss="navbar-brand" href="{{ route('web.home') }}"><img class="img-responsive" src="{{ URL::asset('/uploads/images/doncen-logo.svg')}}" alt="Logo" style="margin-left: auto;"></a>
                        </div>
                        <!-- /navbar-header -->
                        
                        <!--<div class="navbar-left">-->
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 navbar-left">    
                            <div class="collapse navbar-collapse" id="navbar-collapse">
                                <ul class="nav navbar-nav">
                                    <!--<li><a href="{{ route('web.home') }}">Home</a></li>-->
                                    <li><a href="{{ route('web.categorie.searchCategory') }}">all categories</a></li>
                                    
                                    @if(!Auth::guard('user')->check())
                                        <li><a href="{{ url('/user/login') }}"> Log in </a></li>
                                    @else
                                        <li><a href="#"><i class="fa fa-user"></i>{{Auth::guard('user')->user()->name}}</a></li>
                                        <li><a href="{{ route('user.home') }}">Profile</a></li>
                                        <li><a href="{{ route('user.myDonation') }}">My Donation</a></li>
                                        <li><a href="{{ route('user.complete.donation') }}">My Complete Donation</a></li>
                                        <li><a href="{{ route('user.urgent.requirement') }}">My Urgency</a></li>
                                         <li><a href="{{ route('user.urgent.requirement') }}">Success Story</a></li>

                                        <li><a class="nav-link" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a></li>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: one;">
                                                    {{ csrf_field() }}
                                                </form>
                                        
                                    @endif
                                </ul>
                            </div>
                        </div>
                        
                        <div class="col-xs-4 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                            <a href="{{ route('web.donation.category') }}" class="btn" style="top: 13px; margin-right: 5%; position: fixed;">Donate</a>
                        </div>
                        
                    </div>
                        
                    <!-- nav-right -->
                    <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                        <!-- sign-in -->        
                        @if(!Auth::guard('user')->check())      
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <ul class="sign-in">
                                <li><i class="fa fa-user"></i></li>
                                <li><a href="{{ url('/user/login') }}"> Log in </a></li>
                                <!-- <li><a href="{{ url('/user/register') }}">Register</a></li> -->
                            </ul><!-- sign-in -->                   
                        </div>    
                        @else
                        <!--<div class="dropdown language-dropdown col-sx-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">-->
                        <div class=" col-sx-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="padding: 13px;">
                            <i class="fa fa-user"></i>                      
                            <a data-toggle="dropdown" href="#" aria-expanded="false"><span class="change-text">{{Auth::guard('user')->user()->name}}</span> <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu language-change">
                                <li><a href="{{ route('user.home') }}">Profile</a></li>
                                <li><a href="{{ route('user.myDonation') }}">My Donation</a></li>
                                <li><a href="{{ route('user.complete.donation') }}">My Complete Donation</a></li>
                                <li><a href="{{ route('user.urgent.requirement') }}">My Urgency</a></li>
                                <li><a class="nav-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            Logout
                                        </a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: one;">
                                            {{ csrf_field() }}
                                        </form>
                            </ul>                               
                        </div>  

                        @endif
                            
                    </div>
                    <!-- nav-right -->
                </div><!-- container -->
            </nav><!-- navbar -->
        </header><!-- header -->