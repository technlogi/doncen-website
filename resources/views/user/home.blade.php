@extends('user.layout.master')
@section('title',"Dashboard")
@section('content')

   <!-- delete-page -->
   <section id="main" class="clearfix delete-page">
            <div class="container">
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
                            <img src="{{URL::asset('/uploads/images/user.jpg')}}" alt="User Images" class="img-responsive">
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
                        <li><a href="my-ads.html">My donation</a></li>
                        <li><a href="urgent_requirement.html">Urgent requirement</a></li>
                        <li><a href="pending-ads.html">Pending approval</a></li>
                        <!--<li><a href="archived-ads.html">Archived ads </a></li>-->
                        <li  class="active"><a href="{{ route('user.deleteAccount') }}">Close account</a></li>
                    </ul>

                </div><!-- ad-profile -->		

                <div class="close-account">
                    <div class="row">
                        <div class="col-sm-8 text-center">
                            <div class="delete-account section">
                                           <form action="{{ route('user.update.profile' )}}" method="POST">
                                    <div class="profile-details section">
                                        <h2>Profile Details</h2>
                                        <!-- form -->
                                        {{ csrf_field() }}
                                        
                                        <div class="form-group{{ $errors->has('user_name') ? ' has-error' : '' }}">
                                            <label>Username</label>
                                            <input type="text" name="user_name" value="{{ $user->name }}" class="form-control" placeholder="Enter Name">
                                            @if ($errors->has('user_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('user_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label>Email ID</label>
                                            <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Enter Your email" readonly>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="name-three">Mobile</label>
                                            <input type="text" class="form-control" name="mobile_no" value="{{ $user->contact }}" placeholder="Enter Contact no." readonly>
                                            @if ($errors->has('mobile_no'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('mobile_no') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label>Your City</label>
                                            <select class="form-control">
                                                <option value="#">Los Angeles, USA</option>
                                                <option value="#">Dhaka, BD</option>
                                                <option value="#">Shanghai</option>
                                                <option value="#">Karachi</option>
                                                <option value="#">Beijing</option>
                                                <option value="#">Lagos</option>
                                                <option value="#">Delhi</option>
                                                <option value="#">Tianjin</option>
                                                <option value="#">Rio de Janeiro</option>
                                            </select>
                                        </div>	

                                        <div class="form-group">
                                            <label>You are a</label>
                                            <select class="form-control">
                                                <option value="#">Dealer</option>
                                                <option value="#">Individual Seller</option>
                                            </select>
                                        </div>					
                                    <button class="btn btn-primary" type="submit">update Profile</button>														
                                    </div><!-- profile-details -->
                                </form> 

                                <form action="{{ route('user.change.password' )}}" method="POST">
                                    <!-- change-password -->
                                    <div class="change-password section">
                                        <h2>Change password</h2>
                                         {{ csrf_field() }}
                                        <!-- form -->
                                        <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                                            <label>Old Password</label>
                                            <input type="password" name="old_password" class="form-control" >
                                            @if ($errors->has('old_password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('old_password') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                                            <label>New password</label>
                                            <input type="password"  name="new_password" class="form-control">	
                                            @if ($errors->has('new_password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('new_password') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label>Confirm password</label>
                                            <input type="password" name="new_password_confirmation" class="form-control">
                                        </div>	
                                        <button class="btn btn-primary" type="submit">Change Password</button>														
                                    </div><!-- change-password -->
                               </form> 
                            </div>
                        </div><!-- delete-account -->

                         @include('user.layout.rightsidebar')			
                    </div><!-- row -->
                </div>
            </div><!-- container -->
        </section><!-- delete-page -->


@endsection