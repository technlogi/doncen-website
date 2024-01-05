<!DOCTYPE html>
<html lang="en">
 
    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">



        <?php
            $currentURL = URL::current();

            // print_r(strpos($currentURL, 'donation-post-detail'));
            // die();
            
            if (strpos($currentURL, 'donation-post-detail') > 0) {
                
                // $basic_url = strstr($currentURL, '.org/', true);


                $basic_url = URL::to('/');

                $image_folder = '/images/uploads/donation_post/';
                
                $full_image_url = $basic_url.$image_folder;


                if(!empty($donation_images_main->image))
                {
                  $donation_post_img = $full_image_url.$donation_images_main->image;
                }  
                else
                {
                  $donation_post_img = 'https://www.doncen.org/doncen-logo.jpg';
                }


                $dontaion_post->address;
                // $location =  $city->name.', '.$state->name.', '.$country->name;

                // $donation = $spectification->name.' '.$subcategory->name;

                $donation = $category->name;    
                                        
                    if(strpos($user_type->name, 'Donor') !== false)
                    {
                        $position = 'available';
                    }
                    elseif(strpos($user_type->name, 'Donee') !== false)
                    {
                        $position = 'required';
                    }
                    else
                    {
                        $position = '';
                    }

                    // $heading = $donation.' '.$dontaion_post->title.' '.$position;
                    $heading = $dontaion_post->title;

                    $location = $spectification->name.' '.$subcategory->name.' in '.$city->name;                    



              $show =  '<meta property="og:type"          content="website" />
                
                <meta property="og:image"         content="'.$donation_post_img.'" />
                <meta property="og:title"         content="'.$heading.'" />
                <meta property="og:description"   content="'.$location.'" />
                <meta property="og:url"           content="'.$currentURL.'" />
                <meta property="fb:app_id" content="XXXXXXXXXXXXXXX" />

                <meta name="twitter:card" content="summary">
                <meta name="twitter:image" content="'.$donation_post_img.'">
                <meta name="twitter:title" content="'.$heading.'">
                <meta name="twitter:description" content="'.$location.'">
                <meta name="twitter:url" content="'.$currentURL.'">

                <!-- For Google -->
                <meta name="author" content="Gaurav Parwal" />
                <meta name="application-name" content="Doncen" />
                <meta name="copyright" content="www.doncen.org" />
                <meta name="title" content="Donate anything, whatever you can think." />
                <meta name="description" content="Doncen is the next generation Donation Center which is running online on www.doncen.org i.e. largest donation portal. Here you may donate anything, whatever you can think at any time any where world wide. You may become a Donor , Helper of Donor , Donee , Helper of Donee. You can give or take anything as donation which might be more than money like related to Hospital , Food ,  Cloth Accessory , Residence , Education , Litrature , Toys Sports , FMCG , Agriculture , Service Time , Tours Traveling , Helpline and many more...">
                <meta name="keywords" content="Doncen is the next generation Donation Center which is running online on www.doncen.org i.e. largest donation portal. Here you may donate anything, whatever you can think at any time any where world wide. You may become a Donor , Helper of Donor , Donee , Helper of Donee. You can give or take anything as donation which might be more than money like related to Hospital , Food ,  Cloth Accessory , Residence , Education , Litrature , Toys Sports , FMCG , Agriculture , Service Time , Tours Traveling , Helpline and many more...">

                <title>'.$heading.' at '.$location.'</title>

                ' ;
            }
            else
            {
              $show =  '<meta property="og:type"          content="website" />
                <meta property="og:image"         content="https://www.doncen.org/doncen-logo.jpg" />
                <meta property="og:title"         content="DONCEN" />
                <meta property="og:description"   content="Donate anything, whatever you can think." />
                <meta property="og:url"           content="https://www.doncen.org" />
                <meta property="fb:app_id" content="XXXXXXXXXXXXXXX" />

                <meta name="twitter:card" content="summary">
                <meta name="twitter:image" content="https://www.doncen.org/doncen-logo.jpg">
                <meta name="twitter:title" content="DONCEN">
                <meta name="twitter:description" content="Donate anything, whatever you can think.">
                <meta name="twitter:url" content="https://www.doncen.org">

                <!-- For Google -->
                <meta name="author" content="Gaurav Parwal" />
                <meta name="application-name" content="Doncen" />
                <meta name="copyright" content="www.doncen.org" />
                <meta name="title" content="Donate anything, whatever you can think." />
                <meta name="description" content="Doncen is the next generation Donation Center which is running online on www.doncen.org i.e. largest donation portal. Here you may donate anything, whatever you can think at any time any where world wide. You may become a Donor , Helper of Donor , Donee , Helper of Donee. You can give or take anything as donation which might be more than money like related to Hospital , Food ,  Cloth Accessory , Residence , Education , Litrature , Toys Sports , FMCG , Agriculture , Service Time , Tours Traveling , Helpline and many more...">
                <meta name="keywords" content="Doncen is the next generation Donation Center which is running online on www.doncen.org i.e. largest donation portal. Here you may donate anything, whatever you can think at any time any where world wide. You may become a Donor , Helper of Donor , Donee , Helper of Donee. You can give or take anything as donation which might be more than money like related to Hospital , Food ,  Cloth Accessory , Residence , Education , Litrature , Toys Sports , FMCG , Agriculture , Service Time , Tours Traveling , Helpline and many more...">

                <title>Doncen | Donation Center near me</title>

                ' ;
            }

            echo $show;
        ?>
        
        
        <!-- <title>@yield('title')</title> -->

        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="Doncen">
        <meta name="msapplication-TileImage" content="{{ URL::asset('/uploads/images/favicon.png')}}">
        
        <link rel="apple-touch-icon" href="{{ URL::asset('/uploads/images/favicon.png')}}">
        


        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/bootstrap-datetimepicker.min.css')}}">

        
        <!-- <link rel="stylesheet" href="{{ URL::asset('/css/user/css/owl.carousel.css')}}">   -->
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/slidr.css')}}">

        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/presets/preset1.css')}}">     

        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/main.css')}}">  
        
        
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/responsive.css')}}">
        
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/font-awesome.min.css')}}">

        
        <!-- <link rel="stylesheet" href="{{ URL::asset('/css/user/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/slidr.css')}}"> -->



        <!-- font -->
        <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,500,700,300' rel='stylesheet' type='text/css'>
        

        <!--favicon-->
        <link rel="icon" href="{{ URL::asset('/uploads/images/favicon.png')}}" type="image/png" sizes="16x16">
        <!--/favicon-->
        
        <link rel="manifest" href="manifest.webmanifest">
        <!-- <link rel="manifest" href="manifest.json"> -->
        
    </head>
    <body>
    @include('user.layout.header')
       @yield('content')
    @include('user.layout.footer')

    <div>
        
        <button class="add-button" style="margin: auto; position: fixed; bottom: 0px;  padding: 20px; width: 100%; background: #0072bc; color: #ffffff; border: 0px;"></span> Doncen Add to home screen</button>
    </div>

    
      <span id="enableNotifications"></span>
      
      <!-- <div>
        <div id="token"></div>
        <div id="err"></div>
      </div> -->
    


        <!-- JS -->
        <script src="{{ URL::asset('/js/user/js/jquery.min.js')}}"></script>
        <script src="{{ URL::asset('/js/user/js/bootstrap.min.js')}}"></script>
        
        

        <!-- <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAQsVSjofHfiWHWqai-0shuFexPke1-NEQ" type="text/javascript"></script> -->
        
        <!-- <script src="{{ URL::asset('/js/user/js/owl.carousel.min.js')}}"></script>
        <script src="{{ URL::asset('/js/user/js/scrollup.min.js')}}"></script>
        <script src="{{ URL::asset('/js/user/js/smoothscroll.min.js')}}"></script>
        <script src="{{ URL::asset('/js/user/js/custom.js')}}"></script> -->
       
       
      
       <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116748240-1"></script>
        


        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-116748240-1');
        </script>


        <script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-messaging.js"></script>
        
        <script src="{{ URL::asset('pwa.js')}}"></script>
        


<!-- Location permission -->
        <script type="text/javascript">
            

            if(navigator.geolocation) 
            {
                navigator.geolocation.getCurrentPosition(function(position) {
                var positionInfo = "Your current position is (" + "Latitude: " + position.coords.latitude + ", " + "Longitude: " + position.coords.longitude + ")";
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;

                
                document.cookie = "lt=" + latitude;
                document.cookie = "lg=" + longitude;

                
                });

            }
                
            else 
            {
                alert("Sorry, your browser does not support HTML5 geolocation.");
            }


            



        </script>

        
    
<script type="text/javascript">
    $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
    $(".toggle-password1").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

</script>
        <script type="text/javascript">
            // window.oncontextmenu = function () {
            //     return false;
            // }
            // $(document).keydown(function (event) {
            //     if (event.keyCode == 123) {
            //         return false;
            //     }
            //     else if (
            //                 (event.ctrlKey && event.shiftKey && event.keyCode == 73) || 
            //                 (event.ctrlKey && event.shiftKey && event.keyCode == 74) ||
            //                 (event.ctrlKey && event.keyCode == 85)
            //              ) 
            //             {
            //                 return false;
            //             }
            // });
        </script>
          <script> 
    function isnumber(evt) { 
          
        // Only ASCII charactar in that range allowed 
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
            return false; 
        return true; 
    } 
</script> 

        @stack('javaScript')
        
    </body>
</html>

