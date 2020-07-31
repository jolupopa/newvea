<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">

        <div class="card">

          <div class="card-header text-right">
            <button class="btn btn-success" data-toggle="modal" data-target="#createPostModal">Crear Articulo</button>
          </div>

          <div class="card-body">
            <table id="datatable-post" class="table table-bordered table-hover">
             
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Título</th>
                  <th>Resumen</th>
                  <th>Detalle</th>
                  <th>Acciones</th>
                </tr>
              </thead>

              <tbody>
                @foreach($posts as $post)
                <tr>
                  <td>{{ $post->id}}</td>
                  <td>{{ $post->title}}</td>
                  <td>{{ $post->excerpt}}</td>
                  <td>{{ $post->body}}</td>
                  <td>
                       <a href="{{ route('post', $post )}}" target="_blank"> <i class="fas fa-eye text-success mr-2"></i></a>
                     | <a href="{{ route('backend.posts.edit', $post) }}"> <i class="fas fa-edit text-warning mx-2"></i></a>
                     |
                     <form method="POST" action="{{ route('backend.posts.destroy', $post) }}" style="display: inline;">
                      {{ method_field('DELETE')}}
                      @csrf
                       <button class="btn btn-sm btn-white ml-2 p-0"><i class="fas fa-trash-alt text-danger"></i></button>
                     </form>
                     
                  </td>
                </tr>
                @endforeach
               
            
              </tbody>

              <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Título</th>
                  <th>Resumen</th>
                  <th>Detalle</th>
                  <th>Acciones</th>
                </tr>
              </tfoot>
            </table>
          </div>
          
        </div>
      
    </div>
      
  </div>
  
</section>
