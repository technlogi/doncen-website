@extends('user.layout.master')
@section('title','About Us')
@section('content')<!-- main -->
 <section id="main" class="clearfix about-us page">
            <div class="container">

                <div class="breadcrumb-section">
                    <ol class="breadcrumb">
                        <!-- <li><a href="index.html">Home</a></li> -->
                        <li>Check your nearest vaccination center and slots availability</li>

                    <h2 class="title">Vaccination Center</h2>	
                    </ol><!-- breadcrumb -->						
                </div><!-- banner -->

                <div>
                    <?php  
                        $curl = curl_init();
                            curl_setopt_array($curl, array(
                          CURLOPT_URL => "https://cdn-api.co-vin.in/api/v2/admin/location/states",
                          CURLOPT_RETURNTRANSFER => true,
                          CURLOPT_ENCODING => "",
                          CURLOPT_MAXREDIRS => 10,
                          CURLOPT_TIMEOUT => 30,
                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                          CURLOPT_CUSTOMREQUEST => "GET",
                          CURLOPT_HTTPHEADER => array(
                            "cache-control: no-cache",
                            "postman-token: 786caf8a-a457-f8d6-dda4-52ce10129109"
                          ),
                        ));

                        $state_response = curl_exec($curl);
                        $err = curl_error($curl);

                        curl_close($curl);

                        if ($err) {
                          echo "cURL Error #:" . $err;
                        } 

                          ?>
                        
                        <?php

                        $state_list = json_decode($state_response);

                        echo "<select name = 'state' class = 'state' style='width: 25%'>";
                            echo "<option>Select State</option>";

                            $state_list = $state_list->states;

                                for ($i=0; $i < count($state_list); $i++) { 
                            
                                    echo "<option value=".$state_list[$i]->state_id.">".$state_list[$i]->state_name."</option>";
                                }
                          
                        echo "</select>";


                        echo "<select id='district_list' class='district district_id'  style='width: 25%'>";

                        echo "<option> Select District </option>";

                          echo "</select>";
                           
                          ?>
                </div>

                <div class="section about">
                    
                    <div class="featured-slider">
                        <div id="featured-slider-two" >
                            
                            <!-- featured -->
                            <div class="featured">
                                <!-- ad-info -->
                                <div class="ad-info">
                                    <h3 class="item-price">Free</h3>
                                    <h4 class="item-title"><a href="#">Name</a></h4>
                                    <div class="item-cat">
                                        <span><a href="#">Address</a></span> 
                                    </div>
                                </div><!-- ad-info -->
                            </div><!-- featured -->

                            
                                    <!-- featured -->
                                    <div class="featured">
                                        <!-- ad-info -->
                                        <div class="ad-info">
                                            <h3 class="item-price">Date</h3>
                                            <h4 class="item-title"><a href="#">Available (Age)</a></h4>
                                            <div class="item-cat">
                                                <span><a href="#">Vaccine Name</a></span> 
                                            </div>
                                        </div><!-- ad-info -->
                                    </div><!-- featured -->


                        </div><!-- featured-slider -->
                    </div><!-- #featured-slider -->
                </div><!-- about -->

            </div><!-- container -->
        </section><!-- main -->
<script type="text/javascript">
      $('.state').on('change', function(){
    var state_id = $('.state').val();
    // alert(state_id);
      $.ajax({
        type:'POST',
        url:'ajax.php',
        data:'state_id='+state_id,
        success:function(html){
          $('#district_list').html(html);
        }
      }); 
  });

  
      $('.district_id').on('change', function(){
    var district_id = $('.district_id').val();
    // alert(state_id);
      $.ajax({
        type:'POST',
        url:'ajax.php',
        data:'district_id='+district_id,
        success:function(html){
          $('#data_list').html(html);
        }
      }); 
  });

  </script>
        @endsection