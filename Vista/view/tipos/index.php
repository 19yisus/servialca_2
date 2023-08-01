<?php
session_start();
?>
<!doctype html>
<html lang="en">
<?php include("../../include/header.html") ?>

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
                            <div class="row">
                                <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                                    <h2 class="ml-lg-2">Lista de tipos de vehiculos</h2>
                                </div>
                                <div class="col-sm-6 p-0 d-flex justify-content-lg-end justify-content-center">
                                    <a href="#tipo" class="btn btn-success" data-toggle="modal">
                                        <i class="material-icons">&#xE147;</i> <span>Nuevo</span></a>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover" id="tablaTipo">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Monto $</th>
                                    <th>Monto BS</th>
                                    <th>Estatus</th>
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
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php include("js.php") ?>
</body>

</html>