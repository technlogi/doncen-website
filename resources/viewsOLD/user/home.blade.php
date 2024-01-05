@extends('user.layout.master')
@section('title',"Dashboard")
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
                    @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
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
                        <li class="active"><a href="{{ url('user/dashboard') }}">Profile</a></li>
                        <li><a href="{{ route('user.urgent.requirement') }}">Urgent requirement</a></li>
                        <li><a  href="{{ route('user.myDonation') }}">My donation</a></li>
                        <li><a href="{{ route('user.complete.donation') }}">Donation Complete</a></li>
                        <li><a href="{{ route('user.pandingDonation')}}">Panding donation</a></li>
                        <li><a href="{{ route('user.favoriateDonation')}}">Favorite Donation</a></li>
                        
                        <li><a href="{{ route('user.deleteAccount') }}">Close account</a></li>
                    </ul>
                </div><!-- ad-profile -->		

                <div class="close-account">
                    <div class="row">
                        <div class="col-sm-8 ">
                            <div class="delete-account section">
                                <form action="{{ route('user.update.profile' )}}" method="POST">
                                    <div class="profile-details section">
                                        <h2>Profile Details</h2>
                                        <!-- form -->
                                        {{ csrf_field() }}
                                        
                                        <div class="form-group{{ $errors->has('user_name') ? ' has-error' : '' }}">
                                            <label>Full Name</label>
                                            <input type="text" name="user_name" value="{{ $user->name }}" class="form-control" placeholder="Enter Name">
                                            @if ($errors->has('user_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('user_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label>Email ID</label>
                                            <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Enter Your email" >
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('blood_group') ? ' has-error' : '' }}">
                                            <label>Blood Group</label>
                                            <select class="form-control">
                                                <option value="B+">B+</option>
                                            </select>
                                            @if ($errors->has('blood_group'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('blood_group') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('mobile_no') ? ' has-error' : '' }}">
                                            <label for="name-three">Mobile</label>
                                            <input type="text" class="form-control" name="mobile_no" value="{{ $user->contact }}" placeholder="Enter Contact no." readonly>
                                            @if ($errors->has('mobile_no'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('mobile_no') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                            <label>Your Full Address</label>
                                                <input type="text" id="searchTextField" name="city" class="form-control" value="{{ $user->address }}" placeholder="Ex: (Address, City, State, Country)" id="city_search_box">
                                            @if ($errors->has('city'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('city') }}</strong>
                                                </span>
                                            @endif
                                        </div>	
                                    	<div class="text-center"><button class="btn btn-primary " type="submit">update Profile</button></div>														
                                    </div><!-- profile-details -->
                                </form> 

                                <form action="{{ route('user.change.password' )}}" method="POST">
                                    <div class="change-password section">
                                        <h2>Change PIN</h2>
                                         {{ csrf_field() }}
                                        <!-- <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                                            <label>Old PIN</label>
                                            <input type="password" name="old_password" class="form-control" >
                                            @if ($errors->has('old_password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('old_password') }}</strong>
                                                </span>
                                            @endif
                                        </div> -->

                                        <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                                            <label>New PIN</label>
                                            <input type="password"  name="new_password" class="form-control">	
                                            @if ($errors->has('new_password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('new_password') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label>Confirm PIN</label>
                                            <input type="password" name="new_password_confirmation" class="form-control">
                                        </div>	
                                        <div class="text-center"><button class="btn btn-primary" type="submit">Change PIN</button></div>														
                                    </div>
                               </form>  
                               @if(Session::has('changeMobileNumber'))
                               <form action="{{ route('user.change.submitOtp')}}" method="POST">
                                    <div class="change-password section">
                                        <h2>Enter Otp</h2>
                                         {{ csrf_field() }}
                                        <div class="form-group{{ $errors->has('otp') ? ' has-error' : '' }}">
                                            <label>OTP for verification</label>
                                            <input type="text" name="otp" class="form-control" >
                                            @if ($errors->has('otp'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('otp') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="text-center"><button class="btn btn-primary" type="submit">Submit Otp
                                        </button></div>														
                                    </div>
                               </form>  
                               @else
                               <form action="{{ route('user.change.contact')}}" method="POST">
                                    <div class="change-password section">
                                        <h2>Change mobile number</h2>
                                         {{ csrf_field() }}
                                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                            <label>New mobile number</label>
                                            <input type="text" name="mobile" class="form-control" >
                                            @if ($errors->has('mobile'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('mobile') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="text-center"><button class="btn btn-primary" type="submit">Update Mobile Number
                                        </button></div>														
                                    </div>
                               </form>
                               
                               @endif
                            </div>
                        </div><!-- delete-account -->
                         @include('user.layout.rightsidebar')			
                    </div><!-- row -->
                </div>
            </div><!-- container -->
        </section><!-- delete-page -->
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@push('javaScript')
<script src="{{ URL::asset('/js/user/js/jquery.min.js')}}"></script>
<script src="{{ URL::asset('/js/user/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript">
   function initialize() {
      var input = document.getElementById('searchTextField');
      var options = {
        types: ['geocode'] //this should work !
      };
      var autocomplete = new google.maps.places.Autocomplete(input, options);
   }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
<script>
$(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  function call_ajax(url,data){
        $.ajax({
        type        : 'POST',
        url         : url, // the url where we want to POST
        data        : {data: data},
        success: function(data){
            $('.appendText').html(data);
        }
    });
  }
  setInterval(function(){
  call_ajax("{{ URL::route('web.home.getItemOnLoad')}}",0);
}, 10000);
  $("#city_search_box").autocomplete({
    source: function(request, response) {
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
           });
            $.ajax({
                type: "POST",
                url: "{{ route('home.search.city') }}",
                dataType: "json",
                data: {
                    city : request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
    minLength: 2,
  });
});
</script>
@endpush