
<div class="container">

    <div class="modal" tabindex="-1" role="dialog" id="modalEs">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Añadir Espacio</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="modal-body">
          <form class="form" id="formularioEs" nombre="formulario">
        
          
              <div class="card-body">
                <div class="form-group row">
                  
             
                  <!--nombre-->
                  <div class="form-group" style="margin-right: 50px">
                    <label >Nombre<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nombreFE" name="nombre" >
                  </div>
                </div>
                  <div class="form-group row">
                  <!--descripcion-->
                  <div class="form-group" style="margin-right: 50px">
                    <label >Descripción<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="descripcionFE"name="descripcion" >
                  </div>
                </div>
                 <div class="form-group row">
                    <!--aforo-->
                 <div class="form-group" style="margin-right: 50px">
                 <label >Aforo<span class="text-danger">*</span></label>
                 <input type="text" class="form-control" id="aforoFE" name="aforo"value="">
                 </div>
                </div>
                
                 <div class="form-group row">
                <!--categoria-->
               <div class="form-group" style="margin-right: 50px">
               <label >Localizacion <span class="text-danger">*</span></label>
               <select class="form-control" id="localizacionesFE" name="idLocalizaciones">
              
               </select>
               </div>
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
    </div>