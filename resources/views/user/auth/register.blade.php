@extends('user.layout.master')
@section('title','Registration')

@section('content')
<section id="main" class="clearfix user-page">
            <div class="container">
                <div class="row text-center">
                    <!-- user-login -->			
                    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                        <div class="user-account">
                            <h2>Create  Account</h2>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/register') }}">
                                 {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" >
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Id">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('mobile_no') ? ' has-error' : '' }}">
                                    <input type="text" class="form-control" name="mobile_no" value="{{ old('mobile_no') }}" placeholder="Mobile Number">
                                    @if ($errors->has('mobile_no'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('mobile_no') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="checkbox">
                                    <label class="pull-left " for="signing"><input type="checkbox" name="signing" id="signing"> By signing up for an account you agree to our Terms and Conditions </label>
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
