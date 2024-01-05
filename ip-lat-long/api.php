<!DOCTYPE html>
<html lang="en">
<head>
  <title>Geocode  Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</head>
<body>
<span>Your Latitude : </span><span id="lat"></span><br>
<span>Your Longitude : </span><span id="lng"></span><br>
<span>Your accuracy : </span><span id="accuracy"></span><br>
<span>Your cellId : </span><span id="cellId"></span><br>
<span>Your macAddress : </span><span id="macAddress"></span><br>
<span>Your homeMobileCountryCode : </span><span id="homeMobileCountryCode"></span><br>
<button id="btn">Click Here To Get Lat And Lng</button>
<script>
$(document).ready(function() {
    $('#btn').click(function(e) {
         
         var considerIp = false;
         $.ajax({
            		type : 'POST',
                dataType : 'JSON',
            		data: 'considerIp:considerIp', 
            		url: "https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyAQsVSjofHfiWHWqai-0shuFexPke1-NEQ", 
            		success: function(result){
                    // alert(result);
                    $('#lat').html(result['location']['lat']);
                    $('#lng').html(result['location']['lng']);
                    $('#accuracy').html(result['accuracy']);
                    $('#cellId').html(result['cellTowers']['cellId']);
                    $('#macAddress').html(result['macAddress']);
            				$('#homeMobileCountryCode').html(result['homeMobileCountryCode']);
            					
                		}});
            					
                });
            } );
</script>

</body>
</html>