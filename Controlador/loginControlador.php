<?php
require_once("../Modelo/conexion.php");
require_once("../Modelo/login.php");
        session_start();

$loginModel = new loginModel();

if (isset($_POST["iniciarSesion"])) {

    $loginModel->setCorreo($_POST["correo"]);
    $loginModel->setContrasena($_POST["contrasena"]);

    $loginExitoso = $loginModel->iniciarSesion();

    if (count($loginExitoso) > 0) {
        $_SESSION["idUsuario"] = $loginExitoso["idUsuario"];
        $_SESSION["nombreUsuario"] = $loginExitoso["nombreUsuario"];
        $_SESSION["correo"] = $loginExitoso["correo"];
        $_SESSION["admin"] = $loginExitoso["admin"];
        $_SESSION["puntos"] = $loginExitoso["puntosUsuario"];
        $_SESSION["preguntasMostradas"] = [];
        $_SESSION["numPregunta"] = 1;
        $_SESSION["puntosActuales"] = 0;

        header('Location:../Vista/inicio.php');
    } else {
        echo '<script language="javascript">alert("usuario o contraseña incorrecta");</script>';
        echo '<script> window.location="../Vista/login.php"</script>';
    }
}else{
    if(isset($_SESSION["idUsuario"])){
        header("Location: ../Vista/inicio.php");
    }else{
        header("Location: ../Vista/login.php");
    }
}
