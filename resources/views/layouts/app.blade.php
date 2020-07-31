<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <title>@yield('meta-title',' VeaInmuebles |Lo Mejor para inmueble!')</title>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content=@yield('meta-description')>
  
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicon -->
  <link rel="shortcut icon" href="images/favicon.png" type="image/png">

  <!-- google-fonts -->
  <link href="https://fonts.googleapis.com/css?family=Courgette&display=swap" rel="stylesheet">

  <!-- Styles-->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <!-- Font Awesome 5 -->
  <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
  
  @stack('styles')
  <!-- estilos vea -->
  <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">




</head>

<body>
    @include('layouts.incl-app.header')
      @yield('content')
    @include('layouts.incl-app.footer')

    @include('layouts.incl-app.test-responsive')

    @yield('modals')
  
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/jquery.stickit.min.js') }}"></script>
  <script src="{{ asset('js/picturefill.min.js') }}"></script>

   @stack('scripts')
  <script src="{{ asset('js/scripts.js') }}"></script>
  @stack('load-plugin')
</body>

</html>
