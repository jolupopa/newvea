@extends('layouts.adminlte.lte')


@section('nav-left-link', 'Editar Role')


@section('bredcrumbs')
<!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->

<li class="breadcrumb-item"><a href="#">Backend</a></li>
<li class="breadcrumb-item"><a href="#">Listar permisos</a></li>
<li class="breadcrumb-item active">Editando permisos</li>

@endsection



@section('content')

  @include('backend.permissions.sections.editform')  

@endsection

@push('styles')

@endpush

@push('scripts')


    
@endpush

@push('load-plugin')

@endpush