<form class="form-search" action="{{ route('search.index')}}" method="GET">
    <div class="type-searchs">
        <label class="active">
            <input class="first-tab" name="tab" checked="checked" type="radio" value="venta">
            En venta</label>
        <label><input name="tab" type="radio" value="alquiler">En Alquiler</label>
        <div class="search-figure"></div>
    </div>
    <!-- box-search -->
    <div class="box-search">
        <div class="text-center"> 
           
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio"   name="options" id="radios2" value="ubigeo" checked>
                <label class="form-check-label" for="radios2">
                  Buscar por selección geográfica
                </label>
            </div>
            <div class="form-check  form-check-inline mt-4">
                <input class="form-check-input" type="radio"  
                name="options" id="radios1" value="texto" >
                <label class="form-check-label" for="radios1">
                  Buscar por palabra  [zona, distrito, provincia, departamento]
                </label>
            </div>

            <div id="option1" class="option my-3" style="display: none;">
                <label> Ingrese la palabra de ubicación</label>
                <input type="text" class="form-control " id="search_text" name="palabra" placeholder="Ubicación">
                <input type="hidden" id="_zona" name="_zona" value="">
                <input type="hidden" id="_distrito_id" name="_distrito_id" value="">
            </div>       
            <div id="option2" class="option mt-3 mb-1" >
            @include('frontend.pages.includes.ubi_geo')
            </div>

        </div>


        <div class="form-row ">
            
           


            <div class="col-6 mb-3">
                <label for="tipo" class="text-center">Tipo de Inmueble</label>
                <select class="custom-select" id="tipo" name="tipo">
                    <option value="0">Seleccione</option>
                    @foreach($types as $type)
                    <option  value="{{ $type->id }}">{{ $type->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-6 mb-3">
                <label for="precio" class="text-center">Precio máximo a pagar</label>
                <select class="custom-select" id="precio" name="precio">
                    <option value="">Precio en Soles</option>
                    <option value="{{ 100000 }}" >100,000</option>
                    <option value="{{ 200000 }}" >200,000</option>
                    <option value="{{ 300000 }}" >300,000</option>
                    <option value="{{ 400000 }}" >400,000</option>
                    <option value="{{ 500000 }}" >500,000</option>
                    <option value="{{ 600000 }}" >600,000</option>
                    <option value="{{ 700000 }}" >700,000</option>
                    <option value="{{ 800000 }}" >800,000</option>
                    <option value="{{ 900000 }}" >900,000</option>
                    <option value="{{1000000 }}" >1'000,000</option>
                    <option value="{{10000000 }}" >10'000,000</option>
                </select>
            </div>
            
           
            <div class="col-4">
                <label for="cuartos" class="text-center">Cuartos</label>
                <select class="custom-select" id="cuartos" name="cuartos" >
                <option value="">Opcional</option>
                <option value="{{ 1 }}">1</option>
                <option value="{{ 2 }}">2</option>
                <option value="{{ 3 }}">3</option>
                <option value="{{ 4 }}">4</option>
                <option value="{{ 5 }}">5</option>
                </select>
            </div>

            <div class="col-4">
                <label for="banos" class="text-center">Baños</label>
                <select class="custom-select" id="banos" name="banos">
                <option value="" >Opcional</option>
                <option value="{{ 1 }}">1</option>
                <option value="{{ 2 }}">2</option>
                <option value="{{ 3 }}">3</option>
                <option value="{{ 4 }}">4</option>
                <option value="{{ 5 }}">5</option>
                </select>
            </div>

            <div class="col-4">
                <label for="cochera" class="text-center">Garaje</label>
                <select class="custom-select" id="cochera" name="garaje">
                <option value="">Opcional</option>
                <option value="{{ 1 }}">1</option>
                <option value="{{ 2 }}">2</option>
                <option value="{{ 3 }}">3</option>
                <option value="{{ 4 }}">4</option>
                <option value="{{ 5 }}">5</option>
                </select>
            </div>
            

        </div>
        

        <div class="row my-5  align-items-center">
            <div class="col-6">
                <a href="#" class="more-less-trigger" data-open-title="Mas opciones" data-close-title="Cerrar"></a>
            </div>
            <div class="col-6 text-lg-right">
                <button type="submit" class="btn btn-lg btn-block btn-primary">Buscar</button>
            </div>
        </div>

        <!-- More Options -->
        <div class="more-options col-12">
            <div class="more-options-container form-row mx-0">

                

                <div class="row justify-content-between flex-fill">
                    <div class="col-auto custom-control custom-checkbox custom-control-inline py-4">
                    <input type="checkbox" class="custom-control-input" id="customCheck1" name="b_estreno">
                    <label class="custom-control-label" for="customCheck1">Para estrenar</label>
                    </div>

                    <div class="col-auto custom-control custom-checkbox custom-control-inline py-4">
                    <input type="checkbox" class="custom-control-input" id="customCheck2" name="b_parque">
                    <label class="custom-control-label" for="customCheck2">Frente a Parque</label>
                    </div>

                    <div class="col-auto custom-control custom-checkbox custom-control-inline py-4">
                    <input type="checkbox" class="custom-control-input" id="customCheck3" name="b_esquina">
                    <label class="custom-control-label" for="customCheck3">ubicado en esquina</label>
                    </div>

                    <div class="col-auto custom-control custom-checkbox custom-control-inline py-4">
                    <input type="checkbox" class="custom-control-input" id="customCheck4" name="b_condo_privado">
                    <label class="custom-control-label" for="customCheck4">Condominio Privado</label>
                    </div>

                    <div class="col-auto custom-control custom-checkbox custom-control-inline py-4">
                    <input type="checkbox" class="custom-control-input" id="customCheck5" name="b_amoblado">
                    <label class="custom-control-label" for="customCheck5">Amoblado</label>      
                    </div>

                    <div class="col-auto custom-control custom-checkbox custom-control-inline py-4">
                    <input type="checkbox" class="custom-control-input" id="customCheck6" name="b_avenida">
                    <label class="custom-control-label" for="customCheck6">En Avenida principal</label>      
                    </div>

                    <div class="col-auto custom-control custom-checkbox custom-control-inline py-4">
                    <input type="checkbox" class="custom-control-input" id="customCheck7" name="b_prog_vivienda">
                    <label class="custom-control-label" for="customCheck7">Programa de vivienda</label>      
                    </div>

                    <div class="col-auto custom-control custom-checkbox custom-control-inline py-4">
                    <input type="checkbox" class="custom-control-input" id="customCheck8" name="b_remate">
                    <label class="custom-control-label" for="customCheck8">Remate judicial</label>      
                    </div>

                </div>

            </div>
        </div>
        
    </div>
</form>