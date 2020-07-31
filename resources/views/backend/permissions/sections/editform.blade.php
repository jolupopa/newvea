<section>
  <div class="row">
   
    <div class="col-12 col-md-6">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">Editar Rol</h3>
        </div>
        <div class="card-body">
          <form method="POST" action="{{route('backend.permissions.update', $permiso) }}">
          {{ method_field('PUT')}}
            @csrf
              
               <!-- Identificador -->
              <div class="form-group">
                  <label for="">Identificador</label>
                  <input value="{{ $permiso->name }}" class="form-control " disabled >
              </div>
              <!-- name -->
              <div class="form-group">
                  <label for="display_name">Nombre</label>
                  <input type="text" name="display_name" value="{{ old('display_name', $permiso->display_name) }}" class="form-control  @error('display_name') is-invalid @enderror">
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
                      <option {{ old( 'guard_name', $permiso->guard_name ) === $guardName ? 'selected' : '' }} 
                      value="{{ $guardName}}">{{ $guardName }}</option>
                      @endforeach
                  </select>
                  @error('guard_name')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                  
              </div>
    
            <button class="btn btn-primary btn-block">Guardar Permiso</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
