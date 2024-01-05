  <!-- header -->
  <header id="header" class="clearfix">
            <!-- navbar -->
            <nav class="navbar navbar-default">
                <div class="container">
                    <!-- navbar-header -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ route('web.home') }}"><img class="img-responsive" style="max-width: 66%;" src="{{ URL::asset('/uploads/images/doncen-logo.svg')}}" alt="Logo"></a>
                    </div>
                    <!-- /navbar-header -->

                    <div class="navbar-left">
                        <div class="collapse navbar-collapse" id="navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="{{ route('web.home') }}">Home</a></li>
                                <li><a href="{{ route('web.categorie.searchCategory') }}">all categories</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- nav-right -->
                    <div class="nav-right">

                        <!-- sign-in -->		
                        @if(!Auth::guard('user')->check())		
                        <ul class="sign-in">
                            <li><i class="fa fa-user"></i></li>
                            <li><a href="{{ url('/user/login') }}"> Log in </a></li>
                            <!-- <li><a href="{{ url('/user/register') }}">Register</a></li> -->
                        </ul><!-- sign-in -->					
                        @else
                        <div class="dropdown language-dropdown">
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
                        <a href="{{ route('web.donation.category') }}" class="btn">Donate Now</a>
                    </div>
                    <!-- nav-right -->
                </div><!-- container -->
            </nav><!-- navbar -->
        </header><!-- header -->