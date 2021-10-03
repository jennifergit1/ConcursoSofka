<?php
require_once("../Modelo/conexion.php");
require_once("../Modelo/usuario.php");

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
}
