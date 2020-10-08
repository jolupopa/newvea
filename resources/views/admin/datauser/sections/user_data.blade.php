<form action="{{ route('admin.user.datos.update', $user)}}" method="POST" class="card shadow-soft border p-4 mb-4">
         {{ method_field('PUT')}}
            @csrf
           
            
           
             
              

            
              <legend>Información de Perfil</legend> 
              <div class="row">
                <!--nickname-->
                <div class="col-12 col-lg-6">
                  <div class="form-group">
                    <label for="nickname">Nombre</label> 
                    <input type="text" class="form-control form-control-lg shadow-soft @error('nickname') is-invalid @enderror" id="nickname" placeholder="Nombre de usuario" name="nickname" value="{{ old('nickname', $user->nickname ) }}">
                      @error('nickname')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>
                <!-- titulo personal-->
                <div class="col-12 col-lg-6">
                  <div class="form-group">
                    <label for="title">Titulo</label> 
                    <input type="text" class="form-control shadow-soft @error('title') is-invalid @enderror" id="title" placeholder="Ejm. Agente, Abogado, Ing. Dr." name="title" value="{{ old('title', $user->profile->title ) }}">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                      
                </div>

                <!-- num - fijo-->
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
                <!--num celular-->
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
                    <label for="about_me">Información sobre su experiencia y habilidades:</label>
                    <textarea class="form-control shadow-soft @error('about_me') is-invalid @enderror" id="about_me" name="about_me" rows="3" placeholder="Resumen descriptivo" > {{ old('about_me', $user->profile->about_me ) }}</textarea>
                      @error('about_me')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    
                  </div>
                  
                </div>
              </div>
               <legend>Información de facturación</legend> 
              <div class="row">
                <!--nombre-->
                <div class="col-12">
                  <div class="form-group">
                    <label for="name">Nombres y Apellidos Completos ó Razón Social</label> 
                    <input type="text" class="form-control form-control-lg shadow-soft @error('name') is-invalid @enderror" name="name" placeholder="Nombres y apellidos completos" value="{{ old('name', $user->name ) }}">
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>
                <!--sel dni o ruc-->
                <div class="col-4">
                  <div class="form-group">
                    <label for="type_doc">Tipo de documento</label>
                    <select class="form-control form-control-lg shadow-soft  @error('type_doc') is-invalid @enderror" id="type_doc" name="type_doc">
                      <option value="">Seleccione</option>
                      <option value="dni" {{ $user->profile->type_doc == 'dni' ? 'selected' : '' }}>DNI</option>
                      <option value="ruc"  {{ $user->profile->type_doc == 'ruc' ? 'selected' : '' }}>RUC</option>
                    </select>
                    @error('type_doc')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <!--num de doc-->
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
                <!--direccion-->
                <div class="col-12">
                  <div class="form-group">
                    <label for="address">Dirección [ Calle,Urb. ó Centro Poblado, Distrito y Provincia ]</label>
                    <input type="text" id="address" name="address" class="form-control shadow-soft form-control-lg @error('address') is-invalid @enderror" value="{{ old('address', $user->profile->address ) }}">
                      @error('address')
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