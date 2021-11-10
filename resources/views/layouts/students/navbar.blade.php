<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">
      <!--
      <h1 class="logo me-auto me-lg-0"><a href="index.html">Gp<span>.</span></a></h1>
      -->

      <a href="/student-home" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="/student-home">Home</a></li>
          <li><a class="nav-link scrollto" href="/student-home#about">About</a></li>
          <li><a class="nav-link scrollto " href="/student-home#portfolio">Portfolio</a></li>
          <li class="dropdown"><a href="/student-profile"><span>{{auth()->user()->name}}</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="/student-profile">Profile</a></li>
              <li><a href="/student-rides">Rides History</a></li>
              <li><a href="/student-logout">Logout</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="student-home#services" class="get-started-btn scrollto">Ride With Us</a>

    </div>
  </header><!-- End Header -->