<?php
include("conexion.php");

class Tipo extends Conexion
{
    private $conexion, $id, $nombre, $monto, $estatus;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->getBD();
    }

    public function setDatos($datos)
    {
        $this->id = isset($datos["ID"]) ? $datos["ID"] : null;
        $this->nombre = isset($datos["Nombre"]) ? $datos["Nombre"] : null;
        $this->monto = isset($datos["Monto"]) ? $datos["Monto"] : null;
        $this->estatus = isset($datos["Estatus"]) ? $datos["Estatus"] : null;
    }

    public function nombreRepetido()
    {
        $sql = $this->conexion->prepare("SELECT * FROM tipovehiculo WHERE tipoVehiculo_nombre = ?");
        $sql->execute([$this->nombre]);
        $resultdo = $sql->fetchAll(PDO::FETCH_ASSOC);
        if (count($resultdo) >= 1) {
            return true;
        } else {
            return false;
        }
    }

    public function Registro()
    {
        $sql = $this->conexion->prepare("INSERT INTO tipovehiculo(tipoVehiculo_nombre,tipoVehiculo_precio,tipoVehiculo_estatus) VALUES(?,?,?)");
        $sql->execute([$this->nombre, $this->monto, 1]);
        if ($sql->rowCount() > 0) {
            return 1;
        } else {
            return 2;
        }
    }

    public function Editar()
    {
        $sql = $this->conexion->prepare("UPDATE tipovehiculo SET tipoVehiculo_nombre = ?, tipoVehiculo_precio =? WHERE tipoVehiculo_id = ?");
        $sql->execute([$this->nombre, $this->monto, $this->id]);
        return 4;
    }

    public function Eliminar()
    {
        $sql = $this->conexion->prepare("UPDATE tipovehiculo SET tipoVehiculo_estatus = ? WHERE tipoVehiculo_id = ?");
        $sql->execute([$this->estatus, $this->id]);
    }

    public function ConsultarTodo()
    {
        $sql = $this->conexion->prepare("SELECT * FROM tipovehiculo");
        if ($sql->execute()) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultado = [];
        }
        return $resultado;
    }

    public function consultarUno()
    {
        $sql = $this->conexion->prepare("SELECT * FROM tipovehiculo WHERE tipoVehiculo_id = ?");
        if ($sql->execute([$this->id])) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultado = [];
        }
        return $resultado;
    }
}
