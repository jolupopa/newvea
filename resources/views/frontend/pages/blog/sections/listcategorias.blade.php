<section id="list-categorias">
    <div class="container">
        <div class="row">

            <!--listado de articulos-->
            <div class="col-12 col-md-9">  
                <div class="container">
                    <h2 class="my-2 ml-2">Publicaciones con : <span class="text-primary">{{ $title }}</span> </h2>
                    <!-- articulo -->
                    @foreach($posts as $post)
                        @if($post->category)
                            <div class="blog-card my-2">
                                <div class="card shadow-soft border-soft p-0 p-md-4">
                                    <div class="card-header border-white bg-white pb-2">
                                        <div>
                                            <div class=" media d-block d-md-flex justify-content-between">
                                                <!--avatar de usuario-->       
                                                <div><a href="#" class="font-small font-weight-bold mr-2">
                                                    <img class="img-fluid rounded-circle mr-2" src="{{ $post->administrator->foto ? asset( 'storage/avatars/' . $post->administrator->foto ) : '/img/users/avatars/default.png' }}" alt="avatar" height="30px" width="30px">{{ $post->administrator->name }} </a>
                                                </div>
                                                <div class="text-right">
                                                    <span class="font-small ml-1 font-weight-light pl-2">{{ $post->published_at->format('M d') }}</span>
                                                </div>  
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body py-3">
                                        <a href="#">
                                            @if( $post->photos->count() === 1)
                                                <figure><img src="{{asset('storage/blog/' . $post->photos->first()->url) }}" class="card-img-top img-fluid" alt="imagen del blog"></figure>
                                            @elseif( $post->photos->count() > 1)
                                                <figure><img src="{{asset('storage/' . $post->photos->first()->url) }}" class="card-img-top img-fluid" alt="imagen del blog"></figure>
                                            @endif
                                            
                                        
                                        
                                        </a>
                                    
                                        <!--area de titulo y categoria-->
                                        <div class="mt-2 h5 mt-lg-5">
                                            <!--categoria-->
                                            <div class="post-category" style="position: relative;">
                                            <span class="category" style="position:absolute; top:-20px; right:-45px;" ><a href="{{ route('categories.show', $post->category) }}" class="badge badge-sm badge-primary text-uppercase ml-1">{{ $post->category->name }}</a></span>
                                            </div>
                                            <!--titulo-->
                                            <a href="/blog/{{ $post->url }}"> 
                                                <h2 class="mt-3 mb-4 text-muted">{{ $post->title}}</h2>
                                            </a>
                                        </div>
                                        <!--resumen-->
                                        <p class="text-muted mb-0 mb-lg-4">{{ $post->excerpt}} ...(ver más).
                                        <!--etiquetas-->
                                    
                                        <div class="h5 d-flex justify-content-end">
                                            @foreach($post->tags as $tag)
                                            <a href="{{ route('tags.show', $tag)}}" class="badge badge-sm  text-muted text-uppercase ml-1"><span>#</span>{{$tag->name}}</a>
                                            @endforeach
                                        </div>
                                    
                                        </p>
                                    </div>

                                    <div class="card-footer bg-white mx-4 px-0 pt-0">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class=""><a class="text-dark" href="#"><i class="far fa-comments mr-2"></i>23 commentarios</a></div><span class="text-italic">{{ $post->readtime }} min de lectura</span>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- fin de articulo -->
                        @endif
                    @endforeach

                </div><!-- fin de contenedor de articulos -->

                <!--paginacion de articulos-->
                
                <div class="container d-flex justify-content-center mt-4">
                    {{ $posts->links() }}
    
                </div>
            </div>

            <!--aside derecho-->
            @include('frontend.pages.blog.sections.includes.aside')
        </div> 
        <!-- end row -->
    </div>
</section>