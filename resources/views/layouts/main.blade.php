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
<style>
  [x-cloak] { display: none !important; }
</style> 
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
<!-- yield('footer')            -->

          </div>
          <!-- App container ends -->

        </div>
        <!-- Main container end -->
        @livewireScripts
      </div>
      <!-- Page wrapper end -->

      <!-- *************
        ************ JavaScript Files *************
      ************* -->
      <!-- Required jQuery first, then Bootstrap Bundle JS -->
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/bootstrap.bundle.min.js"></script>

      <!-- *************
        ************ Vendor Js Files *************
      ************* -->

      <!-- Overlay Scroll JS -->
      <script src="assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js"></script>
      <script src="assets/vendor/overlay-scroll/custom-scrollbar.js"></script>

      <!-- Apex Charts -->
      <script src="assets/vendor/apex/apexcharts.min.js"></script>
      <script src="assets/vendor/apex/custom/graphs/custom-sparkline.js"></script>
      <script src="assets/vendor/apex/custom/analytics/delivery.js"></script>
      <script src="assets/vendor/apex/custom/analytics/statistics.js"></script>
      <script src="assets/vendor/apex/custom/analytics/sparkline.js"></script>

      <!-- Newsticker JS -->
      <script src="assets/vendor/newsticker/newsTicker.min.js"></script>
      <script src="assets/vendor/newsticker/custom-newsTicker.js"></script>

      <!-- Custom JS files -->
      <script src="assets/js/custom.js"></script>
    </body>


<!-- Mirrored from bootstrapget.com/demos/templatemonster/adminday-bootstrap-admin-template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 20 Oct 2024 06:09:36 GMT -->
</html>