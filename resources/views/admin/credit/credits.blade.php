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
        
        <!--listado-->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-soft border p-4">

                  <div class="d-flex justify-content-between">
                    <span><span>Anuncios Simples : 2</span> <br> <span>Anuncios Destacados : 1</span></span>
                    <button class="btn btn-success">Comprar +</button>
                  </div>
                  <table class="table table-responsive font-small">
                      
                      <thead class="thead-inverse">
                          <tr>
                              <th class="h6 py-4 border-0">ID</th>
                              <th class="h6 py-4 border-0">Anuncio</th>
                              <th class="h6 py-4 border-0">Precio</th>
                              <th class="h6 py-4 border-0">Cantidad</th>
                              <th class="h6 py-4 border-0">IGV</th>
                              <th class="h6 py-4 border-0">Total</th>
                              <th class="h6 py-4 border-0">Doc</th>
                              <th class="h6 py-4 border-0">Num-doc</th>
                              <th class="h6 py-4 border-0">Fecha</th>
                              <th class="h6 py-4 border-0">Acción</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td class="option h6 font-weight-light">#12</td>
                              <td><a href="./edit-space.html">Simple</a></td>
                              <td>50.00</td>
                              <td>2</td>
                              <td>18.00</td>
                              <td>180.00</td>
                              <td>Factura</td>
                              <td>001-0000001</td>
                              <td>05-12-2020</td>
                              <td>
                                <a href="#" data-toggle="modal" data-target="#modal-confirm-delete" class="text-danger "><i class="far fa-trash-alt ml-3" data-toggle="tooltip" title="" data-original-title="Delete space"></i>
                                </a>
                              </td>
                          </tr>
                          <tr>
                            <td class="option h6 font-weight-light">#13</td>
                              <td><a href="./edit-space.html">Destacado</a></td>
                              <td>100.00</td>
                              <td>1</td>
                              <td>18.00</td>
                              <td>180.00</td>
                              <td>Factura</td>
                              <td>005-000234</td>
                              <td>15-10-2020</td>
                            <td> <a href="#" data-toggle="modal" data-target="#modal-confirm-delete" class="text-danger "><i class="far fa-trash-alt ml-3" data-toggle="tooltip" title="" data-original-title="Delete space"></i></a></td>
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


