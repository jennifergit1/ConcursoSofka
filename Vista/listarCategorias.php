<?php
session_start();
if (!isset($_SESSION["idUsuario"]))
    echo "<script>window.location.href='login.php'</script>";
require_once("header.php");
require_once("../Modelo/conexion.php");
require_once("../Modelo/categorias.php");

$categorias = new categoriasModel();
$listarCategorias = $categorias->listarCategorias();

?>
<div class="continer-fluid">
    <div class="row  justify-content-center ">
        <div class="col-md-8 mt-5">
            <h2 style="text-align: center;">Categorias </h2>
            <br>
            <table class="table table-bordered bg-white">
                <thead>
                    <tr>
                        <th>Id </th>
                        <th>Nombre </th>
                        <th>Puntos</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listarCategorias as $value) {
                    ?>
                        <tr>
                            <td> <?php echo $value->getIdCategoria(); ?></td>
                            <td> <?php echo $value->getNombreCategoria(); ?></td>
                            <td> <?php echo $value->getPuntos(); ?></td>
                            <td> <a class="btn btn-primary" href="../Vista/editarCategoria.php?idCategoria=<?php echo $value->getIdCategoria(); ?>" title="Editar categoría"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-primary" href="../Vista/listarPreguntas.php?idCategoria=<?php echo $value->getIdCategoria(); ?>">Ver preguntas</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
require_once("footer.php");
?>