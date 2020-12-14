<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

         <!--simple link--->
        <li class="nav-item">
            <a href="{{ route('backend.dashboard')}}" class="nav-link {{ request()->is('backend') ? 'active' : '' }}">
               
                <i class="nav.icon fas fa-house-user mr-3"></i>
                <p>
                Panel de Control
                </p>
            </a>
        </li>
                @can('view', new App\Post)    
            <li class="nav-item has-treeview {{ request()->is('backend/posts*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ request()->is('backend/posts*') ? 'active' : '' }}">
                    <i class="nav-icon far fa-newspaper mr-3"></i>
                    <p>
                    Front del Web
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @can('view', new App\Post)
                    <li class="nav-item">
                    <a href="{{ route('backend.posts.index')}}" class="nav-link {{ request()->is('backend/posts') ? 'active' : '' }}">
                        <i class="fas fa-list-ol nav-icon"></i>
                        <p>Destacados</p>
                    </a>
                    </li>
                    @endcan
                    @can('create', new App\Post)
                    <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="modal" data-target="#createPostModal">
                        <i class="fas fa-plus-circle nav-icon"></i>
                        <p>Crear Ciudades en Grid</p>
                    </a>
                    </li>
                    @endcan
                </ul>
            </li>
        @endcan

        
        <li class="nav-item">
            <a href="{{ route('backend.users.index')}}" class="nav-link {{ request()->is('backend/users') ? 'active' : '' }}">
                <i class="nav.icon fas fa-users mr-3"></i>
                <p>
                Usuarios
                </p>
            </a>
        </li>

        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        @can('view', new App\Post)    
            <li class="nav-item has-treeview {{ request()->is('backend/posts*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ request()->is('backend/posts*') ? 'active' : '' }}">
                    <i class="nav-icon far fa-newspaper mr-3"></i>
                    <p>
                    Artículos
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @can('view', new App\Post)
                    <li class="nav-item">
                    <a href="{{ route('backend.posts.index')}}" class="nav-link {{ request()->is('backend/posts') ? 'active' : '' }}">
                        <i class="fas fa-list-ol nav-icon"></i>
                        <p>Listar artículos</p>
                    </a>
                    </li>
                    @endcan
                    @can('create', new App\Post)
                    <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="modal" data-target="#createPostModal">
                        <i class="fas fa-plus-circle nav-icon"></i>
                        <p>Crear artículo</p>
                    </a>
                    </li>
                    @endcan
                </ul>
            </li>
        @endcan

        @can('view', new App\Administrator)
            <li class="nav-item has-treeview {{ request()->is('backend/administrators*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ request()->is('backend/administrators*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user-friends mr-3"></i>
                    <p>
                    Empleados
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @can('view', new App\Administrator)
                        <li class="nav-item">
                        <a href="{{ route('backend.administrators.index')}}" class="nav-link {{ request()->is('backend/administrators') ? 'active' : '' }}">
                            <i class="fas fa-list-ol nav-icon"></i>
                            <p>Listar Empleados</p>
                        </a>
                        </li>
                    @endcan
                    @can('create', new App\Administrator)
                        <li class="nav-item">
                        <a href="{{ route('backend.administrators.create') }}" class="nav-link">
                            <i class="fas fa-plus-circle nav-icon"></i>
                            <p>Crear empleado</p>
                        </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @else
            <li class="nav-item">
                <a href="{{ route('backend.administrators.show', auth()->user() )}}" class="nav-link {{ request()->is('backend/administrators/*') ? 'active' : '' }}">
                
                    <i class="nav.icon fas fa-user-lock mr-3"></i>
                    <p>
                    Perfil
                    </p>
                </a>
            </li>
        @endcan

          
        @can('view', new \Spatie\Permission\Models\Role)
            <li class="nav-item">
                <a href="{{ route('backend.roles.index')}}" class="nav-link {{ request()->is('backend/roles') ? 'active' : '' }}">
                
                    <i class="nav.icon fas fa-user-lock mr-3"></i>
                    <p>
                    Roles
                    </p>
                </a>
            </li>
        @endcan
        
        @can('view', new \Spatie\Permission\Models\Permission )
            <li class="nav-item">
                <a href="{{ route('backend.permissions.index')}}" class="nav-link {{ request()->is('backend/permissions') ? 'active' : '' }}">
                
                    <i class="nav.icon fas fa-key mr-3"></i>
                    <p>
                    Permisos
                    </p>
                </a>
            </li>
        @endcan

       
    </ul>
</nav>