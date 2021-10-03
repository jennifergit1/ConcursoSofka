<?php
require_once("../Modelo/conexion.php");
require_once("../Modelo/preguntas.php");
require_once("../Modelo/respuestas.php");
require_once("../Modelo/categorias.php");
session_start();
$preguntasModel = new preguntasModel();
$respuestasModel = new respuestasModel();
$categoriasModel = new categoriasModel();
$array = [1,2,3];
echo str_repeat("?", count($_SESSION["preguntasMostradas"])-1)."?";
$preguntasModel->setIdCategoria(1);
$preguntasModel->setNumPregunta(rand(1,5));
$pregunta = $preguntasModel->listarPreguntaPorNumPregunta($array);
echo var_dump($pregunta);
?>