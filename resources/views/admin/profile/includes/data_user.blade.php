 <aside class="t shadow-soft">
	<!--profile-->
	<div class="row">
		<div class="col-4">
			<a href="">
					<img src="{{asset('storage/avatars/' . $user->avatar) }}" class="img-fluid rounded-circle mt-5">
			</a>
		</div>

		<div class="col-8 d-flex align-items-center">
			<div>
				<h3 class="text-muted text-capitalize pt-5">{{ $user->name}}</h3>
				<h5 class="text-muted text-capitalize">{{ $user->profile->title }}</h5> 
			</div>
				
		</div>

		<div class="col-12 py-5 d-flex justify-content-around">
			<a target="_blank" href="">
				<i class="fab fa-twitter fa-2x"></i>
			</a>
			<a target="_blank" href="">
				<i class="fab fa-facebook fa-2x"></i>
			</a>
			<a target="_blank" href="">
				<i class="fab fa-linkedin fa-2x"></i>
			</a> 
			<a taraget="_blank" href="">
				<i class="fab fa-instagram-square fa-2x"></i>
			</a>       
		</div>

			<div class="col-12 text-muted">
				<h5><span class="mx-3"><i class="far fa-envelope"></i></span>{{ $user->email }}</h5>

				@isset( $user->profile->email2 )
					<h5><span class="mx-3"><i class="far fa-envelope"></i></span>
					{{ $user->profile->email2 }}
					</h5>
				@endisset

				@isset($user->profile->phone)
					<h5><span class="mx-3"><i class="fas fa-mobile-alt mr-2"></i></span>{{ $user->profile->phone}}
					</h5>
				@endisset

				@isset($user->profile->movil)
					<h5><span class="mx-3"><i class="fas fa-mobile-alt mr-2"></i></span>{{ $user->profile->movil}}
					</h5>
				@else
					<h5><span class="mx-3"><i class="fas fa-mobile-alt mr-2"></i></span>Celular sin definir
					</h5>
				@endisset

				@isset($user->profile->address )
					<h6 class="text-capitalize"> <span class="mx-3"><i class="fas fa-map-marker-alt mr-2"></i></span>{{ $user->profile->address}}
					</h6>
				@else
					<h5> <span class="mx-3"><i class="fas fa-map-marker-alt mr-2"></i></span>Dirección sin definir
					</h5>
				@endisset
				

				@isset( $distrito->name )
					<h5>
						<span class="mx-3"><i class="fas fa-angle-right mr-4"></i>Distrito:</span>
						<span class="text-capitalize">{{ $distrito->name }}</span>
					</h5>
				@else
					<h5>
						<span class="mx-3"><i class="fas fa-angle-right mr-4"></i>Distrito:</span>
						<span>Sin definir</span>
					</h5>
				@endisset

				@isset( $distrito->provincia->name )
					<h5>
						<span class="mx-3"><i class="fas fa-angle-right mr-4"></i>Provincia:</span>
						<span class="text-capitalize">{{$distrito->provincia->name}}</span>
					</h5>
				@else
					<h5>
						<span class="mx-3"><i class="fas fa-angle-right mr-4"></i>Provincia:</span>
						<span>Sin definir</span>
					</h5>
				@endisset

				@isset( $distrito->provincia->departamento->name )
					<h5>
						<span class="mx-3"><i class="fas fa-angle-right mr-4"></i>Departamento:</span>
						<span class="text-capitalize">{{ $distrito->provincia->departamento->name }}</span>
					</h5>
				@else
					<h5>
						<span class="mx-3"><i class="fas fa-angle-right mr-4"></i>Departamento:</span>
						<span>Sin definir</span>
					</h5>
				@endisset
				<h4 class="text-mutet ml-5 mt-3">Acerca de mi:</h4> 
				@isset($user->profile->about_me ) 
					<p class="pb-4 ml-5 mb-5">{{ $user->profile->about_me }}</p>
				@else
					<h5 class="ml-5 mb-5"> <span>Sin definir</span> </h5>
				@endisset

			</div>
			
	</div>
	<!--fin formulario-->
</aside>