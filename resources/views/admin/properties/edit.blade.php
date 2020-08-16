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
                <h5>Ubicación</h5>  
                  <!--ubigeo-->
                <div class="row">
                  @include('frontend.pages.includes.ubi_geo')
                      
                        
                  <input type="hidden" id="id_distrito" name="id_distrito"  value="0">

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
            <!-- /.card -->
            <div class="card mb-5" style="width:100%">
              <div class="card-body" style="border-top: 2px solid blue;">
                    <h5 class="mb-4">Opciones de busqueda avanzada:</h5>  
                    <div class="form-group form-check ml-4">
                      <input type="checkbox" class="form-check-input " id="en_estreno" name="en_estreno">
                      <label class="form-check-label mx-2" for="en_estreno">Inmueble para estrenar</label>
                    </div>
                     <div class="form-group form-check ml-4">
                      <input type="checkbox" class="form-check-input" id="en_amoblado" name="en_amoblado">
                      <label class="form-check-label mx-2" for="en_amoblado">Inmueble amoblado</label>
                    </div>
                     <div class="form-group form-check ml-4">
                      <input type="checkbox" class="form-check-input" id="en_condominio" name="en_condominio">
                      <label class="form-check-label mx-2" for="en_condominio">Inmueble ubicado dentro de condominio</label>
                    </div>
                     <div class="form-group form-check ml-4">
                      <input type="checkbox" class="form-check-input" id="en_parque" name="en_parque">
                      <label class="form-check-label mx-2" for="en_parque">Inmueble ubicado frente a un parque</label>
                    </div>
                     <div class="form-group form-check ml-4">
                      <input type="checkbox" class="form-check-input" id="en_esquina" name="en_esquina">
                      <label class="form-check-label mx-2" for="en_esquina">Inmueble ubicado en esquina</label>
                    </div>
                     <div class="form-group form-check ml-4">
                      <input type="checkbox" class="form-check-input" id="en_avenida" name="en_avenida">
                      <label class="form-check-label mx-2" for="en_avenida">Inmueble ubicado frente  avenida principal</label>
                    </div>
                     <div class="form-group form-check ml-4">
                      <input type="checkbox" class="form-check-input" id="en_provivienda" name="en_provivienda">
                      <label class="form-check-label mx-2" for="en_provivienda">Inmueble ofrecido por programa pro vivienda</label>
                    </div>
                     <div class="form-group form-check ml-4">
                      <input type="checkbox" class="form-check-input" id="en_judicial" name="en_judicial">
                      <label class="form-check-label mx-2" for="en_judicial">Inmueble ofrecido por proceso judicial</label>
                    </div>
              </div>
            </div>

          </div>
          <!-- /.col-12 col-md-6 --> 

          <!-- form right -->
          <div class="col-12 col-md-6">
            {{-- detalles --}}
            <div class="card mb-3" style="width:100%">
                    
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

                <!--cuartos - baños y medio baño -->
                <div class="row">
                  <div class="form-group col-3">
                    <label for="num_cuartos"># cuartos</label>
                    <select class="form-control select2bs4  @error('num_cuartos') is-invalid @enderror" id="num_cuartos" name="num_cuartos" style="width: 100%;">
                      <option value="">Selección</option>
                     
                      <option value="1"
                      {{ old('num_cuartos', $property->num_cuartos) == 1 ? 'selected' : '' }} >
                      1
                      </option>
                       <option value="2"
                      {{ old('num_cuartos', $property->num_cuartos) == 2 ? 'selected' : '' }} >
                      2
                      </option>
                       <option value="3"
                      {{ old('num_cuartos', $property->num_cuartos) == 3 ? 'selected' : '' }} >
                      3
                      </option>
                       <option value="4"
                      {{ old('num_cuartos', $property->num_cuartos) == 4 ? 'selected' : '' }} >
                      4
                      </option>
                       <option value="5"
                      {{ old('num_cuartos', $property->num_cuartos) == 5 ? 'selected' : '' }} >
                      5 o más
                      </option>
                     
                    </select>
                    @error('num_cuartos')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>

                  <div class="form-group col-3">
                    <label for="bathroom"># baños</label>
                    <select class="form-control select2bs4  @error('bathroom') is-invalid @enderror" id="bathroom" name="bathroom" style="width: 100%;">
                      <option value="">Selección</option>
                     
                      <option value="1"
                      {{ old('bathroom', $property->bathroom) == 1 ? 'selected' : '' }} >
                      1
                      </option>
                       <option value="2"
                      {{ old('bathroom', $property->bathroom) == 2 ? 'selected' : '' }} >
                      2
                      </option>
                       <option value="3"
                      {{ old('bathroom', $property->bathroom) == 3 ? 'selected' : '' }} >
                      3
                      </option>
                       <option value="4"
                      {{ old('bathroom', $property->bathroom) == 4 ? 'selected' : '' }} >
                      4
                      </option>
                       <option value="5"
                      {{ old('bathroom', $property->bathroom) == 5 ? 'selected' : '' }} >
                      5 o más
                      </option>
                     
                    </select>
                    @error('bathroom')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>

                  <div class="form-group col-3">
                    <label for="midle_bathroom"># medio baño</label>
                    <select class="form-control select2bs4  @error('midle_bathroom') is-invalid @enderror" id="midle_bathroom" name="midle_bathroom" style="width: 100%;">
                      <option value="">Selección</option>
                     
                      <option value="1"
                      {{ old('midle_bathroom', $property->midle_bathroom) == 1 ? 'selected' : '' }} >
                      1
                      </option>
                       <option value="2"
                      {{ old('midle_bathroom', $property->midle_bathroom) == 2 ? 'selected' : '' }} >
                      2
                      </option>
                       <option value="3"
                      {{ old('midle_bathroom', $property->midle_bathroom) == 3 ? 'selected' : '' }} >
                      3
                      </option>
                       <option value="4"
                      {{ old('midle_bathroom', $property->midle_bathroom) == 4 ? 'selected' : '' }} >
                      4
                      </option>
                       <option value="5"
                      {{ old('midle_bathroom', $property->midle_bathroom) == 5 ? 'selected' : '' }} >
                      5 o más
                      </option>
                     
                    </select>
                    @error('midle_bathroom')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>

                  <div class="form-group col-3">
                    <label for="num_cars"># cochera</label>
                    <select class="form-control select2bs4  @error('num_cars') is-invalid @enderror" id="num_cars" name="num_cars" style="width: 100%;">
                      <option value="">Selección</option>
                     
                      <option value="1"
                      {{ old('num_cars', $property->num_cars) == 1 ? 'selected' : '' }} >
                      1
                      </option>
                       <option value="2"
                      {{ old('num_cars', $property->num_cars) == 2 ? 'selected' : '' }} >
                      2
                      </option>
                       <option value="3"
                      {{ old('num_cars', $property->num_cars) == 3 ? 'selected' : '' }} >
                      3
                      </option>
                       <option value="4"
                      {{ old('num_cars', $property->num_cars) == 4 ? 'selected' : '' }} >
                      4
                      </option>
                       <option value="5"
                      {{ old('num_cars', $property->num_cars) == 5 ? 'selected' : '' }} >
                      5 o más
                      </option>
                     
                    </select>
                    @error('num_cars')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                  <!--#pisos  area-total area-construida año-construccion -->
                <div class="row">
                   
                  <div class="form-group col-3">
                    <label for="num_pisos"># pisos</label>
                    <input type="number" class="form-control" name="num_pisos">
                    @error('num_pisos')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>

                  <div class="form-group col-3">
                    <label for="area">area  (m2)</label>
                    <input type="number" class="form-control"  name="area">
                    @error('area')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>

                  <div class="form-group col-3">
                    <label for="area_construida">a. construida</label>
                    <input type="number" class="form-control" name="area_construida">
                    @error('area_construida')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>

                  <div class="form-group col-3">
                    <label for="year_build">año construc.</label>
                    <input type="number" class="form-control" name="year_build">
                    @error('year_build')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>

                </div>

               
              
                

                
                
              </div>
              <!-- /.card-body -->
        
            </div>

             {{-- urls--}}
            <div class="card mb-3" style="width:100%">
              <div class="card-body" style="border-top: 2px solid blue;">   
                 <!--google-maps-->
                <div class="form-group">
                  <label for="url_google_maps">URL google maps</label>
                  <input type="text" class="form-control @error('url_google_maps') is-invalid @enderror"  name="url_google_maps"  value="{{ old('url_google_maps', $property->url_google_maps) }}" placeholder="url google maps">
                  @error('url_google_maps')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="row">
                  <div class="form-group col-6">
                    <label for="longitud">coordenada longitud google maps</label>
                    <input type="text" class="form-control @error('longitud') is-invalid @enderror"  name="longitud"  value="{{ old('longitud', $property->longitud) }}" placeholder="longitud google maps">
                    @error('longitud')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="form-group col-6">
                    <label for="latitud">coordenada latitud google maps</label>
                    <input type="text" class="form-control @error('latitud') is-invalid @enderror"  name="latitud"  value="{{ old('latitud', $property->latitud) }}" placeholder="latitud google maps">
                    @error('latitud')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>


                <!--url video-->
                <div class="form-group">
                  <label for="url_video">URL video promocional - youtube</label>
                  <input type="text" class="form-control @error('url_video') is-invalid @enderror"  name="url_video"  value="{{ old('url_video', $property->url_video) }}" placeholder="url video youtube">
                  @error('url_video')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <!--url foto plano1-->
                <div class="form-group">
                  <label for="url_plano1">URL foto de plano de distribucion</label>
                  <input type="text" class="form-control @error('url_plano1') is-invalid @enderror"  name="url_plano1"  value="{{ old('url_plano1', $property->url_plano1) }}" placeholder="plano de distribución">
                  @error('url_plano1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <!--url foto plano2-->
                <div class="form-group">
                  <label for="url_plano2">URL foto de plano frontal</label>
                  <input type="text" class="form-control @error('url_plano2') is-invalid @enderror"  name="url_plano2"  value="{{ old('url_plano2', $property->url_plano2) }}" placeholder="plano frontal">
                  @error('url_plano2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

               
              </div>
              <!-- /.card-body -->
        
            </div>

            {{-- fotos --}}
            <div class="card" style="width:100%">
              <div class="card-body" style="border-top: 2px solid blue;">   
                <!--fotos--->
                <div class="form-group">
                  <label>Fotos </label>
                  <div class="dropzone">
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
