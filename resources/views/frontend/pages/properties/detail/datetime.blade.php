<h2 class="text-center pt-5">Elige día y hora para visita:</h2>
              
<form>
<div class="form-row">
    <div class="form-group col-12">
    <label for="dia">El día</label>
    <div class="input-group">
        <div class="input-group-prepend">
        <label class="input-group-text"  for="dia"><i class="far fa-calendar-alt fa-2x text-primary"></i></label>
        </div>
        <input type="date" name="dia" class="datepicker form-control form-control-lg" id="dia">
    </div>
    </div>

    <div class="form-group col-12">
    <label for="hora">La hora</label>
    <div class="input-group">
        <div class="input-group-prepend">
        <label class="input-group-text"  for="hora"><i class="far fa-clock fa-2x text-primary"></i></label>
        </div>
        <input type="time" name="hora" class="timepicker form-control form-control-lg" id="hora" value="12.00.0000">
    </div>
    </div>


</div>
<div class="form-group">
    <label for="coments">Comentario</label>
    <textarea class="form-control form-control-lg" id="coments" rows="5" placeholder="Deja tu comentario ..."></textarea>
</div>	
<button type="submit" class="btn btn-block btn-primary my-5">Reservar visita</button>

</form>