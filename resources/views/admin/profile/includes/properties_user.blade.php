<h2 class="text-muted text-center my-5">Lista de propiedades</h2>
<!-- listado de propiedades -->
<div class="row" id="list-type" class="property-th-list">
	@forelse($properties as $property)
		<div class="card shadow-soft col-12 my-2 list active" >
			<div class="row no-gutters ">
			
				<div class="col-4  c-img">
					<a href="#">
						<div class="box-label">
							<span class="label-sale">{{ $property->operation }}</span>
						</div>
						@forelse( $property->photos as $foto )
						<img src="{{'/storage/properties/' . $foto->url }}"  class="img-fluid" alt="foto de propiedad" width="210px;">
						@empty
						<img src="/images/property_default.jpg"  class="img-fluid" alt="foto de propiedad" width="210px;">
						@endforelse
				</a>

				</div>

				<div class="col-8  c-body d-flex flex-column justify-content-around">
					<div class="card-body ">
						<h5 class="card-title text-capitalize">{{ $property->title }}</h5>
						<p class="card-text d-none d-lg-block">{{ $property->resumen }}</p>
					</div>
					
						<div class="location text-center mb-2">
							<span class="text-capitalize">departamento error</span> >
							<span class="text-capitalize">provincia error</span> >
							<span class="text-capitalize">distrito error</span> 
					</div>

				

					<div class="border-top py-2  d-flex justify-content-around align-items-end">
						<span class=""><i > S/. </i>{{ number_format($property->precio, 2 ) }}</span>
						@isset( $property->area )
						<span>{{ $property->area }} <span><i>m2-Area</i></span></span>
						@endisset
						@isset( $property->num_cuartos )
						<span>{{ $property->num_cuartos }}<i class="fas fa-bed ml-1"></i></span>
						@endisset
						@isset( $property->bathroon )
						<span>{{ $property->bathroon }}<i class="fas fa-toilet-paper ml-1"></i></span>
						@endisset
						@isset( $property->num_cars )
						<span>{{ $property->num_cars }}<i class="fas fa-car-alt ml-1"></i></span>
						@endisset
					</div>
				</div>

				<div class="col-12">
					<div class="card-footer bg-white border-top d-flex flex-row justify-content-between">
						<div class="text-primary text">
							<a href="">
								<i class="fas fa-user-edit"></i> 
								<span class="text-muted">{{ $property->profile->user->name}}</span>
						</a>
						</div>

						<div class=""><i class="far fa-clock mr-2"></i>{{ $property->published_at ? $property->published_at : 'Sin Publicar' }}</div>
					</div>
				</div>
			</div>
		</div>
	@empty
		<div class="jumbotron w-100 text-center">
			<h1 class="display-4">Sin publicaciones!</h1>
			<a class="btn btn-primary btn-lg my-5" href="#" role="button">Crear Publicación</a>
		</div>  
	@endforelse
</div>


<!-- paginador -->
<div class="row d-flex justify-content-center">
	{{ $properties->links() }}
</div>