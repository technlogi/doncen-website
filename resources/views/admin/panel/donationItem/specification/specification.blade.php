@extends('admin.layout.master')
@section('title','Category')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
        <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                <a href="{{ url('/admin/home') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Donation Item</li>
                <li class="breadcrumb-item active">Specification</li>
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
                <i class="fa fa-table"></i> Specification List
                <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#addSpecificationModel">
                        <i class="fa fa-plus"></i>Create New Specification</a>
                    </a>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                        <table class="table table-bordered" id="specificationDataTable" width="100%" cellspacing="0">
                            <thead>
                                <th>Sr.No</th>
                                <!-- <th>Image</th> -->
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
    @include('admin.panel.donationItem.specification.create')
 @endsection
 @push('javaScript')
  <script>
    $(document).ready(function () {
        $('#specificationDataTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                     "url": "{{ route('admin.donationItem.specification.specifications') }}",
                     "dataType": "json",
                     "type": "POST",
                     "data":{ _token: "{{csrf_token()}}"}
                   },
            "columns": [
                { "data": "id" },
                // { "data": "image" },
                { "data": "name" },
                { "data": "created_at" },
                { "data": "options" }
            ]	 

        });
        $("form[name='addSpecificationForm']").validate({
            rules: {
                name: "required",
                id: "required",
                type: "required"
            },  
            messages: {
                name: "Please enter name of Specification.",
                id: "Please select category type.",
                type: "Please enter type of category."
            },
            submitHandler: function(form) {
                    var datastring = $("#addSpecificationFormId").serialize();
                    $.ajax({
                        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                        url         : "{{ URL::route('admin.donationItem.specification.create')}}", // the url where we want to POST
                        data        : datastring, // our data object
                        encode          : true,
                        success: function(data){
                            $('#addSpecificationModel').modal('hide');
                            $("#addSpecificationFormId").trigger("reset"); 
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