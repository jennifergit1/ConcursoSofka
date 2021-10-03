<?php
session_start();
if (!isset($_SESSION["idUsuario"]))
    echo "<script>window.location.href='login.php'</script>";
require_once("header.php");
require_once("../Modelo/conexion.php");
require_once("../Modelo/categorias.php");
require_once("../Modelo/preguntas.php");
require_once("../Modelo/respuestas.php");

$pregunta = new preguntasModel();
$categoriasModel = new categoriasModel();
$respuestas = new respuestasModel();

$pregunta->setIdPregunta($_GET["idPregunta"]);
$respuestas->setIdPregunta($_GET["idPregunta"]);
$listarDatosPreguntas = $pregunta->listarDatosPreguntas();
$listarDatosRespuestas = $respuestas->listarDatosRespuestas();

?>

<div class="">
    <div class="row justify-content-center">
        <div class="col-md-10 mt-2 border bg-white p-5">
            <form action="../Controlador/preguntasControlador.php" method="post" id="formularioRegistrar">
                <input type="hidden" name="idPregunta" id="idPregunta" value="<?php echo $_GET["idPregunta"]; ?>">
                <h3 class="text-center">Editar pregunta</h3>
                <div class="row mt-3 mb-3">
                    <div class="col-md-12">
                        <label>Pregunta</label>
                        <textarea class="form-control" name="pregunta" id="pregunta" rows="3" value=""><?php echo $listarDatosPreguntas[0]->getPregunta(); ?></textarea>
                    </div>
                </div>
                <h3 class="text-center">Editar respuestas</h3>
                <?php
                foreach ($listarDatosRespuestas as $key => $value) {
                ?>
                    <div class="form-group">
                        <label for="respuesta<?php echo $key + 1; ?>">Respuesta <?php echo $key + 1; ?></label>
                        <input type="hidden" name="idRespuesta[]" value="<?php echo $value->getIdRespuesta(); ?>">
                        <textarea name="respuesta[]" id="respuesta<?php echo $key + 1; ?>" class="form-control" aria-describedby="helpId"><?php echo $value->getRespuesta(); ?></textarea>
                        <small id="helpId" class="text-muted"></small>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="correcta" id="correcta1" value="<?php echo $key;?>" <?php echo ($value->getCorrecta() == 1) ? 'checked' : ''; ?>>
                                Opción Correcta.
                            </label>
                        </div>
                    </div>
                <?php
                }
                ?>


                <div class="d-flex justify-content-end mt-3">
                    <a href="listarPreguntas.php?idCategoria=<?php echo $_GET["idCategoria"] ?>" class="text-center btn btn-danger col-4 mr-3">Volver</a>
                    <button id="editarPregunta" name="editarPregunta" type="submit" class="btn btn-primary btn-block col-4">Editar pregunta</button>
                    
                </div>
            </form>
        </div>
    </div>


</div>

<?php
include_once "footer.php";
?>