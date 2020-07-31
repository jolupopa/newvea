 @foreach($permisos as $id => $name)
    <div class="checkbox">
    <label for="">
        <input type="checkbox" name='permisos[]' value="{{$name}}"
        {{ $model->permissions->contains($id) 
        ? 'checked' : '' }}>
        {{ $name }}
    </label>
    </div>
@endforeach

 