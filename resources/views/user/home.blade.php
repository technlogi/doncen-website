@extends('user.layout.master')
@section('title',"Dashboard")
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
            padding: 0 0.2em;
            text-align: center;
            width: 5em;
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
                            <h5>Member since: {{ $user->created_at->format('d-m-Y') }}</h5>

                            

                        </div>

                        <div class="favorites-user">
                            <div class="favorites">
                                <a href="#">{{ $total_post }}<small>Total Post</small></a>
                            </div>
                        </div>								
                    </div><!-- user-profile -->
                   <ul class="user-menu">
                        <li  class="active"><a href="{{ url('user/dashboard') }}">Profile</a></li>
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
                                            <select class="form-control" name="blood_groups_id">
                                                <option value="0">Select Your blood group</option>
                                                @foreach($blood_group as $bg)
                                                    @php
                                                        $selected = '';
                                                    @endphp
                                                    @if($bg->id == $user->blood_groups_id)
                                                        @php
                                                            $selected = 'selected';
                                                        @endphp
                                                    @endif
                                                    <option value="{{ $bg->id }}" {{ $selected }}>{{ $bg->blood_group }}</option>
                                                @endforeach
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

                                            <label>Your Full Address</label>
                                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                                <input type="hidden" name="latitude" id="text" value="">
                                                <input type="hidden" name="longitude" id="text" value="">
            
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
                                            <input id="password" pattern="[0-9]*" inputmode="numeric" type="password" class="form-control" name="new_password" placeholder="PIN (4 Digits only)" maxlength="4" minlength="3"  onkeypress="return isnumber(event)">

                                            <!-- <input type="password"  id="password" name="new_password" class="form-control" onkeypress="return isnumber(event)" maxlength="4" minlength="3"> -->	
                                            <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                            @if ($errors->has('new_password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('new_password') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label>Confirm PIN</label>
                                            <input id="cppassword" type="password" pattern="[0-9]*" inputmode="numeric" class="form-control" name="new_password_confirmation" placeholder="Confirm PIN" maxlength="4" minlength="3" onkeypress="return isnumber(event)">

                                            <!-- <input type="password" id="cppassword" name="new_password_confirmation" class="form-control" onkeypress="return isnumber(event)" maxlength="4" minlength="3"> -->

                                            <span toggle="#cppassword" class="fa fa-fw fa-eye field-icon toggle-password1"></span>

                                        </div>	
                                        <div class="text-center"><button class="btn btn-primary" type="submit">Change PIN</button></div>														
                                    </div>
                               </form>  
                               <!-- <form action="{{ route('user.change.submitOtp')}}" method="POST" style="display: none"> -->
                                    <div class="change-password section otp_div" style="display: none">
                                        <h2>Enter Otp</h2>
                                         {{ csrf_field() }}
                                        <div class="form-group{{ $errors->has('otp') ? ' has-error' : '' }}">
                                            <label>OTP for verification</label>
                                            <!-- <input type="text" name="otp" class="form-control otp" > -->

                                            <input id="otp" type="text" pattern="[0-9]*" inputmode="numeric" class="form-control otp" placeholder="Enter OTP" name="otp"  value="{{ old('otp') }}" onkeypress="return isnumber(event)">

                                            @if ($errors->has('otp'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('otp') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="text-center"><button class="btn btn-primary" type="submit" onclick="submitotp()">Submit Otp
                                        </button></div>														
                                    </div>
                               <!-- </form>   -->
                               <!-- <form action="{{ route('user.change.contact')}}" method="POST"> -->
                                    <div class="change-password section mobile-num-div">
                                        <h2>Change mobile number</h2>
                                         {{ csrf_field() }}
                                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                            <label>New mobile number</label>
                                            <input type="text" name="mobile" onkeypress="return isnumber(event)" maxlength="10" class="form-control mobile-number" >
                                            @if ($errors->has('mobile'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('mobile') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="text-center"><button class="btn btn-primary" type="submit" onclick="submitmobilenumber()">Update Mobile Number
                                        </button></div>														
                                    </div>
                               <!-- </form> -->
                               
                            </div>
                        </div><!-- delete-account -->
                         @include('user.layout.rightsidebar')			
                    </div><!-- row -->
                </div>
            </div><!-- container -->
        </section><!-- delete-page -->
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

<!-- password show and hide -->
<style type="text/css">
    .field-icon {
      float: right;
      
      margin-top: -30px;
      margin-right: 5px;  
      position: relative;
      z-index: 2;
    }

</style>

@push('javaScript')
<script src="{{ URL::asset('/js/user/js/jquery.min.js')}}"></script>
<script src="{{ URL::asset('/js/user/js/jquery-ui.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAQsVSjofHfiWHWqai-0shuFexPke1-NEQ" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $(window).keydown(function(event){
        if(event.keyCode == 13) {
          event.preventDefault();
          return false;
        }
      });
    });
   function initialize() {
      var input = document.getElementById('searchTextField');
      var options = {
            types: ['establishment'],
            componentRestrictions: {
                country: 'in'
            } //this should work !
      };
      var autocomplete = new google.maps.places.Autocomplete(input, options);
      google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace(); 
            //https://developers.google.com/maps/documentation/javascript/reference/places-service#PlaceResult
            // alert(place.formatted_address);  
            
            $('input[name="latitude"]').val(place.geometry.location.lat());  // Lat Long
            $('input[name="longitude"]').val(place.geometry.location.lng());  // Lat Long
            

            var value = document.getElementById('searchTextField').value;
            
            

            var text_=$(this);
            var location = new RegExp('^[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]{3}');
            
                
            
            if(value.length < 15 || location.test(value) == false)
            {
                if($(input).parent().children(".error-li").length<1)
                {
                    $(input).parent().append('<li class="error-li"> It should have proper Location, City, State, Country.</li>');
                    $(input).css({"border": "1px solid #d75d54"});
                    from_error['searchTextField']="Invalid Donation Address";
                }
            }
            else {
                
                $(input).next(".error-li").remove();
                $(input).next().next(".error-li").remove();
                $(input).next().next().next(".error-li").remove();
                $(input).css({"border": "1px solid #00a651"});
            }

        });
   }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<script type="text/javascript">
    
    var from_error={};
    $(function(){
        $('input[name="user_name"]').on('keyup',function(){
            var text_=$(this);
            
            if(text_.val().length<3)
            {
                if($(this).parent().children(".error-li").length<1)
                {
                    text_.parent().append('<li class="error-li"> Invalid name. Only Alphabates allowed (minimum 3).</li>');
                    $(this).css({"border": "1px solid #d75d54"});
                    from_error['text']="Invalid name";
                }    
            }
            else {
                $(this).next(".error-li").remove();
                $(this).next().next(".error-li").remove();
                $(this).css({"border": "1px solid #00a651"});
            }
        });
        
        $('input[name="email"]').on('keyup',function(){
            var text_=$(this);
            var email = new RegExp('[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]');
            
            if(text_.val().length>0 && email.test(text_.val()) == false)
            {
                if($(this).parent().children(".error-li").length<1)
                {
                    text_.parent().append('<li class="error-li"> Invalid email.</li>');
                    $(this).css({"border": "1px solid #d75d54"});
                    from_error['text']="Invalid email id.";
                }    
            }
            else {
                $(this).next(".error-li").remove();
                $(this).next().next(".error-li").remove();
                $(this).css({"border": "1px solid #00a651"});
            }
        });
        
        $('input[name="city"]').bind('keyup change',function(){
            var text_=$(this);
            var location = new RegExp('^[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]{3}');
            
            if(text_.val().length>0 && (text_.val().length<15 || location.test(text_.val()) == false))
            {
                
                if($(this).parent().children(".error-li").length<1)
                {
                    text_.parent().append('<li class="error-li"> It 132should have proper Location, City, State, Country.</li>');
                    $(this).css({"border": "1px solid #d75d54"});
                    from_error['text']="Invalid address";
                }
            }
            else {
                $(this).next(".error-li").remove();
                $(this).next().next(".error-li").remove();
                $(this).next().next().next(".error-li").remove();
                $(this).css({"border": "1px solid #00a651"});
            }
        });
        $('input[name="mobile"]').on('keyup',function(){
            var text_=$(this);
            
            if(text_.val().length>0 && text_.val().length!==10)
            {
                if($(this).parent().children(".error-li").length<1)
                {
                    text_.parent().append('<li class="error-li"> Invalid Number. Enter 10 digits mobile number.</li>');
                    $(this).css({"border": "1px solid #d75d54"});
                    from_error['text']="Invalid contact number.";
                }
            }
            else {
                $(this).next(".error-li").remove();
                $(this).next().next(".error-li").remove();
                $(this).css({"border": "1px solid #00a651"});
            }
        });
        $("input[name='new_password']").on('keyup',function(){
            var text_=$(this);
            
            if(text_.val().length>0 && text_.val().length!==4)
            {
                if($(this).parent().children(".error-li").length<1)
                {
                    text_.parent().append('<li class="error-li"> PIN must have 4 digits.</li>');
                    $(this).css({"border": "1px solid #d75d54"});
                    from_error['text']="Invalid Password";
                }
            }
            else {
                $(this).next(".error-li").remove();
                $(this).next().next(".error-li").remove();
                $(this).css({"border": "1px solid #00a651"});
            }
        });
        $("input[name='new_password_confirmation']").on('keyup',function(){
            var text_=$(this);
            
            if(text_.val()!=$("input[name='new_password']").val())
            {
                if($(this).parent().children(".error-li").length<1)
                {
                    text_.parent().append('<li class="error-li"> PIN not matched.</li>');
                    $(this).css({"border": "1px solid #d75d54"});
                    from_error['text']="Password missmatch";
                }
            }
            else {
                $(this).next(".error-li").remove();
                $(this).next().next(".error-li").remove();
                $(this).css({"border": "1px solid #00a651"});
            }
        });
        

    });
</script>

<script>

function submitmobilenumber(){
    $('.mobile-num-div').css({ 'display' : 'none'});
    $('.otp_div').css({ 'display' : 'block'});
    var mobile = $('.mobile-number').val();
     $.ajax({
        type: 'POST',
        url: "{{ route('user.change.contact')}}", // the url where we want to POST
        data: {mobile: mobile},
        success: function(data){
            
        }
    });
}

function submitotp(){
     $('.mobile-num-div').css({ 'display' : 'block'});
    $('.otp_div').css({ 'display' : 'none'});
    var otp = $('.otp').val();
     $.ajax({
        type: 'POST',
        url: "{{ route('user.change.submitOtp')}}", // the url where we want to POST
        data: {otp: otp},
        success: function(data){
            window.location.reload();
        }
    });
}

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