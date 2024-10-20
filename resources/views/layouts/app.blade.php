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
</head>

<body>
<!-- Container start -->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-xl-4 col-lg-5 col-sm-6 col-12">
      @yield('content')
    </div>
  </div>
</div>
<!-- Container end -->
</body>


<!-- Mirrored from bootstrapget.com/demos/templatemonster/adminday-bootstrap-admin-template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 20 Oct 2024 06:09:36 GMT -->
</html>