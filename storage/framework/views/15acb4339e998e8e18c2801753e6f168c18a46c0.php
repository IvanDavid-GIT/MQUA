<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card-group d-block d-md-flex row">
                <div class="card col-md-7 p-4 mb-0">
                    <div class="card-body">
                        <h2>MÁS QUE UNA AGENDA</h2>
                        <p class="text-medium-emphasis">Acceda a su cuenta</p>
                        <form method="POST" action="<?php echo e(route('login')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="input-group mb-3"><span class="input-group-text">
                                    <i class="fa-solid fa-envelope"></i></span>
                                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" autocomplete="email" autofocus placeholder="Correo electrónico">
                                <?php $__errorArgs = ['email'];
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
                            <div class="input-group mb-4"><span class="input-group-text">
                                    <i class="fa-solid fa-key"></i></span>
                                <input id="txtPassword" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" autocomplete="current-password" placeholder="Contraseña">
                                <div class="input-group-append">
                                    <button id="show_password" class="btn btn" type="button" onclick="mostrarPassword()" style="background-color:#2eb85c;"> <span class="fa fa-eye-slash icon" style="color:white"></span> </button>
                                </div>
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
                            <div class="row">
                                <div class="col-6">
                                    <button class="btn btn-success px-4" type="submit">Iniciar sesión</button>
                                </div>
                                <div class="col-6 text-end">
                                    <?php if(Route::has('password.request')): ?>
                                    <a class="btn btn-link px-0" href="<?php echo e(route('password.request')); ?>">Olvidé mi contraseña</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="card col-md-5 text-white bg-success py-5">
                    <div class="card-body text-center">
                        <div class="text-center ">
                            <h3>¿No tienes una cuenta?</h3>
                            <a class="btn btn-lg btn-outline-light mt-3" href="/Register">Regístrate!</a>
                        </div>
                        <div class="" style="margin-top: 10px;">
                            <a>
                                <img src="https://i.ibb.co/FV62zcp/Logo-MQUA.png" width="80" height="80" alt="Logo-MQUA">
                            </a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\LARAVEL SOTECJOR\MQUA\resources\views/auth/login.blade.php ENDPATH**/ ?>