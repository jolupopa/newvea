@extends('layouts.app')

@section('meta-title', 'Blog VeaInmuebles')

@section('meta-description')
Listado de articulos por una categoria especifica.
@endsection

@section('content')

	<!-- Cabezote -->
    @include('frontend.pages.blog.sections.cabezote')    

        <!-- articulos -->
    @include('frontend.pages.blog.sections.listcategorias')

@endsection
