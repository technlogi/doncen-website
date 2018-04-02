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
                            <h2>Reset Password</h2>
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('user.resetpassword.resetpassword',$user_identity) }}">
                                {{ csrf_field() }}

                                <input type="hidden" name="key" value="{{ $user_identity }}">

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="control-label pull-left">New Password</label>

                                    <div class="">
                                        <input id="password" type="password" class="form-control" name="password">

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label for="password-confirm" class="control-label pull-left">Confirm Password</label>
                                    <div class="">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Reset Password
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <a href="{{ url('/user/login') }}" class="btn-primary">Back To Login</a>
                    </div><!-- user-login -->			
                </div><!-- row -->	
            </div><!-- container -->
        </section><!-- signin-page -->
@endsection
