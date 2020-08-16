@extends('layouts.app')

@section('meta-title', 'VeaInmuebles')
@section('meta-description')
VeaInmuebles - perfil de usuario.
@endsection

@section('content')
 <section id="profile">
    <div class="container">

      <!--menu-user-->
      @include('admin.componente.menu_account')

      <!--seccion agente-->
      <div class="row">
        
        <div class="col-12 col-md-6  col-lg-4 ">
          <aside class="t shadow-soft">
            <!--profile-->
            <div class="row">
              <div class="col-4">
                <a href="">
                    <img src="{{asset('storage/avatars/' . $user->avatar) }}" class="img-fluid rounded-circle mt-5">
                </a>
              </div>

              <div class="col-8 d-flex align-items-center">
                <div>
                  <h3 class="text-muted pt-5">{{ $user->name}}</h3>
                  <h5 class="text-muted">{{ $user->profile->title }}</h5> 
                </div>
                  
              </div>

              <div class="col-12 py-5 d-flex justify-content-around">
                <a target="_blank" href="">
                  <i class="fab fa-twitter fa-2x"></i>
                </a>
                <a target="_blank" href="">
                  <i class="fab fa-facebook fa-2x"></i>
                </a>
                <a target="_blank" href="">
                  <i class="fab fa-linkedin fa-2x"></i>
                </a> 
                <a taraget="_blank" href="">
                  <i class="fab fa-instagram-square fa-2x"></i>
                </a>       
              </div>

                <div class="col-12 text-muted">
                  <h5><span class="mx-3"><i class="far fa-envelope mr-2"></i></span>{{ $user->email }}</h5>

                  @isset( $user->profile->email2 )
                    <h5><span class="mx-3"><i class="far fa-envelope mr-2"></i></span>
                    {{ $user->profile->email2 }}
                    </h5>
                  @endisset

                  @isset($user->profile->phone)
                    <h5><span class="mx-3"><i class="fas fa-mobile-alt mr-2"></i></span>{{ $user->profile->phone}}
                    </h5>
                  @endisset

                  @isset($user->profile->movil)
                    <h5><span class="mx-3"><i class="fas fa-mobile-alt mr-2"></i></span>{{ $user->profile->movil}}
                    </h5>
                  @else
                    <h5><span class="mx-3"><i class="fas fa-mobile-alt mr-2"></i></span>Celular sin definir
                    </h5>
                  @endisset

                  @isset($user->profile->address )
                    <h5> <span class="mx-3"><i class="fas fa-map-marker-alt mr-2"></i></span>{{ $user->profile->address}}
                    </h5>
                  @else
                    <h5> <span class="mx-3"><i class="fas fa-map-marker-alt mr-2"></i></span>Dirección sin definir
                    </h5>
                  @endisset

                  @isset( $distrito->name )
                    <h5>
                      <span class="mx-3"><i class="fas fa-map-marker-alt mr-4"></i>Distrito:</span>
                      <span class="text-lowercase">{{ $distrito->name }}</span>
                    </h5>
                  @else
                    <h5>
                      <span class="mx-3"><i class="fas fa-map-marker-alt mr-4"></i>Distrito:</span>
                      <span>Sin definir</span>
                    </h5>
                  @endisset

                  @isset( $distrito->provincia->name )
                    <h5>
                      <span class="mx-3"><i class="fas fa-map-marker-alt mr-4"></i>Provincia:</span>
                      <span class="text-lowercase">{{$distrito->provincia->name}}</span>
                    </h5>
                  @else
                    <h5>
                      <span class="mx-3"><i class="fas fa-map-marker-alt mr-4"></i>Provincia:</span>
                      <span>Sin definir</span>
                    </h5>
                  @endisset

                  @isset( $distrito->provincia->departamento->name )
                    <h5>
                      <span class="mx-3"><i class="fas fa-map-marker-alt mr-4"></i>Departamento:</span>
                      <span class="text-lowercase">{{ $distrito->provincia->departamento->name }}</span>
                    </h5>
                  @else
                    <h5>
                      <span class="mx-3"><i class="fas fa-map-marker-alt mr-4"></i>Departamento:</span>
                      <span>Sin definir</span>
                    </h5>
                  @endisset
                  <h4 class="text-mutet ml-5 mt-3">Acerca de mi:</h4> 
                  @isset($user->profile->about_me ) 
                    <p class="pb-4 ml-5">{{ $user->profile->about_me }}</p>
                  @else
                    <h5 class="ml-5"> <span>Sin definir</span> </h5>
                  @endisset

                </div>
                
            </div>
            <!--fin formulario-->
          </aside>
        </div>
        
        <div class="col-12 col-md-6 col-lg-8  text-muted">
          <!--inicio-->
          <h2 class="text-muted text-center my-5">Listado de propiedades</h2>
          <!-- listado de propiedades -->
          <div class="row" id="list-type" class="property-th-list">

            <div class="card shadow-soft col-12 my-2 list active" >
              <div class="row no-gutters ">
              
                <div class="col-4  c-img">
                  <a href="#">
                    <div class="box-label">
                      <span class="label-sale">En Venta</span>
                    </div>
                    <img src="/img/properties/1.jpg" class="card-img " alt="...">
                </a>

                </div>

                <div class="col-8  c-body d-flex flex-column justify-content-around">
                  <div class="card-body ">
                    <h5 class="card-title">Titulo Condominio Californiaxx Condominio Californiaxx</h5>
                    <p class="card-text d-none d-lg-block">Lorem ipsum dolor sit amet consectetur adipisicing elit.   |  Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                  </div>
                  <div class="location text-center mb-2">
                    <span>El Porvenir  </span>  <span>Trujillo  </span> <span>La Libertad</span>
                  </div>

                

                  <div class="border-top py-2  d-flex justify-content-around align-items-end">
                    <span class=""><i class="fas fa-dollar-sign"></i> 1200</span>
                    <span>120 <span class="font-weight-bold">m2</span></span>
                    <span>2 <i class="fas fa-bed  "></i></span>
                    <span>2 <i class="fas fa-bath "></i></span>
                    <span>2 <i class="fas fa-car "></i></span>
                  </div>
                </div>

                <div class="col-12">
                  <div class="card-footer bg-white border-top d-flex flex-row justify-content-between">
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

            <div class="card shadow-soft col-12 my-2 list active" >
              <div class="row no-gutters ">
              
                <div class="col-4  c-img">
                  <a href="#">
                    <div class="box-label">
                      <span class="label-sale">En Venta</span>
                    </div>
                    <img src="/img/properties/2.jpg" class="card-img " alt="...">
                </a>

                </div>

                <div class="col-8  c-body d-flex flex-column justify-content-around">
                  <div class="card-body ">
                    <h5 class="card-title">Titulo Condominio Californiaxx Condominio Californiaxx</h5>
                    <p class="card-text d-none d-lg-block">Lorem ipsum dolor sit amet consectetur adipisicing elit.   |  Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                  </div>
                  <div class="location text-center mb-2">
                    <span>El Porvenir  </span>  <span>Trujillo  </span> <span>La Libertad</span>
                  </div>

                

                  <div class="border-top py-2  d-flex justify-content-around align-items-end">
                    <span class=""><i class="fas fa-dollar-sign"></i> 1200</span>
                    <span>120 <span class="font-weight-bold">m2</span></span>
                    <span>2 <i class="fas fa-bed  "></i></span>
                    <span>2 <i class="fas fa-bath "></i></span>
                    <span>2 <i class="fas fa-car "></i></span>
                  </div>
                </div>

                <div class="col-12">
                  <div class="card-footer bg-white border-top d-flex flex-row justify-content-between">
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
          
    
          <!-- paginador -->
          <div class="row d-flex justify-content-center">
            <nav>
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
                </ul>
            </nav>
          </div>
              
              <!--fin--> 
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