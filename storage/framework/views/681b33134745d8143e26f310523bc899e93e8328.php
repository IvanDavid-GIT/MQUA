<?php $__env->startSection('content'); ?>

                <div class="card-body">
                    <div class="notes" id="app">

                    </div>
                </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link href='<?php echo e(asset("fullcalendar/bootstrap.css")); ?>' rel='stylesheet' />
<link href='<?php echo e(asset("fullcalendar/bootstrap.css.map")); ?>' rel='stylesheet' />
<link href='<?php echo e(asset("css/mainNotas.css")); ?>' rel='stylesheet' />
<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
<script src='<?php echo e(asset("js/bootstrap.min.js")); ?>'></script>
<script src='<?php echo e(asset("js/bootstrap.min.js.map")); ?>'></script>
<script src='<?php echo e(asset("js/mainNotas.js")); ?>' type="module"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\LARAVEL SOTECJOR\MQUA\resources\views/notas/index.blade.php ENDPATH**/ ?>