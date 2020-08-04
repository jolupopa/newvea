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
	<section id="logueo">
		<div class="container mt-lg-4">
			<div class="row d-flex">
				<div class="col-12 col-md-6 order-md-1 align-self-center bg-contenedor">
					<div class="text-center mt-4 mt-md-0">
						<h1 class="font-weight-normal pt-5"><a href="{{ route('home') }}">VeaInmuebles</a></h1>
						<h2 class="pt-2">Login</h2>
						<p class="h5 text-muted pt-2">Con redes sociales.</p>
					</div>
					<div class="row d-flex jutify-content-between text-center py-3">
						<div class="col-2 offset-3">
							<a href="">
											<i class="fab fa-google-plus-g fa-2x text-danger"></i>
							</a>
						</div>
						<div class="col-2">
							<a href="">
											<i class="fab fa-twitter fa-2x text-info"></i>
							</a>
						</div>
						<div class="col-2">
							<a href="{{ route('social_auth', 'facebook') }}">
											<i class="fab fa-facebook-f fa-2x"></i>
							</a>
						</div>
					</div>
					<span class="clearfix"></span>
					<form  method="POST" action="{{ route('login') }}" class="row  text-primary pt-2" aria-label="{{ __('Login') }}">
							@csrf
							<div class="col-10 offset-1">
									<p class="text-center text-muted pt-3 h5">Ó correo y clave</p>
							</div>
							<div class="form-group col-10 offset-1">
									<label class="sr-only" for="email">Correo</label>
									<div class="input-group">
											<div class="input-group-prepend">
													<span class="input-group-text">
																<i class="fas fa-envelope "></i>
													</span>
											</div>
											<input  id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror"  name="email"    
											value="{{ old('email') }}" 
											required  placeholder="Correo">
											@error('email')
												<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
												</span>
												@enderror
									</div>
							</div>
							<div class="form-group col-10 offset-1">
									<label class="sr-only" for="password">Password</label>
									<div class="input-group">
											<div class="input-group-prepend">
													<span class="input-group-text">
															<i class="fas fa-key"></i>
													</span>
											</div>
											<input id="password" type="password"  class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required
											placeholder="Ingrese su clave">
											@error('password')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
												</span>
												@enderror
											
									</div>
							</div>
							
							<div class="col-10 offset-1 my-3 custom-control custom-checkbox">
										<input type="checkbox" name="remember" class="custom-control-input" id="remember"  {{ old('remember') ? 'checked' : '' }}>
										<label class="custom-control-label text-muted" for="remember">Recuerdame </label>
								</div>
							<div class="mt-4 col-10 offset-1">
									<button type="submit" class="btn btn-lg btn-block btn-primary">Ingresar</button>
							</div>
					</form>
					<div class="d-flex justify-content-between align-items-center my-5">
							<span class="h5"><small>No estas registrado?</small> 
									<a href="{{ route('register') }}" class="small font-weight-bold">Crea una cuenta</a>
							</span>
							<span class="h5">
									<a href="{{ route('password.request') }}" class="small font-weight-bold text-right">Olvidase tu clave?
									</a>
							</span>
					</div>
				</div>
				<div class="col-12 d-none d-md-block col-md-6  col-md-display order-md-0 text-center text-primary align-self-center h1">
						<i class="fas fa-user-lock fa-6x"></i>
				</div>		
			</div>
		</div>
	</section>
</body>
</html>