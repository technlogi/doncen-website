@extends('user.layout.master')
@section('title',"Complete Donation")
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
                        <li class="active"><a href="{{ route('user.favoriateDonation')}}">Favorite Donation</a></li>
                        <li><a href="{{ route('user.deleteAccount') }}">Close account</a></li>
                    </ul>

                </div><!-- ad-profile -->		

                <div class="close-account">
                        <div class="col-sm-8">
                            <div class="section">
                                <h2>My Favorite Donation</h2>
                                <div class="appendText"></div>
                            </div>
                        </div><!-- my-ads -->
                @include('user.layout.rightsidebar')			
            </div><!-- container -->
        </section><!-- delete-page -->
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@push('javaScript')
<script src="{{ URL::asset('/js/user/js/jquery.min.js')}}"></script>
<script src="{{ URL::asset('/js/user/js/jquery-ui.min.js')}}"></script>

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
  call_ajax("{{ URL::route('user.favoriate.donation')}}",0);
  
  setInterval(function(){
  call_ajax("{{ URL::route('user.favoriate.donation')}}",0);
}, 10000);
});
</script>
@endpush