
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>@section('title')</title>
  <!-- Bootstrap core CSS-->
  <link href="{{ URL::asset('/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="{{ URL::asset('/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="{{ URL::asset('/css/admin/css/sb-admin.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('/css/admin/css/admin.css')}}" rel="stylesheet">
  
  <!--favicon-->
  <link rel="icon" href="{{ URL::asset('/uploads/images/favicon.png')}}" type="image/gif" sizes="16x16">
        <!--/favicon-->
</head>

 @yield('content')
<!-- Bootstrap core JavaScript-->
<script src="{{ URL::asset('/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ URL::asset('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Core plugin JavaScript-->
<script src="{{ URL::asset('/vendor/jquery-easing/jquery.easing.min.js')}}"></script>


</html>
