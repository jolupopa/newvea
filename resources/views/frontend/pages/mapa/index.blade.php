@extends('layouts.app')

@section('meta-title', 'VeaInmuebles')
@section('meta-description')
VeaInmuebles mapa.
@endsection

@section('content')

	<full-map></full-map>


@endsection


@section('modals')
 		@include('frontend.pages.home.modals.contacto')
    @include('frontend.pages.home.modals.services')
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush

@push('load-plugin')
@endpush