@extends('layouts.adminlte.lte')


@section('nav-left-link', 'Crear Role')


@section('bredcrumbs')
<!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->

<li class="breadcrumb-item"><a href="#">Backend</a></li>
<li class="breadcrumb-item"><a href="#">Listar Roles</a></li>
<li class="breadcrumb-item active">Creando rol</li>

@endsection



@section('content')

  @include('backend.roles.sections.createform')  

@endsection

@push('styles')

@endpush

@push('scripts')


    
@endpush

@push('load-plugin')
<script>
  
  $(document).ready(function(){
    $("select#guard").change(function(){
        var selectedGuard = $(this).children("option:selected").val();
        
        if(selectedGuard === 'back')
        {      
          $('#back').removeClass('d-none');
          $('#back').addClass('d-block');
          $('#web').addClass('d-none');
          $('#web').removeClass('d-block');
        }else if(selectedGuard === 'web')
        {
           $('#web').removeClass('d-none');
           $('#web').addClass('d-block');
           $('#back').addClass('d-none');
           $('#back').removeClass('d-block');
        
        } else 
        {
            $('#web').removeClass('d-block');
            $('#back').removeClass('d-block');
           $('#back').addClass('d-none');
           $('#web').addClass('d-none');
        }
    });
  });
</script>


@endpush


