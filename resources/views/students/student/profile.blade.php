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
                            <h3>Personal Info</h3>
                            <p>Your personal info</p>
                            </div>
                        </div>
                        <form action="student-personal-info" method="post" role="form" class="form">
                        @csrf
                        @method('PUT')
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="name" id="name" value="{{auth()->user()->name}}" required>
                            </div>
                            @error('name')
                                <div class="my-3">
                                    <div class="error-message">{{ $message }}</div>
                                </div>
                            @enderror
                            <div class="form-group mt-3">
                                <input type="email" class="form-control" name="email" id="email" value="{{auth()->user()->email}}" required>
                            </div>
                            @error('email')
                                <div class="my-3">
                                    <div class="error-message">{{ $message }}</div>
                                </div>
                            @enderror
                            <div class="form-group mt-3">
                                <input type="tell" class="form-control" name="phone_number" id="phone_number" value="{{auth()->user()->phone_number}}" required>
                            </div>
                            @error('phone_number')
                                <div class="my-3">
                                    <div class="error-message">{{ $message }}</div>
                                </div>
                            @enderror
                            
                            <div class="text-center"><button type="submit">Save</button></div>
                        </form>
                    </div>
      
                    <div class="col-lg-6 p-5">
                        <div class="col-md-12">
                            <div class="info-box">
                            <i class="ri-login-circle-line"></i>
                            <h3>Password Settings</h3>
                            <p>Change Password</p>
                            </div>
                        </div>
                        <form action="student-change-password" method="post" role="form" class="form">
                        @csrf
                        @method('PUT')
                            <div class="form-group mt-3">
                                <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Current Pasword" required>
                            </div>
                            <div class="form-group mt-3">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Your Pasword" required>
                            </div>
                            <div class="form-group mt-3">
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Pasword" required>
                            </div>
                            @error('email')
                                <div class="my-3">
                                    <div class="error-message">{{ $message }}</div>
                                </div>
                            @enderror
                            
                            <div class="text-center"><button type="submit">Save</button></div>
                        </form>
                    </div>
                </div>

            </div>
        </section><!-- End Contact Section -->



      </div>
    </section>

  </main><!-- End #main -->

  @endsection