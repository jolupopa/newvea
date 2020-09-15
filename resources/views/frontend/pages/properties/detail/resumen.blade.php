<div class="col-12 col-md-4  d-flex align-items-center">
          <div class="bg-contenedor w-100 mt-5 d-none d-md-block">
           
            <h2 class="ml-3 text-muted text-center mt-5 text-uppercase">En {{$property->operation}}</h2>
            
            <h4 class="text-muted mt-4 ml-5">Precio: <span class="text-muted">S/. {{ number_format($property->precio,2) }}
              </span>
            </h4>
             <h4 class="text-muted mt-4 ml-5">Inmueble: <span class="text-muted">{{ $property->type_property->name }}
              </span>
            </h4>
              
            <div class=" mx-5 py-2 d-flex justify-content-between">
              <span class="d-block d-md-none d-lg-block">Area: {{ $property->area}} <span class="font-weight-bold ">m2</span></span>

              @isset( $property->nun_cuartos )
              <span class="d-block d-md-none d-lg-block">{{ $property->nun_cuartos }} cuarto(s)</span>
              @endisset

              @isset( $property->bathroon )
              <span class="d-block d-md-none d-lg-block">{{$property->bathroon}} baño(s)</span>
              @endisset

              @isset( $property->num_cars )
              <span class="d-block d-md-none d-lg-block">{{ $property->num_cars}} Garaje(s)</span>
              @endisset
            </div>
            <div class="text-right mx-5 my-2"><i class="far fa-clock mr-2"></i>Hace: {{$property->published_at}}</div>
          </div>
        </div>