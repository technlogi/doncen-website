@extends('user.layout.master')
@section('title','Donation Category')
@section('content')
     <!-- post-page -->
     <meta name="csrf-token" content="{{ csrf_token() }}">
        <section id="main" class="clearfix ad-post-page">
            <div class="container">

                <div class="breadcrumb-section">
                    <!-- breadcrumb -->
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li>Donation Form</li>
                        <li>( You must be logged-in before filling donation form. )</li>
                        
                    </ol><!-- breadcrumb -->						
                    <h2 class="title">Donate anything, whatever you can think.</h2>
                </div><!-- banner -->

                <div id="">
                    <div class="row category-tab">	
                        <div class="col-md-4 col-sm-6">
                            <div class="section cat-option select-category post-option">
                                <h4>Select a Category</h4>
                                <ul role="tablist">
                                      @foreach($categories as $category)
                                      <a  class="category"  id="{{$category->key}}" aria-controls="cat1" role="tab" data-toggle="tab">
                                          <li class="">
                                                <!-- <img class="img-responsive" src="http://localhost:8000/uploads/images/doncen-responsive.png" alt="Logo"> -->
                                                {{ $category->name }}
                                            </li>
                                        </a>
                                      @endforeach  
                                </ul>
                            </div>
                        </div>

                        <!-- Tab panes -->

                        <div class="col-md-4 col-sm-6">
                            <div class="section tab-content select-category post-option">
                                <h4>Select a sub-category</h4>
                                <div role="tabpanel" class="appendSubCategory">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="section tab-content next-stap post-option">
                                <h4>Select a specification</h4>
                                <div role="tabpanel" class="appendSpecification">
                                </div>
                             
                                <div class="btn-section" id="button_section">
                                    <form method="POST"  action="{{ route('web.categorie.donationDetails') }}"> 
                                         {{ csrf_field() }}
                                        <input type="hidden" name="specification" id="specification_field"  />
                                        <!-- <button type="text" class="btn"><a href="{{ route('web.home') }}" >Cancel</a></button> -->
                                        <button type="submit" class="btn">Next</button>
                                    </form>   
                                </div>
                            </div>
                        </div><!-- next-stap -->
                    </div>
                   
                </div>				
            </div><!-- container -->
        </section><!-- post-page -->
@endsection
@push('javaScript')
<!-- Ovveride Css -->
<style>
	.next-stap .btn{
    border: 1px solid #00a651;
    background-color: transparent;
	color: #00a651;
}
</style>
<script src = "{{ URL::asset('/js/user/js/jquery.min.js')}} "></script>
<script>

 $(function(){
     $('#button_section').hide();
   $('.category').on('click',function(){
       $('#button_section').hide();
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
           $('#button_section').hide();
           $('#category_field').val($id);
       }
      });
   });
   $(document).on("click", ".subcategory" , function() {
    $id = $(this).attr('id');
    $('#button_section').hide();
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
           $('#button_section').hide();
           $('#subcatgory_field').val($id);
       }
      });
   });
   $(document).on("click", ".specification" , function() {
        $id = $(this).attr('id');
        if($id != '' ){
             $('#button_section').show();
             $('#specification_field').val($id);
        }
   });
 });
</script>
@endpush