<?php
include("conexion.php");

class Clase extends Conexion
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
        $sql = $this->conexion->prepare("SELECT * FROM clasevehiculo WHERE clase_nombre = ?");
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
        $sql = $this->conexion->prepare("INSERT INTO clasevehiculo(clase_nombre,clase_estatus) VALUES (?,?)");
        $sql->execute([$this->nombre, 1]);
        if ($sql->rowCount() > 0) {
            return 1;
        } else {
            return 2;
        }
    }

    public function Editar()
    {
        $sql = $this->conexion->prepare("UPDATE clasevehiculo SET clase_nombre = ? WHERE clase_id = ?");
        $sql->execute([$this->nombre, $this->id]);
        return 4;
    }

    public function Eliminar()
    {
        $sql = $this->conexion->prepare("UPDATE clasevehiculo SET clase_estatus = ? WHERE clase_id = ?");
        $sql->execute([$this->estatus, $this->id]);
    }

    public function ConsultarTodo()
    {
        $sql = $this->conexion->prepare("SELECT * FROM clasevehiculo");
        if ($sql->execute()) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultado = [];
        }
        return $resultado;
    }

    public function consultarUno()
    {
        $sql = $this->conexion->prepare("SELECT * FROM clasevehiculo WHERE clase_id = ?");
        if ($sql->execute([$this->id])) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultado = [];
        }
        return $resultado;
    }
}
