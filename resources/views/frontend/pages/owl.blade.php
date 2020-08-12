@extends('layouts.app')

@section('meta-title', 'VeaInmuebles')
@section('meta-description')
VeaInmuebles es una pagiana de gestion inmobiliaria.
@endsection

@section('content')

    @include('frontend.pages.home.sections.parallax')
    @include('frontend.pages.home.sections.favoritos')
   {{-- destacados con filter --}}
	 <section id="destacados" class="container pb-5 mb-5">

  <div class="row mt-0 pt-0">
    <div class="col-12 text-center">
      <h2 class="h1 text-muted">DESTACADOS</h2>
    </div>
		<!-- select filter  -->
		<div class="col-6 col-md-3 mb-3">
			<form>      
				<label for="tipo_features" class="sr-only">Inmuebles detacados</label>
				<select class="custom-select" id="filter_tipo_features" name="tipo_features">
						<option value="0">Todos los inmueble</option>
						@foreach($types as $type)
						<option  value="{{ $type->id }}">{{ $type->name}}</option>
						@endforeach
				</select>
			</form>
		</div>

    
		<div class=" offset-3 offset-md-6 col-2 d-flex justify-content-around text-primary">   
      <span class="owl-prev mr-5"><i class="fas fa-caret-left fa-3x"></i></span>
      <span class="owl-next mr-5"><i class="fas fa-caret-right fa-3x"></i></span>
    </div>
  </div>

  <div id="divmsg" class="alert alert-danger d-none" role="alert">
    Tipo de inmueble no esta dentro de los destacados!
  </div>

  <div id="owl-features" class="owl-carousel owl-theme owl-loaded mt-3">
    <div class="owl-stage-outer">
      <div class="owl-stage">
        @foreach($properties as $property)
        <div class="card owl-item {{ $property->type_property->id}}" style="width: 370px;">
          <div class="box-label">
            <span class="{{ $property->operation == 'venta' ? 'label-sale' : 'label-rent' }}">{{ $property->operation}}</span>
          </div>
          <a href="#" class="favorite"> <i class="far fa-heart text-white"></i> </a>
            <img src="img/properties/{{ $property->url_caratula }}" class="img-fluid"  width="640px" alt="Foto de inmueble">
          <div class="card-body bg-contenedor">
            <a href="{{ route('properties.show', $property->id )}}">
              <p class="text-muted h4">{{ $property->title }}</p>
            </a> 
            <h5 class="d-flex ">  
              <span class="text-muted"><i class="fa fa-map-marker"></i>  {{ $property->city->name }}</span>
              <span class="ml-auto badge badge-secondary">{{ $property->type_property->name}}</span>
            </h5>
            <div class="py-3 border-top d-flex justify-content-around align-items-end">
              <span class=""><i class="fas fa-dollar-sign mr-1"></i>{{ $property->precio }}</span>
              <span>{{ $property->area }} <span class="font-weight-bold">m2</span></span>
              <span>{{ $property->num_cuartos }} <i class="fas fa-bed  "></i></span>
              <span>{{ $property->bathroon }} <i class="fas fa-bath "></i></span>
              <span>{{ $property->num_cars}} <i class="fas fa-car "></i></span>
            </div>
            <div class="pt-3 border-top d-flex justify-content-between">
              <a href="#" class="card-link"><i class="fas fa-user-edit"></i>
                <span class="text-muted">{{ $property->profile->nickname }}</span></a>
              <span class=""><i class="far fa-clock mr-2"></i>{{ $property->published_at }}</span>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>
  <div id="owl-hidden"></div>
</section>
   
   
@endsection





@push('styles')
<!-- owl-carousel -->
  <link rel="stylesheet" href="vendor/owl-carousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="vendor/owl-carousel/assets/owl.theme.default.min.css">
@endpush

@push('scripts')
<script src="vendor/owl-carousel/owl.carousel.min.js"></script>
@endpush

@push('load-plugin')
<script>
(function(){ 
   cat = $('#filter_tipo_features').on('change', function(){
    cat = $(this).val();
     showProjectsbyCat( cat );
  });
 
})();

function showProjectsbyCat( cat ){
  if ( cat == '0'){
    $('#owl-hidden .owl-item').each(function(){
       var owl   = $(".owl-carousel").data('owlCarousel');
       elem      = $(this).parent().html();

       owl.addItem( elem );
       $(this).parent().remove();
    });
  }else{
    $('#owl-hidden .owl-item.'+ cat).each(function(){
       var owl   = $(".owl-carousel").data('owlCarousel');
       elem      = $(this).parent().html();

       owl.addItem( elem );
       $(this).parent().remove();
    });

    $('#owl-features .owl-item:not(.owl-item.'+ cat + ')').each(function(){
       var owl   = $(".owl-carousel").data('owlCarousel');
       targetPos = $(this).parent().index();
       elem      = $(this).parent();

       $( elem ).clone().appendTo( $('#owl-hidden') );
       owl.removeItem(targetPos);
    });
  }
}

</script>
@endpush
