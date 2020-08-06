<form action="{{ route('admin.user.datos.update', $user)}}" method="POST" class="card shadow-soft border p-4 mb-4">
         {{ method_field('PUT')}}
            @csrf
            <!--full_name y nickname-->
            <div class="row my-3">
              <div class="col-12 col-lg-7">
                <div class="form-group">
                  <label for="name">Nombres y Apellidos</label> 
                  <input type="text" class="form-control form-control-lg shadow-soft @error('name') is-invalid @enderror" name="name" placeholder="Nombres y apellidos completos" value="{{ old('name', $user->name ) }}">
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
              </div>
              <div class="col-12 col-lg-5">
                <div class="form-group">
                  <label for="nickname">Nickname</label> 
                  <input type="text" class="form-control form-control-lg shadow-soft @error('nickname') is-invalid @enderror" id="nickname" placeholder="Nombre de usuario" name="nickname" value="{{ old('nickname', $user->nickname ) }}">
                    @error('nickname')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
              </div>
            </div>
             <!--tipo de doc y num de doce-->
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                  <label for="type_doc">Tipo de documento</label>
                  <select class="form-control form-control-lg shadow-soft" id="type_doc" name="type_doc">
                    <option value="dni">DNI</option>
                    <option value="ruc">RUC</option>
                  </select>
                </div>
              </div>
              <div class="col-8">
                <div class="form-group">
                  <label for="num_doc">Número de documento</label>
                  <input type="number" class="form-control form-control-lg shadow-soft @error('num_doc') is-invalid @enderror" name="num_doc" value="{{ old('num_doc', $user->profile->num_doc ) }}">
                    @error('num_doc')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
              </div>
            </div>
             <!--ubigeo-->
            <div class="row">
              @include('frontend.pages.includes.ubi_geo')
                    @error('dist')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    
                     <input type="hidden" id="id_distrito" name="id_distrito"  value="0">

               <!--direccion-->
              <div class="col-8">
                <div class="form-group">
                  <label for="address">Dirección</label>
                  <input type="text" id="address" name="address" class="form-control shadow-soft form-control-lg @error('address') is-invalid @enderror" value="{{ old('address', $user->profile->address ) }}">
                    @error('address')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
              </div>


              <div class="col-4">
                <div class="form-group">
                  <label for="distrito">Distrito Seleccionado</label>
                  <input type="text" id="distrito" name="distrito" class="form-control shadow-soft form-control-lg @error('distrito') is-invalid @enderror" value="{{ old('distrito', $user->profile->distrito ) }}" readonly>
                    @error('distrito')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
              </div>
            </div>

            <div class="row">
              <!-- ciudad-->
              <div class="col-12 col-lg-6">
                <div class="form-group">
                  <label for="phone">Telefono Fijo</label>
                  <input type="number" class="form-control form-control-lg shadow-soft @error('phone') is-invalid @enderror" id="phone" placeholder="Telefono fijo" name="phone" value="{{ old('phone', $user->profile->phone ) }}">
                    @error('phone')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
              </div>
              <!--num telef-->
              <div class="col-12 col-lg-6">
                <div class="form-group">
                  <label for="movil">Telefono celular</label> 
                  <input type="number" class="form-control form-control-lg shadow-soft @error('movil') is-invalid @enderror" id="movil" placeholder="Número de celular" name="movil" value="{{ old('movil', $user->profile->movil ) }}">
                    @error('movil')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
              </div>
             
              <!--About me-->
              <div class="col-12">
                <div class="form-group">
                  <label for="about_me">Información sobre mi:</label>
                  <textarea class="form-control shadow-soft @error('about_me') is-invalid @enderror" id="about_me" name="about_me" rows="3" placeholder="Resumen descriptivo" > {{ old('about_me', $user->profile->about_me ) }}</textarea>
                    @error('about_me')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  
                </div>
                
              </div>
               <!-- titulo personal-->
               <div class="col-12 col-lg-6">
                <div class="form-group">
                  <label for="title">Titulo antecedente al nombre</label> 
                  <input type="text" class="form-control shadow-soft @error('title') is-invalid @enderror" id="title" placeholder="Ejm. Agente, Abogado, Ing. Dr." name="title" value="{{ old('title', $user->profile->title ) }}">
                   @error('title')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                    
              </div>
              <!--username-->
              <div class="col-12 col-lg-6">
                <div class="form-group">
                  <label for="email2">Email de Empresa</label>
                  <input type="email" class="form-control shadow-soft @error('email2') is-invalid @enderror" id="email2" name="email2" placeholder="Ejm. example@opera.com" value="{{ old('email2', $user->profile->email2 ) }}">
                    @error('email2')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
              </div>
            </div>
            <div class="align-self-end">
              <button class="btn btn-default btn-danger mt-2 " type="submit">Actualizar datos de Usuario</button>
            </div>
          </form>