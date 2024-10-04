<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>MADDAH - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/style-file/style.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/style-file/tab.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/style-file/mobile.css') }}" />
    <!-- ------------------ bootsRap Link ------------------ -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <!-- ------------------ Fonts-awesome Link ------------------ -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- ------------------Google Link ------------------ -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
    <!-- ------------------Animation Link ------------------ -->

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  </head>
  <body class="@yield('bodyClass')">
    <header>
      <!-- Top Header Section -->
      <div class="container-fluid p-0 m-0 top-line">
        <div class="row align-items-center text-center text-lg-start">
          <div
            class="col-12 col-md-3 d-flex justify-content-center justify-content-lg-start align-items-center py-2"
          >
            <i class="fa-solid fa-phone me-2"></i> (225) 555-0118
          </div>
          <div
            class="col-12 col-md-3 d-flex justify-content-center justify-content-lg-start align-items-center py-2"
          >
            <i class="fa-regular fa-envelope me-2"></i> example.com
          </div>
          <div
            class="col-12 col-md-3 d-flex justify-content-center justify-content-lg-start align-items-center py-2"
          >
            Follow Us and a Chance to win 80% off
          </div>
          <div
            class="col-12 col-md-3 d-flex justify-content-center justify-content-lg-start align-items-center py-2"
          >
            Follow Us:
            <a href="/" class="ms-2" aria-label="Instagram">
              <i class="fa-brands fa-instagram" aria-hidden="true"></i>
            </a>
            <a href="/" class="ms-2" aria-label="YouTube">
              <i class="fa-brands fa-youtube" aria-hidden="true"></i>
            </a>
            <a href="/" class="ms-2" aria-label="Facebook">
              <i class="fa-brands fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="/" class="ms-2" aria-label="Twitter">
              <i class="fa-brands fa-x-twitter" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
      <!-- Navigation Bar -->

      <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
          <!-- Logo -->
          <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img
           
              src="{{ asset('assets/image/LOGO.png') }}"
              alt="Maddah Logo"
          
              class="me-2"
            />
          </a>
          <!-- Toggler Button -->
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <!-- Navbar Links -->
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active home" aria-current="page" href="{{ route('home') }}"
                  >Home</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-link active"
                  aria-current="page"
                  href="{{ route('shop') }}"
                  >Shop</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('about') }}">About</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="{{ route('contact') }}">Contact</a>
              </li>
            </ul>
            <!-- Right Side Icons and Links -->
            <div class="d-flex align-items-center">
              <a href="#" class="text-decoration-none me-3">
                <a href="{{ route('login') }}"><i class="fa fa-user me-1"></i></a>
                <span class="text-warning fw-bold">
                  @if (Auth::check())
                    <a href="{{ route('dashboard') }}">My Account</a>
                  @else
                    <a href="{{ route('login') }}">Login</a> / <a href="{{ route('register') }}">Register</a>
                  @endif
                </span>
              </a>
            </div>
          </div>
        </div>
      </nav>
    </header>
    
    @yield('content')

    <footer>
      <div class="first-container-footer container">
        <div class="row">
          <div class="col-lg-6">
            <h1>STAY UPTO DATE ABOUT OUR LATEST OFFERS</h1>
          </div>
          <div class="col-lg-6">
            <form action="{{ route('promoemail') }}" method="POST">
              @csrf
              <input type="email" name="email" placeholder="Enter your email address" required />
              
              <!-- Show Success Message as Alert -->
              @if (Session::has('success'))
                  <script>alert('{{ Session::get('success') }}')</script>
              @endif
              
              <!-- Show Validation Error as Alert -->
              @error('email')
                  <script>alert('{{ $message }}')</script>
              @enderror
              
              <br />
              <button type="submit">Subscribe to Newsletter</button>
          </form>          
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-4">
            <a href="{{ route('home') }}"><img src="{{ asset('assets/image/LOGO.png') }}" alt="" /></a>
            <p class="my-3">
              Lorem ipsum dolor sit amet consectetur. Mattis vitae vitae est
              venenatis egestas pharetra
            </p>
          </div>
          <div class="col-lg-2 col-md-4">
            <h6>Company</h6>
            <ul>
              <li><a href="">About</a></li>
              <li><a href="">Features</a></li>
              <li><a href="">Works</a></li>
              <li><a href="">Career</a></li>
            </ul>
          </div>
          <div class="col-lg-2 col-md-4">
            <h6>Help</h6>
            <ul>
              <li><a href="">Customer Support</a></li>
              <li><a href="">Delivery Details</a></li>
              <li><a href="">Terms & Conditions</a></li>
              <li><a href="">Privacy Policy</a></li>
            </ul>
          </div>
          <div class="col-lg-2 col-md-4">
            <h6>FAQ</h6>
            <ul>
              <li><a href="">Account</a></li>
              <li><a href="">Manage Deliveries</a></li>
              <li><a href="">Orders</a></li>
              <li><a href="">Payments</a></li>
            </ul>
          </div>
          <div class="col-lg-2 col-md-4">
            <h6>Resources</h6>
            <ul>
              <li><a href="">Free eBooks</a></li>
              <li><a href="">Development Tutorial</a></li>
              <li><a href="">How to - Blog</a></li>
              <li><a href="">Youtube Playlist</a></li>
            </ul>
          </div>
        </div>
        <hr />
        <div class="d-flex">
          <div class="d-flex">
            <span><i class="fa-brands fa-twitter"></i></span>
            <span><i class="fa-brands fa-facebook-f"></i></span>
            <span><i class="fa-brands fa-instagram"></i></span>
            <span><i class="fa-brands fa-github"></i></span>
          </div>
          <div class="d-flex logos"><img src="{{ asset('assets/image/Frame 53.png') }}" alt=""></div>
        </div>
      </div>
    </footer>
  </body>
  <!-- ------------------ bootsRap Link ------------------ -->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"
  ></script>
  <script src="{{ asset('assets/style-file/script.js') }}"></script>
  <!-- ------------------Animation Link ------------------ -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</html>