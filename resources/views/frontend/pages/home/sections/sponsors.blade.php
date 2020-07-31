 <section id="sponsors" class="my-5 pt-3">
    <div class="container bg-contenedor text-center pb-3">
      <h2 class="h1 text-muted py-5">Con la confianza de las mejores empresas del Perú</h2>

        <div id="owl-sponsor" class="owl-carousel owl-theme">
          @foreach($sponsors as $sponsor)
            <div class="item"><h4>{{ $sponsor->name }}</h4></div>
          @endforeach  
        </div>

    </div>
  </section>