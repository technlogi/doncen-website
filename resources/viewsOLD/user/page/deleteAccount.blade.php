@extends('user.layout.master')
@section('title',"Deactive Account")
@section('content')

   <!-- delete-page -->
   <section id="main" class="clearfix delete-page">
            <div class="container">
                <div class="breadcrumb-section">
                    <!-- breadcrumb -->
                    <ol class="breadcrumb">
                        <li><a href="{{url('/')}}">Home</a></li>
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
                        <li><a href="{{ route('user.urgent.requirement') }}">Urgent requirement</a></li>
                        <li><a  href="{{ route('user.myDonation') }}">My donation</a></li>
                        <li><a href="{{ route('user.complete.donation') }}">Donation Complete</a></li>
                        <li><a href="{{ route('user.pandingDonation')}}">Panding donation</a></li>
                        <li><a href="{{ route('user.favoriateDonation')}}">Favorite Donation</a></li>
                        <li class="active"><a href="{{ route('user.deleteAccount') }}">Close account</a></li>
                    </ul>

                </div><!-- ad-profile -->		

                <div class="close-account">
                    <div class="row">
                        
                        <div class="col-sm-8 text-center">
                            <div class="delete-account section">
                                <h2>Delete Your Account</h2>
                                <h4>Are you sure, you want to delete your account?</h4>
                                    <a href="{{url('user/delete-account-action')}}" class="btn btn-primary">Delete Account</a>
                                    <a href="{{ url('/user/dashboard')}}" class="btn cancle">Cancel</a>
                            </div>
                        </div><!-- delete-account -->
                        



                         @include('user.layout.rightsidebar')			
                    </div><!-- row -->
                </div>
            </div><!-- container -->
        </section><!-- delete-page -->


@endsection