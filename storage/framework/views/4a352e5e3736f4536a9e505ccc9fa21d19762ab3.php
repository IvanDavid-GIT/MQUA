<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" style="left: 127px; bottom: 11px;">
                <div class="card-header text-center">
                    <FONT SIZE=5 style="color:#204F4E"><i class="fa-solid fa-sack-dollar fa-fw"></i>Gastos <?php echo e($finanza->date); ?></font>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr style="background: #358180;">
                                        <th class="table-th text-white text-center"> Categoría</th>
                                        <th class="table-th text-white text-center"> Valor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($categoria->nombrecategoria); ?></td>
                                        <td><?php echo e($categoria->ValorGasto); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-center">TOTAL</td>
                                        <td><?php echo e($finanza->TotalGasto); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a class="btn btn-secondary" href="<?php echo e(route('finanzas.index')); ?>"><i class="fas fa-hand-point-left fa-fw"></i>Volver</a>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link href='<?php echo e(asset("fullcalendar/bootstrap.css")); ?>' rel='stylesheet' />
<link href='<?php echo e(asset("fullcalendar/bootstrap.css.map")); ?>' rel='stylesheet' />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
<script src='<?php echo e(asset("js/bootstrap.min.js")); ?>'></script>
<script src='<?php echo e(asset("js/bootstrap.min.js.map")); ?>'></script>
<script src='<?php echo e(asset("fullcalendar/moment.js")); ?>'></script>
<script src='<?php echo e(asset("fullcalendar/moment-timezone-with-data-10-year-range.js")); ?>'></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel-SENA\MasQueUnaAgenda\resources\views/finanzas/detalle.blade.php ENDPATH**/ ?>