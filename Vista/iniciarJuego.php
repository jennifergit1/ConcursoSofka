<?php
session_start();
if (!isset($_SESSION["idUsuario"]))
    echo "<script>window.location.href='login.php'</script>";
require_once("header.php");
$_SESSION["numPregunta"] =1;
$_SESSION["puntosActuales"] =0;
$_SESSION["preguntasMostradas"] = [];
$_SESSION["numCategoria"] = 1;
$_SESSION["preguntasMostradas"] = [];
?>
<div class="continer-fluid">

    <div class="d-flex justify-content-end mt-3">
        <div class="">
            <h4 class="text-center text-seconday bg-success p-1">Puntos actuales: <?php echo $_SESSION["puntosActuales"] ?></h4>
        </div>
    </div>
    <div class="row  justify-content-center ">
        <div class="col-lg-10 col-md-12 mt-3 mb-3 bg-white border p-5">
            <h3 class="text-justify">¡Bienvenido al juego!</h3>
            <p class="text-justify">En este juego deberás responder preguntas e ir escalando entre las diferentes categorias. Cada 5 preguntas la dificultará aumentará. Cuando hayas respondido la 25 preguntas correspondientes a 5 categorias (5 preguntas por categoría) recibiras todos los puntos que se muestran en la parte superior derecha. En caso de que te equivoques en una pregunta perderás tus puntos y tendrás que iniciar nuevamente.</p>
            <p>- Ganarás puntos por cada categoría superada, es decir, cada vez que respondas 5 preguntas de forma correcta.</p>
            <strong>Si deseas retirarte del juego lo puedes hacer en cualquier momento. Al hacerlo se te sumaran los puntos que lleves hasta el momento.<strong>
                    <strong class="text-success">¡Muchísima suerte!</strong>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-3">
        <div class="col-6">
        <a href="concursoPreguntas.php?idCategoria=<?php echo $_SESSION["numCategoria"]; ?>" class="btn btn-success btn-block ">Iniciar juego</a>
        </div>
    </div>
</div>

<?php
require_once("footer.php");
?>