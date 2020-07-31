@extends('layouts.app')

@section('meta-title', 'VeaInmuebles')
@section('meta-description')
Detalle de un inmueble especifico.
@endsection

@section('content')

  <section id="detalle">
    @foreach($properties as $property)
    <div class="container">

      <h2 class="text-muted mt-5 text-center my-4">{{ $property->title }}</h2>

      <!--seccion slider y resumen-->
      <div class="row">
        <!--slider-->
        <div class="col-12 col-md-8">
          @include('frontend.pages.properties.detail.slider')
        </div>
        <!--resumen-->
        @include('frontend.pages.properties.detail.resumen')
      </div>
      <!-- tabs y publicidad-->
      <div class="row">  
        <!--enlaces tabs-->
       @include('frontend.pages.properties.detail.tabs')
        <!--publicidad-->
       @include('frontend.pages.properties.detail.publicidad') 
      </div>

      <!--seccion agente-->
      <div class="row">
        <!--profile-->
        <div class="col-12 col-md-4 bg-contenedor">
          @include('frontend.pages.properties.detail.profile') 
        </div>
        <!--info de atencion-->
        <div class="col-12 col-md-4  bg-contenedor d-flex al align-items-center">
            @include('frontend.pages.properties.detail.horarios') 
        </div>
        <!--selecciona dia y hora para cita-->
        <div class="col-12 col-md-4 bg-contenedor text-muted">
          
         @include('frontend.pages.properties.detail.datetime') 
        </div>
      </div>

        <h2 class="text-center text-muted my-5">SUGERIDOS</h2>
      <!-- listado de propiedades -->
       @include('frontend.pages.properties.detail.sugeridos') 
        

    </div>
    @endforeach
  </section>
@endsection


@section('modals')
@endsection

@push('styles')
 <!-- Link Swiper's CSS -->
   <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}">

   <!-- Link pickadatejs -->
   <link rel="stylesheet" href="{{ asset('js/pickadatejs/themes/default.css' ) }}">
   <link rel="stylesheet" href="{{ asset('js/pickadatejs/themes/default.date.css' ) }}">
   <link rel="stylesheet" href="{{ asset('js/pickadatejs/themes/default.time.css' ) }}">

   <!-- Link Venobox CSS -->
   <link rel="stylesheet" href="{{ asset('css/venobox.min.css' ) }}">
@endpush

@push('scripts')
 <script src="{{ asset('js/swiper.min.js' ) }}"></script>
   <script src="{{ asset('js/pickadatejs/picker.js' ) }}"></script>
   <script src="{{ asset('js/pickadatejs/picker.date.js' ) }}"></script>
   <script src="{{ asset('js/pickadatejs/picker.time.js' ) }}"></script>
   <script src="{{ asset('js/venobox.min.js' ) }}"></script>
  


@endpush

@push('load-plugin')
<script>
  $(function(){
    var galleryThumbs = new Swiper('.gallery-thumbs', {
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
    });
    var galleryTop = new Swiper('.gallery-top', {
      spaceBetween: 10,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      thumbs: {
        swiper: galleryThumbs
      }
    });

  
    /*----------------------------------------------------*/
	  /*  iniciando datepiker.js
	  /*----------------------------------------------------*/
	  $('.datepicker').pickadate({
        monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthsShort: ['ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic'],
        weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
        today: 'Hoy',
        clear: 'Limpiar',
        close: 'Cerrar',
        labelMonthNext: 'Siguiente mes',
        labelMonthPrev: 'Mes anterior',
        labelMonthSelect: 'Seleccione un mes',
        labelYearSelect: 'Seleccione un año',
        firstDay: 1,
        format: 'dddd, dd !de mmmm !de yyyy',
        formatSubmit: 'dd/mm/yyyy',
        selectYears: true,
        selectMonths: true,
        min: true,
        max: 30,
        onStart: function () {
            var date = new Date();
            this.set('select', [date.getFullYear(), date.getMonth(), date.getDate()]);
        }
    });

    /*-----------------------------------------------------------
      6. INICIANDO "picker.time.js"
      -------------------------------------------------------------*/
      $('.timepicker').pickatime({
          clear: 'Borrar',
          format: 'hh:i A',
          interval: 120,
          min: [8, 00],
          max: [16, 00]

    });
    
    /*-----------------
      INICIANDO VENOBOX
      -----------------*/
    $('.venobox-video').venobox({
      autoplay: true,
      bgcolor: 'rgba(255, 255, 255, 0.4)',
      border: '5px',
      closeColor: '#fff',
      overlayColor: 'rgba(12, 60, 22, 0.83)',
      spinner: 'three-bounce'
    });

  });
</script>

@endpush
