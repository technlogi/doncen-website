@extends('user.layout.master')
@section('title','Report Donation')
@section('content')<!-- main -->  <!-- main -->
        <section id="main" class="clearfix contact-us">
            <div class="container">

                <!-- breadcrumb -->
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li>Report</li>
                </ol><!-- breadcrumb -->						
                <h2 class="title">Report</h2>
                    @if (Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif
                    @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                <div class="corporate-info">
                    <div class="row">
                        <!-- feedback -->
                        <div class="col-sm-12">
                            <div class="feedback">
                                <div class="form-group">
                                    <a href="{{ route('search.donation.details',$user_identity) }}"><button  class="btn pull-right">Back to donation</button></a>
                                </div>
                                <h2>Report of Donation</h2>
                                <form id="contact-form" class="contact-form" name="contact-form" method="post" action="{{ route('web.donation.storereprot',$user_identity)}}">
                                    <div class="row">
                                        {{csrf_field()}}
                                        <input type="hidden" name="key" value="{{$user_identity}}"/>
                                        <div class="col-sm-12">
                                            <div class="form-group{{ $errors->has('report') ? ' has-error' : '' }}">
                                                <textarea name="report" id="report" name="report" class="form-control" value="{{old('report')}}" rows="7" placeholder="Report message ?"></textarea>
                                                @if ($errors->has('report'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('report') }}</strong>
                                                </span>
                                            @endif
                                            </div>             
                                        </div>     
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn">Submit Your Report</button>
                                    </div>
                                </form>
                                
                            </div>				
                        </div><!-- feedback -->				
                    </div><!-- row -->
                </div>
            </div><!-- container -->
        </section><!-- main -->
        @endsection