<section>
  <div class="row">
   
    <div class="col-12 col-md-6">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">Crear Rol</h3>
        </div>
        <div class="card-body">
          <form method="POST" action="{{route('backend.roles.store') }}">
            @csrf

               <!-- Identificador -->
              <div class="form-group">
                  <label for="">Identificador</label>
                  @if($role->exists)
                  <input value="{{ $role->name }}" class="form-control " disabled >
                  @else
                  <input name="name" value="{{ old('name', $role->name) }}" class="form-control @error('name') is-invalid @enderror" >
                   @error('name')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                  @endif
              </div>
              <!-- name -->
              <div class="form-group">
                  <label for="display_name">Nombre</label>
                  <input type="text" name="display_name" value="{{ old('display_name', $role->display_name) }}" class="form-control  @error('display_name') is-invalid @enderror">
                  @error('display_name')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
              <!-- guard_name -->
              <div class="form-group">
                  <label for="">Guard</label>
                  <select  name="guard_name" class="form-control  @error('guard_name') is-invalid @enderror" id="guard">
                      <option selected value="">Seleccione un Guard</option>
                      @foreach( config('auth.guards') as $guardName => $guard) 
                      <option {{ old( 'guard_name') === $guardName ? 'selected' : '' }} 
                      value="{{ $guardName}}">{{ $guardName }}</option>
                      @endforeach
                  </select>
                  @error('guard_name')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                  
              </div>
              <!-- permisos -->
              <div class="row">
                  
                  <div class="form-group col-12 col-md-6">
                  <label for="">Permisos</label> <br/>

                    <div class="d-none" id="back">
                      <span>Para guard back</span>
                      @foreach($permisos as $permiso)
                      <div class="checkbox">
                        @if($permiso->guard_name === 'back')
                          <label for="">
                              <input type="checkbox" name='permisos[]' value="{{$permiso->name}}"
                              {{ $role->permissions->contains($permiso->id) 
                              ? 'checked' : '' }}>
                              {{ $permiso->name }}
                          </label>
                        @endif      
                      </div>
                      @endforeach
                    </div>

                    <div class="d-none" id="web">
                      <span>Para guard web</span>
                      @foreach($permisos as $permiso)
                      <div class="checkbox">
                        @if($permiso->guard_name === 'web')
                          <label for="">
                              <input type="checkbox" name='permisos[]' value="{{$permiso->name}}"
                              {{ $role->permissions->contains($permiso->id) 
                              ? 'checked' : '' }}>
                              {{ $permiso->name }}
                          </label>
                        @endif      
                      </div>
                      @endforeach
                    </div>
                </div>
                  
              </div>
              
            <button class="btn btn-primary btn-block">Crear Rol</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
