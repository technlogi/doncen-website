@extends('admin.layout.master')
@section('title','Donations')
@section('content')
<div class="content-wrapper">
        <div class="container-fluid">
        <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                <a href="{{ url('/admin/home') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Donations</li>
                <li class="breadcrumb-item active">List</li>
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
                <i class="fa fa-table"></i> Doantion List
                <div class="pull-right">
                 </div>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                        <table class="table table-bordered" id="categoryDataTable" width="100%" cellspacing="0">
                            <thead>
                                <th>Sr.No</th>
                                <th>Created At</th>
                                <th>User</th>
                                <th>Category</th>
                                <th>Address</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Options</th>
                            </thead>
                        </table>
                </div>
                </div><!-- end card-body -->
            </div><!-- end card mb-3 -->
        </div>
    </div>

@endsection
 @push('javaScript')
  <script>
    $(document).ready(function () {
        $('#categoryDataTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                     "url": "{{ route('admin.donations.donations') }}",
                     "dataType": "json",
                     "type": "POST",
                     "data":{ _token: "{{csrf_token()}}"}
                   },
            "columns": [
                { "data": "id" },
                { "data": "created_at" },
                { "data": "user" },
                { "data": "category" },
                { "data": "address" },
                { "data": "title" },
                { "data": "description" },
                { "data": "status" },
                { "data": "options" }
            ]	 

        });
    });
</script>
@endpush