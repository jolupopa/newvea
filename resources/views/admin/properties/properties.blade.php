@extends('layouts.app')

@section('meta-title', 'VeaInmuebles')
@section('meta-description')
VeaInmuebles - propiedades de usuario
@endsection

@section('content')
  <section id="my-property">
    <div class="container">

        <!--menu-user-->
        @include('admin.componente.menu_account')
        
        <!--listado-->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-soft border p-4">
                  <div class="align-self-end"><button class="btn btn-success">Crear Nueva +</button></div>
                    <table class="table table-responsive font-small">
                        
                        <thead class="thead-inverse">
                            <tr>
                                <th class="h6 py-4 border-0">ID</th>
                                <th class="h6 py-4 border-0">Imagen</th>
                                <th class="h6 py-4 border-0">Titulo</th>
                                <th class="h6 py-4 border-0">Precio</th>
                                <th class="h6 py-4 border-0">Ciudad</th>
                                <th class="h6 py-4 border-0">tipo Inmueble</th>
                                <th class="h6 py-4 border-0">Operación</th>
                                <th class="h6 py-4 border-0">FechaPublicado</th>
                                <th class="h6 py-4 border-0">Activo</th>
                                <th class="h6 py-4 border-0">Destacado</th>
                                <th class="h6 py-4 border-0">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="option h6 font-weight-light">#12</td>
                                <td>
                                  <img src="/img/properties/2.jpg" alt="" width="75px;" class="img-fluid">
                                </td>
                                <td><a href="./edit-space.html">L'atelier Vancouver Coworking Space</a></td>
                                <td>120,000</td>
                                <td>trujillo</td>
                                <td>Departamento</td>
                                <td>Venta</td>
                                <td>06-12-2020</td>
                                <td>1</td>
                                <td>0</td>
                                <td><a href="./edit-space.html" class="text-dark" data-toggle="tooltip" title="" data-original-title="Edit space"><i class="far fa-edit mr-2"></i></a> <a href="#" data-toggle="modal" data-target="#modal-confirm-delete" class="text-danger"><i class="far fa-trash-alt" data-toggle="tooltip" title="" data-original-title="Delete space"></i></a></td>
                            </tr>
                            <tr>
                              <td class="option h6 font-weight-light">#12</td>
                              <td>
                                <img src="/img/properties/2.jpg" alt="" width="75px;" class="img-fluid">
                              </td>
                              <td><a href="./edit-space.html">L'atelier Vancouver Coworking Space</a></td>
                              <td>120,000</td>
                              <td>trujillo</td>
                              <td>casa</td>
                              <td>Venta</td>
                              <td>03-10-2020</td>
                                <td>1</td>
                                <td>0</td>
                              <td><a href="./edit-space.html" class="text-dark" data-toggle="tooltip" title="" data-original-title="Edit space"><i class="far fa-edit mr-2"></i></a> <a href="#" data-toggle="modal" data-target="#modal-confirm-delete" class="text-danger"><i class="far fa-trash-alt" data-toggle="tooltip" title="" data-original-title="Delete space"></i></a></td>
                          </tr>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div> 
     
    </div>
  </section>
@endsection


@section('modals')
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush

@push('load-plugin')
@endpush
