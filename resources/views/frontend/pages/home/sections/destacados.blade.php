
<section id="destacados" class="container pb-5 mb-5">

  <div class="row mt-0 pt-0">
    <div class="col-12 text-center">
      <h2 class="h1 text-muted">DESTACADOS</h2> 
    </div>
    <!-- selector de tipo de inmueble  -->
    <div class="col-6 col-md-3 mb-3">
        <select class="custom-select" id="filter_selection">
            <option value="*">Todos los destacados<span class="float-right"></span> </option>
            @foreach($types as $type)
              @if($type->properties_count > 0)
              <option  value="{{'.' . $type->slug }}">
                <span class="mr-5">{{ $type->properties_count }} -</span> 
                <span>{{ $type->name}}</span> 
              </option>
              @endif
            @endforeach
        </select>
    </div>

    <div class=" offset-3 offset-md-6 col-2 d-flex justify-content-around text-primary">  
      <span class="owl-prev mr-5"><i class="fas fa-caret-left fa-3x"></i></span>
      <span class="owl-next mr-5"><i class="fas fa-caret-right fa-3x"></i></span>
    </div>
  </div>

  <div id="divmsg" class="alert alert-danger d-none" role="alert">
    Tipo de inmueble no esta dentro de los destacados!
  </div>

  <div id="owl_destacados" class="owl-carousel owl-theme">
    
        @foreach($properties as $property)
        <div class="item {{ $property->type_property->slug}}">
        <div class="card" style="width: 100%;">
          <div class="box-label">
            <span class="{{ $property->operation == 'venta' ? 'label-sale' : 'label-rent' }}">{{ $property->operation}}</span>
          </div>
          <a href="#" class="favorite"> <i class="far fa-heart text-white"></i> </a>
            <img src="img/properties/{{ $property->url_caratula }}" class="img-fluid"  width="640px" alt="Foto de inmueble">
          <div class="card-body bg-contenedor">
            <a href="{{ route('properties.show', $property->id )}}">
              <p class="text-muted h4">{{ $property->title }}</p>
            </a> 
            <h5 class="d-flex ">  
              <span class="text-muted"><i class="fa fa-map-marker"></i>  {{ $property->city->name }}</span>
              <span class="ml-auto badge badge-secondary">{{ $property->type_property->name}}</span>
            </h5>
            <div class="py-3 border-top d-flex justify-content-around align-items-end">
              <span class=""><i class="fas fa-dollar-sign mr-1"></i>{{ $property->precio }}</span>
              <span>{{ $property->area }} <span class="font-weight-bold">m2</span></span>
              <span>{{ $property->num_cuartos }} <i class="fas fa-bed  "></i></span>
              <span>{{ $property->bathroon }} <i class="fas fa-bath "></i></span>
              <span>{{ $property->num_cars}} <i class="fas fa-car "></i></span>
            </div>
            <div class="pt-3 border-top d-flex justify-content-between">
              <a href="#" class="card-link"><i class="fas fa-user-edit"></i>
                <span class="text-muted">{{ $property->profile->nickname }}</span></a>
              <span class=""><i class="far fa-clock mr-2"></i>{{ $property->published_at }}</span>
            </div>
          </div>
        </div>
        </div>
        @endforeach

      
  </div>
</section>