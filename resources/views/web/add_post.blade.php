@extends('user.layout.master')

@section('content')
     <!-- post-page -->
     <meta name="csrf-token" content="{{ csrf_token() }}">
        <section id="main" class="clearfix ad-post-page">
            <div class="container">

                <div class="breadcrumb-section">
                    <!-- breadcrumb -->
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li>Ad Post</li>
                    </ol><!-- breadcrumb -->						
                    <h2 class="title">Post Free Ad</h2>
                </div><!-- banner -->

                <div id="">
                    <div class="row category-tab">	
                        <div class="col-md-4 col-sm-6">
                            <div class="section cat-option select-category post-option">
                                <h4>Select a Category</h4>
                                <ul role="tablist">
                                      @foreach($categories as $category)
                                          <li class="">
                                            <a  class="category"  id="{{$category->key}}" aria-controls="cat1" role="tab" data-toggle="tab">
                                                <img class="img-responsive" src="http://localhost:8000/uploads/images/doncen-responsive.png" alt="Logo">
                                                {{ $category->name }}
                                            </a>
                                          </li>
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

                                <div role="tabpanel" class="tab-pane active" id="blood">                                    
                                    <ul>
                                        <li><a href="ad-post-details.html">A+</a></li>
                                        <li><a href="ad-post-details.html">B+</a></li>
                                        <li><a href="ad-post-details.html">AB+</a></li>
                                        <li><a href="ad-post-details.html">O-</a></li>                                        
                                    </ul>	
                                </div>
                             
                                <div class="btn-section">
                                    <!--<a href="ad-post-details.html" class="btn">Next</a>-->
                                    <a href="#" class="btn-info"> Cancle</a>
                                </div>
                            </div>
                        </div><!-- next-stap -->
                    </div>
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text-center">
                            <div class="ad-section">
                                <a href="#"><img src="images/ads/3.jpg" alt="Image" class="img-responsive"></a>
                            </div>
                        </div>
                    </div><!-- row -->
                </div>				
            </div><!-- container -->
        </section><!-- post-page -->
@endsection
@push('javaScript')
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
 $(function(){
   $('.category').on('click',function(){
      $id = $(this).attr('id');
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
     });
     $('.appendSubCategory').children().hide();
      $.ajax({
       type:'POST',
       url: "{{ URL::route('admin.users.categorie.subcategories') }}",
       data: { key: $id},
       success: function(data) {
           $('.appendSubCategory').append(data);
       }
      });
   });
   
 });
 $(function(){
   $('.subcategory').on('click',function(){
    alert('heoll');
    $id = $(this).attr('id');
      alert($id);

   });
   
 });
</script>
@endpush