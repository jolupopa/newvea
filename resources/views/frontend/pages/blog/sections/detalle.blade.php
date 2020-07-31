<section id="articulo-detalle">
  <div class="container">
    <div class="row">
      <!--columna left-->
      <div class="col-12 col-md-9">
        <!--articulos-->
        <div class="container">
          <!-- Detalle Article -->
          <div class="blog-card my-2">
            <div class="card shadow-soft border-soft p-0 p-md-4">
              <div class="card-header border-white bg-white pb-2">
                <div>
                  <div class="">
                    <div class="d-flex justify-content-between">
                      <a href="#" class="font-small font-weight-bold">
                      <img class="img-fluid rounded-circle mr-2" src="{{ $post->administrator->foto ? asset( 'storage/avatars/' . $post->administrator->foto ) : '/img/users/avatars/default.png' }}" alt="avatar" height="30px" width="30px">{{$post->administrator->name}}  
                      </a>
                      <span class="font-small ml-1 font-weight-light">{{ optional($post->published_at)->format('M d') }}</span>
                    </div>
                    <h2 class="mt-3 mb-4 text-muted">{{ $post->title }}</h2>

                    <!--area de titulo y categoria-->
                    <div class="mt-2 h5 mt-lg-5">
                        <!--categoria-->
                        @if($post->category)
                        <div class="post-category" style="position: relative;">
                            <span class="category" style="position:absolute; top:-20px; right:-45px;" ><a href="{{ route('categories.show', $post->category) }}" class="badge badge-sm badge-primary text-uppercase ml-1">{{ $post->category->name }}</a></span>
                        </div>
                        @endif
                    </div>
                    
                  
                  </div>
                </div>
              </div>
              <div class="card-body py-3">
                <a href="#"> 
                  @if( $post->photos->count() === 1)
                  <figure><img src="{{asset('storage/blog/' . $post->photos->first()->url) }}" class="card-img-top img-fluid" alt="imagen del blog"></figure>
                    @elseif( $post->photos->count() > 1)
                      <figure><img src="{{asset('storage/blog/' . $post->photos->first()->url) }}" class="card-img-top img-fluid" alt="imagen del blog"></figure>
                    @endif
                </a>
                <!--etiquetas-->
                <div class=" h5 mt-2 d-flex justify-content-end">
                  @foreach($post->tags as $tag)
                  <a href="#" class="badge badge-sm  text-muted text-uppercase ml-1"><span>#</span>{{$tag->name}}</a>
                  @endforeach
                </div>
                  <p class="h5 text-muted mb-0 mb-lg-4">{{ $post->body}}
                  </p>

                  <!--redes sociales -->
                  <div class=" mt-3">
                    @include('frontend.pages.blog.sections.includes.socialshare',['description' => $post->title ])
                  </div>

                  <img class="img-fluid my-4" src="https://via.placeholder.com/900x100/FD047B/fff/?text=Anuncio+VeaInmueles" alt="anuncio">

              </div>
              
              <div class="card-footer bg-white mx-4 px-0 pt-0">
                <div class="d-flex align-items-center justify-content-between">
                  <div class=""><a class="text-dark" href="#"><i class="far fa-comments mr-2"></i>23 comentarios</a></div><span class="text-italic">5 min de lectura</span>
                </div>
              </div>
            </div>
          </div><!-- End of article -->
          <!-- Article -->
        </div>
        <!--comentarios-->
        <aside class="container mt-5">
          <div class="row">
            <div class="col-12">
              <h4 class="mb-4"><span class="badge  badge-primary mr-2">362</span> Comentarios</h4>
                <div>
                  <form action="">
                    <label for="coment" class="sr-only">Comentario</label>
                    <textarea class="form-control" placeholder="Añade tu comentario" rows="6" data-bind-characters-target="#charactersRemaining" maxlength="1000" name="coment"></textarea>
                    <div class="d-flex justify-content-between mt-3">
                      <small class="font-weight-light"><span id="charactersRemaining">1000</span> caracters estan disponibles</small> 
                      <button class="btn btn-primary" type="button">Enviar</button>
                  </form>
                </div>
                <div class="mt-5">
                  <div class="bg-white border border-soft shadow-soft p-4 mb-4">
                    <div class="d-flex justify-content-between mb-4"><span class="font-small"><a href="#"><img class="avatar-sm img-fluid rounded-circle mr-2" src="img/users/75x75/1.jpg" alt="avatar" class="ing.fluid" width="65px;"> <span class="font-weight-bold">John Doe</span> </a><span class="ml-2">hace 2 min</span></span>
                      <div><button class="btn btn-link text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Reportar comentario"><i class="far fa-flag"></i></button></div>
                    </div>
                    <p class="m-0">I really like that the Spaces uses a lot of Bootstrap 4's classes to position elements across the website. I also like the fact that we can get a version of the code without Sass if needed.<br><br>When is the next product coming? :)</p>
                    <div class="my-4 pt-1 d-flex justify-content-between">
                      <div>
                        <i class="far fa-thumbs-up text-success mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="me gusta el comentario"></i> 

                        <i class="far fa-thumbs-down  text-danger mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="No me gusta comentario"></i>
                        
                        <span class="font-small font-weight-light">4 Me gusta</span></div><a class="font-weight-light font-small" data-toggle="collapse" href="#" aria-expanded="false" aria-controls="replyContainer1"><i class="fas fa-reply mr-2"></i> Responder</a>
                      </div>
                      <!---modal para responder-->
                      <div class="collapse" id="replyContainer1">
                        <textarea class="form-control border" placeholder="Reply to John Doe" rows="6" data-bind-characters-target="#charactersRemainingReply" maxlength="1000"></textarea>

                        <div class="d-flex justify-content-between mt-3"><small class="font-weight-light"><span id="charactersRemainingReply">1000</span> characters remaining</small> <button class="btn btn-primary btn-sm animate-up-2" type="button">Enviar</button></div>
                      </div>
                    </div>

                  <div class="bg-white border border-soft shadow-soft p-4 ml-5 mb-4">
                    <div class="d-flex justify-content-between mb-4"><span class="font-small"><a href="#"><img class="avatar-sm img-fluid rounded-circle mr-2" src="img/users/75x75/1.jpg" alt="avatar" class="img-fluid" width="65px;"> <span class="font-weight-bold">Calota Oana</span> </a><span class="ml-2">2 min ago</span></span>
                      <div><button class="btn btn-link text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Report comment"><i class="far fa-flag"></i></button></div>
                    </div>
                    <p class="m-0">Hi John Doe,<br><br>We're happy to hear you like our product. A new one will come soon enough!</p>
                    <div class="my-4 pt-1 d-flex justify-content-between">
                      <div><i class="far fa-thumbs-up text-action text-success mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Like comment"></i> <i class="far fa-thumbs-down text-action text-danger mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dislike comment"></i> <span class="font-small font-weight-light">2 likes</span></div><a class="text-action font-weight-light font-small" data-toggle="collapse" href="#replyContainer2" aria-expanded="false" aria-controls="replyContainer2"><i class="fas fa-reply mr-2"></i> Reply</a>
                    </div>
                    <div class="collapse" id="replyContainer2"><textarea class="form-control border" placeholder="Reply to John Doe" rows="6" data-bind-characters-target="#charactersRemainingReply2" maxlength="1000"></textarea>
                      <div class="d-flex justify-content-between mt-3"><small class="font-weight-light"><span id="charactersRemainingReply2">1000</span> characters remaining</small> <button class="btn btn-primary btn-sm animate-up-2" type="button">Send</button></div>
                    </div>
                  </div>
                  <div class="bg-white border border-soft shadow-soft p-4 mb-4">
                    <div class="d-flex justify-content-between mb-4"><span class="font-small"><a href="#"><img class="avatar-sm img-fluid rounded-circle mr-2" src="img/users/75x75/1.jpg" alt="avatar" class="img-fluid" width="65px;"> <span class="font-weight-bold">Themesberg</span> </a><span class="ml-2">2 min ago</span></span>
                      <div><button class="btn btn-link text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Report comment"><i class="far fa-flag"></i></button></div>
                    </div>
                    <p class="m-0">Hey there! We want to say that <span class="text-tertiary">you're awesome</span> and we think you'll build great websites! Why not use Spaces to make things easier?</p>
                    <div class="my-4 pt-1 d-flex justify-content-between">
                      <div><i class="far fa-thumbs-up text-action text-success mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Like comment"></i> <i class="far fa-thumbs-down text-action text-danger mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dislike comment"></i> <span class="font-small font-weight-light">4 likes</span></div><a class="text-action font-weight-light font-small" data-toggle="collapse" href="#replyContainer3" aria-expanded="false" aria-controls="replyContainer3"><i class="fas fa-reply mr-2"></i> Reply</a>
                    </div>
                    <div class="collapse" id="replyContainer3"><textarea class="form-control border" placeholder="Reply to John Doe" rows="6" data-bind-characters-target="#charactersRemainingReply3" maxlength="1000"></textarea>
                      <div class="d-flex justify-content-between mt-3"><small class="font-weight-light"><span id="charactersRemainingReply3">1000</span> characters remaining</small> <button class="btn btn-primary btn-sm animate-up-2" type="button">Send</button></div>
                    </div>
                  </div>
                  
                  <div id="extraContent" style="display: none;">
                    <div class="bg-white border border-soft shadow-soft p-4 mb-4">
                      <div class="d-flex justify-content-between mb-4"><span class="font-small"><a href="#"><img class="avatar-sm img-fluid rounded-circle mr-2" src="img/users/75x75/1.jpg" alt="avatar" class="img-fluid" width="65px;"> <span class="font-weight-bold">John Doe</span> </a><span class="ml-2">2 min ago</span></span>
                        <div><button class="btn btn-link text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Report comment"><i class="far fa-flag"></i></button></div>
                      </div>
                      <p class="m-0">I really like that the Spaces uses a lot of Bootstrap 4's classes to position elements across the website. I also like the fact that we can get a version of the code without Sass if needed.<br><br>When is the next product coming? :)</p>
                      <div class="my-4 pt-1 d-flex justify-content-between">
                        <div><i class="far fa-thumbs-up text-action text-success mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Like comment"></i> <i class="far fa-thumbs-down text-action text-danger mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dislike comment"></i> <span class="font-small font-weight-light">4 likes</span></div><a class="text-action font-weight-light font-small" data-toggle="collapse" href="#replyContainer4" aria-expanded="false" aria-controls="replyContainer4"><i class="fas fa-reply mr-2"></i> Reply</a>
                      </div>
                      <div class="collapse" id="replyContainer4"><textarea class="form-control border" placeholder="Reply to John Doe" rows="6" data-bind-characters-target="#charactersRemainingReply4" maxlength="1000"></textarea>
                        <div class="d-flex justify-content-between mt-3"><small class="font-weight-light"><span id="charactersRemainingReply4">1000</span> characters remaining</small> <button class="btn btn-primary btn-sm animate-up-2" type="button">Send</button></div>
                      </div>
                    </div>
                    <div class="bg-white border border-soft shadow-soft p-4 ml-5 mb-4">
                      <div class="d-flex justify-content-between mb-4"><span class="font-small"><a href="#"><img class="avatar-sm img-fluid rounded-circle mr-2" src="img/users/75x75/1.jpg" alt="avatar" class="img-fluid" width="65px;"> <span class="font-weight-bold">Themesberg</span> </a><span class="ml-2">2 min ago</span></span>
                        <div><button class="btn btn-link text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Report comment"><i class="far fa-flag"></i></button></div>
                      </div>
                      <p class="m-0">Hi John Doe,<br><br>We're happy to hear you like our product. A new one will come soon enough!</p>
                      <div class="my-4 pt-1 d-flex justify-content-between">
                        <div><i class="far fa-thumbs-up text-action text-success mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Like comment"></i> <i class="far fa-thumbs-down text-action text-danger mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dislike comment"></i> <span class="font-small font-weight-light">2 likes</span></div><a class="text-action font-weight-light font-small" data-toggle="collapse" href="#replyContainer5" aria-expanded="false" aria-controls="replyContainer5"><i class="fas fa-reply mr-2"></i> Reply</a>
                      </div>
                      <div class="collapse" id="replyContainer5"><textarea class="form-control border" placeholder="Reply to John Doe" rows="6" data-bind-characters-target="#charactersRemainingReply5" maxlength="1000"></textarea>
                        <div class="d-flex justify-content-between mt-3"><small class="font-weight-light"><span id="charactersRemainingReply5">1000</span> characters remaining</small> <button class="btn btn-primary btn-sm animate-up-2" type="button">Send</button></div>
                      </div>
                    </div>
                    <div class="bg-white border border-soft shadow-soft p-4 mb-4">
                      <div class="d-flex justify-content-between mb-4"><span class="font-small"><a href="#"><img class="avatar-sm img-fluid rounded-circle mr-2" src="img/users/75x75/1.jpg" alt="avatar" class="img-fluid" width="65px;"> <span class="font-weight-bold">jose rg</span> </a><span class="ml-2">2 min ago</span></span>
                        <div><button class="btn btn-link text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Report comment"><i class="far fa-flag"></i></button></div>
                      </div>
                      <p class="m-0">Hey there! We want to say that <span class="text-tertiary">you're awesome</span> and we think you'll build great websites! Why not use Spaces to make things easier?</p>
                      <div class="my-4 pt-1 d-flex justify-content-between">
                        <div><i class="far fa-thumbs-up text-action text-success mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Like comment"></i> <i class="far fa-thumbs-down text-action text-danger mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dislike comment"></i> <span class="font-small font-weight-light">4 likes</span></div><a class="text-action font-weight-light font-small" data-toggle="collapse" href="#replyContainer6" aria-expanded="false" aria-controls="replyContainer6"><i class="fas fa-reply mr-2"></i> Reply</a>
                      </div>
                      <div class="collapse" id="replyContainer6"><textarea class="form-control border" placeholder="Reply to John Doe" rows="6" data-bind-characters-target="#charactersRemainingReply6" maxlength="1000"></textarea>
                        <div class="d-flex justify-content-between mt-3"><small class="font-weight-light"><span id="charactersRemainingReply6">1000</span> characters remaining</small> <button class="btn btn-primary btn-sm animate-up-2" type="button">Send</button></div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="mt-5 text-center"><button id="loadOnClick" class="btn btn-white shadow-soft border-soft text-gray btn-loading-overlay mr-2 mb-2" type="button"><span class="spinner"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> </span><span class="ml-1 btn-inner-text">Carga mas comentarios</span></button>
                    <p id="allLoadedText" style="display: none;">That's all, Joe</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </aside>
      </div>

      <!--aside right-->
      @include('frontend.pages.blog.sections.includes.aside')
    </div>
  </div>
</section>