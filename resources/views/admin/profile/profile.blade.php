@extends('layouts.app')

@section('meta-title', 'VeaInmuebles')
@section('meta-description')
VeaInmuebles - perfil de usuario.
@endsection

@section('content')
 <section id="profile">
    <div class="container">

      <!--menu-user-->
     @isset($nav_menu )
      @include( $nav_menu  )
     @endisset
      

      
      <div class="row">
        <!--seccion agente-->
        <div class="col-12 col-md-6  col-lg-4 ">
         @include('admin.profile.includes.data_user')
        </div>
        <!--seccion propiedades-->
        <div class="col-12 col-md-6 col-lg-8  text-muted">
          <!--inicio-->
          @include('admin.profile.includes.properties_user') 
          <!--fin--> 
        </div>
      </div>

     
      
    </div>
  </section>

@endsection


@section('modals')
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush

@push('load-plugin')
@endpush