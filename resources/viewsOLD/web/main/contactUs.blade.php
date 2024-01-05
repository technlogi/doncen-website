@extends('user.layout.master')
@section('title','About Us')
@section('content')<!-- main -->  <!-- main -->
        <section id="main" class="clearfix contact-us">
            <div class="container">

                <!-- breadcrumb -->
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li>Contact</li>
                </ol><!-- breadcrumb -->						
                <h2 class="title">Contact Us</h2>
                @if (Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif
                @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                <div class="corporate-info">
                    <div class="row">
                        <!-- contact-info -->
                        <div class="col-sm-4">
                            <div class="contact-info">

                                <h2>Corporate Info</h2>
                                <address>
                                    <p><strong>adress: </strong>1234 Street Name, City Name, Country</p>
                                    <p><strong>Phone:</strong> <a href="#">(123) 456-7890</a></p>
                                    <p><strong>Email: </strong><a href="#">info@company.com</a></p>
                                </address>

                                <ul class="social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div><!-- contact-info -->

                        <!-- feedback -->
                        <div class="col-sm-8">
                            <div class="feedback">
                                <h2>Send Us Your Feedback</h2>
                                <form id="contact-form" class="contact-form" name="contact-form" method="post" action="{{ route('user.contact.us')}}">
                                    <div class="row">
                                        {{csrf_field()}}
                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                <input type="text" class="form-control" value="{{old('name')}}" name="name" placeholder="Name">
                                                @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Email Id">
                                                @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                                                <input type="text" class="form-control" name="subject"  value="{{old('subject')}}" placeholder="Subject">
                                                @if ($errors->has('subject'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('subject') }}</strong>
                                                </span>
                                            @endif
                                            </div> 
                                        </div> 

                                        <div class="col-sm-12">
                                            <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                                                <textarea name="message" id="message" name="message" class="form-control" value="{{old('message')}}" rows="7" placeholder="Message"></textarea>
                                                @if ($errors->has('message'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('message') }}</strong>
                                                </span>
                                            @endif
                                            </div>             
                                        </div>     
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn">Submit Your Message</button>
                                    </div>
                                </form>
                            </div>				
                        </div><!-- feedback -->				
                    </div><!-- row -->
                </div>
            </div><!-- container -->
        </section><!-- main -->
        @endsection