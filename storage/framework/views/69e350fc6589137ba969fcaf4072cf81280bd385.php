
<div class="container">

<div class="modal" tabindex="-1" role="dialog" id="modalLoc">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Crear Localización</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
      <form class="form" id="formularioLoc" nombre="formularioLoc">
       
      
          <div class="card-body">
            <div class="form-group row">
              
              <!-- nombre-->
              <div class="form-group "style="margin-right: 50px">
                <label>Nombre <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="nombreLoc" name="nombre" value=""  />
              </div>
             
              <!--direccion-->
              <div class="form-group" style="margin-right: 50px">
                <label >Dirección<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="direccionLoc" name="direccion" >
              </div>

           
      </div>

      


      




      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Aceptar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Cancelar</button>
      </div>
    </form>
    </div>
  </div>
</div>
</div><?php /**PATH C:\laragon\www\Dodo-gestion-de-localizaciones\resources\views/formularioLocalizacion.blade.php ENDPATH**/ ?>