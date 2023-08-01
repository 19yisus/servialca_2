<?php
include("../Modelo/m_usuario.php");

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
        case "Buscar":
            Login();
            break;
        default:
            echo "No se puede procesar";
            break;
    }
}

function Registrar()
{
    $a = new Usuario();
    $a->setDatos($_POST);
    if ($a->nombreRepetido() == true) {
        $datos = 0;
    } else {
        $datos = $a->Registro();
        $a->Actualizar_permisos_vista();
    }
    echo $datos;
}

function Editar()
{
    $a = new Usuario();
    $a->setDatos($_POST);
    // if ($a->nombreRepetido() == true) {
    //     $datos = 0;
    // } else {
    $datos = $a->Editar();
    // }
    echo $datos;
}

function Eliminar()
{
    $a = new Usuario();
    $a->setDatos($_POST);
    $a->Eliminar();
}

function consultarTodo()
{
    $a = new Usuario();
    $datos = $a->ConsultarTodo();
    echo json_encode(["data" => $datos], false);
}

// function consultarUno()
// {
//     $a = new Usuario();
//     $a->setDatos($_POST);
//     $datos = $a->consultarUno();
//     echo json_encode(["data" => $datos], false);
// }

function consultarUno()
{
    $a = new Usuario();
    $datos = $a->consultarUno($_POST["ID"]);
    echo json_encode(["data" => $datos], false);
}

function Login()
{
    $a = new Usuario();
    $a->setDatos($_POST);
    $datos = $a->Login();
    echo json_encode(["data" => $datos], false);
}
