<div class="row my-5">
  <div class="col-12 col-md-8 offset-md-2">
    <ul class="nav nav-pills">
      <li class="nav-item ">
        <a class="nav-link {{ request()->is('admin/cuenta*') ? 'active' : '' }} "  href="{{ route('cuenta') }}">Cuenta</a>
      </li>

      <li class="nav-item ">
        <a class="nav-link {{ request()->is('admin/datos*') ? 'active' : '' }} "  href="{{ route('datos') }}">Datos</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link {{ request()->is('admin/perfil*') ? 'active' : '' }} " href="{{ route('perfil') }}">Perfil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/propieda*') ? 'active' : '' }} " href="{{ route('admin.propiedad.index') }}">Propiedades</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/order*') ? 'active' : '' }} " href="{{ route('order.index') }}">Anuncios</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Premium</a>
        <div class="dropdown-menu ">
          <a class="dropdown-item" href="#">Contactos</a>
          <a class="dropdown-item" href="#">Tareas</a>
          <a class="dropdown-item" href="#">Gestion</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Tus Prospectos</a>
          <a class="dropdown-item" href="#">Tus Agentes</a>
        </div>
      </li>
      
    </ul>
  </div>
</div>
<div class="row d-block">
  <!---alertas--->
  @if( session()->has('flash'))
  <div class="alert alert-success">{{ session('flash') }}</div>
  @endif
</div>