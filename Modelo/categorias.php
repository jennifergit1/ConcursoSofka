<?php

class categoriasModel
{

    private $idCategoria;
    private $nombreCategoria;
    private $puntos;

    function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;
    }
    function getIdCategoria()
    {
        return $this->idCategoria;
    }

    function setNombreCategoria($nombreCategoria)
    {
        $this->nombreCategoria = $nombreCategoria;
    }
    function getNombreCategoria()
    {
        return $this->nombreCategoria;
    }

    function setPuntos($puntos)
    {
        $this->puntos = $puntos;
    }
    function getPuntos()
    {
        return $this->puntos;
    }

    function consultarNumeroPregunta(){
        $db= Db::conexion();
        $sql = $db->prepare("SELECT idPregunta FROM preguntas WHERE idCategoria = :idCategoria");
        $sql->bindValue("idCategoria", $this->getIdCategoria());

        try {
            $sql->execute();
            $resultado = $sql->rowCount();
            return $resultado;
        } catch (Exception $e) {
            echo "ocurrio un error:" . $e->getMessage();
        }
    }

    function listarCategorias(){
        $db= Db::conexion();
        $sql=$db->query("SELECT * FROM categorias");
        $listarCategorias = [];
        foreach ($sql->fetchAll() as  $value) {
            $categorias = new categoriasModel();
            $categorias->setIdCategoria($value['idCategoria']);
            $categorias->setNombreCategoria($value['nombreCategoria']);
            $categorias->setPuntos($value['puntos']);
    
            $listarCategorias[] = $categorias;
        }
        return $listarCategorias;
    }


    function listarDatosCategoria(){
        $db = Db::conexion();
        $sql =   $db->prepare("SELECT * FROM categorias WHERE idCategoria= :idCategoria");
        $sql->bindValue('idCategoria', $this->getIdCategoria());
        try {
            $sql->execute();
            $resultado = $sql->fetch(); //Almacena una fila de registro de la base de datos como array
            $datosCategoria = [];
            $categorias = new categoriasModel();
            $categorias->setIdCategoria($resultado['idCategoria']); //Corchetes son las columnas de la base de datos
            $categorias->setNombreCategoria($resultado['nombreCategoria']);
            $categorias->setPuntos($resultado['puntos']);
            
            $datosCategoria[] = $categorias;

            return $datosCategoria;
            // return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            //throw $th;
        }
    }


    function editarCategoria()
    {
        $editadoExitoso = false;
        $db = Db::conexion();
        $sql = $db->prepare("UPDATE categorias SET nombreCategoria=:nombreCategoria, puntos=:puntos WHERE idCategoria=:idCategoria");

        $sql->bindValue("idCategoria", $this->getIdCategoria());
        $sql->bindValue("nombreCategoria", $this->getNombreCategoria());
        $sql->bindValue("puntos", $this->getPuntos());

        try {
            $sql->execute();
            $editadoExitoso = true;
            return  $editadoExitoso;

        } catch (Exception $e) {
            echo ("ha ocurrido un error" . $e);
        }
    }

    function obtenerPuntosCategoria(){
        $db = Db::conexion();
        $sql =   $db->prepare("SELECT puntos FROM categorias WHERE idCategoria= :idCategoria");
        $sql->bindValue('idCategoria', $this->getIdCategoria());
        try {
            $sql->execute();
            $respuesta = $sql->fetchColumn(0);
            return $respuesta;
            // return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            //throw $th;
        }
    }

    function verCategoria(){
        $db = Db::conexion();
        $sql =   $db->prepare("SELECT nombreCategoria FROM categorias WHERE idCategoria= :idCategoria");
        $sql->bindValue('idCategoria', $this->getIdCategoria());
        try {
            $sql->execute();
            $respuesta = $sql->fetchColumn(0);
            return $respuesta;
            // return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            //throw $th;
        }
    }
}
