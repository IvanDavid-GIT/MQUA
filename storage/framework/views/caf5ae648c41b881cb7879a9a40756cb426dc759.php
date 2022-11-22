<?php $__env->startSection('content'); ?>

<div class="card-body" id="calendar">
    <div id="calendar">

    </div>
</div>

<!-- day click dialog añadir-->

<div class="modal fade" id="agenda_modal" name="agenda_modal" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleEvent" name="titleEvent"></h5>


                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="text-center">
                <FONT SIZE=2 style="color:red">*</FONT>
                <FONT SIZE=2 style="color:#358180">Campos obligatorios</FONT>
            </div>
            <div class="modal-body" style="margin-top: -25px;">
                <form id="agenda_form" action="">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <span style="color:red">*</span>
                                <label for="title">Título</label>
                                <input type="text" id="id" name="id" hidden readonly>
                                <input type="text" id="user_id" name="user_id" value="<?php echo e(Auth::user()->id); ?>" hidden readonly>
                                <input type="text" class="form-control" id="title" name="title" value="<?php echo e(old('title')); ?>" maxlength="200">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">

                                <label for="date">Fecha inicial</label>
                                <input type="date" class="form-control" id="date" name="date" value="<?php echo e(old('date')); ?>">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                <span style="color:red">*</span>
                                <label for="start_time">Hora inicial</label>
                                <input type="text" class="form-control" id="start_time" value="<?php echo e(old('start_time')); ?>" name="start_time" placeholder="00:00" readonly>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">

                                <label for="end_date">Fecha final</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" value="<?php echo e(old('end_date')); ?>">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                <span style="color:red">*</span>
                                <label for="end_time">Hora final</label>
                                <input type="text" class="form-control" id="end_time" value="<?php echo e(old('end_time')); ?>" name="end_time" placeholder="00:00" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <textarea class="form-control" maxlength="500" name="description" value="<?php echo e(old('description')); ?>" id="description" cols="30" rows="6"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <span style="color:red">*</span>
                                <label for="background_color">Color de fondo</label>
                                <input type="color" name="background_color" id="background_color" value="#2EB85C" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <span style="color:red">*</span>
                                <label for="text_color">Color de texto</label>
                                <input type="color" name="text_color" id="text_color" value="#000000" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" id="btnEliminar" class="btn btn-secondary">Eliminar</button>
                <button type="button" id="btnModificar" class="btn btn-success">Modificar</button>
                <button type="button" id="btnGuardar" class="btn btn-success">Guardar</button>

            </div>
        </div>
    </div>
</div>
<!-- day click dialog end añadir-->



<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link href='<?php echo e(asset("fullcalendar/bootstrap.css")); ?>' rel='stylesheet' />
<link href='<?php echo e(asset("fullcalendar/bootstrap.css.map")); ?>' rel='stylesheet' />
<link href='<?php echo e(asset("fullcalendar/main.css")); ?>' rel='stylesheet' />
<link href='<?php echo e(asset("fullcalendar/clockpicker.css")); ?>' rel='stylesheet' />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src='<?php echo e(asset("js/bootstrap.min.js")); ?>'></script>
<script src='<?php echo e(asset("js/bootstrap.min.js.map")); ?>'></script>
<script src='<?php echo e(asset("fullcalendar/main.js")); ?>'></script>
<script src='<?php echo e(asset("fullcalendar/locales/es.js")); ?>'></script>
<script src='<?php echo e(asset("fullcalendar/clockpicker.js")); ?>'></script>
<script src='<?php echo e(asset("fullcalendar/moment.js")); ?>'></script>
<script src='<?php echo e(asset("fullcalendar/moment-timezone-with-data-10-year-range.js")); ?>'></script>



<script type="text/javascript">
    $('.clockpicker').clockpicker();
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let formulario = document.querySelector("#agenda_form");

        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'es',
            displayEventTime: false,
            navLinks: true,
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            eventSources: {
                url: baseURL + "/agenda/mostrar",
                method: "POST",
                extraParams: {
                    _token: formulario._token.value,
                }
            },
            dateClick: function(info) {
                formulario.reset();

                let date = moment(info.date).format("YYYY-MM-DD");
                let end_date = moment(info.date).format("YYYY-MM-DD");


                formulario.date.value = date;
                formulario.end_date.value = end_date;

                document.getElementById("titleEvent").innerHTML = "Crear evento";

                $("#btnModificar").hide();
                $("#btnEliminar").hide();
                $("#btnGuardar").show();
                $("#agenda_modal").modal("show");
            },
            eventClick: function(info) {
                var agenda = info.event;

                axios.post(baseURL + "/agenda/editar/" + info.event.id).
                then(
                    (respuesta) => {
                        formulario.id.value = respuesta.data.id;
                        formulario.title.value = respuesta.data.title;
                        formulario.date.value = respuesta.data.date;
                        formulario.end_date.value = respuesta.data.end_date;
                        formulario.start_time.value = respuesta.data.start_time;
                        formulario.end_time.value = respuesta.data.end_time;
                        formulario.description.value = respuesta.data.description;
                        formulario.background_color.value = respuesta.data.background_color;
                        formulario.text_color.value = respuesta.data.text_color;

                        document.getElementById("titleEvent").innerHTML = "Modificar evento";

                        $("#btnModificar").show();
                        $("#btnEliminar").show();
                        $("#btnGuardar").hide();
                        $("#agenda_modal").modal("show");

                    }
                ).catch(
                    error => {
                        if (error.response) {
                            console.log(error.response);
                        }
                    }
                )
            }
        });

        calendar.render();

        document.getElementById("btnGuardar").addEventListener("click", function() {
            let titulo = $("#title").val();
            let horaInicial = $("#start_time").val();
            let horaFinal = $("#end_time").val();
            if (horaInicial | titulo | horaFinal != "") {
                enviarDatos("/agenda/agregar");
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Evento creado exitosamente!',
                    showConfirmButton: false,
                    timer: 1500
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Los campos obligatorios no pueden estar vacios!'
                })
            }


        });

        document.getElementById("btnEliminar").addEventListener("click", function() {
            Swal.fire({
                title: '¿Desea eliminar el evento?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#198754',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    enviarDatos("/agenda/borrar/" + formulario.id.value);
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Evento eliminado exitosamente!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            })

        });

        document.getElementById("btnModificar").addEventListener("click", function() {
            let titulo = $("#title").val();
            let horaInicial = $("#start_time").val();
            let horaFinal = $("#end_time").val();
            if (titulo != "") {
                enviarDatos("/agenda/actualizar/" + formulario.id.value);
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Evento modificado exitosamente!',
                    showConfirmButton: false,
                    timer: 1500
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Los campos obligatorios no pueden estar vacios!'
                })
            }


        });



        function enviarDatos(url) {
            const datos = new FormData(formulario);

            const nuevaURL = baseURL + url;

            axios.post(nuevaURL, datos).
            then(
                (respuesta) => {
                    $("#agenda_modal").modal("hide");
                    calendar.refetchEvents();

                }
            ).catch(
                error => {
                    if (error.response) {
                        console.log(error.response);
                    }
                }
            )
        }




    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH A:\LARAVEL SOTECJOR\MQUA\resources\views/agenda/index.blade.php ENDPATH**/ ?>