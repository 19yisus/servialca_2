<?php
session_start();
$id = $_SESSION["usuario_id"];
?>
<!doctype html>
<html lang="en">
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
            <div class="col-md-12 mx-auto row">
                <h3 class="text-center bg-dark py-2 text-light">Ingreso Y Egreso</h3>
                <div class="col-md-7">
                    <div class="col-md-12 mx-auto row justify-content-center">
                        <input type="hidden" id="Nombre" value=<?php echo $id ?>>
                        <div class="col-md-3">
                            <input type="date" class="form-control" id="fecha1">
                        </div>
                        <div class="col-md-3">
                            <input type="date" class="form-control" id="fecha2">
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-primary" id="Buscar">Buscar</button>
                        </div>
                    </div>
                    <div class="mx-auto col-md-12 row" style="max-height: 50%;">
                        <canvas id="myChart"></canvas>
                    </div>
                    <div class="col-md-12 mx-auto py-5">
                        <h5 class="text-center">Datos</h5>
                        <table class="table table-sm table-hover table-striped" id="tabla">
                            <thead>
                                <tr>
                                    <th class="text-center bg-danger
                                    text-light">Fecha</th>
                                    <th class="text-center bg-danger
                                    text-light">Asesor</th>
                                    <th class="text-center bg-danger
                                    text-light">Sucursal</th>
                                    <th class="text-center bg-danger
                                    text-light">Motivo</th>
                                    <th class="text-center bg-danger
                                    text-light">Tipo de pago</th>
                                    <th class="text-center bg-danger
                                    text-light">Referencia</th>
                                    <th class="text-center bg-danger
                                    text-light">Monto</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="col-md-4 py-3">
                    <canvas id="myChart2"></canvas>
                </div>
            </div>
        </div>
        <!------main-content-end----------->
    </div>
    </div>
    <!-------complete html----------->
    <!-- Optional JavaScript -->
    <?php include("../../include/script.php") ?>
    <!-- Asesor -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
<?php include("js.php") ?>

</html>