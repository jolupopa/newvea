<section>
  <div class="row">
   
    <div class="col-12 col-md-6">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">Crear Empleado</h3>
        </div>
        <div class="card-body">
          <form method="POST" action="{{route('backend.administrators.store') }}">
            @csrf
            <!-- name -->
            <div class="form-group">
              <label for="name">Nombre</label>
              <input type="text" name="name" value="{{ old('name') }}" class="form-control  @error('name') is-invalid @enderror">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <!-- email -->
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" value="{{ old('email') }}" class="form-control  @error('email') is-invalid @enderror">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="row">
              <div class="form-group col-12 col-md-6">
                <label for="">Roles</label>
              @include('backend.administrators.sections.partials.roles_checkbox',['model' => $administrator])
              </div>

              <div class="form-group col-12 col-md-6">
                <label for="">Permisos</label>
              @include('backend.administrators.sections.partials.permissions_checkbox', ['model' => $administrator])
              </div>
              <span class="text-mutet">la contraseña será generada y enviada al nuevo usuario via email</span>
            </div>

          
            <button class="btn btn-primary btn-block">Crear Empleado</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>