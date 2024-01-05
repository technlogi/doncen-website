@extends('admin.layout.master')
@section('title','Reports')
@section('content')
<div class="content-wrapper">
        <div class="container-fluid">
        <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                <a href="{{ url('/admin/home') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Report</li>
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
                <i class="fa fa-table"></i> Report List
                <div class="pull-right">
                 </div>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                        <table class="table table-bordered" id="reportDataTable" width="100%" cellspacing="0">
                            <thead>
                                <th>Sr.No</th>
                                <th>Report Subject</th>
                                <th>Report Message</th>
                                <th>Status</th>
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
        $('#reportDataTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                     "url": "{{ route('admin.report.lists') }}",
                     "dataType": "json",
                     "type": "POST",
                     "data":{ _token: "{{csrf_token()}}"}
                   },
            "columns": [
                { "data": "id" },
                { "data": "report_subject" },
                { "data": "report" },
                { "data": "status" },
                { "data": "created_at" },
                { "data": "options" }
            ]	 

        });
    });
</script>
@endpush