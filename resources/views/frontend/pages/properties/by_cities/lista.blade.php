<section id="listado" class="container  text-center">
@if($properties->count() > 0)
  <h2 class="text-muted mt-5">Inmuebles disponibles: </h2>
  <!-- botones para ordenar y layout  -->
  <div class="personal-select ml-5 mb-3" style="width: 250px;">
    <select>
      <option value="0">orden por defecto</option>
      <option value="1">Precio de menor a mayor</option>
      <option value="2">Precio de mayor a menor</option>
      <option value="3">Las mas recientes</option>
      <option value="4">Las mas antiguas</option>
    </select>
  </div>
@endif

  <!-- listado de propiedades -->
<div class="row" id="list-type" class="property-th">
  @forelse($properties as $property)
    <div class="card col-12 col-md-6 col-lg-4 my-2 grid" style="max-width: 100%;">
      <div class="row no-gutters ">
      
        <div class="col-12 bg-contenedor c-img">
          <a href="{{ route('properties.show', $property->id )}}">
            <div class="box-label">
              <span class="{{ $property->operation == 'venta' ? 'label-sale' : 'label-rent' }}">{{ $property->operation}}</span>
            </div>
            @foreach( $property->photos as $foto)
            <img src="/storage/properties/{{ $foto->url}}" class="img-fluid"  width="640px" alt="Foto de inmueble">
            @endforeach
           </a>

        </div>

        <div class="col-12 bg-contenedor c-body d-flex flex-column justify-content-around">
          <div class="card-body bg-contenedor">
            <a href="{{ route('properties.show', $property->id )}}">
              <h5 class="card-title">{{ $property->title }}</h5>
          </a>
            <p class="text-justify">{{$property->resumen}} 
            </p>
            <h6 class="d-flex">
            <span class="font-weight-bolder"> Cod= {{ $property->codigo }} </span>
            <span class="badge badge-dark ml-auto">{{ $property->type_property->name}}</span>
            </h6>
            <div class="text-left font-weight-bolder"><i class="fa fa-map-marker mr-2"></i> {{ $property->distrito->name }} - {{ $property->distrito->provincia->name }}</div>
          </div>

        

          <div class="border-top py-2 bg-contenedor d-flex justify-content-around align-items-end">
            <span class=""><span>S/.</span>{{number_format( $property->precio,2) }}</span>
            @isset(  $property->area )
            <span>{{ $property->area }} <span class="font-weight-bold">m2</span></span>
            @endisset

            @isset( $property->num_cuartos )
            <span>{{ $property->num_cuartos }}  <i class="fas fa-bed  "></i></span>
            @endisset

            @isset( $property->bathroon )
            <span>{{ $property->bathroon }} <i class="fas fa-bath "></i></span>
            @endisset

            @isset( $property->num_cars )
            <span>{{ $property->num_cars }}<i class="fas fa-car "></i></span>
            @endisset
          </div>
        </div>

        <div class="col-12">
          <div class="card-footer border-top d-flex flex-row justify-content-between">
            <div class="text-primary text">
              <a href="">
                <i class="fas fa-user-edit"></i> 
                <span class="text-muted">{{ $property->profile->user->name}}</span>
            </a>
            </div>

            <div class=""><i class="far fa-clock mr-2"></i>Publicado: {{ $property->published_at }} </div>
          </div>
        </div>
      </div>
    </div>
  @empty
  <div class="container mt-5">
    <div class="jumbotron text-left">
      <h1 class="display-4">Lo Sentimos!</h1>
      <p class="lead">En este momento no hay propiedades disponibles en esta categoria.</p>
      <hr class="my-4">
      <p class=" text-right" >
      <a class="btn btn-primary btn-lg mr-5" href="{{ route('home')}}" role="button">Regresar</a>
      </p>
    </div>  
  </div>
  @endforelse  
</div>

  <!-- paginador -->
  <div class="row my-5 ">
    {{ $properties->links()}}   
  </div>
</section>