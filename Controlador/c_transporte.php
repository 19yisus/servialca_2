<?php
include("../Modelo/m_transporte.php");

if (isset($_POST["operacion"])) {
    $operacion = $_POST["operacion"];
    switch ($operacion) {
        case "Registro":
            Registrar();
            break;
        case "Editar":
            Editar();
            break;
        default:
            echo "No se puede procesar";
            break;
    }
}

if (isset($_GET["operacion"])) {
    $consulta = $_GET["operacion"];
    switch ($consulta) {
        case "consultarTodos":
            consultarTodo();
            break;
        case "consultarUno":
            consultarUno();
            break;
        case "Eliminar":
            Eliminar();
            break;
        default:
            echo "No se puede procesar";
            break;
    }
}

function Registrar()
{
    $a = new Transporte();
    $a->setDatos($_POST);
    if ($a->nombreRepetido() == true) {
        $datos = 0;
    } else {
        $datos = $a->Registro();
    }
    echo $datos;
}

function Editar()
{
    $a = new Transporte();
    $a->setDatos($_POST);
    if ($a->nombreRepetido() == true) {
        $datos = 0;
    } else {
        $datos = $a->Editar();
    }

    echo $datos;
}

function Eliminar()
{
    $a = new Transporte();
    $a->setDatos($_POST);
    $a->Eliminar();
}

function consultarTodo()
{
    $a = new Transporte();
    $datos = $a->consultarTodo();
    echo json_encode(["data" => $datos], false);
}

function consultarUno()
{
    $a = new Transporte();
    $a->setDatos($_POST);
    $datos = $a->consultarUno();
    echo json_encode(["data" => $datos], false);
}
