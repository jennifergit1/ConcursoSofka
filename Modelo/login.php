<?php

class loginModel
{
    private $correo;
    private $contrasena;
    function setCorreo($correo)
    {
        $this->correo = $correo;
    }
    function getCorreo()
    {
        return $this->correo;
    }

    function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }

    function getContrasena()
    {
        return $this->contrasena;
    }


    function iniciarSesion()
    {
        $db = Db::conexion();
        $sql = $db->prepare("SELECT idUsuario, nombreUsuario, correo, contrasena, admin FROM usuarios WHERE correo=:correo AND contrasena=:contrasena");

        $sql->bindValue("correo", $this->getCorreo());
        $sql->bindValue("contrasena", $this->getContrasena());

        try {
            $sql->execute();
            if ($sql->rowCount() == 1) {
                $respuesta = $sql->fetch(PDO::FETCH_ASSOC);
                return $respuesta;
            } else {
                return [];
            }
        } catch (Exception $e) {
            echo ("ha ocurrido un erro" . $e);
        }
    }
}
