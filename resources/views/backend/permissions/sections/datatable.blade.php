<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">

        <div class="card">
          <div class="card-body">
            <table id="datatable-permission" class="table table-bordered table-hover">
             
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
                @foreach($permisos as $permiso)
                <tr>
                  <td>{{ $permiso->id}}</td>
                  <td>{{ $permiso->name}}</td>
                  <td>{{ $permiso->display_name}}</td>
                  <td>{{ $permiso->guard_name }}</td>
                  <td>
                    @can('update', $permiso)   
                     <a href="{{ route('backend.permissions.edit', $permiso) }}"> <i class="fas fa-edit text-warning mx-2"></i></a>
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
