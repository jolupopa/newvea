 <form method="POST" action="{{ route('admin.user.foto.update', $user) }}" class="card shadow-soft border mb-5 p-4" enctype="multipart/form-data">
    {{ method_field('PUT') }}
    @csrf

    <div class="form-group text-center">
        <div class="kv-avatar">
            <div class="file-loading"> 
                <input type="file" name="foto_up" id="foto"  data-initial-preview="{{isset($user->avatar) ? Storage::url("avatars/$user->avatar") : "/img/users/avatars/default.png"}}" accept="image/*"/>
            </div>
        </div>
        <div class="kv-avatar-hint">
            <small>Tamaño de foto < 1 Mg</small>
        </div>
            
    </div>
    <div class="align-self-end">
        <button class="btn btn-danger">Actualizar Foto de perfil</button>
    </div>
</form>