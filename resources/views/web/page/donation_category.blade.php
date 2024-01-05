@extends('user.layout.master')
@section('title','Donation Category')
@section('content')
     <!-- post-page -->
     <meta name="csrf-token" content="{{ csrf_token() }}">
        <section id="main" class="clearfix ad-post-page">
            <div class="container">

                <div class="breadcrumb-section col-xs-12 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                    
                    <!-- breadcrumb -->
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li>Donation Form</li>
                        <li>( You must be logged-in before filling form. )</li>
                        
                    </ol><!-- breadcrumb -->						
                    <h2 class="title">Donate anything, whatever you can think.</h2>
               </div><!-- banner -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 banner-form">
                    <form method="POST" id="search_form" action="{{ route('web.categorie.donationDetails') }}"> 
                          <!-- <input type="hidden" name="specification" id="specification_field"  /> -->
                         {{ csrf_field() }}
                          @if (Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                          @endif
                          @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                          @endif 
                        <input type="text"  autocomplete="off" list="category_list" name="specification_search" id="search_category" class="form-control input-lg" placeholder="Search and select your donation category"  style="margin-left: 0px; width: 88% !important; min-width: 5% !important;" />
                          <datalist id="category_list" >
                             
                          </datalist>
                        <button type="submit" class="btn btn-main proceed-btn" style="float: right; padding: 12px;">Proceed</button>
                    </form>
                    <style scoped>
                        /* 0 to 299 */
                        /*.on-the-fly-behavior {
                            background-image: url('particular_ad_small.png'); 
                        }*/
                        /* 300 to X */
                        @media (max-width: 767px) { /* or 301 if you want really the same as previously.  */
                            .proceed-btn
                            {
                              width: 100%;
                            }
                            #search_category
                            {
                              width: 100%;
                            }
                        }
                    </style>
                </div> 
                  

 
   {{ csrf_field() }}
  
<!-- DESKTOP VERSION -->
                <div class="hidden-xs col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="row category-tab">	
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                            <div class="section cat-option select-category post-option">
                                <h4>Select your donation category</h4>

                                <ul role="tablist" style="list-style: disc;">
                                  
                                         {{ csrf_field() }}
                                         
                                         


                                      @foreach($categories as $category)
                                      <a  class="category"  id="{{$category->key}}" aria-controls="cat1" role="tab" data-toggle="tab">
                                          <li class="">
                                                <!-- <img class="img-responsive" src="http://localhost:8000/uploads/images/doncen-responsive.png" alt="Logo"> -->
                                                {{ $category->name }}
                                            </li>
                                        </a>
                                      @endforeach

                                      
                                        <!-- <li class="other_category_btn"> Other
                                        </li>
                                            <span class="other_category_input" style="display: none">
                                                <input type="hidden" name="user_add_category" value="1">
                                                <input type="text" name="other_category" autocomplete="off" placeholder="Add new category">
                                                <input type="submit" class="add_category btn-main" name="submit" value="Add" >
                                            </span> -->
                                          
                                </ul>
                            </div>
                        </div>

                        <!-- Tab panes -->

                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 appendSubCategory">
                            {{ csrf_field() }}
                            <span id="new_category_id"></span>
                                
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 appendSpecification">
                            {{ csrf_field() }}
                            <span id = "new_subcategory_id"></span>
                            
                             
                                         

                                
                        </div><!-- next-stap -->
                    </div>
                   
                </div>

<!-- MOBILE VERSION -->
                <div class="col-xs-12 hidden-sm hidden-md hidden-lg hidden-xl">
                    <div class="row category-tab">  
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="section cat-option select-category post-option">
                                <h4>Select a Category</h4>
                                <ul role="tablist" style="list-style: disc;">
                                      @foreach($categories as $category)
                                      <a  class="category"  id="{{$category->key}}" aria-controls="cat1" role="tab" data-toggle="tab">
                                          <li class="">
                                                <!-- <img class="img-responsive" src="http://localhost:8000/uploads/images/doncen-responsive.png" alt="Logo"> -->
                                                {{ $category->name }}
                                            </li>
                                        </a>
                                      @endforeach
                                      <div role="tabpanel" class="appendSubCategory">
                                      <span id="new_category_id"></span> 


                                </ul>

                                      <div role="tabpanel" class="appendSpecification" style="margin-left: 30px;">
                                      <span id="new_subcategory_id"></span>


                                <!-- <div class="next-stap button_section text-center" style="padding-bottom: 15px;"> -->
                                    
                                        <!-- <form method="POST"  action="{{ route('web.categorie.donationDetails') }}">  -->
                                             <!-- {{ csrf_field() }} -->
                                            <!-- <input type="hidden" name="specification" id="specification_field"  /> -->
                                            <!-- <button type="text" class="btn"><a href="{{ route('web.home') }}" >Cancel</a></button> -->
                                            <!-- <button type="submit" class="btn" >Proceed</button> -->
                                        <!-- </form>    -->
                                    
                                <!-- </div> -->
                            </div>
                        </div>

                    </div>
                   
                </div>






                			
            </div><!-- container -->
        </section><!-- post-page -->
@endsection
@push('javaScript')
<!-- Ovveride Css -->
<style>
	.next-stap .btn{
        border: 2px solid #00a651;
        background-color: transparent;
    	color: #00a651;
    }
    .next-stap .btn:hover{
        border: 2px solid #00a651;
        background-color: #00a651;
    	color: #FFFFFF;
    }
</style>


<script>
$(document).ready(function(){

    var timer = null;
    $('#search_category').keyup(function(){ 
        
        var query = $(this).val();
        var _token = $('input[name="_token"]').val();

        clearTimeout(timer); 
        timer = setTimeout(function(){
        
         // alert( _token);
         $.ajax({
          url:"{{ route('web.donation.auto_complate_list') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#category_list').fadeIn();  
            $('#category_list').html(data);
          }
         });
        } , 30)
    });

    $(document).on('click', 'li', function(){  
        $('#specification').val($(this).text());  
        $('#category_list').fadeOut();  
    });  

});
</script>
<!-- DESKTOP -->
<script>

  $(function(){
     $('.button_section').hide();

     

    $(document).on("click", ".add_category" , function(){

        var user_add_category = '1';
        var category_name = $('input[name = other_category]').val();
        
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
         type:'POST',
         url: "{{ URL::route('admin.donationItem.category.create')}}",
         data: { category_name:category_name, user_add_category:user_add_category},
         success: function(data) {
            

            $('.category').hide();

            // $('#new_category_id').append('<input type="hidden" name="select_category" id="select_category" value="'+data+'" />');
            
            
            $('<a class="category"  id='+ data +' aria-controls="cat1" role="tab" data-toggle="tab" ><li>'+ category_name +'</li> </a>').insertBefore(".category:first");

            $('.button_section').hide();
            $id = data; //Key of category

                  // $.ajaxSetup({
                  //   headers: {
                  //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  //   }
                  // });
                  //   $('.appendSubCategory').children().hide();
                  //   $.ajax({
                  //    type:'POST',
                  //    url: "{{ URL::route('web.categorie.subcategories') }}",
                  //    data: { key: $id},
                  //    success: function(data) {

                  //      $('.appendSubCategory').append(data);
                  //      $('.button_section').hide();
                  //      $('#category_field').val($id);

                  //    }
                  //  });
                }
            });

    });

  
  $(document).on("click", ".add_subcategory" , function(){
        
        
        
        var user_add_subcategory = '1';
        var new_category_id = $('#select_subcategory').val();
        var subcategory_name = $('input[name = other_subcategory]').val();
        
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
         type:'POST',
         url: "{{ URL::route('admin.donationItem.subCategory.create')}}",
         data: { subcategory_name:subcategory_name, user_add_subcategory:user_add_subcategory, new_category_id:new_category_id},
         success: function(data) {
          

          // $('.subcategory').hide();

          // $('#new_subcategory_id').append('<input type="hidden" name="select_subcategory" id="select_subcategory" value="'+data+'" />');

          $('<a class="subcategory"  id='+ data +' aria-controls="platelets" role="tab" data-toggle="tab" ><li>'+ subcategory_name +'</li> </a>').insertBefore(".new_added_subcategory");



              $('.button_section').hide();
              $id = data; //Key of category

              // $.ajaxSetup({
              //   headers: {
              //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              //   }
              // });

             //  $('.appendSpecification').children().hide();
             //  $.ajax({
             //   type:'POST',
             //   url: "{{ URL::route('web.categorie.specification') }}",
             //   data: { key: $id},
             //   success: function(data) {
             //     $('.appendSpecification').append(data);
             //     $('.button_section').hide();
             //     $('#subcatgory_field').val($id);
             //   }
             // });

            }
          });

      });

  $(document).on("click", ".add_specification" , function(){
    // var id = $(this).attr('id');
    // alert("Hi");
    // alert($('input[name = other_specification_new]').val());
    // alert($('input[name = other_specification]').val());
   

    var user_add_specification = '1';
    var new_subcategory_id = $('#select_specification').val();
    var specification_name = $('input[name = other_specification_new]').val();
    
    // alert(specification_name);
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    // alert(new_subcategory_id);
    $.ajax({
     type:'POST',
     url: "{{ URL::route('admin.donationItem.specification.create')}}",
     data: { specification_name:specification_name, user_add_specification:user_add_specification, new_subcategory_id:new_subcategory_id},
     success: function(data) {
              // alert(data);

              // $('.category').not($('#'+data+'').parents().addBack()).hide();
              
              $('.specification').hide();
              $('<a class="specification"  id='+ data +' aria-controls="platelets" role="tab" data-toggle="tab" ><li>'+ specification_name +'</li> </a>').insertBefore(".new_added_specification");

              
              // $('.Scategory:first').prepend('<a class="category"  id='+ data +' aria-controls="cat1" role="tab" data-toggle="tab" ><li class="">'+ specification_name +'</li> </a>');


              $('.button_section').hide();
                $id = data; //Key of category

              // $.ajaxSetup({
              //   headers: {
              //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              //   }
              // });

             //  $('.appendSpecification').children().hide();
             //  $.ajax({
             //   type:'POST',
             //   url: "{{ URL::route('web.categorie.specification') }}",
             //   data: { key: $id},
             //   success: function(data) {
             //     $('.appendSpecification').append(data);
             //     $('.button_section').show();
             //     $('#subcatgory_field').val($id);
             //   }
             // });

            }
          });

  });
 
 // $(function(){
     $('.button_section').hide();

   // $('.category').on('click',function()

   $(document).on("click", ".category" , function(){

      $(this).closest('div').find('.category').not(this).hide();

      $('.button_section').hide();
      $id = $(this).attr('id');

      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
     });
     $('.appendSubCategory').children().hide();
      $.ajax({
       type:'POST',
       url: "{{ URL::route('web.categorie.subcategories') }}",
       data: { key: $id},
       success: function(data) {
           
           $('.appendSubCategory').append(data);
           $('.button_section').hide();
           $('#category_field').val($id);

           $('#new_category_id').append('<input type="hidden" name="select_subcategory" id="select_subcategory" value="'+$id+'" />');
// 
       }
      });
   });

   

   $(document).on("click", ".subcategory" , function() {
      
      $(this).closest('div').find('.subcategory').not(this).hide();
      $id = $(this).attr('id');
      $('.button_section').hide();
      $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
      });
      $('.appendSpecification').children().hide();
      $.ajax({
         type:'POST',
         url: "{{ URL::route('web.categorie.specification') }}",
         data: { key: $id},
         success: function(data) {
             $('.appendSpecification').append(data);
             $('.button_section').hide();
             $('#subcatgory_field').val($id);

             $('#new_subcategory_id').append('<input type="hidden" name="select_specification" id="select_specification" value="'+$id+'" />');
         }
        });
   });

     $(document).on("click", ".specification" , function() {
          
          $(this).closest('div').find('.specification').not(this).hide();

          $id = $(this).attr('id');
          if($id != '' ){
               $('.button_section').show();
               $('.specification_field').val($id);
          }
     });


     $(document).on("click", ".other_category_btn" , function() {
          
          $('.other_category_input').toggle();
     });

     $(document).on("click", ".other_subcategory_btn" , function() {
          
          $('.other_subcategory_input').toggle();
     });

     $(document).on("click", ".other_specification_btn" , function() {
          
          $('.other_specification_input').toggle();
     });

 });




</script>




@endpush