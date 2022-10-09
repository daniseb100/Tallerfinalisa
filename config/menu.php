<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="<?php echo $_SESSION['urlin'] ?>/inicio/panel_control.php" target="_blank">
            <span class="ms-1 font-weight-bold">UNIVERSIDAD DE NARIÑO</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <?php
            if ($_SESSION['rol'] == '1') { ?>
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo $_SESSION['urlin'] ?>/inicio/panel_control.php">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-atom text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Administrador</span>
                    </a>
                </li>
            <?php
            }
            if ($_SESSION['rol'] == '2' || $_SESSION['rol'] == '1') { ?>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo $_SESSION['urlin'] ?>/inicio/panel_control.php">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-collection text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Docente</span>
                    </a>
                </li>
            <?php
            }
            if ($_SESSION['rol'] == '3' || $_SESSION['rol'] == '1') { ?>
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo $_SESSION['urlin'] ?>/inicio/panel_control.php">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-badge text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Estudiante</span>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</aside>