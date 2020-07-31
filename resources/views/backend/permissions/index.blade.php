@extends('layouts.adminlte.lte')


@section('nav-left-link', 'Permisos')


@section('bredcrumbs')
<!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->

<li class="breadcrumb-item"><a href="#">Backend</a></li>
 <li class="breadcrumb-item active">Listado de permisos</li>

@endsection



@section('content')

  @include('backend.permissions.sections.datatable')

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
<!-- page script -->
<script>
  $(function () {
    $('#datatable-permission').DataTable({
      "paging": true,
      "lengthChange": true,
      "lengthMenu": [ 5, 10, 20, 50, 75, 100 ],
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      language: {
        url: '{{ asset('json/datatables/spanish.json')}}'
      },
    });
  });
</script>
    
@endpush