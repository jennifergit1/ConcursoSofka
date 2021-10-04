<?php
require_once("../Modelo/conexion.php");
require_once("../Modelo/preguntas.php");
require_once("../Modelo/respuestas.php");
require_once("../Modelo/categorias.php");
session_start();

$preguntasModel = new preguntasModel();
$respuestasModel = new respuestasModel();
$categoriasModel = new categoriasModel();

if (isset($_POST["registrarPregunta"])) {
    $categoriasModel->setIdCategoria($_POST["idCategoria"]);
    $numPregunta = $categoriasModel->consultarNumeroPregunta();
    $numPregunta++;
    $preguntasModel->setPregunta($_POST["pregunta"]);
    $preguntasModel->setidCategoria($_POST["idCategoria"]);
    $preguntasModel->setNumPregunta($numPregunta);

    $preguntaRegistrada = $preguntasModel->registrarPregunta();
    if (isset($preguntaRegistrada["idPregunta"])) {
        for ($i = 0; $i < 4; $i++) {
            $respuestasModel->setRespuesta($_POST["respuesta"][$i]);
            $respuestasModel->setIdPregunta($preguntaRegistrada["idPregunta"]);
            if ($_POST["correcta"] == $i) {
                $respuestasModel->setCorrecta(1);
            } else {
                $respuestasModel->setCorrecta(0);
            }
            $respuestasModel->registrarRespuesta();
        }
        echo '<script language="javascript">alert("Pregunta registrada correctamente");</script>';
        echo '<script> window.location="../Vista/listarCategorias.php"</script>';
    }
} else if (isset($_POST["editarPregunta"])) {


    $preguntasModel->setIdPregunta($_POST["idPregunta"]);
    $preguntasModel->setPregunta($_POST["pregunta"]);

    $editadoExitoso = $preguntasModel->editarPregunta();

    if ($editadoExitoso) {
        for ($i = 0; $i < 4; $i++) {
            $respuestasModel->setIdRespuesta($_POST["idRespuesta"][$i]);
            $respuestasModel->setRespuesta($_POST["respuesta"][$i]);
            $respuestasModel->setIdPregunta($_POST["idPregunta"]);
            if ($_POST["correcta"] == $i) {
                $respuestasModel->setCorrecta(1);
            } else {
                $respuestasModel->setCorrecta(0);
            }
            $respuestasModel->editarRespuesta();
        }
        echo '<script language="javascript">alert("Pregunta editada correctamente");</script>';
        echo '<script> window.location="../Vista/listarCategorias.php"</script>';
    } else {
        echo '<script language="javascript">alert("Error");</script>';
        echo '<script> window.location="../Vista/listarCategorias.php"</script>';
    }
}else{
    if(isset($_SESSION["idUsuario"])){
        header("Location: ../Vista/inicio.php");
    }else{
        header("Location: ../Vista/login.php");
    }
}
