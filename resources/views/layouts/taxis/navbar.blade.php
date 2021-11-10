<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <!--<h1 class="logo me-auto me-lg-0"><a href="index.html">Gp<span>.</span></a></h1>-->
      <!-- Uncomment below if you prefer to use an image logo -->
       <a href="/taxi-home" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
        <li><a class="nav-link scrollto active" href="taxi-home">Home</a></li>
          <li class="dropdown"><a href="/taxi-profile"><span>{{auth('taxi')->user()->name}}</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="/taxi-profile">Profile</a></li>
              <li><a href="/taxi-rides">Rides Info</a></li>
              <li><a href="/taxi-logout">Logout</a></li>
            </ul>
          </li>
        </ul>
      </nav><!-- .navbar -->

      <a href="taxi-home" class="get-started-btn scrollto">{{auth('taxi')->user()->vehicle_registration_number}}</a>

    </div>
  </header><!-- End Header -->