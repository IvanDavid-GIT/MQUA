<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <link rel="shortcut icon" href="https://i.ibb.co/FV62zcp/Logo-MQUA.png">
    <!-- CoreUI for Bootstrap CSS -->
    <link href='<?php echo e(asset("fullcalendar/bootstrap.css")); ?>' rel='stylesheet' />
    <link href='<?php echo e(asset("fullcalendar/bootstrap.css.map")); ?>' rel='stylesheet' />
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.1.1/dist/css/coreui.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href='<?php echo e(asset("css/select2.css")); ?>' rel='stylesheet' />
    <style>
        .select2-selection__rendered {
            line-height: 33px !important;
        }

        .select2-container .select2-selection--single {
            height: 37px !important;
        }

        .select2-selection__arrow {
            height: 36px !important;
        }
    </style>

    <?php echo $__env->yieldContent('css'); ?>

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
</head>

<body>
    <?php echo $__env->make('partials.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <header class="header header-sticky mb-4" style="background-color:#358180 ;">
            <div class="container-fluid">
                <div class="text-center" style="margin-left: 700px;">
                    <img src="https://i.ibb.co/FV62zcp/Logo-MQUA.png" width="50" height="50" alt="Logo-MQUA">
                    <span style="font-size: 15px; margin-left: 5px;" class="text-white">MÁS QUE UNA AGENDA</span>
                </div>

                <div type="button" class="float-right text-white" href="<?php echo e(route('logout')); ?>" onclick="CerrarSesion()">
                    <i class="fa-solid fa-right-from-bracket fa-fw fa-xl"></i>Cerrar sesión
                </div>

            </div>
        </header>
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
            <?php echo csrf_field(); ?>
        </form>
    </div>
    <footer class="footer">
        <div><a href="https://coreui.io">CoreUI </a><a href="https://coreui.io">Bootstrap Admin Template</a> © 2021 creativeLabs.</div>
        <div class="ms-auto">Powered by&nbsp;<a href="https://coreui.io/bootstrap/ui-components/">CoreUI UI Components</a></div>
    </footer>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: CoreUI for Bootstrap Bundle with Popper -->
    <script src='<?php echo e(asset("fullcalendar/jquery-3.6.0.js")); ?>'></script>
    <script src='<?php echo e(asset("js/bootstrap.min.js")); ?>'></script>
    <script src='<?php echo e(asset("js/bootstrap.min.js.map")); ?>'></script>
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.1.1/dist/js/coreui.bundle.min.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src='<?php echo e(asset("js/select2.js")); ?>'></script>
    <script type="text/javascript">
        var baseURL = <?php echo json_encode(url('/')); ?>

    </script>
    <?php echo $__env->yieldContent('js'); ?>


    <!-- Option 2: Separate Popper and CoreUI for Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.1.1/dist/js/coreui.min.js"  crossorigin="anonymous"></script>
    -->
    <script>
        $(document).ready(function() {
            $("select").select2({
                height: 1000
            });
        });

        function CerrarSesion() {
            event.preventDefault();
            Swal.fire({
                title: "¿Desea cerrar sesión?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#2eb85c',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si, cerrar sesión!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            })
        }

        function soloLetras(objeto) {
            objeto.value = objeto.value.replace(/[^\a-zA-ZñÑáéíóúÁÉÍÓÚ ]/g, '');
        }

        function soloNumeros(objeto) {
            objeto.value = objeto.value.replace(/[^\d,]/g, '');
        }
    </script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</body>

</html>
<?php /**PATH C:\Laravel-SENA\MasQueUnaAgenda\resources\views/layouts/app.blade.php ENDPATH**/ ?>