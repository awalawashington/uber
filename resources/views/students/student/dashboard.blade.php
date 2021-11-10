@extends('layouts.app')
@section('content')

  <title>TUM TAXI | KARIBU</title>
  <!-- About -->
  @include('layouts.ticketcss')
  <!-- /.about -->
</head>

<body>

  <!-- Navbar -->
  @include('layouts.students.navbar')
  <!-- /.navbar -->


  <!-- Banner -->
  @include('layouts.banner')
  <!-- /.banner -->

  <main id="main">

  <!-- About -->
  @include('layouts.about')
  <!-- /.about -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Ride with us</h2>
          <p>Request a ride</p>
        </div>

        <div class="row">
        <div class="container">
        <!-- ======= Login Section using contact us CSS ======= -->
        <section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8 p-5">

                    @if (session('ride_info'))
                      @if((session('ride_info')['taxi']) != NULL)  
                        <article class="card shadow bg-white rounded">
                            <section class="date">
                                <time datetime="23th feb">
                                <span>{{session('ride_info')['price']}}</span><span>Ksh</span>
                                </time>
                            </section>
                            <section class="card-cont">
                                <small>Driver Info</small>
                                <h3>{{ session('ride_info')['taxi']['taxi']->taxi->name}}</h3>
                                <div class="even-date">
                                <i class="fa fa-calendar"></i>
                                <time>
                                <span>{{session('ride_info')['taxi']['taxi']->taxi->vehicle_color}} {{session('ride_info')['taxi']['taxi']->taxi->vehicle_type}}</span>
                                <span>{{session('ride_info')['taxi']['taxi']->taxi->vehicle_registration_number}}</span>
                                </time>
                                </div>
                                <div class="even-info">
                                <i class="fa fa-map-marker"></i>
                                <p>
                                    <b>{{session('ride_info')['from']}}</b> To <b>{{session('ride_info')['to']}}</b> - <b>{{session('ride_info')['distance']}} KMS</b>
                                </p>
                                </div>
                                <form action="request-ride" method="POST">
                                    @csrf
                                    <input type="hidden" name="from" value="{{session('ride_info')['from_id']}}">
                                    <input type="hidden" name="to" value="{{ session('ride_info')['to_id']}}">
                                    <input type="hidden" name="price" value="{{session('ride_info')['price']}}">
                                    <input type="hidden" name="distance" value="{{session('ride_info')['distance']}}">
                                    <input type="hidden" name="taxi" value="{{session('ride_info')['taxi']['taxi']->taxi->id}}">
                                   <button type="submit">Request</button>
                                </form>
                            </section>
                        </article>
                        @else
                        <h1 class="text-danger">No Taxi at the momment</h1>
                        @endif
                    @endif

                    @if (!session('ride_info'))
                        <div class="col-md-12">
                            <div class="info-box">
                            <i class="ri-taxi-line"></i>
                            <h3>Request a Ride</h3>
                            </div>
                        </div>
                        

                        <form action="travel-from-to" method="GET" role="form" class="form">
                        @csrf
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <div class="input-group-prepend">
                                        <select class="form-control select2" name="from">
                                            <option value="">Your Location</option>
                                            @foreach($locations as $location)
                                                <option value="{{$location->id}}">{{$location->name}},{{$location->address}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <div class="input-group-prepend">
                                        <select class="form-control select2" name="to">
                                            <option value="">Destination</option>
                                            @foreach($locations as $location)
                                                <option value="{{$location->id}}">{{$location->name}},{{$location->address}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @error('email')
                                <div class="my-3">
                                    <div class="error-message">{{ $message }}</div>
                                </div>
                            @enderror
                            
                            <div class="text-center mt-3"><button type="submit">Next</button></div>
                        </form>
                    @endif
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->



      </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    @include('layouts.cta')
    <!-- End Cta Section -->

    <!-- ======= Portfolio Section ======= -->
    @include('layouts.portfolio')
    <!-- End Portfolio Section -->

    <!-- ======= Counts Section ======= -->
    @include('layouts.counts')
    <!-- End Counts Section -->

    <!-- ======= Testimonials Section ======= -->
    @include('layouts.testimonials')
    <!-- End Testimonials Section -->


  </main><!-- End #main -->
  @endsection
  

























