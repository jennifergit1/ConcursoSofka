<?php
require_once("../Modelo/conexion.php");
require_once("../Modelo/usuario.php");
session_start();

$usuariosModel = new usuariosModel();

if (isset($_POST["registrarUsuario"])) {

    $usuariosModel->setNombreUsuario($_POST["nombreUsuario"]);
    $usuariosModel->setCorreo($_POST["correo"]);
    $usuariosModel->setContrasena($_POST["contrasena"]);

    $registroExitoso = $usuariosModel->registrarUsuario();

    if ($registroExitoso) {
        echo '<script language="javascript">alert("usuario registrado correctamente");</script>';
        echo '<script> window.location="../Vista/login.php"</script>';
    }
}else{
    if(isset($_SESSION["idUsuario"])){
        header("Location: ../Vista/inicio.php");
    }else{
        header("Location: ../Vista/login.php");
    }
}
