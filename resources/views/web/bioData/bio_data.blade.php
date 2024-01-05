@extends('user.layout.master')
@section('title','Bio Data Detail')
@section('content')
<style>
    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: #00a651;
        color: white;
    }
    .select2-container--default .select2-results__option[aria-selected=true] {
        background-color: rgb(43, 177, 162);
        color: white;
    }
</style>
<section id="main" class="clearfix ad-details-page">
    <div class="container">
        <div class="breadcrumb-section">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="{{ route('web.home') }}">Home</a></li>
                <li><a href="{{ route('web.donation.category') }}">Submit Form</a></li>
            </ol><!-- breadcrumb -->                        
            <h2 class="title">Bio Data Detail Form</h2>
        </div><!-- banner -->
        <div class="adpost-details">
            <div class="row">   
                <div class="col-md-8">
                    <form action="{{ route('web.bioData.create') }}" method="POST"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <fieldset>
                            <div class="section postdetails">
                                
                                <div class="row form-group">
                                <div class="row form-group add-title">
                                    <div class="col-sm-4">
                                        <label class="label-title">Firstname<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="firstname"  placeholder="Enter your firstname" value="{{ old('firstname') }}">
                                        @if ($errors->has('firstname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('firstname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label-title">Middlename<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="middlename"  placeholder="Enter your middlename" value="{{ old('middlename') }}">
                                        @if ($errors->has('middlename'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('middlename') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label-title">Lastname<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="lastname"  placeholder="Enter your lastname" value="{{ old('lastname') }}">
                                        @if ($errors->has('lastname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('lastname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row form-group select-condition">
                                    <div class="col-sm-12">
                                        <label class="">Gender: <span class="required">*</span></label>
                                        <select class="form-control" name="gender" >
                                            <option disabled="" selected="">Select gender</option>>
                                          <option value="male" @if(old('gender') == 'male') selected="selected" @endif>Male</option>
                                          <option value="female" @if(old('gender') == 'female') selected="selected" @endif>Female</option>
                                          <option value="other" @if(old('gender') == 'other') selected="selected" @endif>Other</option>
                                        </select>
                                        @if ($errors->has('gender'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('gender') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row form-group add-title">
                                    <div class="col-sm-4">
                                        <label class="label-title">Father Firstname<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="father_firstname"  placeholder="Enter your father firstname" value="{{ old('father_firstname') }}" >
                                        @if ($errors->has('father_firstname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('father_firstname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label-title">Father Middlename<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="father_middlename"  placeholder="Enter your father middlename" value="{{ old('father_middlename') }}">
                                        @if ($errors->has('father_middlename'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('father_middlename') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label-title">Father Lastname<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="father_lastname"  placeholder="Enter your father lastname" value="{{ old('father_lastname') }}">
                                        @if ($errors->has('lastname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('father_lastname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="row form-group add-title">
                                    <div class="col-sm-4">
                                        <label class="label-title">Date of birth<span class="required">*</span></label>
                                         <input type="text" name="dob" class="form-control datepicker" placeholder="Select your date of birth" value="{{ old('dob') }}">
                                        @if ($errors->has('title'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('full_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label-title">Place of birth<span class="required">*</span></label>
                                         <input type="text" class="form-control" name="placeofbirth" placeholder="Enter your place of birth" value="{{ old('placeofbirth') }}">
                                        @if ($errors->has('placeofbirth'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('placeofbirth') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label-title">Place of birth district<span class="required">*</span></label>
                                         <input type="text" class="form-control" name="placeofbirthdist" placeholder="Enter your place of birth district" value="{{ old('placeofbirthdist') }}">
                                        @if ($errors->has('placeofbirthdist'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('placeofbirthdist') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group add-title">
                                    <div class="col-sm-12">
                                        <label class="label-title">Description<span class="required">*</span></label>
                                        <textarea name="description" class="form-control" id="description" placeholder="Write few lines about your products" rows="6" >{{ old('description')}}</textarea>
                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row form-group add-title">
                                    <div class="col-sm-6">
                                        <label class="label-title">Mother Tounge<span class="required">*</span></label>
                                        <select class="mother_tounge form-control" name="mother_tounge">
                                          <option value="Assamese" @if(old('mother_tounge') == 'Assamese') selected="selected" @endif>Assamese</option>
                                          <option value="Bengali" @if(old('mother_tounge') == 'Bengali') selected="selected" @endif>Bengali</option>
                                          <option value="English" @if(old('mother_tounge') == 'English') selected="selected" @endif>English</option>
                                          <option value="Gujarati" @if(old('mother_tounge') == 'Gujarati') selected="selected" @endif>Gujarati</option>
                                          <option value="Hindi" @if(old('mother_tounge') == 'Hindi') selected="selected" @endif>Hindi</option>
                                          <option value="Odia" @if(old('mother_tounge') == 'Odia') selected="selected" @endif>Odia</option>
                                          <option value="Tamil" @if(old('mother_tounge') == 'Tamil') selected="selected" @endif>Tamil</option>
                                          <option value="Awadhi" @if(old('mother_tounge') == 'Awadhi') selected="selected" @endif>Awadhi</option>
                                          <option value="Bengali" @if(old('mother_tounge') == 'Bengali') selected="selected" @endif>Bengali</option>
                                        </select>
                                        @if ($errors->has('mother_tounge'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('mother_tounge') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="label-title">Religion<span class="required">*</span></label>
                                        <select class="religion form-control" name="religion">
                                          <option value="Hindu" @if(old('religion') == 'Hindu') selected="selected" @endif>Hindu</option>
                                          <option value="Parasi" @if(old('religion') == 'Parasi') selected="selected" @endif>Parasi</option>
                                          <option value="Sikh" @if(old('religion') == 'Sikh') selected="selected" @endif>Sikh</option>
                                          <option value="Muslim" @if(old('religion') == 'Muslim') selected="selected" @endif>Muslim</option>
                                          <option value="Jain" @if(old('religion') == 'Jain') selected="selected" @endif>Jain</option>
                                          <option value="Odia" @if(old('religion') == 'Odia') selected="selected" @endif>Odia</option>
                                          <option value="Christian" @if(old('religion') == 'Christian') selected="selected" @endif>Christian</option>
                                          <option value="Jewish" @if(old('religion') == 'Jewish') selected="selected" @endif>Jewish</option>
                                          <option value="Other" @if(old('religion') == 'Other') selected="selected" @endif>Other</option>
                                        </select>
                                        @if ($errors->has('mother_tounge'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('mother_tounge') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row form-group select-condition">
                                    <div class="col-sm-4">
                                        <label class="">Height(cm)<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="height" placeholder="Enter your height in centimeter" value="{{ old('height') }}">
                                        @if ($errors->has('height'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('height') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="">Weight<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="weight" placeholder="Enter your Weight" value="{{ old('weight') }}">
                                        @if ($errors->has('weight'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('weight') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="">Skin color tone<span class="required">*</span></label>
                                        <select class="form-control" name="skin_color">
                                          <option value="black" @if(old('skin_color') == 'black') selected="selected" @endif>Black</option>
                                          <option value="brown" @if(old('skin_color') == 'brown') selected="selected" @endif>Brown</option>
                                        </select>
                                        @if ($errors->has('skin_color'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('skin_color') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>                                

                                <div class="row form-group add-image">
                                    <div class="col-sm-12">
                                        <label class="label-title">Photos for Bio Data <span>(This will be your referance photo)</span> (Optional) </label>
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
                                    <label class="col-sm-2">Marital Status<span class="required">*</span></label>
                                    <div class="col-sm-10">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-11">
                                            <input type="radio" name="marital_status" value="1" id="nm" @if(old('marital_status') == 1) checked="checked" @endif> 
                                            <label for="nm">Never Married</label>
                                            <input type="radio" name="marital_status" value="2" id="ad" @if(old('marital_status') == 2) checked="checked" @endif> 
                                            <label for="ad">Awaiting Divorced</label>
                                            <input type="radio" name="marital_status" value="2" id="dvrd" @if(old('marital_status') == 3) checked="checked" @endif> 
                                            <label for="dvrd">Divorced</label>
                                            <input type="radio" name="marital_status" value="2" id="wdwd" @if(old('marital_status') == 4) checked="checked" @endif> 
                                            <label for="wdwd">Widowed</label>
                                            <input type="radio" name="marital_status" value="2" id="anul" @if(old('marital_status') == 5) checked="checked" @endif> 
                                            <label for="anul">Annulled</label>
                                        </div>
                                        @if ($errors->has('marital_status'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('marital_status') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group add-title">
                                    <div class="col-sm-12">
                                    <label class="label-title">Address1 (Optional)</label>
                                        <input type="text" class="form-control" name="address1"  placeholder="Enter your address (optional)" value="{{old('address1')}}">
                                        @if ($errors->has('address1'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('address1') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group ">
                                    <div class="col-sm-12">
                                        <label class="label-title">Location<span class="required">*</span></label>
                                        <input type="text" id="searchTextField" class="form-control" name="location" placeholder="Ex: (Address, City, State, Country)" autocomplete="on"  value="{{old('location')}}">
                                        @if ($errors->has('location'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('location') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>  

                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <label class="label-title">Educational Qualification<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="edu_quali"  placeholder="Enter your educational qualification" value="{{old('edu_quali')}}">
                                        @if ($errors->has('edu_quali'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('edu_quali') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="label-title">Other Qualification</label>
                                        <input type="text" class="form-control" name="other_quali"  placeholder="Enter your other qualification" value="{{old('other_quali')}}">
                                        @if ($errors->has('other_quali'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('other_quali') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-4">
                                        <label class="label-title">Candidate Profession<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="profession"  placeholder="Enter your profession"  value="{{old('profession')}}">
                                        @if ($errors->has('profession'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('profession') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label-title">Candidate Post<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="candi_post"  placeholder="Enter your post" value="{{old('candi_post')}}">
                                        @if ($errors->has('candi_post'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('candi_post') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label-title">Candidate Yearly Income<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="candi_income" placeholder="Enter your yearly income" value="{{old('candi_income')}}">
                                        @if ($errors->has('candi_income'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('candi_income') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row form-group add-title">
                                    <div class="col-sm-12">
                                        <label class="label-title">Your office address<span class="required">*</span></label>
                                       <input type="text" class="form-control" name="ofc_address"  placeholder="Enter your office address" value="{{old('ofc_address')}}">
                                        @if ($errors->has('ofc_address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('ofc_address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <label class="label-title">Candidate Father Business<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="father_business"  placeholder="Enter your father business" value="{{old('father_business')}}">
                                        @if ($errors->has('father_business'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('father_business') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="label-title">Candidate Father Yearly Income<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="candi_father_income" placeholder="Enter your father yearly income" value="{{old('candi_father_income')}}">
                                        @if ($errors->has('candi_father_income'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('candi_father_income') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <label class="label-title">Candidate Mother Name<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="mother_name"  placeholder="Enter your mother name" value="{{old('mother_name')}}">
                                        @if ($errors->has('mother_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('mother_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="label-title">Candidate Mother Business<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="candi_mother_business" placeholder="Enter your Mother business" value="{{old('candi_mother_business')}}">
                                        @if ($errors->has('candi_mother_business'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('candi_mother_business') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <label class="col-sm-2">I'm living in<span class="required">*</span></label>
                                    <div class="col-sm-10">
                                        <div class="col-sm-10">
                                            <input type="radio" name="living_type" value="1" id="jf" @if(old('living_type') == 1) checked="checked" @endif> 
                                            <label for="jf">Joint Family</label>
                                            <input type="radio" name="living_type" value="2" id="sf" @if(old('living_type') == 2) checked="checked" @endif> 
                                            <label for="sf">Solo Family</label>
                                        </div>
                                        @if ($errors->has('living_type'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('living_type') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <label class="col-sm-2">House<span class="required">*</span></label>
                                    <div class="col-sm-10">
                                        <div class="col-sm-10">
                                            <input type="radio" name="house_type" value="1" id="own" @if(old('house_type') == 1) checked="checked" @endif> 
                                            <label for="own">Own</label>
                                            <input type="radio" name="house_type" value="2" id="rent" @if(old('house_type') == 2) checked="checked" @endif> 
                                            <label for="rent">Rent</label>
                                        </div>
                                        @if ($errors->has('house_type'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('house_type') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-12">
                                        <h3>Family Information</h3>
                                    </div>

                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <label>I've <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="number_of_brother"  placeholder="Enter your number of brothers" value="{{old('number_of_brother')}}">
                                         <label> Brother </label>
                                        @if ($errors->has('number_of_brother'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('number_of_brother') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                     <div class="col-sm-6">
                                        <label>I've <span class="required">*</span> </label>
                                        <input type="text" class="form-control" name="number_of_sister"  placeholder="Enter your number of sisters" value="{{old('number_of_sister')}}">
                                         <label> sister </label>
                                        @if ($errors->has('number_of_sister'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('number_of_sister') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <label>Brother: <span class="required">*</span> </label>
                                        <input type="radio" name="bro_marital_status" value="1" id="m" @if(old('bro_marital_status') == 1) checked="checked" @endif> 
                                        <label for="m">Married</label>
                                        <input type="radio" name="bro_marital_status" value="2" id="um" @if(old('bro_marital_status') == 2) checked="checked" @endif> 
                                        <label for="um">Unmarried</label>
                                        @if ($errors->has('bro_marital_status'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('bro_marital_status') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Sister: <span class="required">*</span></label>
                                        <div class="col-sm-1"></div>
                                        <input type="radio" name="sis_marital_status" value="1" id="sm" @if(old('sis_marital_status') == 1) checked="checked" @endif> 
                                        <label for="sm">Married</label>
                                        <input type="radio" name="sis_marital_status" value="2" id="sum" @if(old('sis_marital_status') == 2) checked="checked" @endif> 
                                        <label for="sum">Unmarried</label>
                                        @if ($errors->has('sis_marital_status'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('sis_marital_status') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <label>I've <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="number_of_metarnal_uncles"  placeholder="Enter your number of metrnal uncles" value="{{old('number_of_metarnal_uncles')}}">
                                         <label>Metarnal Uncles </label>
                                        @if ($errors->has('number_of_metarnal_uncles'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('number_of_metarnal_uncles') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                     <div class="col-sm-6">
                                        <label>Metarnal Uncle's lastname<span class="required">*</span> </label>
                                        <input type="text" class="form-control" name="metrnal_uncle_lname"  placeholder="Enter your metarnal uncle lastname" value="{{old('metrnal_uncle_lname')}}">
                                        @if ($errors->has('metrnal_uncle_lname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('metrnal_uncle_lname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                               
                                
                                
                                
                                                                        
                                                            
                            </div><!-- section -->
                                
                                

                            <!-- <div class="checkbox section agreement"> -->
                            <div class="section agreement">
                                <button type="submit" class="btn btn-primary">Submit Form</button>
                            </div><!-- section -->

                        </fieldset>
                    </form><!-- form -->    
                </div>
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
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@push('javaScript')
<link src="{{URL::asset('/js/user/js/web.js')}}"></link>
<script src="{{ URL::asset('/js/user/js/jquery.min.js')}}"></script>
<script src="{{ URL::asset('/js/user/js/jquery-ui.min.js')}}"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script type="text/javascript">
   function initialize() {
      var input = document.getElementById('searchTextField');
      var options = {
        types: ['geocode'] //this should work !
      };
      var autocomplete = new google.maps.places.Autocomplete(input, options);
   }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
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
    $('.datepicker').datepicker();
    $('.mother_tounge').select2();
    $('.religion').select2();
    CKEDITOR.replace( 'description' );
</script>
 
@endpush