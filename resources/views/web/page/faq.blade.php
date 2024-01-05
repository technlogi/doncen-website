@extends('user.layout.master')
@section('title','Category List')
@section('content')
   <!-- main -->   
 

       <section id="main" class="clearfix page">
        <div class="container">
            <div class="faq-page">
                <div class="breadcrumb-section">
                    <!-- breadcrumb -->
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li>FAQ</li>
                    </ol><!-- breadcrumb -->                        
                    <h2 class="title">Trade ads FAQ</h2>
                </div>
                                
                <div class="accordion">
                    <div class="panel-group" id="accordion">            

                        <div class="panel panel-default panel-faq">
                            <div class="panel-heading active-faq">
                                <a data-toggle="collapse" data-parent="#accordion" href="#faq-one">
                                    <h4 class="panel-title">
                                    Claritas est etiam processus? 
                                    <span class="pull-right"><i class="fa fa-minus"></i></span>
                                    </h4>
                                </a>
                            </div><!-- panel-heading -->

                            <div id="faq-one" class="panel-collapse collapse collapse in">
                                <div class="panel-body">
                                    <p>Consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla</p>
                                    <p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum</p>
                                    <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi</p>
                                </div>
                            </div>
                        </div><!-- panel -->

                        <div class="panel panel-default panel-faq">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion" href="#faq-two">
                                    <h4 class="panel-title">
                                    Vel illum dolore eu? 
                                    <span class="pull-right"><i class="fa fa-plus"></i></span>
                                    </h4>
                                </a>
                            </div><!-- panel-heading -->

                            <div id="faq-two" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla</p>
                                    <p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl</p> 
                                </div>
                            </div>
                        </div><!-- panel -->

                        <div class="panel panel-default panel-faq">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion" href="#faq-three">
                                    <h4 class="panel-title">
                                    Nam liber tempor cum soluta? 
                                    <span class="pull-right"><i class="fa fa-plus"></i></span>
                                    </h4>
                                </a>
                            </div><!-- panel-heading -->

                            <div id="faq-three" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                    <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</p>                                  
                                    <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi,</p>
                                </div>
                            </div>
                        </div><!-- panel -->

                        <div class="panel panel-default panel-faq">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion" href="#faq-four">
                                    <h4 class="panel-title">
                                    Claritas est etiam processus dynamicus? 
                                    <span class="pull-right"><i class="fa fa-plus"></i></span>
                                    </h4>
                                </a>
                            </div><!-- panel-heading -->

                            <div id="faq-four" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</p>                                  
                                    <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi,</p>
                                </div>
                            </div>
                        </div><!-- panel -->

                        <div class="panel panel-default panel-faq">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion" href="#faq-five">
                                    <h4 class="panel-title">
                                    Duis autem vel eum iriure dolor? 
                                    <span class="pull-right"><i class="fa fa-plus"></i></span>
                                    </h4>
                                </a>
                            </div><!-- panel-heading -->

                            <div id="faq-five" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>p ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option con</p>
                                    <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</p>                                  
                                    <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi,</p>
                                </div>
                            </div>
                        </div><!-- panel -->

                        <div class="panel panel-default panel-faq">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion" href="#faq-six">
                                    <h4 class="panel-title">
                                    Mirum est notare quam littera gothica? 
                                    <span class="pull-right"><i class="fa fa-plus"></i></span>
                                    </h4>
                                </a>
                            </div><!-- panel-heading -->

                            <div id="faq-six" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option con</p>
                                    <p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</p>                                 
                                    <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi,</p>
                                </div>
                            </div>
                        </div><!-- panel -->
                    </div>
                </div>
                
            </div><!-- faq-page -->
        </div><!-- container -->
        <section id="something-sell" class="clearfix parallax-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h2 class="title">Did Not find your answer yet? Still need help ?</h2>
                        <h4>Send us a note to Help Center</h4>
                        <a href="contact-us.html" class="btn btn-primary">Contact Us</a>
                    </div>
                </div><!-- row -->
            </div><!-- contaioner -->
        </section><!-- something-sell -->
    </section>
        
        <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@push('javaScript')

<!-- <script>

    var timer = null;
    $('.search_text').keyup(function(){ 
        
        var query = $(this).val();
        var _token = $('input[name="_token"]').val();

        clearTimeout(timer); 
        timer = setTimeout(function(){
        
         // alert( _token);
         $.ajax({
          url:"{{ route('web.search_text_autocomplate') }}", 
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#search_text').fadeIn();  
            $('#search_text').html(data);
          }
         });
        } , 100)
    });

    var timer = null;
    $('.city_search_box').keyup(function(){ 
        
        var query = $(this).val();
        var _token = $('input[name="_token"]').val();

        clearTimeout(timer); 
        timer = setTimeout(function(){
        
         // alert( _token);
         $.ajax({
          url:"{{ route('web.city_search') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){

           $('#cityBrowsers').fadeIn();  
            $('#cityBrowsers').html(data);
          }
         });
        } , 100)
    });
$(function(){
   
   // function initializeAddress() {
   //    var input = document.getElementById('city_search_box');
   //    var options = {
   //      types: ['geocode'] //this should work !
   //    };
   //    var autocomplete = new google.maps.places.Autocomplete(input, options);
   //  }
   
   // google.maps.event.addDomListener(window, 'load', initializeAddress);
   //  var page = 1;      
   //  $.ajaxSetup({
   //      headers: {
   //          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   //      }
   //  });
	
    function call_ajax(url,data){
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
            type        : 'POST',
            url         : url, // the url where we want to POST
            data        : {data: data},
            beforeSend: function()
            {
                $('.ajax-loading').show();

                    $('.appendText').children().hide();
            },
            success: function(data){
                if(data.length == 0){
                    $('.ajax-loading').html("<div class='alert alert-info'><center>No more records!</center></div>");
                    return;
                }
                $('.ajax-loading').hide(); 
                $('.appendText').html(data);
	
            }
        });
    }
	
	
	@if(!Session::has('search'))
		/* call_ajax("{{ URL::route('web.home.getItemOnLoad')}}",{page: 0}); */
		SearchFormSubmit();
	@endif
   
    /* New Js Code Start*/
	
	
	
	/* For Home Page Re-Direct Search Values Call  End */
    $(".search_form").submit(function(e){
         e.preventDefault();
		 
         /*Get all the forms data*/
         /* var dropdownSearch=$('.dropdownSearch').val();
         var search_form=$('.search_form').serializeArray();
         var looking_for=$('.myForm').serializeArray();
         var categoryForm=$('.categoryForm').serializeArray();
         var subCategoryForm=$('.subCategoryForm').serializeArray();
         var specificationForm=$('.specificationForm').serializeArray();
         var conditionForm=$('.conditionForm').serializeArray();
         var considerationTypeForm=$('.considerationTypeForm').serializeArray();
         var donationTypeForm=$('.donationTypeForm').serializeArray();
         var preferenceTypeFormGenderList=$('.preferenceTypeFormGenderList').serializeArray();
            console.log($('.search_form').serializeArray());
            console.log($('.myForm').serializeArray());
         
        call_ajax("{{ route('home.searchPage.searchItem') }}",{
                    page: 1,
                    dropdownSearch:dropdownSearch,
                    data: $('.search_form').serializeArray(),
                    looking_for: $('.myForm').serializeArray(),
                    categoryForm: $('.categoryForm').serializeArray(),
                    subCategoryForm:$('.subCategoryForm').serializeArray(),
                    specificationForm:$('.specificationForm').serializeArray(),
                    conditionForm:$('.conditionForm').serializeArray(),
                    considerationTypeForm:$('.considerationTypeForm').serializeArray(),
                    donationTypeForm:$('.donationTypeForm').serializeArray(),
                    preferenceTypeFormGenderList:$('.preferenceTypeFormGenderList').serializeArray()
        }); */
		SearchFormSubmit();
    });

    /* New Js Code End*/



/* For Home Page Re-Direct Search Values Call  Start */
	/*Get all the forms data*/
			function SearchFormSubmit()
			{
					// alert('In');
                    /*Get all the forms data*/
					 var dropdownSearch=$('.dropdownSearch').val();
					 var search_form=$('.search_form').serializeArray();
					 var looking_for=$('.myForm').serializeArray();
					 var categoryForm=$('.categoryForm').serializeArray();
					 var subCategoryForm=$('.subCategoryForm').serializeArray();
					 var specificationForm=$('.specificationForm').serializeArray();
					 var conditionForm=$('.conditionForm').serializeArray();
					 var considerationTypeForm=$('.considerationTypeForm').serializeArray();
					 var donationTypeForm=$('.donationTypeForm').serializeArray();
					 var preferenceTypeFormGenderList=$('.preferenceTypeFormGenderList').serializeArray();
					 
				// POPUP
				// 	 var looking_for=$('.myForm1').serializeArray();
				// 	 var categoryForm=$('.categoryForm1').serializeArray();
				// 	 var subCategoryForm=$('.subCategoryForm1').serializeArray();
				// 	 var specificationForm=$('.specificationForm1').serializeArray();
				// 	 var conditionForm=$('.conditionForm1').serializeArray();
				// 	 var considerationTypeForm=$('.considerationTypeForm1').serializeArray();
				// 	 var donationTypeForm=$('.donationTypeForm1').serializeArray();
				// 	 var preferenceTypeFormGenderList=$('.preferenceTypeFormGenderList1').serializeArray();
					 
						// console.log($('.search_form').serializeArray());
						// console.log($('.myForm').serializeArray());
					
					// POPUP	
				// 		console.log($('.myForm1').serializeArray());
					 
					call_ajax("{{ route('home.searchPage.searchItem') }}",{
								page: 0 ,
								dropdownSearch:dropdownSearch,
								data: $('.search_form').serializeArray(),
								looking_for: $('.myForm').serializeArray(),
								categoryForm: $('.categoryForm').serializeArray(),
								subCategoryForm:$('.subCategoryForm').serializeArray(),
								specificationForm:$('.specificationForm').serializeArray(),
								conditionForm:$('.conditionForm').serializeArray(),
								considerationTypeForm:$('.considerationTypeForm').serializeArray(),
								donationTypeForm:$('.donationTypeForm').serializeArray(),
								preferenceTypeFormGenderList:$('.preferenceTypeFormGenderList').serializeArray()
								
							// POPUP	
								// looking_for: $('.myForm1').serializeArray(),
								// categoryForm: $('.categoryForm1').serializeArray(),
								// subCategoryForm:$('.subCategoryForm1').serializeArray(),
								// specificationForm:$('.specificationForm1').serializeArray(),
								// conditionForm:$('.conditionForm1').serializeArray(),
								// considerationTypeForm:$('.considerationTypeForm1').serializeArray(),
								// donationTypeForm:$('.donationTypeForm1').serializeArray(),
								// preferenceTypeFormGenderList:$('.preferenceTypeFormGenderList1').serializeArray()

			});
		}
		
	
	@if($homeCity!='' || $homeCategory!='' || $homeword!='')
			SearchFormSubmit();
	@endif
		


    //Get list of category and subcateegory
		$('.categoryClass').click(function() {
			SearchFormSubmit();
    });
	
	/* preference */
		$('.preference').click(function() {
			SearchFormSubmit();
    });	
    $('.selectCategory').click(function() {
       	
        var _token = $('input[name="_token"]').val();
        // alert('start');
        SearchFormSubmit();
        // alert('process');
		$.ajax({
            type        : 'POST',
			// dataType    : 'JSON',
            url         : "{{ URL::route('search.category.subcategory') }}", // the url where we want to POST
            data        : {data: $('.categoryForm').serialize(), _token:_token},

            success:function(data){
                
                // alert('12');
                // alert(data);
                $('.subcategories').html(data);
            },
             error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error: ' + textStatus + ' ' + errorThrown);
                  }
        });
    });

    //drop down search
    $("#dropdownSearch").on('change',function(){
			SearchFormSubmit();
    });

    //category wise search
    $(".donationTypeCategory").click(function() {
			SearchFormSubmit();
    });

    //anyConsideration wise search
    $("#considerationTypeForm").click(function() {
			SearchFormSubmit();
    });

    //condition wise search
    $(".conditionInput").click(function() {
		SearchFormSubmit();
    });
   
    $(document).on('click','.selectSubCategory',function(){
		SearchFormSubmit();
		 $.ajax({
				type        : 'POST',
				url         : "{{ URL::route('search.subcategory.specification') }}", // the url where we want to POST
				data        : {data: $('.subCategoryForm').serialize()},
				success: function(data){
					$('.specificationHtml').html(data);
				}
			});
    });
    
    $(document).on('click','.selectSpecifiction',function(){
    		SearchFormSubmit();
   });

});
</script>
<script type="text/javascript">
$(window).on('hashchange', function() {
	
    if (window.location.hash) {
        var page = window.location.hash.replace('#', '');
        if (page == Number.NaN || page <= 0) {
            return false;
        }else{
			
		}
    }
});

/* Pagination Script */
$(document).ready(function()
{
    

    $(document).on('click', '.pagination a',function(event)
    {
        event.preventDefault();
        $('li').removeClass('active');
        $(this).parent().addClass('active');
        var myurl = $(this).attr('href');
        var page=$(this).attr('href').split('page=')[1];
        getData(page);
    });
    @if($homeCategory!='')
      $(".selectCategory[data-in]").trigger( "click" );
    @endif
});


function getData(page){
					 var dropdownSearch=$('.dropdownSearch').val();
					 var search_form=$('.search_form').serializeArray();
					 var looking_for=$('.myForm').serializeArray();
					 var categoryForm=$('.categoryForm').serializeArray();
					 var subCategoryForm=$('.subCategoryForm').serializeArray();
					 var specificationForm=$('.specificationForm').serializeArray();
					 var conditionForm=$('.conditionForm').serializeArray();
					 var considerationTypeForm=$('.considerationTypeForm').serializeArray();
					 var donationTypeForm=$('.donationTypeForm').serializeArray();
					 var preferenceTypeFormGenderList=$('.preferenceTypeFormGenderList').serializeArray();
					 
			    // POPUP
				// 	 var looking_for=$('.myForm1').serializeArray();
				// 	 var categoryForm=$('.categoryForm1').serializeArray();
				// 	 var subCategoryForm=$('.subCategoryForm1').serializeArray();
				// 	 var specificationForm=$('.specificationForm1').serializeArray();
				// 	 var conditionForm=$('.conditionForm1').serializeArray();
				// 	 var considerationTypeForm=$('.considerationTypeForm1').serializeArray();
				// 	 var donationTypeForm=$('.donationTypeForm1').serializeArray();
				// 	 var preferenceTypeFormGenderList=$('.preferenceTypeFormGenderList1').serializeArray();
					 
					 // 	console.log($('.search_form').serializeArray());
						// console.log($('.myForm').serializeArray());
					 
					//POPUP
					   // console.log($('.myForm1').serializeArray());
					
					
					
					call_ajax("{{ route('home.searchPage.searchItem') }}",{
								page: page,
								dropdownSearch:dropdownSearch,
								data: $('.search_form').serializeArray(),
								looking_for: $('.myForm').serializeArray(),
								categoryForm: $('.categoryForm').serializeArray(),
								subCategoryForm:$('.subCategoryForm').serializeArray(),
								specificationForm:$('.specificationForm').serializeArray(),
								conditionForm:$('.conditionForm').serializeArray(),
								considerationTypeForm:$('.considerationTypeForm').serializeArray(),
								donationTypeForm:$('.donationTypeForm').serializeArray(),
								preferenceTypeFormGenderList:$('.preferenceTypeFormGenderList').serializeArray()
								
				// 			//POPUP
				// 			    looking_for: $('.myForm1').serializeArray(),
				// 				categoryForm: $('.categoryForm1').serializeArray(),
				// 				subCategoryForm:$('.subCategoryForm1').serializeArray(),
				// 				specificationForm:$('.specificationForm1').serializeArray(),
				// 				conditionForm:$('.conditionForm1').serializeArray(),
				// 				considerationTypeForm:$('.considerationTypeForm1').serializeArray(),
				// 				donationTypeForm:$('.donationTypeForm1').serializeArray(),
				// 				preferenceTypeFormGenderList:$('.preferenceTypeFormGenderList1').serializeArray()
								
					
			});
			/* For Hash Value Change Duplicate Of call_ajax */
		function call_ajax(url,data){
			$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
				type        : 'POST',
				url         : url, // the url where we want to POST
				data        : {data: data},
				beforeSend: function()
				{
					$('.ajax-loading').show();
                    
                    $('.appendText').children().hide();
				},
				success: function(data){
					location.hash = page;
					if(data.length == 0){
						$('.ajax-loading').html("<div class='alert alert-info'><center>No more records!</center></div>");
						return;
					}
					$('.ajax-loading').hide(); 
					$('.appendText').html(data);
		
				}
		});
		
    }
        /*  */
}

</script> -->
<style>
/* CHECK BOX CSS START*/
input[type='checkbox'] {
    -webkit-appearance:none;
    width:19px;
    height:20px;
    border:1px solid darkgray;
    /*border-radius:50%;*/
    /*outline:none;*/
    /*box-shadow:0 0 5px 0px gray inset;*/
    margin-left: 15px !important;
    margin-right: 10px;
    padding: 0px 1px;
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

@media (max-width: 1199px) and (min-width: 992px){
		.ad-meta{
			width:100% !important;	
		}
        .item-info{
            min-height:152px !important;
        }

}

@media (min-width: 768px) and (max-width: 991px) {
    .banner-form-full.banner-form .form-control, .banner-form-full.banner-form .category-dropdown {
        width: 25%;
    }

    .ad-meta{
        width:100% !important;  
    }

    .item-info{
        min-height:152px !important;
    }

}

@media only screen and (max-width: 768px) {
	.ad-meta{
		width:100% !important;	
	}
	 /*.pull-right{
		float:none !important;
	}*/
	.ad-meta .user-option a{
		width:initial !important;	
	}
	.ad-meta .meta-content{
			display:intial !important;
			vertical-align:intial !important;
	}
	.carousel-inner>.item>a>img, .carousel-inner>.item>img, .img-responsive, .thumbnail a>img, .thumbnail>img{
		//height:124px !important;
	}
	/*.item-info{
		min-height:234px !important;
	}*/
	/*.ad-info{
		padding:0px 0px !important;	
	}*/
	/*.ad-meta{
		z-index:1 !important;
		top:18% !important;
	}*/
	.item-image-box .item-image img{
		height:170px !important;
	}
	/*.ad-info span{
		 display:none !important;
	}*/
	/*.category-item{
		max-height:234px !important;
		min-height:234px !important;
	}*/
	.item-title{
		height:23px !important;
		overflow:hidden !important;
	}
		
}
</style>

<!-- @endpush
@php
Session::forget('search','');
Session::forget('homePageCategoryId','');
unset($homeCity);
unset($homeCategory);
unset($homeword);

@endphp -->