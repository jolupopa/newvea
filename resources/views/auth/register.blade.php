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
    
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
  </head>
  <body>

    <section id="register-auth">
        <div class="container mt-lg-4">
            <div class="row d-flex">
                <div class="col-12 col-md-6 order-md-1 align-self-center bg-contenedor">
                    <div class="text-center mt-4 mt-md-0">
                        <h1 class="font-weight-normal pt-5">
                          <a href="{{ route('home') }}">VeaInmuebles</a>
                        </h1>
                        <h2 class="pt-2">Registro</h2>
                        <p class="h5 text-muted pt-2">Disfruta nuestros servicios disponibles.</p>
                    </div>
                    
                    <span class="clearfix"></span>
                    <form  method="POST" action="{{ route('register') }}" class="row border-top text-primary pt-2" aria-label="Registro">
                        @csrf
                        <div class="form-group col-10 offset-1">
                          <label class="sr-only" for="name">Nombre de Usuario</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text">
                                  <i class="fas fa-user"></i></span>
                            </div>
                              <input id="name"  type="text"  class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placeholder="Nombres y Apellidos ó Razón Social">
                              @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                          </div>
                        </div>
                        <!--email-->
                        <div class="form-group col-10 offset-1">
                            <label class="sr-only" for="email">Correo</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-at"></i>
                                    </span>
                                </div>
                                <input id="email" type="email"  class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Correo" >
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                      
                        <!---password-->
                        <div class="form-group col-10 offset-1">
                            <label class="sr-only" for="password">Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-key"></i>
                                    </span>
                                </div>
                                <input id="password"  type="password"  class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required placeholder="Password">

                                @error('password')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
                        </div>
                        <div class="form-group col-10 offset-1">
                            <label class="sr-only" for="password-confirm">Confirm Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-key"></i>
                                    </span>
                                </div>
                                <input id="password-confirm" type="password" name="password_confirmation" class="form-control form-control-lg"  required placeholder="Repita su password">
                            </div>
                        </div>
                        <div class="col-10 offset-2 my-3 custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="terminos"  {{ old('terminos') ? 'checked' : '' }}>
                            <label class="custom-control-label text-muted" for="terminos">Estoy de acuerdo con los <span ><a href="#"> Terminos y condiciones</a></span></label>
                        </div>
                        @if(true)
                          <div class="mt-4 col-10 offset-1">
                              <button type="submit" class="btn btn-lg btn-block btn-primary">Registrarse</button>
                          </div>
                        @endif
                    </form>
                    <div class="d-flex justify-content-center my-5">
                        <span class="h5"><small>Ya tienes una cuenta?</small> 
                            <a href="{{ route('login') }}" class="small font-weight-bold">Ingresa</a><small> desde aca.</small> 
                        </span>
                      
                    </div>
                    
                </div>
                <div class="col-12 d-none d-md-block col-md-6  col-md-display order-md-0 text-center text-primary align-self-center h1">
                    <i class="fas fa-user-shield fa-6x"></i>
                </div>
                
            </div>
        </div>
    </section>
  </body>
</html>
