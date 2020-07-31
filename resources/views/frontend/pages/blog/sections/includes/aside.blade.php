 <div class="col-12 col-md-3">
    <!--lista de categorias--->
    <ul class="card list-group list-group-flush shadow-soft border-soft mt-2 p-3">
        <h4 class="text-center">Categorias</h4>
        
        @foreach($categories as $category)
        <li class="list-group-item border-0 py-2 d-flex align-items-center justify-content-between">
             <a href="{{ route('categories.show', $category->url) }}" 
           class="text-muted"><i class="fas fa-wallet mr-3"></i>{{ $category->name }}</a>
            <span class=" badge  badge-primary">{{ $category->posts_count }}</span>
        </li>
        @endforeach

    </ul>

    <!--articulos recientes--->
    <div class="card shadow-soft border-soft p-3 mt-4">
        <h4 class="mb-4 text-center">Articulos Recientes</h4>
        <ul class="list-unstyled news-list">
            @foreach($postsrecently as $post)
            <li class="mx-0 mb-4">
                <a href="#">
                    <img src="{{ asset('img/blog/image-1.jpg') }}" alt="Image" class="img-fluid mb-3" width="240px;">
                </a>
                    <div class="d-flex justify-content-between mb-2"><a class="text-dark mr-2" href="#"><i class="far fa-comments mr-2"></i>50</a> <span><i class="far fa-clock mr-2"></i>{{$post->published_at->format('M d')}}</span>
                    </div>
                <a href="#">
                    <h6 class="mb-1 text-muted">{{ $post->title}}</h6>
                </a>
            </li>
            @endforeach
        
        </ul>
    </div>
    <!--aside para publicidad--->
    <div class="card shadow-soft border-soft p-3 mt-4">
        <img class="img-fluid" src="https://via.placeholder.com/220x300/FD047B/fff/?text=Anuncio+VeaInmuebles" alt="anucio">
    </div>
    <!--archivos--->
    <div class="card shadow-soft border-soft p-3 mt-4">
        <h4 class="text-center mb-4">Archivos</h4>
        <ul class="list-group list-group-flush bg-white">
            @foreach($archives as $archive)
                @if($archive->month)
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 text-capitalize">
                        <a href="{{ route('blog', ['month' => $archive->month, 'year' => $archive->year] )}}">{{$archive->monthname}} - {{$archive->year}} </a> 
                        <span>{{ $archive->posts}}</span>
                    </li>
                @endif
            @endforeach
          
        </ul>
    </div>

</div>