<div id="slider-swiper">
    <div class="container"> 
            <!-- Swiper -->
         
        <div id="gallery-top"  class="swiper-container gallery-top">
            <div class="swiper-wrapper">
                
                @foreach($property->photos as $photo) 
                    <div class="swiper-slide" style="background-image:url(/storage/properties/{{ $photo->url}})"></div> 
                @endforeach     
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next swiper-button-white"></div>
            <div class="swiper-button-prev swiper-button-white"></div>
            

        </div>

        <div id="gallery-thum" class="swiper-container-thumb gallery-thumbs">
            <div class="swiper-wrapper">
                

                 @foreach($property->photos as $thumb)
                    <div class="swiper-slide" style="background-image:url(/storage/properties/{{ $thumb->url }}"></div>
                 @endforeach
                
            </div>
        </div>
    </div>
</div>