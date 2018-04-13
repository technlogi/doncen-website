@extends('admin.layout.master')
@section('title','Country')
@section('content')
<div class="content-wrapper">
        <div class="container-fluid">
        <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                <a href="{{ url('/admin/home') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Location</li>
                <li class="breadcrumb-item active">Country</li>
            </ol>
            <!-- end Breadcrumbs-->
            <!-- Example DataTables Card-->
            @if (Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
            @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            <div class="card mb-3">
                <div class="card-header">
                <i class="fa fa-table"></i> Country List
                <div class="pull-right">
                    <a class="btn btn-primary" data-toggle="modal" data-target="#addCountryModel">
                        <i class="fa fa-plus"></i>Add New Country</a>
                    </a>
                 </div>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                        <table class="table table-bordered" id="categoryDataTable" width="100%" cellspacing="0">
                            <thead>
                                <th>Sr.No</th>
                                <th>Name</th>
                                <th>Created At</th>
                                <th>Options</th>
                            </thead>
                        </table>
                </div>
                </div><!-- end card-body -->
            </div><!-- end card mb-3 -->
        </div>
    </div>
    @include('admin.panel.location.country.create')
@endsection
 @push('javaScript')
  <script>
    $(document).ready(function () {
        $('#categoryDataTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                     "url": "{{ route('admin.Location.country.countries') }}",
                     "dataType": "json",
                     "type": "POST",
                     "data":{ _token: "{{csrf_token()}}"}
                   },
            "columns": [
                { "data": "id" },
                { "data": "name" },
                { "data": "created_at" },
                { "data": "options" }
            ]	 

        });
        $("form[name='addCountryForm']").validate({
            rules: {
                name: "required",
                country_code: "required",
            },  
            messages: {
                name: "Please enter name.",
                country_code: "Please enter country code.",
            },
            submitHandler: function(form) {
                    var datastring = $("#addCountryFormId").serialize();
                    $.ajax({
                        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                        url         : "{{ URL::route('admin.Location.country.create')}}", // the url where we want to POST
                        data        : datastring, // our data object
                        encode          : true,
                        success: function(data){
                            $('#addCountryModel').modal('hide');
                            $("#addCountryFormId").trigger("reset");
                            $('#messageSuccess').removeClass('fade');  
                            setTimeout(() => {
                                $('#messageSuccess').addClass('fade');  
                            }, 2500);
                        }
                    });
            }
        });
    });
</script>
@endpush