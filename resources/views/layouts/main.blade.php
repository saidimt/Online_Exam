<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{asset('assets/images/logo/tcca.png')}}" />

<!-- *************
        ************ CSS Files *************
    ************* -->
<link rel="stylesheet" href="{{asset('assets/css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/fonts/bootstrap/bootstrap-icons.css')}}" />
<link rel="stylesheet" href="{{asset('assets/css/main.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/overlay-scroll/OverlayScrollbars.min.css')}}" />

@livewireStyles   
</head>

    <body>
      <!-- Page wrapper start -->
      <div class="page-wrapper">

        <!-- Main container start -->
        <div class="main-container">
        @include('layouts.partials.sliderbar')

         

          <!-- App container starts -->
          <div class="app-container">

            @include('layouts.partials.header')

            <!-- App hero header starts -->
            <!-- <div class="app-hero-header"> -->

              <!-- Page Title start -->
              <!-- <div>
                <h5 class="fw-light">Hello Said,</h5> -->
                <!-- <h3 class="fw-light">Have a good day :)</h3> -->
              <!-- </div> -->
              <!-- Page Title end -->

             

            <!-- </div> -->
            <!-- App Hero header ends -->
            <!-- App body starts -->
            <div class="app-body">
<div class="row min-vh-100">

  @yield('content')
</div>
</div>
<!-- App body ends -->

@include('layouts.partials.footer')

</div>
<!-- Page wrapper end -->

<!-- ************ JavaScript Files ************* -->
<!-- Required jQuery first, then Bootstrap Bundle JS -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('assets/vendor/overlay-scroll/custom-scrollbar.js') }}"></script>

<!-- Additional Plugins -->
<script src="{{ asset('assets/vendor/apex/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/apex/custom/graphs/custom-sparkline.js') }}"></script>
<script src="{{ asset('assets/vendor/newsticker/newsTicker.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

@livewireScripts
@include('sweetalert::alert')
</body>
</html>
