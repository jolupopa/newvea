@extends('layouts.app')

@section('meta-title', 'VeaInmuebles')
@section('meta-description')
VeaInmuebles - creditos de usuario
@endsection

@section('content')
  <section id="my-property">
    <div class="container">

        <!--menu-user-->
        @include('admin.menu_user.menu')
         <h3 class="text-center">Lista Ordenes de Anuncios Generados </h3>
        
        <!--listado-->
        <div class="row">
            <div class="col-12">
               
                <div class="card shadow-soft border p-4">

                  <div class="d-flex justify-content-end">
                 
                    
                    <a href="{{ route('add.index') }}" class="btn btn-primary text-white">Comprar Anuncios
                    <img src="/images/carrito.png" alt="">
                    </a>
                  </div>
                  <table class="table table-responsive font-small">
                      
                      <thead class="thead-inverse">
                          <tr>
                              <th class="h6 py-4 border-0">N°Orden</th>
                              <th class="h6 py-4 border-0 text-center">Fecha</th>
                              <th class="h6 py-4 border-0 text-center">Doc</th>
                              <th class="h6 py-4 border-0 text-center">N°</th>
                              <th class="h6 py-4 border-0">Total S/.</th>
                              <th class="h6 py-4 border-0 text-center">Estado</th>  
                              <th class="h6 py-4 border-0 text-center">Acciones</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach( $orders as $order )
                          <tr>
                              <td class="option h6 font-weight-light">{{ $order->id }}</td>
                              <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y')}}</td>
                              <td>
                              {{ $order->tipo_doc == 'dni' ? 'Boleta' : 'Factura'}}
                              </td>
                              <td>Por asignar</td>
                              <td>{{ $order->total }}</td>
                              <td class="text-primary">{{ $order->status}}</td>
                              <td class="h3">
                               
                                <a href="{{ route('order.show', $order->id) }}"><i class="fas fa-file-pdf"></i></a> |
                                <a href=""><i class="fas fa-times text-danger"></i></a>
                              </td>
                          </tr>
                        @endforeach  
                      </tbody>
                  </table>
                </div>
               
                 <div class="d-flex justify-content-center mt-4">
                  {{ $orders->render() }}
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


