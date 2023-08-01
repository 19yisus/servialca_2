<?php
include("../Modelo/m_vehiculo.php");

if (isset($_GET["operacion"])) {
    $consulta = $_GET["operacion"];
    switch ($consulta) {
        case "consultarUno":
            consultarUno();
            break;
    }
}

function consultarUno()
{
    $a = new Vehiculo();
    $a->setDatos($_POST);
    $datos = $a->Consultar_Uno();
    echo json_encode(["data" => $datos], false);
}
