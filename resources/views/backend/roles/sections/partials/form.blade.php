 <!-- Identificador -->
<div class="form-group">
    <label for="">Identificador</label>
    @if($role->exists)
    <input value="{{ $role->name }}" class="form-control" disabled >
    @else
    <input name="name" value="{{ old('name', $role->name) }}" class="form-control" >
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
        @foreach( config('auth.guards') as $guardName => $guard)
        <option selected >Selecciona el guard</option>
        <option {{  old('guard_name', $role->guard_name ) === $guardName ? 'selected' : '' }} 
        value="{{ $guardName}}">{{ $guardName }}</option>
        @endforeach
    </select>
    @error('guard_name')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    
</div>

<div class="row">
    
    <div class="form-group col-12 col-md-6">
    <label for="">Permisos</label>
    @include('backend.administrators.sections.partials.permissions_checkbox',['model' => $role ])
    </div>
    
</div>