<?php

include("../Modelo/m_cliente.php");

if (isset($_POST["operacion"])) {
    $consulta = $_POST["operacion"];
    switch ($consulta) {
        case "registrarMedico":
            registrarMedico();
            break;
            default:
            echo "No se puede procesar";
            break;
    }
}

if (isset($_GET["operacion"])) {
    $consulta = $_GET["operacion"];
    switch ($consulta) {
        case "consultarUno":
            consultarUno();
            break;
        case "consultarTodos":
            consultarTodos();
            break;
        case "consultarTitular":
            consultarTitular();
            break;
        case "consultarCumple":
            consultarCumple();
            break;
        case "consultarMedico":
            consultarMedico();
            break;
        default:
            echo "No se puede procesar";
            break;
    }
}


function registrarMedico()
{
    $a = new Cliente();
    $a->setDatos($_POST);
    $a->buscarCliente();
    $a->precioDolar($_POST["precioDolar"]);
    $a->debitoCredito($_POST["Ingreso"], $_POST["Motivo"]);
    $datos = $a->registrar();
    echo json_encode(["data" => $datos], false);
}

function consultarTodos()
{
    $a = new Cliente();
    $datos = $a->Consultar_Todos();
    echo json_encode(["data" => $datos], false);
}

function consultarUno()
{
    $a = new Cliente();
    $a->setDatos($_POST);
    $datos = $a->Consultar_Uno();
    echo json_encode(["data" => $datos], false);
}

function consultarTitular()
{
    $a = new Cliente();
    $a->setDatos($_POST);
    $datos = $a->consultar_Titular();
    echo json_encode(["data" => $datos], false);
}

function consultarCumple()
{
    $a = new Cliente();
    $datos = $a->Cumple();
    echo json_encode(["data" => $datos], false);
}

function consultarMedico(){
    $a = new Cliente();
    $datos = $a->Consultar_Medico($_POST["ID"]);
     echo json_encode(["data" => $datos], false);
}