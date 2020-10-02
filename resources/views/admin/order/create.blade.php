@extends('layouts.app')

@section('meta-title', 'VeaInmuebles')
@section('meta-description')
VeaInmuebles - orden del usuario
@endsection

@section('content')
	<div class="container">
	
			<h2 class="text-center mt-5 text-primary">Información de Datos</h2>
				<p class="text-primary my-4"><i class="fas fa-info-circle mr-1"></i> Verifique que los datos llenados son los correctos.</p>
				<div class="row">
					<div class="col-12 col-md-6">
					
						<table class="table table-striped table-dark ">
							<thead>
								<tr>
									<th scope="col"></th>
									<th scope="col">Datos de usuario</th>
									
								</tr>
							</thead>
							<tbody>				
											<tr>
											
												<td>RUC</td>
												<td>{{ $profile->num_doc}}</td>
											</tr>	
											<tr>
												<th scope="row">Nombre</th>
												<td>{{ $user->name }}</td>	
											</tr>
												<tr>
												<th scope="row">Dirección</th>
												<td>{{ $profile->address }}</td>	
											</tr>
											</tr>
											<tr>
												<th scope="row">Telefono</th>
												<td>{{ $profile->movil }}</td>	
											</tr>
											</tr>
											<tr>
												<th scope="row">Email</th>
												<td>{{ $user->email }}</td>	
											</tr>
												
									
							</tbody>
							<tfoot>
								<tr>
									<th scope="col"></th>
									<th scope="col" class="text-right"></th>
									<th scope="col"></th>
									<th scope="col" class="text-right"></th>
									<th scope="col" class="text-right"></th>
								</tr>
							</tfoot>		
						</table>	
					</div>
					<div class="col-12 col-md-6">
						
						<table class="table table-striped table-dark ">
							<thead>
								<tr>
									<th scope="col"></th>
									<th scope="col">Tipo de Anuncio</th>
									<th scope="col" >Cantidad</th>
									<th scope="col" class="text-right">Precio</th>
									<th scope="col" class="text-right">SubTotal</th>
								</tr>
							</thead>
							<tbody>
									@foreach( $anuncios as $anuncio)
										@foreach($products as $product)
											@if( $anuncio->id == $product->id )
											<tr>
												<th scope="row">_</th>
												<td>{{$product->name}}</td>
												<td class="text-center">{{ $anuncio->cantidad }}</td>
												<td class="text-right">{{ $product->price }}</td>
												
												<td class="text-right">{{ $product->price * $anuncio->cantidad }}</td>
												<span class="d-none"> {{$total = $total + $product->price * $anuncio->cantidad}} </span>
												
											@endif
										@endforeach
									@endforeach	
							</tbody>
							<tfoot>
								<tr>
									<th scope="col"></th>
									<th scope="col" class="text-right">Total inc. IGV</th>
									<th scope="col"></th>
									<th scope="col" class="text-right">S/.</th>
									<th scope="col" class="text-right">{{ $total }}</th>
								</tr>
							</tfoot>		
						</table>	
					
					</div>
				</div>
				<div class="my-4 d-flex justify-content-around">
					<a href="{{ route('add.index') }}" class="btn btn-warning">Ir Carrito de compras</a>
					<a href="" class="btn btn-success">Generar Comprar</a>
				</div>


				

		


	</div>

@endsection


@section('modals')
@endsection

@push('styles')
@endpush

@push('scripts')

@endpush

@push('load-plugin')
@endpush


