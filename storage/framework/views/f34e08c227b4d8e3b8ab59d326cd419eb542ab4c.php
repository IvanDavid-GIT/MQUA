<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <link rel="shortcut icon" href="https://i.ibb.co/FV62zcp/Logo-MQUA.png">
    <!-- CoreUI for Bootstrap CSS -->
    <link href='<?php echo e(asset("fullcalendar/bootstrap.css")); ?>' rel='stylesheet' />
    <link href='<?php echo e(asset("fullcalendar/bootstrap.css.map")); ?>' rel='stylesheet' />
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

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <?php echo $__env->yieldContent('css'); ?>
    <!-- Custom Theme Style -->
    <link href="/build/css/custom.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col" style="background: #358180">
                <div class="left_col scroll-view" style="background: #358180">
                    <div class="navbar nav_title" style="background: #358180">
                        <a href="/home" class="site_title">
                            <img src="https://i.ibb.co/FV62zcp/Logo-MQUA.png" width="50" height="50" alt="Logo-MQUA">
                            <span style="font-size: 14px;" class="text-white">MÁS QUE UNA AGENDA</span>
                        </a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">

                        <div class="profile_info">
                            <span>
                                <h2 class="text-left"></h2>
                            </span>
                        </div>


                    </div>
                    <!-- /menu profile quick info -->

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <div class="nav side-menu">

                                <li style="width: 230px;">
                                    <a href="/home">
                                        <i class="fa-solid fa-calendar-days fa-fw fa-2xl"></i>
                                        <span style="color:white">Agenda</span>
                                    </a>
                                </li>
                                <li style="width: 230px;">
                                    <a href="/temporizador-pomodoro">
                                        <i class="fa-solid fa-stopwatch fa-fw fa-xl"></i>
                                        <span style="color:white">Temporizador/Pomodoro</span><i class="fa-solid fa-hourglass-end fa-fw fa-xl"></i>
                                    </a>
                                </li>
                                <li style="width: 230px;">
                                    <a href="/notas">
                                        <i class="fa-solid fa-note-sticky fa-fw fa-2xl"></i>
                                        <span style="color:white">Notas</span>
                                    </a>
                                </li>
                                <li style="width: 230px;">
                                    <a href="<?php echo e(route('finanzas.index')); ?>">
                                        <i class="fa-solid fa-coins fa-fw fa-2xl"></i>
                                        <span style="color:white">Finanzas</span>
                                    </a>
                                </li>

                                <li style="width: 230px;">
                                    <a href="https://www.youtube.com/playlist?list=PLnIw8F4aq4Oehyr_G0I561ZHd4So7nh-u">
                                        <i class="fa-solid fa-circle-info fa-fw fa-2xl"></i>
                                        <span style="color:white">Ayuda</span>
                                    </a>
                                </li>
                            </div>

                        </div>

                    </div>
                    <!-- /sidebar menu -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class=" nav_menu" style="border: 0;background: #358180;height:47px;">

                    <nav class=" nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown">
                                <a style="color:white" id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa-solid fa-circle-user fa-fw fa-2xl"></i>
                                    <?php echo e(Auth::user()->name); ?>

                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(route('usuarios.index')); ?>"><i class="fa-solid fa-unlock-keyhole fa-fw fa-xl"></i>
                                        Cambiar contraseña
                                    </a>
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="CerrarSesion()"><i class="fa-solid fa-right-from-bracket fa-fw fa-xl"></i>
                                        <?php echo e(__('Cerrar sesión')); ?>

                                    </a>

                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->


            <!-- page content -->
            <div class="card right_col" role="main" style="background:#ECF0F5 ">
                <section class="content">
                    <div class="card container-fluid" style="background:white; margin-top: 23px;">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </section>

                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>
                </form>






                <!-- Start to do list -->

                <!-- end of weather widget -->
            </div>
        </div>
    </div>
    </div>
    <!-- /page content -->

    <!-- footer content -->
    <footer class="card " style="background:#ECF0F5">
        <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
        </div>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
    </div>
    </div>


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
    <!-- Bootstrap -->
    <script src="/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="/vendors/fastclick/lib/fastclick.js"></script>
    <!-- Chart.js -->
    <script src="/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="/vendors/Flot/jquery.flot.js"></script>
    <script src="/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="/vendors/Flot/jquery.flot.time.js"></script>
    <script src="/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="/vendors/moment/min/moment.min.js"></script>
    <script src="/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="/build/js/custom.min.js"></script>

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
<?php /**PATH A:\LARAVEL SOTECJOR\MQUA\resources\views/layouts/app.blade.php ENDPATH**/ ?>