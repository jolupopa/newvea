@extends('layouts.app')

@section('meta-title', 'VeaInmuebles')
@section('meta-description')
VeaInmuebles - descripcion.
@endsection

@section('content')


<div class="container mb-5">
	<h2 class="text-primary my-4 text-center">Su pedido de compra ha sido recibida</h2>

	<div class="row">
		<div class="offset-md-4 col-md-4">
			<ul>
				<li class="h4">N° Orden de Compra = {{ $order->id }}</li>
				<li class="h4">	Usuario = {{ $order->fullname }}</li>
				<li class="h2">	Monto S/. = {{ $order->total }}</li>
			</ul>
		</div>
	</div>

	<div class="row mb-5">
		<div class="col-10 offset-1 col-md-4 offset-md-4">
			<h4 class=" text-primary">Selección de plataforma de pago:</h4>
			<div id="accordion">
				<div class="card">
					<div class="card-header bg-white p-0">
						
						<div class="d-flex justify-content-between btn-group btn-group-toggle" data-toggle="buttons">
							<label class="btn btn-outline-secundary rounded mr-2 p-0" data-toggle="collapse" data-target="#collapse10">
								<input type="radio" name="options" >
									<img src="/images/pasarela/yape1.png" class="img-thumbnail img-fluid p-0 m-0" width="75px;" alt="foto plataforma">
							</label>
							<label class="btn btn-outline-secundary rounded mx-2 p-0" data-toggle="collapse" data-target="#collapse20">
								<input type="radio" name="options" > 
									<img src="/images/pasarela/plin.png" class="img-thumbnail img-fluid" width="75px;" alt="foto plataforma">
							</label>
							<label class="btn btn-outline-secundary rounded mx-2 p-0" data-toggle="collapse" data-target="#collapse30">
								<input type="radio" name="options" >
								<img src="/images/pasarela/paypal.png" class="img-thumbnail img-fluid" width="75px;" alt="foto plataforma">
							</label>
								<label class="btn btn-outline-secundary rounded ml-2 p-0" data-toggle="collapse" data-target="#collapse40">
								<input type="radio" name="options" >
								<img src="/images/pasarela/payu.png" class="img-thumbnail img-fluid" width="75px;" alt="foto plataforma">
							</label>
						</div>
					</div>
					<div id="collapse10" class="collapse" data-parent="#accordion">
						<div class="card-body">
							@include('admin.components.yape')
						</div>
					</div>
					<div id="collapse20" class="collapse" data-parent="#accordion">
						<div class="card-body">
								@include('admin.components.plin')
						</div>
					</div>
					<div id="collapse30" class="collapse" data-parent="#accordion">
						<div class="card-body">
								@include('admin.components.paypal')
						</div>
					</div>
					<div id="collapse40" class="collapse" data-parent="#accordion">
						<div class="card-body">
								@include('admin.components.payu')
						</div>
					</div>
					
				</div>
			
			</div>
			
		</div>
	</div>

	
</div >

@endsection


@section('modals')
@endsection

@push('styles')
@endpush

@push('scripts')
<script>
	localStorage.clear();
</script>
@endpush

@push('load-plugin')
@endpush
