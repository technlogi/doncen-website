 
@extends('user.layout.master')

@section('content')
 <!-- main -->
 <section id="main" class="clearfix ad-details-page">
            <div class="container">

                <div class="breadcrumb-section">
                    <!-- breadcrumb -->
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li>Ad Post</li>
                    </ol><!-- breadcrumb -->						
                    <h2 class="title">Mobile Phones</h2>
                </div><!-- banner -->

                <div class="adpost-details">
                    <div class="row">	
                        <div class="col-md-8">
                            <form action="#">
                                <fieldset>
                                    <div class="section postdetails">
                                        <h4>Donate anything, whatever you can think. <span class="pull-right">* Mandatory Fields</span></h4>
                                        <div class="form-group selected-product">
                                            <ul class="select-category list-inline">
                                                <li>
                                                    <a href="ad-post.html">
                                                        Category
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        Sub-category
                                                    </a>
                                                </li>

                                                <li class="active">
                                                    <a href="#">Specification</a>
                                                </li>
                                            </ul>
                                            <a class="edit" href="#"><i class="fa fa-pencil"></i>Edit</a>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-sm-3">I Am / We Are<span class="required">*</span></label>
                                            <div class="col-sm-9 user-type">
                                                <input  type="radio" name="Donation" value="Donor" id="donor" onclick="showhideDonor()">
                                                <label for="donor">Donor</label>
                                                <input type="radio" name="Donation" value="Help of Donor" id="helper-of-donor" onclick="showhidehelper()">
                                                <label for="helper-of-donor">Helper of Donor</label>
                                                <input type="radio" name="Donation" value="Donee" id="donee" onclick="showhideDonor()">
                                                <label for="donee">Donee</label>
                                                <input type="radio" name="Donation" value="Help of Donee" id="helper-of-donee" onclick="showhidehelper()">
                                                <label for="helper-of-donee">Helper of Donee</label>                                       
                                            </div>
                                        </div>
                                        <div class="row form-group add-title">
                                            <label class="col-sm-3 label-title">Title<span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="text" placeholder="ex, I want to give AB+ Blood">
                                            </div>
                                        </div>
                                        <div class="row form-group add-title">
                                            <label class="col-sm-3 label-title">Description<span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <textarea name="Description" class="form-control" id="textarea" placeholder="Write few lines about your products" rows="6" ></textarea>
                                            </div>
                                        </div>
                                        <div class="row form-group add-image">
                                            <label class="col-sm-3 label-title">Photos for your ad <span>(This will be your cover photo )</span> </label>
                                            <div class="col-sm-9">
                                                <h5><i class="fa fa-upload" aria-hidden="true"></i>Select Files to Upload / Drag and Drop Files <span>You can add multiple images.</span></h5>
                                                <div class="upload-section">
                                                    <label class="upload-image" for="upload-image-one">
                                                        <input type="file" id="upload-image-one">
                                                    </label>										

                                                    <label class="upload-image" for="upload-image-two">
                                                        <input type="file" id="upload-image-two">
                                                    </label>											
                                                    <label class="upload-image" for="upload-image-three">
                                                        <input type="file" id="upload-image-three">
                                                    </label>										

                                                    <label class="upload-image" for="upload-imagefour">
                                                        <input type="file" id="upload-imagefour">
                                                    </label>
                                                </div>	
                                            </div>
                                        </div>
                                        <div class="row form-group select-condition">
                                            <label class="col-sm-3">Condition<span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="radio" name="itemCon" value="new" id="new"> 
                                                <label for="new">New</label>
                                                <input type="radio" name="itemCon" value="used" id="used"> 
                                                <label for="used">Old</label>
                                            </div>
                                        </div>
                                        <div class="row form-group ">
                                            <label class="col-sm-3 label-title">City<span class="required">*</span></label>
                                            <div class="col-sm-9">
                                               <input type="text" class="form-control" id="text" placeholder="ex, Enter City">
                                            </div>
                                        </div>
                                        
                                        
                                                                              
                                       								
                                    </div><!-- section -->
                                    
                                    <div class="section seller-info" >
                                        <h4 class="" onclick="showhide()" style="cursor: pointer;">+ Advance</h4>
                                        <div id="newpost" style='display: none'>
                                            <!--                                                                    <h4 class="donateheading2" style="cursor: pointer;">+ Advance</h4>-->
                                            <div class="row form-group select-condition">
                                                <label class="col-sm-3 label-title">Type of Donation<span class="required">*</span></label>
                                                <div class="col-sm-9 ">
                                                    <input type="radio" name="DonationType" value="Go" id="go-f2f" checked>
                                                    <label for="go-f2f">Go & F2F</label>
                                                    <input  type="radio" name="DonationType" value="Call" id="call-in-f2f" >
                                                    <label for="call-in-f2f"> Call in & F2F</label>
                                                    <input type="radio" name="DonationType"  value="ByPost" id="by-post" >
                                                    <label for="by-post">  By Post</label>
                                                    <input  type="radio" name="DonationType" value="AnyOthermeans" id="any-other" onclick="hidetxtAnyOthermeans()">
                                                    <label for="any-other"> Any Other means</label>
                                                    <input style="display: none" class="form-control"  type="text"  value="" placeholder=" Write name of type of Donation  " />
                                                </div>
                                            </div>
                                            <div class="row form-group additional">
                                                <label class="col-sm-3 label-title">Preference<span class="required">*</span></label>
                                                <div class="col-sm-9 checkbox">
                                                    <div >
                                                        <label>
                                                            <input type="checkbox" name=""  id="any-one" checked >&nbsp; Any One
                                                        </label>
                                                        <br>
                                                        <label>
                                                            <input type="checkbox" name="" onclick="chkshow();" id="gender">&nbsp; Gender
                                                        </label>
                                                        <br>
                                                        <label>
                                                            <input type="checkbox"  value="Male" disabled="true" id="chkreadonly">&nbsp; Male
                                                        </label>
                                                        <label>
                                                            <input type="checkbox" disabled="true" id="chkreadonly1">&nbsp; Female
                                                        </label>
                                                        <label>
                                                            <input type="checkbox" disabled="true"  id="chkreadonly2">&nbsp; other
                                                        </label>
                                                        <br>
                                                        <label>
                                                            <input type="checkbox" onclick="chkshowage();">&nbsp;  Age
                                                        </label>
                                                        <label>
                                                            <input type="checkbox"  disabled="true" id="chkreadonlyage">&nbsp; 0-14
                                                        </label>
                                                        <label>
                                                            <input type="checkbox"  disabled="true" id="chkreadonlyage1">&nbsp; 14-30
                                                        </label>
                                                        <label>
                                                            <input type="checkbox" disabled="true" id="chkreadonlyage2">&nbsp; 30-60
                                                        </label>
                                                        <label>
                                                            <input type="checkbox" disabled="true" id="chkreadonlyage3">&nbsp; 60-Above
                                                        </label>
                                                        <br>
                                                        <label>
                                                            <input type="checkbox" name="Handicaped" value="Handicaped" id="3g">&nbsp; Handicaped
                                                        </label>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form-group additional">
                                                <label class="col-sm-3 label-title">Consideration<span class="required">*</span></label>
                                                <div class="col-sm-9 donationform1">

                                                    <input  type="radio" name="Consideration" checked id="free" onclick="Free()" value=" Free"/>
                                                    <label for="free">Free</label>
                                                    <input  type="radio" name="Consideration" id="monetary" value="Monetary" onclick="Monetary()" />
                                                    <label for="monetary">Monetary</label>
                                                    <input type="radio" name="Consideration" id="non-monetary" value=" Non-Monetary" onclick="NonMonetary()"/>
                                                    <label for="non-monetary">  Non-Monetary</label>
                                                    <input type="text" placeholder="Monetary" class="form-control" name="OtherConsideration" id="txtMonetary" style="display: none" required=""/>
                                                    <input type="text" placeholder="Non-Monetary" class="form-control" name="OtherConsideration" id="txtNonMonetary" style="display: none" required=""/>

                                                </div>
                                            </div>
                                            <div class="row form-group additional">
                                                <label class="col-sm-3 label-title">Urgent<span class="required">*</span></label>
                                                <div class="col-sm-9 donationform1">

                                                    <input  type="radio" name="Urgent" checked onclick="hideno()" value=" NO" id="no"> 
                                                    <label for="no"> No</label>
                                                    <input  type="radio" name="Urgent" onclick="showyes()" value="Yes" id="yes">
                                                    <label for="yes">Yes</label>
                                                    <input type="text" placeholder="Reason" class="form-control" name="UrgentNotifications" id="txtReason" style="display: none" required=""/>
                                                </div>
                                            </div>
                                    </div>
                                        </div>  
                                    <div class="section seller-info" id="Donor" style='display: none;'>
                                            <h4>Donor / Donee Info</h4>
                                            <div class="row form-group">
                                                <label class="col-sm-3 label-title">Status<span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="radio" name="sellerType" value="individual" id="individual">&nbsp;&nbsp;
                                                    <label for="individual">Individual</label>&nbsp;&nbsp;
                                                    <input type="radio" name="sellerType" value="dealer" id="dealer">&nbsp;&nbsp; 
                                                    <label for="dealer">Organization</label>&nbsp;&nbsp;
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="col-sm-3 label-title">Your Name<span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="DFullName" class="form-control" placeholder="ex, Donecn/Donee" required="">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="col-sm-3 label-title">Your Email ID</label>
                                                <div class="col-sm-9">
                                                    <input type="email" name="DEmail" class="form-control" placeholder="ex, doncen@mail.com" >
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="col-sm-3 label-title">Mobile Number<span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="DContact" class="form-control" placeholder="ex, +91 000 0000 000"  required="">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="col-sm-3 label-title">Address</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="DCityDonor" class="form-control" placeholder="ex, alekdera House, coprotec, India" required="">
                                                </div>
                                            </div>
                                        </div><!-- section -->
                                        <div class="section seller-info" id='helper' style='display: none;'>
                                            <h4>Helper Info</h4>
                                            <div class="row form-group">
                                                <label class="col-sm-3 label-title">Status<span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="radio" name="sellerType" value="individual" id="individual">&nbsp;&nbsp;
                                                    <label for="individual">Individual</label>&nbsp;&nbsp;
                                                    <input type="radio" name="sellerType" value="dealer" id="dealer">&nbsp;&nbsp; 
                                                    <label for="dealer">Organization</label>&nbsp;&nbsp;
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="col-sm-3 label-title">Your Name<span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="HFullName" class="form-control" placeholder="ex, Helpar Donecn/Donee" required="">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="col-sm-3 label-title">Your Email ID</label>
                                                <div class="col-sm-9">
                                                    <input type="email" name="HEmail" class="form-control" placeholder="ex, doncen@mail.com">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="col-sm-3 label-title">Mobile Number<span class="required">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="HContact" class="form-control" placeholder="ex, +91 000 0000 000" required="">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="col-sm-3 label-title">Address</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="HCityDonor" class="form-control" placeholder="ex, alekdera House, coprotec, India" required="">
                                                </div>
                                            </div>
                                        </div><!-- section -->                                        

                                    <div class="checkbox section agreement">
                                        <label for="send">
                                            <input type="checkbox" name="send" id="send">
                                             By clicking "Post", you agree to our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a> and acknowledge that you are the rightful owner of this donation.
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
                                <p class="lead">Posting an ad on <a href="#">Trade.com</a> is free! However, all ads must follow our rules:</p>
                                <ul>
                                    <li>Make sure you post in the correct category.</li>
                                    <li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
                                    <li>Do not upload pictures with watermarks.</li>
                                    <li>Do not post ads containing multiple items unless it's a package deal.</li>
                                    <li>Do not put your email or phone numbers in the title or description.</li>
                                    <li>Make sure you post in the correct category.</li>
                                    <li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
                                    <li>Do not upload pictures with watermarks.</li>
                                    <li>Do not post ads containing multiple items unless it's a package deal.</li>
                                </ul>
                            </div>
                        </div><!-- quick-rules -->	
                    </div><!-- photos-ad -->				
                </div>	
            </div><!-- container -->
        </section><!-- main -->

        
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '../../www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-73239902-1', 'auto');
            ga('send', 'pageview');


    function showhide()
    {
        var div = document.getElementById("newpost");
        if (div.style.display !== "none") {
            div.style.display = "none";
        } else {
            div.style.display = "block";
        }
    }
    
    
     function showhideDonor()
            {
                var div = document.getElementById("Donor");
                var divhelper = document.getElementById("helper");
        //           alert(divhelper.style.display != "none");
                if (div.style.display == "none" && divhelper.style.display == "none") {
                    div.style.display = "block";
                    divhelper.style.display = "none";
                } else if (div.style.display != "none") {
                    div.style.display = "block";
                    divhelper.style.display = "none";
                } else if (divhelper.style.display != "none") {
                    divhelper.style.display = "none";
                    div.style.display = "block";
                }
            }
            function showhidehelper()
            {
                var div = document.getElementById("Donor");
                var divhelper = document.getElementById("helper");
                if (div.style.display == "none" || divhelper.style.display == "none") {
                    div.style.display = "block";
                    divhelper.style.display = "block";
                }
            }
            function showtxtAnyOthermeans()
            {
                var div = document.getElementById("txtAnyOthermeans");
                if (div.style.display !== "none") {
                    div.style.display = "none";
                } else {
                    div.style.display = "none";
                }
            }
            function hidetxtAnyOthermeans()
            {
                var div = document.getElementById("txtAnyOthermeans");
                if (div.style.display !== "none") {
                    div.style.display = "none";
                } else {
                    div.style.display = "none";
                }
            }
            function chkshow()
            {
                var div = document.getElementById("chkreadonly");
                var div1 = document.getElementById("chkreadonly1");
                var div2 = document.getElementById("chkreadonly2");
                if (div.disabled == true || div1.disabled == true || div2.disabled == true) {
                    div.disabled = false;
                    div1.disabled = false;
                    div2.disabled = false;
                } else {
                    div.disabled = true;
                    div1.disabled = true;
                    div2.disabled = true;
                }
            }
            function chkshowage()
            {
                var div = document.getElementById("chkreadonlyage");
                var div1 = document.getElementById("chkreadonlyage1");
                var div2 = document.getElementById("chkreadonlyage2");
                var div3 = document.getElementById("chkreadonlyage3");
                if (div.disabled == true || div1.disabled == true || div2.disabled == true || div3.disabled == true) {
                    div.disabled = false;
                    div1.disabled = false;
                    div2.disabled = false;
                    div3.disabled = false;
                } else {
                    div.disabled = true;
                    div1.disabled = true;
                    div2.disabled = true;
                    div3.disabled = true;
                }
            }

            function Monetary()
            {
                var div = document.getElementById("txtMonetary");
                var div1 = document.getElementById("txtNonMonetary");
                if (div.style.display !== "none") {
                    div.style.display = "block";
                } else {
                    div.style.display = "block";
                    div1.style.display = "none";
                }
            }
            function NonMonetary()
            {
                var div = document.getElementById("txtMonetary");
                var div1 = document.getElementById("txtNonMonetary");
                if (div1.style.display !== "none") {
                    div1.style.display = "block";
                } else {
                    div.style.display = "none";
                    div1.style.display = "block";
                }
            }
            function Free()
            {
                var div = document.getElementById("txtMonetary");
                var div1 = document.getElementById("txtNonMonetary");
                if (div.style.display !== "none" || div1.style.display !== "none") {
                    div1.style.display = "none";
                    div.style.display = "none";

                } else
                {
                    div1.style.display = "none";
                    div.style.display = "none";
                }
            }
            function showyes()
            {
                var div = document.getElementById("txtReason");
                if (div.style.display !== "none") {
                    div.style.display = "block";
                } else {
                    div.style.display = "block";
                }
            }
            function hideno()
            {
                var div = document.getElementById("txtReason");
                if (div.style.display !== "none") {
                    div.style.display = "none";
                } else {
                    div.style.display = "none";
                }
            }
                                        </script>
@endsection