<div class="col-12 col-md-4  d-flex align-items-center">
          <div class="bg-contenedor">
            <div class="pt-5 d-flex justify-content-between">
              <span class="h4 ml-3">En {{$property->operation}}</span>
              <span class="h5 text-muted mr-3">Precio: $ {{ $property->precio}}.00</span>
            </div>
            <h4 class="text-muted ml-5">Resumen</h4>
              <p class="text-muted mx-5 extracto">{{ $property->resumen}}.
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