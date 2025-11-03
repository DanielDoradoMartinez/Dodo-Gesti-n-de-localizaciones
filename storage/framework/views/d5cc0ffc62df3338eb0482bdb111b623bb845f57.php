

<?php $__env->startSection('content'); ?>
<button type="button" class="btn btn-info mb-4 ml-2"id="btnAEs"><i class="fas fa-plus-square" ></i> &nbsp Añadir Espacio</button>
<table id="tablaEspacios" class="table table-hover table-primary w-100">
    <thead>
        <th></th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Aforo</th>
        <th>Localizacion</th>
     
        

    </thead>
    <tbody></tbody>
</table>

    
<?php echo $__env->make('formularioEspacio', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('vistaDetEspacios', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('formularioAHorarios', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Dodo-gestion-de-localizaciones\resources\views/vistaEspacios.blade.php ENDPATH**/ ?>