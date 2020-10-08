@extends('layouts.app')

@section('meta-title', 'VeaInmuebles')
@section('meta-description')
VeaInmuebles - creditos de usuario
@endsection

@section('content')
<div class="container">

	<div class="card bg-light my-4">
		<div class="card-header">
			<h4 class="text-center"> {{ $order->type_doc == 'dni' ? 'BOLETA' : 'FACTURA'}} N° {{ $order->num_fact_bol == null ? 'Por Generar' : $order->num_fact_bol }}</h4>
		</div>

		<div class="card-body">
			<div class="text-center my-2">
				Orden N°- {{ $order->id}} del {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y')}} generado a las 
				{{ \Carbon\Carbon::parse($order->created_at)->format('H:i')}} horas 
			</div>

			<div class="form-group row">
				<label class="col-sm-2"> Cliente = </label>
				<input type="text" class="form-control col-sm-10" value="{{ $order->fullname }}" readonly>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 text-uppercase"> {{ $order->tipo_doc}} =</label>
				<input type="text" class="form-control col-sm-10" value="{{ $order->num_doc }}" readonly>
			</div>

			<div class="form-group row">
				<label class="col-sm-2">Dirección =</label>
				<input type="text" class="form-control col-sm-10" value="{{ $order->address }}" readonly>
			</div>
			<div class="form-group row">
				<label class="col-sm-2">Telefono =</label>
				<input type="text" class="form-control col-sm-3" value="{{ $order->telf }}" readonly>
				<label class="col-sm-2 offset-sm-2">Email =</label>
				<input type="text" class="form-control col-sm-3" value="{{ $order->email }}" readonly>
			</div>
			<hr>
			<h5 class="text-center">Detalle</h5>	
			<hr>
			<table class="table ">
				<thead>
					<tr>
						
						<th scope="col">Tipo de Anuncio</th>
						<th scope="col" class="text-center">Cantidad</th>
						<th scope="col" class="text-center">Precio</th>
						<th scope="col" class="text-right">SubTotal</th>
					</tr>
				</thead>
				<tbody>
						@for( $i = 0; $i < sizeof($order->products) ; $i++ )
								<tr>
									
									<td>
									<input type="text" class="form-control"  value="{{ $items[$i]['producto'] }}" readonly >
									</td>
									<td class="text-center">
										<input type="text" class="form-control text-center"  value="{{ $items[$i]['cantidad'] }}" readonly >
									
									</td>
									<td class="text-right">
										<input type="text" class="form-control text-center"  value="{{ $items[$i]['precio'] }}" readonly >
									</td>
									<td class="text-right">
										<input type="text" class="form-control text-right"  value="{{ $items[$i]['parcial'] }}" readonly >
									</td>
								</tr>			
						@endfor	
				</tbody>
				<tfoot>
					<tr>
					
						<th scope="col" class="text-right">Monto Total incluye IGV</th>
						<th scope="col"></th>
						<th scope="col" class="text-right">S/.</th>
						<th scope="col" width="90px;">
							<input type="text" class="form-control text-right"  name="total" value="{{ $order->total }}" readonly>

						</th>
					</tr>
				</tfoot>		
			</table>	

		</div>
		
		<div class="card-footer"> Trujillo {{NOW()}} </div>

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


