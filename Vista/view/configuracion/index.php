<?php
session_start();

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
    <?php include("formulario.php") ?>
    </div>
    <!-------complete html----------->
    <!-- Optional JavaScript -->
    <?php include("../../include/script.php") ?>
    <?php include("js.php") ?>

</body>

</html>