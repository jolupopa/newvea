
@extends('layouts.adminlte.lte')


@section('nav-left-link', 'Perfil Empleado')


@section('bredcrumbs')
<!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->

<li class="breadcrumb-item"><a href="#">Backend</a></li>
<li class="breadcrumb-item"><a href="#">Listar Empleados</a></li>
<li class="breadcrumb-item active">Perfil de empleado</li>

@endsection



@section('content')

  @include('backend.administrators.sections.profile')  

@endsection

@push('styles')

@endpush

@push('scripts')


    
@endpush

@push('load-plugin')


@endpush
