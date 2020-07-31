@extends('layouts.adminlte.lte')


@section('nav-left-link', 'Edición Empleado')


@section('bredcrumbs')
<!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->

<li class="breadcrumb-item"><a href="#">Backend</a></li>
<li class="breadcrumb-item"><a href="#">Listar Empleados</a></li>
<li class="breadcrumb-item active">Edición de empleado</li>

@endsection



@section('content')

  @include('backend.administrators.sections.editform')  

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
<script>
  $(document).ready(function () {
     
    
      $('#foto').fileinput({
        language: 'es',
        allowedFileExtensions: ['jpg', 'jpeg', 'png'],
        maxFileSize: 1000,
        showUpload: false,
        showClose: false,
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        theme: "fas"
      });
  });
</script>

@endpush
