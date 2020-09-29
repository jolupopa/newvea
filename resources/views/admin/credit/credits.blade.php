@extends('layouts.app')

@section('meta-title', 'VeaInmuebles')
@section('meta-description')
VeaInmuebles - creditos de usuario
@endsection

@section('content')
  <section id="my-property">
    <div class="container">

        <!--menu-user-->
        @include('admin.componente.menu_account')
         <h2 class="text-center">Ordenes de compra</h2>
        
        <!--listado-->
        <div class="row">
            <div class="col-12">
               
                <div class="card shadow-soft border p-4">

                  <div class="d-flex justify-content-end">
                 
                    
                    <a href="{{ route('add.index') }}" class="btn btn-success text-white">Comprar Anuncios
                    <img src="/images/carrito.png" alt="">
                    </a>
                  </div>
                  <table class="table table-responsive font-small">
                      
                      <thead class="thead-inverse">
                          <tr>
                              <th class="h6 py-4 border-0">ID</th>
                              <th class="h6 py-4 border-0 text-center">Fecha</th>
                              <th class="h6 py-4 border-0 text-center">Doc</th>
                              <th class="h6 py-4 border-0 text-center">N°</th>
                              <th class="h6 py-4 border-0">Total S/.</th>
                              <th class="h6 py-4 border-0 text-center">Status</th>  
                              <th class="h6 py-4 border-0 text-center">Acciones</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td class="option h6 font-weight-light">#12</td>
                              <td>05-12-2020</td>
                              <td>Boleta</td>
                              <td>001-0000001</td>
                              <td>180.00</td>
                              <td>Entregada</td>
                              <td>
                                <a href="#" data-toggle="modal" data-target="#modal-confirm-delete" class="text-danger mr-5"><i class="far fa-trash-alt ml-3" data-toggle="tooltip" title="" data-original-title="Delete space"></i>
                                </a>
                                <a href="" >Detalle</a>
                              </td>
                          </tr>
                          <tr>
                            <td class="option h6 font-weight-light">#13</td>
                              <td>15-10-2020</td>
                              <td>Factura</td>
                              <td>001-0000002</td>
                              <td>280.00</td>
                              <td>Pendiente</td>
                            <td> 
                              <a href="#" data-toggle="modal" data-target="#modal-confirm-delete" class="text-danger mr-5"><i class="far fa-trash-alt ml-3" data-toggle="tooltip" title="" data-original-title="Delete space"></i></a>
                              <a href="" >Detalle</a>
                            </td>
                        </tr>
                      </tbody>
                  </table>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previo</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
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


