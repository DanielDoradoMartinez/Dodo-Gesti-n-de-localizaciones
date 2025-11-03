<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php if(  auth()->user()->admin ==1): ?>
                
          
            <div class="card">
                <div class="card-header"><h1><center><?php echo e(__('Menu Principal')); ?></h1></center></div>

                <div class="card-body">
                    <h2>  <a href="<?php echo e(route('reservas')); ?>" class="badge badge-primary col align-self-center">Reservas</a></h2>                  
                    <h2>  <a href="<?php echo e(route('localizaciones')); ?>" class="badge badge-primary col align-self-center">Localizaciones</a></h2>
                    <h2>  <a href="<?php echo e(route('espacios')); ?>" class="badge badge-primary col align-self-center">Espacios</a></h2>
                    <h2>  <a href="<?php echo e(route('usuarios')); ?>" class="badge badge-primary col align-self-center">Usuarios</a></h2>
               
                </div>
            </div>
            <?php endif; ?>
            <?php if(  auth()->user()->admin ==0): ?>
            <center>
            <h1><i class="fas fa-sad-tear"></i>Acceso denegado<i class="fas fa-sad-tear"></i></h1>
         <img src="/pocoyo.png" class="img-fluid" alt="Responsive image"> </center>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Dodo-gestion-de-localizaciones\resources\views/home.blade.php ENDPATH**/ ?>