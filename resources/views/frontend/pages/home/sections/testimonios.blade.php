<section id="testimonios" class="bg-contenedor my-5">

    <div class="container text-center">
      <h2 class="py-5 h1 text-muted">TESTIMONIOS</h2>
      <p class=" h4 pb-4 text-muted">Nos comentan sobre <span
          class="text-primary font-weight-bold ">VeaInmuebles</span>.</p>
      <div id="carouselTestimonio" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner">
          @foreach($testimonies as $index => $testimony)
            <div class="carousel-item {{ $index == 0 ? 'active' : ''}} mb-5 text-center">
              <div class="row d-flex align-items-center">
                <div class="col-3 col-md-2 offset-md-1 offset-lg-2">
                  <img src="img/users/{{ $testimony->urlFoto }}" alt="" class="img-fluid rounded-circle" style="width: 8rem;">
                </div>
                <div class="col-9 col-md-8 col-lg-6">
                  <p class="h5"><i class="fas fa-quote-left fa-flip-vertical text-muted mr-2" aria-hidden="true"></i> {{ $testimony->frase}} <i class="fas fa-quote-right text-muted ml-2"
                      aria-hidden="true"></i></p>
                </div>
                <div class="col col-md-8 offset-md-2 text-right">
                  <span>{{$testimony->first_name}} {{$testimony->last_name}}</span><br><span>{{ $testimony->cargo}}</span>
                </div>
              </div>
            </div>
          @endforeach 
        </div>
      </div>
    </div>

  </section>
