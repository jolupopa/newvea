@extends('layouts.adminlte.lte')


@section('nav-left-link', 'Edición de artículo')


@section('bredcrumbs')
<!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->

<li class="breadcrumb-item"><a href="#">Backend</a></li>
<li class="breadcrumb-item"><a href="#">Listado de artículos</a></li>
<li class="breadcrumb-item active">Editando artículo</li>

@endsection



@section('content')

@include('backend.post.sections.showform')  

@endsection

@push('styles')

  <!-- dropzone -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/dropzone/min/dropzone.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.css') }}">
@endpush

@push('scripts')

<!-- dropzone -->
<script src="{{ asset('adminlte/plugins/dropzone/min/dropzone.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/moment/locales.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<!-- Summernote -->
<script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
  
@endpush

@push('load-plugin')
<script>
    $(function () {

        //Initialize Select2 Elements
        $('.select2').select2();

        //Timepicker
        $('#published_at').datetimepicker({
            format: 'L',
            locale: 'es'
        });

         // Summernote
        $('.editor').summernote();    
        //
        
        
    });

    var myDropzone = new Dropzone(".dropzone", {
        url: "/backend/posts/{{ $post->url }}/photos",
        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        paramName: "photo", // The name that will be used to transfer the file
        maxFilesize: 1, // MB
        acceptedFiles: 'image/*',
        addRemoveLinks: true,
        dictDefaultMessage: "Arrastra las fotos aca para subirlas",
        dictFileTooBig: "Tamaño máx 1Mg.",
        dictInvalidFileType: "Solo tipo jpg, jpeg, png.",
        dictRemoveFile: "Remover",
        dictCancelUpload: "Cancelar",
        dictMaxFilesExceeded: "No puedes subir mas archivos."
        });
  
    myDropzone.on('error', function(file, res){
        //console.log(res.errors.photo[0]); desde el servidor 
        // $('.dz-remove').addClass('btn btn-danger')
        var msg = res.errors.photo[0];
        $('.dz-error-message:last > span').text(msg);
    })

     Dropzone.autoDiscover = false;

</script>    

@endpush