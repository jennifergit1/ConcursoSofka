<?php
session_start();
if (!isset($_SESSION["idUsuario"]))
    echo "<script>window.location.href='login.php'</script>";
require_once("header.php");
require_once("../Modelo/conexion.php");
require_once("../Modelo/respuestas.php");

$respuesta = new respuestasModel();
$respuesta->setIdPregunta($_GET["idPregunta"]);

$listarRespuestas = $respuesta->listarRespuestas();

?>
<div class="continer-fluid">
    <div class="row  justify-content-center ">
        <div class="col-md-8 mt-5">
            <h2 style="text-align: center;">Respuestas </h2>
            <br>
            <table class="table table-bordered bg-white">
                <thead>
                    <tr>
                        <th>Respuesta </th>
                        <th>Corrrecta </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listarRespuestas as $value) {
                    ?>
                        <tr>
                            <td> <?php echo $value->getRespuesta(); ?></td>
                            <td> <?php echo ($value->getCorrecta() == 1) ? 'Correcta' : 'Incorrecta';  ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

        </div>
        <div class="row justify-content-end col-6">
            <a class="btn btn-primary" href="listarPreguntas.php?idCategoria=<?php echo $_GET['idCategoria']; ?>">Volver</a>
        </div>
    </div>


</div>
<?php
require_once("footer.php");
?>

?>