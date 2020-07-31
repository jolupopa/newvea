<section>
  <div class="row">
    {{-- caja perfil --}}
    <div class="col-12 col-md-6 col-lg-3">

      <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <div class="text-center">
            <img class="profile-user-img img-fluid img-circle" src="{{ ( $administrator->foto ) ? '/storage/avatars/' . $administrator->foto : '/img/users/avatars/default.png' }}" alt="User profile picture">
          </div>

          <h3 class="profile-username text-center">{{$administrator->name}}</h3>

          <p class="text-muted text-center">{{$administrator->getRoleNames()->implode(', ') }}</p>

          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>Email</b> <a class="float-right">{{$administrator->email}}</a>
            </li>
            <li class="list-group-item">
              <b>Publicaciones</b> <a class="float-right">{{$administrator->posts->count() }}</a>
            </li>
            @if($administrator->roles->count())
            <li class="list-group-item">
              <b>Roles</b> <a class="float-right">{{$administrator->getRoleNames()->implode(', ') }}</a>
            </li>
            @endif
          </ul>

          <a href="{{ route('backend.administrators.edit', $administrator)}}" class="btn btn-primary btn-block"><b>Editar</b></a>
        </div>
          <!-- /.card-body -->
      </div>
    </div>
    {{-- publicaciones --}}
    <div class="col-12 col-md-6 col-lg-3">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">Publicaciones</h3>
        </div>
        <div class="card-body">
          @forelse($administrator->posts as $post)
            <a href="{{ route('blog', $post)}}" target="_blank">
              <strong>{{ $post->title}}</strong>
            </a>
            <br />  
            <small class="text-muted">Publicación: {{ ( $post->published_at ) ? $post->published_at->format('d/m/Y') : 'Sin publicar' }} </small>
            <p class="text-muted">{{ $post->excerpt }}</p>
            @unless($loop->last)
              <hr>
            @endunless
          @empty
            <small class="text-muted">No tiene ninguna publicación.</small>
          @endforelse
          

          

          

          
        </div>
          <!-- /.card-body -->
      </div>
    </div>
    {{-- Los roles --}}
    <div class="col-12 col-md-6 col-lg-3">
      
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">Roles</h3>
        </div>
        <div class="card-body">
          @forelse($administrator->roles as $role)
              <strong>{{ $role->name}}</strong>
              @if( $role->permissions->count() )
              <br />  
              <small class="text-muted">Permisos: {{ $role->permissions->pluck('name')->implode(', ')  }} </small>
              @endif
            @unless($loop->last)
              <hr>
            @endunless
          @empty 
           <small class="text-muted">No tiene ningun rol asignado.</small>
          @endforelse
        </div>
          <!-- /.card-body -->
      </div>
    </div>

    {{-- Los permisos adicionales --}}
    <div class="col-12 col-md-6 col-lg-3">
      
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">Permisos adicionales</h3>
        </div>
        <div class="card-body">
          @forelse($administrator->permissions as $permission)
            
            <strong>{{ $permission->name}}</strong>
            @unless($loop->last)
              <hr>
            @endunless
          @empty
          <small class="text-muted">No tiene permisos adicionales.</small>
          @endforelse
          

          

          

          
        </div>
          <!-- /.card-body -->
      </div>
    </div>
  </div>
</section>