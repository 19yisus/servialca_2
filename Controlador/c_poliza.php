<?php

include("../Modelo/m_poliza.php");
if (isset($_POST["operacion"])) {
    $consulta = $_POST["operacion"];
    switch ($consulta) {
        case "Registro":
            registrarPoliza();
            break;
        case "Renovar":
            renovar();
            break;
        case "diario":
            consulta_diaria();
            break;
        case "anual":
            consulta_anual();
            break;
    }
}
if (isset($_GET["operacion"])) {
    $consulta = $_GET["operacion"];
    switch ($consulta) {
        case "ConsultarVencer":
            consultarVencer();
            break;
        case "ConsultarTodos":
            consultarTodo();
            break;
        case "consultarUno":
            consultarUno();
            break;
        case "consultarModal":
            consultarModal();
            break;
        case "Reporte":
            consultarReporte();
            break;
    }
}

function registrarPoliza()
{
    $a = new Poliza();
    $a->setDatos($_POST);
    $a->buscarCliente();
    $a->buscarTitular();
    $a->buscarMarca();
    $a->buscarModelo();
    $a->buscarColor();
    $a->buscarVehiculo();
    $a->RegistrarCobertura();
    $a->precioDolar($_POST["precioDolar"]);
    $a->debitoCredito($_POST["tipoIngreso"], $_POST["Motivo"]);
    $datos = $a->registarPoliza();
    $retor = $a->consultarUno($datos);
    echo  json_encode(["data" => $retor], false);
}

function consultarVencer()
{
    $a = new Poliza();
    $datos = $a->Vencer($_GET["ID"]);
    echo json_encode(["data" => $datos], false);
}

function consultarTodo()
{
    $a = new Poliza();
    $datos = $a->ConsultarTodo($_GET["ID"]);
    echo json_encode(["data" => $datos], false);
}

function consultarModal()
{
    $a = new Poliza();
    $datos = $a->consultarUno($_POST["ID"]);
    include_once("../Modelo/modal.php");
}

function consultarUno()
{
    $a = new Poliza();
    $datos = $a->consultarUno($_POST["ID"]);
    echo json_encode(["data" => $datos], false);
}

function renovar()
{
    $a = new Poliza();
    $a->setDatos($_POST);
    $a->precioDolar($_POST["PrecioDolar"]);
    $a->debitoCredito($_POST["tipoIngreso"], $_POST["Motivo"]);
    $a->EditarCobertura();
    $id = $a->renovar();
    $datos = $a->consultarUno($id);
    echo json_encode(["data" => $datos], false);
}

function consulta_diaria()
{
    $a = new Poliza();
    $datos = $a->Consultar_Diario($_POST["Desde"], $_POST["Hasta"]);
    echo json_encode(["data" => $datos], false);
}

function consulta_anual()
{
    $a = new Poliza();
    $datos = $a->consultar_anual();
    echo json_encode(["data" => $datos], false);
}

function consultarReporte()
{
    $a = new Poliza();
    $datos = $a->Reporte($_POST["Nombre"], $_POST["Desde"], $_POST["Hasta"]);
    include_once ("../Modelo/modal.php");
}
