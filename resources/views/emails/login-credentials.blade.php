@component('mail::message')
# Tus credenciales de acceso a {{ config('app.name') }}

Utliliza estas credenciales para acceder al sistema:

@component('mail::table')
    |  Usuario  |  Contraseña  |
    |:-----------|:--------------|
    | {{ $administrator->email}} | {{ $password }} |
@endcomponent


@component('mail::button', ['url' => url('backend/login')])
Login
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
