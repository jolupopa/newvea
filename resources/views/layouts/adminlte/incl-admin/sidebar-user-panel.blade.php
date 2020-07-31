<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <img src="{{ (auth()->user()->foto) ? asset('storage/avatars/'. auth()->user()->foto ) : '/img/users/avatars/default.png' }}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
        <a href="#" class="d-block">{{ auth()->user()->name}} - {{ auth()->user()->roles->first()->name }}</a>
    </div>
</div>


