<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Doncen is the next generation Donation Center which is running online on www.doncen.org i.e. world's largest donation portal. Here you may donate anything, whatever you can think at any time any where world wide. You may become a Donor , Helper of Donor , Donee , Helper of Donee. You can give or take anything as donation which might be other than money like related to Hospital , Food ,  Cloth Accessory , Residence , Education , Litrature , Toys Sports , FMCG , Agriculture , Service Time , Tours Traveling , Helpline and many more... Indore, Madhya Pradesh MP 452001 India Asia.">
        <meta name="keywords" content="Doncen is the next generation Donation Center which is running online on www.doncen.org i.e. world's largest donation portal. Here you may donate anything, whatever you can think at any time any where world wide. You may become a Donor , Helper of Donor , Donee , Helper of Donee. You can give or take anything as donation which might be other than money like related to Hospital , Food ,  Cloth Accessory , Residence , Education , Litrature , Toys Sports , FMCG , Agriculture , Service Time , Tours Traveling , Helpline and many more... Indore, Madhya Pradesh MP 452001 India Asia.">
        <meta name="author" content="Doncen Indore Madhya Pradesh India">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/icofont.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/owl.carousel.css')}}">  
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/slidr.css')}}">     
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/main.css')}}">  
        <link id="preset" rel="stylesheet" href="{{ URL::asset('/css/user/css/presets/preset1.css')}}">	
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/responsive.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/datepicker.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/select2.css')}}">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
        <link href="{{ URL::asset('/css/user/css/jquery.ui.autocomplete.css')}}" rel="stylesheet">
        <!-- font -->
        <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,500,700,300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Signika+Negative:400,300,600,700' rel='stylesheet' type='text/css'>


        <!--favicon-->
        <link rel="icon" href="{{ URL::asset('/uploads/images/favicon.png')}}" type="image/png" sizes="16x16">
        <!--/favicon-->
        
        <style>
      
        </style>
    </head>
    <body>
    @include('user.layout.header')
       @yield('content')
    @include('user.layout.footer')
        <!-- JS -->
        <script src="{{ URL::asset('/js/user/js/jquery.min.js')}}"></script>
        <script src="{{ URL::asset('/js/user/js/bootstrap.min.js')}}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAQsVSjofHfiWHWqai-0shuFexPke1-NEQ" type="text/javascript"></script>
        <script src="{{ URL::asset('/js/user/js/gmaps.min.js')}}"></script>
        <script src="{{ URL::asset('/js/user/js/map.js')}}"></script>
        <script src="{{ URL::asset('/js/user/js/owl.carousel.min.js')}}"></script>
        <script src="{{ URL::asset('/js/user/js/scrollup.min.js')}}"></script>
        <script src="{{ URL::asset('/js/user/js/price-range.js')}}"></script>    
        <!-- <script src="{{ URL::asset('/js/user/js/custom.js')}}"></script> -->
       <script src="{{ URL::asset('/js/user/js/switcher.js')}}"></script>
       <script src="{{ URL::asset('/js/user/js/select2.js')}}"></script>
       <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116748240-1"></script>
        <script src="{{URL::asset('/js/user/js/bootstrap-datepicker.js')}}"></script>
        <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-116748240-1');
        </script>
        @stack('javaScript')
        
    </body>
</html>