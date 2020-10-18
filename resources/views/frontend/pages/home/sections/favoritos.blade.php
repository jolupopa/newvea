<section id="favoritos" class=" my-5">
    <div class="container-sm my-5">
      <div class="d-flex justify-content-star mt-3 align-items-center">
        <h4 class="mx-2"><i class="fas fa-th"></i> Sitios Favoritos</h4>
        <a data-toggle="collapse" href="#showFavorite" role="button" aria-expanded="false" aria-controls="showFavorite">
          <span class="icon-left"></span>
        </a>
      </div>
      <div class="collapse  bg-contenedor" id="showFavorite">
        
          <!-- contenido -->
           
          <div class="container bg-dark">
            
            <div class="row">
              @forelse( $usuario->meGusta as $property)
                <div class="col-6 col-md-2">
                    <div class=" bg-dark my-4">
                      <a class="" href="#">
                        <div class="text-center">
                          @forelse( $property->photos as $foto)
                            @if( $foto->featured == 1)
                              <img src="/storage/properties/{{ $foto->url}}" class="img-fluid"  width="100px" alt="Foto de inmueble">
                            @endif
                            @empty
                            <img src="/images/property_default.jpg" class="img-fluid"  width="400px" alt="Foto de inmueble">
                          @endforelse 
                        </div>
                            
                       
                        <div class="text-center bg-dark text-white">
                            <h6 class="mt-2" >{{ $property->title }} </h6>
                            <h5 class=""> En {{ $property->operation }}</h5>
                            <h5 class="">S/. {{ $property->precio}}</h5>
                           
                        </div>
                      </a>
                          <div class="d-flex justify-content-around"> 
                          <form method="POST" action="{{ route('likes.destroy', $property->id )}}">
                          @csrf  
                          {{ method_field('DELETE') }}  
                            <button type="submit" class="btn btn-danger   p-1 py-0">Eliminar</button> 
                          <form>  
                            <a href="{{ route('properties.show', $property->id )}}" class="btn btn-primary p-1 ">Detalle</a> 
                          </div>   
                    </div>
                </div>
               @empty
               <div class="col-12 text-center">
                <h1 class="text-white">Sin archivos en lista Favoritos</h1>
               </div>

              @endforelse    
            </div>
          </div>
         

          <!-- fin contenido -->

      </div>
    </div>
  </section>