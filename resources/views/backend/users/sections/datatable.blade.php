<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">

        <div class="card">
          
            <div class="card-header text-right">
              <div>selector</div>
            </div>
         

          <div class="card-body">
            <table id="datatable-users" class="table table-bordered table-hover">
             
              <thead>
                <tr>
                   <th>Nombre</th>
                  <th>Correo</th>
                  <th>Destacado</th>
                  <th>Activo</th>
                  <th>Acciones</th>
                </tr>
              </thead>

              <tbody>
                @foreach($users as $user)
                <tr>
                  
                  <td>{{ $user->name}}</td>
                  <td>{{ $user->email}}</td>
                  <td>
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="homeswitch" {{ $user->in_home ? 'checked' : ''}} disabled>
                      <label class="custom-control-label" for="homeswitch"></label>
                    </div>
                  </td>
                  <td>
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="activeSwitch" {{ $user->active ? 'checked' : ''}} disabled>
                      <label class="custom-control-label" for="activeSwitch"></label>
                    </div>
                  </td>
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
                  
                  <th>Nombre</th>
                  <th>Correo</th>
                  <th>Destacado</th>
                  <th>Activo</th>
                  <th>Acciones</th>
                </tr>
              </tfoot>
            </table>
          </div>
          
        </div>
      
    </div>
      
  </div>
  
</section>
