<?php
session_start();
if (isset($_SESSION['permisos']) && is_array($_SESSION['permisos'])) {
    $permiso = $_SESSION["permisos"];
} else {
    $permiso = [];
}

?>
<div id="sidebar" class="sidebar">
    <div class="sidebar-header">
        <h1><img src="../../img/logo2.png" class="img-fluid" /></h1>
    </div>
    <ul class="list-unstyled component m-0">
        <li class="active">
            <a href="../poliza/index.php" class="dashboard"><i class="material-icons">dashboard</i>Inicio </a>
        </li>
        <?php if (!empty($permiso)) { ?>
            <?php if (in_array("Contratos realizados", $permiso) || in_array("Lista de sucursales", $permiso) || in_array("Tipo de contratos", $permiso)) { ?>
                <li class="dropdown">
                    <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">aspect_ratio</i>Administrador
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu1">
                        <?php if (in_array("Contratos realizados", $permiso)) { ?>
                            <li><a href="../lista/">Contratos realizados</a></li>
                        <?php } ?>
                        <!-- <li><a href="../asesor/">lista de Asesores</a></li> -->
                        <?php if (in_array("Lista de sucursales", $permiso)) { ?>
                            <li><a href="../sucursal/">lista de Sucursales</a></li>
                        <?php } ?>
                        <?php if (in_array("Tipo de contratos", $permiso)) { ?>
                            <li><a href="../contrato/">Tipos de contratos</a></li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
            <?php if (in_array("Uso de vehiculo", $permiso) || in_array("Clase de vehiculo", $permiso) || in_array("Tipo de vehiculo", $permiso) || in_array("Linea de transporte", $permiso)) { ?>
                <li class="dropdown">
                    <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">directions_car</i> Datos de vehiculo
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu2">
                        <?php if (in_array("Uso de vehiculo", $permiso)) { ?>
                            <li><a href="../uso/">Uso de vehiculo</a></li>
                        <?php } ?>
                        <?php if (in_array("Clase de vehiculo", $permiso)) { ?>
                            <li><a href="../clase/">Clases de vehiculos</a></li>
                        <?php } ?>
                        <?php if (in_array("Tipo de vehiculo", $permiso)) { ?>
                            <li><a href="../tipos/">Tipos de vehiculos</a></li>
                        <?php } ?>
                        <?php if (in_array("Linea de transporte", $permiso)) { ?>
                            <li><a href="../transporte/">Linea de trasporte</a></li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
            <?php if (in_array("Usuarios", $permiso) || in_array("Roles", $permiso)) { ?>
                <li class="dropdown">
                    <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">account_circle</i> Datos de usuarios
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu3">
                        <?php if (in_array("Usuarios", $permiso)) { ?>
                            <li><a href="../usuarios/">Usuarios</a></li>
                        <?php } ?>
                        <?php if (in_array("Roles", $permiso)) { ?>
                            <li><a href="../roles/">Roles</a></li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
            <!-- Otras opciones adicionales que puedan depender de los permisos del usuario -->
            <?php if ($_SESSION["rol"] == "1") { ?>
                <li class="dropdown">
                    <a href="#homeSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">description</i> Graficas
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu4">
                        <li class="">
                            <a href="../graficas/"><i class="material-icons"></i>Estadisticas</a>
                        </li>
                        <li class="">
                            <a href="../ingresoEgreso/"><i class="material-icons"></i>Ingresos y Egresos</a>
                        </li>
                        <li class="">
                            <a href="../egreso/"><i class="material-icons"></i>Egresos</a>
                        </li>
                        <li class="">
                            <a href="../reporte/"><i class="material-icons"></i> Reporte</a>
                        </li>

                    </ul>
                </li>

                <li class="">
                    <a href="../medico/">Certificado medico</a>
                </li>
            <?php } ?>
        <?php } ?>
        <li class="">
            <a href="../../../carousel-01/login.php?exit">
                <i class="material-icons">exit_to_app</i> Salir
            </a>
        </li>
    </ul>
</div>