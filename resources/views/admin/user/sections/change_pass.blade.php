<form action="{{route('admin.user.password.update', $user)}}" method="POST" class="card shadow-soft border p-4">
    {{ method_field('PUT')}}
        @csrf

    <div class="row">
        
        <div class="col-12 col-lg-6">
            <div class="form-group">
                <label for="password">Password </label>
                <input type="password" class="form-control shadow-soft  @error('password') is-invalid @enderror" id="password" placeholder="Nueva clave" name="password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        
        <div class="col-12 col-lg-6">
            <div class="form-group">
                <label for="password_confirmation">Confirmar nuevo password</label>
                <input type="password" class="form-control shadow-soft @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Repetir contraseña" name="password_confirmation">
                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <h6 class="text-danger ml-3">Dejar en blanco  si no desea cambiar contraseña.</h6>
    </div>
    
    <div class="align-self-end">
        <button class="btn btn-danger mt-2" type="submit">Cambiar clave</button>
    </div>
    
</form>