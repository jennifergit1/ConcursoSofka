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
    <title>Consurso Sofkac- Iniciar sesión</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <b>CONCURSO SOFKA</b>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Ingresa tus credenciales para iniciar sesión</p>
                <form action="../Controlador/loginControlador.php" method="post">
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
                            <button name="iniciarSesion" id="iniciarSesion" type="submit" class="btn btn-primary btn-block ">Iniciar sesión</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <hr>
                </form>
                <p>
                    <a href="registrarse.php" class="text-center">Registrarse </a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src=" dist/js/adminlte.min.js"></script>
</body>

</html>