<?php
session_start();
if (isset($_SESSION["idUsuario"]))
    echo "<script>window.location.href='inicio.php'</script>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Concurso Sofka - Registrarse</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href=" plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href=" plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href=" dist/css/adminlte.min.css">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <b>Consurso Sofka</b>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Registrarse </p>
                <form action="../Controlador/usuariosControlador.php" method="post">
                    <div class="input-group mb-3">
                        <input id="nombreUsuario" name="nombreUsuario" type="text" class="form-control" placeholder="Nombre y apellidos">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="correo" name="correo" type="email" class="form-control" placeholder="Correo">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="contrasena" name="contrasena" type="password" class="form-control" placeholder="Contraseña">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row " style="place-content: center">
                        <!-- /.col -->
                        <div class="col-8">
                            <button id="registrarUsuario" name="registrarUsuario" type="submit" class="btn btn-primary btn-block ">Registrarse</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <hr>
                </form>
                <a href="login.php" class="text-center"> Iniciar sesión </a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src=" plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src=" plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src=" dist/js/adminlte.min.js"></script>
</body>

</html>