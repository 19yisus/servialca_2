<!doctype html>
<html lang="en">
<?php include("../../include/header.html");
error_reporting(0) ?>

<body>
    <div class="wrapper">
        <input type="checkbox" id="abrir-cerrar" name="abrir-cerrar" value="">
        <label class="bg-danger" for="abrir-cerrar">&#9776; <span class="abrir">Abrir</span><span class="cerrar">Cerrar</span></label>
        <?php include("../../include/menu.php") ?>
        <div id="contenido">
            <!------top-navbar-end----------->
            <!------main-content-start----------->
            <div class="main-content">
                <?php include("formulario.php") ?>
                <!-------complete html----------->
                <!-- Optional JavaScript -->
                <?php include("../../include/script.php") ?>
                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
</body>
<?php include("js.php") ?>

</html>