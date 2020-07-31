 @foreach($roles as $role)
    <div class="checkbox">
    <label for="">
        <input type="checkbox" name='roles[]' class="@error('roles') is-invalid @enderror" value="{{$role->name}}" {{ $model->roles->contains($role->id) ? 'checked' : '' }}>
       
        {{ $role->name }} <br>
        
        <small class="text-mutet">{{ $role->permissions->pluck('name')->implode(', ') }}</small>
         @error('roles')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </label>
     <span class="invalid-feedback text-danger" role="alert">
        <strong>'mensaje'</strong>
        </span>    
    </div>
@endforeach

   