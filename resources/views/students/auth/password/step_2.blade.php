<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>TUM TAXI</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

  <style>
    #header{
      background-color:rgba(0, 0, 0, 0.8) !important;
    }
  </style>
</head>

<body>

   <!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">
      <!--
      <h1 class="logo me-auto me-lg-0"><a href="index.html">Gp<span>.</span></a></h1>
      -->

      <a href="/" class="logo me-auto me-lg-0"><img src="../assets/img/logo.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="/">Home</a></li>
          <li><a class="nav-link scrollto" href="/#about">About</a></li>
          <li><a class="nav-link scrollto " href="/#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="/taxi-registration/step_1">Become a Driver</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="/student-login" class="get-started-btn scrollto">Login</a>

    </div>
  </header><!-- End Header -->

  <main id="main">
    <section class="inner-page">
      <div class="container">
        <!-- ======= Login Section using contact us CSS ======= -->
        <section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 p-5">
                        <div class="col-md-12">
                            <div class="info-box">
                            <i class="ri-login-circle-line"></i>
                            <h3>Student Reset Password</h3>
                            <p>Kindly Submit your email</p>
                            </div>
                        </div>

                        @if (session('email'))
    <div class="alert alert-success">
        {{ session('email')->reset_password_verification_code }}
    </div>
@endif
                        <form action="/student-reset-password/step_2" method="post" role="form" class="form">
                        @csrf
                        <input type="hidden" name="email" value="{{ session('email')->email }}">

                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="reset_password_verification_code" id="email" placeholder="Enter Code" required>
                            </div>
                            @error('reset_password_verification_code')
                                <div class="my-3">
                                    <div class="error-message">{{ $message }}</div>
                                </div>
                            @enderror
                            
                            <div class="text-center"><button type="submit">Next</button></div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->



      </div>
    </section>

  </main><!-- End #main -->

 
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('assets/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>



