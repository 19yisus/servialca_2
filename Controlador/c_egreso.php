<?php
include("../Modelo/m_egreso.php");
if (isset($_POST["operacion"])) {
    $consulta = $_POST["operacion"];
    switch ($consulta) {
        case "Registro":
            registrar();
            break;
    }
}

if (isset($_GET["operacion"])) {
    $consulta = $_GET["operacion"];
    switch ($consulta) {
        case "consultarTodos":
            consultarTodos();
            break;
    }
}


function registrar()
{
    $a = new Egreso();
    $a->setDatos($_POST);
    $a->precioDolar($_POST["Precio"]);
    $datos = $a->registrar();
    echo json_encode(["data" => $datos], false);
}

function consultarTodos()
{
    $a = new Egreso();
    $datos = $a->consultarTodos();
    echo json_encode(["data" => $datos], false);
}
