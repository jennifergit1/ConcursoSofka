<?php
session_start();
if (!isset($_SESSION["idUsuario"]))
    echo "<script>window.location.href='login.php'</script>";
require_once("header.php");
require_once("../Modelo/conexion.php");
require_once("../Modelo/usuario.php");

$usuario = new usuariosModel();
$listarUsuarios = $usuario->listarUsuarios();
?>
<div class="continer-fluid">
    <div class="row  justify-content-center ">
        <div class="col-md-8 mt-5">
            <h2 style="text-align: center;">Usuarios registrados </h2>
            <br>
            <table class="table table-bordered bg-white">
                <thead>
                    <tr>
                        <th>Id </th>
                        <th>Nombre Usuario</th>
                        <th>correo</th>
                        <th>Puntos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listarUsuarios as $value) {
                    ?>
                        <tr>
                            <td> <?php echo $value->getIdUsuario(); ?></td>
                            <td> <?php echo $value->getNombreUsuario(); ?></td>
                            <td> <?php echo $value->getCorreo(); ?></td>
                            <td> <?php echo $value->getPuntosUsuario(); ?></td>
                            
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
require_once("footer.php");
?>