@extends('layouts.app')

@section('meta-title', 'VeaInmuebles')
@section('meta-description')
VeaInmuebles es una pagiana de gestion inmobiliaria.
@endsection

@section('content')

    @include('frontend.pages.home.sections.parallax')
    @include('frontend.pages.home.sections.favoritos')
    @include('frontend.pages.home.sections.destacados')
    @include('frontend.pages.home.sections.servicios')
    @include('frontend.pages.home.sections.grid-prop-agent')
    @include('frontend.pages.home.sections.testimonios')
    @include('frontend.pages.home.sections.contactar')
    @include('frontend.pages.home.sections.sponsors')
    @include('frontend.pages.home.sections.suscripcion')
   
@endsection


@section('modals')

  {{-- modals --}}
    
    @include('frontend.pages.home.modals.contacto')
    @include('frontend.pages.home.modals.services')
@endsection


@push('styles')
<!-- owl-carousel -->
  <link rel="stylesheet" href="vendor/owl-carousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="vendor/owl-carousel/assets/owl.theme.default.min.css">
@endpush

@push('scripts')
<script src="vendor/owl-carousel/owl.carousel.min.js"></script>
<script src="js/owlcarousel2-filter.min.js"></script>


@endpush

@push('load-plugin')

<script>
	(function(){
	
		$('#filter_selection').on('change', function(){
			var filter = $(this).val();
			owl.owlcarousel2_filter( filter );
		})



		var owl = $('#owl_destacados').owlCarousel({
					    loop: false,
					    margin:25,
					    nav: false,
					    dots: false,
					    responsive:{
					        0:{
					            items:1
					        },
					        768:{
					            items:2
					        },
					        992:{
					            items:3
					        }
					    }
					})

				$('.owl-next').on("click", function (e) {
				e.preventDefault();
				owl.trigger('next.owl.carousel');
				});

				$('.owl-prev').on("click", function (e) {
				e.preventDefault();
				owl.trigger('prev.owl.carousel', [300]);
			  	});

	})();
</script>


@endpush
