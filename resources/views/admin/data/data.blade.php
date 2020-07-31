@extends('layouts.app')

@section('meta-title', 'VeaInmuebles')
@section('meta-description')
VeaInmuebles - datos de usuario.
@endsection

@section('content')
<section id="my-account">
    <div class="container">
       <!--menu-user-->
      @include('admin.componente.menu_account')
      <div class="row">
        
        <div class="col-12 col-md-6">
        <!--datos de usuario-->
          @include('admin.data.sections.user_data')
           <!--cambiar password-->
           @include('admin.data.sections.change_pass')
          
        </div>

        

        <!--redes sociales-->
        @include('admin.data.sections.redes')
      </div>
    </div>
  </section>
@endsection


@section('modals')
@endsection

@push('styles')
<link href="{{asset("adminlte/plugins/bootstrap-fileinput/css/fileinput.min.css")}}" rel="stylesheet" type="text/css"/>
<style>
.kv-avatar .krajee-default.file-preview-frame,.kv-avatar .krajee-default.file-preview-frame:hover {
    margin: 0;
    padding: 0;
    border: none;
    box-shadow: none;
    text-align: center;
}
.kv-avatar {
    display: inline-block;
}
.kv-avatar .file-input {
    display: table-cell;
    width: 213px;
}
.kv-reqd {
    color: red;
    font-family: monospace;
    font-weight: normal;
}
</style>
@endpush

@push('scripts')

<script src="{{asset("adminlte/plugins/bootstrap-fileinput/js/fileinput.min.js")}}" type="text/javascript"></script>
<script src="{{asset("adminlte/plugins/bootstrap-fileinput/js/locales/es.js")}}" type="text/javascript"></script>
<script src="{{asset("adminlte/plugins/bootstrap-fileinput/themes/fas/theme.min.js")}}" type="text/javascript"></script> 

@endpush

@push('load-plugin')

@endpush
