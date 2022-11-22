<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" style="left: 127px; bottom: 11px;">
                <div class="card-title text-center" style="margin-top:5px ;">TEMPORIZADOR</div>
                <div class="card-body">
                    <div class="card container">
                        <br>
                        <div id="contenedorInputs">
                            <div class="row col-12 form-group">
                                <div class="col-2 col align-self-center text-center" style="margin-left: 335px;">
                                    <input class="form-control" id="minutos" type="number">
                                    <label for="minutos">Minutos</label>
                                </div>
                                <div class="col-2 col align-self-center text-center">
                                    <input class="form-control" id="segundos" type="number">
                                    <label for="segundos">Segundos</label>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <h2 id="tiempoRestante" style="font-size: 2rem;">00:00.0</h2>
                        </div>
                        <div class="col align-self-center">
                            <button type="button" id="btnIniciar" class="btn btn-success "><span class="fa-solid fa-play"></span></button>
                            <button type="button" id="btnPausar" class="btn btn-info "><span class="fa-solid fa-pause"></span></button>
                            <button type="button" id="btnDetener" class="btn btn-warning "><span class="fa-solid fa-stop"></span></button>
                        </div>
                        <br>

                    </div>
                </div>

            </div>
            <br>
            <div class="card" style="left: 127px; bottom: 11px;">
                <div class="card-title text-center" style="margin-top:5px ;">POMODORO</div>
                <div class="card-body">

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
                        <button class="start">start focus</button>
                        <button class="reset">reset</button>
                        <button class="pause">pause</button>
                    </div>

                    <form action=".">
                        <label for="focusTime">Focus Time</label>
                        <input type="number" value="1" id="focusTime" />
                        <label for="breakTime">Break Time</label>
                        <input type="number" value="1" id="breakTime" />
                        <button type="submit">Save settings</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('css'); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <?php $__env->stopSection(); ?>


    <?php $__env->startSection('js'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const $tiempoRestante = document.querySelector("#tiempoRestante"),
                $btnIniciar = document.querySelector("#btnIniciar"),
                $btnPausar = document.querySelector("#btnPausar"),
                $btnDetener = document.querySelector("#btnDetener"),
                $minutos = document.querySelector("#minutos"),
                $segundos = document.querySelector("#segundos"),
                $contenedorInputs = document.querySelector("#contenedorInputs");
            let idInterval = null,
                diferenciaTemporal = 0,
                fechaFuturo = null;
            // Carga un sonido a través de su fuente y lo inyecta de manera oculta
            // Tomado de: https://parzibyte.me/blog/2020/09/28/reproducir-sonidos-javascript/
            const cargarSonido = function(fuente) {
                const sonido = document.createElement("audio");
                sonido.src = fuente;
                sonido.loop = true;
                sonido.setAttribute("preload", "auto");
                sonido.setAttribute("controls", "none");
                sonido.style.display = "none"; // <-- oculto
                document.body.appendChild(sonido);
                return sonido;
            };

            const sonido = cargarSonido('<?php echo e(asset("media/timer.wav")); ?>');
            const ocultarElemento = elemento => {
                elemento.style.display = "none";
            }

            const mostrarElemento = elemento => {
                elemento.style.display = "";
            }

            const iniciarTemporizador = (minutos, segundos) => {
                ocultarElemento($contenedorInputs);
                mostrarElemento($btnPausar);
                ocultarElemento($btnIniciar);
                ocultarElemento($btnDetener);
                if (fechaFuturo) {
                    fechaFuturo = new Date(new Date().getTime() + diferenciaTemporal);
                    diferenciaTemporal = 0;
                } else {
                    const milisegundos = (segundos + (minutos * 60)) * 1000;
                    fechaFuturo = new Date(new Date().getTime() + milisegundos);
                }
                clearInterval(idInterval);
                idInterval = setInterval(() => {
                    const tiempoRestante = fechaFuturo.getTime() - new Date().getTime();
                    if (tiempoRestante <= 0) {
                        clearInterval(idInterval);
                        sonido.play();
                        ocultarElemento($btnPausar);
                        mostrarElemento($btnDetener);
                    } else {
                        $tiempoRestante.textContent = milisegundosAMinutosYSegundos(tiempoRestante);
                    }
                }, 50);
            };

            const pausarTemporizador = () => {
                ocultarElemento($btnPausar);
                mostrarElemento($btnIniciar);
                mostrarElemento($btnDetener);
                diferenciaTemporal = fechaFuturo.getTime() - new Date().getTime();
                clearInterval(idInterval);
            };

            const detenerTemporizador = () => {
                clearInterval(idInterval);
                fechaFuturo = null;
                diferenciaTemporal = 0;
                sonido.currentTime = 0;
                sonido.pause();
                $tiempoRestante.textContent = "00:00.0";
                init();
            };

            const agregarCeroSiEsNecesario = valor => {
                if (valor < 10) {
                    return "0" + valor;
                } else {
                    return "" + valor;
                }
            }
            const milisegundosAMinutosYSegundos = (milisegundos) => {
                const minutos = parseInt(milisegundos / 1000 / 60);
                milisegundos -= minutos * 60 * 1000;
                segundos = (milisegundos / 1000);
                return `${agregarCeroSiEsNecesario(minutos)}:${agregarCeroSiEsNecesario(segundos.toFixed(1))}`;
            };
            const init = () => {
                $minutos.value = 0;
                $segundos.value = 0;
                mostrarElemento($contenedorInputs);
                mostrarElemento($btnIniciar);
                ocultarElemento($btnPausar);
                ocultarElemento($btnDetener);
            };


            $btnIniciar.onclick = () => {
                const minutos = parseInt($minutos.value);
                const segundos = parseInt($segundos.value);
                if (isNaN(minutos) || isNaN(segundos) || (segundos <= 0 && minutos <= 0)) {
                    return;
                }
                iniciarTemporizador(minutos, segundos);
            };
            init();
            $btnPausar.onclick = pausarTemporizador;
            $btnDetener.onclick = detenerTemporizador;
        });
    </script>
    <script>
        const circle = document.querySelector(".progress-ring__circle");
        const radius = circle.r.baseVal.value;
        const circumference = radius * 2 * Math.PI;

        circle.style.strokeDasharray = circumference;
        circle.style.strokeDashoffset = circumference;

        function setProgress(percent) {
            const offset = circumference - (percent / 100) * circumference;
            circle.style.strokeDashoffset = offset;
        }


        const focusTimeInput = document.querySelector("#focusTime");
        const breakTimeInput = document.querySelector("#breakTime");
        const pauseBtn = document.querySelector(".pause");

        focusTimeInput.value = localStorage.getItem("focusTime");
        breakTimeInput.value = localStorage.getItem("breakTime");

        document.querySelector("form").addEventListener("submit", (e) => {
            e.preventDefault();
            localStorage.setItem("focusTime", focusTimeInput.value);
            localStorage.setItem("breakTime", breakTimeInput.value);
        });

        document.querySelector(".reset").addEventListener("click", () => {
            startBtn.style.transform = "scale(1)";
            clearTimeout(initial);
            setProgress(0);
            mindiv.textContent = 0;
            secdiv.textContent = 0;
        });

        pauseBtn.addEventListener("click", () => {
            if (paused === undefined) {
                return;
            }
            if (paused) {
                paused = false;
                initial = setTimeout("decremenT()", 60);
                pauseBtn.textContent = "pause";
                pauseBtn.classList.remove("resume");
            } else {
                clearTimeout(initial);
                pauseBtn.textContent = "resume";
                pauseBtn.classList.add("resume");
                paused = true;
            }
        });
    </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel-SENA\MasQueUnaAgenda\resources\views/temporizador-pomodoro/temporizador/index.blade.php ENDPATH**/ ?>