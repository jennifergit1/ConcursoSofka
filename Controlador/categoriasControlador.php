<?php
require_once("../Modelo/conexion.php");
require_once("../Modelo/categorias.php");

$categoriasModel= new categoriasModel();

if(isset($_POST["editarCategoria"])){
    $categoriasModel->setIdCategoria($_POST["idCategoria"]);
    $categoriasModel->setNombreCategoria($_POST["nombreCategoria"]);
    $categoriasModel->setPuntos($_POST["puntos"]);

    $editadoExitoso= $categoriasModel->editarCategoria();
    if( $editadoExitoso){
        echo '<script language="javascript">alert("Categoria editada correctamente");</script>';
        echo '<script> window.location="../Vista/listarCategorias.php"</script>';

    }else{
        echo '<script language="javascript">alert("Ha ocurrido un error");</script>';
        echo '<script> window.location="../Vista/listarCategorias.php"</script>';
    }
}


?>