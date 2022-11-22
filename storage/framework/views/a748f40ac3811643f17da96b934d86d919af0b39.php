<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" style="left: 127px; bottom: 11px;">
                <div class="card-title text-center" style="margin-top:5px ;">TEMPORIZADOR</div>
                <div class="card-body">
                    <div class="container">
                        <div id="contenedorInputs">
                            <div class="row col-12 form-group">
                                <div class="col-2 col align-self-center text-center" style="margin-left: 335px;">
                                    <input class="form-control" id="minutos" type="number" onKeyPress="if(this.value.length==12) return false;">
                                    <label for="minutos">Minutos</label>
                                </div>
                                <div class="col-2 col align-self-center text-center">
                                    <input class="form-control" id="segundos" type="number" onKeyPress="if(this.value.length==12) return false;">
                                    <label for="segundos">Segundos</label>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <h2 id="tiempoRestante" style="font-size: 2rem;">00:00.0</h2>
                        </div>
                        <div class="col align-self-center text-center">
                            <button type="button" id="btnIniciar" class="btn btn-success "><span class="fa-solid fa-play"></span></button>
                            <button type="button" id="btnPausar" class="btn btn-info "><span class="fa-solid fa-pause"></span></button>
                            <button type="button" id="btnDetener" class="btn btn-warning "><span class="fa-solid fa-stop"></span></button>
                        </div>

                    </div>
                </div>

            </div>
            <br>
            <div class="card" style="left: 127px; bottom: 11px;">
                <div class="card-title text-center" style="margin-top:5px ;">POMODORO</div>
                <div class="card-body">
                    <div class="container">
                        <br>
                        <figure class="clock">
                            <div class="mins">0</div>
                            <div>:</div>
                            <div class="secs">00</div>
                            <audio src="http://soundbible.com/mp3/service-bell_daniel_simion.mp3"></audio>
                            <svg class="progress-ring" height="120" width="120">
                                <circle class="progress-ring__circle" stroke-width="8" fill="transparent" r="50" cx="60" cy="60" />
                            </svg>
                        </figure>

                        <div class="btn-group">
                            <button class="start " style="border-radius: 5px;">Iniciar enfoque</button>
                            <button class="reset" style="border-radius: 5px;">Reiniciar</button>
                            <button class="pause" style="border-radius: 5px;">Pausar</button>
                            <button class="resume" style="border-radius: 5px; display: none;">Reanudar</button>
                        </div>

                        <form action=".">
                            <label for="focusTime">Tiempo de enfoque (Min)</label>
                            <input type="number" class="form-control" value="25" id="focusTime" onKeyPress="if(this.value.length==12) return false;" />
                            <label for="breakTime">Tiempo de descanso (Min)</label>
                            <input type="number" class="form-control" value="5" id="breakTime" onKeyPress="if(this.value.length==12) return false;" />
                            <button type="submit" style="border-radius: 5px;"><i class="fa-solid fa-floppy-disk fa-fw"></i>Guardar configuraciones</button>
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
    <link href='<?php echo e(asset("css/style.css")); ?>' rel='stylesheet' />
    <?php $__env->stopSection(); ?>


    <?php $__env->startSection('js'); ?>
    <script src='<?php echo e(asset("js/bootstrap.min.js")); ?>'></script>
    <script src='<?php echo e(asset("js/bootstrap.min.js.map")); ?>'></script>
    <script src='<?php echo e(asset("js/temporizador.js")); ?>'></script>
    <script src='<?php echo e(asset("js/pomodoro.js")); ?>'></script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel-SENA\MasQueUnaAgenda\resources\views/temporizador-pomodoro/index.blade.php ENDPATH**/ ?>