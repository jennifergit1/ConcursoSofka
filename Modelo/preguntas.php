<?php
class preguntasModel
{
    private $idPregunta;
    private $pregunta;
    private $idCategoria;
    private $numPregunta;

    function setIdPregunta($idPregunta)
    {
        $this->idPregunta = $idPregunta;
    }
    function getIdPregunta()
    {
        return $this->idPregunta;
    }

    function setPregunta($pregunta)
    {
        $this->pregunta = $pregunta;
    }
    function getPregunta()
    {
        return $this->pregunta;
    }

    function setidCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;
    }
    function getidCategoria()
    {
        return $this->idCategoria;
    }

    function setNumPregunta($numPregunta)
    {
        $this->numPregunta = $numPregunta;
    }
    function getNumPregunta()
    {
        return $this->numPregunta;
    }

    function registrarPregunta()
    {
        $db = Db::conexion();
        $registroExitoso = false;

        $sql = $db->prepare("INSERT INTO preguntas VALUES(NULL,:idCategoria,:pregunta,:numPregunta) ");
        $sql->bindValue("idCategoria", $this->getIdCategoria());
        $sql->bindValue("pregunta", $this->getPregunta());
        $sql->bindValue("numPregunta", $this->getNumPregunta());

        try {
            $sql->execute();
            $ultimaInsercion = $db->query("SELECT * FROM preguntas ORDER BY idPregunta DESC LIMIT 1");
            $respuesta = $ultimaInsercion->fetch(PDO::FETCH_ASSOC);
            return $respuesta;
        } catch (Exception $e) {
            echo "ocurrio un error:" . $e->getMessage();
        }
    }



    function totalPreguntasPorCategoria()
    {
        $db = Db::conexion();
        $sql = $db->prepare("SELECT COUNT(idPregunta) AS totalPreguntas FROM preguntas WHERE idCategoria = :idCategoria");
        $sql->bindValue("idCategoria", $this->getIdCategoria());
        try {
            $sql->execute();
            $respuesta = $sql->fetchColumn(0);
            return $respuesta;
        } catch (Exception $e) {
            echo "ocurrio un error:" . $e->getMessage();
        }
    }

    function listarPreguntaPorNumPregunta()
    {
        $db = Db::conexion();
        $sql = $db->prepare("SELECT * FROM preguntas WHERE numPregunta = :numPregunta AND idCategoria = :idCategoria");
        $sql->bindValue("numPregunta", $this->getNumPregunta());
        $sql->bindValue("idCategoria", $this->getIdCategoria());
        try {
            $sql->execute();
            $respuesta = $sql->fetch(PDO::FETCH_ASSOC);
            return $respuesta;
        } catch (Exception $e) {
            echo "ocurrio un error:" . $e->getMessage();
        }
    }

    function listarPreguntas()
    {
        $db = Db::conexion();
        $sql = $db->prepare("SELECT * FROM preguntas where idCategoria=:idCategoria");
        $sql->bindValue('idCategoria', $this->getIdCategoria());

        $listarPreguntas = [];
        try {
            $sql->execute();
            foreach ($sql->fetchAll() as  $value) {
                $preguntas = new preguntasModel();
                $preguntas->setIdPregunta($value['idPregunta']);
                $preguntas->setPregunta($value['pregunta']);
                $preguntas->setNumPregunta($value['numPregunta']);

                $listarPreguntas[] = $preguntas;
            }

            return $listarPreguntas;
        } catch (Exception $e) {
            echo "ocurrio un error:" . $e->getMessage();
        }
    }


    function listarDatosPreguntas()
    {
        $db = Db::conexion();
        $sql =   $db->prepare("SELECT * FROM preguntas WHERE idPregunta= :idPregunta");
        $sql->bindValue('idPregunta', $this->getIdPregunta());
        try {
            $sql->execute();
            $resultado = $sql->fetch(); //Almacena una fila de registro de la base de datos como array
            $datosPregunta = [];
            $preguntas = new preguntasModel();

            $preguntas->setIdPregunta($resultado['idPregunta']);
            $preguntas->setIdCategoria($resultado['idCategoria']); //Corchetes son las columnas de la base de datos
            $preguntas->setPregunta($resultado['pregunta']);
            $preguntas->setNumPregunta($resultado['numPregunta']);

            $datosPregunta[] = $preguntas;

            return $datosPregunta;
            // return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            //throw $th;
        }
    }

    function editarPregunta()
    {
        $db = Db::conexion();
        $edicionExitosa = false;

        $sql = $db->prepare("UPDATE preguntas SET pregunta = :pregunta WHERE idPregunta = :idPregunta");
        $sql->bindValue("idPregunta", $this->getIdPregunta());
        $sql->bindValue("pregunta", $this->getPregunta());

        try {
            $sql->execute();
            $edicionExitosa = true;
            return $edicionExitosa;
        } catch (Exception $e) {
            echo "ocurrio un error:" . $e->getMessage();
        }
    }
}
