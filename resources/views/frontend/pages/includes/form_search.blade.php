<form class="form-search">
    <div class="type-searchs">
        <label class="active">
            <input class="first-tab" name="tab" checked="checked" type="radio">
            En venta</label>
        <label><input name="tab" type="radio">En Alquiler</label>
        <div class="search-figure"></div>
    </div>
    <!-- box-search -->
    <div class="box-search">

        <div class="form-row ">
            <div class="col-6 mb-5">
                <label for="prov" class="sr-only">Provincia</label>
                <select class="custom-select" id="prov">
                    <option value="0">Selecciona una Provincia</option>
                </select>
            </div>
            <div class="col-6 mb-5">
                <label for="dist" class="sr-only">Distrito</label>
                <select class="custom-select" id="dist">
                    <option value="0">Selecciona un Distrito</option>
                </select>
            </div>
            <div class="col-6 mb-5">
                <label for="tipo" class="sr-only">Tipo de Inmueble</label>
                <select class="custom-select" id="tipo" name="tipo">
                    <option value="0">Tipo de inmueble</option>
                    @foreach($types as $type)
                    <option  value="{{ $type->id }}">{{ $type->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-6 mb-5">
                <label for="precio" class="sr-only">Precio</label>
                <select class="custom-select" id="precio">
                    <option value="">Precio maximo por mil en $</option>
                    <option>100</option>
                    <option>200</option>
                    <option>300</option>
                    <option>400</option>
                    <option>+500</option>
                </select>
            </div>
            
           
            <div class="col-4">
                <label for="cuartos" class="sr-only">Cuartos</label>
                <select class="custom-select" id="cuartos">
                <option>Cuartos min #</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>+5</option>
                </select>
            </div>

            <div class="col-4">
                <label for="banos" class="sr-only">Baños</label>
                <select class="custom-select" id="banos">
                <option>Baños min #</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>+5</option>
                </select>
            </div>

            <div class="col-4">
                <label for="cochera" class="sr-only">Cocheras</label>
                <select class="custom-select" id="cochera">
                <option>Cohera min #</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>+5</option>
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
                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">Para estrenar</label>
                    </div>

                    <div class="col-auto custom-control custom-checkbox custom-control-inline py-4">
                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                    <label class="custom-control-label" for="customCheck2">Frente a Parque</label>
                    </div>

                    <div class="col-auto custom-control custom-checkbox custom-control-inline py-4">
                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                    <label class="custom-control-label" for="customCheck3">ubicado en esquinar</label>
                    </div>

                    <div class="col-auto custom-control custom-checkbox custom-control-inline py-4">
                    <input type="checkbox" class="custom-control-input" id="customCheck4">
                    <label class="custom-control-label" for="customCheck4">Condominio Privado</label>
                    </div>

                    <div class="col-auto custom-control custom-checkbox custom-control-inline py-4">
                    <input type="checkbox" class="custom-control-input" id="customCheck5">
                    <label class="custom-control-label" for="customCheck5">Amoblado</label>      
                    </div>

                    <div class="col-auto custom-control custom-checkbox custom-control-inline py-4">
                    <input type="checkbox" class="custom-control-input" id="customCheck6">
                    <label class="custom-control-label" for="customCheck6">En Avenida principal</label>      
                    </div>

                    <div class="col-auto custom-control custom-checkbox custom-control-inline py-4">
                    <input type="checkbox" class="custom-control-input" id="customCheck7">
                    <label class="custom-control-label" for="customCheck7">Programa de vivienda</label>      
                    </div>

                    <div class="col-auto custom-control custom-checkbox custom-control-inline py-4">
                    <input type="checkbox" class="custom-control-input" id="customCheck8">
                    <label class="custom-control-label" for="customCheck8">Remate judicial</label>      
                    </div>

                </div>

            </div>
        </div>
        
    </div>
</form>