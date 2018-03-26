<div class="breadcrumb-section">
                    <!-- breadcrumb -->
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li>Profile</li>
                    </ol><!-- breadcrumb -->						
                    <h2 class="title">My Profile</h2>
                </div><!-- banner -->
                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                <div class="ad-profile section">	
                    <div class="user-profile">
                        <div class="user-images">
                            <img src="{{URL::asset('/uploads/images/user.jpg')}}')}}" alt="User Images" class="img-responsive">
                        </div>
                        <div class="user">
                            <h2>Hello, <a href="#">{{ ucfirst($user->name) }}</a></h2>
                            <!-- <h5>You last logged in at: 14-01-2016 6:40 AM [ USA time (GMT + 6:00hrs)]</h5> -->
                        </div>

                        <div class="favorites-user">
                            <div class="my-ads">
                                <a href="my-ads.html">23<small>My ADS</small></a>
                            </div>
                            <div class="favorites">
                                <a href="#">{{ $total_post }}<small>Post By You</small></a>
                            </div>
                        </div>								
                    </div><!-- user-profile -->
                   <ul class="user-menu">
                   <li><a href="{{ url('user/dashboard') }}">Profile</a></li>
                        <li><a href="favourite-ads.html">Favourite donation</a></li>
                        <li class="active"><a href="{{ route('user.myDonation') }}">My donation</a></li>
                        <li><a href="urgent_requirement.html">Urgent requirement</a></li>
                        <li><a href="pending-ads.html">Pending approval</a></li>
                        <!--<li><a href="archived-ads.html">Archived ads </a></li>-->
                        <li><a href="{{ route('user.deleteAccount') }}">Close account</a></li>
                    </ul>

                </div><!-- ad-profile -->		
