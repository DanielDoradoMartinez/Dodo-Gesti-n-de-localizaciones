<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2><center><i class="fas fa-key"></i><?php echo e(__('Acceso')); ?></center></h2></div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label for="usuario" class="col-sm-4 col-form-label text-md-right"><h3><i class="fas fa-user mr-2"></i><?php echo e(__('Usuario')); ?></h3></label>
                        
                            <div class="col-md-6">
                                <input id="usuario" type="text" class="form-control<?php echo e($errors->has('usuario') ? ' is-invalid' : ''); ?>" name="usuario" value="<?php echo e(old('usuario')); ?>" required autofocus>
                        
                                <?php if($errors->has('usuario')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('usuario')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <br>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><h3><i class="fas fa-lock mr-2"></i><?php echo e(__('Contraseña')); ?></h3></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">

                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <br>
                        <center>
                           
                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <h4>  <i class="fas fa-sign-in-alt"></i> <?php echo e(__('Entrar')); ?> </h4>
                                </button>

                               
                            </div>
                        </div>
                    </center>
               
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Dodo-gestion-de-localizaciones\resources\views/auth/login.blade.php ENDPATH**/ ?>