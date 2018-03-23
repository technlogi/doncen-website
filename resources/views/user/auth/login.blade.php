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
                            <h2>Login</h2>
                            <!-- form -->
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/login') }}">
                                  {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Mobile Number" >
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" >
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <!-- forgot-password -->
                                <div class="user-option">
                                    <div class="checkbox pull-left">
                                        <label for="logged"><input type="checkbox" name="remeber" id="logged"> Keep me logged in </label>
                                    </div>
                                    <div class="pull-right forgot-password">
                                        <a class="btn-link" href="{{ url('/user/password/reset') }}">
                                            Forgot Your Password?
                                        </a>
                                    </div>
                                </div><!-- forgot-password -->
                                <button type="submit" class="btn">
                                    Login
                                </button>
                            </form><!-- form -->

                            
                        </div>
                        <a href="{{ url('/user/register') }}" class="btn-primary">Create a New Account</a>
                    </div><!-- user-login -->			
                </div><!-- row -->	
            </div><!-- container -->
        </section><!-- signin-page -->

@endsection
