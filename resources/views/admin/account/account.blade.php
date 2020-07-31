@extends('layouts.app')

@section('meta-title', 'VeaInmuebles')
@section('meta-description')
VeaInmuebles - cuenta de un usuario.
@endsection

@section('content')
<section id="my-account">
    <div class="container">
       <!--menu-user-->
      @include('admin.componente.menu_account')
      <div class="row">
          <div class="col-lg-3 col-6 my-3">
            <!-- small box -->
            <div class="bg-info p-2">
              <div class="text-white">
                <h3 class="text-center">1</h3>
                <div class="d-flex justify-content-around px-2">
                  <span class="h5">Anuncios regulares</span>
                  <i class="far fa-newspaper text-white fa-3x"></i>
                </div>
              </div>
              <div class="text-center">
                <a href="#" class="btn btn-info btn-block text-white">Comprar <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6 my-3">
            <!-- small box -->
            <div class="bg-success p-2">
              <div class="text-white">
                <h3 class="text-center">0</h3>
                <div class="d-flex justify-content-around px-2">
                  <span class="h5">Anuncios destacados</span>
                  <i class="far fa-newspaper text-white fa-3x"></i>
                </div>
              </div>
              <div class="text-center">
                <a href="#" class="btn btn-success btn-block text-white">Comprar <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <!-- ./col -->
           <div class="col-lg-3 col-6 my-3">
            <!-- small box -->
            <div class="bg-warning p-2">
              <div class="text-white">
                <h3 class="text-center">3</h3>
                <div class="d-flex justify-content-around px-2">
                  <span class="h5">Anuncios publicados</span>
                  <i class="far fa-newspaper text-white fa-3x"></i>
                </div>
              </div>
              <div class="text-center">
                <a href="#" class="btn btn-warning btn-block text-white">Ver <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
         
          <!-- ./col -->
           <div class="col-lg-3 col-6 my-3">
            <!-- small box -->
            <div class="bg-danger p-2">
              <div class="text-white">
                <h3 class="text-center">2</h3>
                <div class="d-flex justify-content-around px-2">
                  <span class="h5">Anuncios por vencer</span>
                  <i class="far fa-newspaper text-white fa-3x"></i>
                </div>
              </div>
              <div class="text-center">
                <a href="#" class="btn btn-danger btn-block text-white">Ver <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <!-- ./col -->
      </div>
       <div class="row my-3">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="bg-primary p-2">
              <div class="text-white">
                <h3 class="text-center">5</h3>
                <div class="d-flex justify-content-around px-2">
                  <span class="h5">Inmuebles registrables</span>
                  <i class="far fa-newspaper text-white fa-3x"></i>
                </div>
              </div>
              <div class="text-center">
                <a href="#" class="btn btn-primary btn-block text-white">Comprar <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <!-- ./col -->
      </div>
      <div class="my-5 offset-lg-2 col-lg-8 connectedSortable ui-sortable">
            
        <!-- TO DO List -->
        <div class="card">
          <div class="card-header ui-sortable-handle d-flex justify-content-between" style="cursor: move;">
            <h3 class="card-title">
              <i class="fas fa-tasks"></i>
              Lista de tareas
            </h3>

            <div class="card-tools">
              <ul class="pagination pagination-sm">
                <li class="page-item"><a href="#" class="page-link">«</a></li>
                <li class="page-item"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">»</a></li>
              </ul>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <ul class="todo-list ui-sortable list-unstyled" data-widget="todo-list">
              <li class=" my-4 d-flex justify-content-between">
                <div>
                  <!-- drag handle -->
                  <span class="handle ui-sortable-handle">
                    <i class="fas fa-ellipsis-v"></i>
                    <i class="fas fa-ellipsis-v"></i>
                  </span>
                  <!-- checkbox -->
                  <div class="icheck-primary d-inline ml-2">
                    <input type="checkbox" value="" name="todo1" id="todoCheck1">
                    <label for="todoCheck1"></label>
                  </div>
                  <!-- todo text -->
                  <span class="text">Llamar a Prentice</span>
                  <!-- Emphasis label -->
                  <small class="badge badge-danger"><i class="far fa-clock"></i> 2 mins</small>
                </div>
                <!-- General tools such as edit or delete-->
                <div class="tools">
                  <i class="far fa-edit text-warning"></i>
                  <i class="fas fa-trash-alt mx-3 text-danger"></i>
                </div>
              </li>
              <li class=" my-4 done d-flex justify-content-between ">
                <div>
                <span class="handle ui-sortable-handle">
                  <i class="fas fa-ellipsis-v"></i>
                  <i class="fas fa-ellipsis-v"></i>
                </span>
                <div class="icheck-primary d-inline ml-2">
                  <input type="checkbox" value="" name="todo2" id="todoCheck2" checked="">
                  <label for="todoCheck2"></label>
                </div>
                <span class="text">Programar visita</span>
                <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small>
                </div>
                <div class="tools">
                  <i class="far fa-edit text-warning"></i>
                  <i class="fas fa-trash-alt mx-3 text-danger"></i>
                </div>
              </li>
              <li class=" my-4 d-flex justify-content-between">
                <div>
                <span class="handle ui-sortable-handle">
                  <i class="fas fa-ellipsis-v"></i>
                  <i class="fas fa-ellipsis-v"></i>
                </span>
                <div class="icheck-primary d-inline ml-2">
                  <input type="checkbox" value="" name="todo3" id="todoCheck3">
                  <label for="todoCheck3"></label>
                </div>
                <span class="text">Cerrar pagos</span>
                <small class="badge badge-warning"><i class="far fa-clock"></i> 1 day</small>
                </div>
                <div class="tools">
                  <i class="far fa-edit text-warning"></i>
                  <i class="fas fa-trash-alt mx-3 text-danger"></i>
                </div>
              </li>
              <li class=" my-4 d-flex justify-content-between">
                <div>
                <span class="handle ui-sortable-handle">
                  <i class="fas fa-ellipsis-v"></i>
                  <i class="fas fa-ellipsis-v"></i>
                </span>
                <div class="icheck-primary d-inline ml-2">
                  <input type="checkbox" value="" name="todo4" id="todoCheck4">
                  <label for="todoCheck4"></label>
                </div>
                <span class="text">Ir a Notaria</span>
                <small class="badge badge-success"><i class="far fa-clock"></i> 3 days</small>
                </div>
                <div class="tools">
                  <i class="far fa-edit text-warning"></i>
                  <i class="fas fa-trash-alt mx-3 text-danger"></i>
                </div>
              </li>
              <li class=" my-4 d-flex justify-content-between">
                <div>
                <span class="handle ui-sortable-handle">
                  <i class="fas fa-ellipsis-v"></i>
                  <i class="fas fa-ellipsis-v"></i>
                </span>
                <div class="icheck-primary d-inline ml-2">
                  <input type="checkbox" value="" name="todo5" id="todoCheck5">
                  <label for="todoCheck5"></label>
                </div>
                <span class="text">Revisar mensajes y notificaciones</span>
                <small class="badge badge-primary"><i class="far fa-clock"></i> 1 week</small>
                </div>
                <div class="tools">
                 <i class="far fa-edit text-warning"></i>
                  <i class="fas fa-trash-alt mx-3 text-danger"></i>
                </div>
              </li>
              <li class=" my-4 d-flex justify-content-between">
                <div>
                <span class="handle ui-sortable-handle">
                  <i class="fas fa-ellipsis-v"></i>
                  <i class="fas fa-ellipsis-v"></i>
                </span>
                <div class="icheck-primary d-inline ml-2">
                  <input type="checkbox" value="" name="todo6" id="todoCheck6">
                  <label for="todoCheck6"></label>
                </div>
                <span class="text">Captar clientes</span>
                <small class="badge badge-secondary"><i class="far fa-clock"></i> 1 month</small>
                </div>
                <div class="tools">
                  <i class="far fa-edit text-warning"></i>
                  <i class="fas fa-trash-alt mx-3 text-danger "></i>
                </div>
              </li>
            </ul>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">
            <button type="button" class="btn btn-info float-right"><i class="fas fa-plus"></i> Añadir Tarea</button>
          </div>
        </div>
        <!-- /.card -->
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
