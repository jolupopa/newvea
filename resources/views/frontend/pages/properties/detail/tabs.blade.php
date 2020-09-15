<div class="col-12 col-lg-8">
        
  <div class="card text-center my-5" style="width: 100%;">
    <div class="card-header">
      <ul class="nav nav-tabs d-flex justify-content-around" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="caracter-tab" data-toggle="tab" href="#caracter" role="tab" aria-controls="caracter" aria-selected="false"><i class="far fa-address-card mr-2"></i>Información</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" id="plano-tab" data-toggle="tab" href="#plano" role="tab" aria-controls="plano" aria-selected="false"><i class="fas fa-pencil-ruler mr-2"></i>Planos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="video-tab" data-toggle="tab" href="#video" role="tab" aria-controls="video" aria-selected="false"><i class="far fa-play-circle mr-2"></i>Video</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="location-tab" data-toggle="tab" href="#location" role="tab" aria-controls="location" aria-selected="false"><i class="fas fa-map-marker-alt mr-2"></i>Ubicación</a>
        </li>
      </ul>
    </div>
    <div class="card-body">
      <div class="tab-content" id="myTabContent">
        
        <div class="tab-pane fade show active overflow-auto" style="height:460px;" id="caracter" role="tabpanel" aria-labelledby="caracter-tab">
          <!-- Description -->
          <div>
            <h4 class="text-left text-muted">Descripción</h4>
            <p class="text-left text-muted">
              {{ $property->detalle }}.
            </p>
          </div>
       
          <div> 
            <!-- Details --> 
            <h4 class="text-left text-muted mt-4">Detalles</h4>
            <div class="row">
              <div class="col-12 col-md-6">
                  <h6 class="text-left">
                    <span class="text-dark-50">- Clase de inmueble :</span>
                    <span class="text-muted ml-2 text-uppercase">{{ $property->type_property->name }}</span>
                  </h6>
                   @if( $property->year_build )
                  <h6 class="text-left">
                    <span class="text-dark-50">- Año de construcción: </span>
                    <span class="text-muted ml-2">{{ $property->year_build }}</span>
                  </h6>
                  @endif 
                  <h6 class="text-left">
                    <span class="text-dark-50">- Tipo de operación :</span>
                    <span class="text-muted ml-2 text-uppercase">{{ $property->operation }}</span>
                  </h6>
                  <h6 class="text-left">
                    <span class="text-dark-50">- Precio S/ :</span>
                    <span class="h5 text-muted ml-2">{{  number_format($property->precio,2)  }}</span>
                  </h6>
                  <h6 class="text-left">
                    <span class="text-dark-50">- Departamento:</span>  
                    <span class="text-muted ml-2">{{ $property->distrito->provincia->departamento->name }}</span>
                  </h6>
                  <h6 class="text-left">
                    <span class="text-dark-50">- Provincia:</span>  
                    <span class="text-muted ml-2 ">{{ $property->distrito->provincia->name }}</span>
                  </h6>
                  <h6 class="text-left">
                    <span class="text-dark-50">- Distrito:</span>  
                    <span class="text-muted ml-2 ">{{ $property->distrito->name }}</span>
                  </h6>                                    
              </div>
              <div class="col-12 col-md-6">
                  
                                              
                  <h6 class="text-left">
                    <span class="text-dark-50">- Area total :</span>
                    <span class="text-muted ml-2 text-uppercase">{{ $property->area }} m2</span>
                  </h6>
                  @if($property->area_construida )
                    <h6 class="text-left">
                    <span class="text-dark-50">- Area construida :</span>
                    <span class="text-muted ml-2 text-uppercase">{{ $property->area_construida }} m2</span>
                  </h6>
                  @endif
                  @if($property->num_pisos )
                    <h6 class="text-left">
                    <span class="text-dark-50">- Pisos o niveles :</span>
                    <span class="text-muted ml-2 ">{{ $property->num_pisos }}</span>
                  </h6>
                  @endif
                  @if($property->num_pisos )
                    <h6 class="text-left">
                    <span class="text-dark-50">- Cuartos :</span>
                    <span class="text-muted ml-2 ">{{ $property->num_cuartos }}</span>
                  </h6>
                  @endif
                  @if($property->bathroon )
                    <h6 class="text-left">
                    <span class="text-dark-50">- Baños :</span>
                    <span class="text-muted ml-2 ">{{ $property->bathroon }}</span>
                  </h6>
                  @endif
                  @if($property->midle_bathroon )
                    <h6 class="text-left">
                    <span class="text-dark-50">- Medio baño :</span>
                    <span class="text-muted ml-2 ">{{ $property->midle_bathroon }}</span>
                  </h6>
                  @endif
                    @if($property->num_cars )
                    <h6 class="text-left">
                    <span class="text-dark-50">- Cochera para :</span>
                    <span class="text-muted ml-2 ">{{ $property->num_cars }}</span>
                  </h6>
                  @endif
              </div>
            </div>
            
            <!-- Caracteristicas -->
            <h4 class="text-left text-muted mt-4">Caracteristicas</h4>
            <div class="row">
            
              @foreach($property->features as $feature)
                <div class="col-12 col-md-6">
                    <h6 class="text-left text-muted"><i class="fas fa-check mx-2 "></i>{{ $feature->name}}</h6>  
                </div>
              @endforeach
              
              
            </div>

            <!-- Opciones destacadas -->
             <h4 class="text-left text-muted mt-4">Opciones destacadas</h4>
             <div class="col-12 col-md-6">
               @if( $property->en_estreno )
                  <h6 class="text-left">
                    <span class="text-dark-50"><i class="fas fa-caret-right mr-2"></i>Lista para estrenar. </span>
                  </h6>
                  @endif
                  @if( $property->en_amoblado )
                  <h6 class="text-left">
                    <span class="text-dark-50"><i class="fas fa-caret-right mr-2"></i>Inmueble amoblado. </span>
                  </h6>
                  @endif
                  @if( $property->en_parque )
                  <h6 class="text-left">
                    <span class="text-dark-50"><i class="fas fa-caret-right mr-2"></i>Ubicado frente a un parque. </span>
                  </h6>
                  @endif
                  @if( $property->en_esquina )
                  <h6 class="text-left">
                    <span class="text-dark-50"><i class="fas fa-caret-right mr-2"></i>Ubicado en esquina. </span>
                  </h6>
                  @endif
                  @if( $property->en_avenida )
                  <h6 class="text-left">
                    <span class="text-dark-50"><i class="fas fa-caret-right mr-2"></i>Ubicado en avenida principal. </span>
                  </h6>
                  @endif
                  @if( $property->en_condominio )
                  <h6 class="text-left">
                    <span class="text-dark-50"><i class="fas fa-caret-right mr-2"></i>Inmueble dentro de condominio. </span>
                  </h6>
                  @endif
                    @if( $property->en_provivienda )
                  <h6 class="text-left">
                    <span class="text-dark-50"><i class="fas fa-caret-right mr-2"></i>Ofrecido en programa pro vivienda. </span>
                  </h6>
                  @endif
             </div>

          </div>  
        </div>
          <div class="tab-pane fade" style="height:460px;" id="plano" role="tabpanel" aria-labelledby="plano-tab">
          
          <div class="accordion" id="accordionPlanos">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Plano de distribución
                  </button>
                </h2>
              </div>
          
              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionPlanos">
                <div class="card-body">
                  <div class="text-truncate">
                    <a href="https://i.imgur.com/kChy7IU.jpg">
                      <img src="https://i.imgur.com/kChy7IU.jpg" class="img-fluid" alt="" width="500" height="300">
                    </a>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Plano frontal
                  </button>
                </h2>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionPlanos">
                <div class="card-body">

                  <div class="text-truncate">
                    <a  href="https://i.imgur.com/l2VNlwu.jpg">
                      <img src="https://i.imgur.com/l2VNlwu.jpg"  class="img-fluid" alt="" width="500" height="300">
                    </a>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
  
        </div>

        <div class="tab-pane fade" style="height:460px;" id="video" role="tabpanel" aria-labelledby="video-tab">

          <h4 class="text-center text-muted ">Video Promocional.</h4>

            <div class="contenedor-video d-inline-block position-relative text-truncate">
              
              <img src="/images/fondo-video.jpg" class="img-fluid mt-5" alt="Imagen del anuncio">

              <a href="https://youtu.be/8eCFOTSVp_Y" class="venobox-video" data-vbtype="video"
                  title="Video promocional del inmueble."><i class="fas fa-play"></i></a>
            </div>
            
            
        </div>

        <div class="tab-pane fade  text-center" style="height:460px;overflow-x: hidden;" id="location" role="tabpanel" aria-labelledby="location-tab">
          <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d1974.8258571091785!2d-79.03088092868715!3d-8.136894032676343!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1samancaez+mz+d+lt6+la+encalada+victor+larco!5e0!3m2!1ses!2spe!4v1531636739413" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>

</div>