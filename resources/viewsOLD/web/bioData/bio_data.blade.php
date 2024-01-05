@extends('user.layout.master')
@section('title','Bio Data Detail')
@section('content')
<section id="main" class="clearfix ad-details-page">
    <div class="container">
        <div class="breadcrumb-section">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="{{ route('web.home') }}">Home</a></li>
                <li><a href="{{ route('web.donation.category') }}">Donate Now</a></li>
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
                                <h4>Donate anything, whatever you can think. <span class="pull-right">* Mandatory Fields</span></h4>
                                
                                <div class="row form-group">
                                <div class="row form-group add-title">
                                    <div class="col-sm-4">
                                        <label class="label-title">Firstname<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="firstname"  placeholder="Enter your firstname">
                                        @if ($errors->has('firstname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('firstname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label-title">Middlename<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="middlename"  placeholder="Enter your middlename">
                                        @if ($errors->has('middlename'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('middlename') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label-title">Lastname<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="lastname"  placeholder="Enter your lastname">
                                        @if ($errors->has('lastname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('lastname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row form-group select-condition">
                                    <div class="col-sm-12">
                                        <label class="">I'm looking for a<span class="required">*</span></label>
                                        <select class="form-control" name="gender">
                                          <option value="male">Bride</option>
                                          <option value="female">Groom</option>
                                        </select>
                                        @if ($errors->has('gender'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('gender') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row form-group add-title">
                                    <div class="col-sm-6">
                                        <label class="label-title">Father Firstname<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="father_firstname"  placeholder="Enter your father firstname">
                                        @if ($errors->has('father_firstname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('father_firstname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="label-title">FatherLastname<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="father_lastname"  placeholder="Enter your father lastname">
                                        @if ($errors->has('father_lastname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('father_lastname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row form-group add-title">
                                    <div class="col-sm-12">
                                        <label class="label-title">Father Firstname<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="uncle_lastname"  placeholder="Enter your metrnal uncle's lastname">
                                        @if ($errors->has('uncle_lastname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('uncle_lastname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row form-group add-title">
                                    <div class="col-sm-4">
                                        <label class="label-title">Firstname<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="firstname"  placeholder="Enter your firstname">
                                        @if ($errors->has('firstname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('firstname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label-title">Middlename<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="middlename"  placeholder="Enter your middlename">
                                        @if ($errors->has('middlename'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('middlename') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label-title">Lastname<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="lastname"  placeholder="Enter your lastname">
                                        @if ($errors->has('lastname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('lastname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="row form-group add-title">
                                    <div class="col-sm-4">
                                        <label class="label-title">Date of birth<span class="required">*</span></label>
                                         <input type="text" name="dob" class="form-control datepicker" placeholder="Select your date of birth">
                                        @if ($errors->has('title'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('full_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label-title">Place of birth<span class="required">*</span></label>
                                         <input type="text" class="form-control" name="placeofbirth" placeholder="Enter your place of birth">
                                        @if ($errors->has('placeofbirth'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('placeofbirth') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label-title">Place of birth district<span class="required">*</span></label>
                                         <input type="text" class="form-control" name="placeofbirthdist" placeholder="Enter your place of birth district">
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
                                          <option value="AL">Assamese</option>
                                          <option value="WY">Bengali</option>
                                          <option value="WY">English</option>
                                          <option value="WY">Gujarati</option>
                                          <option value="WY">Hindi</option>
                                          <option value="WY">Odia</option>
                                          <option value="WY">Tamil</option>
                                          <option value="WY">Awadhi</option>
                                          <option value="WY">Bengali</option>
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
                                          <option value="AL">Hindu</option>
                                          <option value="WY">Parasi</option>
                                          <option value="WY">Sikh</option>
                                          <option value="WY">Muslim</option>
                                          <option value="WY">Jain</option>
                                          <option value="WY">Odia</option>
                                          <option value="WY">Christian</option>
                                          <option value="WY">Jewish</option>
                                          <option value="WY">Other</option>
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
                                        <label class="">Aged between<span class="required">*</span></label>
                                        <select class="form-control" name="age">
                                          <option value="20-23">20-23</option>
                                          <option value="24-28">24-28</option>
                                          <option value="29-32">29-32</option>
                                          <option value="33-36female">33-36</option>
                                          <option value="36-40">36-40</option>
                                        </select>
                                        @if ($errors->has('age'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('age') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="">Height<span class="required">*</span></label>
                                        <select class="form-control" name="height">
                                          <option value="4">4</option>
                                          <option value="5">5</option>
                                        </select>
                                        @if ($errors->has('height'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('height') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="">Weight<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="weight" placeholder="Enter your Weight">
                                        @if ($errors->has('weight'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('weight') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row form-group select-condition">
                                    <div class="col-sm-4">
                                        <label class="">Skin color tone<span class="required">*</span></label>
                                        <select class="form-control" name="skin_color">
                                          <option value="black">Black</option>
                                          <option value="brown">Brown</option>
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
                                    <label class="col-sm-2">Martial Status<span class="required">*</span></label>
                                    <div class="col-sm-10">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-11">
                                            <input type="radio" name="martial_status" value="1" id="nm"> 
                                            <label for="nm">Never Married</label>
                                            <input type="radio" name="martial_status" value="2" id="ad"> 
                                            <label for="ad">Awaiting Divorced</label>
                                            <input type="radio" name="martial_status" value="2" id="dvrd"> 
                                            <label for="dvrd">Divorced</label>
                                            <input type="radio" name="martial_status" value="2" id="wdwd"> 
                                            <label for="wdwd">Widowed</label>
                                            <input type="radio" name="martial_status" value="2" id="anul"> 
                                            <label for="anul">Annulled</label>
                                        </div>
                                        @if ($errors->has('martial_status'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('martial_status') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group add-title">
                                    <div class="col-sm-12">
                                    <label class="label-title">Address1 (Optional)</label>
                                        <input type="text" class="form-control" name="address1"  placeholder="Enter your address (optional)">
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
                                        <input type="text" id="searchTextField" class="form-control" name="city" placeholder="Ex: (Address, City, State, Country)" autocomplete="on">
                                        @if ($errors->has('city'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('city') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>  

                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <label class="label-title">Educational Qualification<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="edu_quali"  placeholder="Enter your educational qualification">
                                        @if ($errors->has('edu_quali'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('edu_quali') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="label-title">Other Qualification<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="other_quali"  placeholder="Enter your other qualification">
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
                                        <input type="text" class="form-control" name="profession"  placeholder="Enter your profession">
                                        @if ($errors->has('profession'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('profession') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label-title">Candidate Post<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="candi_post"  placeholder="Enter your post">
                                        @if ($errors->has('other_quali'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('candi_post') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="label-title">Candidate Yearly Income<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="candi_income" placeholder="Enter your yearly income">
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
                                       <input type="text" class="form-control" name="ofc_address"  placeholder="Enter your office address">
                                        @if ($errors->has('ofc_address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('ofc_address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <label class="label-title">Candidate Fathe Business<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="father_business"  placeholder="Enter your father business">
                                        @if ($errors->has('father_business'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('father_business') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="label-title">Candidate Father Yearly Income<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="candi_father_income" placeholder="Enter your father yearly income">
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
                                        <input type="text" class="form-control" name="mother_name"  placeholder="Enter your mother name">
                                        @if ($errors->has('mother_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('mother_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="label-title">Candidate Mother Business<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="candi_mother_business" placeholder="Enter your Mother business">
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
                                            <input type="radio" name="living_type" value="1" id="jf"> 
                                            <label for="jf">Joint Family</label>
                                            <input type="radio" name="living_type" value="2" id="sf"> 
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
                                            <input type="radio" name="house_type" value="1" id="own"> 
                                            <label for="own">Own</label>
                                            <input type="radio" name="house_type" value="2" id="rent"> 
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
                                        <h3>Family Information<span class="required">*</span></h3>
                                    </div>

                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <label>Brother: </label>
                                        <input type="radio" name="bro_martial_status" value="1" id="m"> 
                                        <label for="m">Married</label>
                                        <input type="radio" name="bro_martial_status" value="2" id="um"> 
                                        <label for="um">Unmarried</label>
                                        @if ($errors->has('bro_martial_status'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('bro_martial_status') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Sister: </label>
                                        <div class="col-sm-1"></div>
                                        <input type="radio" name="sis_martial_status" value="1" id="sm"> 
                                        <label for="sm">Married</label>
                                        <input type="radio" name="sis_martial_status" value="2" id="sum"> 
                                        <label for="sum">Unmarried</label>
                                        @if ($errors->has('sis_martial_status'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('sis_martial_status') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                               
                                
                                
                                
                                                                        
                                                            
                            </div><!-- section -->
                                
                                

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
<link src="{{URL::asset('/js/user/js/web.js')}}"></link>
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
    $('.datepicker').datepicker();
    $('.mother_tounge').select2();
    $('.religion').select2();
    CKEDITOR.replace( 'description' );
</script>
@endpush