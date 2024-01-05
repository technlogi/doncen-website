@extends('user.layout.master')
@section('title','Registration')

@section('content')
<section id="main" class="clearfix user-page register-form">
            <div class="container">
                <div class="row text-center">
                    <!-- user-login -->			
                    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                        <div class="user-account">
                                @if (Session::has('error'))
                                      <div class="alert alert-danger">{{ Session::get('error') }}</div>
                                @endif
                                @if (Session::has('success'))
                                   <div class="alert alert-success">{{ Session::get('success') }}</div>
                                @endif
                            <h2>Create  Account</h2>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/register') }}" id="formReg">
                                 {{ csrf_field() }}
                                <!-- <div class="row form-group">
                                    <label class="col-sm-3 label-title">Status<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="radio" name="user_status" checked="" value="0" id="individual">&nbsp;&nbsp;
                                        <label for="individual">Individual</label>&nbsp;&nbsp;
                                        <input type="radio" name="user_status" value="1" id="dealer">&nbsp;&nbsp; 
                                        <label for="dealer">Organization</label>&nbsp;&nbsp;
                                    </div>
                                </div> -->
                                <!-- <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" >
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div> -->
                                <!-- <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Id">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div> -->
                                <!--<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">-->
                                <!--    <input type="text" id="searchTextField" class="form-control" name="address" value="{{ old('address') }}" placeholder="Location">-->
                                <!--    @if ($errors->has('address'))-->
                                <!--        <span class="help-block">-->
                                <!--            <strong>{{ $errors->first('address') }}</strong>-->
                                <!--        </span>-->
                                <!--    @endif-->
                                <!--</div>-->
                                <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                                    <input type="text" class="form-control" name="contact" pattern="[0-9]*" inputmode="numeric"
                                    maxlength="10" minlength="9" value="{{ old('contact') }}" placeholder="Mobile Number" onkeypress="return isnumber(event)" maxlength="10" >
                                    @if ($errors->has('contact'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('contact') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <input type="hidden" name="lat" id="lat" />
                                <input type="hidden" name="long" id="long" />
                                

                                <!-- <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input type="password" pattern="[0-9]*" inputmode="numeric" class="form-control password_ins" name="password" placeholder="PIN" maxlength="4" minlength="3" onkeypress="return isnumber(event)">
                                    <label class="eye-icon" for="textbox">
                                    <img class="eye-open" src="https://i.stack.imgur.com/Oyk1g.png" />
                                    <img class="eye-close" src="https://i.stack.imgur.com/waw4z.png" />
                                  </label>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div> -->

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input id="password" pattern="[0-9]*" inputmode="numeric" type="password" class="form-control" name="password" placeholder="PIN (4 Digits only)" maxlength="4" minlength="3"  onkeypress="return isnumber(event)">
                                            <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <input id="password-confirm" type="password" pattern="[0-9]*" inputmode="numeric" class="form-control" name="password_confirmation" placeholder="Confirm PIN" maxlength="4" minlength="3" onkeypress="return isnumber(event)">
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div> 
                                     By cliking registration, you agree to our Terms and Conditions.
                                <div class="checkbox ">
                                </div><!-- checkbox -->	
                                <button type="submit" class="btn">Registration</button>
                            </form>
                            <!-- checkbox -->

                        </div>
                    </div><!-- user-login -->			
                </div><!-- row -->	
            </div><!-- container -->
        </section><!-- signup-page -->
@endsection
<!-- password show and hide -->
<style type="text/css">
    .field-icon {
      float: right;
      
      margin-top: -30px;
      margin-right: 5px;  
      position: relative;
      z-index: 2;
    }

</style>
@push('javaScript')
<script type="text/javascript">
   function initialize() {
      var input = document.getElementById('searchTextField');
      var options = {
        types: ['geocode'] //this should work !
      };
      var autocomplete = new google.maps.places.Autocomplete(input, options);
   }
   google.maps.event.addDomListener(window, 'load', initialize);
   $('.eye-icon').on('click', function() {   
        var input = $(".password_ins");
        if (input.attr("type") === "password") {
            input.attr("type", "text");
            $('.eye-open').css("display",'none');
            $('.eye-close').css("display",'block');
        } else {
            input.attr("type", "password");
            $('.eye-close').css("display",'none');
            $('.eye-open').css("display",'block');
        }
    });
        
    
    var from_error={};
    $(function(){
        $('input[name="name"]').on('keyup',function(){
            var text_=$(this);
            
            if(text_.val().length<3)
            {
                if($(this).parent().children(".error-li").length<1)
                {
                    text_.parent().append('<li class="error-li"> Invalid name. Only Alphabates allowed (minimum 3).</li>');
                    $(this).css({"border": "1px solid #d75d54"});
                    from_error['text']="Invalid name";
                }    
            }
            else {
                $(this).next(".error-li").remove();
                $(this).next().next(".error-li").remove();
                $(this).css({"border": "1px solid #00a651"});
            }
        });
        
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
        
        $('input[name="address"]').on('keyup',function(){
            var text_=$(this);
            var location = new RegExp('^[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]{3}');
            
            if(text_.val().length>0 && (text_.val().length<15 && location.test(text_)))
            {
                if($(this).parent().children(".error-li").length<1)
                {
                    text_.parent().append('<li class="error-li"> It should have proper Location, City, State, Country.</li>');
                    $(this).css({"border": "1px solid #d75d54"});
                    from_error['text']="Invalid address";
                }
            }
            else {
                $(this).next().next(".error-li").remove();
                $(this).next().next().next(".error-li").remove();
                $(this).css({"border": "1px solid #00a651"});
            }
        });
        $('input[name="contact"]').on('keyup',function(){
            var text_=$(this);
            
            if(text_.val().length!==10)
            {
                if($(this).parent().children(".error-li").length<1)
                {
                    text_.parent().append('<li class="error-li"> Invalid Number. Enter 10 digits mobile number.</li>');
                    $(this).css({"border": "1px solid #d75d54"});
                    from_error['text']="Invalid contact number.";
                }
            }
            else {
                $(this).next(".error-li").remove();
                $(this).next().next(".error-li").remove();
                $(this).css({"border": "1px solid #00a651"});
            }
        });
        $("input[name='password']").on('keyup',function(){
            var text_=$(this);
            
            if(text_.val().length!==4)
            {
                if($(this).parent().children(".error-li").length<1)
                {
                    text_.parent().append('<li class="error-li"> PIN must have 4 digits.</li>');
                    $(this).css({"border": "1px solid #d75d54"});
                    from_error['text']="Invalid Password";
                }
            }
            else {
                $(this).next().next(".error-li").remove();
                $(this).next().next().next(".error-li").remove();
                $(this).css({"border": "1px solid #00a651"});
            }
        });
        $("input[name='password_confirmation']").on('keyup',function(){
            var text_=$(this);
            
            if(text_.val()!=$("input[name='password']").val())
            {
                if($(this).parent().children(".error-li").length<1)
                {
                    text_.parent().append('<li class="error-li"> PIN not matched.</li>');
                    $(this).css({"border": "1px solid #d75d54"});
                    from_error['text']="Password missmatch";
                }
            }
            else {
                $(this).next(".error-li").remove();
                $(this).next().next(".error-li").remove();
                $(this).css({"border": "1px solid #00a651"});
            }
        });
        
        
        //On submit form
        $("#formReg").submit(function(e){
            if($('.error-li').length>0)
            {
                var result=$("<div>");
                result.html('<li class="error-li"> Fill Required fields first.</li>');
                result.css('color','red');
                $("#formDonation").append(result);
                return false; 
            }
            var status=true;
            var error_msz='';
            $(".error-li").remove();
            var individual_nod = $("#individual"); 
            var dealer_nod = $("#dealer"); 
            var name_nod = $('input[name="name"]'); 
            var address_nod = $('input[name="address"]'); 
            var lat_nod = $('input[name="lat"]'); 
            var long_nod = $('input[name="long"]'); 
            
            var email_nod = $('input[name="email"]');
            var email = new RegExp('[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]');
            
            var contact_nod = $('input[name="contact"]'); 
            var password_nod = $('input[name="password"]'); 
            var password_confirm_nod = $('input[name="password_confirmation"]'); 
            if((individual_nod.val()==0 && dealer_nod.val()==0 ) || (individual_nod.val()==1 && dealer_nod.val()==1 ))
            {
                dealer_nod.parent().append('<li class="error-li"> Select either individual or deale</li>');
                status=false;
            }
            if(name_nod.val().trim().length<3)
            {

                name_nod.parent().append('<li class="error-li"> Invalid name. Only Alphabates allowed (minimum 3).</li>');
                // error_msz+="<li> Invalid name. Only Alphabates allowed (minimum 3).</li><br>";
                status=false;
            }
            if(email_nod.val().trim().length>0 && email.test(email_nod.val().trim()) == false)
            {

                email_nod.parent().append('<li class="error-li"> Invalid name. Only Alphabates allowed (minimum 3).</li>');
                // error_msz+="<li> Invalid name. Only Alphabates allowed (minimum 3).</li><br>";
                status=false;
            }
            if(address_nod.val().trim().length<15 )
            {
                address_nod.parent().append('<li class="error-li"> It should have proper Location, City, State, Country.</li>');
                // error_msz+="<li> <p>Invalid address_nod. Minimum 3 characters required.</p></li><br>";
                status=false;
            }
            if(contact_nod.val().trim().length!==10 )
            {
                contact_nod.parent().append('<li class="error-li"> Invalid Number. Enter 10 digits mobile number.</li>');
                // error_msz+="<li> <p>Invalid contact_nod. Minimum 3 characters required.</p></li><br>";
                status=false;
            }
            if(password_nod.val().trim().length!==4 )
            {
                password_nod.parent().append('<li class="error-li"> PIN must have 4 digits.</li>');
                // error_msz+="<li> <p>Invalid password_nod. Minimum 3 characters required.</p></li><br>";
                status=false;
            }
            if(password_nod.val()!= password_confirm_nod.val())
            {
                password_confirm_nod.parent().append('<li class="error-li"> PIN not matched.</li>');
                // error_msz+="<li> <p>Invalid password_confirm_nod. Minimum 3 characters required.</p></li><br>";
                status=false;
            }
            
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
@endpush