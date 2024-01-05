@extends('user.layout.master')
@section('title','Login')
@section('content')
<section id="main" class="clearfix user-page">
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
                            <h2>Login</h2>
                            <!-- form -->
                            <form class="form-horizontal" role="form" method="POST" action="{{route('user.login.pinForm')}}" id="formLogin" >
                                  {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                                    <input type="text" class="form-control" pattern="[0-9]*" inputmode="numeric"
                                    maxlength="10" minlength="9" id="contact_field" name="contact" value="{{ old('contact') }}" placeholder="Mobile No." onkeypress="return isnumber(event)" autofocus >
                                    @if ($errors->has('contact'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('contact') }}</strong>
                                        </span>
                                    @endif
                                </div>
                               <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input id="password" pattern="[0-9]*" inputmode="numeric" type="password" class="form-control" name="password" placeholder="PIN (4 Digits only)" maxlength="4" minlength="3"  onkeypress="return isnumber(event)">
                                            <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div> 
								<div class="user-option">
                                <button type="submit" class="btn">
                                    Login
                                </button>
								
								 <div class="forgot-password1">
                                       <br /> <a class="btn-link" href="{{ url('/user/login-via-otp') }}">
                                            Login via OTP
                                        </a>
                                    </div>
                            </form><!-- form -->

                            
                        </div>
                        <a href="{{ url('/user/register') }}" class="btn-primary">Create a New Account</a>
                    </div><!-- user-login -->			
                </div><!-- row -->	
            </div><!-- container -->
        </section><!-- signin-page -->

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
    var from_error={};
    $(function(){
    $("input[name='contact']").on('focusout',function(){
        var text_=$(this);
        
        // if(text_.val().length!==10)
        // {
        //     if($(this).parent().children(".error-li").length<1)
        //     {
        //         // alert('1');
        //         text_.parent().append('<li class="error-li"> Invalid Number. Enter 10 digits registered mobile number.</li>');
        //         $(this).css({"border": "1px solid #d75d54"});
        //         from_error['text']="Invalid Title";   
        //     }
            
        // }
        // else {
        //     $(this).next(".error-li").remove();
        //     $(this).css({"border": "1px solid #00a651"});
        // }
    });
    $("input[name='password']").on('focusout',function(){
        var text_=$(this);
        // $(".error-li").remove();
        if(text_.val().length!==4)
        {
            if($(this).parent().children(".error-li").length<1)
            {
                text_.parent().append('<li class="error-li"> PIN must have 4 digits.</li>');
                $(this).css({"border": "1px solid #d75d54"});
                from_error['text']="Invalid Title";
            }    
        }
        else {
            
            $(this).parent('div').find(".error-li").remove();
            $(this).css({"border": "1px solid #00a651"});
        }
    });
        $("#formLogin").submit(function(e){
            if($('.error-li').length>0)
            {
                var result=$("<div>");
                result.html('<li class="error-li"> Fill Required fields first.</li>');
                result.css('color','red');
                return false; 
            }
            
            var status=true;
            var error_msz='';
            
            var contact_nod = $('input[name="contact"]'); 
            var password_nod = $('input[name="password"]'); 
            // if(contact_nod.val().trim().length=10 || contact_nod.val().trim().length>15 ||(!contact_nod.val().match(/^[0-9\.\-\+\s]+$/) ))
            if(contact_nod.val().trim().length!==10)
            {

                contact_nod.parent().append('<li class="error-li"> Invalid Number. Enter 10 digits registered mobile number.</li>');
                status=false;
            }
            if(password_nod.val().trim().length!==4)
            {
                password_nod.parent().append('<li class="error-li"> Password must have 4 digits.</li>');
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
  <script> 
    function isnumber(evt) { 
          
        // Only ASCII charactar in that range allowed 
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
            return false; 
        return true; 
    } 
</script> 
@endpush