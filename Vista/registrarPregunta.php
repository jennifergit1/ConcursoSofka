<?php
session_start();
if (!isset($_SESSION["idUsuario"]))
    echo "<script>window.location.href='login.php'</script>";
require_once("header.php");
require_once("../Modelo/conexion.php");
require_once("../Modelo/categorias.php");
$categoriasModel = new categoriasModel();
$listaCategorias = $categoriasModel->listarCategorias();
?>

<div class="">
    <div class="row justify-content-center">
        <div class="col-md-10 mt-2 border bg-white p-5">
            <form action="../Controlador/preguntasControlador.php" method="post" id="formularioRegistrar">
                <h3 class="text-center">Registrar pregunta</h3>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label>Pregunta</label>
                        <textarea class="form-control" name="pregunta" id="pregunta" rows="3" placeholder="Descripción de la pregunta"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label>Seleccionar categoria </label>
                    <select class="form-control" id="idCategoria" name="idCategoria">
                        <?php foreach ($listaCategorias as $value) { ?>
                            <option value="<?php echo $value->getIdCategoria(); ?>"><?php echo $value->getnombreCategoria(); ?></option>
                        <?php } ?>
                    </select>
                </div>

                <h3 class="text-center">Registrar respuestas</h3>
                <div class="form-group">
                    <label for="respuesta1">Respuesta 1</label>
                    <textarea name="respuesta[]" id="respuesta1" class="form-control" placeholder="" aria-describedby="helpId"></textarea>
                    <small id="helpId" class="text-muted"></small>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="correcta" id="correcta1" value="0">
                            Opción Correcta.
                        </label>
                    </div>
                </div>
                <div class="form-group mt-5 mb-2">
                    <label for="respuesta2">Respuesta 2</label>
                    <textarea name="respuesta[]" id="respuesta2" class="form-control" placeholder="" aria-describedby="helpId"></textarea>
                    <small id="helpId" class="text-muted"></small>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="correcta" id="correcta2" value="1">
                            Opción Correcta.
                        </label>
                    </div>
                </div>
                <div class="form-group mt-4">
                    <label for="respuesta3">Respuesta 3</label>
                    <textarea name="respuesta[]" id="respuesta3" class="form-control" placeholder="" aria-describedby="helpId"></textarea>
                    <small id="helpId" class="text-muted"></small>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="correcta" id="correcta3" value="2">
                            Opción Correcta.
                        </label>
                    </div>
                </div>
                <div class="form-group mt-4">
                    <label for="respuesta4">Respuesta 4</label>
                    <textarea name="respuesta[]" id="respuesta4" class="form-control" placeholder="" aria-describedby="helpId"></textarea>
                    <small id="helpId" class="text-muted"></small>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="correcta" id="correcta4" value="3">
                            Opción Correcta.
                        </label>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <a href="inicio.php" class="text-center btn btn-danger col-4 mr-3">Volver</a>
                    <button id="registrarPregunta" name="registrarPregunta" type="submit" class="btn btn-primary btn-block col-4">Registrar pregunta</button>
                </div>
            </form>
        </div>
    </div>


</div>

<?php
include_once "footer.php";
?>