<?php
include("../Modelo/m_datos.php");

if (isset($_GET["operacion"])) {
    $operacion = $_GET["operacion"];
    switch ($operacion) {
        case "Rol":
            consultarRol();
            break;
        case "Sucursal":
            consultarSucursal();
            break;
        case "Contrato":
            consultarContrato();
            break;
        case "Estado":
            consultarEstado();
            break;
        case "Transporte":
            consultarTransporte();
            break;
        case "Uso":
            consultarUso();
            break;
        case "Clase":
            consultarClase();
            break;
        case "Tipo":
            consultarTipo();
            break;
        case "Marca":
            consultarMarca();
            break;
        case "Modelo":
            consultarModelo();
            break;
    }
}

function consultarModelo()
{
    $a = new Datos();
    $datos = $a->Modelo();
    echo json_encode(["data" => $datos], false);
}

function consultarMarca()
{
    $a = new Datos();
    $datos = $a->Marca();
    echo json_encode(["data" => $datos], false);
}

function consultarRol()
{
    $a = new Datos();
    $datos = $a->Rol();
    echo json_encode(["data" => $datos], false);
}

function consultarSucursal()
{
    $a = new Datos();
    $datos = $a->Sucursal();
    echo json_encode(["data" => $datos], false);
}

function consultarContrato()
{
    $a = new Datos();
    $datos = $a->Contrato();
    echo json_encode(["data" => $datos], false);
}

function consultarEstado()
{
    $a = new Datos();
    $datos = $a->Estado();
    echo json_encode(["data" => $datos], false);
}

function consultarTransporte()
{
    $a = new Datos();
    $datos = $a->Transporte();
    echo json_encode(["data" => $datos], false);
}

function consultarUso()
{
    $a = new Datos();
    $datos = $a->Uso();
    echo json_encode(["data" => $datos], false);
}

function consultarClase()
{
    $a = new Datos();
    $datos = $a->Clase();
    echo json_encode(["data" => $datos], false);
}

function consultarTipo()
{
    $a = new Datos();
    $datos = $a->Tipo();
    echo json_encode(["data" => $datos], false);
}
