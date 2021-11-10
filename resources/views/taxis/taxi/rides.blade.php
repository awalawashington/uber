@extends('layouts.app')
@section('content')

  <title>TUM TAXI | KARIBU</title>
  <!-- About -->
  @include('layouts.ticketcss')
</head>

<body>

  <!-- Navbar -->
  @include('layouts.taxis.navbar')
  <!-- /.navbar -->


  <main id="main">
    <section class="inner-page">
      <div class="container">
        <!-- ======= Login Section using contact us CSS ======= -->
        <section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
            <div class="container">
                <div class="row d-flex justify-content-center">
                @if((auth('taxi')->user()->rides) !== NULL)
                <h1>You havent made a ride yet</h1>
                @else
                  @foreach(auth('taxi')->user()->rides as $ride)
                  <div class="row mt-3">
                    <article class="card shadow bg-white rounded">
                        <section class="date">
                            <time datetime="23th feb">
                            <span>{{$ride->price}}</span><span>Ksh</span>
                            </time>
                        </section>
                        <section class="card-cont">
                            <small>User Info</small>
                            <h3>{{$ride->user->name}}</h3>
                            <div class="even-date">
                            <i class="fa fa-calendar"></i>
                            <time>
                            <span>{{$ride->user->email}}</span>
                            <span>{{$ride->user->phone_number}}</span>
                            </time>
                            </div>
                            <div class="even-info">
                            <i class="fa fa-map-marker"></i>
                            <p>
                                <b>{{$ride->from_location->name}}</b> To <b>{{$ride->to_location->name}}</b>, <b>{{$ride->distance}}</b>
                            </p>
                            <p>
                                {{$ride->created_at}}
                            </p>
                            </div>
                            <button type="submit" class="btn">Completed</button>
                        </section>
                    </article>
                  </div>
                  @endforeach
                @endif
            </div>
        </section><!-- End Contact Section -->



      </div>
    </section>

  </main><!-- End #main -->

  @endsection