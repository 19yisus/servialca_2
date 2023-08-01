<?php
session_start();
$id = $_SESSION["usuario_id"];
$sucursal = $_SESSION["sucursal_id"];
?>
<!doctype html>
<html lang="en">

<head charset=utf-8></head>
<?php
include("../../include/header.html");

?>

<style>
    .fixed-header {
        position: sticky;
        top: 0;
        z-index: 999;
        background-color: white;
        /* Opcional: establece el color de fondo que desees */
    }

    .modal-header {
        position: relative;
    }

    .tab {
        border: 1px solid #ccc;
        margin-bottom: 2%;
        display: flex;
        justify-content: center;
    }

    .tab button {
        background-color: inherit;
        float: none;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 10px 16px;
        transition: 0.3s;
        font-size: 17px;
    }

    .tab button:hover {
        background-color: #ddd;
    }

    .tab button.active {
        background-color: #ccc;
    }

    /* Estilos para los formularios */
    .tabcontent {
        display: none;
    }
</style>

<body>
    <input type="checkbox" id="abrir-cerrar" name="abrir-cerrar" value="">
    <label class="bg-danger" for="abrir-cerrar">&#9776; <span class="abrir">Abrir</span><span class="cerrar">Cerrar</span></label>
    <?php include("../../include/menu.php") ?>
    <div id="contenido">
        <!------main-content-start----------->
        <div class="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrapper">
                        <div class="col-md-12 mx-auto row">
                            <div class="col-md-2">
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control precioDolarPantalla" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" class="form-control precioBolivarPantalla" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                    <span class="input-group-text">Bs</span>
                                </div>
                            </div>
                        </div>
                        <div class="table-title">
                            <div class="row align-items-center">
                                <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                                    <h2 class="ml-lg-2">Lista de contratos</h2>
                                </div>
                            </div>
                        </div>


                        <table class="table table-striped table-hover" id="tabla">
                            <thead>
                                <tr>
                                    <th>N° de contrato</th>
                                    <th>Fecha de vencimiento</th>
                                    <th>C.i / Rif</th>
                                    <th>Beneficiario</th>
                                    <th>Telefono</th>
                                    <th>placa</th>
                                    <th>Asesor</th>
                                    <th>Sucursal</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                        </table>
                    </div>
                </div>
                <!----add-modal start--------->
                <?php include("formulario.php") ?>
            </div>
        </div>
        <!------main-content-end----------->
    </div>
    </div>
    <!-------complete html----------->
    <!-- Optional JavaScript -->
    <?php include("../../include/script.php") ?>
</body>
<?php include("js.php") ?>


</html>