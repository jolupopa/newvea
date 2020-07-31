@extends('layouts.app')


@section('meta-title')
{{ $post->title }}
@endsection

@section('meta-description')
{{ $post->excerpt }}
@endsection

@section('content')
	<!-- detalle -->
    @include('frontend.pages.blog.sections.detalle')    
@endsection