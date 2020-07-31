@extends('layouts.app')

@section('meta-title', 'Blog VeaInmuebles')

@section('meta-description')
Listado de etiquetas para una etiqueta especifica.
@endsection

@section('content')

	<!-- Cabezote -->
    @include('frontend.pages.blog.sections.cabezote')    

        <!-- articulos -->
    @include('frontend.pages.blog.sections.listetiquetas')

@endsection
