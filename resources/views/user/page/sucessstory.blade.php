@extends('user.layout.master')
@section('title',"My Donation")
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
                            <div class="favorites">
                                <a href="#">{{ $total_post }}<small>Total Post</small></a>
                            </div>
                        </div>								
                    </div><!-- user-profile -->
                   <ul class="user-menu">
                        <li  ><a href="{{ url('user/dashboard') }}">Profile</a></li>
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
                        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 ">
                            <div class="delete-account section">
                                <form action="{{ route('user.storycomplete' )}}" method="POST">
                                    <div class="profile-details section">
                                        <h2>Write Your Story</h2>
                                        <!-- form -->
                                        {{ csrf_field() }}
                                        
                                        <div class="form-group{{ $errors->has('user_title') ? ' has-error' : '' }}">
                                            <label>Title</label>
                                            <input type="text" name="title" value="{{ $user->title }}" class="form-control" placeholder="Enter Name">
                                            @if ($errors->has('user_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('user_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group{{ $errors->has('user_desc') ? ' has-error' : '' }}">
                                            <label>Description</label>
                                            <input type="text" name="description" value="{{ $user->name }}" class="form-control" placeholder="Enter Name">
                                            @if ($errors->has('user_desc'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('user_desc') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group{{ $errors->has('user_name') ? ' has-error' : '' }}">
                                            <label>Photo Upload</label>
                                            <input type="file" name="image_file[]" value="{{ $user->name }}" class="form-control" placeholder="Enter Name">
                                            @if ($errors->has('user_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('user_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                         <div class="text-center"><button class="btn btn-primary" type="submit" >Submit
                                        </button></div>		
                                    </div>
                                </form>
                            </div>
                        </div>
                         @include('user.layout.rightsidebar')		
                    </div>
                </div>
        </section><!-- delete-page -->
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@push('javaScript')

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
        type        : 'GET',
        url         : url, // the url where we want to POST
        data        : {data: data},
        success: function(data){
            $('.appendText').html(data);
            consloe.log(data);
        }
    });
  }
  call_ajax("{{ URL::route('user.get.sucessstory')}}",0);
//   setInterval(function(){
//   call_ajax("{{ URL::route('user.get.donationList')}}",0);
// }, 10000);
});
</script>
@endpush