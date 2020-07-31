<section class="content">
  <!--galeria--->
  <div class="row">
    <div class="col-12">
      <div class="card" style="width:100%">
        <div class="card-body d-flex" style="border-top: 2px solid blue;">
          @foreach ( $post->photos as $photo )
            <form method="POST" action="{{ route('backend.photos.destroy', $photo) }}">
              {{ method_field('DELETE') }}
              @csrf
              <div class="mx-2">
                <button class="btn btn-danger btn-sm px-1 py-0" style="position:absolute;">
                  <i class="fas fa-times" ></i>
                </button>
                <img src="{{ asset('storage/blog/' . $photo->url) }}" class="img-fluid" width="100px;" />
              </div> 
            </form>
          @endforeach
        </div>
      </div>
    </div>        
  </div>

  <form method="POST" action="{{ route('backend.posts.update', $post)  }} " >
    @csrf
    {{ method_field('PUT') }}

    {{-- enctype="multipart/form-data" --}}

    <div class="row">
      
        <!-- form left -->
        <div class="col-12 col-md-6">
          <!--datos del post-->
          <div class="card" style="width:100%">
                  
            <div class="card-body" style="border-top: 2px solid blue;">
              <!--titulo-->
              <div class="form-group">
                <label for="title">Titulo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"  value="{{ old('title', $post->title) }}" placeholder="Titulo">
                @error('title')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <!---detalle--->
              <div class="form-group">
                <label for="body">Detalle</label>
                <textarea class="form-control editor  @error('body') is-invalid @enderror" rows="3" name="body" id="body"  placeholder="Ingresa el detalle ...">{{ old('body', $post->body) }}</textarea>
                @error('body')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              
            </div>
            <!-- /.card-body -->
      
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col-12 col-md-6 --> 

        <!-- form right -->
        <div class="col-12 col-md-6">
          
          <div class="card" style="width:100%">
                  
            <div class="card-body" style="border-top: 2px solid blue;">   
            
              <!-- fecha publicacion -->
              <div class="form-group">

                  <label data-target="#published_at" data-toggle="datetimepicker">Fecha de Publicación:</label>
                    <div class="input-group date" id="published_at" data-target-input="nearest">
                        <input type="text" name="published_at" class="form-control datetimepicker-input  @error('published_at') is-invalid @enderror" data-target="#published_at" value="{{ old('published_at', $post->published_at ? $post->published_at->format('d/m/y') : null ) }}"/>
                         @error('published_at')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                        <div class="input-group-append" data-target="#published_at" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
              </div>

              <!--categorias -->
              <div class="form-group">
                <label for="category_id">Categorias</label>
                <select class="form-control select2bs4  @error('category_id') is-invalid @enderror" id="category_id" name="category_id" style="width: 100%;">
                  <option value="">Selecciona una categoria</option>
                  @foreach($categories as $category)
                  <option value="{{ $category->id }}"
                   {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }} >
                   {{ $category->name }}
                   </option>
                  @endforeach 
                </select>
                @error('category_id')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <!--etiquetas -->

              <div class="form-group">
                <label for="tags">Etiquetas</label>
                <select class="select2  @error('tags') is-invalid @enderror" name="tags[]"  multiple="multiple" data-placeholder="Selecciona una o más etiquetas" style="width: 100%;" id="tags">
                 @foreach($tags as $tag)
                  <option {{ collect( old( 'tags', $post->tags->pluck('id') ))->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id}}">{{ $tag->name}}</option>
                 @endforeach  
                </select>
                @error('tags')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
                         
                <!--excerpt--->
              <div class="form-group">
                <label for="excerpt">Resumen</label>
                <textarea class="form-control @error('excerpt') is-invalid @enderror" rows="3" name="excerpt" id="excerpt"  placeholder="Ingresa un resumen ...">{{ old('excerpt', $post->excerpt) }}</textarea>
                @error('excerpt')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

               <!--fotos--->
              <div class="form-group">
                <label>Fotos </label>
                <div class="dropzone">
                </div>
              </div>


              

              <!--submit--->
              <div class="form-group">
                <button type='submit' class="btn btn-primary">Guardar</button>
              </div>

              
              
            </div>
            <!-- /.card-body -->
      
          </div>
        </div>
        <!-- /.col-12 col-md-6 -->

      

    </div>
  </form>
  
   
</section>

