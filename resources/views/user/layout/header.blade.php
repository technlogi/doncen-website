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
                        <a class="navbar-brand" href="index.html"><img class="img-responsive" src="{{ URL::asset('/uploads/images/doncen-responsive.png')}}" alt="Logo"></a>
                    </div>
                    <!-- /navbar-header -->

                    <div class="navbar-left">
                        <div class="collapse navbar-collapse" id="navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="{{ url('/')}}">Home</a></li>
                                <li><a href="categories.html">all categories</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- nav-right -->
                    <div class="nav-right">

                        <!-- sign-in -->					
                        <ul class="sign-in">
                            <li><i class="fa fa-user"></i></li>
                            <li><a href="{{ url('/user/login') }}"> Sign In </a></li>
                            <li><a href="{{ url('/user/register') }}">Register</a></li>
                        </ul><!-- sign-in -->					

                        <a href="{{ route('web.donation.category') }}" class="btn">Donate Now</a>
                    </div>
                    <!-- nav-right -->
                </div><!-- container -->
            </nav><!-- navbar -->
        </header><!-- header -->