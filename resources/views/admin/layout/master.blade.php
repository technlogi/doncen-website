<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>@yield('title')</title>
  <!-- Bootstrap core CSS-->
  <link href="{{ URL::asset('/css/admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <!-- Custom fonts for this template-->
  <link href="{{ URL::asset('/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="{{ URL::asset('/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css">

  
  <!-- Custom styles for this template-->
  <link href="{{ URL::asset('/css/admin/css/sb-admin.css')}}" rel="stylesheet" type="text/css">
  <link href="{{ URL::asset('/css/admin/css/admin.css')}}" rel="stylesheet" type="text/css">
  

  <link rel="icon" href="{{ URL::asset('/uploads/images/favicon.png')}}" type="image/gif" sizes="16x16">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  
    @include('admin.layout.navbar')
        @yield('content')
    @include('admin.layout.footer')
    <!-- Bootstrap core JavaScript-->
    <script src="{{ URL::asset('/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ URL::asset('/js/admin/js/jquery.validate.min.js')}}"></script>
    
    <script src="{{ URL::asset('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ URL::asset('/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Page level plugin JavaScript-->
    <script src="{{ URL::asset('/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{ URL::asset('/vendor/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{ URL::asset('/vendor/datatables/dataTables.bootstrap4.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ URL::asset('/js/admin/js/sb-admin.min.js')}}"></script>
    
    <!-- Custom scripts for this page-->
    <script src="{{ URL::asset('/js/admin/js/sb-admin-datatables.min.js')}}"></script>
    <script src="{{ URL::asset('/js/admin/js/datatables.min.js')}}"></script>
    
    <script src="{{ URL::asset('/js/admin/js/sb-admin-charts.min.js')}}"></script>
    @stack('javaScript')
  
</body>
</html>
