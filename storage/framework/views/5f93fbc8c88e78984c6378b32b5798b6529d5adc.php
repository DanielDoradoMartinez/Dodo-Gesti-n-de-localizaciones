

<?php $__env->startSection('content'); ?>
<button type="button" class="btn btn-info mb-4 ml-2"id="btnALoc"><i class="fas fa-plus-square" ></i> &nbsp Añadir Localización</button>
<table id="tablaLocalizaciones" class="table table-hover table-info w-100">
    <thead>
        <th></th>
        <th>Nombre</th>
        <th>Direccion</th>
   
        

    </thead>
    <tbody></tbody>
</table>

<?php echo $__env->make('formularioLocalizacion', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Dodo-gestion-de-localizaciones\resources\views/vistaLocalizaciones.blade.php ENDPATH**/ ?>