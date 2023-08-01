<?php
include("conexion.php");

class Datos extends Conexion
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->getBD();
    }

    public function Rol()
    {
        $sql = $this->conexion->prepare("SELECT * FROM roles WHERE roles_estatus = 1");
        if ($sql->execute()) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultado = [];
        }
        return $resultado;
    }

    public function Sucursal()
    {
        $sql = $this->conexion->prepare("SELECT * FROM sucursal WHERE sucursal_estatus = 1");
        if ($sql->execute()) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultado = [];
        }
        return $resultado;
    }

    public function Contrato()
    {
        $sql = $this->conexion->prepare("SELECT * FROM tipocontrato WHERE contrato_estatus = 1");
        if ($sql->execute()) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultado = [];
        }
        return $resultado;
    }

    public function Estado()
    {
        $sql = $this->conexion->prepare("SELECT * FROM estado WHERE estado_estatus = 1");
        if ($sql->execute()) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultado = [];
        }
        return $resultado;
    }

    public function Transporte()
    {
        $sql = $this->conexion->prepare("SELECT * FROM transporte WHERE transporte_estatus = 1");
        if ($sql->execute()) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultado = [];
        }
        return $resultado;
    }

    public function Uso()
    {
        $sql = $this->conexion->prepare("SELECT * FROM usovehiculo WHERE usoVehiculo_estatus = 1");
        if ($sql->execute()) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultado = [];
        }
        return $resultado;
    }

    public function Clase()
    {
        $sql = $this->conexion->prepare("SELECT * FROM clasevehiculo WHERE clase_estatus = 1");
        if ($sql->execute()) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultado = [];
        }
        return $resultado;
    }

    public function Tipo()
    {
        $sql = $this->conexion->prepare("SELECT * FROM tipovehiculo WHERE tipoVehiculo_estatus = 1");
        if ($sql->execute()) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultado = [];
        }
        return $resultado;
    }

    public function Marca()
    {
        $sql = $this->conexion->prepare("SELECT * FROM marca WHERE marca_estatus = 1");
        if ($sql->execute()) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultado = [];
        }
        return $resultado;
    }

    public function Modelo()
    {
        $sql = $this->conexion->prepare("SELECT * FROM modelo WHERE modelo_estatus = 1");
        if ($sql->execute()) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultado = [];
        }
        return $resultado;
    }
}
