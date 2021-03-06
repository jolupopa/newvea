<!DOCTYPE html>
<html lang="es">

<head>
    <title>500 | Error en servidor!</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/png">

  <!-- google-fonts -->
  <link href="https://fonts.googleapis.com/css?family=Courgette&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

  <!-- Font Awesome 5 -->
  <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">

  
  <!-- estilos ves -->
  <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

</head>

<body>
   
    <section class="">
        <div class="container">
            <div class="row mt-5">
                <div class="col-8 offset-2 text-center mt-5">
                    <div class="container shadow-soft">
                        <a href="{{ route('home')}}"><i class="fas fa-server fa-8x py-5"></i></a>
                        <h1 class="mt-5 font-weight-light">Error 500 <span class="font-weight-bolder text-primary">Problema con el Servidor</span>
                        </h1>
                        <p class="lead my-4">¡Uy! Hay un error interno en el servidor. <br>
                                Si este problema persiste, pongase en contacto con su administrador de red.
                        </p>
                        <a class="btn btn-primary my-5" href="{{ route('home')}}"><i class="fas fa-chevron-left mr-3 pl-2 animate-left-3"></i>Ir al Inico
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
</body>

</html>