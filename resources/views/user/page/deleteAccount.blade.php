@extends('user.layout.master')
@section('title',"Deactive Account")
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
            display: flex;
            /*flex-direction: row-reverse;*/
            font-size: 2.5em;
            padding: 0 0em;
            text-align: center;
            width:0em;
            display: flex;
            justify-content: space-between;
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
                            <h5>Member since: {{ $user->created_at->format('d-m-Y') }}</h5>
                        </div>

                        <div class="favorites-user">
                            <!-- <div class="my-ads">
                                <a href="my-ads.html">23<small>My ADS</small></a>
                            </div> -->
                            <div class="favorites">
                                <a href="#">{{ $total_post }}<small>Total Post</small></a>
                            </div>
                        </div>								
                    </div><!-- user-profile -->
                   
                    <ul class="user-menu">
                        <li><a href="{{ url('user/dashboard') }}">Profile</a></li>
                        <li><a  href="{{ route('user.myDonation') }}">My Posts</a></li>
                        <li><a href="{{ route('user.pandingDonation')}}">Pending</a></li>
                        <li><a href="{{ route('user.complete.donation') }}">Complete</a></li>
                        <li><a href="{{ route('user.urgent.requirement') }}">Urgent</a></li>
                        <li><a href="{{ route('user.favoriateDonation')}}">Favorite</a></li>
                        
                        <li class="fa fa-sign-out">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Logout
                            </a>
                         
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: one;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>

                </div><!-- ad-profile -->		

                <div class="close-account">
                    <div class="row">
                        
                        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 text-center">
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