
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">

    <a class="navbar-brand" href="{{ url('/admin/home') }}">ADMIN</a>

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">


      <span class="navbar-toggler-icon"></span>

    </button>

    @include('admin.layout.sidebar')

  </nav>
    <!-- header -->
  <header id="header1" class="clearfix" style="position: fixed; z-index: 99;  width: 100%; box-shadow: 0px 1px 8px #ccc;">
            
        </header><!-- header -->
        <script type="text/javascript">
            

            if(navigator.geolocation) 
            {
                navigator.geolocation.getCurrentPosition(function(position) {
                var positionInfo = "Your current position is (" + "Latitude: " + position.coords.latitude + ", " + "Longitude: " + position.coords.longitude + ")";
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;

                // document.cookie = "profile_viewer_uid=1";
              
                // document.cookie = "latitude=" + latitude;
                document.cookie = "latitude=" + latitude;
                document.cookie = "longitude=" + longitude;

                
                });

            }
                
            else 
            {
                alert("Sorry, your browser does not support HTML5 geolocation.");
            }
              

// var jvalue = 'this is javascript value';


        </script>