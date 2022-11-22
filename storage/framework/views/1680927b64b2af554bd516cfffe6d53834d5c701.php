<?php $__env->startSection('content'); ?>
                <div class="card-header text-center">
                    <FONT SIZE=5 style="color:#204F4E"><i class="fa-solid fa-coins fa-fw"></i>Finanzas</font>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-row-reverse" style="margin-bottom:10px;">
                        <a href="<?php echo e(route('finanzas.create')); ?>" class="btn btn-success"><i class="fa-solid fa-plus fa-fw"></i>Registrar</a>

                        <a href="<?php echo e(route('finanzas.historial')); ?>" class="btn btn-info" style="margin-right:5px;"><i class="fa-solid fa-clipboard-list fa-fw"></i>Historial</a>
                    </div>


                    <div class="row">
                        <div class="col-xl-6">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="finanzas">
                            <thead class="text-white" style="background:#358180">
                                <th class="table-th text-white text-center"> Fecha </th>
                                <th class="table-th text-white text-center"> Descripción</th>
                                <th class="table-th text-white text-center"> Total gasto</th>
                                <th class="table-th text-white text-center"> Acciones</th>

                            </thead>
                        </table>
                    </div>


    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('css'); ?>
    <link href='<?php echo e(asset("fullcalendar/bootstrap.css")); ?>' rel='stylesheet' />
    <link href='<?php echo e(asset("fullcalendar/bootstrap.css.map")); ?>' rel='stylesheet' />
    <link href='<?php echo e(asset("css/datatables.css")); ?>' rel='stylesheet' />
    <style>
        td {
            text-align: center;
        }
    </style>
    <?php $__env->stopSection(); ?>


    <?php $__env->startSection('js'); ?>
    <script src='<?php echo e(asset("js/bootstrap.min.js")); ?>'></script>
    <script src='<?php echo e(asset("js/bootstrap.min.js.map")); ?>'></script>
    <script src='<?php echo e(asset("fullcalendar/jquery-3.6.0.js")); ?>'></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>


    <script>
        $('#finanzas').DataTable({
            reponsive: true,
            autoWidth: false,
            processing: true,
            serverSide: true,
            ajax: '/finanzas/listar',
            columns: [{
                    data: 'date',
                    name: 'date'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'TotalGasto',
                    name: 'TotalGasto'
                },
                {
                    data: 'acciones',
                    name: 'acciones',
                    orderable: false,
                    searchable: false
                }



            ],
            "lengthMenu": [
                [5, 10, 50, -1],
                [5, 10, 50, "Todos"]
            ],
            "language": {
                "lengthMenu": "Mostrar _MENU_ Registros por Pagina",
                "zeroRecords": "No se encontro ningun archivo",
                "info": "Mostrando _PAGE_ de _PAGES_ paginas",
                "infoEmpty": "No records available",
                "infoFiltered": "(Filtrado de _MAX_ registros Totales)",
                "search": "Buscar",
                "paginate": {
                    "next": "siguiente",
                    "previous": "Anterior"
                }


            }
        });

        function actualizar() {
            location.reload(true);
        }

        function eliminarFinanza(id) {

            Swal.fire({
                title: "¿Desea eliminar?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#198754',
                cancelButtonColor: '#dc3545',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    let datos = {
                        id,
                    }
                    $.ajax({
                        type: "POST",
                        url: "/finanzas/borrar",
                        data: datos,
                        success: function(data) {
                            if (data == "ok") {
                                setInterval("actualizar()", 800);
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Se eliminó correctamente!',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            };

                        }
                    });
                }

            })

        }
    </script>



    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\LARAVEL SOTECJOR\MQUA\resources\views/finanzas/index.blade.php ENDPATH**/ ?>