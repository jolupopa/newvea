@extends('layouts.adminlte.lte')


@section('nav-left-link', 'Usuarios')


@section('bredcrumbs')
<!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->

<li class="breadcrumb-item"><a href="#">Backend</a></li>
 <li class="breadcrumb-item active">Pagina Inicio</li>

@endsection



@section('content')

   @include('backend.users.sections.datatable')  

@endsection

@push('styles')
 <!-- DataTables -->
 <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
 <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

@endpush

@push('scripts')
<!-- DataTables -->
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
@endpush

@push('load-plugin')
<script>
  $(function () {
    var table = $('#datatable-users').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('backend.users.index') }}",
     // lengthMenu: [ 5, 10, 20, 50, 75, 100 ],
      responsive: true,
      language: {
        url: "{{ asset('json/datatables/spanish.json')}}"
      },
      columns:[
        {data:"id", name:"id"},
        {data: "name", name: "name"},
        {data: "email", name: "email"},
        {data: "active", name: "active"},
        {data: "in_home", name: "in_home"},
        {data: "num_regular", name: "num_regulars"},
        {data: "num_featured", name: "num_featured"},
        {data: "max_properties", name: "max_properties"},
        {data: "action", name: "action", orderable: false, searchable: false}
      ]
    });
  });
</script>
    
@endpush