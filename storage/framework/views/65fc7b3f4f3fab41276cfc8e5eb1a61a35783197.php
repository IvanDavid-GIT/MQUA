<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex" style="background-color: #358180;">
        <div type="button" href="" class="text-white">
            <?php echo e(Auth::user()->name); ?>

        </div>

    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="init" style="background-color: #358180">
        <li class="nav-item">
            <a class="nav-link" href="/agenda">
                <i class="fa-solid fa-calendar-days fa-fw fa-2xl"></i>Agenda
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/temporizador-pomodoro">
                <i class="fa-solid fa-stopwatch fa-fw fa-2xl"></i>Temporizador/<i class="fa-solid fa-hourglass-end fa-fw fa-2xl"></i>Pomodoro
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/notas">
                <i class="fa-solid fa-note-sticky fa-fw fa-2xl"></i>Notas
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('finanzas.index')); ?>">
                <i class="fa-solid fa-coins fa-fw fa-2xl"></i>Finanzas
            </a>
        </li>
    </ul>
</div>
<?php /**PATH A:\LARAVEL SOTECJOR\MQUA\resources\views/partials/menu.blade.php ENDPATH**/ ?>