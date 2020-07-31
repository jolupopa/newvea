<div class="col-12 col-md-6">
           <form action="{{route('admin.user.redes.update', $user)}}" method="POST" class="card shadow-soft border p-4">
            {{ method_field('PUT')}}
              @csrf
            <!--facebook y whatsup-->
            <div class="row ">
              <div class="col-12 col-lg-6">
                <div class="form-group">
                  <label for="url_facebook"><span><i class="fab fa-facebook-square text-primary"></i></span> Facebook </label>
                  <input type="text" class="form-control form-control-lg shadow-soft @error('url_facebook') is-invalid @enderror" name="url_facebook" id="url_facebook" placeholder="Url Facebook">
                    @error('url_facebook')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
              </div>
              <div class="col-12 col-lg-6">
                <div class="form-group">
                  <label for="url_linkedin"><span> <i class="fab fa-linkedin text-primary"></i> </span> Linkeding</label>
                  <input type="text" class="form-control form-control-lg shadow-soft @error('url_linkedin') is-invalid @enderror" id="url_linkedin" placeholder="Url Linkeding" name="url_linkedin" >
                    @error('url_linkedin')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <!-- twitter-->
              <div class="col-12 col-lg-6">
                <div class="form-group">
                  <label for="url_twitter"><span> <i class="fab fa-twitter text-info"></i></span> Twitter</label>
                  <input type="text" class="form-control form-control-lg shadow-soft @error('url_twitter') is-invalid @enderror" id="url_twitter" placeholder="Url Twitter" name="url_twitter">
                    @error('url_twitter')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
              </div>
              <!--instagramf-->
              <div class="col-12 col-lg-6">
                <div class="form-group">
                  <label for="url_instagram"><span><i class="fab fa-instagram-square text-danger"></i></span> Instagram</label>
                  <input type="text" class="form-control form-control-lg shadow-soft @error('url_instagram') is-invalid @enderror" id="url_instagram" placeholder="Url Instagram" name="url_instagram">
                    @error('url_instagram')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
              </div>
              <!--whatsup-->
              <div class="col-12 col-lg-6">
                <div class="form-group">
                <label for="url_youtube"><span><i class="fab fa-youtube text-danger"></i> YouTube</label> 
                <input type="text" class="form-control form-control-lg shadow-soft @error('url_youtube') is-invalid @enderror" id="url_youtube" placeholder="Url YouTube" name="url_youtube">
                  @error('url_youtube')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
             
              <!--url homepage-->
              <div class="col-12 col-lg-6">
                <div class="form-group">
                  <label for="url_web"><span><i class="fab fa-google-plus text-danger"></i> Mi Pagina Web</label>
                  <input type="text" id="ur_web" name="url_web" class="form-control shadow-soft form-control-lg @error('url_web') is-invalid @enderror" placeholder="Ejm. https://mipagina.com">
                    @error('url_web')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
              </div>

              <!--whatsup messenger-->
              <div class="col-12 col-lg-6">
                <div class="form-group">
                  <label for="w_messenger"><span><i class="fab fa-whatsapp text-success"></i> Whatsapp Messenger</label>
                  <input type="text" id="w_messenger" name="w_messenger" class="form-control shadow-soft form-control-lg @error('w_messenger') is-invalid @enderror" placeholder="Tu número">
                    @error('w_messenger')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
              </div>
             
              <!--whatsup bussines-->
              <div class="col-12 col-lg-6">
                <div class="form-group">
                  <label for="w_bussines"><span><i class="fab fa-whatsapp text-success"></i> Whatsapp Bussines </label>
                  <input type="text" id="w_bussines" name="w_bussines" class="form-control shadow-soft form-control-lg @error('w_bussines') is-invalid @enderror" placeholder="Tu número">
                    @error('w_bussines')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
              </div>
            </div>
            <div class="align-self-end">
              <button class="btn btn-default btn-danger mt-2 " type="submit">Actualizar Redes Sociales</button>
            </div>
          </form>

          <!--imagen de perfil-->
          @include('admin.data.sections.upload_foto')
        </div>