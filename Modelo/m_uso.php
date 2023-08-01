<?php
include("conexion.php");

class Uso extends Conexion
{
    private $conexion, $id, $nombre, $estatus;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->getBD();
    }

    public function setDatos($datos)
    {
        $this->id = isset($datos["ID"]) ? $datos["ID"] : null;
        $this->nombre = isset($datos["Nombre"]) ? $datos["Nombre"] : null;
        $this->estatus = isset($datos["Estatus"]) ? $datos["Estatus"] : null;
    }

    public function nombreRepetido()
    {
        $sql = $this->conexion->prepare("SELECT * FROM usovehiculo WHERE usoVehiculo_nombre = ?");
        $sql->execute([$this->nombre]);
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        if (count($resultado) >= 1) {
            return true;
        } else {
            return false;
        }
    }

    public function Registro()
    {
        $sql = $this->conexion->prepare("INSERT INTO usovehiculo(usoVehiculo_nombre,usoVehiculo_estatus) VALUES (?,?)");
        $sql->execute([$this->nombre, 1]);
        if ($sql->rowCount() > 0) {
            return 1;
        } else {
            return 2;
        }
    }

    public function Editar()
    {
        $sql = $this->conexion->prepare("UPDATE usovehiculo SET usoVehiculo_nombre = ? WHERE usovehiculo_id = ?");
        $sql->execute([$this->nombre, $this->id]);
        return 4;
    }

    public function Eliminar()
    {
        $sql = $this->conexion->prepare("UPDATE usovehiculo SET usovehiculo_estatus = ? WHERE usovehiculo_id = ?");
        $sql->execute([$this->estatus, $this->id]);
    }

    public function ConsultarTodo()
    {
        $sql = $this->conexion->prepare("SELECT * FROM usovehiculo");
        if ($sql->execute()) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultado = [];
        }
        return $resultado;
    }

    public function consultarUno()
    {
        $sql = $this->conexion->prepare("SELECT * FROM usovehiculo WHERE usovehiculo_id = ?");
        if ($sql->execute([$this->id])) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultado = [];
        }
        return $resultado;
    }
}
