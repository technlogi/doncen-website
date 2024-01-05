$(function(){
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
        type        : 'POST',
        url         : "{{ URL::route('web.home.getItemOnLoad')}}", // the url where we want to POST
        success: function(data){
                $('.appendText').html(data);
        }
    });
  $("#city_search_box").autocomplete({
    source: function(request, response) {
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
           });
            $.ajax({
                type: "POST",
                url: "{{ route('home.search.city') }}",
                dataType: "json",
                data: {
                    city : request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
    minLength: 2,
  });
  $("#category_box").autocomplete({
        source: function(request, response) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
           });
            $.ajax({
                type: "POST",
                url: "{{ route('home.search.category') }}",
                dataType: "json",
                data: {
                    category : request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
      minLength: 1,
  });
  $("#search_form").submit(function(e){
    e.preventDefault();
    var data = $(this).serializeArray();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
     });

    $.ajax({
        type: "POST",
        url: "{{ route('home.searchPage.searchItem') }}",
        data: data,
        success: function(response){
            $('.appendText').html(response);
        }
    });
  });
  $("#dropdownSearch").on('click',function(){
    var id = $(this).val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
     });
    $.ajax({
        type: "POST",
        url: "{{ route('home.searchPage.dropDownSearchItem') }}",
        data: {id : id},
        success: function(response){
            $('.appendText').html(response);
        }
    });
  });
 
});