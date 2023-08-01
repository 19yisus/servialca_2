<?php
foreach ($datos as $key) {

?>

    <div class="row">
        <strong>Datos del contrato</strong>
        <table class="table">
            <tr>
                <th scope="col">N° de contrato</th>
                <th scope="col">tipo de contrato</th>
                <th scope="col">fecha de emisión</th>
                <th scope="col">fecha de vencimiento</th>
            </tr>
            <tr>
                <td> <?php echo $key["poliza_id"] . "-" . $key["poliza_renovacion"] ?></td>
                <td> <?php echo $key["contrato_nombre"] ?></td>
                <td><?php echo date('d/m/Y', strtotime($key["poliza_fechaInicio"])); ?></td>
                <td><?php echo date('d/m/Y', strtotime($key["poliza_fechaVencimiento"])); ?></td>

            </tr>
        </table>
        <strong>Datos del cliente</strong>
        <table class="table">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Cédula</th>
                <th scope="col">Télefono</th>
                <th scope="col">Dirección</th>
                <th scope="col">Correo</th>
                <th scope="col">Fecha de nacimiento</th>
            </tr>
            <tr>
                <td><?php
                    if ($key["cliente_nombre"] == "" || $key["cliente_nombre"] == null) echo ("");
                    else echo $key["cliente_nombre"];
                    ?></td>
                <td> <?php
                        if ($key["cliente_apellido"] == "" || $key["cliente_apellido"] == null) echo ("");
                        else echo $key["cliente_apellido"] ?>
                </td>
                <td> <?php
                        if ($key["cliente_cedula"] == "" || $key["cliente_cedula"] == null) echo ("");
                        else echo $key["cliente_cedula"]
                        ?></td>
                <td> <?php
                        if ($key["cliente_telefono"] == "" || $key["cliente_telefono"] == null) echo ("");
                        else echo $key["cliente_telefono"] ?>
                </td>
                <td> <?php
                        if ($key["cliente_direccion"] == "" || $key["cliente_direccion"] == null) echo ("");
                        else echo $key["cliente_direccion"]
                        ?>
                </td>
                <td> <?php
                        if ($key["cliente_correo"] == "" || $key["cliente_correo"] == null) echo ("");
                        else echo $key["cliente_correo"] ?>
                </td>
                <td> <?php
                        if ($key["cliente_fechaNacimiento"] == "" || $key["cliente_fechaNacimiento"] == null) echo ("");
                        else echo $key["cliente_fechaNacimiento"] ?>
                </td>
            </tr>
        </table>
        <!----------------------->
        <strong>Datos del vehiculo</strong>
        <table class="table">
            <tr>
                <th scope="col">Placa</th>
                <th scope="col">Puestos</th>
                <th scope="col">Uso del vehiculo</th>
                <th scope="col">Año</th>
                <th scope="col">Ser. Motor</th>
                <th scope="col">Clase del vehiculo</th>
            </tr>
            <tr>
                <td><?php
                    if ($key["vehiculo_placa"] == "" || $key["vehiculo_placa"] == null) echo ("");
                    else echo $key["vehiculo_placa"];
                    ?></td>
                <td><?php
                    if ($key["vehiculo_puesto"] == "" || $key["vehiculo_puesto"] == null) echo ("");
                    else echo $key["vehiculo_puesto"];
                    ?></td>
                <td><?php
                    if ($key["usoVehiculo_nombre"] == "" || $key["usoVehiculo_nombre"] == null) echo ("");
                    else echo $key["usoVehiculo_nombre"];
                    ?></td>
                <td><?php
                    if ($key["vehiculo_año"] == "" || $key["vehiculo_año"] == null) echo ("");
                    else echo $key["vehiculo_año"];
                    ?></td>
                <td><?php
                    if ($key["vehiculo_serialMotor"] == "" || $key["vehiculo_serialMotor"] == null) echo ("");
                    else echo $key["vehiculo_serialMotor"];
                    ?></td>
                <td><?php
                    if ($key["clase_nombre"] == "" || $key["clase_nombre"] == null) echo ("");
                    else echo $key["clase_nombre"];
                    ?></td>
            </tr>

        </table>
        <!-- -------------------------------------------- -->
        <strong>Datos del vehiculo</strong>
        <table class="table">
            <tr>
                <th scope="col">color</th>
                <th scope="col">ser. Carroceria</th>
                <th scope="col">tipo de vehiculo</th>
                <th scope="col">modelo</th>
                <th scope="col">marca</th>
                <th scope="col">peso</th>
                <th scope="col">cap. Ton</th>
            </tr>
            <tr>
                <td><?php
                    if ($key["color_nombre"] == "" || $key["color_nombre"] == null) echo ("");
                    else echo $key["color_nombre"];
                    ?></td>
                <td><?php
                    if ($key["vehiculo_serialCarroceria"] == "" || $key["vehiculo_serialCarroceria"] == null) echo ("");
                    else echo $key["vehiculo_serialCarroceria"];
                    ?></td>
                <td><?php
                    if ($key["tipoVehiculo_nombre"] == "" || $key["tipoVehiculo_nombre"] == null) echo ("");
                    else echo $key["tipoVehiculo_nombre"];
                    ?></td>
                <td><?php
                    if ($key["modelo_nombre"] == "" || $key["modelo_nombre"] == null) echo ("");
                    else echo $key["modelo_nombre"];
                    ?></td>
                <td><?php
                    if ($key["marca_nombre"] == "" || $key["marca_nombre"] == null) echo ("");
                    else echo $key["marca_nombre"];
                    ?></td>
                <td><?php
                    if ($key["vehiculo_peso"] == "" || $key["vehiculo_peso"] == null) echo ("");
                    else echo $key["vehiculo_peso"];
                    ?></td>
                <td><?php
                    if ($key["vehiculo_capTon"] == "" || $key["vehiculo_capTon"] == null) echo ("");
                    else echo $key["vehiculo_capTon"];
                    ?></td>
            </tr>

        </table>
        <!-- ------------------------------------------- -->
        <!------------------------------------------>
    <?php } ?>
    </div>