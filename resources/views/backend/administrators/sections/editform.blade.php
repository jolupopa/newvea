<section>
  <div class="row">
    {{-- perfil --}}
    <div class="col-12 col-md-6">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">Datos Personales</h3>
        </div>
        <div class="card-body">
        {{-- enctype="multipart/form-data" --}}
          <form method="POST" action="{{route('backend.administrators.update', $administrator)}}" >
            {{ method_field('PUT')}}
            @csrf
            <!-- name -->
            <div class="form-group">
              <label for="name">Nombre</label>
              <input type="text" name="name" value="{{ old('name', $administrator->name ) }}" class="form-control  @error('name') is-invalid @enderror">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <!-- email -->
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" value="{{ old('email', $administrator->email ) }}" class="form-control  @error('email') is-invalid @enderror">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

              <!-- new password -->
            <div class="form-group">
              <label for="password">Password : <small class="text-muted">Dejar en blanco  si no desea cambiar contraseña.</small></label>
              <input type="password" name="password"  class="form-control  @error('password') is-invalid @enderror" placeholder="Contraseña">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <!-- password.confirmation -->
            <div class="form-group">
              <label for="password-confirm">Confirmación Password </label>
              <input id="password-confirm" type="password" name="password_confirmation" class="form-control" placeholder="Repite Contraseña">
              
            </div>

            <button class="btn btn-primary btn-block">Guardar Datos Personales</button>
          </form>
        </div>
      </div>
    </div>

    {{-- roles y permisos --}}
    <div class="col-12 col-md-6">
      {{-- roles--}}
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">Roles</h3>
        </div>
        <div class="card-body">
        @role('Admin')
          <form method="POST" action="{{ route('backend.administrators.roles.update', $administrator) }}">
            {{ method_field('PUT') }}
            @csrf

           @include('backend.administrators.sections.partials.roles_checkbox',['model' => $administrator])

            <button class="btn btn-primary btn-block">Actualizar Roles</button>
          </form>
        @else
          <ul class="list-group">
            @forelse($administrator->roles as $role)
              <li class="list-group-item"> {{ $role->name }}</li>
            @empty
              <li class="list-group-item"> No tiene permisos</li>
            @endforelse
          </ul>
        @endrole  
        </div>
      </div>
      {{-- permisos--}}
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">Permisos</h3>
        </div>
        <div class="card-body">
        @role('Admin')
          <form method="POST" action="{{ route('backend.administrators.permissions.update', $administrator) }}">
            {{ method_field('PUT') }}
            @csrf

           @include('backend.administrators.sections.partials.permissions_checkbox',['model' => $administrator])

            <button class="btn btn-primary btn-block">Actualizar Permisos</button>
          </form>
        @else
          <ul class="list-group">
            @forelse($administrator->permissions as $permission)
              <li class="list-group-item"> {{ $permission->name }}</li>
            @empty
              <li class="list-group-item"> No tiene permisos</li>
            @endforelse
          </ul>
        @endrole  

        </div>
      </div>
       {{-- foto--}}
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">Foto Personal</h3>
        </div>
        <div class="card-body">
       
          <form method="POST" action="{{ route('backend.administrators.fotos.update', $administrator) }}" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            @csrf

            <div class="form-group text-center">
              <div class="kv-avatar">
                <div class="file-loading"> 
                  <input type="file" name="foto_up" id="foto"  data-initial-preview="{{isset($administrator->foto) ? Storage::url("avatars/$administrator->foto") : "http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=Foto+Empleado"}}" accept="image/*"/>
                </div>
              </div>
              <div class="kv-avatar-hint">
                  <small>Tamaño de foto < 1 Mg</small>
              </div>
                 
            </div>
            <button class="btn btn-primary btn-block">Actualizar Foto</button>
          </form>
       

        </div>
      </div>
      
    </div>
  </div>
</section>