<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Theme Region">
        <meta name="description" content="">
        <title>@section('title')</title>
        <!-- CSS -->
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/icofont.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/owl.carousel.css')}}">  
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/slidr.css')}}">     
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/main.css')}}">  
        <link id="preset" rel="stylesheet" href="{{ URL::asset('/css/user/css/presets/preset1.css')}}">	
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/responsive.css')}}">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

        <!-- font -->
        <!-- <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,500,700,300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Signika+Negative:400,300,600,700' rel='stylesheet' type='text/css'> -->

        <!--favicon-->
        <link rel="icon" href="{{ URL::asset('/uploads/images/favicon.png')}}" type="image/gif" sizes="16x16">
        <!--/favicon-->
    </head>
    <body>
    @include('user.layout.header')
       @yield('content')
    @include('user.layout.footer')
        <!-- JS -->
        <script src="{{ URL::asset('/js/user/js/jquery.min.js')}}"></script>
         <script src="{{ URL::asset('/js/user/js/modernizr.min.js')}}"></script>
        <script src="{{ URL::asset('/js/user/js/bootstrap.min.js')}}"></script>
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="{{ URL::asset('/js/user/js/gmaps.min.js')}}"></script>
        <script src="{{ URL::asset('/js/user/js/goMap.js')}}"></script>
        <script src="{{ URL::asset('/js/user/js/map.js')}}"></script>
        <script src="{{ URL::asset('/js/user/js/owl.carousel.min.js')}}"></script>
        <script src="{{ URL::asset('/js/user/js/smoothscroll.min.js')}}"></script>
        <script src="{{ URL::asset('/js/user/js/scrollup.min.js')}}"></script>
        <script src="{{ URL::asset('/js/user/js/price-range.js')}}"></script>    
        <script src="{{ URL::asset('/js/user/js/custom.js')}}"></script>
       <script src="{{ URL::asset('/js/user/js/switcher.js')}}"></script>
        @stack('javaScript')
        <script>
            // $(function (i, s, o, g, r, a, m) {
            //     i['GoogleAnalyticsObject'] = r;
            //     i[r] = i[r] || function () {
            //         (i[r].q = i[r].q || []).push(arguments)
            //     }, i[r].l = 1 * new Date();
            //     a = s.createElement(o),
            //             m = s.getElementsByTagName(o)[0];
            //     a.async = 1;
            //     a.src = g;
            //     m.parentNode.insertBefore(a, m)
            // })(window, document, 'script', '../../www.google-analytics.com/analytics.js', 'ga');

            // ga('create', 'UA-73239902-1', 'auto');
            // ga('send', 'pageview');

        </script>

    </body>
</html>