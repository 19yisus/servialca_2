<?php
include("../Modelo/m_ingreso.php");
if (isset($_POST["operacion"])) {
    $consulta = $_POST["operacion"];
    switch ($consulta) {
        case "diario":
            consulta_diaria();
            break;
        case "anual":
            consulta_anual();
            break;
    }
}


function consulta_diaria()
{
    $a = new Ingreso();
    $datos = $a->Consultar_Diario($_POST["Desde"], $_POST["Hasta"]);
    echo json_encode(["data" => $datos], false);
}

function consulta_anual()
{
    $a = new Ingreso();
    $datos = $a->Consultar_Anual();
    echo json_encode(["data" => $datos], false);
}
