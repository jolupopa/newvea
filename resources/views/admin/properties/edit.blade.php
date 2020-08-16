@extends('layouts.app')

@section('meta-title', 'VeaInmuebles')
@section('meta-description')
VeaInmuebles - edición de propiedades de usuario
@endsection

@section('content')
<section id="edit_property">
<div class="container"> 
   <!--menu-user-->
      @include('admin.componente.menu_account')
    <!--galeria--->
    <div class="row">
      <div class="col-12">
        <div class="card" style="width:100%">
          <div class="card-body d-flex" style="border-top: 2px solid blue;">
            {{-- @foreach ( post->photos as $photo )
              <form method="POST" action="#">
                {{ method_field('DELETE') }}
                @csrf
                <div class="mx-2">
                  <button class="btn btn-danger btn-sm px-1 py-0" style="position:absolute;">
                    <i class="fas fa-times" ></i>
                  </button>
                  <img src="{{ asset('storage/blog/' . $photo->url) }}" class="img-fluid" width="100px;" />
                </div> 
              </form>
            @endforeach --}}
          </div>
        </div>
      </div>        
    </div>
    <form method="POST" action="{{ route('admin.propiedad.update', $property)  }} " >
      @csrf
      {{ method_field('PUT') }}

      {{-- enctype="multipart/form-data" --}}

      <div class="row">
        
          <!-- form left -->
          <div class="col-12 col-md-6">
            <!--datos de la propiedad-->
            <div class="card" style="width:100%">
                    
              <div class="card-body" style="border-top: 2px solid blue;">
                <!--titulo-->
                <div class="form-group">
                  <label for="title">Titulo</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror"  name="title"  value="{{ old('title', $property->title) }}" placeholder="Titulo">
                  @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <!--resumen--->
                <div class="form-group">
                  <label for="resumen">Resumen</label>
                  <textarea class="form-control @error('resumen') is-invalid @enderror" rows="3" name="resumen"  placeholder="Breve Resumen ...">{{ old('resumen', $property->resumen) }}</textarea>
                  @error('resumen')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <!---detalle--->
                <div class="form-group">
                  <label for="detalle">Detalle</label>
                  <textarea class="form-control editor  @error('detalle') is-invalid @enderror" rows="7" name="detalle" placeholder="Ingresa el detalle ...">{{ old('detalle', $property->detalle) }}</textarea>
                  @error('detalle')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                
              </div>
              <!-- /.card-body -->
        
            </div>
            <!-- /.card -->
            <div class="card" style="width:100%">
              <div class="card-body" style="border-top: 2px solid blue;">
                  <!--ubigeo-->
                <div class="row">
                  @include('frontend.pages.includes.ubi_geo')
                      
                        
                  <input type="hidden" id="distrito_id" name="distrito_id"  value="0">

                  <!--direccion-->
                  <div class="col-8">
                    <div class="form-group">
                      <label for="direccion">Dirección</label>
                      <input type="text" id="direccion" name="direccion" class="form-control shadow-soft form-control-lg @error('direccion') is-invalid @enderror" value="{{ old('direccion', $property->direccion ) }}">
                        @error('direccion')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                  </div>


                  <div class="col-4">
                    <div class="form-group">
                      <label for="distrito">Distrito Seleccionado</label>
                      <input type="text" id="distrito" name="distrito" class="form-control shadow-soft form-control-lg @error('distrito') is-invalid @enderror" value="{{ old('distrito', $property->distrito ) }}" readonly>
                        @error('distrito')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!-- /.col-12 col-md-6 --> 

          <!-- form right -->
          <div class="col-12 col-md-6">
            
            <div class="card" style="width:100%">
                    
              <div class="card-body" style="border-top: 2px solid blue;">   
              
                <!--tipo - operacion y precio de propiedad -->
                <div class="row">
                  <div class="form-group col-4">
                    <label for="type_property_id">Tipo de inmueble</label>
                    <select class="form-control select2bs4  @error('type_property_id') is-invalid @enderror" id="type_property_id" name="type_property_id" style="width: 100%;">
                      <option value="">Selecciona un inmueble</option>
                      @foreach($type_properties as $type_property)
                      <option value="{{ $type_property->id }}"
                      {{ old('type_property_id', $property->type_property_id) == $type_property->id ? 'selected' : '' }} >
                      {{ $type_property->name }}
                      </option>
                      @endforeach 
                    </select>
                    @error('type_property_id')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="form-group col-4">
                    <label for="operation">Tipo de Operación</label>
                    <select class="form-control select2bs4  @error('operation') is-invalid @enderror" id="operation" name="operation" style="width: 100%;">
                      <option value="">Operación</option>
                      <option value="venta"  {{ old('operation', $property->operation) == 'venta' ? 'selected' : '' }}
                      >Venta</option>
                      <option value="alquiler"  {{ old('operation', $property->operation) == 'alquiler' ? 'selected' : '' }}>Alquiler</option>
                    </select>
                    @error('operation')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="form-group col-4">
                    <label for="precio">Precio Ofrecido</label>
                    <input type="number" class="form-control @error('precio') is-invalid @enderror"  name="precio"  value="{{ old('precio', $property->precio) }}" placeholder="Precio ">
                    @error('precio')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <!--fotos--->
                <div class="form-group">
                  <label>Fotos </label>
                  <div class="">
                  </div>
                </div>

                <!--submit--->
                <div class="form-group">
                  <button type='submit' class="btn btn-primary">Guardar</button>
                </div>
              </div>
              <!-- /.card-body -->
        
            </div>
          </div>
          <!-- /.col-12 col-md-6 -->
      </div>
    </form>
 </div>
  
   
</section>
@endsection


@section('modals')
@endsection

@push('styles')
  <!-- dropzone -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/dropzone/min/dropzone.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.css') }}">
@endpush

@push('scripts')
<!-- dropzone -->
<script src="{{ asset('adminlte/plugins/dropzone/min/dropzone.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/moment/locales.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<!-- Summernote -->
<script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
@endpush

@push('load-plugin')
<script>
    $(function () {

        //Initialize Select2 Elements
        $('.select2').select2();

        //Timepicker
        $('#published_at').datetimepicker({
            format: 'L',
            locale: 'es'
        });

         // Summernote
        $('.editor').summernote();    
        //
        
        
    });



</script>   
@endpush
