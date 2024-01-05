<html>
<head>
<title>test</title>

<script type="text/javascript"> 
function display_c(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('display_ct()',refresh)
}
function display_ct() {
var x = new Date()
x1 = x.getHours( )+ ":" +  x.getMinutes() + ":" +  x.getSeconds();
document.getElementById('ct').innerHTML = x1;
display_c();
 }
</script>
</head>

<body onload=display_ct();>
<span id='ct' ></span>

</body>
</html>