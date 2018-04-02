@extends('user.layout.master')
@section('title','OTP Verification')
<!-- Main Content -->
@section('content')
<section id="main" class="clearfix user-page">
            <div class="container">
                <div class="row text-center">
                    <!-- user-login -->			
                    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                        <div class="user-account">
                                @if (Session::has('error'))
                                    <div class="alert alert-danger">
                                         {{ Session::get('error') }}
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            <h2>Verification</h2>
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('user.resetpassword.cheakOtp',$user_identity) }}">
                                {{ csrf_field() }}
                                <div>
                                <div class="form-group{{ $errors->has('otp') ? ' has-error' : '' }}">
                                    <label for="otp" class="control-label pull-left">OTP :-</label><br>

                                    <div class="">
                                        <input id="key" type="hidden" name="key" value="{{$user_identity}}">
                                        <input id="otp" type="password" class="form-control" name="otp" value="{{ old('otp') }}">
                                        @if ($errors->has('otp'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('otp') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="align-item-center">
                                        <button type="submit" class="btn btn-primary">
                                        Verify
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- user-login -->			
                    <a href="{{ url('/user/login') }}" class="btn-primary">Back To Login</a>
                </div><!-- row -->	
            </div><!-- container -->
        </section><!-- signin-page -->
@endsection
