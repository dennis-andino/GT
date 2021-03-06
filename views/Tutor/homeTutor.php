<?php
Utils::sessionOff(); // verifica si existe una sesion valida.
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php
    require_once 'core/librerias.php';
    ?>
    <title>Gestión de tutorías</title>
</head>
<body class="hold-transition sidebar-mini sidebar-collapse" onload="noback();">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-navy">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?= base_url . 'home/Tutor' ?>" class="nav-link">Inicio</a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge"><?=sizeof($_SESSION['notifications'])?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-header"><?=sizeof( $_SESSION['notifications']).' Notificaciones'?></span>
                    <?php
                    if(isset($_SESSION['notifications'])){
                        foreach ($_SESSION['notifications'] as $msj){?>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-mug-hot mr-2"></i><?=$msj['subject'].'...'?><span class="float-right text-muted text-xs"><?=substr($msj['date'],0,10) ?></span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <?php
                        }
                    }
                    ?>
                    <a href="<?=base_url.'notification/seeNotifications'?>" class="dropdown-item dropdown-footer">Ver todas</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url ?>home/logout" role="button"> Cerrar sesión
                    <i class="fas fa-power-off"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?= base_url . 'institution/index'?>" class="brand-link navbar-navy">
            <img src="../assets/img/<?=$_SESSION['logo']?>" alt="Ceutec Logo" class="brand-image img-circle elevation-3">
            <span class="brand-text font-weight-light"><?=$_SESSION['institution']?></span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="../uploads/photos/<?=$_SESSION['photo']?>" class="img-circle elevation-2">
                </div>
                <div class="info">
                    <a href="<?=base_url.'users/myAccountInfo'?>" class="d-block"><?= $_SESSION['username'] ?></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="<?= base_url . 'home/Tutor' ?>" class="nav-link">
                            <i class="nav-icon fas fa-chalkboard-teacher"></i>
                            <p>
                                Tutorías
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=base_url.'notification/seeNotifications'?>" class="nav-link">
                            <i class="nav-icon fas fa-bullhorn"></i>
                            <p>
                                Notificaciones
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=base_url.'schedule/tutors'?>" class="nav-link">
                            <i class="nav-icon far fa-clock"></i>
                            <p>
                                Horarios
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=base_url.'tutorials/tutorEvaluations'?>" class="nav-link">
                            <i class="nav-icon fas fa-file-invoice"></i>
                            <p>
                                Evaluaciones
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=base_url.'users/myAccountInfo'?>" class="nav-link">
                            <i class="nav-icon far fa-address-card"></i>
                            <p>
                                Mi cuenta
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url . 'institution/index'?>" class="nav-link">
                            <i class="nav-icon fas fa-university"></i>
                            <p> Mi institución</p>
                        </a>
                    </li>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- /.content-wrapper -->
    <?php
    require_once 'views/Tutor/'.$_SESSION['panel'].'.php'
    ?>
    <!-- Main Footer -->
    <?php
    include_once 'views/layouts/footer.php';
    ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="<?=base_url?>views/Scripts/tablesFormats.js"></script>
<script>
    $(document).ready(function () {
        $("#asignatura").change(function () {
            $("#asignatura option:selected").each(function () {
                id_course = $(this).val();
                $.post("<?=base_url?>schedule/getSchedule", {
                    id_course: id_course
                }, function (data) {
                    $("#horario").html(data);
                });
            });
        });
    });
</script>
<?php if(isset($_SESSION['alert'])):?>
    <script> swal("<?=$_SESSION['alert']['title']?>","<?=$_SESSION['alert']['msj']?>","<?=$_SESSION['alert']['type']?>");</script>
    <?php unset($_SESSION['alert']); endif; ?>
</body>
</html>

