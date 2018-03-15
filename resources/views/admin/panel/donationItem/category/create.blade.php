@extends('admin.layout.master')
@section('title','Create Category')
@section('content')
<div class="content-wrapper">
        <div class="container-fluid">
        <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin/home') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Donation Item</li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.donationItem.category.category') }}">Category</a>
                </li>
                <li class="breadcrumb-item active">Create New Category</li>
            </ol>
            <!-- end Breadcrumbs-->
            <!-- Example DataTables Card-->
            <div class="card mb-3">
                <div class="card-header">
                <i class="fa fa-plus"></i> Create New  Category
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('admin.donationItem.category.category') }}">
                        <i class="fa fa-backward">  </i> Back </a>
                 </div>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.donationItem.category.create') }}">
                            {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label">Name</label>

                            <div class="">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="control-label">Title</label>

                            <div class="">
                                <input id="title" type="title" class="form-control" name="title">

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                    <a class="btn btn-link" href="{{ url('/admin/password/reset') }}">
                                        Forgot Your Password?
                                    </a>
                                </div>
                        </div>
            
                    </form>
                </div>
                </div><!-- end card-body -->
            </div><!-- end card mb-3 -->
        </div>
    </div>

 @endsection