@extends('layouts.app')

@section('meta-title', 'VeaInmuebles')
@section('meta-description')
VeaInmuebles - edición de propiedades de usuario
@endsection

@section('content')
<section id="edit_property">
<div class="container"> 
   <!--menu-user-->
      @include('admin.menu_user.menu')
    <!--galeria--->
    <div class="row">
      <div class="col-12">
        <div class="card" style="width:100%">
          <div class="card-head d-flex justify-content-between"><span class="ml-5 pt-3">{{ $property->photos->count() >= 1 ? 'Seleccione imagen de portada' : ''}}</span><a href="{{ route('admin.propiedad.index') }}" class="btn btn-primary">Listar propiedades</a> </div>
          <div class="card-body d-flex" style="border-top: 2px solid blue;">
            @foreach ( $property->photos as $photo )



              <form method="POST" action="{{ route('admin.propiedad.photo.destroy', $photo) }}">
                {{ method_field('DELETE') }}
                @csrf
                <div class="mx-2">
                  <button class="btn btn-danger btn-sm px-1 py-0" style="position:absolute;">
                    <i class="fas fa-times" ></i>
                  </button>
                  
                  <img src="{{ asset('storage/properties/' . $photo->url) }}" class="img-fluid" width="100px;" /><br/>
                  <a href="{{ route('admin.propiedad.caratula', [$photo, $property] ) }}" class="btn {{ $photo->featured == 1 ? 'btn-primary' : 'btn-secundary'}} mt-2">Portada</a>
                </div> 
              
              </form>
            @endforeach
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
               
                <!---detalle--->
                <div class="form-group">
                  <label for="detalle">Detalle</label>
                  <textarea class="form-control @error('detalle') is-invalid @enderror" rows="7" name="detalle" placeholder="Ingresa el detalle ...">{{ old('detalle', $property->detalle) }}</textarea>
                  @error('detalle')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                
              </div>
              <!-- /.card-body ubicacion -->
        
            </div>
            <!-- /.card -->
            <div class="card" style="width:100%">
              <div class="card-body" style="border-top: 2px solid blue;">
                <h5>Ubicación</h5>  
                  <!--ubigeo-->
                <div class="row">
                  @include('frontend.pages.includes.ubi_geo')                  
                  <input type="hidden" id="distrito_id" name="distrito_id"  value="{{ old('distrito_id', $property->distrito_id )}}">
                   <input type="hidden" id="provincia_id" name="provincia_id"  value="{{ old('provincia_id', $property->provincia_id) }}">

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
                      <label for="name_distrito">Distrito Seleccionado</label>
                      <input type="text" id="name_distrito" name="name_distrito" class="form-control shadow-soft form-control-lg @error('name_distrito') is-invalid @enderror" value="{{ old('name_distrito', $property->name_distrito ) }}" readonly>
                        @error('name_distrito')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card  opciones de busqueda-->
            <div class="card mb-5" style="width:100%">
              <div class="card-body" style="border-top: 2px solid blue;">
                    <h5 class="mb-4">Opciones de busqueda avanzada:</h5>  
                    <div class="form-group form-check ml-4">
                      <input type="checkbox" class="form-check-input" id="en_estreno" name="en_estreno" {{ $property->en_estreno == 1 ? 'checked' : "" }} >
                      <label class="form-check-label mx-2" for="en_estreno" >Inmueble para estrenar</label>
                    </div>
                     <div class="form-group form-check ml-4">
                      <input type="checkbox" class="form-check-input" id="en_amoblado" name="en_amoblado"{{ $property->en_amoblado == 1 ? 'checked' : "" }} >
                      <label class="form-check-label mx-2" for="en_amoblado">Inmueble amoblado</label>
                    </div>
                     <div class="form-group form-check ml-4">
                      <input type="checkbox" class="form-check-input" id="en_condominio" name="en_condominio" {{ $property->en_condominio == 1 ? 'checked' : "" }} >
                      <label class="form-check-label mx-2" for="en_condominio">Inmueble ubicado dentro de condominio</label>
                    </div>
                     <div class="form-group form-check ml-4">
                      <input type="checkbox" class="form-check-input" id="en_parque" name="en_parque" {{ $property->en_parque == 1 ? 'checked' : "" }} >
                      <label class="form-check-label mx-2" for="en_parque">Inmueble ubicado frente a un parque</label>
                    </div>
                     <div class="form-group form-check ml-4">
                      <input type="checkbox" class="form-check-input" id="en_esquina" name="en_esquina" {{ $property->en_esquina == 1 ? 'checked' : "" }} >
                      <label class="form-check-label mx-2" for="en_esquina">Inmueble ubicado en esquina</label>
                    </div>
                     <div class="form-group form-check ml-4">
                      <input type="checkbox" class="form-check-input" id="en_avenida" name="en_avenida" {{ $property->en_avenida == 1 ? 'checked' : "" }} >
                      <label class="form-check-label mx-2" for="en_avenida">Inmueble ubicado frente  avenida principal</label>
                    </div>
                     <div class="form-group form-check ml-4">
                      <input type="checkbox" class="form-check-input" id="en_provivienda" name="en_provivienda" {{ $property->en_provivienda == 1 ? 'checked' : "" }} >
                      <label class="form-check-label mx-2" for="en_provivienda">Inmueble ofrecido por programa pro vivienda</label>
                    </div>
                     <div class="form-group form-check ml-4">
                      <input type="checkbox" class="form-check-input" id="en_judicial" name="en_judicial" {{ $property->en_judicial == 1 ? 'checked' : "" }} >
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
                  <div class="form-group col-4 text-center">
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
                  <div class="form-group col-4 text-center">
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
                  <div class="form-group col-4 text-center">
                    <label for="precio">Precio en S/.</label>
                    <input type="number" class="form-control @error('precio') is-invalid @enderror"  name="precio" min="0" max="10000000" value="{{ old('precio', $property->precio) }}" placeholder="Precio ">
                    @error('precio')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <!--cuartos - baños y medio baño -->
                <div class="row">
                  <div class="form-group col-3 text-center">
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

                  <div class="form-group col-3 text-center">
                    <label for="bathroon"># baños</label>
                    <select class="form-control select2bs4  @error('bathroon') is-invalid @enderror" id="bathroon" name="bathroon" style="width: 100%;">
                      <option value="">Selección</option>
                     
                      <option value="1"
                      {{ old('bathroon', $property->bathroon) == 1 ? 'selected' : '' }} >
                      1
                      </option>
                       <option value="2"
                      {{ old('bathroon', $property->bathroon) == 2 ? 'selected' : '' }} >
                      2
                      </option>
                       <option value="3"
                      {{ old('bathroon', $property->bathroon) == 3 ? 'selected' : '' }} >
                      3
                      </option>
                       <option value="4"
                      {{ old('bathroon', $property->bathroon) == 4 ? 'selected' : '' }} >
                      4
                      </option>
                       <option value="5"
                      {{ old('bathroon', $property->bathroon) == 5 ? 'selected' : '' }} >
                      5 o más
                      </option>
                     
                    </select>
                    @error('bathroon')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>

                  <div class="form-group col-3 text-center">
                    <label for="midle_bathroon"># medio baño</label>
                    <select class="form-control select2bs4  @error('midle_bathroon') is-invalid @enderror" id="midle_bathroon" name="midle_bathroon" style="width: 100%;">
                      <option value="">Selección</option>
                     
                      <option value="1"
                      {{ old('midle_bathroon', $property->midle_bathroon) == 1 ? 'selected' : '' }} >
                      1
                      </option>
                       <option value="2"
                      {{ old('midle_bathroon', $property->midle_bathroon) == 2 ? 'selected' : '' }} >
                      2
                      </option>
                       <option value="3"
                      {{ old('midle_bathroon', $property->midle_bathroon) == 3 ? 'selected' : '' }} >
                      3
                      </option>
                       <option value="4"
                      {{ old('midle_bathroon', $property->midle_bathroon) == 4 ? 'selected' : '' }} >
                      4
                      </option>
                       <option value="5"
                      {{ old('midle_bathroon', $property->midle_bathroon) == 5 ? 'selected' : '' }} >
                      5 o más
                      </option>
                     
                    </select>
                    @error('midle_bathroon')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>

                  <div class="form-group col-3 text-center">
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
                   
                  <div class="form-group col-3 text-center">
                    <label for="num_pisos"># pisos</label>
                    <input type="number" class="form-control" min="1" max="20" name="num_pisos" value="{{ old('num_pisos', $property->num_pisos) }}" >
                    @error('num_pisos')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>

                  <div class="form-group col-3 text-center">
                    <label for="area">area  (m2)</label>
                    <input type="number" class="form-control" min="0" max="10000000" name="area" value="{{ old('area', $property->area) }}" >
                    @error('area')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>

                  <div class="form-group col-3 text-center">
                    <label for="area_construida">a. construida</label>
                    <input type="number" class="form-control" min="0" max="10000000" name="area_construida" value="{{ old('area_construida', $property->area_construida) }}" >
                    @error('area_construida')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>

                  <div class="form-group col-3 text-center">
                    <label for="year_build">año construc.</label>
                    <input type="number" class="form-control" min="1950" max="3000" name="year_build" value="{{ old('year_build', $property->year_build) }}" >
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
                <div id="myMap"  style="border-bottom: 2px solid blue;" class="mb-4">
                
                </div>
                <div class="row">
                  <div class="form-group col-6">
                    <label for="longitud">Cordenada de Longitud</label>
                    <input type="text" class="form-control @error('longitud') is-invalid @enderror"  name="longitud"  value="{{ old('longitud', $property->longitud) }}" placeholder="longitud maps" readonly>
                    @error('longitud')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="form-group col-6">
                    <label for="latitud">Cordenada de Latitud</label>
                    <input type="text" class="form-control @error('latitud') is-invalid @enderror"  name="latitud"  value="{{ old('latitud', $property->latitud) }}" placeholder="latitud maps" readonly>
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

            <div>
              @foreach ( $property->photos as $photo )
              <input type="hidden" id="{{ $photo->id }}" class="galeria" value="{{ 'storage/properties/' . $photo->url }}">
              @endforeach
            </div>

            {{-- fotos --}}
            <div class="card" style="width:100%">
              <div class="card-body" style="border-top: 2px solid blue;">   
                <!--fotos--->
                <div class="form-group">
                  <label class="h5 ml-5">Galeria de imagenes</label>
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
    <!--leaflet-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
   <link rel="stylesheet" href="/vendor/plugins_maps/esri-leaflet-geocoder/src/esri-leaflet-geocoder.css"/>

    <style>
    .dropzone .dz-preview .dz-image img {

      width: 150px;
    }
     #myMap {
	    height: 400px;
	    width: 100%;
	}
    </style>
 
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
<!--leaflet-->
 
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
  integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
  crossorigin=""></script>
  <!-- Load Esri Leaflet from CDN -->
<script src="/vendor/plugins_maps/esri-leaflet/dist/esri-leaflet.js"></script>
    <!-- Esri Leaflet Geocoder -->
<script src="/vendor/plugins_maps/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.js"></script>




@endpush

@push('load-plugin')
<script>
   
        Dropzone.autoDiscover = false;

        var myDropzone = new Dropzone(".dropzone", {
        url: "/admin/propiedad/{{ $property->id }}/photos",
        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        paramName: "photo", // The name that will be used to transfer the file
        maxFilesize: 1, // MB
        acceptedFiles: 'image/*',
        addRemoveLinks: false,
        maxFiles: 3,
        maxfilesexceeded: function(file) {
            alert('maximo 3 archivos');
        },
        dictDefaultMessage: "Arrastre las fotos aca para subirlas , guarde y seleccione una caratula ",
        dictFileTooBig: "Tamaño máx 1Mg.",
        dictInvalidFileType: "Solo tipo jpg, jpeg, png.",
        dictRemoveFile: "Remover",

        dictMaxFilesExceeded: "No puedes subir mas archivos.",
        
          
          init: function() {

             
       
            const galeria = document.querySelectorAll('.galeria');
           
           
            //console.log(galeria);
            if(galeria.length > 0) {
                galeria.forEach( imagen => {
                  const imagenPublicada = {};
                  imagenPublicada.size = 1;
                  //console.log(imagen.value )
                  //== storage/properties/qykGvy6tT7vWAIeT00B3ZmhX5I6XK6DCH9Z0ft7m.jpeg
                  imagenPublicada.name = imagen.value;
                  this.options.addedfile.call(this, imagenPublicada);
                  this.options.thumbnail.call(this, imagenPublicada, `/${imagenPublicada.name}`);
                  imagenPublicada.previewElement.classList.add('dz-success');
                  imagenPublicada.previewElement.classList.add('dz-complete');
                })
            }
          },
         
          removedfile: function(file) {
              // photo con url seleccionado
              const photo = document.querySelector("input[value='" + file.name + "']" );
              // console.log(photo.id);
              // var url =  "admin/photo-propiedad/" + photo.id;
              console.log(file);   
          }


        });
  
        myDropzone.on('error', function(file, res){
        //console.log(res.errors.photo[0]); desde el servidor 
        // $('.dz-remove').addClass('btn btn-danger')
        var msg = res.errors.photo[0];
        $('.dz-error-message:last > span').text(msg);
    })

    

    
     //acceptedFiles. ".jpg,.png,.jpeg",

     //dictCancelUpload: "Cancelar",



</script>   

<script>
	// ubicacion plaza de armas trujillo
	const lat = -8.111851918254834;
	const lng = -79.0287019135900;
	const tilesProvider = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';



	let myMap = L.map('myMap').setView([lat, lng], 6);
	L.tileLayer(tilesProvider, {
		maxZoon: 18
	}).addTo(myMap);

	let marker = L.marker([lat, lng], {
		draggable: true,
		autoPan: true
	}).addTo(myMap);

	// Geocode Service
	const geocodeService = L.esri.Geocoding.geocodeService();
	// coordenadas con doble click
	//myMap.doubleClickZoom.disable();
	myMap.on('dblclick', function(e){
		let LatLng = myMap.mouseEventToLatLng(e.originalEvent);
		console.log(LatLng);
	})

	// coordenadas con movimiento
	marker.on('moveend', function(e){
		marker = e.target;
		const position = marker.getLatLng();
		// centrar automatico
		myMap.panTo( new L.LatLng( position.lat, position.lng ) );

		// Reverse Geocoding cuando el usuario reubica el marker
		geocodeService.reverse().latlng(position, 6).run(function(error, resultado){
			console.log(error);
			console.log(resultado);
			marker.bindPopup(resultado.address.LongLabel);
			marker.openPopup();
		})
	})

</script>
@endpush
