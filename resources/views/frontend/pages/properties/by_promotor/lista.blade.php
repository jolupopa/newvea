 <h2 class="text-muted text-center my-5">Listado de propiedades</h2>

<div class="row" id="list-type" class="property-th-list">
    @foreach( $properties as $property)
    <div class="card shadow-soft col-12 my-2 list active" >
        <div class="row no-gutters ">
        
            <div class="col-4  c-img">
                <a href="#">
                    <div class="box-label">
                        <span class="{{ $property->operation == 'venta' ? 'label-sale' : 'label-rent' }}">En {{ $property->operation }}</span>
                    </div>
                    <img src="/img/properties/{{$property->url_caratula }}" class="card-img " alt="imagen de {{ $property->title }}">
                </a>
            </div>

            <div class="col-8  c-body d-flex flex-column justify-content-around">
                <div class="card-body ">
                    <h5 class="card-title">{{ $property->title }}</h5>
                    <p class="card-text d-none d-lg-block">{{ $property->resumen }}.</p>
                </div>
                <div class=" text-center mb-3 mb-md-5">
                    <h5><span>{{ $property->city->name }}</span>&nbsp;/&nbsp;<span>{{ $property->zona }}</span></h5>
                    
                </div>
                <div class="border-top py-2  d-flex justify-content-around align-items-end">
                    <span class=""><i class="fas fa-dollar-sign"></i>{{ $property->precio }}</span>
                    <span>{{ $property->area }} <span class="font-weight-bold">m2</span></span>
                    <span>{{ $property->num_cuartos }}<i class="fas fa-bed  "></i></span>
                    <span>{{ $property->bathroon }}<i class="fas fa-bath "></i></span>
                    <span>{{ $property->num_cars }} <i class="fas fa-car "></i></span>
                </div>
            </div>

            <div class="col-12">
                <div class="card-footer bg-white border-top d-flex flex-row justify-content-between">
                    <div class="text-primary text">
                        <a href=""><i class="fas fa-user-edit"></i>
                            <span class="text-muted">{{ $profile->nickname }}</span>
                        </a>
                    </div>
                    <div class=""><i class="far fa-clock mr-2"></i>Publicado hace: {{ $property->published_at }}</div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>   

<!-- paginador -->
<div class="row d-flex justify-content-center">

    {{ $properties->links() }}
</div> 

 {{-- <nav>
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
        </ul>
    </nav> --}}