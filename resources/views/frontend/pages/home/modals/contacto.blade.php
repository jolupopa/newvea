
<!-- Modal Contacto -->
<div class="modal fade" id="modalContacto" tabindex="-1" role="dialog"     aria-labelledby="modalContactoLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content bg-secundary">
      <div class="modal-header">
        <h5 class="modal-title" id="modalContactoLabel">Con la siguiente información te brindaremos un servicio más eficiente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="text-white" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-row">
            <div class="form-group col-sm-4">
              <label for="inputName">Tus Nombres y Apellidos</label>
              <input type="text" class="form-control" id="inputName" placeholder="Nombre y Apellidos">
            </div>
            <div class="form-group col-sm-4">
              <label for="inputEmail">Tu Correo</label>
              <input type="email" class="form-control" id="inputEmail" placeholder="nombre@ejemplo.com">
            </div>
            <div class="form-group col-sm-4">
              <label for="inputPhone">Danos un número de Telefono</label>
              <input type="text" class="form-control" id="inputPhone" placeholder="Nro Telefono">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-sm-6">
              <div>
                <label class="d-block">Que Operación deseas realizar ?</label>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="radio-alquiler" name="operacion" class="custom-control-input">
                  <label class="custom-control-label" for="radio-alquiler">Alquilar</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="radio-comprar" name="operacion" class="custom-control-input">
                  <label class="custom-control-label" for="radio-comprar">Comprar</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="radio-vender" name="operacion" class="custom-control-input">
                  <label class="custom-control-label" for="radio-vender">Vender</label>
                </div>

              </div>
            </div>
            <div class="form-group col-sm-6">
              <label for="inputProperty">Elige el tipo de Inmueble</label>
              <select id="inputProperty" class="form-control">
                <option selected>Elige...</option>
                <option>Casa</option>
                <option>Casa de Playa</option>
                <option>Departamento</option>
                <option>Oficina</option>
                <option>Local Comercial</option>
                <option>Local Industrial</option>
                <option>Terreno Urbano</option>
                <option>Terreno Agricola</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-sm-6">
              <label for="inputCity">En que Ciudad:</label>
              <input type="text" class="form-control" id="inputCity" placeholder="Ciudad">
            </div>
            <div class="form-group col-sm-6">
              <label for="inputZone">Zona:</label>
              <input type="text" class="form-control" id="inputZone" placeholder="Zona">
            </div>
          </div>
          <div class="form-group">
            <label for="textArea">Expresa algun detalle relevante ó alguna información adicional del inmueble en tu
              Comentario</label>
            <textarea class="form-control" id="textArea" rows="3"
              placeholder="Escribe tu comentario aca ..."></textarea>
          </div>
          <div class="form-group">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="captcha">
              <label class="custom-control-label" for="captcha">Acepto me contactem</label>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-lg btn-primary">Enviar</button>
        </form>
      </div>
    </div>
  </div>
</div>
