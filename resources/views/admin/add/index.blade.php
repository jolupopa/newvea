@extends('layouts.app')

@section('meta-title', 'VeaInmuebles')
@section('meta-description')
VeaInmuebles - creditos de usuario
@endsection

@section('content')
	<div class="container">
	
			<h2 class="text-center mt-5">Agrega el tipo de Anuncio deseado</h2>
				<p class="text-primary mb-0"><i class="fas fa-info-circle mr-1"></i> Adquiere creditos para publicar tus anuncios.</p>
	
		<div class="row" id="lista-anuncios">
			<div class="col-12 col-xl-8">
				<div class="row my-3">
					@foreach($products as $product)
					<div class="col-md-4">
					  <div class="card my-4">
							<div class="card-header">
								<h5 class="card-title text-center">{{ $product->name }}</h5>
							</div>
							<div class="card-body text-center">
								<p class="mb-2 text-muted text-uppercase small"><span>{{ $product->number_adds }} </span> anuncio</p>
								<p class="mb-2 text-muted text-uppercase small"><span>{{ $product->number_days }} </span>dias de publicación</p>
								<p class="mb-2 text-muted text-uppercase small"><span>{{ $product->number_photos }} </span>fotos máximo</p>

								@if( $product->video)
								<p class="mb-2 text-muted text-uppercase small">Opcion a 1 video</p>
								@endIf

								@if( $product->planos)
								<p class="mb-2 text-muted text-uppercase small">Opcion a 2 planos</p>
								@endIf

								@if( $product->vista_home)
								<p class="mb-2 text-muted text-uppercase small">vista en destacados del home</p>
								@endIf

								@if( $product->vista_map)
								<p class="mb-2 text-muted text-uppercase small">Visibilidad en mapa inmuebles</p>
								@endIf

								<p class="mb-2 text-muted text-uppercase small">{{ $product->visibilidad }}</p>
								<p class="mb-2 text-muted text-uppercase small">{{ $product->sugerencia }}</p>
							</div>
							<div class="card-footer">
								<div class="text-center">
									S/ <span class="mx-1">{{ $product->price }}</span>
									<a href="#" class="btn btn-primary agregar-carrito" data-id="{{ $product->id }}"> Añadir</a>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			
				
				
			</div>
				<div class="col-xl-4 align-self-center">
					
					<div class="card my-5">
						<div class="card-header">
							<h5 class="card-title text-center py-4">Carrito de compras
								<span>
									<img src="/images/cart.png" alt="cart">
								</span>
							</h5>
						</div>

						<div class="card-body">
							<a href="#" id="vaciar-carrito" class="btn btn-danger btn-block mb-4">Vaciar Carrito</a>
							<div id="carrito">
								<table id="lista-carrito" class="table table-hover responsive">
										<thead>
												<tr>
														<th width="30%">Anuncio</th>
														<th width="15%" class="text-right">Precio</th>
														<th width="20%" class="text-xl-center"> &nbsp;&nbsp;&nbsp;&nbsp; Und</th>
														<th width="15%" class="text-right">Subtotal</th>
														<th width="5%"></th>
												</tr>
										</thead>
										
										<tbody id="lista-items">			
										</tbody>

										<tfoot>
											<tr>
												<th width="35%"></th>
												<th width="10%" class="text-right"></th>
												<th width="30%" class="text-right">Total S/</th>
												<th width="10%" class="text-right" id="total">0.00</th>
												<th width="5%"></th>
											</tr>
										</tfoot>
								</table>
							</div>

							<p class="text-right">Monto incluye IGV.</p>
						</div>
					</div>
				</div>
		</div>
		<div class="d-flex justify-content-end">
			<div class="card mb-3 col-12 col-xl-4">
				<div class="card-body">
					<a class="dark-grey-text d-flex justify-content-between" data-toggle="collapse" href="#collapseExample1"
						aria-expanded="false" aria-controls="collapseExample1">
						Agrega el código de descuento (opcional)
						<span><i class="fas fa-chevron-down pt-1"></i></span>
					</a>

					<div class="collapse" id="collapseExample1">
						<div class="mt-3">
							<div class="md-form md-outline mb-0">
								<input action="#" type="text" id="discount-code1" class="form-control font-weight-light"
									placeholder="Ingresa codigo promocional">
							</div>
						</div>
					</div>
					<div class="d-flex justify-content-between">
						<a href="{{ route('order.create') }}" class="btn btn-danger mt-4">Salir</a>

						<a href="{{ route('order.create') }}" class="btn btn-primary mt-4">Confirmar Datos de Orden</a>
					</div>
				</div>			
			</div>
		</div>	
	

	
		<div class="row mb-5">

			<div class="card col-12">
				<div class="card-body">
					<h5 class="text-primary text-center">Plazo máximo de activación 24 horas. </h5>
				</div>
			</div>
			<div class="card col-12">
				<div class="card-body">
					<h5 class="mb-4">Medios de Pago:</h5>
					<img class="mr-2" width="75px"
						src="/images/pasarela/yape-234x300.png"
						alt="Yape">
					<img class="mr-2" width="225px"
					src="/images/pasarela/plin.jpg"
					alt="Plin">


					<img class="mr-2" width="75px"
						src="/images/pasarela/visa.jpg"
						alt="Visa">
				
					<img class="mr-2" width="100px"
						src="/images/pasarela/paypal.png"
						alt="PayPal">

						<img class="mr-2" width="100px"
						src="/images/pasarela/western-union.jpg"
						alt="Western-Union">	
					
				</div>
			</div>
			
		</div>
	</div>

@endsection


@section('modals')
@endsection

@push('styles')
@endpush

@push('scripts')
<script src="/js/cart.js"></script>
@endpush

@push('load-plugin')
@endpush


