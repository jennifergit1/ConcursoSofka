<?php
session_start();
if (!isset($_SESSION["idUsuario"]))
    echo "<script>window.location.href='login.php'</script>";
require_once("header.php");
require_once("../Modelo/conexion.php");
require_once("../Modelo/usuario.php");
$usuariosModel = new usuariosModel();
$usuariosModel->setIdUsuario($_SESSION["idUsuario"]);
$datosUsuario = $usuariosModel->listarDatosUsuarioPorIdUsuario();
?>
<div class="container bg-white">
    <div class="p-3 m-5">
        <div>
            <h1 class="text-center h3">Bienvenid@ <?php echo $datosUsuario[0]->getNombreUsuario(); ?> al challenge - Concurso de preguntas y respuestas <strong>Sofka</strong> </h1>
        </div>
        <div class="d-flex justify-content-center">

            <img src="dist/img/sofka.png" class="img-fluid p-2 m-2" alt="Imagen Sofka">
        </div>

        <h5>Tus datos:</h5>
        <strong>Nombre: </strong><?php echo $datosUsuario[0]->getNombreUsuario(); ?><br>
        <strong>Correo: </strong><?php echo $datosUsuario[0]->getCorreo(); ?><br>
        <strong>Puntos Totales Acumulados: </strong><?php echo $datosUsuario[0]->getPuntosUsuario(); ?><br>
    </div>
</div>

<?php
require_once("footer.php");
?>