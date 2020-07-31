<section id="grid-prop-agent" class="container my-5">
    <h2 class=" h1 text-center py-4 mb-4 text-muted">PRINCIPALES</h2>
    <div class="row">
      <div class="col-md-6">
        <div class="card card-box">
          <div class="card-header text-center bg-white">
            <h4>CIUDADES</h4>
          </div>

          <div class="card-body py-0">
            @foreach($cities->chunk(3) as $citys)
             
              <div class="row my-0">
                @foreach($citys as $city)
                <div class="parent card col-4 px-0 my-0">
                    <div class="child">
                      <a href="{{ route('properties.city.index', $city->id) }}">
                        <span class="w-100 h-100">{{ $city->name }}</span>
                        <img class="card-img-top" src="img/locations/{{ $city->urlFoto }}" alt=" foto de {{ $city->name }}">
                      </a>
                    </div>
                </div>
                @endforeach
              </div>
             @endforeach
             
          </div>
         
        </div>
        
      </div>

      <div class="col-md-6 mt-5 mt-md-0">
        <div class="card card-box">
          <div class="card-header bg-white header text-center">
            <h4>AGENTES Y PROMOTORES</h4>
          </div>

          <div class="card-body py-0">
             @foreach($user_destacados->chunk(3) as $users)
            <div class="row">
              @foreach($users as $seller)

              <div class="parent card col-4 px-0">
                
                  <div class="child">

                    <a href="{{ route('properties.promotor.index', $seller->id )}}">
                      <span class="w-100 h-100"></span>
                      <img class="card-img-top" src="img/users/{{ $seller->profile->url_foto }}" alt="">
                    </a>
                  </div>
                
              </div>
               @endforeach
            </div>
            @endforeach
          </div>


        </div>
      </div>
    </div>
  </section>