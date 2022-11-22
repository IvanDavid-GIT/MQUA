<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" style="left: 127px; bottom: 11px;">
                <div class="card-header text-center">
                    <FONT SIZE=5 style="color:#204F4E"><i class="fa-solid fa-cart-plus fa-fw"></i>Registrar gastos</font>
                </div>
                <div class="text-center">
                    <FONT SIZE=2 style="color:red">*</FONT>
                    <FONT SIZE=2 style="color:#358180">Campos requeridos</FONT>
                </div>
                <div class="card-body" style="margin-top: -25px;">

                    <form action="<?php echo e(route('finanzas.store')); ?>" method="POST" style="text-align:center">
                        <?php echo csrf_field(); ?>
                        <div class="card-body">
                            <div class="row">
                                <div class=" col-2">
                                    <label for="date">Fecha</label>
                                    <input type="date" class="form-control" id="date" name="date" value="<?php echo date("Y-m-d"); ?>">

                                </div>
                                <div class="col-10">
                                    <label for="description">Descripción</label>
                                    <textarea class="form-control" id="description" name="description" maxlength="200"><?php echo e(old('Descripcion')); ?></textarea>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <span style="color:red">*</span>
                                    <label>Categoría</label>
                                    <select name="IdCategoria" class="form-select" id="IdCategoria">
                                        <option value="">Seleccione categoría</option>
                                        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($categoria->id); ?>" <?php echo e(old('IdCategoria') == $categoria->id ? 'selected' : ''); ?>><?php echo e($categoria->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="col-4">
                                    <span style="color:red">*</span>
                                    <label for="ValorGasto">Valor</label>
                                    <input type="number" class="form-control" name="ValorGasto" id="ValorGasto" onKeyPress="if(this.value.length==12) return false;">

                                </div>
                                <div class="col-4">
                                    <label for="TotalGasto">Total</label>
                                    <input type="text" readonly class="form-control " name="TotalGasto" id="TotalGasto">

                                </div>
                                <div class="row">
                                    <div class="col-4 text-center" style="margin: auto; margin-top: 25px;">
                                        <button onclick="agregar_gasto()" type="button" class="btn btn-info"><i class="fa-solid fa-plus fa-fw"></i>Agregar</button>
                                    </div>
                                </div>

                            </div>
                            </br>
                            </br>

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped " id="finanzas">
                                    <thead class="text-white" style="background:#358180">
                                        <th class="table-th text-white text-center"> Categoría</th>
                                        <th class="table-th text-white text-center"> Valor</th>
                                        <th class="table-th text-white text-center"> Acciones</th>
                                    </thead>

                                    <tbody id="tblGastos">

                                    </tbody>
                                </table>

                            </div>




                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk fa-fw"></i>Guardar</button>
                            <a class="btn btn-secondary" href="<?php echo e(route('finanzas.index')); ?>"><i class="fas fa-hand-point-left fa-fw"></i>Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link href='<?php echo e(asset("fullcalendar/bootstrap.css")); ?>' rel='stylesheet' />
<link href='<?php echo e(asset("fullcalendar/bootstrap.css.map")); ?>' rel='stylesheet' />
<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
<script src='<?php echo e(asset("js/bootstrap.min.js")); ?>'></script>
<script src='<?php echo e(asset("js/bootstrap.min.js.map")); ?>'></script>
<script>
    let gastos = [];

    function agregar_gasto() {
        let categoria = $("#IdCategoria option:selected").val();
        let categoria_text = $("#IdCategoria option:selected").text();
        let valor = $("#ValorGasto").val();
        let TotalGasto = $("#TotalGasto").val() || 0;

        if (valor > 0 && categoria != "") {
            let g = gastos.findIndex(item => item.categoria == categoria);
            if (g == -1) {
                gastos.push({
                    categoria,
                    categoria_text,
                    valor,
                })

                $("#TotalGasto").val(parseInt(TotalGasto) + parseInt(valor));

            } else {
                $("#TotalGasto").val(parseInt(TotalGasto) + parseInt(valor));
                gastos[g].valor = parseInt(gastos[g].valor) + parseInt(valor);
            }

            listar();

        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Los campos categoría y valor no pueden estar vacios!'
            })
        }

    }

    function listar() {
        $("#tblGastos").html('')
        gastos.map(item => {
            $("#tblGastos").append(`

                <tr id="tr-${item.categoria}">
                <td>
                    <input type="hidden" name="IdCategoria[]" value="${item.categoria}" />
                    <input type="hidden" name="ValorGasto[]" value="${item.valor}" />
                    ${item.categoria_text}
                </td>
                <td>
                    ${item.valor}
                </td>
                <td>
                    <button type="button" class="btn btn-danger" onclick="eliminar_gasto(${item.categoria},${item.valor})">X</button>
                </td>
                </tr>
            `)
        })

    }

    function eliminar_gasto(id, valor) {
        event.preventDefault();
        Swal.fire({
            title: "¿Desea eliminar?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                let g = gastos.findIndex(item => item.categoria == id);
                gastos.splice(g, 1);
                let TotalGasto = $("#TotalGasto").val() || 0;
                $("#TotalGasto").val(parseInt(TotalGasto) - valor);
                listar();
            }



        })

    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel-SENA\MasQueUnaAgenda\resources\views/finanzas/create.blade.php ENDPATH**/ ?>