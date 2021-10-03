<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Consurso Sofka</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="inicio.php" class="nav-link">Inicio</a>
                </li>
            </ul>
            <!-- Right navbar links -->

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="inicio.php" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Consurso Sofka</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $_SESSION["nombreUsuario"] ?></a>
                        <a href="#" class="d-block"><?php echo $_SESSION["correo"] ?></a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="iniciarJuego.php" class="nav-link"> <i class="far fa-circle nav-icon"></i>
                                Iniciar juego
                            </a>
                        </li>
                        <?php if (($_SESSION["admin"]) == 1) {?>
                        <li class="nav-item">
                            <a href="listarUsuarios.php" class="nav-link"> <i class="far fa-circle nav-icon"></i>
                                Lista de usuarios
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="listarCategorias.php" class="nav-link"> <i class="far fa-circle nav-icon"></i>
                                Lista de categorías
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="registrarPregunta.php" class="nav-link"> <i class="far fa-circle nav-icon"></i>
                                Registrar Preguntas
                            </a>
                        </li>
                        <?php }?>
                        <li class="nav-item">
                            <a href="inicio.php" class="nav-link"> <i class="far fa-circle nav-icon"></i>
                                Mis datos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="cerrarSesion.php" class="nav-link"> <i class="far fa-circle nav-icon"></i>
                                Cerrar sesión
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content container-fluid p-4">