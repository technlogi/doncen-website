@extends('user.layout.master')

@section('content')
   <!-- main -->
   <section id="main" class="clearfix published-page">
            <div class="container">
                <div class="row text-center">				
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="congratulations">
                            <i class="fa fa-check-square-o"></i>
                            <h2>Congratulations!</h2>
                            <h4>Your have been registered successfully !!!.</h4>
                        </div><br><br>
                        <a href="{{ url('/user/login') }}"> <button class="btn btn-primary">Go To Login</button></a>
                    </div>
                </div><!-- row -->	
            </div><!-- container -->
        </section><!-- main -->
@endsection