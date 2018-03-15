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
                                <div role="tabpanel" class="appendSpecification">
                                </div>
                             
                                <div class="btn-section" id="button_section">
                                    <form method="POST"  action="{{ route('admin.users.categorie.insertPost') }}"> 
                                        <input type="hidden" name="category"      id="category_field"  />
                                        <input type="hidden" name="subcatgory"    id="subcatgory_field"  />
                                        <input type="hidden" name="specification" id="specification_field"  />
                                        <button type="submit" class="btn">Next</button>
                                    </form>   
                                    <button type="text" class="btn"> Cancel</button>
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
       url: "{{ URL::route('admin.users.categorie.subcategories') }}",
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
       url: "{{ URL::route('admin.users.categorie.specification') }}",
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