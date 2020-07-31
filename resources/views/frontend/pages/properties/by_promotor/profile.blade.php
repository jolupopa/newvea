<div class="container mx-3">
    <aside class="t shadow-soft">
       
        <div class="row">
            <div class="col-4">
                <a href="">
                    <img src="/img/users/{{ $profile->url_foto }}" class="img-fluid rounded-circle mt-5">
                </a>
            </div>
            <div class="col-8 d-flex align-items-center">
                <div>
                    <h3 class="text-muted pt-5">{{$profile->full_name }}</h3>
                    <h5 class="text-muted">{{ $profile->title }}</h5> 
                </div>
                
            </div>
                <div class="col-12 py-5 d-flex justify-content-around">
                <a target="_blank" href="">
                    <i class="fab fa-twitter fa-2x"></i>
                </a>
                <a target="_blank" href="">
                    <i class="fab fa-facebook fa-2x"></i>
                </a>
                <a target="_blank" href="">
                    <i class="fab fa-whatsapp fa-2x"></i>
                </a>
                <a taraget="_blank" href="">
                    <i class="fab fa-instagram-square fa-2x"></i>
                </a>       
                </div>

            <div class="col-12 text-muted">
                <h5>
                <span class="mx-3"><i class="fas fa-map-marker-alt mr-1"></i></span>
                <span class="text-capitalize">{{ $profile->location}}</span>
                </h5>

                <h6> <span class="mx-3"><i class="fas fa-map-marker-alt mr-2"></i></span>{{ $profile->address}}
                </h6>

                <h5><span class="mx-3"><i class="far fa-envelope mr-2"></i></span>{{ $profile->email}}
                </h5>
                <h5><span class="mx-3"><i class="fas fa-mobile-alt"></i></span>{{ $profile->phone }}
                </h5>
                <h4 class="text-mutet ml-3 mt-3">Acerca de mi:</h4>  
                <p class="pb-4 ml-5">{{ $profile->about_me }}</p>
            </div>    
        </div>
      
    </aside>
</div>