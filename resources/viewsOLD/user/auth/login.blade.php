@extends('user.layout.master')
@section('title','Login')
@section('content')
<section id="main" class="clearfix user-page">
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
                            <h2>Login</h2>
                            <!-- form -->
                            <form class="form-horizontal" role="form" method="POST" action="{{route('user.login.pinForm')}}">
                                  {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                                    <input type="text" class="form-control" name="contact" value="{{ old('contact') }}" placeholder="Mobile No." autofocus >
                                    @if ($errors->has('contact'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('contact') }}</strong>
                                        </span>
                                    @endif
                                </div>
                               <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="PIN" >
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div> 
								<div class="user-option">
                                    
                                   
                                <!-- forgot-password -->
                                <!-- <div class="user-option">
                                    <div class="checkbox">
                                        <span for="logged"><input type="checkbox" name="remeber" id="logged"> Keep me logged in </span>
                                    </div>
                                    <div class="pull-right forgot-password">
                                        <a class="btn-link" href="{{ url('/user/password/reset') }}">
                                            Forgot Your Password?
                                        </a>
                                    </div>
                                </div>forgot-password -->
                                <button type="submit" class="btn">
                                    Login
                                </button>
								
								 <div class=" forgot-password">
                                       <br /> <a class="btn-link" href="{{ url('/user/login-via-otp') }}">
                                            Login Via OTP
                                        </a>
                                    </div>
                            </form><!-- form -->

                            
                        </div>
                        <a href="{{ url('/user/register') }}" class="btn-primary">Create a New Account</a>
                    </div><!-- user-login -->			
                </div><!-- row -->	
            </div><!-- container -->
        </section><!-- signin-page -->

@endsection
