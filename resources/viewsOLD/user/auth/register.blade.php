@extends('user.layout.master')
@section('title','Registration')

@section('content')
<section id="main" class="clearfix user-page register-form">
            <div class="container">
                <div class="row text-center">
                    <!-- user-login -->			
                    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                        <div class="user-account">
                                @if (Session::has('error'))
                                      <div class="alert alert-danger">{{ Session::get('error') }}</div>
                                @endif
                                @if (Session::has('success'))
                                   <div class="alert alert-success">{{ Session::get('success') }}</div>
                                @endif
                            <h2>Create  Account</h2>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/register') }}">
                                 {{ csrf_field() }}
                                <div class="row form-group">
                                    <label class="col-sm-3 label-title">Status<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="radio" name="user_status" checked="" value="0" id="individual">&nbsp;&nbsp;
                                        <label for="individual">Individual</label>&nbsp;&nbsp;
                                        <input type="radio" name="user_status" value="1" id="dealer">&nbsp;&nbsp; 
                                        <label for="dealer">Organization</label>&nbsp;&nbsp;
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" >
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <!-- <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Id">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div> -->
                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                    <input type="text" id="searchTextField" class="form-control" name="address" value="{{ old('address') }}" placeholder="Address">
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                                    <input type="text" class="form-control" name="contact" value="{{ old('contact') }}" placeholder="Mobile Number" >
                                    @if ($errors->has('contact'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('contact') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <input type="hidden" name="lat" id="lat" />
                                <input type="hidden" name="long" id="long" />
                                <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input type="password" class="form-control password_ins" name="password" placeholder="PIN">
                                    <label class="eye-icon" for="textbox">
                                    <img class="eye-open" src="https://i.stack.imgur.com/Oyk1g.png" />
                                    <img class="eye-close" src="https://i.stack.imgur.com/waw4z.png" />
                                  </label>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm PIN">
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div> 
                                     By cliking registration, you agree to our Terms and Conditions.
                                <div class="checkbox ">
                                </div><!-- checkbox -->	
                                <button type="submit" class="btn">Registration</button>
                            </form>
                            <!-- checkbox -->

                        </div>
                    </div><!-- user-login -->			
                </div><!-- row -->	
            </div><!-- container -->
        </section><!-- signup-page -->
@endsection
@push('javaScript')
<script type="text/javascript">
   function initialize() {
      var input = document.getElementById('searchTextField');
      var options = {
        types: ['geocode'] //this should work !
      };
      var autocomplete = new google.maps.places.Autocomplete(input, options);
   }
   google.maps.event.addDomListener(window, 'load', initialize);
   $('.eye-icon').on('click', function() {   
            var input = $(".password_ins");
            if (input.attr("type") === "password") {
                input.attr("type", "text");
                $('.eye-open').css("display",'none');
                $('.eye-close').css("display",'block');
            } else {
                input.attr("type", "password");
                $('.eye-close').css("display",'none');
                $('.eye-open').css("display",'block');
            }
        });
</script>
@endpush