<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">

        <div class="card">
          @can('create', $roles->first() )
            <div class="card-header text-right">
              <a href="{{ route('backend.roles.create') }}" class="btn btn-success">Crear Rol</a>
            </div>
          @endcan

          <div class="card-body">
            <table id="datatable-role" class="table table-bordered table-hover">
             
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Identificador</th>
                  <th>Nombre</th>
                  <th>Guard</th>
                  <th>Acciones</th>
                </tr>
              </thead>

              <tbody>
                @foreach($roles as $role)
                <tr>
                  <td>{{ $role->id}}</td>
                  <td>{{ $role->name}}</td>
                  <td>{{ $role->display_name}}</td>
                  <td>{{ $role->guard_name }}</td>
                  <td>
                       
                     @can('update', $role)  
                      <a href="{{ route('backend.roles.edit', $role) }}"> <i class="fas fa-edit text-warning mx-2"></i></a>
                     @endcan
                     @can('delete', $role)
                     |
                      @if($role->id !== 1)
                      <form method="POST" action="{{ route('backend.roles.destroy', $role) }}" style="display: inline;">
                        {{ method_field('DELETE')}}
                        @csrf
                        <button class="btn btn-sm btn-white ml-2 p-0"><i class="fas fa-trash-alt text-danger"></i></button>
                      </form>
                      @endif
                     @endcan
                     
                  </td>
                </tr>
                @endforeach
               
            
              </tbody>

              <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Identificador</th>
                  <th>Nombre</th>
                  <th>Guard</th>
                  <th>Acciones</th>
                </tr>
              </tfoot>
            </table>
          </div>
          
        </div>
      
    </div>
      
  </div>
  
</section>
