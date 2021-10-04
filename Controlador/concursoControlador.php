<?php
require_once("../Modelo/conexion.php");
require_once("../Modelo/preguntas.php");
require_once("../Modelo/respuestas.php");
require_once("../Modelo/categorias.php");
require_once("../Modelo/usuario.php");
session_start();
$preguntasModel = new preguntasModel();
$respuestasModel = new respuestasModel();
$categoriasModel = new categoriasModel();
$usuariosModel = new usuariosModel();
$mensaje = "pregunta_correcta";

if (isset($_POST["enviarPregunta"])) {
    echo $_POST["respuesta"] . "<br>";
    $respuestasModel->setIdRespuesta($_POST["respuesta"]);
    $correcta = $respuestasModel->validarRespuesta();
    echo $correcta . "<br>";
    if ($correcta == 1) {
        if ($_SESSION["numCategoria"] >= 5 && count($_SESSION["preguntasMostradas"]) >= 5) {
            $categoriasModel->setIdCategoria($_SESSION["numCategoria"]);
            $puntos = $categoriasModel->obtenerPuntosCategoria();
            $_SESSION["puntosActuales"] += $puntos;
            $usuariosModel->setIdUsuario($_SESSION["idUsuario"]);
            $usuariosModel->setPuntosUsuario($_SESSION["puntosActuales"]);
            $respuesta = $usuariosModel->acumularPuntos(); 
            echo "<script>alert('¡Has ganado el juego! Se te acumularán ".$_SESSION["puntosActuales"]." puntos.');</script>";
            echo "<script>window.location.href='../Vista/iniciarJuego.php';</script>";
        }
        if (count($_SESSION["preguntasMostradas"]) >= 5) {
            $categoriasModel->setIdCategoria($_SESSION["numCategoria"]);
            $puntos = $categoriasModel->obtenerPuntosCategoria();
            $_SESSION["puntosActuales"] += $puntos;
            $_SESSION["preguntasMostradas"] = [];
            $_SESSION["numCategoria"]++;
            $_SESSION["numPregunta"]=0;
            $mensaje = "categoria";
            if($mensaje == "categoria")
            echo "<script>alert('¡Has ganado " . $puntos . " puntos!');</script>";
        }
        $_SESSION["numPregunta"]++;
        if($mensaje == "pregunta_correcta")
        echo "<script>alert('¡Respuesta correcta!');</script>";
        echo "<script>window.location.href='../Vista/concursoPreguntas.php?idCategoria=" . $_SESSION["numCategoria"] . "';</script>";
    } else { 
        echo "<script>alert('Perdiste ¡Que mal!');</script>";
        echo "<script>window.location.href='../Vista/iniciarJuego.php';</script>";
    }
}else if(isset($_GET["terminarJuego"])){

    $usuariosModel->setIdUsuario($_SESSION["idUsuario"]);
    $usuariosModel->setPuntosUsuario($_SESSION["puntosActuales"]);
    $respuesta = $usuariosModel->acumularPuntos(); 
    echo "<script>alert('Decidiste terminar el juego, se te acumularán ".$_SESSION["puntosActuales"]." puntos.');</script>";
    echo "<script>window.location.href='../Vista/iniciarJuego.php';</script>";
}else{
    if(isset($_SESSION["idUsuario"])){
        header("Location: ../Vista/inicio.php");
    }else{
        header("Location: ../Vista/login.php");
    }
}
