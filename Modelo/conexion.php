<?php
class Db
{
    public static function conexion()
    {
        $usuario = "root";
        $clave = "";
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=concursosofka", $usuario, $clave);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "La conexión ha fallado: " . $e->getMessage();
        }
        return $conexion;
    }
}

?>