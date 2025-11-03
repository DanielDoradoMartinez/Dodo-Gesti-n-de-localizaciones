<div class="container">
  <div class="modal" tabindex="-1" role="dialog" id="modalHorarios">
      <div class="modal-dialog modal-dialog-centered modal-xs" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Añadir Horario</h5>
        
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">

                  <form class="form" id="formularioH" name="formularioH">
                  <!--Hora inicio-->
                  <label for="startTime">Hora inicio : </label>
                  <input type="time" id="HIH"name="HI" step="900" value="00:00">
                  <!--Hora fin-->
                  <label for="startTime">Hora fin : </label>
                  <input type="time" id="HFH"name="HF" step="900" value="01:00">

                  <!--Dia semana-->
                  <div class="form-group" style="margin-right: 50px">
                    <label >Dia semana <span class="text-danger">*</span></label>
                    <select class="form-control" id="diaSH" name="diaS">
                      <option value="L">Lunes</option>
                      <option value="M">Martes</option>
                      <option value="X">Miércoles</option>
                      <option value="J">Jueves</option>
                      <option value="V">Viernes</option>
                      <option value="S">Sábado</option>
                      <option value="D">Domingo</option>
                    
                    </select>
                  <!--Duracion-->
                
                    <div class="form-group" style="margin-right: 50px">
                      <label >Intervalo(minutos) <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="duracionH" name="duracion" value="60" >
                    </div>
                  </div>
                  <input id="idEsH" name="idEs" type="hidden" value="">
                  <input id="idH" name="idH" type="hidden" value="">
              </div>
               <div class="modal-footer">
              <button type="submit" class="btn btn-primary ">Crear</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal" >Cerrar</button>
               </form>
              </div>
          </div>
      </div>
  </div>
</div><?php /**PATH C:\laragon\www\Dodo-gestion-de-localizaciones\resources\views/formularioAHorarios.blade.php ENDPATH**/ ?>