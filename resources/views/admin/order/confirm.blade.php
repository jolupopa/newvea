@extends('layouts.app')

@section('meta-title', 'VeaInmuebles')
@section('meta-description')
VeaInmuebles - orden del usuario
@endsection

@section('content')
	<div class="container">
	
			<h2 class="text-center mt-5 text-primary">Información de Datos </h2>
				<p class="text-primary my-4"><i class="fas fa-info-circle mr-1"></i> Verifique que los datos llenados son los correctos. Si desea modificarlos desde <a href="{{ route( 'datos')}}">  >>> Aca. </a> </p>
				

				@include('admin.menu_user.alerts')

				<form action="{{ route('order.store') }}" method="POST">
					@csrf
					<div class="row">
						<div class="col-12 col-md-8 offset-md-2 container bg-dark">
					
							<div class="h4 text-white text-center mt-4">Se genera una 
								{{ $profile->type_doc == 'dni' ? 'Boleta' : 'Factura'}} con:
																							
							</div>
						
								<h4 class="text-white text-center mt-3">Datos de usuario</h4>
							<table class="table table-striped table-dark ">
								
								<tbody>		
												<tr>
													<th class="">Documento</th>
													<td>
														<input type="text" class="form-control text-uppercase @error('type_doc') is-invalid @enderror" name="type_doc" value="{{$profile->type_doc}}" readonly>
													</td>
												</tr>	
														
												<tr>
													<th class="text-uppercase">N°</th>
													<td>
														<input type="text" class="form-control @error('num_doc') is-invalid @enderror" name="num_doc" value="{{ $profile->num_doc}}" readonly >
													</td>
												</tr>	
												<tr>
													<th scope="row">Nombre</th>
													<td>
														<input type="text" class="form-control text-uppercase @error('full_namec') is-invalid @enderror" name="full_namec" value="{{ $user->name }}" readonly>
													</td>	
												</tr>
													<tr>
													<th scope="row">Dirección</th>
													<td>
														<input type="text" class="form-control  @error('address') is-invalid @enderror" name="address" value="{{ $profile->address }}" readonly>

													</td>	
												</tr>
												</tr>
												<tr>
													<th scope="row">Telefono</th>
													<td>
														<input type="text" class="form-control @error('telf') is-invalid @enderror" name="telf" value="{{ $profile->movil }}" readonly>

													</td>	
												</tr>
												</tr>
												<tr>
													<th scope="row">Email</th>
													<td>
														<input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" readonly>
													</td>	
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
							<h4 class="text-white text-center">Datos de compra </h4>
							<table class="table table-striped table-dark ">
								<thead>
									<tr>
										<th scope="col"></th>
										<th scope="col">Tipo de Anuncio</th>
										<th scope="col" class="text-center">Cantidad</th>
										<th scope="col" class="text-center">Precio</th>
										<th scope="col" class="text-right">SubTotal</th>
									</tr>
								</thead>
								<tbody>
										@for( $i = 0; $i < sizeof($items) ; $i++ )
												<tr>
													<th scope="row">_</th>
													<td>
													<input type="text" class="form-control" name="product{{$i}}" value="{{ $items[$i]['anuncio'] }}" readonly >
													</td>
													<td class="text-center">
														<input type="text" class="form-control text-center" name="cantidad{{$i}}" value="{{ $items[$i]['cantidad'] }}" readonly >
													
													</td>
													<td class="text-right">
														<input type="text" class="form-control text-center" name="precio{{$i}}" value="{{ $items[$i]['precio'] }}" readonly >
													</td>
													<td class="text-right">
														<input type="text" class="form-control text-right" name="parcial{{$i}}" value="{{ $items[$i]['parcial'] }}" readonly >
													</td>
												</tr>	
												
										@endfor	
								</tbody>
								<tfoot>
									<tr>
										<th scope="col"></th>
										<th scope="col" class="text-right">Monto Total incluye IGV</th>
										<th scope="col"></th>
										<th scope="col" class="text-right">S/.</th>
										<th scope="col" width="90px;">
											<input type="text" class="form-control text-right"  name="total" value="{{ $total }}" readonly>

										</th>
									</tr>
								</tfoot>		
							</table>	
						</div>
					
					</div>
					<input type="hidden" name='num_items' value= "{{ sizeof($items) }}" >

					<div class="my-4 d-flex justify-content-around">
						<a href="{{ route('add.index') }}" class="btn btn-warning">Ir Carrito de compras</a>
						<button type="submit"  class="btn btn-success">Generar Comprar</button>
					</div>
				</form>


				

		


	</div>

@endsection


@section('modals')
@endsection

@push('styles')
@endpush

@push('scripts')
<script>
//alert('alert');
</script>

@endpush

@push('load-plugin')
@endpush


