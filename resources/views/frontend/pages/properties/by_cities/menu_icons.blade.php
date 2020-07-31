<section id="sidebar-icons">
    <div class="container">
      <!-- area grid -->
      <div id="sidebar-grid" class="contenedor-grid layout-switcher">
        <a href="javascript:void(0);">
          <div class="btn-grid layout-grid active"></div>
        </a>
      </div>
      <!-- area list -->
      <div id="sidebar-list" class="contenedor-list layout-switcher">
        <a href="javascript:void(0);"></a>
            <div class="btn-list layout-list"></div>
         </a>
      </div>
        <!-- area busqueda -->
        <div id="sidebar-buscar" class="contenedor-buscar">
          <div class="btn-buscar"></div>
          <div class="box-buscar">
              <div class="row border-bottom pb-1">
                <div class="col-10 ml-3 mt-3">
                  <h4 class="text-white">Buscar Inmuebles:</h4>
                </div>
                <div class="col-1 mt-2">
                  <span class="close-sidebar"></span>
                </div>
              </div>

               <!-- Main Search Container -->
              <!-- main-search-container > container-search -->
              <div class="container-search mt-5 pt-3">

                <div class="row">
                  <div class="col-12 mx-3">
                    <!-- main-search-form > form-search -->
                    @include('frontend.pages.includes.form_search')
                  </div>

                </div>

              </div>
              <!-- Main Search Container / End -->
           </div>
        </div>
        <!-- area comparar -->
        <div id="sidebar-comparar" class="contenedor-comparar">
          <div class="btn-comparar"></div>
          <div class="box-comparar">
            <div class="row border-bottom pb-1">
              <div class="col-10 ml-3 mt-3">
                <h4 class="text-white">Comparar Inmuebles:</h4>
              </div>
              <div class="col-1 mt-2">
                <span class="close-sidebar"></span>
              </div>
            </div>

            <!-- contenido -->
            <div class="row">
             
              <div class="col-12 property-th-list">
                
                <!-- Property -->
                <div class="card col-12 my-4 list active bg-sidebar" >
                  <div class="row no-gutters ">
                  
                    <div class="col-4 bg-contenedor c-img">
                      <a href="detail-property.html">
                        <div class="box-label">
                          <span class="label-sale">En Venta</span>
                        </div>
                        <img src="/img/properties/1.jpg" class="card-img " alt="...">
                    </a>
      
                    </div>
      
                    <div class="col-8 bg-contenedor c-body d-flex flex-column justify-content-around">
                      <div class="card-body bg-contenedor">
                        <h5 class="card-title">Titulo Condominio Californiaxx Condominio Californiaxx</h5>
                        <div class="d-flex justify-content-between">
                          <span class="h4"><i class="fas fa-dollar-sign"></i> 1,200.00</span>
                          <button class="btn btn-danger py-1">Eliminar</button>
                      </div>
                      </div>
                    </div>
      
                    <div class="col-12">
                      <div class="card-footer bg-contenedor border-top d-flex flex-row justify-content-between">
                        <div class="text-primary text">
                          <a href="">
                            <i class="fas fa-user-edit"></i> 
                            <span class="text-muted">Jose peres</span>
                        </a>
                        </div>
       
                        <div class=""><i class="far fa-clock mr-2"></i>Publicado hace: 4 dias</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card col-12 my-4 list active bg-sidebar" >
                  <div class="row no-gutters ">
                  
                    <div class="col-4 bg-contenedor c-img">
                      <a href="detail-property.html">
                        <div class="box-label">
                          <span class="label-sale">En Venta</span>
                        </div>
                        <img src="/img/properties/2.jpg" class="card-img " alt="...">
                    </a>
      
                    </div>
      
                    <div class="col-8 bg-contenedor c-body d-flex flex-column justify-content-around">
                      <div class="card-body bg-contenedor">
                        <h5 class="card-title">Titulo Condominio Californiaxx Condominio Californiaxx</h5>
                        <div class="d-flex justify-content-between">
                          <span class="h4"><i class="fas fa-dollar-sign"></i> 1,200.00</span>
                          <button class="btn btn-danger py-1">Eliminar</button>
                      </div>
                      </div>
                    </div>
      
                    <div class="col-12">
                      <div class="card-footer bg-contenedor border-top d-flex flex-row justify-content-between">
                        <div class="text-primary text">
                          <a href="">
                            <i class="fas fa-user-edit"></i> 
                            <span class="text-muted">Jose peres</span>
                        </a>
                        </div>
       
                        <div class=""><i class="far fa-clock mr-2"></i>Publicado hace: 4 dias</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card col-12 my-4 list active bg-sidebar" >
                  <div class="row no-gutters ">
                  
                    <div class="col-4 bg-contenedor c-img">
                      <a href="detail-property.html">
                        <div class="box-label">
                          <span class="label-sale">En Venta</span>
                        </div>
                        <img src="/img/properties/3.jpg" class="card-img " alt="...">
                    </a>
      
                    </div>
      
                    <div class="col-8 bg-contenedor c-body d-flex flex-column justify-content-around">
                      <div class="card-body bg-contenedor">
                        <h5 class="card-title">Titulo Condominio Californiaxx Condominio Californiaxx</h5>
                        <div class="d-flex justify-content-between">
                          <span class="h4"><i class="fas fa-dollar-sign"></i> 1,200.00</span>
                          <button class="btn btn-danger py-1">Eliminar</button>
                      </div>
                      </div>
                    </div>
      
                    <div class="col-12">
                      <div class="card-footer bg-contenedor border-top d-flex flex-row justify-content-between">
                        <div class="text-primary text">
                          <a href="">
                            <i class="fas fa-user-edit"></i> 
                            <span class="text-muted">Jose peres</span>
                        </a>
                        </div>
       
                        <div class=""><i class="far fa-clock mr-2"></i>Publicado hace: 4 dias</div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
        
              <div class="col-12 d-flex justify-content-around border-top pt-2">
                <a href="#" class="btn btn-danger reset px-4 close-comparar">Cerrar</a>
                <a href="#" class="btn btn-primary">Comparar</a>

              </div>
            </div>
            <!-- fin contenido -->
            
          </div>
        </div>


        
    </div>
</section>
