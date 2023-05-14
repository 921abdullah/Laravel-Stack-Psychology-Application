<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'The Mental Maze') }}</title>

    <!-- Favicons -->
    <link href="{{ URL::to('/assets/img/logo.png') }}" rel="icon">
    <link href="{{ URL::to('/assets/img/log.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ URL::to('/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ URL::to('/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ URL::to('/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ URL::to('/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ URL::to('/assets/css/style.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <!-- CANT FIND -->
</head>
<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
      <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><a href="{{ url('/') }}">The Mental Maze</a></h1>

        <nav id="navbar" class="navbar">
          
          <ul>
          <!-- Authentication Links -->
          @guest
              @isset($route)
              <!-- EMPTY IF HELPER REGISTER -->
              @else
                  @isset($url)
                  <!-- EMPTY IF HELPER LOGIN -->
                  @else
                      @if (Route::has('login'))
                          <li class="nav-item">
                              <a class="getstarted scrollto nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                          </li>
                      @endif
                      @if (Route::has('register'))
                          <li class="nav-item">
                              <a class="getstarted scrollto nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                          </li>
                      @endif
                  @endisset
              @endisset
          @else
          <!-- HERE -->
          <li class="nav-item">
              <a class="getstarted scrollto" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
          </li>
          @endguest
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->
      </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    @isset($route)
    <section id="hero" class="d-flex align-items-center" style="height: 120vh;">
    @else
    @auth('helper')
    <section id="hero" class="d-flex align-items-center" style="height: 130vh;">
    @else
    @auth
    <section id="hero" class="d-flex align-items-center" style="height: 200vh;">
    @else
    <section id="hero" class="d-flex align-items-center" style="height: 100vh;">
    @endauth
    @endauth
    @endisset
        <div class="container">
            <div class="row justify-content-center">
            <main class="py-4">
                @yield('content')
            </main>
          </div>
        </div>
    </section>
    <!-- End Hero -->
    <!-- Vendor JS Files -->
    <script src="{{ URL::to('/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ URL::to('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::to('/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ URL::to('/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ URL::to('/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ URL::to('/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ URL::to('/assets/vendor/php-email-form/validate.js') }}"></script>
    <!-- Template Main JS File -->
    <script src="{{ URL::to('/assets/js/main.js') }}"></script>    
</body>
</html>
