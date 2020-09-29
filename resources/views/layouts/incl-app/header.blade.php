<section id="litle-bar" class="bg-white d-md-none">
    <div class="text-center">
      <a href="{{ route('home')}}">
        <h1 class="logo text-primary py-2">VeaInmuebles</h1>
      </a>
    </div>
</section>

<section id="big-bar" class="d-none d-md-block bg-white">
    <div class="container">
        <div class="row justify-content-md-between align-items-center">
            <div class="col-auto">
                <a href="{{ route('home')}}">
                <h1 class="logo text-primary py-2">VeaInmuebles</h1>
                </a>
            </div>
            <div class="col-auto ml-auto text-primary">
               
                <span class="logo h4 ml-2">Si deseas publicar unete a nuestra red</span>
               
            </div>
        </div>
    </div>
</section>

<!--nota ver clase shadow-sm del nav-->
<nav id="nav-main" class="navbar navbar-expand-md bg-secundary text-white shadow-sm">
    <div class="container">

        <button type="button" class="navbar-toogler d-md-none" data-toggle="collapse" data-target="#menu-main"
        aria-expanded="false" aria-label="menú principal">
        <span class="icon-menu"></span>
        </button>
        @guest
     
                <a href="{{ route('login') }}" class="btn btn-primary btn-login order-md-2 ml-auto mr-2 {{ request()->is('/login') ? 'active' : '' }}">Ingresar</a>

                <a href="{{ route('register') }}" class="btn btn-primary  btn-login order-md-3">Registrar</a>

        @else
        
      
         <!--boton usuario-->
        
        <a class="btn btn-primary order-md-2 ml-auto mr-2" href="{{ route('cuenta') }}">{{ Auth::user()->nickname }} <img class="img-fluid rounded-circle mr-2" src="{{ Auth::user()->avatar ? asset('storage/avatars/' . Auth::user()->avatar ) : '/img/users/avatars/default.png' }}" alt="avatar" height="20px" width="20px">
        </a>




        <!--boton salir-->
        <a class="btn btn-primary order-md-3" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Salir
        </a>
        


        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        
        @endguest

        <div class="collapse navbar-collapse" id="menu-main">
            <ul class="navbar-nav mt-4 mt-md-0">
                <li class="nav-item mb-1 mb-md-0 mr-md-1"><a href="{{route('home')}}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Inicio</a></li>
                <li class="nav-item mb-1 mb-md-0 mr-md-1"><a href="#" class="nav-link">Nosotros</a></li>
                <li class="nav-item mb-1 mb-md-0 mr-md-1"><a href="#" class="nav-link">Agentes</a></li>
                <li class="nav-item mb-1 mb-md-0 mr-md-1"><a href="#" class="nav-link">Servicios</a></li>
                <li class="nav-item mb-1 mb-md-0 mr-md-1"><a href="{{ route('blog')}}" class="nav-link {{ request()->is('blog') ? 'active' : '' }}">Blog</a></li>
                <li class="nav-item mb-1 mb-md-0 mr-md-0"><a href="#" class="nav-link">Contactar</a></li>
            </ul>
        </div>
    </div>
</nav>