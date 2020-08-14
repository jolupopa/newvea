@extends('layouts.app')

@section('meta-title', 'VeaInmuebles')
@section('meta-description')
VeaInmuebles - propiedades de usuario
@endsection

@section('content')
  <section id="my-property">
    <div class="container">

        <!--menu-user-->
        @include('admin.componente.menu_account')
        
        <!--listado-->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-soft border p-4">
                  <div class="d-flex justify-content-between"><span class="bg-warning pt-3 px-2">Credito: {{ $user->num_regulars}} regular y {{ $user->num_featured }} destacado  </span> <button class="btn btn-success">Crear Nueva +</button></div>
                    <table class="table table-responsive font-small">
                        
                        <thead class="thead-inverse">
                            <tr>
                                <th class="h6 py-4 border-0">ID</th>
                                <th class="h6 py-4 border-0">Imagen</th>
                                <th class="h6 py-4 border-0">Titulo</th>
                                <th class="h6 py-4 border-0">Precio $</th>
                                <th class="h6 py-4 border-0">Prov.- Distrito</th>
                                <th class="h6 py-4 border-0">Tipo prop.</th>
                                <th class="h6 py-4 border-0">Operación</th>
                                <th class="h6 py-4 border-0">Publicado</th>
                                <th class="h6 py-4 border-0">Fin Public.</th>
                                <th class="h6 py-4 border-0">Anuncio</th>
                                <th class="h6 py-4 border-0" style="width: 140px;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $properties as $property)
                            <tr>
                                <td class="option h6 font-weight-light">{{ $property->codigo }}</td>
                                <td>
                                  <img src="/img/properties/{{ $property->url_caratula}}" alt="" width="75px;" class="img-fluid">
                                </td>
                                <td><a href="#">{{ $property->title }}</a></td>

                                <td> {{ number_format($property->precio, 2 ) }}</td>
                                <td class="text-lowercase">{{ $property->distrito->provincia->name }} - {{ $property->distrito->name }}</td>
                                <td>{{ $property->type_property->name }}</td>
                                <td>{{ $property->operation }}</td>
                                <td>{{  $property->published_at }}</td>
                                <td>{{ $property->published_end }}</td>
                                <td>{{ ($property->destacada == 1) ? 'Destacado' : 'Regular'}}</td>
                                <td>
                                  <button class="btn btn-sm btn-primary px-1" href="#">Editar</button>
                                  <button class="btn btn-sm btn-primary px-1 ml-3" href="#">Publicar</button>
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
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush

@push('load-plugin')
@endpush
