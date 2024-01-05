@extends('admin.layout.master')
@section('title','Donation Detail')
@section('content')
<div class="content-wrapper">
        <div class="container-fluid">
        <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                <a href="{{ url('/admin/home') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Donations</li>
                <li class="breadcrumb-item active">Detail</li>
                <li class="breadcrumb-item active">  {{ $donation->post_no }}</li>
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
                <i class="fa fa-table"></i> Doantion Detail
                <div class="pull-right">
                  <a href="{{ route('admin.donations.donation') }}"><button class="btn btn-primary"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Back</button></a>
                 </div>
                </div>
                <div class="card-body">
                    <hr>
                     <strong>Donation No:- </strong> {{ $donation->post_no }}<br/>
                     <strong>   Title:-</strong> {{ $donation->title }}<br/>
                     <strong>   Description:-</strong> {{ $donation->description }}<br/>
                     <strong>   Donation address:-</strong> {{ $donation->address }}<br/>
                     <strong>   Donation No:-</strong> {{ $donation->post_no }}<br/>
                     <strong>   User Name:-</strong> {{$user_name}}<br/>
                     <strong>   Donation Category:-</strong> {{ $specification->name.', '.$specification->subcategory->name.', '.$specification->subcategory->category->name  }} <br/>
                     <strong>   User Type :-</strong> {{ $user_type->name }}<br/>
                     <strong>   Condition :-</strong> {{ $donation->condition ? 'New' : 'Old' }}<br/>
                     <strong>   Consideration :-</strong> {{ $donation->consideration ? 'Free' : $donation->consideration == 1 ? 'Monetroy' : 'Non-Monetory'  }}<br/>
                     <strong>   Consideration Detail :-</strong> {{ $donation->consideration_detail ? 'consideration_detail' : ''  }}<br/>
                     <strong>   Urgent :-</strong> {{ $donation->is_urgent ? 'Yes' : 'No' }}<br/>
                     <strong>   Urgent Reason :-</strong> {{ $donation->urgent_reason ? $donation->urgent_reason : '' }}<br/>
                     <hr>
                        <center> Donner/Donne Details</center>
                     <hr>
                     <strong>Status:- </strong> {{ $donation->d_status ? 'Individual' : 'Organization'   }}<br/>
                     <strong>Name:- </strong> {{ $donation->d_name }}<br/>
                     <strong>Email:- </strong> {{ $donation->d_email }}<br/>
                     <strong>Contact:- </strong> {{ $donation->d_contact }}<br/>
                     <strong>Address:- </strong> {{ $donation->d_address }}<br/>
                     
                     @if(!empty($donation->helper_address))
                     <hr>
                        <center>Helper Details</center>
                     <hr>
                     <strong>Status:- </strong> {{ $donation->helper_status ? 'Individual' : 'Organization'   }}<br/>
                     <strong>Name:- </strong> {{ $donation->helper_name }}<br/>
                     <strong>Email:- </strong> {{ $donation->helper_email }}<br/>
                     <strong>Contact:- </strong> {{ $donation->helper_contact }}<br/>
                     <strong>Address:- </strong> {{ $donation->helper_address }}<br/>
                     @endif
                    
                </div><!-- end card-body -->
            </div><!-- end card mb-3 -->
        </div>
    </div>

@endsection
 