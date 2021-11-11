
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
    <section class="inner-page mt-5">
      <div class="container">
        <div class="row mb-3">
            <div class="info-box col-md-6 border">
                <i class="ri-login-circle-line"></i>
                <h3>{{auth()->user('taxi')->rides->count()}}</h3>
                <p>Number of rides</p>
            </div>


            <div class="info-box col-md-6 border">
                <i class="ri-login-circle-line"></i>
                <h3>{{auth()->user('taxi')->rides->sum('distance')}} Kms</h3>
                <p>Distance Covered</p>
            </div>
     


           
        </div>

        @if((auth()->user('taxi')->ride_confirmations()) !== NULL)
        @if((auth()->user('taxi')->ride_confirmations()->confirmation) == NULL)
        <div class="row mt-3">
            <article class="card shadow bg-white rounded">
                <section class="date">
                    <time datetime="23th feb">
                    <span>{{auth()->user('taxi')->ride_confirmations()->ride->price}}</span><span>Ksh</span>
                    </time>
                </section>
                <section class="card-cont">
                    <small>User Info</small>
                    <h3>{{auth('taxi')->user()->ride_confirmations()->ride->user->name}}</h3>
                    <div class="even-date">
                    <i class="fa fa-calendar"></i>
                    <time>
                    <span>{{auth('taxi')->user()->ride_confirmations()->ride->user->email}}</span>
                    <span>{{auth('taxi')->user()->ride_confirmations()->ride->user->phone_number}}</span>
                    </time>
                    </div>
                    <div class="even-info">
                    <i class="fa fa-map-marker"></i>
                    <p>
                        <b>{{auth('taxi')->user()->ride_confirmations()->ride->from_location->name}}</b> To <b>{{auth('taxi')->user()->ride_confirmations()->ride->to_location->name}}</b>, <b>{{auth()->user('taxi')->ride_confirmations()->ride->distance}}</b>
                    </p>
                    </div>
                    <form action="accept-ride" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="ride" value="{{auth('taxi')->user()->ride_confirmations()->ride_id}}">
                        <button type="submit">Accept</button>
                    </form>
                </section>
            </article>
        </div>
        @else
        <div class="row mt-3">
            <article class="card shadow bg-white rounded">
            <section class="date">
                    <time datetime="23th feb">
                    <span>{{auth('taxi')->user()->ride_confirmations()->ride->price}}</span><span>Ksh</span>
                    </time>
                </section>
                <section class="card-cont">
                    <small>User Info</small>
                    <h3>{{auth('taxi')->user()->ride_confirmations()->ride->user->name}}</h3>
                    <div class="even-date">
                    <i class="fa fa-calendar"></i>
                    <time>
                    <span>{{auth('taxi')->user()->ride_confirmations()->ride->user->email}}</span>
                    <span>{{auth('taxi')->user()->ride_confirmations()->ride->user->phone_number}}</span>
                    </time>
                    </div>
                    <div class="even-info">
                    <i class="fa fa-map-marker"></i>
                    <p>
                        <b>{{auth('taxi')->user()->ride_confirmations()->ride->from_location->name}}</b> To <b>{{auth('taxi')->user()->ride_confirmations()->ride->to_location->name}}</b>, <b>{{auth('taxi')->user()->ride_confirmations()->ride->distance}} Kms</b>
                    </p>
                    </div>
                    <form action="complete-ride" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="ride" value="{{auth('taxi')->user()->ride_confirmations()->ride_id}}">
                        <button>Complete Ride</button>
                    </form>
                </section>
            </article>
        </div>
        @endif
        @else
        <h1>No Ride Request At the Moment</h1>
        @endif
      </div>
    </section>

  </main><!-- End #main -->

  @endsection











