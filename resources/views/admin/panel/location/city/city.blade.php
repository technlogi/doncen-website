@extends('admin.layout.master')
@section('title','City')
@section('content')
<div class="content-wrapper">
        <div class="container-fluid">
        <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                <a href="{{ url('/admin/home') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Location</li>
                <li class="breadcrumb-item active">City</li>
            </ol>
            <!-- end Breadcrumbs-->
            <!-- Example DataTables Card-->
            <div class="card mb-3">
                <div class="card-header">
                <i class="fa fa-table"></i> City List
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
@endsection
 @push('javaScript')
  <script>
    $(document).ready(function () {
        $('#categoryDataTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                     "url": "{{ route('admin.Location.city.cities') }}",
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
    });
</script>
@endpush