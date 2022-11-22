<?php $__env->startSection('content'); ?>
                <div class="card-header text-center">
                    <FONT SIZE=5 style="color:#204F4E"><i class="fa-solid fa-clipboard-list fa-fw"></i>Historial</font>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <form action="<?php echo e(route('finanzas.historial')); ?>" method="POST" style="text-align:center">
                                <?php echo csrf_field(); ?>
                                <div class="card-body">
                                    <div class="row">
                                        <div class=" col-3">
                                            <label for="startDate">Fecha inicial</label>
                                            <input type="date" class="form-control " id="startDate" name="startDate" value="<?php echo date("Y-m-d"); ?>">

                                        </div>
                                        <div class=" col-3">
                                            <label for="endDate">Fecha final</label>
                                            <input type="date" class="form-control " id="endDate" name="endDate" value="<?php echo date("Y-m-d"); ?>">

                                        </div>
                                        <div class="col-3">
                                            <label>Categoría</label>
                                            <select name="IdCategoria" class="form-select" id="IdCategoria">
                                                <option value="">Seleccione categoría</option>
                                                <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($categoria->id); ?>" <?php echo e(old('IdCategoria') == $categoria->id ? 'selected' : ''); ?>><?php echo e($categoria->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="text-center col-3" style="margin-top:23px ;">
                                            <button type="submit" class="btn btn-info"><i class="fa-solid fa-search fa-fw"></i>Filtrar</button>
                                        </div>
                            </form>


                        </div>

                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead">
                            <tr>

                                <th>Categoría</th>
                                <th>Valor</th>
                                <th>Fecha</th>
                                <th>Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $finanzas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>

                                <td><?php echo e($value->name); ?></td>
                                <td><?php echo e($value->ValorGasto); ?></td>
                                <td><?php echo e($value->date); ?></td>
                                <td><button type="button" class="btn btn-info" onclick="add('<?php echo e($value->description); ?>');"><i class="fa-solid fa-eye fa-sm"></i></button></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>





                <div class="text-center">
                    <a class="btn btn-secondary" href="<?php echo e(route('finanzas.index')); ?>"><i class="fas fa-hand-point-left fa-fw"></i>Volver</a>
                </div>
                <!-- MODAL VER DESCRIPTION-->

                <div class="modal fade" id="descriptionModal" name="descriptionModal" tabindex="-1" data-bs-backdrop="static">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Descripción</h5>


                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                            </div>
                            <div class="modal-body">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="description" id="description" cols="30" rows="6" readonly></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- MODAL VER DESCRIPTION END-->

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

<script>
    function add(description) {

        $("#description").val(description);

        $("#descriptionModal").modal("show");

    }
</script>
<script>
    $(document).ready(function() {
            $("select").select2();
        });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\LARAVEL SOTECJOR\MQUA\resources\views/finanzas/historial.blade.php ENDPATH**/ ?>