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

	@include('admin.components.platforms')
	
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
