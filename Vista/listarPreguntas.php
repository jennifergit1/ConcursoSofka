<?php
session_start();
if (!isset($_SESSION["idUsuario"]))
    echo "<script>window.location.href='login.php'</script>";
require_once("header.php");
require_once("../Modelo/conexion.php");
require_once("../Modelo/preguntas.php");

$preguntas = new preguntasModel();
$preguntas->setIdCategoria($_GET["idCategoria"]);

$listarPreguntas = $preguntas->listarPreguntas();

?>
<div class="continer-fluid">
    <div class="row  justify-content-center ">
        <div class="col-md-8 mt-5">
            <h2 style="text-align: center;">Preguntas </h2>
            <br>
            <table class="table table-bordered bg-white">
                <thead>
                    <tr>
                        <th>N° pregunta </th>
                        <th>Pregunta </th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listarPreguntas as $value) {
                    ?>
                        <tr>
                            <td> <?php echo $value->getNumPregunta(); ?></td>
                            <td> <?php echo $value->getPregunta(); ?></td>
                            <td> <a class="btn btn-primary br-5" href="editarPregunta.php?idPregunta=<?php echo $value->getIdPregunta(); ?>&idCategoria=<?php echo ($_GET['idCategoria']); ?>" title="Editar pregunta"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-primary br-5" href="listarRespuestas.php?idPregunta=<?php echo $value->getIdPregunta(); ?>&idCategoria=<?php echo ($_GET['idCategoria']);?>">Ver respuestas</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="row justify-content-end col-6">
            <a class="btn btn-primary" href="listarCategorias.php">Volver</a>
        </div>
    </div>
</div>
<?php
require_once("footer.php");
?>

?>