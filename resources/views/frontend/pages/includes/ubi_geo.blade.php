
<div class="form-row ml-3 text-center">
    <div class="form-group col-4">
        <label for="depa">Departamentos</label>
        <select name="depa" id="depa" class="form-control form-control-lg @error('depa') is-invalid @enderror">
            <option value="0">Seleccione</option>
            @foreach($departamentos as $depa)
            <option value="{{ $depa->id}}">{{ $depa->name }}</option>
            @endforeach
        </select>
            @error('depa')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>
    <div class="form-group col-4">
        <label for="prov">Provincias</label>
        <select name="prov" id="prov" class="form-control form-control-lg @error('prov') is-invalid @enderror">
        <option value="0">Seleccione</option>
        </select>
            @error('prov')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>
    <div class="form-group col-4">
        <label for="dist">Distritos</label>
        <select name="dist" id="dist" class="form-control form-control-lg @error('dist') is-invalid @enderror">
            <option value="0">Seleccione</option>
        </select>
            @error('dist')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>
</div>
            