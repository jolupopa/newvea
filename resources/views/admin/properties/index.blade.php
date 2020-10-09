@extends('layouts.app')

@section('meta-title', 'VeaInmuebles')
@section('meta-description')
VeaInmuebles - propiedades de usuario
@endsection

@section('content')
  <section id="my-property">
    <div class="container">

      <!--menu-user-->
      @include('admin.menu_user.menu')
        
      <!--listado-->
      <div class="row">
          <div class="col-12">
              <div class="card shadow-soft border p-4">
                <div class="d-flex justify-content-between"><span class="bg-warning pt-3 px-2">Credito: {{ $user->num_regulars}} regular y {{ $user->num_featured }} destacado  </span> <button  class="btn btn-success" data-toggle="modal" data-target="#createPropertyModal">Crear Nueva +</button></div>
                  <table class="table table-responsive font-small">
                      
                      <thead class="thead-inverse">
                          <tr>
                              <th class="h6 py-4 border-0">ID</th>
                              <th class="h6 py-4 border-0">Imagen</th>
                              <th class="h6 py-4 border-0 text-center">Titulo</th>
                              <th class="h6 py-4 border-0 text-center">S/.</th>
                              <th class="h6 py-4 border-0">Distrito</th>
                              <th class="h6 py-4 border-0">Inmueble</th>
                              <th class="h6 py-4 border-0">Operación</th>
                              <th class="h6 py-4 border-0">Publicado</th>
                              <th class="h6 py-4 border-0">Vence</th>
                              <th class="h6 py-4 border-0">Anuncio</th>
                              <th class="h6 py-4 border-0 text-center" style="width: 140px;">Acciones</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach( $properties as $property)
                          <tr>
                              <td class="option h6 font-weight-light">{{ $property->codigo }}</td>
                              <td>
                              @foreach( $property->photos as $photo)
                                <img src="/storage/properties/{{ $photo->url }}" alt="" width="75px;" class="img-fluid">
                              @endforeach  
                             
                              
                              </td>
                              <td><a href="#">{{ $property->title }}</a></td>

                              <td> {{ number_format($property->precio, 2 ) }}</td>
                              <td class="text-lowercase">

                             @isset($property->name_distrito)
                              {{ $property->name_distrito }}</td>
                              @endisset
                              

                              @isset($property->type_property->name)
                                <td>{{ $property->type_property->name }}</td>
                              @endisset
                              
                              <td>{{ $property->operation }}</td>

                              
                                <td>{{  $property->published_at <> null ? $property->published_at : ' #-#-#'}}</td>
                                <td>{{ $property->published_end <> null ? $property->published_end : ' #-#-#'}}</td>
                              
                              
                              <td>{{ ($property->destacada == 1) ? 'Destacado' : 'Regular'}}</td>
                              <td>
                                <a class="btn btn-sm btn-primary px-1 mb-4 mb-xl-0" href="{{ route('admin.propiedad.edit', $property->id )}}">Editar</a>
                                <br class="d-xl-none" />
                                <a class="btn btn-sm btn-primary px-1 ml-xl-3" href="#">Publicar</a>
                              </td>
                          </tr>
                          @endforeach
                        
                      </tbody>
                  </table>
              </div>
              <div class="d-flex justify-content-center mt-4">
                  {{ $properties->render() }}
              </div>
          </div>
      </div> 
     
    </div>
  </section>
  


@endsection


@section('modals')
  <!-- Modal Create Post -->
  <div class="modal fade" id="createPropertyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" id="formCreateProperty" action="{{ route('admin.propiedad.store')}}"> 
      @csrf
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Crear Propiedad</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!--titulo  required -->
            <div class="form-group">
              <label for="title">Titulo</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"  value="{{ old('title') }}" placeholder="Titulo"  >
              @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong class="text-white">{{ $message }}</strong>
                </span>
              @enderror
            </div>            
              <div class="row">
                <div class="form-group col-6">
                  
                  <select class="form-control form-control-lg @error('operation') is-invalid @enderror" name="operation">
                  <option value="">Tipo de operación</option>
                    <option value="venta">Venta</option>
                    <option value="alquiler">Alquiler</option>
                  </select>
                  @error('operation')
                  <span class="invalid-feedback" role="alert">
                      <strong class="text-white">{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group col-6">
                  
                  <select class="form-control form-control-lg @error('type_property_id') is-invalid @enderror" name="type_property_id">
                  <option value="">Clase de inmueble</option>
                  @foreach($type_properties as $type_property)
                    <option value="{{ $type_property->id }}">{{ $type_property->name }}</option>
                  @endforeach  
                  </select>
                  @error('type_property_id')
                  <span class="invalid-feedback" role="alert">
                      <strong class="text-white">{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
             
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button  type="submit" class="btn btn-primary">Crear</button>
          </div>

        </div>
      </div>
    </form> 
  </div>
@endsection

@push('styles')
@endpush

@push('scripts')

@endpush

@push('load-plugin')
@endpush
