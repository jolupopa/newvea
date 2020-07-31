@extends('layouts.app')

@section('meta-title', 'VeaInmuebles')
@section('meta-description')
Ubicación geografica.
@endsection

@section('content')
   
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6">
            <form action="">
                @include('frontend.pages.includes.ubi_geo')
            </form>

        </div>
    </div>
</div>
@endsection


@section('modals')
@endsection

@push('styles')
@endpush

@push('scripts')
    <script src="{{ asset('js/ubigeo.js') }}"></script>
@endpush

@push('load-plugin')
@endpush
