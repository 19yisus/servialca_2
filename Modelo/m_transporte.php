<?php
include("conexion.php");

class Transporte extends Conexion
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
        $sql = $this->conexion->prepare("SELECT * FROM transporte WHERE transporte_nombre = ?");
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
        $sql = $this->conexion->prepare("INSERT INTO transporte(transporte_nombre, transporte_estatus) VALUES (?,?)");
        $sql->execute([$this->nombre, 1]);
        if ($sql->rowCount() > 0) {
            return 1;
        } else {
            return 2;
        }
    }

    public function Editar()
    {
        $sql = $this->conexion->prepare("UPDATE transporte SET transporte_nombre = ? WHERE transporte_id = ?");
        $sql->execute([$this->nombre, $this->id]);
        return 4;
    }

    public function Eliminar()
    {
        $sql = $this->conexion->prepare("UPDATE transporte SET transporte_estatus = ? WHERE transporte_id = ?");
        $sql->execute([$this->estatus, $this->id]);
    }

    public function ConsultarTodo()
    {
        $sql = $this->conexion->prepare("SELECT * FROM transporte");
        if ($sql->execute()) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultado = [];
        }
        return $resultado;
    }

    public function consultarUno()
    {
        $sql = $this->conexion->prepare("SELECT * FROM transporte WHERE transporte_id = ?");
        if ($sql->execute([$this->id])) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultado = [];
        }
        return $resultado;
    }
}
