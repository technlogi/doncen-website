@extends('user.layout.master')
@section('title','Donation Detail')
@section('content')
<section id="main" class="clearfix ad-details-page">
    <div class="container">
        <div class="breadcrumb-section">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="{{ route('web.home') }}">Home</a></li>
                <li><a href="{{ route('web.donation.category') }}">Donate Now</a></li>
            </ol><!-- breadcrumb -->						
            <h2 class="title">Donation Detail Form</h2>
        </div><!-- banner -->
        <div class="adpost-details">
            <div class="row">	
                <div class="col-md-8">
                    <form action="{{ route('web.donation.create',[$key]) }}" method="POST"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <fieldset>
                            <input type="hidden" name="key" value="{{$key}}"/>
                            <div class="section postdetails">
                                <h4>Donate anything, whatever you can think. <span class="pull-right">* Mandatory Fields</span></h4>
                                <div class="form-group selected-product">
                                    <ul class="select-category list-inline">
                                        <li>
                                            {{$category->name }}
                                        </li>
                                        <li>
                                            {{$subcategory->name }}
                                        </li>
                                        <li class="active">
                                            {{ $specification->name }}
                                        </li>
                                    </ul>

                                    <a class="edit" href="{{ route('web.donation.category') }}"><i class="fa fa-pencil"></i>Edit</a>
                                </div>
                                <div class="row form-group">
                                    <label class="col-sm-3">I Am / We Are<span class="required">*</span></label>
                                    <div class="col-sm-9 user-type">
                                        <input  type="radio" name="donation"  value="1" id="donor" onclick="showhideDonor()" {{ old('donation')=="1"?'checked':"" }} />
										
                                        <label for="donor">Donor</label>
                                        <input type="radio" name="donation" value="2" id="helper-of-donor" onclick="showhidehelper()" {{ old('donation')=="2"?'checked':"" }}>
                                        <label for="helper-of-donor">Helper of Donor</label>
                                        <input type="radio" name="donation" value="3" id="donee" onclick="showhideDonor()" {{ old('donation')=="3"?'checked':"" }}>
                                        <label for="donee">Donee</label>
                                        <input type="radio" name="donation" value="4" id="helper-of-donee" onclick="showhidehelper()" {{ old('donation')=="4"?'checked':"" }}>
                                        <label for="helper-of-donee">Helper of Donee</label> 
										
                                        @if ($errors->has('donation'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('donation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group add-title">
                                    <label class="col-sm-3 label-title">Title<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="title" id="text" value="{{ old('title') }}" placeholder="ex, I want to give AB+ Blood">
                                        @if ($errors->has('title'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group add-title">
                                    <label class="col-sm-3 label-title">Description<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea name="description" class="form-control" id="textarea" placeholder="Write few lines about your products" rows="6" >{{ old('description')}}</textarea>
                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                    <div class="row form-group add-image">
                                    <label class="col-sm-3 label-title">Photos for donation <span>(This will be your referance photo)</span> (Optional) </label>
                                    <div class="col-sm-9">
                                        <h5><i class="fa fa-upload" aria-hidden="true"></i>Select Files to Upload / Drag and Drop Files <span>You can add multiple images.</span></h5>
                                        <div class="upload-section">
                                            <div class="file-upload">
                                                <div class="image-upload-wrap">
                                                    <img src=""/>
                                                    <input class="file-upload-input file-upload" id="upload-image" type='file' onchange="readURL(this);" accept="image/*" name="image_file[]" multiple />
                                                    <div class="drag-text">
                                                      <h3>Drag and drop a file or select add Image</h3>
                                                    </div>
                                                  </div>
                                                  <div class="file-upload-content">
                                                  </div>
                                            </div>
                                        </div>	
                                        @if ($errors->has('image_file'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('image_file') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group select-condition">
                                    <label class="col-sm-3">Condition<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="radio" name="condition" 
											@if(old('condition')!='') 
												{{old('condition')==1?"checked":""}} 
											@else
												checked
											@endif
											value="1" id="new"> 
                                        <label for="new">New</label>
                                        <input type="radio" name="condition" value="2" id="used" {{old('condition')==2?"checked":""}} > 
                                        <label for="used">Old</label>
                                        @if ($errors->has('condition'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('condition') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group ">
                                    <label class="col-sm-3 label-title">Donation Address<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" id="searchTextField" class="form-control" name="city" placeholder="Ex: (Address, City, State, Country)" value="{{old('city')}}" autocomplete="on">
                                        @if ($errors->has('city'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('city') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>  
                                
                                
                                                                        
                                                            
                            </div><!-- section -->
                                
                                <div class="section seller-info" >
                                <h4 class="" onclick="showhide()" style="cursor: pointer;">+ Advance</h4>
                                <div id="newpost" style='display: none'>
                                    <div class="row form-group select-condition">
                                        <label class="col-sm-3 label-title">Type of Donation<span class="required">*</span></label>
                                        <div class="col-sm-9 ">
                                            <input type="radio" name="donation_type" value="1" id="go-f2f" 
											@if(old('donation_type')!='') 
												{{old('donation_type')==1?"checked":""}} 
											@else
												checked
											@endif
											>
                                            <label for="go-f2f">Go & F2F</label>
                                            <input  type="radio" onclick="hidetxtAnyOthermeans()" name="donation_type" value="2" id="call-in-f2f" {{old('donation_type')==2?"checked":""}}  >
                                            <label for="call-in-f2f"> Call in & F2F</label>
                                            <input type="radio" onclick="hidetxtAnyOthermeans()" name="donation_type"  value="3" id="by-post" {{old('donation_type')==3?"checked":""}}>
                                            <label for="by-post">  By Post</label>
                                            <input  type="radio" name="donation_type" value="4" id="any-other" onclick="hidetxtAnyOthermeans()" {{old('donation_type')==4?"checked":""}}>
                                            <label for="any-other"> Any Other means</label>
                                            <input
												@if(old('donation_type_other')!='')
													style="display:block;" 
												@else
												style="display: none" 
												@endif
											class="form-control" id="txtAnyOthermeans" name="donation_type_other"  type="text"  value="{{old('donation_type_other')}}" placeholder=" Write name of type of Donation" />
                                        </div>
                                        @if ($errors->has('donation_type'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('donation_type') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="row form-group additional">
                                        <label class="col-sm-3 label-title">Preference<span class="required">*</span></label>
                                        <div class="col-sm-9 checkbox">
                                                <div class="row">
                                                    <div class="col-md-6"> 
                                                        <label class="checkbox-design">Any One
                                                            <input type="checkbox" name="preference"  id="any-one" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <!-- <input type="checkbox" name="preference"  id="any-one" value="1"  checked><label for="any-one">Any One</label> -->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label class="checkbox-design">Gender
                                                            <input type="checkbox"  onclick="chkshow();" id="gender">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <!-- <input type="checkbox"  onclick="chkshow();" id="gender"> <label for="gender"> Gender </label> -->
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="checkbox-design">Male
                                                            <input type="checkbox" name="preference_gender[]" value="1" disabled="true" id="chkreadonly">
                                                            <span class="checkmark disappear1" style="opacity: 0.5"></span>
                                                        </label>
                                                        <!-- <input type="checkbox" name="preference_gender[]" value="1" disabled="true" id="chkreadonly"> <label for="male"> Male </label> -->
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="checkbox-design">Female
                                                            <input type="checkbox" name="preference_gender[]" value="2" disabled="true" id="chkreadonly1">
                                                            <span class="checkmark disappear1" style="opacity: 0.5"></span>
                                                        </label>
                                                       <!-- <input type="checkbox" name="preference_gender[]" value="2" disabled="true" id="chkreadonly1"> <label for="female"> Female </label> -->
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="checkbox-design">Female
                                                            <input type="checkbox" name="preference_gender[]" value="3" disabled="true"  id="chkreadonly2">
                                                            <span class="checkmark disappear1" style="opacity: 0.5"></span>
                                                        </label>
                                                      <!--  <input type="checkbox" name="preference_gender[]" value="3" disabled="true"  id="chkreadonly2"> <label for="other"> other </label>  -->
                                                    </div>
                                                    @if ($errors->has('preference_gender'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('preference_gender') }}</strong>
                                                                </span>
                                                    @endif
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label class="checkbox-design">Age
                                                            <input type="checkbox"  onclick="chkshowage();">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                       <!--  <input type="checkbox"  onclick="chkshowage();"> <label for="age"> Age </label> -->
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="checkbox-design">0-14
                                                            <input type="checkbox" name="preference_age[]"  disabled="true" value="1" id="chkreadonlyage">
                                                            <span class="checkmark disappear2" style="opacity: 0.5"></span>
                                                        </label>
                                                        <!-- <input type="checkbox" name="preference_age[]"  disabled="true" value="1" id="chkreadonlyage"> <label for="0-14"> 0-14 </label> -->
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="checkbox-design">14-30
                                                            <input type="checkbox" name="preference_age[]" disabled="true" value="2" id="chkreadonlyage1"> 
                                                            <span class="checkmark disappear2" style="opacity: 0.5"></span>
                                                        </label>
                                                        <!-- <input type="checkbox" name="preference_age[]" disabled="true" value="2" id="chkreadonlyage1"> <label for="14-30"> 14-30 </label> -->
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="checkbox-design">30-60
                                                            <input type="checkbox" name="preference_age[]" disabled="true" value="3" id="chkreadonlyage2">
                                                            <span class="checkmark disappear2" style="opacity: 0.5"></span>
                                                        </label>
                                                        <!-- <input type="checkbox" name="preference_age[]" disabled="true" value="3" id="chkreadonlyage2"> <label for="30-60"> 30-60 </label>  -->
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="checkbox-design">Above 60
                                                            <input type="checkbox" name="preference_age[]" disabled="true"  value="4" id="chkreadonlyage3">
                                                            <span class="checkmark disappear2" style="opacity: 0.5"></span>
                                                        </label>
                                                        <!--  <input type="checkbox" name="preference_age[]" disabled="true"  value="4" id="chkreadonlyage3"> <label for="above-60"> Above 60 </label> -->
                                                    </div>
                                                    @if ($errors->has('preference_age'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('preference_age') }}</strong>
                                                                </span>
                                                    @endif
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label class="checkbox-design">Handicaped
                                                            <input type="checkbox" name="preference_is_handicap" value="1" id="3g">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                         <!-- <input type="checkbox" name="preference_is_handicap" value="1" id="3g"> <label for="handicaped">Handicaped</label> -->
                                                    </div>
                                                     @if ($errors->has('preference_is_handicap'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('preference_is_handicap') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    <div class="row form-group additional">
                                        <label class="col-sm-3 label-title">Consideration<span class="required">*</span></label>
                                        <div class="col-sm-9 donationform1">

                                            <input  type="radio" name="consideration" 
											
											@if(old('consideration')!='')
												{{old('consideration')=='0'?'checked':""}}
											@else
												checked
											@endif
												 id="free"  value="0" onclick="Free()"/>
                                            <label for="free">Free</label>
                                            <input type="radio" name="consideration" id="non-monetary" value="1" onclick="Monetary()" {{old('consideration')=='1'?'checked':""}} />
                                            <label for="non-monetary">  Non-Monetary</label>
                                            <input  type="radio" name="consideration" id="monetary" value="2" onclick="Monetary()"  {{old('consideration')=='2'?'checked':""}} />
                                            <label for="monetary">Monetary</label>
                                            <input type="text" placeholder="Enter details" class="form-control" name="consideration_detail" id="txtMonetary" value="{{old('consideration_detail')}}" style=" 
                                            @if(old('consideration')=='2')
                                                {{'display:block;'}}
                                            @elseif(old('consideration')=='1')
                                                {{'display:block;'}}
                                            @else
                                                {{'display:none;'}}
                                            @endif
                                            {{old('consideration')=='2'?'display:block;':"display:none"}} "/>
                                            
											<!-- <input type="text" placeholder="Non-Monetary" class="form-control" name="consideration_detail" id="txtNonMonetary" 
												value="{{old('consideration_detail')}}" 
											style="{{old('consideration')=='1'?'display:block;':'display:none'}}"/> -->
                                            @if ($errors->has('consideration'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('consideration') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row form-group additional">
                                        <label class="col-sm-3 label-title">Urgent<span class="required">*</span></label>
                                        <div class="col-sm-9 donationform1">
                                            <input  type="radio" name="is_urgent" 
												@if(old('is_urgent')!='')
													{{old('is_urgent')=='0'?'checked':""}}
												@else
													checked	
												@endif
											 onclick="hideno()" value="0" id="no"> 
                                            <label for="no"> No</label>
                                            <input  type="radio" name="is_urgent" onclick="showyes()" value="1" id="yes" 	{{old('is_urgent')=='1'?'checked':""}}>
                                            <label for="yes">Yes</label>
                                            @if ($errors->has('is_urgent'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('is_urgent') }}</strong>
                                                </span>
                                            @endif
                                            <input type="text" placeholder="Reason" class="form-control" name="urgent_reason" id="txtReason" value="{{old('urgent_reason')}}" style="{{old('is_urgent')!=''?'display:none;':"display:none;"}}"/>
                                            @if ($errors->has('urgent_reason'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('urgent_reason') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                            </div>
                                </div>   
                                    <div class="section seller-info" id="Donor" style="
									@if(old('donation')=='1' || old('donation')=='2' || old('donation')=='3' || old('donation')=='4')
										display:block;
									@else
										display: none;
									@endif	
									">
                                        <h4>Donor / Donee Info</h4>
                                    <div class="row form-group">
                                        <label class="col-sm-3 label-title">Status<span class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="radio" name="d_status" 
											@if(old('d_status')!='') 
												{{old('d_status')=='0'?'checked':""}}
											@else
												checked
											@endif 
											 value="0" id="individual">&nbsp;&nbsp;
                                            <label for="individual">Individual</label>&nbsp;&nbsp;
                                            <input type="radio" name="d_status" value="1" id="dealer" {{old('d_status')=='1'?'checked':""}} >&nbsp;&nbsp; 
                                            <label for="dealer">Organization</label>&nbsp;&nbsp;
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 label-title">Name<span class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" class="form-control" id="donorName" placeholder="ex, Donecn/Donee" value="{{old('name')}}">
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 label-title">Email ID</label>
                                        <div class="col-sm-9">
                                            <input type="email" name="email" value="{{old('email')}}" class="form-control" id="donorEmail" placeholder="ex, doncen@mail.com" >
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 label-title">Mobile Number<span class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="mobile_no"  value="{{old('mobile_no')}}" class="form-control" id="donorContact" placeholder="ex, +91 000 0000 000" >
                                            @if ($errors->has('mobile_no'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('mobile_no') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 label-title">Address<span class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" id="donner_address" value="{{old('address')}}" name="address" class="form-control"  placeholder="ex, alekdera House, coprotec, India" autocomplete="on">
                                            @if ($errors->has('address'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div> <!-- section -->
                                <div class="section seller-info" id='helper' style="@if(old('donation')=='2' || old('donation')=='4')
										display:block;
									@else
										display: none;
									@endif">
                                    <h4>Helper Info</h4>
                                    <div class="row form-group">
                                        <label class="col-sm-3 label-title">Status</label>
                                        <div class="col-sm-9">
                                            <input type="radio" name="helper_status" value="0"
															@if(old('helper_status')!='')
															{{old('helper_status')=='0'?'checked':""}}
															@else
																checked
															@endif		
											 id="individual">&nbsp;&nbsp;
                                            <label for="individual">Individual</label>&nbsp;&nbsp;
                                            <input type="radio" name="helper_status"   value="1" id="dealer" {{old('helper_status')=='1'?'checked':""}}>&nbsp;&nbsp; 
                                            <label for="dealer">Organization</label>&nbsp;&nbsp;
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 label-title">Name</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="helper_name" value="{{old('helper_name')}}" id="helperName" class="form-control" placeholder="ex, Helpar Donecn/Donee">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 label-title">Email ID</label>
                                        <div class="col-sm-9">
                                            <input type="email" name="helper_email" id="helperEmail" class="form-control" placeholder="ex, doncen@mail.com" value="{{old('helper_email')}}">
                                            @if ($errors->has('helper_email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('helper_email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 label-title">Mobile Number</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="helper_mobile_no" id="helperContact" class="form-control" placeholder="ex, +91 000 0000 000" value="{{old('helper_mobile_no')}}">
                                            @if ($errors->has('helper_mobile_no'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('helper_mobile_no') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-3 label-title">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="helper_address" name="helper_address" class="form-control" placeholder="ex, alekdera House, coprotec, India" value="{{old('helper_address')}}">
                                            @if ($errors->has('helper_address'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('helper_address') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div> <!--section -->

                            <!-- <div class="checkbox section agreement"> -->
                            <div class="section agreement">

                                <label for="send">
                                    <!-- <input type="checkbox" name="send" id="send"> -->
                                        By clicking "Donate now", you agree to our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a> and acknowledge that you are the rightful owner of this donation.
                                </label>
                                <button type="submit" class="btn btn-primary">Donate Now</button>
                            </div><!-- section -->

                        </fieldset>
                    </form><!-- form -->	
                </div>
                <input type="hidden" id="user-name" value="<?php echo $user->name ?>" />
                <input type="hidden" id="user-email" value="<?php echo $user->email ?>" />
                <input type="hidden" id="user-address" value="<?php echo $user->address ?>" />
                <input type="hidden" id="user-contact" value="<?php echo $user->contact ?>" />
                <input type="hidden" id="user-user_status" value="<?php echo $user->user_status ?>" />
                
                <!-- quick-rules -->	
                <div class="col-md-4">
                    <div class="section quick-rules">
                        <h4>Quick rules</h4>
                        <p class="lead">Donation through <a href="http://doncen.org" target="_blank">doncen.org</a> is free! However, all donation must follow our rules:</p>
                        <ul>
                            <li>Make sure you donate in the correct category.</li>
                            <li>Be aware that your email or phone numbers in the donation post will be shown to our visitors so that they can contact you directly.</li>
                            <li>Do not post the same donation more than once or repost within 48 hours.</li>
                            <li>Do not upload pictures with watermarks.</li>
                            <li>Do not post donation containing multiple items/services unless its a package deal.</li>
                            <li>There is no definite way to identify a fraudulent donation so we urge you to practice good judgement and always be careful.</li>
                        </ul>
                    </div>
                </div><!-- quick-rules -->	
            </div><!-- photos-ad -->				
        </div>	
    </div><!-- container -->
</section><!-- main -->
<script src="{{URL::asset('/js/user/js/web.js')}}"></script>
@endsection
@push('javaScript')
<script type="text/javascript">
   function initialize() {
      var input = document.getElementById('searchTextField');
      var options = {
        types: ['geocode'] //this should work !
      };
      var autocomplete = new google.maps.places.Autocomplete(input, options);
   }
   function initializeDonnerAddress() {
      var input = document.getElementById('donner_address');
      var options = {
        types: ['geocode'] //this should work !
      };
      var autocomplete = new google.maps.places.Autocomplete(input, options);
   }
   function initializeHelperAddress() {
      var input = document.getElementById('helper_address');
      var options = {
        types: ['geocode'] //this should work !
      };
      var autocomplete = new google.maps.places.Autocomplete(input, options);
   }
   
   google.maps.event.addDomListener(window, 'load', initialize);
   google.maps.event.addDomListener(window, 'load', initializeDonnerAddress);
   google.maps.event.addDomListener(window, 'load', initializeHelperAddress);
   

</script>
<script>
$(function(){
  $('#donee').on('click',function(){
       var name = $('#user-name').val();
       var email = $('#user-email').val();
       var address = $('#user-address').val();
       var contact = $('#user-contact').val();
       var user_status = $('#user-user_status').val();
      
      $("#donorContact").val(contact);
      $("#donner_address").val(address);
      $("#donorEmail").val(email);
      $("#donorName").val(name);
      $("#donorStatus").val(user_status);
  });
  $('#donor').on('click',function(){
       var name = $('#user-name').val();
       var email = $('#user-email').val();
       var address = $('#user-address').val();
       var contact = $('#user-contact').val();
       var user_status = $('#user-user_status').val();
      
      $("#donorContact").val(contact);
      $("#donner_address").val(address);
      $("#donorEmail").val(email);
      $("#donorName").val(name);
      $("#donorStatus").val(user_status);
  });
  $("#helper-of-donor").on('click',function(){
       var name = $('#user-name').val();
       var email = $('#user-email').val();
       var address = $('#user-address').val();
       var contact = $('#user-contact').val();
       var user_status = $('#user-user_status').val();
      $("#donorContact").val('');
      $("#donner_address").val('');
      $("#donorEmail").val('');
      $("#donorName").val('');
      $("#donorStatus").val('');
      $("#helperContact").val(contact);
      $("#helper_address").val(address);
      $("#helperEmail").val(email);
      $("#helperName").val(name);
      $("#helperStatus").val(user_status);
  });
   $("#helper-of-donee").on('click',function(){
       var name = $('#user-name').val();
       var email = $('#user-email').val();
       var address = $('#user-address').val();
       var contact = $('#user-contact').val();
       var user_status = $('#user-user_status').val();
      $("#donorContact").val('');
      $("#donner_address").val('');
      $("#donorEmail").val('');
      $("#donorName").val('');
      $("#donorStatus").val('');
      $("#helperContact").val(contact);
      $("#helper_address").val(address);
      $("#helperEmail").val(email);
      $("#helperName").val(name);
      $("#helperStatus").val(user_status);
  });
});   
</script>
<script>
/* For Edit Time Checked Value */
   var div = document.getElementById("Donor");
    var divhelper = document.getElementById("helper");
	
//           alert(divhelper.style.display != "none");
   
	
										/* @if(old('donation')=="1") 
											
											$('.helper').hide();
											$('.Donor').show();
											 var name = $('#user-name').val();
											   var email = $('#user-email').val();
											   var address = $('#user-address').val();
											   var contact = $('#user-contact').val();
											   var user_status = $('#user-user_status').val();
											  
											  $("#donorContact").val(contact);
											  $("#donner_address").val(address);
											  $("#donorEmail").val(email);
											  $("#donorName").val(name);
											  $("#donorStatus").val(user_status);
										
										@elseif(old('donation')=="2")
											showhidehelper();
											   var name = $('#user-name').val();
											   var email = $('#user-email').val();
											   var address = $('#user-address').val();
											   var contact = $('#user-contact').val();
											   var user_status = $('#user-user_status').val();
											  $("#donorContact").val('');
											  $("#donner_address").val('');
											  $("#donorEmail").val('');
											  $("#donorName").val('');
											  $("#donorStatus").val('');
											  $("#helperContact").val(contact);
											  $("#helper_address").val(address);
											  $("#helperEmail").val(email);
											  $("#helperName").val(name);
											  $("#helperStatus").val(user_status);
										@elseif(old('donation')=="3")
											showhideDonor();
											 var name = $('#user-name').val();
										   var email = $('#user-email').val();
										   var address = $('#user-address').val();
										   var contact = $('#user-contact').val();
										   var user_status = $('#user-user_status').val();
										  
										  $("#donorContact").val(contact);
										  $("#donner_address").val(address);
										  $("#donorEmail").val(email);
										  $("#donorName").val(name);
										  $("#donorStatus").val(user_status);
										@elseif(old('donation')=="4")
												showhidehelper();
											   var name = $('#user-name').val();
											   var email = $('#user-email').val();
											   var address = $('#user-address').val();
											   var contact = $('#user-contact').val();
											   var user_status = $('#user-user_status').val();
											  $("#donorContact").val('');
											  $("#donner_address").val('');
											  $("#donorEmail").val('');
											  $("#donorName").val('');
											  $("#donorStatus").val('');
											  $("#helperContact").val(contact);
											  $("#helper_address").val(address);
											  $("#helperEmail").val(email);
											  $("#helperName").val(name);
											  $("#helperStatus").val(user_status);
										@else

										@endif */		
										
										@if(old('genderClick')=='1')
											chkshow();
										@endif	
										@if(old('preference_ageChecked')=='1')
											chkshowage();
										@endif
										
										/* Show Advanced Section On Edit Time */
										@if(old('donation_type')!='')
											showhide();
										@endif
										@if(old('consideration')=='1')
											NonMonetary();
										@endif
										@if(old('consideration')=='2')
											Monetary();
										@endif
											  
										</script>
@endpush