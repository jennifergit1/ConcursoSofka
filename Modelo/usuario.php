<?php
class usuariosModel
{

    private $idUsuario;
    private $nombreUsuario;
    private $correo;
    private $contrasena;
    private $admin;
    private $puntosUsuario;

    function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    function getIdUsuario()
    {
        return $this->idUsuario;
    }
    function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;
    }

    function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }
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

    function setAdmin($admin)
    {
        $this->admin = $admin;
    }

    function getAdmin()
    {
        return $this->admin;
    }

    function setPuntosUsuario($puntosUsuario)
    {
        $this->puntosUsuario = $puntosUsuario;
    }

    function getPuntosUsuario()
    {
        return $this->puntosUsuario;
    }

    function registrarUsuario()
    {
        $db = Db::conexion();
        $registroExitoso = false;

        $sql = $db->prepare("INSERT INTO usuarios VALUES(NULL,:nombreUsuario,:correo,:contrasena, false,0) ");
        $sql->bindValue("nombreUsuario", $this->getNombreUsuario());
        $sql->bindValue("correo", $this->getCorreo());
        $sql->bindValue("contrasena", $this->getContrasena());

        try {
            $sql->execute();
            $registroExitoso = true;
            return $registroExitoso;
        } catch (Exception $e) {
            echo "ocurrio un error:" . $e->getMessage();
        }
    }

    function listarUsuarios()
    {
        $db = Db::conexion();
        $sql = $db->query("SELECT idUsuario, nombreUsuario, correo, contrasena,admin, puntosUsuario FROM usuarios ");

        $listarUsuarios = [];
        foreach ($sql->fetchAll() as  $value) {
            $usuarios = new usuariosModel();
            $usuarios->setIdUsuario($value['idUsuario']);
            $usuarios->setNombreUsuario($value['nombreUsuario']);
            $usuarios->setCorreo($value['correo']);
            $usuarios->setContrasena($value['contrasena']);
            $usuarios->setAdmin($value['admin']);
            $usuarios->setPuntosUsuario($value['puntosUsuario']);


            $listarUsuarios[] = $usuarios;
        }
        return $listarUsuarios;
    }

    function acumularPuntos()
    {
        $db = Db::conexion();
        $actualizado = false;
        $sql = $db->prepare("UPDATE usuarios SET puntosUsuario = puntosUsuario + :puntosUsuario WHERE idUsuario = :idUsuario");
        $sql->bindValue("idUsuario", $this->getIdUsuario());
        $sql->bindValue("puntosUsuario", $this->getPuntosUsuario());

        try {
            $sql->execute();
            $actualizado = true;
            return $actualizado;
        } catch (Exception $e) {
            echo "ocurrio un error:" . $e->getMessage();
        }
    }

    function listarDatosUsuarioPorIdUsuario()
    {
        $db = Db::conexion();
        $sql = $db->prepare("SELECT idUsuario, nombreUsuario, correo, contrasena,admin, puntosUsuario FROM usuarios WHERE idUsuario = :idUsuario");
        $sql->bindValue("idUsuario", $this->getIdUsuario());

        try {
            $sql->execute();
            $listarUsuarios = [];
            $respuesta = $sql->fetch();
            $usuarios = new usuariosModel();
            $usuarios->setIdUsuario($respuesta['idUsuario']);
            $usuarios->setNombreUsuario($respuesta['nombreUsuario']);
            $usuarios->setCorreo($respuesta['correo']);
            $usuarios->setContrasena($respuesta['contrasena']);
            $usuarios->setAdmin($respuesta['admin']);
            $usuarios->setPuntosUsuario($respuesta['puntosUsuario']);
            $listarUsuarios[] = $usuarios;
            return $listarUsuarios;
        } catch (Exception $e) {
            echo "ocurrio un error:" . $e->getMessage();
        }
    }
}
