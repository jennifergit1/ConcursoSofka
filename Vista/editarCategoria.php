<?php
session_start();
if (!isset($_SESSION["idUsuario"]))
    echo "<script>window.location.href='login.php'</script>";
require_once("header.php");
require_once("../Modelo/conexion.php");
require_once("../Modelo/categorias.php");
$categorias = new categoriasModel();
$categorias->setIdCategoria($_GET["idCategoria"]);
$datosCategorias = $categorias->listarDatosCategoria();

?>
<div class="row justify-content-center">
    <div class="col-md-6 mt-5 border bg-white p-5">
        <form action="../Controlador/categoriasControlador.php" method="post">
            <h3 class="text-center">Editar Categoria</h3>
            <div class="row mt-3">
                <input type="hidden" name="idCategoria" id="idCategoria" value="<?php echo $datosCategorias[0]->getIdCategoria(); ?>">
                <div class="col-md-6">
                    <input type="text" name="nombreCategoria" id="nombreCategoria" class="form-control" value="<?php echo $datosCategorias[0]->getNombreCategoria(); ?>">
                </div>
                <div class="col-md-6">
                    <input type="number" class="form-control" name="puntos" id="puntos" value="<?php echo $datosCategorias[0]->getPuntos(); ?>">
                </div>
            </div>
            <div class="d-flex justify-content-end mt-3">
                    <a href="listarCategorias.php" class="text-center btn btn-danger col-4 mr-3">Volver</a>
                <button name="editarCategoria" type="submit" class="btn btn-primary">Editar Categoria</button>
            </div>
        </form>
    </div>
</div>
<?php
require_once("footer.php");
?>