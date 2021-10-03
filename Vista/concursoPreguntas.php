<?php
session_start();
if (!isset($_SESSION["idUsuario"]))
    echo "<script>window.location.href='login.php'</script>";
require_once("header.php");
require_once("../Modelo/conexion.php");
require_once("../Modelo/categorias.php");
require_once("../Modelo/preguntas.php");
require_once("../Modelo/respuestas.php");
$categoriasModel = new categoriasModel();
$preguntasModel = new preguntasModel();
$respuestasModel = new respuestasModel();
$preguntasModel->setIdCategoria($_SESSION["numCategoria"]);
$totalPreguntas = $preguntasModel->totalPreguntasPorCategoria();
$categoriasModel->setIdCategoria($_SESSION["numCategoria"]);
$categoria = $categoriasModel->verCategoria();
$repetir = true;
$pregunta = [];
// if ($totalPreguntas >= 5){
while ($repetir) {
    $randomPregunta = rand(1, $totalPreguntas);
    $preguntasModel->setIdCategoria($_SESSION["numCategoria"]);
    $preguntasModel->setNumPregunta($randomPregunta);
    $pregunta = $preguntasModel->listarPreguntaPorNumPregunta();
    if (isset($pregunta["numPregunta"])) {
        if (!in_array($pregunta["numPregunta"], $_SESSION["preguntasMostradas"])) {
            $repetir = false;
            $_SESSION["preguntasMostradas"][] = $pregunta["numPregunta"];
        }
    }
}
$fondoCategoria = "";
switch($_SESSION["numCategoria"]){
    case 1: $fondoCategoria = "bg-secondary"; break;
    case 2: $fondoCategoria = "bg-success"; break;
    case 3: $fondoCategoria = "bg-info"; break;
    case 4: $fondoCategoria = "bg-warning"; break;
    case 5: $fondoCategoria = "bg-danger"; break;
}

$respuestasModel->setIdPregunta($pregunta["idPregunta"]);
$listaRespuestas = $respuestasModel->listarAlAzarPorPregunta();
// }

?>
<div class="continer-fluid">

    <div class="d-flex justify-content-end mt-3">
        <div class="">
            <h4 class="text-start rounded p-1 <?php echo $fondoCategoria ?>">Categoría: <?php echo $categoria; ?></h4>
            <h4 class="text-start rounded bg-success p-1">Puntos actuales: <?php echo $_SESSION["puntosActuales"]; ?></h4;>
        </div>
    </div>
    <form method="POST" action="../Controlador/concursoControlador.php">
        <div class="row  justify-content-center ">
            <div class="col-lg-10 col-md-12 mt-3 pl-4 pr-4 pt-2 pb-2 mb-3 bg-white border">
                <h3 class="text-justify">Pregunta <?php echo $_SESSION["numPregunta"]; ?></h3>
                <p class="text-justify"><?php echo $pregunta["pregunta"] ?></p>
            </div>
            <div class="col-lg-10 col-md-12 mt-3 mb-3 bg-white border pl-5 pr-5 pt-2 pb-2">
                <?php foreach ($listaRespuestas as $key => $value) { ?>
                    <div class="mb-2">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="respuesta" id="respuesta<?php echo $key + 1; ?>" value="<?php echo $value->getIdRespuesta(); ?>">
                            <?php echo $value->getRespuesta(); ?>
                        </label>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-3">
            <div class="col-4"><button id="enviarPregunta" name="enviarPregunta" type="submit" class="btn btn-primary btn-block ">Siguiente</button>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-3">
            <div class="col-2"> <a href="../Controlador/concursoControlador.php?terminarJuego=true" id="finalizarJuego" name="finalizarJuego" class="btn btn-danger btn-block ">Finalizar juego</a></div>
        </div>
    </form>
</div>

<?php
require_once("footer.php");
?>