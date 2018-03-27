<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Theme Region">
        <meta name="description" content="">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/icofont.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/owl.carousel.css')}}">  
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/slidr.css')}}">     
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/main.css')}}">  
        <link id="preset" rel="stylesheet" href="{{ URL::asset('/css/user/css/presets/preset1.css')}}">	
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/responsive.css')}}">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
        <link href="{{ URL::asset('/css/user/css/jquery.ui.autocomplete.css')}}" rel="stylesheet">
        <!-- font -->
        <!-- <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,500,700,300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Signika+Negative:400,300,600,700' rel='stylesheet' type='text/css'> -->

        <!--favicon-->
        <link rel="icon" href="{{ URL::asset('/uploads/images/favicon.png')}}" type="image/gif" sizes="16x16">
        <!--/favicon-->
        
        <style>
      
        </style>
    </head>
    <body>
    <section id="main" class="clearfix published-page">
            <div class="container">
                <div class="row text-center">				
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="congratulations">
                            <h2>OTP</h2>
                            <h4>{{ $user->otp }}</h4>
                        </div><br><br>
                    </div>
                </div><!-- row -->	
            </div><!-- container -->
        </section><!-- main -->
        
        <script src="{{ URL::asset('/js/user/js/jquery.min.js')}}"></script>
        <script src="{{ URL::asset('/js/user/js/bootstrap.min.js')}}"></script>
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="{{ URL::asset('/js/user/js/gmaps.min.js')}}"></script>
        <script src="{{ URL::asset('/js/user/js/goMap.js')}}"></script>
        <script src="{{ URL::asset('/js/user/js/map.js')}}"></script>
        <script src="{{ URL::asset('/js/user/js/owl.carousel.min.js')}}"></script>
        <script src="{{ URL::asset('/js/user/js/scrollup.min.js')}}"></script>
        <script src="{{ URL::asset('/js/user/js/price-range.js')}}"></script>    
        <script src="{{ URL::asset('/js/user/js/custom.js')}}"></script>
       <script src="{{ URL::asset('/js/user/js/switcher.js')}}"></script>
        @stack('javaScript')
        
    </body>
</html>