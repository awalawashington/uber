@extends('layouts.app')
@section('content')

  <title>TUM TAXI | KARIBU</title>
  <!-- About -->
  @include('layouts.ticketcss')
  <!-- /.about -->
</head>

<body>

  <!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">
      <!--
      <h1 class="logo me-auto me-lg-0"><a href="index.html">Gp<span>.</span></a></h1>
      -->

      <a href="/" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="/">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="taxi-registration/step_1">Become a Driver</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="/student-home#services" class="get-started-btn scrollto">Ride With Us</a>

    </div>
  </header><!-- End Header -->


  <!-- Banner -->
  @include('layouts.banner')
  <!-- /.banner -->

  <main id="main">

  <!-- About -->
  @include('layouts.about')
  <!-- /.about -->
    

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
  

























