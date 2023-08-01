<?php

include("conexion.php");

class Vehiculo extends Conexion
{
    private $conexion, $placa;
    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->getBD();
    }

    public function setDatos($datos)
    {
        $this->placa = isset($datos["Placa"]) ? $datos["Placa"] : null;
    }

    public function Consultar_Uno()
    {
        $sql = $this->conexion->prepare("SELECT vehiculo.*, color.*, modelo.*, marca.*, usovehiculo.*, clasevehiculo.*, tipovehiculo.*
        FROM vehiculo
        INNER JOIN color ON color.color_id = vehiculo.color_id
        INNER JOIN modelo ON modelo.modelo_id = vehiculo.modelo_id
        INNER JOIN marca ON marca.marca_id = vehiculo.marca_id
        INNER JOIN usovehiculo ON usovehiculo.usovehiculo_id = vehiculo.uso_id
        INNER JOIN clasevehiculo ON clasevehiculo.clase_id = vehiculo.clase_id
        INNER JOIN tipovehiculo ON tipovehiculo.tipovehiculo_id = vehiculo.tipo_id 
        WHERE vehiculo_placa = ?");
        if ($sql->execute([$this->placa])) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultado = [];
        }
        return $resultado;
    }
}
