@extends('layouts.app')

@section('meta-title', 'VeaInmuebles')
@section('meta-description')
Listado de publicacion de inmuebles de un promotor.
@endsection

@section('content')

<div class="row">
    
    <div class="col-12 col-md-6  col-lg-4 ">
        <!--datos del promotor-->
       @include('frontend.pages.properties.by_promotor.profile')
    </div>
    
    <div class="col-12 col-md-6 col-lg-8  text-muted">
        <!-- listado de propiedades -->
         @include('frontend.pages.properties.by_promotor.lista')
       
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

 