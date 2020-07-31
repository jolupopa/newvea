@extends('layouts.app')

@section('meta-title', 'Blog VeaInmuebles')

@section('meta-description')
Un Blog donde puedes obtener articulos relacionados con las operaciones de compra venta y alquileres de inmuebles , asi como informacion de los programas de vivienda ofrecidos en territorio peruano por el Ministerio de Vivienda del perú.
@endsection

@section('content')

	<!-- Cabezote -->
    @include('frontend.pages.blog.sections.cabezote')    

        <!-- articulos -->
    @include('frontend.pages.blog.sections.articulos')

@endsection
