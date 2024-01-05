@extends('user.layout.master')
@section('title','Reset Password')
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
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            <h2>Reset Password</h2>
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('user.resetpassword.cheakContact') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('mobile_no') ? ' has-error' : '' }}">
                            <label for="mobile_no" class="control-label pull-left">Mobile No :-</label><br>

                            <div class="">
                                <input id="mobile_no" type="number" class="form-control" name="mobile_no" value="{{ old('mobile_no') }}">
                                @if ($errors->has('mobile_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-7 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Next
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
