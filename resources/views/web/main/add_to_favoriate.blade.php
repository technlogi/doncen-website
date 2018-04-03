@extends('user.layout.master')
@section('title','Add To Favoriate')
@section('content')<!-- main -->  <!-- main -->
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
                    <h2>Add To Faviorate</h2>
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('user.registration.otpSubmit') }}">
                        {{ csrf_field() }}
                        <div>
                        <div class="row">
                            <div class="align-item-center">
                                <button type="submit" class="btn btn-primary">
                                     Add to Favoriate
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