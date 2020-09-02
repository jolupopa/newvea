<div class="col-12 col-md-4  d-flex align-items-center">
          <div class="bg-contenedor w-100 mt-5">
           
            <h2 class="ml-3 text-muted text-center mt-5 text-uppercase">En {{$property->operation}}</h2>
            
            <h4 class="text-muted ml-5">Precio:</h4>
              <p class="text-muted mx-5 extracto">{{ number_format($property->precio,2) }}
              </p>
            <div class=" mx-5 py-2 d-flex justify-content-between">
              <span class="d-block d-md-none d-lg-block">{{ $property->area}} <span class="font-weight-bold ">m2</span></span>
              <span class="d-block d-md-none d-lg-block">{{ $property->nun_cuartos }} <i class="fas fa-bed  "></i></span>
              <span class="d-block d-md-none d-lg-block">{{$property->bathroon}} <i class="fas fa-bath  "></i></span>
              <span class="d-block d-md-none d-lg-block">{{ $property->num_cars}} <i class="fas fa-car  "></i></span>
            </div>
            <div class="text-right mx-5 pt-3 pb-2"><i class="far fa-clock mr-2"></i>Hace: {{$property->published_at}}</div>
          </div>
        </div>