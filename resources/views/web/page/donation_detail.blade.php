@extends('user.layout.master')
@section('title','Donation Detail')
@section('content')

   
<style>

/*  Radio Button CSS START */
/*input[type='radio'] {
    -webkit-appearance:none;
    width:15px;
    height:15px;
    border:1px solid darkgray;
    border-radius:50%;
    outline:none;
    box-shadow:0 0 5px 0px gray inset;
}
input[type='radio']:hover {
    box-shadow:0 0 5px 0px #00a651 inset;
}
input[type='radio']:focus {
    -webkit-box-shadow: 2px 4px 2px 0px
#8888889e !important;
    box-shadow: 
rgba(136, 136, 136, 0.62) 2px 3px 5px 0px;
}
input[type='radio']:before {
    content:'';
    display:block;
    width:68%;
    height:68%;
    margin: 15% auto;    
    border-radius:50%;    
}
input[type='radio']:checked:before {
    background: #00a651;
}*/

.adpost-details input[type="radio"]+label {
    cursor: pointer;
    margin-right:20px;
    margin-right: 17px;
    padding-left:25px;
    vertical-align:sub !important;
    position:relative;
    color:#838383;
    margin-bottom:0;
}


.adpost-details input[type="radio"] {
    display:none;
}

.adpost-details input[type="radio"] + label:before,
.adpost-details input[type="radio"] + label:after {
    position:absolute;
    top:5px;
    left:0;
    content:"";
    width:14px;
    height:14px;
    border-radius:50%;
    display:inline-block;
    background-color:transparent;
}

.adpost-details input[type="radio"] + label:before {
    border: 2px solid #00a651;
}

.adpost-details input[type="radio"]:checked + label:after {
    border: 5px solid #00a651;
}
/*
input[type="radio"] {
    appearance: none;
    display: none;
}*/

/*label {
    font-family: "Open Sans", sans-serif;
    font-size: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: inherit;
    width: 80px;
    height: 40px;
    text-align: center;
    border-radius: 9999px;
    overflow: hidden;
    transition: linear 0.3s;
    color: #6e6e6edd;
}*/
/*
input[type="radio"]:checked + label {
    background-color: #3aa652;
    color: #f1f3f5;
    transition: 0.3s;
    border-radius: 25px;
    text-align: center;
    cursor: pointer;
    width: 100%;
    padding: 5px 0px;

}

input[type="radio"] + label {
    
    text-align: center;
    cursor: pointer;
    width: 100%;
    padding: 5px 0px;
}*/

/* CHECK BOX CSS START*/
input[type='checkbox'] {
    -webkit-appearance:none;
    width:19px;
    height:20px;
    border:1px solid darkgray;
    /*border-radius:50%;*/
    /*outline:none;*/
    /*box-shadow:0 0 5px 0px gray inset;*/
    /*margin-left: 15px !important;*/
    padding: 0px 1px;
    position: relative !important;
    margin-left: 0px !important;
}
input[type='checkbox']:hover {
    box-shadow:0 0 5px 0px #00a651 inset;
}
input[type='checkbox']:focus {
    -webkit-box-shadow: 2px 4px 2px 0px
#8888889e !important;
    box-shadow: 
rgba(136, 136, 136, 0.62) 2px 3px 5px 0px;
}
input[type='checkbox']:before {
    /*content:'\f00c';*/
    /*display:block;*/
    /*width:68%;*/
    /*height:68%;*/
    /*margin: 15% auto;    */
    /*border-radius:50%;    */
}
input[type='checkbox']:checked:before {
    background: #00a651;
    content:'\f00c';
    font-family: 'FontAwesome';
    color:#ffffff;
}


/* Date Picker Style*/
    /* Ab hier für dich interessant :) */

.bootstrap-datetimepicker-widget table thead tr:first-child th:hover, .bootstrap-datetimepicker-widget table td.day:hover, .bootstrap-datetimepicker-widget table td.hour:hover, .bootstrap-datetimepicker-widget table td.minute:hover, .bootstrap-datetimepicker-widget table td.second:hover, .bootstrap-datetimepicker-widget table td span:hover {
  /* Hintergrundfarbe für die angehoverte Auswahl */
  background: #f5f5f5;
}
.bootstrap-datetimepicker-widget table td.active, .bootstrap-datetimepicker-widget table td.active:hover, 
.bootstrap-datetimepicker-widget table td span.active { 
  /* Hintergrundfarbe für die aktive Auswahl */
    background-color: #00a651;
    color: #ffffff;
}
.bootstrap-datetimepicker-widget table td.today:before { 
  /* Dreieckfarbe für den aktuellen Tag */
    border-bottom-color: #00a651;
}
.bootstrap-datetimepicker-widget table td.active.today:before {
  /* Dreieckfarbe, wenn aktueller Tag und Auswahl gleicher Tag ist */
  border-bottom-color: #fff;
}
.bootstrap-datetimepicker-widget a {
  /* Für das Kalender-Icon, das Uhrzeit-Icon und die Pfeile in der Uhrzeitauswahl*/
  color: #00a651;
}
.timepicker-picker .btn-primary {
  /* Für den Button AM / PM*/
  color: #fff;
  background-color: #00a651;
  border-color: #00a651;
}


</style>
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
                   

                    <form action="{{ route('web.donation.create',[$key]) }}" method="POST"  enctype="multipart/form-data" id="formDonation">
                        {{ csrf_field() }}
                        
                            <input type="hidden" name="key" value="{{$key}}"/>
                            <div class="section postdetails">
                                <h4>Donate anything, whatever you can think. 
                                    <span class="pull-right">* Mandatory Fields</span>
                                </h4>
                                    <!-- <?php $base_url = URL::to('/'); ?>
                                    <b>BULK UPLOAD:</b> 
                                    <form method='post' action="{{ route('user.donation.import_upload' )}}"  enctype='multipart/form-data' >
                                       {{ csrf_field() }}
                                       <input type='file' name='file' style="display: inline !important; background-color: #DDD;">
                                       <input type='submit' class="btn-main" name='submit' value='Import'>
                                     </form>
                                    <a href="<?php echo $base_url?>/images/uploads/postCSVimport/sample.csv" target ="_blank">Sample for Helper</a> |
                                    <a href="<?php echo $base_url?>/images/uploads/postCSVimport/sample.csv" target ="_blank">Sample for Donor</a>  -->

                                    
                                <div class="form-group selected-product">
                                    <ul class="select-category list-inline">
                                        <li style="margin-right: 20px;">
                                            {{$category->name }}
                                        </li>
                                        <li style="margin-right: 20px;">
                                            {{$subcategory->name }}
                                        </li>
                                        <li class="active" style="padding: 0px; margin-right: 20px;">
                                            {{ $specification->name }}
                                        </li>
                                    </ul>

                                    <a class="edit" href="{{ route('web.donation.category') }}"><i class="fa fa-pencil"></i>Edit</a>
                                </div>

                                           <!--  <div class="row form-group">
                                        <label class="col-sm-3">I Am / We Are<span class="required">*</span></label>
                                        <div class="col-sm-9 user-type">
                                            <input type="radio" <?php if(!empty($posts)){ if($posts->donation_type_id == "1"){ echo 'checked'; } } ?>  name="donation" value="1" id="donor" onclick="showhideDonor()"> <label for="newsell" data-toggle="tooltip" data-placement="top" title="Who have something to give voluntarily to another.">Donor / Provider </label>
                                            <input type="radio" <?php if(!empty($posts)){ if($posts->donation_type_id == "2"){ echo 'checked'; } } ?> name="donation" value="2" id="helper-of-donor" onclick="showhidehelper()"> <label for="newbuy" data-toggle="tooltip" title="Who ready to help voluntarily to the Donor.">Helper of Donor</label> 
                                        </div>
                                    </div> -->

                                <div class="row form-group">
                                    
                                    <label class="col-sm-3">I Am / We Are<span class="required">*</span></label>
                                    <fieldset>

                                        <div class="col-sm-12 user-type">

                                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 radio-wrapper">
                                                <input  type="radio" <?php if(!empty($posts)){ if($posts->donation_type_id == "1"){ echo 'checked'; } } ?>  name="donation" value="1" id="donor" onclick="showhideDonor()"  />
                                                <label for="donor" data-toggle="tooltip" data-placement="right" title="Who have something to give voluntarily to another.">Donor / Provider </label>
                                            </div>
                                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 radio-wrapper">
                                                <input type="radio" <?php if(!empty($posts)){ if($posts->donation_type_id == "2"){ echo 'checked'; } } ?> name="donation" value="2" id="helper-of-donor" onclick="showhidehelper()">
                                                <label for="helper-of-donor" data-toggle="tooltip" data-placement="right" title="Who ready to help voluntarily to the Donor.">Helper of Donor </label>
                                            </div>
                                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 radio-wrapper">
                                                <input type="radio" <?php if(!empty($posts)){ if($posts->donation_type_id == "3"){ echo 'checked'; } } ?> name="donation" value="3" id="donee" onclick="showhideDonor()" >
                                                <label for="donee" data-toggle="tooltip" data-placement="right" title="Who is in need of something and ready to request for the thing.">Donee / Needy </label>
                                            </div>
                                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 radio-wrapper">
                                                <input type="radio" name="donation" <?php if(!empty($posts)){ if($posts->donation_type_id == "4"){ echo 'checked'; } } ?> value="4" id="helper-of-donee" onclick="showhidehelper()" >
                                                <label for="helper-of-donee"  data-toggle="tooltip" data-placement="right" title="Who ready to help voluntarily to the Donee.">Helper of Donee</label> 
                                            </div>
                                            @if ($errors->has('donation'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('donation') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </fieldset>
                                </div>
                                <!-- <div class="row form-group">
                                    
                                    <label class="col-sm-3">I Am / We Are<span class="required">*</span></label>
                                    <fieldset>

                                        <div class="col-sm-12 user-type">

                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 radio-wrapper">
                                                <input  type="radio" <?php if(!empty($posts)){ if($posts->donation_type_id == "1"){ echo 'checked'; } } ?>  name="donation" value="1" id="donor" onclick="showhideDonor()"  />
                                                <label for="donor">Donor / Provider  <span class="fa fa-info-circle" data-toggle="tooltip" title="Who have something to give voluntarily to another."></span></label>
                                            </div>
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 radio-wrapper">
                                                <input type="radio" <?php if(!empty($posts)){ if($posts->donation_type_id == "2"){ echo 'checked'; } } ?> name="donation" value="2" id="helper-of-donor" onclick="showhidehelper()">
                                                <label for="helper-of-donor">Helper of Donor <span class="fa fa-info-circle" data-toggle="tooltip" title="Who ready to help voluntarily to the Donor."></span></label>
                                            </div>
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 radio-wrapper">
                                                <input type="radio" <?php if(!empty($posts)){ if($posts->donation_type_id == "3"){ echo 'checked'; } } ?> name="donation" value="3" id="donee" onclick="showhideDonor()" >
                                                <label for="donee">Donee / Needy  <span class="fa fa-info-circle" data-toggle="tooltip" title="Who is in need of something and ready to request for the thing."></span></label>
                                            </div>
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 radio-wrapper">
                                                <input type="radio" name="donation" <?php if(!empty($posts)){ if($posts->donation_type_id == "4"){ echo 'checked'; } } ?> value="4" id="helper-of-donee" onclick="showhidehelper()" >
                                                <label for="helper-of-donee">Helper of Donee <span class="fa fa-info-circle" data-toggle="tooltip" title="Who ready to help voluntarily to the Donee."></span></label> 
                                            </div>
                                            @if ($errors->has('donation'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('donation') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </fieldset>
                                </div> -->
                                <div class="row form-group select-condition">
                                    <label class="col-sm-3">Condition<span class="required">*</span></label>
                                    <div class="col-sm-9" role='radiogroup'>
                                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                            <input type="radio" <?php if(!empty($posts)){ if($posts->condition == '1'){ echo 'checked'; } } ?>  name="condition" value="1" id="new"> 
                                            <label for="new">New / Fresh</label>
                                        </div>
                                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                            <input type="radio" name="condition" value="2" id="used" <?php if(!empty($posts)){ if($posts->condition == "2"){ echo 'checked'; } } ?> > 
                                            <label for="used">Old / Used</label>
                                        </div>
                                        @if ($errors->has('condition'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('condition') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group add-title">
                                    <label class="col-sm-3 label-title">Title<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="title" id="text" value="<?php if(!empty($posts)){  echo $posts->title ;  } ?>" placeholder="Eg: I want to give AB+ Blood">
                                        @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                

                                <div class="row form-group add-title">
                                    <!--<label class="col-sm-3 label-title">Description<span class="required">*</span></label>-->
                                    <!-- CSS -->
                                    <style type="text/css">
                                        .cke_textarea_inline{
                                           border: 1px solid black;
                                        }
                                        </style>

                                    <label class="col-sm-3 label-title">Description</label>
                                    <!-- <textarea id='long_desc' name='description' class="cke_textarea_inline"></textarea> -->


                                    <div class="col-sm-9">
                                        <!-- <textarea class="form-control " name="descriptionOLD" id="textarea" placeholder="Write few lines about your donation"  >{{ old('description')}}</textarea> -->

                                        <textarea id='long_desc' class="form-control" rows="6" name='description' placeholder="Write few lines about your donation" class="cke_textarea_inline"><?php if(!empty($posts)){  echo $posts->description ;  } ?></textarea>
                                        @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                        @endif
                                    </div>



                                </div>
                                <div class="row form-group ">
                                    <label class="col-sm-3 label-title">Donation Location<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="hidden" name="city_lat" id="text" value="<?php if(!empty($posts)){  echo $posts->lat;  } ?>">
                                        <input type="hidden" name="city_long" id="text" value="<?php if(!empty($posts)){  echo $posts->long ;  } ?>">

                                        <input type="text" id="searchTextField" class="form-control" name="city" placeholder="Eg: Location, City, State, Country" value="<?php if(!empty($posts)){  echo $posts->address ;  } ?>" autocomplete="off">
                                        @if ($errors->has('city'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                        @endif
                                        

                                        <div id="searchTextFieldMap"></div>
                                    </div>
                                </div>
                                

                                {{-- <div class="row form-group ">
                                    <label class="col-sm-3 label-title">Photos for donation</label>
                                    <div class="col-sm-9">
                                        
                                    </div>
                                </div> --}}
                                
                                <div class="row form-group add-image">
                                    <label class="col-sm-3 label-title">Images </label>
                                    <div class="col-sm-9">
                                        <h5><i class="fa fa-file-image-o" aria-hidden="true" style="position: absolute;left: 0;top: 3px;font-size: 36px;color: #00a651;"></i>Upload / Drag and Drop Images  <span>Multiple images (jpg, jpeg, png, gif), 525px X 525px. </span></h5>
                                        <div class="upload-section">
                                            <div class="file-upload">
                                                <div class="image-upload-wrap">
                                                    <!-- <img src=""/> -->
                                                    <input type="file"  class="file-upload-input file-upload" id="upload-image" name="image_file[]"  onchange="readURL(this);" class="form-control" accept="image/*" multiple>
                                                    <input type="file" style="display: none;"  class="file-upload-input file-upload" id="upload-images" name="images[]"  onchange="readURL(this);" class="form-control" accept="image/*" multiple>
                                      
                                                    {{-- <input class="file-upload-input file-upload" id="upload-image" type='file' onchange="readURL(this);" accept="image/*" name="image_file[]" multiple /> --}}
                                                    <div class="drag-text">
                                                      <h3>Images</h3>
                                                  </div>
                                              </div>
                                              <div class="file-upload-content"  id="file-upload-content">
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

                                 <div class="row form-group add-image">
                                    <label class="col-sm-3 label-title">Video </label>
                                    <div class="col-sm-9">
                                        <h5><i class="fa fa-file-video-o" aria-hidden="true" style="position: absolute;left: 0;top: 3px;font-size: 36px;color: #00a651;"></i>Upload / Drag and Drop Video <span>Single video ( mp4, webm, mov), Max 30 Seconds and 10MB.</span></h5>
                                        <div class="upload-section">
                                            <div class="file-upload">
                                                <div class="image-upload-wrap">
                                                    <!-- <img src=""/> -->
                                                    <input type="file"  class="file-upload-input file-upload" id="video_file" name="video_file"   class="form-control"  multiple>
                                      
                                                    {{-- <input class="file-upload-input file-upload" id="upload-image" type='file'  accept="image/*" name="image_file[]" multiple /> --}}
                                                    <div class="drag-text">
                                                      <h3>Video</h3>

                                                  </div>
                                                  <input type="hidden" id="f_du" name="f_du" class="btn btn-success"></input>
                                                  <audio style="hidden" id="audio"></audio>
                                                 
                                                </div>
                                             
                                            </div>
                                        </div>    
                                        <!--   @if ($errors->has('image_file'))
                                      <span class="help-block">
                                        <strong>{{ $errors->first('image_file') }}</strong>
                                        </span>
                                        @endif -->
                                        <p id="file_names" style="padding-left: 20px;">File: </p>
                                    </div>
                                </div>

                                <!-- <div class="row form-group ">
                                    <label class="col-sm-3 label-title">Video for Donation</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="video_file" id="video_file" class="form-control" accept="video/*" >
                                      <input type="hidden" id="f_du" name="f_du" class="btn btn-success"></input>
                                      <audio style="hidden" id="audio"></audio>
   
                                    </div>
                                    <label class="col-sm-3 label-title"> </label>
                                     <label class="col-sm-9 label-title">Video Length 30 Sec. Max</label>
                                </div> -->

                                <div class="row form-group ">
                                    <label class="col-sm-3 label-title">Post Expiry<span class="required">*</span></label>
                                   <!--  <div class="col-sm-9">
                                        <input type="datetime-local" class="form-control " name="expiry" value="{{Carbon\Carbon::now()->addDays(7)->format('Y-m-d\TH:i')}}" data-date="<?php if(!empty($posts)){  echo $posts->expired_at ;  } ?>" data-date-format="DD MMMM YYYY"  autocomplete="on">
                                        
                                    </div> -->
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " id="datetime" name="expiry" value="{{Carbon\Carbon::now()->addDays(7)->format('d-m-Y\TH:i')}}" data-date="<?php if(!empty($posts)){  echo $posts->expired_at ;  } ?>"  autocomplete="on">
                                        
                                    </div>
                                </div>
                        </div><!-- section -->

                        <div class="section seller-info" >
                            <!-- <h4><a href="javascript:void(0)" onclick="showhide()" style="cursor: pointer;">+ Advance</a></h4> -->
                            <!-- <div id="newpost" style='display: none'> -->
                            <div id="newpost" >
                                <div class="row form-group select-condition">
                                    <label class="col-sm-3 label-title">Way of Donation<span class="required">*</span></label>
                                    <div class="col-sm-9 ">
                                        <?php
                                            $_donation_type=-1;
                                            if(old('donation_type')!='' && old('donation_type')!=2 && old('donation_type')!=3 && old('donation_type')!=4 ) 
                                            {    $_donation_type=1;     }
                                        ?>
                                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                           
                                            <input  type="radio" onclick="hidetxtAnyOthermeans()"  checked="checked" name="donation_type" value="1" id="go-f2f"  <?php if(!empty($posts)){ if($posts->donation_type_id == "1"){ echo 'checked'; } } ?>  >
                                            <label for="go-f2f" data-toggle="tooltip" data-placement="right" title="Go nearby other party & complete donation face to face.">Go & F2F </label>
                                        </div>
                                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">    
                                            <input  type="radio" onclick="hidetxtAnyOthermeans()" name="donation_type" value="2" id="call-in-f2f"  <?php if(!empty($posts)){ if($posts->donation_type_id == "2"){ echo 'checked'; } } ?>  >
                                            <label for="call-in-f2f" data-toggle="tooltip" data-placement="right" title="Call in other party & complete donation face to face.">Call in & F2F</label>
                                        </div>
                                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">   
                                            <input type="radio" onclick="hidetxtAnyOthermeans()" name="donation_type"  value="3" id="by-post"  <?php if(!empty($posts)){ if($posts->donation_type_id == "3"){ echo 'checked'; } } ?>>
                                            <label for="by-post">  By Post</label>
                                        </div> 
                                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">    
                                            <input  type="radio" name="donation_type" value="4" id="any-other" onclick="hidetxtAnyOthermeans()" <?php if(!empty($posts)){ if($posts->donation_type_id == "4"){ echo 'checked'; } } ?>>
                                            <label for="any-other"> Other way</label>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"> 
                                            <input
                                            <?php if(!empty($posts)){ if($posts->donation_type_other != ""){ ?>
                                             style="display: block"     
                                             <?php }else{?> 
                                             style="display: none"     
                                             <?php } }else{ ?>
                                             style="display: none"     
                                             <?php } ?>
                                            class="form-control" id="txtAnyOthermeans" name="donation_type_other"  type="text"  value="<?php if(!empty($posts)){  echo $posts->donation_type_other ;  } ?>" placeholder="How you will send/receive donation" />
                                        </div>
                                    </div>
                                    @if ($errors->has('donation_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('donation_type') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <!-- <div class="row form-group select-condition">
                                    <label class="col-sm-3 label-title">Way of Donation<span class="required">*</span></label>
                                    <div class="col-sm-9 ">
                                        <?php
                                            $_donation_type=-1;
                                            if(old('donation_type')!='' && old('donation_type')!=2 && old('donation_type')!=3 && old('donation_type')!=4 ) 
                                            {    $_donation_type=1;     }
                                        ?>
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                           
                                            <input  type="radio" onclick="hidetxtAnyOthermeans()"  checked="checked" name="donation_type" value="1" id="go-f2f"  <?php if(!empty($posts)){ if($posts->donation_type_id == "1"){ echo 'checked'; } } ?>  >
                                            <label for="go-f2f">Go & F2F <span class="fa fa-info-circle" data-toggle="tooltip" title="Go nearby other party & complete donation face to face."></span></label>
                                        </div>
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">    
                                            <input  type="radio" onclick="hidetxtAnyOthermeans()" name="donation_type" value="2" id="call-in-f2f"  <?php if(!empty($posts)){ if($posts->donation_type_id == "2"){ echo 'checked'; } } ?>  >
                                            <label for="call-in-f2f"> Call in & F2F <span class="fa fa-info-circle" data-toggle="tooltip" title="Call in other party & complete donation face to face."></span></label>
                                        </div>
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">   
                                            <input type="radio" onclick="hidetxtAnyOthermeans()" name="donation_type"  value="3" id="by-post"  <?php if(!empty($posts)){ if($posts->donation_type_id == "3"){ echo 'checked'; } } ?>>
                                            <label for="by-post">  By Post</label>
                                        </div> 
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">    
                                            <input  type="radio" name="donation_type" value="4" id="any-other" onclick="hidetxtAnyOthermeans()" <?php if(!empty($posts)){ if($posts->donation_type_id == "4"){ echo 'checked'; } } ?>>
                                            <label for="any-other"> Other way</label>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"> 
                                            <input
                                            <?php if(!empty($posts)){ if($posts->donation_type_other != ""){ ?>
                                             style="display: block"     
                                             <?php }else{?> 
                                             style="display: none"     
                                             <?php } }else{ ?>
                                             style="display: none"     
                                             <?php } ?>
                                            class="form-control" id="txtAnyOthermeans" name="donation_type_other"  type="text"  value="<?php if(!empty($posts)){  echo $posts->donation_type_other ;  } ?>" placeholder=" How you will send or receive donation ? " />
                                        </div>
                                    </div>
                                    @if ($errors->has('donation_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('donation_type') }}</strong>
                                    </span>
                                    @endif
                                </div> -->
                               
                                <div class="row form-group additional">
                                    <label class="col-sm-3 label-title">Preference<span class="required">*</span></label>
                                    <div class="col-sm-9 checkbox" id="preference">
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6"> 
                                                <!--<label class="checkbox-design">Any One-->
                                                <!--    <input type="checkbox" name="preference" checked="" onclick="check_any_one()" id="any-one" value="1">-->
                                                <!--    <span class="checkmark any-one" id="any_one"></span>-->
                                                <!--</label>-->
                                                 <input type="checkbox"  class="checkmark any-one" checked="" name="preference"  id="any-one" value="1"  checked>
                                                 <label for="any-one">Any One</label> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <!--<label class="checkbox-design">Gender-->
                                                <!--    <input type="checkbox"  onclick="chkshow();" id="gender">-->
                                                <!--    <span class="checkmark"></span>-->
                                                <!--</label>-->
                                                 <input type="checkbox" class="checkmark" onclick="chkshow();" id="gender"> <label for="gender"> Gender </label> 
                                            </div>
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <!--<label class="checkbox-design">Male-->
                                                <!--    <input type="checkbox" name="preference_gender[]" value="1" disabled="true" id="chkreadonly">-->
                                                <!--    <span class="checkmark disappear1" style="opacity: 0.5"></span>-->
                                                <!--</label>-->
                                                 <input type="checkbox" name="preference_gender[]" class="checkmark disappear1" value="1" disabled="true" id="chkreadonly"> <label for="male"> Male </label> 
                                            </div>
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <!--<label class="checkbox-design">Female-->
                                                <!--    <input type="checkbox" name="preference_gender[]" value="2" disabled="true" id="chkreadonly1">-->
                                                <!--    <span class="checkmark disappear1" style="opacity: 0.5"></span>-->
                                                <!--</label>-->
                                                 <input type="checkbox" name="preference_gender[]" class="checkmark disappear1" value="2" disabled="true" id="chkreadonly1"> <label for="female"> Female </label> 
                                            </div>
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <!--<label class="checkbox-design">Other-->
                                                <!--    <input type="checkbox" name="preference_gender[]" value="3" disabled="true"  id="chkreadonly2">-->
                                                <!--    <span class="checkmark disappear1" style="opacity: 0.5"></span>-->
                                                <!--</label>-->
                                                  <input type="checkbox" name="preference_gender[]" class="checkmark disappear1" value="3" disabled="true"  id="chkreadonly2"> <label for="other"> other </label>  
                                            </div>
                                            @if ($errors->has('preference_gender'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('preference_gender') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <!--<label class="checkbox-design">Age-->
                                                <!--    <input type="checkbox" id="age" onclick="chkshowage();">-->
                                                <!--    <span class="checkmark"></span>-->
                                                <!--</label>-->
                                                  <input type="checkbox" class="checkmark" onclick="chkshowage();"> <br><label for="age">  Age </label> 
                                            </div>
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <!--<label class="checkbox-design">0-14-->
                                                <!--    <input type="checkbox" name="preference_age[]"  disabled="true" value="1" id="chkreadonlyage">-->
                                                <!--    <span class="checkmark disappear2" style="opacity: 0.5"></span>-->
                                                <!--</label>-->
                                                 <input type="checkbox" name="preference_age[]" class="checkmark disappear2" disabled="true" value="1" id="chkreadonlyage"> <label for="0-14"> 0-14 </label> 
                                            </div>
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <!--<label class="checkbox-design">14-30-->
                                                <!--    <input type="checkbox" name="preference_age[]" disabled="true" value="2" id="chkreadonlyage1"> -->
                                                <!--    <span class="checkmark disappear2" style="opacity: 0.5"></span>-->
                                                <!--</label>-->
                                                 <input type="checkbox" name="preference_age[]" class="checkmark disappear2" disabled="true" value="2" id="chkreadonlyage1"> <label for="14-30"> 14-30 </label> 
                                            </div>
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <!--<label class="checkbox-design">30-60-->
                                                <!--    <input type="checkbox" name="preference_age[]" disabled="true" value="3" id="chkreadonlyage2">-->
                                                <!--    <span class="checkmark disappear2" style="opacity: 0.5"></span>-->
                                                <!--</label>-->
                                                 <input type="checkbox" name="preference_age[]" class="checkmark disappear2" disabled="true" value="3" id="chkreadonlyage2"> <label for="30-60"> 30-60 </label>  
                                            </div>
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <!--<label class="checkbox-design">Above 60-->
                                                <!--    <input type="checkbox" name="preference_age[]" disabled="true"  value="4" id="chkreadonlyage3">-->
                                                <!--    <span class="checkmark disappear2" style="opacity: 0.5"></span>-->
                                                <!--</label>-->
                                                  <input type="checkbox" name="preference_age[]" class="checkmark disappear2" disabled="true"  value="4" id="chkreadonlyage3"> <label for="above-60"> Above 60 </label> 
                                            </div>
                                            @if ($errors->has('preference_age'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('preference_age') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!--<label class="checkbox-design">Handicaped-->
                                                <!--    <input type="checkbox" id="handicaped" onclick="checkHandicaped()" name="preference_is_handicap" value="1" id="3g">-->
                                                <!--    <span class="checkmark"></span>-->
                                                <!--</label>-->
                                                 <input type="checkbox" class="checkmark" name="preference_is_handicap" value="1" id="3g"> <label for="handicaped">Handicaped</label> 
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
                                    <label class="col-sm-3 label-title">Price<span class="required">*</span></label>
                                    <div class="col-sm-9 donationform1">
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <input  type="radio" name="consideration" 
                                                <?php if(!empty($posts)){ if($posts->consideration == 0){ echo 'checked'; } } ?> 
                                                
                                                id="free" checked="checked" value="0" onclick="Free()"/>
                                                <label for="free" data-toggle="tooltip" title="Absolutely FREE donation.">Free</label>
                                            </div>
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <input type="radio" name="consideration" id="non-monetary" value="1" onclick="Monetary()"<?php if(!empty($posts)){ if($posts->consideration == 1){ echo 'checked'; } } ?>  />
                                                
                                                <label for="non-monetary" data-toggle="tooltip" title="Want to exchange with SERVICES or THINGS as consideration."> Non-Monetary</label>
                                            </div>
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">    
                                                <input  type="radio" name="consideration" id="monetary" value="2" onclick="Monetary()"  <?php if(!empty($posts)){ if($posts->consideration == 2){ echo 'checked'; } } ?>  />
                                                
                                                <label for="monetary" data-toggle="tooltip" title="Want to exchange with MONEY as consideration.">Monetary</label>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">    
                                                <input type="text" placeholder="Enter details of what you want as price." class="form-control" name="consideration_detail" id="txtMonetary" value="{{old('consideration_detail')}}" style=" 
                                                @if(old('consideration')=='2')
                                                {{'display:block;'}}
                                                @elseif(old('consideration')=='1')
                                                {{'display:block;'}}
                                                @else
                                                {{'display:none;'}}
                                                @endif
                                                {{old('consideration')=='2'?'display:block;':"display:none"}} "/>
                                            </div>
                                                <input type="text" placeholder="Non-Monetary" class="form-control" name="consideration_detail" id="txtNonMonetary" 
                                                    value="{{old('consideration_detail')}}" 
                                                 style="{{old('consideration')=='1'?'display:block;':'display:none'}}"/>
                                                 @if ($errors->has('consideration'))
                                                 <span class="help-block">
                                                    <strong>{{ $errors->first('consideration') }}</strong>
                                                </span>
                                                @endif
                                        </div>
                                    </div>
                                <!-- <div class="row form-group additional">
                                    <label class="col-sm-3 label-title">Price<span class="required">*</span></label>
                                    <div class="col-sm-9 donationform1">
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <input  type="radio" name="consideration" 
                                                <?php if(!empty($posts)){ if($posts->consideration == 0){ echo 'checked'; } } ?> 
                                                
                                                id="free" checked="checked" value="0" onclick="Free()"/>
                                                <label for="free" data-toggle="tooltip" title="Absolutely FREE donation.">Free</label>
                                            </div>
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <input type="radio" name="consideration" id="non-monetary" value="1" onclick="Monetary()"<?php if(!empty($posts)){ if($posts->consideration == 1){ echo 'checked'; } } ?>  />
                                                
                                                <label for="non-monetary">  Non-Monetary <span class="fa fa-info-circle" data-toggle="tooltip" title="Want to exchange with SERVICES or THINGS as consideration."></span></label>
                                            </div>
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">    
                                                <input  type="radio" name="consideration" id="monetary" value="2" onclick="Monetary()"  <?php if(!empty($posts)){ if($posts->consideration == 2){ echo 'checked'; } } ?>  />
                                                
                                                <label for="monetary"> Monetary <span class="fa fa-info-circle" data-toggle="tooltip" title="Want to exchange with MONEY as consideration."></span></label>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">    
                                                <input type="text" placeholder="Enter details of what you want as price." class="form-control" name="consideration_detail" id="txtMonetary" value="{{old('consideration_detail')}}" style=" 
                                                @if(old('consideration')=='2')
                                                {{'display:block;'}}
                                                @elseif(old('consideration')=='1')
                                                {{'display:block;'}}
                                                @else
                                                {{'display:none;'}}
                                                @endif
                                                {{old('consideration')=='2'?'display:block;':"display:none"}} "/>
                                            </div>
    											<input type="text" placeholder="Non-Monetary" class="form-control" name="consideration_detail" id="txtNonMonetary" 
    												value="{{old('consideration_detail')}}" 
                                                 style="{{old('consideration')=='1'?'display:block;':'display:none'}}"/>
                                                 @if ($errors->has('consideration'))
                                                 <span class="help-block">
                                                    <strong>{{ $errors->first('consideration') }}</strong>
                                                </span>
                                                @endif
                                        </div>
                                    </div> -->
                                    <div class="row form-group additional">
                                        <label class="col-sm-3 label-title">Urgent<span class="required">*</span></label>
                                        <div class="col-sm-9 donationform1">
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <input  type="radio" name="is_urgent"  checked="checked" 
                                             
                                                <?php if(!empty($posts)){ if($posts->is_urgent == 0){ echo 'checked'; } } ?> 
                                                onclick="hideno()" value="0" id="no"> 
                                                <label for="no"> No</label>
                                            </div>
                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                                <input  type="radio" name="is_urgent" onclick="showyes()" value="1" id="yes" <?php if(!empty($posts)){ if($posts->is_urgent == 1){ echo 'checked'; } } ?> 
                                              >
                                                <label for="yes">Yes</label>
                                                @if ($errors->has('is_urgent'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('is_urgent') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <input type="text" style="display:none;" placeholder="Reason for urgency (Eg. For heart operation tomorrow morning 10AM)" class="form-control" name="urgent_reason" id="txtReason" value="<?php if(!empty($posts)){  echo $posts->urgent_reason ;  } ?>" style=" <?php if(!empty($posts)){ if($posts->urgent_reason == ''){ echo 'display: none'; } } ?> "/>
                                            </div>
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
                                <label class="col-sm-3 label-title">Status</label>
                                <div class="col-sm-9">
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <input type="radio" name="d_status" 
                                        @if(old('d_status')!='') 
                                        {{old('d_status')=='0'?'checked':""}}
                                        @else
                                        ''
                                        @endif 
                                        value="0" id="individual">&nbsp;&nbsp;
                                        <label for="individual">Individual</label>&nbsp;&nbsp;
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">    
                                        <input type="radio" name="d_status" value="1" id="dealer" {{old('d_status')=='1'?'checked':""}} >&nbsp;&nbsp; 
                                        <label for="dealer">Organization</label>&nbsp;&nbsp;
                                    </div>    
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-3 label-title">Full Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" id="donorName" placeholder="Donor/Donee Full Name" value="{{old('name')}}">
                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <!--<div class="row form-group">-->
                            <!--    <label class="col-sm-3 label-title">Email ID</label>-->
                            <!--    <div class="col-sm-9">-->
                            <!--        <input type="email" name="email" value="{{old('email')}}" class="form-control" id="donorEmail" placeholder="Eg. donor@doncen.com" >-->
                            <!--        @if ($errors->has('email'))-->
                            <!--        <span class="help-block">-->
                            <!--            <strong>{{ $errors->first('email') }}</strong>-->
                            <!--        </span>-->
                            <!--        @endif-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="row form-group">
                                <label class="col-sm-3 label-title">Mobile Number</label>
                                <div class="col-sm-9">
                                    <input type="number" name="mobile_no"  value="{{old('mobile_no')}}" class="form-control" id="donorContact" placeholder="Eg. 9876543210" >
                                    @if ($errors->has('mobile_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-3 label-title">Full Location</label>
                                <div class="col-sm-9">
                                    <input type="hidden" name="d_lat" id="text" value="">
                                    <input type="hidden" name="d_long" id="text" value="">
                                    
                                    <input type="text" id="donner_address" value="{{old('address')}}" name="address" class="form-control"  placeholder="Eg. Madhumilan, Indore, Madhya Pradesh, India" autocomplete="on">
                                    @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif


                                    <div id="donner_addressMap"></div>
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
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <input type="radio" name="helper_status" value="0"
                                    @if(old('helper_status')!='')
                                    {{old('helper_status')=='0'?'checked':""}}
                                    @else
                                    ""
                                    @endif		
                                    id="individual">&nbsp;&nbsp;
                                    <label for="individual">Individual</label>&nbsp;&nbsp;
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <input type="radio" name="helper_status"   value="1" id="dealer" {{old('helper_status')=='1'?'checked':""}}>&nbsp;&nbsp; 
                                    <label for="dealer">Organization</label>&nbsp;&nbsp;
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-sm-3 label-title">Full Name</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="helper_name" value="{{old('helper_name')}}" id="helperName" class="form-control" placeholder="Eg. Helpar Full Name">
                            </div>
                        </div>
                        <!--<div class="row form-group">-->
                        <!--    <label class="col-sm-3 label-title">Email ID</label>-->
                        <!--    <div class="col-sm-9">-->
                        <!--        <input type="email" name="helper_email" id="helperEmail" class="form-control" placeholder="Eg. helper@doncen.com" value="{{old('helper_email')}}">-->
                        <!--        @if ($errors->has('helper_email'))-->
                        <!--        <span class="help-block">-->
                        <!--            <strong>{{ $errors->first('helper_email') }}</strong>-->
                        <!--        </span>-->
                        <!--        @endif-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="row form-group">
                            <label class="col-sm-3 label-title">Mobile Number</span></label>
                            <div class="col-sm-9">
                                <input type="number" name="helper_mobile_no" id="helperContact" class="form-control" placeholder="Eg. 9876543210" value="{{old('helper_mobile_no')}}">
                                @if ($errors->has('helper_mobile_no'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('helper_mobile_no') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-sm-3 label-title">Full Location</label>
                            <div class="col-sm-9">
                                <input type="hidden" name="helper_lat" id="text" value="">
                                <input type="hidden" name="helper_long" id="text" value="">
                                
                                <input type="text" id="helper_address" name="helper_address" class="form-control" placeholder="Eg. Helper Location, Indore, Madhya Pradesh, India" value="{{old('helper_address')}}">
                                @if ($errors->has('helper_address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('helper_address') }}</strong>
                                </span>
                                @endif


                                <div id="helper_addressMap"></div>
                            </div>
                        </div>
                    </div> <!--section -->

                    <!-- <div class="checkbox section agreement"> -->
                        <div class="section agreement">

                            <label for="send">
                                <!-- <input type="checkbox" name="send" id="send"> -->
                                By clicking "Donate now", you agree to our <a href="#">Terms of Use</a> and <a href="#">Policy</a> and acknowledge that you are the rightful owner of this donation.
                            </label>
                            <input type="hidden" name="updated_id" value="<?php if(!empty($posts)){  echo $posts->key ;  } ?>">
                             <input type="hidden" name="donation_post_id" value="<?php if(!empty($posts)){  echo $posts->id ;  } ?>">
                            <button type="submit" class="btn btn-primary block-tab">Donate Now</button>
                        </div><!-- section -->

                    
                </form><!-- form -->	
            </div>
            <input type="hidden" id="user-name" value="<?php echo $user->name ?>" />
            <input type="hidden" id="user-email" value="<?php echo $user->email ?>" />
            <input type="hidden" id="user-address" value="<?php echo $user->address ?>" />
            <input type="hidden" id="user-contact" value="<?php echo $user->contact ?>" />
            <input type="hidden" id="user-user_status" value="<?php echo $user->user_status ?>" />
             
            <!-- quick-rules -->	
            <div class="hidden-sm col-md-4">
                <div class="section quick-rules">
                    
                   <?php $data = " $subcategory->remarks "; echo $data; ?>
                    
                </div>
            </div><!-- quick-rules -->
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
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAQsVSjofHfiWHWqai-0shuFexPke1-NEQ" type="text/javascript"></script>

@endsection
@push('javaScript')
 

<!-- <script src="{{ URL::asset('/js/user/js/ckeditor.js')}}"></script> -->
<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
<script type="text/javascript">
           // CKEDITOR.replace( 'long_desc');
            // https://ckeditor.com/latest/samples/old/toolbar/toolbar.html
            CKEDITOR.replace( 'long_desc', {
              removeButtons: 'Source,Link,Unlink,Anchor,Image,Styles,About'
          });
  </script>    

 <!-- Include Moment.js CDN -->
    <script type="text/javascript" src=
"https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js">
    </script>
    <script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
    </script>


    <!-- Include Bootstrap DateTimePicker CDN -->
    
    <script src=
"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js">
        </script>

<script>
// Code to get duration of audio /video file before upload - from: http://coursesweb.net/

//register canplaythrough event to #audio element to can get duration
var f_duration =0;  //store duration
document.getElementById('audio').addEventListener('canplaythrough', function(e){
  //add duration in the input field #f_du
  f_duration = Math.round(e.currentTarget.duration);
  document.getElementById('f_du').value = f_duration;

  URL.revokeObjectURL(obUrl);
});

//when select a file, create an ObjectURL with the file and add it in the #audio element
    var obUrl;
     document.getElementById('video_file').addEventListener('click', function(e){
    
    document.getElementById('file_names').innerHTML="file:";
  //check file extension for audio/video type
 
});
    document.getElementById('video_file').addEventListener('change', function(e){
    var file = e.currentTarget.files[0];
   
    document.getElementById('file_names').innerHTML="file:"+file.name;
  //check file extension for audio/video type
  if(file.name.match(/\.(mp4|webm|mov)$/i)){
    obUrl = URL.createObjectURL(file);
    document.getElementById('audio').setAttribute('src', obUrl);
  }else{
    document.getElementById('f_du').value = 0;
  }
});
</script>

<script>
   // $('document').ready(function(){
        

        // $('#image_file').on('change',function(){
        //      for (var i = 0; i < $(this).files.length; i++) {
        //             var file = $(this).files[i];

        //             console.log(file.name); // file_XYZ.xlsx
        //             console.log(file); // Other info: size, type, etc.
        // }
        // });
         //document.getElementById('image_file').addEventListener('change', function(e){
          
   // });


    // var images = document.getElementById('image_file');
    // images.onchange = _ => {
    //     for (var i = 0; i < images.files.length; i++) {
    //         var file = images.files[i];

    //         console.log(file.name); // file_XYZ.xlsx
    //         console.log(file); // Other info: size, type, etc.
    //     }
    // };

</script>
<script type="text/javascript">


 // var image_validation_flag=true;
 //          $('#upload-image').on('change', function() {
 //            //alert("d");
 //                for (let file of this.files) {
 //                  const filetype = file.type; // Get only extension.
 //                  if(filetype=='image/gif' || filetype=='image/jpeg' || filetype=='image/png' || filetype=='image/jpg'){
 //                    // image_validation_flag=true;
 //                  }else{
 //                     image_validation_flag=false;
 //                    alert("Please Upload Valid Image");
 //                  }
 //                  console.log(filetype);
 //                  console.log(image_validation_flag);
                  
 //                }
 //            });

    $(function() {
      $("#donor").focus();
    });

    $(document).ready(function() {

       
        $('#datetime').datetimepicker({
            format: 'DD-MM-YYYY HH:mm'
        });
     
        $(window).keydown(function(event){
            if(event.keyCode == 13) {
              event.preventDefault();
              return false;
          }
        });
    
        // for bootstrap tooltip active
        $('[data-toggle="tooltip"]').tooltip();   
    
  });
    function initialize() {
          var input = document.getElementById('searchTextField');

          var options = {
            // types: ['geocode'] //this should work !
            types: ['establishment'],
            componentRestrictions: {
                country: 'in'
            } //this should work !
        };
        var autocomplete = new google.maps.places.Autocomplete(input, options);
        
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace(); 
            //https://developers.google.com/maps/documentation/javascript/reference/places-service#PlaceResult
            // alert(place.formatted_address);  
            
            $('input[name="city_lat"]').val(place.geometry.location.lat());  // Lat Long
            $('input[name="city_long"]').val(place.geometry.location.lng());  // Lat Long
            

            var value = document.getElementById('searchTextField').value;
            
            

            var text_=$(this);
            var location = new RegExp('^[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]{3}');
            
            
            if(value.length < 15 || location.test(value) == false)
            {
                
                if($(input).parent().children(".error-li").length<1)
                {
                    $(input).parent().append('<li class="error-li"> It should have proper Location, City, State, Country.</li>');
                    $(input).css({"border": "1px solid #d75d54"});
                    from_error['searchTextField']="Invalid Donation Address";
                }
            }
            else {
                
                $(input).next().next(".error-li").remove();
                $(input).next().next().next(".error-li").remove();
                $(input).css({"border": "1px solid #00a651"});
            }

        });
    }
    function initializeDonnerAddress() {
      var input = document.getElementById('donner_address');
      var options = {
            types: ['establishment'],
            componentRestrictions: {
                country: 'in'
            } //this should work !
        };
        var autocomplete = new google.maps.places.Autocomplete(input, options);

        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace(); 
            //https://developers.google.com/maps/documentation/javascript/reference/places-service#PlaceResult
            // alert(place.formatted_address);  
            $('input[name="d_lat"]').val(place.geometry.location.lat());  // Lat Long
            $('input[name="d_long"]').val(place.geometry.location.lng());  // Lat Long
            
            var value = document.getElementById('donner_address').value;
            

            var text_=$(this);
            var location = new RegExp('^[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]{3}');
            
            
            if(value.length < 15 || location.test(value) == false)
            {
                
                if($(input).parent().children(".error-li").length<1)
                {
                    $(input).parent().append('<li class="error-li"> It should have proper Location, City, State, Country.</li>');
                    $(input).css({"border": "1px solid #d75d54"});
                    from_error['donner_address']="Invalid Address";
                }
            }
            else {
                
                $(input).next().next(".error-li").remove();
                $(input).next().next().next(".error-li").remove();
                $(input).css({"border": "1px solid #00a651"});
            }

        });

    }
    function initializeHelperAddress() {
      var input = document.getElementById('helper_address');
      var options = {
            types: ['establishment'],
            componentRestrictions: {
                country: 'in'
            } //this should work !
        };
        var autocomplete = new google.maps.places.Autocomplete(input, options);
        

        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace(); 
            //https://developers.google.com/maps/documentation/javascript/reference/places-service#PlaceResult
            // alert(place.formatted_address);  
            $('input[name="helper_lat"]').val(place.geometry.location.lat());  // Lat Long
            $('input[name="helper_long"]').val(place.geometry.location.lng());  // Lat Long
            

            var value = document.getElementById('helper_address').value;
            

            var text_=$(this);
            var location = new RegExp('^[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]{3}');
            
            
            if( value.length < 15 || location.test(value) == false)
            {
                
                if($(input).parent().children(".error-li").length<1)
                {
                    $(input).parent().append('<li class="error-li"> It should have proper Location, City, State, Country.</li>');
                    $(input).css({"border": "1px solid #d75d54"});
                    from_error['helper_address']="Invalid Address";
                }
            }
            else {
                
                $(input).next().next(".error-li").remove();
                $(input).next().next().next(".error-li").remove();
                $(input).css({"border": "1px solid #00a651"});
            }

        });
    }
    function onPlaceChanged() {
        var place = autocomplete.getPlace();
        if (place.geometry) {
          map.panTo(place.geometry.location);
          map.setZoom(40);
          search();
      } else {
          document.getElementById('helper_address').placeholder = 'Enter a city';
      }
    }

    google.maps.event.addDomListener(window, 'load', initialize);
    google.maps.event.addDomListener(window, 'load', initializeDonnerAddress);
    google.maps.event.addDomListener(window, 'load', initializeHelperAddress);


    var form_mode=0;
    var from_error={};

    $(function(){
        $('document').ready(function(){
            $("input#donor").trigger('click');
        });
        $('#donee').on('click',function(){
         var name = $('#user-name').val();
         var email = $('#user-email').val();
         var address = $('#user-address').val();
         var contact = $('#user-contact').val();
         var user_status = $('#user-user_status').val();
         form_mode=1;

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
         form_mode=1;

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
         form_mode=2;
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
         form_mode=2;
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
    
    $('input[name="title"]').on('keyup',function(){
        var text_=$(this);
        
        if(text_.val().length<5 || text_.val().length>50)
        {
            if($(this).parent().children(".error-li").length<1)
            {
                text_.parent().append('<li class="error-li"> Title should have minimum 5 & maximum 50 Alphanumeric characters.</li>');
                $(this).css({"border": "1px solid #d75d54"});
                from_error['text']="Invalid Title";
            }
        }
        else {
            $(this).next(".error-li").remove();
            $(this).next().next(".error-li").remove();
            $(this).css({"border": "1px solid #00a651"});
        }
    });
    
    // $('#textarea').on('keyup focusout',function(){
    //     var text_=$(this);
        
    //     if(text_.val().length<15 || text_.val().length>255)
    //     {   
    //         if($(this).parent().children(".error-li").length<1)
    //         {
    //             text_.parent().append('<li class="error-li"> Discription should have minimum 15 & maximum 255 Alphanumeric characters</li>');
    //             $(this).css({"border": "1px solid #d75d54"});
    //             from_error['textarea']="Invalid Discription";
    //         }
    //     }
    //     else {
    //         $(this).next(".error-li").remove();
    //           $(this).next().next(".error-li").remove();
    //         $(this).css({"border": "1px solid #00a651"});
    //     }
    // });





    
    $('input[name="city"]').bind('keyup change',function(){
        var text_=$(this);
        var location = new RegExp('^[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]{3}');
        
        if(text_.val().length<15 || location.test(text_.val()) == false)
        {
            if($(this).parent().children(".error-li").length<1)
            {
                text_.parent().append('<li class="error-li"> It should have proper Location, City, State, Country.</li>');
                $(this).css({"border": "1px solid #d75d54"});
                from_error['searchTextField']="Invalid Donation Address";
            }
        }
        else {
            $(this).next().next(".error-li").remove();
            $(this).next().next().next(".error-li").remove();
            $(this).css({"border": "1px solid #00a651"});
        }
    });

    
    // ADVANCE FORM
    $("#preference").find('input[type="checkbox"]').click(function(){

        if($(this).prop("checked") == false){

            if($("#preference").find(".error-li").length<1)
            {
                $("#preference:last-child").append('<li class="error-li col-sm-9"> At least checked one option.</li>');
                $(this).css({"border": "1px solid #d75d54"});
                from_error['text']="Invalid Title";
            }
        }
        else{
            $("#preference").find(".error-li").remove();
            $(this).css({"border": "1px solid #00a651"});
        }
    });
    
    // DONOR / DONEE FORM
    // $('input[name="name"]').on('keyup',function(){
    //     var text_=$(this);
        
    //     if(text_.val().length>0 && text_.val().length<3 || text_.val().length>50)
    //     {
    //         if($(this).parent().children(".error-li").length<1)
    //         {
    //             text_.parent().append('<li class="error-li"> Name should have minimum 3 & maximum 50 Alphanumeric characters.</li>');
    //             $(this).css({"border": "1px solid #d75d54"});
    //             from_error['donorName']="Invalid Name";
    //         }
    //     }
    //     else {
    //         $(this).next(".error-li").remove();
    //         $(this).next().next(".error-li").remove();
    //         $(this).css({"border": "1px solid #00a651"});
    //     }
    // });
    
    $('input[name="email"]').on('keyup',function(){
        var text_=$(this);
        var email = new RegExp('[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]');
        
        if(text_.val().length>0 && email.test(text_.val()) == false)
        {
            if($(this).parent().children(".error-li").length<1)
            {
                text_.parent().append('<li class="error-li"> Invalid email.</li>');
                $(this).css({"border": "1px solid #d75d54"});
                from_error['text']="Invalid email id.";
            }    
        }
        else {
            $(this).next(".error-li").remove();
            $(this).next().next(".error-li").remove();
            $(this).css({"border": "1px solid #00a651"});
        }
    });
    
    $('input[name="mobile_no"]').on('keyup',function(){
        var text_=$(this);
        
        if(text_.val().length>0 && text_.val().length!==10)
        {
            if($(this).parent().children(".error-li").length<1)
            {
                text_.parent().append('<li class="error-li"> Mobile Number must have 10 digits.</li>');
                $(this).css({"border": "1px solid #d75d54"});
                from_error['donorContact']="Invalid Mobile Number";
            }
        }
        else {
            $(this).next(".error-li").remove();
            $(this).next().next(".error-li").remove();
            $(this).css({"border": "1px solid #00a651"});
        }
    });
    
    $('input[name="address"]').bind('keyup change',function(){
        var text_=$(this);
        var location = new RegExp('^[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]{3}');
        
        if(text_.val().length>0 && text_.val().length<15 || location.test(text_.val()) == false)
        {
            if($(this).parent().children(".error-li").length<1)
            {
                text_.parent().append('<li class="error-li"> It should have Location, City, State, Country.</li>');
                $(this).css({"border": "1px solid #d75d54"});
                from_error['donner_address']="Invalid Address";
            }
        }
        else {
            $(this).next().next(".error-li").remove();
            $(this).next().next().next(".error-li").remove();
            $(this).css({"border": "1px solid #00a651"});
        }
    });
    
    // HELPER FORM
    $('input[name="helper_name"]').on('keyup',function(){
        var text_=$(this);
        
        if(text_.val().length>0 && (text_.val().length<3 || text_.val().length>50))
        {
            if($(this).parent().children(".error-li").length<1)
            {
                text_.parent().append('<li class="error-li"> Name should have minimum 3 & maximum 50 Alphanumeric characters.</li>');
                $(this).css({"border": "1px solid #d75d54"});
                from_error['donorName']="Invalid Name";
            }
        }
        else {
            $(this).next(".error-li").remove();
            $(this).next().next(".error-li").remove();
            $(this).css({"border": "1px solid #00a651"});
        }
    });
    
    $('input[name="helper_email"]').on('keyup',function(){
        var text_=$(this);
        var email = new RegExp('[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]');
        
        if(text_.val().length>0 && email.test(text_.val()) == false)
        {
            if($(this).parent().children(".error-li").length<1)
            {
                text_.parent().append('<li class="error-li"> Invalid email.</li>');
                $(this).css({"border": "1px solid #d75d54"});
                from_error['text']="Invalid email id.";
            }    
        }
        else {
            $(this).next(".error-li").remove();
            $(this).next().next(".error-li").remove();
            $(this).css({"border": "1px solid #00a651"});
        }
    });
    
    $('input[name="helper_mobile_no"]').on('keyup',function(){
        var text_=$(this);
        
        if(text_.val().length>0 && text_.val().length!==10)
        {
            if($(this).parent().children(".error-li").length<1)
            {
                text_.parent().append('<li class="error-li"> Mobile Number must have 10 digits.</li>');
                $(this).css({"border": "1px solid #d75d54"});
                from_error['donorContact']="Invalid Mobile Number";
            }
        }
        else {
            $(this).next(".error-li").remove();
            $(this).next().next(".error-li").remove();
            $(this).css({"border": "1px solid #00a651"});
        }
    });
    
    $('input[name="helper_address"]').bind('keyup change',function(){
        var text_=$(this);
        var location = new RegExp('^[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]{3}');
        
        if(text_.val().length>0 && (text_.val().length<15 || location.test(text_.val()) == false))
        {
            if($(this).parent().children(".error-li").length<1)
            {
                text_.parent().append('<li class="error-li"> It should have Location, City, State, Country.</li>');
                $(this).css({"border": "1px solid #d75d54"});
                from_error['donner_address']="Invalid Address";
            }
        }
        else {
            $(this).next().next(".error-li").remove();
            $(this).next().next().next(".error-li").remove();
            $(this).css({"border": "1px solid #00a651"});
        }
    });
    
    
        $("#formDonation").submit(function(e){
            if($('.error-li').length>0)
            {
                var result=$("<div>");
                result.html('<li class="error-li"> Fill Required fields first.</li>');
                result.css('color','red');
                // $("#formDonation").append(result);
                return false; 
            }

            //console.log(storedFiles);
            //$('input[name="images[]"]').value=storedFiles;
            // document.getElementById("myFile")
            //console.log($('input[name="images[]"]').val());

           // return false;


            var status=true;
            var error_msz='';
            $(".error-li").remove();
            
            var donor_nod = $("#donor"); 
            var helper_of_donor_nod = $("#helper-of-donor");
            var donee_nod = $("#donee"); 
            var helper_of_donee_nod = $("#helper-of-donee");
            
            var title_nod = $('input[name="title"]');
            
            // var description_nod = $('#textarea');
            var preference_nod = $('#preference');
            
            var city_nod = $('input[name="city"]');
            var name_nod = $('input[name="name"]');
            var mobile_no_nod = $('input[name="mobile_no"]');
            var address_nod = $('input[name="address"]');
             
              

             var vid_duration =$('#f_du').val();
            // alert(vid_duration);
              var file = document.getElementById("video_file").files[0];
              
              // console.log(file.type);
              // return false;
              var d=0;
              if( file )
              {
                

                    var x=0;
                    var mbSize = file.size/1024/1024;   
                   
                    
                 // alert(mbSize);

                    
                    if( mbSize > 10 ||  (vid_duration < 1 || vid_duration > 120 ) ){
                        alert("* More Than 10 MB Not allowed\n* Video Duration More Than 120 Second Not Allowed");
                        //alert(file.type);
                        status=false;
                    }else{
                        if(file.type == "video/mp4" ||  file.type == "video/webm"  || file.type == "video/quicktime"){
                            
                        }else{
                            alert(" Upload Valid Vdeo file");
                            //alert(file.type);
                            status=false;
                        }

                    
                       
                    }
                   

                    
                   
                }

                var images = document.getElementById("upload-image");
// console.log(images);
// return false;
                for (let file of images.files) {
                  const filetype = file.type; // Get only extension.
                  if(filetype=='image/gif' || filetype=='image/jpeg' || filetype=='image/png' || filetype=='image/jpg'){
                    // image_validation_flag=true;
                  }else{
                     image_validation_flag=false;
                    alert("*allowed Image Type\n* png, gif, jpg");
                    return false;
                  }
                  // console.log(file);
                  // console.log(image_validation_flag);
                  
                }
               // return false;

                // if(image_validation_flag==false){
                //      alert("*allowed Image Type\n* png, gif, jpg");
                //     status=false;
                // }

            if(donor_nod.val()==0 && helper_of_donor_nod.val()==0  && donee_nod.val()==0 && helper_of_donee_nod.val()==0)
            {
                dealer_nod.parent().append('<li class="error-li"> Atleast select any one</li>');
                status=false;
            }
            
            if(title_nod.val().trim().length<5)
            {

                title_nod.parent().append('<li class="error-li"> Title must have minimum 5 characters.</li>');
                // error_msz+="<li> Invalid name. Only Alphabates allowed (minimum 3).</li><br>";
                status=false;
            }
            
            // if(description_nod.val().trim().length<15)
            // {

            //     description_nod.parent().append('<li class="error-li"> Description must have minimum 15 characters.</li>');
            //     // error_msz+="<li> Invalid name. Only Alphabates allowed (minimum 3).</li><br>";
            //     status=false;
            // }
            
            if(preference_nod.prop("checked") == false)
            {
                preference_nod.lastChild.append('<li class="error-li"> At least checked one option.</li>');
                // error_msz+="<li> Invalid name. Only Alphabates allowed (minimum 3).</li><br>";
                status=false;
            }
            
            if(city_nod.val().trim().length<15)
            {

                city_nod.parent().append('<li class="error-li"> It should have Location, City, State, Country.</li>');
                // error_msz+="<li> Invalid name. Only Alphabates allowed (minimum 3).</li><br>";
                status=false;
            }
            
            if(name_nod.val().trim().length > 0 && name_nod.val().trim().length<3)
            {

                name_nod.parent().append('<li class="error-li"> Invalid name. Only Alphabates allowed (minimum 3).</li>');
                // error_msz+="<li> Invalid name. Only Alphabates allowed (minimum 3).</li><br>";
                status=false;
            }
            
            if(mobile_no_nod.val().trim().length > 0 && mobile_no_nod.val().trim().length !== 10)
            {

                mobile_no_nod.parent().append('<li class="error-li"> Mobile Number must have 10 digits.</li>');
                // error_msz+="<li> Invalid name. Only Alphabates allowed (minimum 3).</li><br>";
                status=false;
            }
            
            if(address_nod.val().trim().length > 0 && address_nod.val().trim().length<15)
            {

                address_nod.parent().append('<li class="error-li"> It should have Location, City, State, Country.</li>');
                // error_msz+="<li> Invalid name. Only Alphabates allowed (minimum 3).</li><br>";
                status=false;
            }
            
           
            //console.log($('#video_file').files[0].size/1024);..

            

            
    

                
               
                
            
            if(!status){
                var result=$("<div>");
                result.html(error_msz);
                result.css('color','red');
                $("#formReg").append(result);
            }
            return status;
        });
  });   
</script>

{{-- <script>
$('#video_file').on('change', function(evt) {
    
    if(!this.files[0]){
        console.log("null");
    }else{
        console.log(this.files[0].size/1024);
    }
    
  });
</script> --}}
<script>
    /* For Edit Time Checked Value */
    var div = document.getElementById("Donor");
    var divhelper = document.getElementById("helper");
    
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