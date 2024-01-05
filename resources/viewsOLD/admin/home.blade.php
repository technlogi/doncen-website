@extends('admin.layout.master')
@section('title',"Home")
@section('content')
<div class="content-wrapper">
<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <!-- Example Notifications Card-->
        <div class="col-lg-4 col-xl-4 col-sm-6 mb-4">
            <div class="card  mb-3">
              <div class="card-header">
              <strong><i class="fa fa-bell-o"></i>Live Donation <span class="pull-right">{{ $total_live }}</span></strong></div>
              <div class="list-group list-group-flush small">
              @foreach($lives as $live)
                <a class="list-group-item list-group-item-action" href="#">
                  <div class="media">
                  @if($live['image'] != '')
                      <img class="d-flex mr-3 rounded-circle" src="{{ $live['image'] }}" alt="" title="{{ $live['category'] }}">
                  @else
                  <img class="d-flex mr-3 rounded-circle" src="{{URL::asset('uploads/svg/Donate icon.png')}}" alt="" title="{{ $live['category'] }}">
                  @endif
                    <div class="media-body">
                      <span class="pull-right">{{ $live['post_no'] }}</span>
                      <strong>{{ $live['person']}}</strong>{{ ' ( '.$live['contact'].' ) '}}
                      <div class="text-muted smaller">{{ $live['datetime'] }}</div>
                      <div class="text-muted smaller">{{ $live['location'] }}</div>
                    </div>
                  </div>
                </a>
                @endforeach
                <a class="list-group-item list-group-item-action" href="#">View all activity...</a>
              </div>
              <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
        </div> 
        <!-- <div class="col-xl-4 col-sm-6 mb-4">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5">Top Users : {{ $total_user}}</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <div class="table-responsive">
                <table class="table table-bordered"  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Total Post</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                  @foreach($top_users as $user)
                    <tr>
                      <td>{{ $user['name'] }}</td>
                      <td>{{ $user['count'] }}</td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div> -->

        <div class="col-lg-4 col-xl-4 col-sm-6 mb-4">
          <!-- Example Pie Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-users"></i><strong> Users<span class="pull-right">{{$total_user}}</span></strong></div>
            <div class="card-body">
              <canvas id="myPieChart" width="100%" height="100"></canvas>
            </div>
            <div class="table-responsive card-footer clearfix small z-1">
                <table class="table table-bordered"  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Total Post</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                  @foreach($top_users as $user)
                    <tr>
                      <td>{{ $user['name'] }}</td>
                      <td>{{ $user['count'] }}</td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
          
        </div>
        
        
        <div class="col-lg-4 col-xl-4 col-sm-6 mb-4">
          <div class="card  mb-3">
            <div class="card-header">
              <strong> <i class="fa fa-bell-o"></i>Urgent Donation<span class="pull-right">{{ $total_urgent }}</span></strong></div>
              <div class="list-group list-group-flush small">
                @foreach($urgents as $urgent)
                <a class="list-group-item list-group-item-action" href="#">
                  <div class="media">
                    @if($urgent['image'] != '')
                        <img class="d-flex mr-3 rounded-circle" src="{{ $urgent['image'] }}" alt="" title="{{ $urgent['category'] }}">
                    @else
                      <img class="d-flex mr-3 rounded-circle" src="{{URL::asset('uploads/svg/Donate icon.png')}}" alt="" title="{{ $urgent['category'] }}">
                    @endif
                    <div class="media-body">
                      <span class="pull-right">{{ $urgent['post_no'] }}</span>
                      <strong>{{ $urgent['person']}}</strong>{{ ' ( '.$urgent['contact'].' ) '}}
                      <div class="text-muted smaller">{{ $urgent['datetime'] }}</div>
                      <div class="text-muted smaller">{{ $urgent['location'] }}</div>
                    </div>
                  </div>
                </a>
                @endforeach
                <a class="list-group-item list-group-item-action" href="#">View all activity...</a>
              </div>
              <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
          </div>
      </div>

      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-area-chart"></i><strong> Donation Post Summery<span class="pull-right">Total post: {{ $total_post }}</span></strong>
        </div>
        <div class="card-body">
          <canvas id="myAreaChart" width="100%" height="30"></canvas>
          <input type="hidden"  id="max"    value="{{ $total }}">
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>

      <div class="row">
        <div class="col-xl-4 col-sm-6 mb-4">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5"><strong>Categories: {{ $total_category }}</strong></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <div class="table-responsive">
                <table class="table table-bordered"  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Total Post</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    @foreach($categories as $category)
                      <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->count }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-4">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5"><strong>Sub-Categories: {{ $total_subcategory }}</strong></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <div class="table-responsive">
                <table class="table table-bordered"  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Total Post</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    @foreach($subcategories as $subcategory)
                      <tr>
                        <td>{{ $subcategory->name }}</td>
                        <td>{{ $subcategory->count }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-4">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5"><strong>Specifications: {{ $total_specification }}</strong></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <div class="table-responsive">
                <table class="table table-bordered"  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Total Post</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                  @foreach($specifications as $specification)
                    <tr>
                      <td>{{ $specification['name'] }}</td>
                      <td>{{ $specification['count'] }}</td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <!-- <div class="col-xl-4 col-sm-6 mb-4">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5">13 New Tickets!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div> -->
      </div>
      
      <div class="row">
        <div class="col-xl-4 col-sm-6 mb-4">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5">Country</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <div class="table-responsive">
                <table class="table table-bordered"  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Total Post</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    @foreach($countries as $country)
                      <tr>
                        <td>{{ $country->name }}</td>
                        <td>{{ $country->count }}</td>
                      </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-4">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5">States</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <div class="table-responsive">
                <table class="table table-bordered"  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Total Post</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    @foreach($states as $state)
                      <tr>
                        <td>{{ $state->name }}</td>
                        <td>{{ $state->count }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-4">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5">Cities</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <div class="table-responsive">
                <table class="table table-bordered"  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Total Post</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    @foreach($cities as $city)
                      <tr>
                        <td>{{ $city['name'] }}</td>
                        <td>{{ $city['count'] }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <!-- <div class="col-xl-4 col-sm-6 mb-4">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5">13 New Tickets!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div> -->
      </div>

      <!-- Area Chart Example-->
      
      <div class="row">
        <div class="col-lg-8">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bar-chart"></i> Bar Chart Example</div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-8 my-auto">
                  <canvas id="myBarChart" width="100" height="50"></canvas>
                </div>
                <div class="col-sm-4 text-center my-auto">
                  <div class="h4 mb-0 text-primary">$34,693</div>
                  <div class="small text-muted">YTD Revenue</div>
                  <hr>
                  <div class="h4 mb-0 text-warning">$18,474</div>
                  <div class="small text-muted">YTD Expenses</div>
                  <hr>
                  <div class="h4 mb-0 text-success">$16,219</div>
                  <div class="small text-muted">YTD Margin</div>
                </div>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
          <!-- Card Columns Example Social Feed-->
          <div class="mb-0 mt-4">
            <i class="fa fa-newspaper-o"></i> News Feed</div>
          <hr class="mt-2">
          <div class="card-columns">
            <!-- Example Social Card-->
            <div class="card mb-3">
              <a href="#">
                <img class="card-img-top img-fluid w-100" src="https://unsplash.it/700/450?image=610" alt="">
              </a>
              <div class="card-body">
                <h6 class="card-title mb-1"><a href="#">David Miller</a></h6>
                <p class="card-text small">These waves are looking pretty good today!
                  <a href="#">#surfsup</a>
                </p>
              </div>
              <hr class="my-0">
              <div class="card-body py-2 small">
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-thumbs-up"></i>Like</a>
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-comment"></i>Comment</a>
                <a class="d-inline-block" href="#">
                  <i class="fa fa-fw fa-share"></i>Share</a>
              </div>
              <hr class="my-0">
              <div class="card-body small bg-faded">
                <div class="media">
                  <img class="d-flex mr-3" src="http://placehold.it/45x45" alt="">
                  <div class="media-body">
                    <h6 class="mt-0 mb-1"><a href="#">John Smith</a></h6>Very nice! I wish I was there! That looks amazing!
                    <ul class="list-inline mb-0">
                      <li class="list-inline-item">
                        <a href="#">Like</a>
                      </li>
                      <li class="list-inline-item">·</li>
                      <li class="list-inline-item">
                        <a href="#">Reply</a>
                      </li>
                    </ul>
                    <div class="media mt-3">
                      <a class="d-flex pr-3" href="#">
                        <img src="http://placehold.it/45x45" alt="">
                      </a>
                      <div class="media-body">
                        <h6 class="mt-0 mb-1"><a href="#">David Miller</a></h6>Next time for sure!
                        <ul class="list-inline mb-0">
                          <li class="list-inline-item">
                            <a href="#">Like</a>
                          </li>
                          <li class="list-inline-item">·</li>
                          <li class="list-inline-item">
                            <a href="#">Reply</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer small text-muted">Posted 32 mins ago</div>
            </div>
            <!-- Example Social Card-->
            <div class="card mb-3">
              <a href="#">
                <img class="card-img-top img-fluid w-100" src="https://unsplash.it/700/450?image=180" alt="">
              </a>
              <div class="card-body">
                <h6 class="card-title mb-1"><a href="#">John Smith</a></h6>
                <p class="card-text small">Another day at the office...
                  <a href="#">#workinghardorhardlyworking</a>
                </p>
              </div>
              <hr class="my-0">
              <div class="card-body py-2 small">
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-thumbs-up"></i>Like</a>
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-comment"></i>Comment</a>
                <a class="d-inline-block" href="#">
                  <i class="fa fa-fw fa-share"></i>Share</a>
              </div>
              <hr class="my-0">
              <div class="card-body small bg-faded">
                <div class="media">
                  <img class="d-flex mr-3" src="http://placehold.it/45x45" alt="">
                  <div class="media-body">
                    <h6 class="mt-0 mb-1"><a href="#">Jessy Lucas</a></h6>Where did you get that camera?! I want one!
                    <ul class="list-inline mb-0">
                      <li class="list-inline-item">
                        <a href="#">Like</a>
                      </li>
                      <li class="list-inline-item">·</li>
                      <li class="list-inline-item">
                        <a href="#">Reply</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="card-footer small text-muted">Posted 46 mins ago</div>
            </div>
            <!-- Example Social Card-->
            <div class="card mb-3">
              <a href="#">
                <img class="card-img-top img-fluid w-100" src="https://unsplash.it/700/450?image=281" alt="">
              </a>
              <div class="card-body">
                <h6 class="card-title mb-1"><a href="#">Jeffery Wellings</a></h6>
                <p class="card-text small">Nice shot from the skate park!
                  <a href="#">#kickflip</a>
                  <a href="#">#holdmybeer</a>
                  <a href="#">#igotthis</a>
                </p>
              </div>
              <hr class="my-0">
              <div class="card-body py-2 small">
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-thumbs-up"></i>Like</a>
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-comment"></i>Comment</a>
                <a class="d-inline-block" href="#">
                  <i class="fa fa-fw fa-share"></i>Share</a>
              </div>
              <div class="card-footer small text-muted">Posted 1 hr ago</div>
            </div>
            <!-- Example Social Card-->
            <div class="card mb-3">
              <a href="#">
                <img class="card-img-top img-fluid w-100" src="https://unsplash.it/700/450?image=185" alt="">
              </a>
              <div class="card-body">
                <h6 class="card-title mb-1"><a href="#">David Miller</a></h6>
                <p class="card-text small">It's hot, and I might be lost...
                  <a href="#">#desert</a>
                  <a href="#">#water</a>
                  <a href="#">#anyonehavesomewater</a>
                  <a href="#">#noreally</a>
                  <a href="#">#thirsty</a>
                  <a href="#">#dehydration</a>
                </p>
              </div>
              <hr class="my-0">
              <div class="card-body py-2 small">
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-thumbs-up"></i>Like</a>
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-comment"></i>Comment</a>
                <a class="d-inline-block" href="#">
                  <i class="fa fa-fw fa-share"></i>Share</a>
              </div>
              <hr class="my-0">
              <div class="card-body small bg-faded">
                <div class="media">
                  <img class="d-flex mr-3" src="http://placehold.it/45x45" alt="">
                  <div class="media-body">
                    <h6 class="mt-0 mb-1"><a href="#">John Smith</a></h6>The oasis is a mile that way, or is that just a mirage?
                    <ul class="list-inline mb-0">
                      <li class="list-inline-item">
                        <a href="#">Like</a>
                      </li>
                      <li class="list-inline-item">·</li>
                      <li class="list-inline-item">
                        <a href="#">Reply</a>
                      </li>
                    </ul>
                    <div class="media mt-3">
                      <a class="d-flex pr-3" href="#">
                        <img src="http://placehold.it/45x45" alt="">
                      </a>
                      <div class="media-body">
                        <h6 class="mt-0 mb-1"><a href="#">David Miller</a></h6>
                        <img class="img-fluid w-100 mb-1" src="https://unsplash.it/700/450?image=789" alt="">I'm saved, I found a cactus. How do I open this thing?
                        <ul class="list-inline mb-0">
                          <li class="list-inline-item">
                            <a href="#">Like</a>
                          </li>
                          <li class="list-inline-item">·</li>
                          <li class="list-inline-item">
                            <a href="#">Reply</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer small text-muted">Posted yesterday</div>
            </div>
          </div>
          <!-- /Card Columns-->
        </div>
            </div>
    </div>



    
    </div>
@endsection
@push('javaScript')
<script>
  var label = <?php echo json_encode($labels); ?>;
  var data =  <?php echo json_encode($data); ?>;
  var element = document.getElementById("max");
  var users = <?php echo json_encode($user_status);?>;
  var total = parseInt(element.value);

Chart.defaults.global.defaultFontFamily='-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif',
Chart.defaults.global.defaultFontColor="#292b2c";
var ctx = document.getElementById("myAreaChart"),
myLineChart=new Chart(ctx,
    {
        type:"line",
        data:{
            labels: label,
        datasets:[
            {
                label:"Post",lineTension:.3,
                backgroundColor:"rgba(2,117,216,0.2)",
                borderColor:"rgba(2,117,216,1)",
                pointRadius:5,
                pointBackgroundColor:"rgba(2,117,216,1)",
                pointBorderColor:"rgba(255,255,255,0.8)",
                pointHoverRadius:5,
                pointHoverBackgroundColor:"rgba(2,117,216,1)",
                pointHitRadius:20,
                pointBorderWidth:2,
                data: data 
                
            }]},
            options:{
                scales:{
                    xAxes:[{time:{unit:"date"},
                    gridLines:{display:!1},
                    ticks:{maxTicksLimit:7}}],
                    yAxes:[
                        {
                            ticks: {
                                min:0,max: total  ,maxTicksLimit:5
                            },
                            gridLines:{
                                color:"rgba(0, 0, 0, .125)"
                            }
                        }
                    ]
                },
                legend:{
                    display:!1
                }
            }
        });
ctx=document.getElementById("myPieChart"),
myPieChart=new Chart(ctx,
    {
        type:"pie",
        data:{
            labels:["Active","Inactive","Not Verified"],
            datasets:[
                {   data: users,
                    backgroundColor:["#28a745","#dc3545","#ffc107",]
                }
            ]
        }
    });
</script>
@endpush