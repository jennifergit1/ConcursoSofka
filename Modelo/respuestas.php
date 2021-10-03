<?php
class respuestasModel
{
    private $idRespuesta;
    private $idPregunta;
    private $respuesta;
    private $correcta;

    function setIdRespuesta($idRespuesta)
    {
        $this->idRespuesta = $idRespuesta;
    }
    function getIdRespuesta()
    {
        return $this->idRespuesta;
    }

    function setIdPregunta($idPregunta)
    {
        $this->idPregunta = $idPregunta;
    }
    function getIdPregunta()
    {
        return $this->idPregunta;
    }

    function setRespuesta($respuesta)
    {
        $this->respuesta = $respuesta;
    }
    function getRespuesta()
    {
        return $this->respuesta;
    }

    function setCorrecta($correcta)
    {
        $this->correcta = $correcta;
    }
    function getCorrecta()
    {
        return $this->correcta;
    }

    function registrarRespuesta()
    {
        $db = Db::conexion();
        $registroExitoso = false;

        $sql = $db->prepare("INSERT INTO respuestas VALUES(NULL,:idPregunta,:respuesta,:correcta) ");
        $sql->bindValue("idPregunta", $this->getIdPregunta());
        $sql->bindValue("respuesta", $this->getRespuesta());
        $sql->bindValue("correcta", $this->getCorrecta());

        try {
            $sql->execute();
            $registroExitoso = true;
            return $registroExitoso;
        } catch (Exception $e) {
            echo "ocurrio un error:" . $e->getMessage();
        }
    }

    function editarRespuesta()
    {
        $db = Db::conexion();
        $registroExitoso = false;

        $sql = $db->prepare("UPDATE respuestas SET respuesta = :respuesta, correcta = :correcta WHERE idPregunta = :idPregunta AND idRespuesta = :idRespuesta");
        $sql->bindValue("idPregunta", $this->getIdPregunta());
        $sql->bindValue("idRespuesta", $this->getIdRespuesta());
        $sql->bindValue("respuesta", $this->getRespuesta());
        $sql->bindValue("correcta", $this->getCorrecta());

        try {
            $sql->execute();
            $registroExitoso = true;
            return $registroExitoso;
        } catch (Exception $e) {
            echo "ocurrio un error:" . $e->getMessage();
        }
    }

    function listarRespuestas()
    {
        $db = Db::conexion();

        $sql = $db->prepare("SELECT * FROM respuestas WHERE idPregunta=:idPregunta");
        $sql->bindValue('idPregunta', $this->getIdPregunta());

        $listarRespuestas = [];
        try {
            $sql->execute();
            foreach ($sql->fetchAll() as  $value) {
                $respuesta = new respuestasModel();
                $respuesta->setIdRespuesta($value['idRespuesta']);
                $respuesta->setRespuesta($value['respuesta']);
                $respuesta->setCorrecta($value['correcta']);

                $listarRespuestas[] = $respuesta;
            }

            return $listarRespuestas;
        } catch (Exception $e) {
            echo "ocurrio un error:" . $e->getMessage();
        }
    }

    function listarAlAzarPorPregunta()
    {
        $db = Db::conexion();

        $sql = $db->prepare("SELECT * FROM respuestas WHERE idPregunta=:idPregunta ORDER BY RAND()");
        $sql->bindValue('idPregunta', $this->getIdPregunta());

        $listarRespuestas = [];
        try {
            $sql->execute();
            foreach ($sql->fetchAll() as  $value) {
                $respuesta = new respuestasModel();
                $respuesta->setIdRespuesta($value['idRespuesta']);
                $respuesta->setRespuesta($value['respuesta']);
                $respuesta->setCorrecta($value['correcta']);

                $listarRespuestas[] = $respuesta;
            }
            return $listarRespuestas;
        } catch (Exception $e) {
            echo "ocurrio un error:" . $e->getMessage();
        }
    }

    function validarRespuesta()
    {
        $db = Db::conexion();
        $sql = $db->prepare("SELECT correcta FROM respuestas WHERE idRespuesta = :idRespuesta");
        $sql->bindValue("idRespuesta", $this->getIdRespuesta());

        try {
            $sql->execute();
            $resultado = $sql->fetchColumn(0); 
            return $resultado;
            // return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            //throw $th;
        }
    }



    function listarDatosRespuestas()
    {
        $db = Db::conexion();
        $sql = $db->prepare("SELECT * FROM respuestas WHERE idPregunta= :idPregunta");
        $sql->bindValue('idPregunta', $this->getIdPregunta());
        try {
            $sql->execute();
            $resultado = $sql->fetchAll(); //Almacena una fila de registro de la base de datos como array
            $datosRespuesta = [];

            foreach($resultado as $value){
                $respuestas = new respuestasModel();
                $respuestas->setIdRespuesta($value['idRespuesta']);
                $respuestas->setIdPregunta($value['idPregunta']); //Corchetes son las columnas de la base de datos
                $respuestas->setRespuesta($value['respuesta']);
                $respuestas->setCorrecta($value['correcta']);
    
                $datosRespuesta[] = $respuestas;
    
            }

         
            return $datosRespuesta;
            // return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            //throw $th;
        }
    }
}
