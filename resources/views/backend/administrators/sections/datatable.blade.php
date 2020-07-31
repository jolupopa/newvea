<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">

        <div class="card">
          @can('create', $administrators->first() )
            <div class="card-header text-right">
              <a href="{{ route('backend.administrators.create') }}" class="btn btn-success">Crear Empleado</a>
            </div>
          @endcan

          <div class="card-body">
            <table id="datatable-administrator" class="table table-bordered table-hover">
             
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>Correo</th>
                  <th>Roles</th>
                  <th>Permiso Personal</th>
                  <th>Acciones</th>
                </tr>
              </thead>

              <tbody>
                @foreach($administrators as $administrator)
                <tr>
                  <td>{{ $administrator->id}}</td>
                  <td>{{ $administrator->name}}</td>
                  <td>{{ $administrator->email}}</td>
                  <td>{{ $administrator->getRolenames()->implode(', ') }}</td>
                  <td>{{ $administrator->getPermissionNames()->implode(', ') }}</td>
                  <td>
                      @can('view', $administrator )
                        <a href="{{ route('backend.administrators.show', $administrator )}}"> <i class="fas fa-eye text-success mr-2"></i></a>
                      @endcan

                      @can('update', $administrator)
                        | <a href="{{ route('backend.administrators.edit', $administrator) }}"> <i class="fas fa-edit text-warning mx-2"></i></a>
                      @endcan
                      @can('delete', $administrator)
                        |
                        <form method="POST" action="{{ route('backend.administrators.destroy', $administrator) }}" style="display: inline;">
                          {{ method_field('DELETE')}}
                          @csrf
                          <button class="btn btn-sm btn-white ml-2 p-0"><i class="fas fa-trash-alt text-danger"></i></button>
                        </form>
                      @endcan
                     
                  </td>
                </tr>
                @endforeach
               
            
              </tbody>

              <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>Correo</th>
                  <th>Roles</th>
                  <th>Permiso Personal</th>
                  <th>Acciones</th>
                </tr>
              </tfoot>
            </table>
          </div>
          
        </div>
      
    </div>
      
  </div>
  
</section>
