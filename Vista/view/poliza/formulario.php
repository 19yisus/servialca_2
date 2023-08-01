<div class="modal fade" id="addEmployeeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="fixed-header">
                <div class="modal-header text-light bg-danger">
                    <h5 class="modal-title">Registro</h5>
                    <div class="negra d-flex justify-content-end align-items-end w-100">
                        <div class="hora mr-2">
                            <h8 aria-label="Close" data-dismiss="modal" id="form_time">00:00:00</h8>
                        </div>
                        <div class="fecha px-2">
                            <h8 class="modal-title" id="form_date">date</h8>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="tab mt-2">
                    <a type="button" class="btn bg-info rounded text-light mx-1 tablinks active" onclick="abrirFormulario(event, 'formulario1')">Datos del cliente</a>
                    <a type="button" class="btn bg-info rounded text-light mx-1 tablinks" onclick="abrirFormulario(event, 'formulario2')">Datos del vehiculo</a>
                    <a type="button" class="btn bg-info rounded text-light mx-1 tablinks" onclick="abrirFormulario(event, 'formulario4')">Forma de pago</a>
                    <!-- <button class="tablinks" onclick="abrirFormulario(event, 'formulario3')">Garantia</button> -->
                </div>
            </div>
            <div class="modal-body">
                <div id="formulario1" class="tabcontent">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Tipo de contrato</label>
                            <div class="input-group">
                                <select id="tipoContrato" class="form-control" required>
                                    <option value="a">Seleccionar</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Desde</label>
                                <input type="date" id="Desde" class="form-control Desde" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Hasta</label>
                                <input type="date" id="Hasta" class="form-control Hasta" disabled>
                            </div>
                        </div>
                    </div>
                    <span style="display: block;text-align:center; color:red;">Datos del
                        contratante</span>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Cédula</label>
                                <div class="input-group">
                                    <div class="predent">
                                        <select name="Nacionalidad" id="Nacionalidad" class="form-control">
                                            <option value="V-">V-</option>
                                            <option value="E-">E-</option>
                                            <option value="J-">J-</option>
                                            <option value="G-">G-</option>
                                        </select>
                                    </div>
                                    <input type="text" name="Cedula" id="Cedula" class="form-control numero">
                                    <div class="input-group-append">
                                        <a href="#" id="btn-add-employee" class="input-group-text" class="edit" data-toggle="modal">
                                            <span class="material-symbols-outlined" id="buscar_cliente">
                                                search
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="Nombre" id="Nombre" class="form-control mayuscula">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Apellido</label>
                                <input type="text" name="Apellido" id="Apellido" class="form-control mayuscula">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Fecha de nacimiento</label>
                                <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Teléfono</label>
                                <div class="input-group">
                                    <div class="predent">
                                        <select id="Codigo" class="form-control">
                                            <option value="0412-">0412-</option>
                                            <option value="0414-">0414-</option>
                                            <option value="0416-">0416-</option>
                                            <option value="0424-">0424-</option>
                                            <option value="0426-">0426-</option>
                                        </select>
                                    </div>
                                    <input type="text" name="Telefono" id="Telefono" class="form-control numero">

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Correo</label>
                                <input type="text" name="Correo" id="Correo" class="form-control mayuscula" placeholder="No es obligatorio">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Dirección</label>
                                <input type="text" name="Direccion" id="Direccion" class="form-control mayuscula">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Estado</label>
                                <div class="input-group">
                                    <select name="Estado" id="Estado" class="form-control mayuscula" required>
                                        <option value="a">Seleccionar</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>asesor</label>
                                <div class="input-group">
                                    <select name="asesor" id="Asesor" class="form-control mayuscula" required>
                                        <?php
                                        echo "<option value='$_SESSION[usuario_id]'>$_SESSION[usuario]</option>";
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Sucursal</label>
                                <select id="Sucursal" class="form-control mayuscula">
                                    <?php
                                    echo "<option value='$_SESSION[sucursal_id]'>$_SESSION[sucursal]</option>";
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Linea de transporte</label>
                                <div class="input-group">
                                    <select id="Transporte" class="form-control" required>
                                        <option value="a">Seleccionar</option>
                                    </select>
                                    <!-- <div class="input-group-append">
                                        <a id="btn-add-employee" class="input-group-text" href="#linea" class="edit mayuscula" data-toggle="modal">
                                            <span class="material-symbols-outlined">
                                                add_circle
                                            </span>
                                        </a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <span style="display: block;text-align:center; color:red;">Titular</span>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Cédula</label>
                                <div class="input-group">
                                    <div class="predent">
                                        <select id="Nacionalidad2" class="form-control">
                                            <option value="V-">V-</option>
                                            <option value="E-">E-</option>
                                            <option value="J-">J-</option>
                                            <option value="G-">G-</option>
                                        </select>
                                    </div>
                                    <input type="text" name="Cedula2" id="Cedula2" class="form-control numero">
                                    <a href="#" id="btn-add-employee" class="input-group-text" class="edit" data-toggle="modal">
                                        <span class="material-symbols-outlined" id="buscar_titular">
                                            search
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="Nombre2" id="Nombre2" class="form-control mayuscula">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Apellido</label>
                                <input type="text" name="Apellido2" id="Apellido2" class="form-control mayuscula">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Vehiculo -->
                <div id="formulario2" class="tabcontent">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>placa</label>
                                <div class="input-group">
                                    <input name="Placa" id="Placa" class="form-control mayuscula" required>
                                    <div class="input-group-append">
                                        <a id="btn-add-employee" class="input-group-text" href="#" class="edit" data-toggle="modal">
                                            <span class="material-symbols-outlined" id="buscar_vehiculo">
                                                search
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Puesto</label>
                                <input type="text" name="Puestos" id="Puestos" class="form-control numero">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Uso del vehiculo</label>

                                <select id="Uso" class="form-control" required>
                                    <option value="a">Seleccionar</option>
                                </select>
                                <!-- <div class="input-group-append">
                                        <a id="btn-add-employee" class="input-group-text" href="#uso" class="edit mayuscula" data-toggle="modal">
                                            <span class="material-symbols-outlined">
                                                add_circle
                                            </span>
                                        </a>
                                    </div> -->

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>año</label>
                                <input type="text" id="Año" class="form-control numero">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Ser. Motor</label>
                                <input type="text" id="serialMotor" class="form-control mayuscula">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Clase</label>
                                <select id="Clase" class="form-control mayuscula" required>

                                </select>
                                <!-- <div class="input-group-append">
                                        <a id="btn-add-employee" class="input-group-text" href="#clase" class="edit" data-toggle="modal">
                                            <span class="material-symbols-outlined">
                                               add_circle
                                            </span>
                                    </a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>color</label>
                                <input type="text" id="Color" class="form-control texto mayuscula">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Ser. Carroceria</label>
                                <input type="text" id="serialCarroceria" class="form-control mayuscula">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tipo de vehiculo</label>

                                <select id="Tipo" class="form-control mayuscula" required>
                                    <option value="a">Seleccionar</option>
                                </select>
                                <!-- <div class="input-group-append">
                                        <a id="btn-add-employee" class="input-group-text" href="#tipo" class="edit" data-toggle="modal">
                                            <span class="material-symbols-outlined">
                                                add_circle
                                            </span>
                                        </a>
                                    </div> -->

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Modelo</label>
                                <input type="text" name="Modelo" id="Modelo" class="form-control mayuscula">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Marca</label>
                                <input type="text" name="Marca" id="Marca" class="form-control mayuscula">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>peso</label>
                                <input type="text" name="Peso" id="Peso" class="form-control" placeholder="No es obligatorio">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Cap. Ton</label>
                                <input type="text" name="Capacidad" id="Capacidad" class="form-control" placeholder="No es obligatorio">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Garantia -->
                <div id="formulario3" class="tabcontent">
                    <span style="display: block;text-align:center; color:red;">Responsabilidad
                        civil</span>
                    <div class="row">
                        <div class="col-md-4 " style=" margin-top:30px; margin-left:15%;">
                            <span>Por daños a casos</span>
                        </div>
                        <div class="col-md-4" style="margin-top:30px;  margin-left:17%;">
                            <span>Por daños a personas</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label></label>
                                <input type="text" name="Nombre" id="dañoCosas" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label></label>
                                <input type="text" name="Nombre" id="calculoDañoCasos" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label></label>
                                <input type="text" name="Nombre" id="dañoPersonas" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label></label>
                                <input type="text" name="Nombre" id="calculoDañoPersonas" class="form-control">
                            </div>
                        </div>
                    </div>
                    <span style="display: block;text-align:center; color:red;">Fianza
                        Facultativa</span>
                    <div class="row">
                        <div class="col-md-4" style="margin-top:30px; margin-left:15%;">
                            <span> Fianza Facultativa</span>
                        </div>
                        <div class="col-md-4" style="margin-top:30px; margin-left:17%;">
                            <span> Asistencia Legal</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label></label>
                                <input type="text" name="Nombre" id="fianzaFacultativa" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label></label>
                                <input type="text" name="Nombre" id="calculoFianzaFacultativa" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label></label>
                                <input type="text" name="Nombre" id="asistenciaLegal" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label></label>
                                <input type="text" name="Nombre" id="calculoAsistenciaLegal" class="form-control">
                            </div>
                        </div>
                    </div>
                    <span style="display: block;text-align:center; color:red;">Accidente Ocupantes</span>
                    <div class="row">
                        <div class="col-md-4" style="margin-top:30px; margin-left:20%;">
                            <span>A.P.O.V</span>
                        </div>
                        <div class="col-md-4" style="margin-top:30px;">
                            <span style=" margin-left:52%;">Muerte</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label></label>
                                <input type="text" name="Nombre" id="apov" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label></label>
                                <input type="text" name="Nombre" id="calculoApov" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label></label>
                                <input type="text" name="Nombre" id="muerte" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label></label>
                                <input type="text" name="Nombre" id="calculoMuerte" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4" style="margin-top:30px; margin-left:19%;">
                            <span>invalidez</span>
                        </div>
                        <div class="col-md-4" style="margin-top:30px;  margin-left:14%;">
                            <span>gastos medicos</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label></label>
                                <input type="text" name="Nombre" id="invalidez" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label></label>
                                <input type="text" name="Nombre" id="calculoInvalidez" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label></label>
                                <input type="text" name="Nombre" id="gastosMedicos" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label></label>
                                <input type="text" name="Nombre" id="calculoGastosMedicos" class="form-control">
                            </div>
                        </div>
                    </div>
                    <span style="text-align:center; display: block;color:red;">Gastos extras</span>
                    <div class="row">
                        <div class="col-md-4" style="margin-top:30px; margin-left:14%;">
                            <span>grua y estacionamiento</span>
                        </div>
                        <div class="col-md-4" style="margin-top:30px; ">
                            <span></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label></label>
                                <input type="text" name="Nombre" id="grua" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label></label>
                                <input type="text" name="Nombre" id="calculoGrua" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group" style="margin-top: -4%;">
                                <label>Monto en $</label>
                                <input type="text" name="Nombre" id="montoDolar" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group" style="margin-top: -4%;">
                                <label>Monto en bs</label>
                                <input type="text" name="Nombre" id="montoBolivar" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Forma de pago -->
                <div id="formulario4" class="tabcontent">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Forma de pago</label>
                                <div class="input-group">
                                    <select name="forma" id="forma" class="form-control forma" required>
                                        <option value="0">Pago móvil</option>
                                        <option value="1">Efectivo</option>
                                        <option value="2">Transferencia</option>
                                        <option value="3">Punto</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label>Referencia</label>
                                <input type="text" id="referencia" class="form-control referencia numero">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Cantidad a pagar en $</label>
                                <input type="text" id="cantidadDolar" class="form-control cantidadDolar" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Cantidad a pagar en bs</label>
                                <input type="text" id="cantidadBs" class="form-control cantidadBs" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row" hidden id="contenedorInputs">
                        <div class="col-md-3 mx-auto">
                            <div class="form-group">
                                <label>Abono $</label>
                                <input type="text" id="abonoDolar" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3 mx-auto">
                            <div class="form-group">
                                <label>Abono Bs</label>
                                <input type="text" id="abonoBolivar" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3 mx-auto">
                            <div class="form-group">
                                <label>Resta $</label>
                                <input type="text" id="restaDolar" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-3 mx-auto">
                            <div class="form-group">
                                <label>Resta Bs</label>
                                <input type="text" id="restaBolivar" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mx-auto text-center py-2">
                        <input type="hidden" id="operacion" value="Registrar">
                        <!-- <label for="checkRegistro">
                            <input type="checkbox" id="checkRegistro">
                            Abono
                        </label> -->
                        <input type="text" id="inputAdicional" class="form-control" style="display: none;">
                        <button type="button" name="Registro" id="Registro" class="btn btn-sm btn-success" data-dismiss="modal">Enviar</button>
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Formulario  re reporte-->
<div class="modal fade" tabindex="-1" id="reporte" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-light">
                <h5 class="modal-title">Tipo de reporte</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="text-align: center">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="nombre_reporte">Nombre del cliente</label>
                            <input type="text" id="nombre_reporte" class="form-control" disabled style="background: white; border: none; text-align: center; word-wrap: break-word;">
                        </div>

                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>apellido del cliente</label>
                            <input type="text" id="apellido_reporte" class="form-control" disabled style="background : white; border: none; text-align: center">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Cédula del cliente</label>
                            <input type="text" id="cedula_reporte" class="form-control" disabled style="background : white; border: none; text-align: center">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Placa del vehiculo</label>
                            <input type="text" id="placa_reporte" class="form-control" disabled style="background : white; border: none; text-align: center">
                        </div>
                    </div>
                </div>
                <div class="button-container row mx-auto">
                    <div class="button-item col-md-4">
                        <h4>R.C.V</h4>
                        <button id="reporteRcv" class="btn btn-primary"><a href="../../../Controlador/reporteRCV.php?ID=" target="_blank">Generar</a></button>
                    </div>
                    <div class="button-item col-md-4">
                        <h4>R.C.V WEB</h4>
                        <button id="reporteRcvWEB" class="btn btn-primary"><a href="../../../Controlador/reporteRCVWEB.php?ID=" target="_blank">Generar</a></button>
                    </div>
                    <div class="button-item col-md-4">
                        <h4>Carnet R.C.V</h4>
                        <button id="carnetRcv" class="btn btn-primary"><a href="../../../Controlador/carnetRCV.php?ID=" target="_blank">Generar</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Formulario Seguro -->
<div class="modal fade" id="talonario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-light">Registrar certificado medico</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row col-md-12 mx-auto">
                    <div class="form-group col-md-4">
                        <label>Cédula</label>
                        <div class="input-group">
                            <div class="predent">
                                <select id="NacionalidadMedico" class="form-control">
                                    <option value="V-">V-</option>
                                    <option value="E-">E-</option>
                                    <option value="J-">J-</option>
                                    <option value="G-">G-</option>
                                </select>
                            </div>
                            <input type="text" id="CedulaMedico" class="form-control numero">
                            <div class="input-group-append">
                                <a href="#" id="btn-add-employee" class="input-group-text" class="edit" data-toggle="modal">
                                    <span class="material-symbols-outlined" id="buscar_clienteMedico">
                                        search
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Nombre</label>
                        <input type="text" id="NombreMedico" class="form-control mayuscula">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Apellido</label>
                        <input type="text" id="ApellidoMedico" class="form-control mayuscula">
                    </div>
                </div>
                <div class="row col-md-12 mx-auto">
                     <div class="form-group col-md-3">
                        <label>Fecha nacimiento</label>
                        <input type="date" id="FechaMedico" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Edad</label>
                        <input type="text" id="Edad" class="form-control mayuscula">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Tipo de sangre</label>
                        <input type="text" id="Sangre" class="form-control mayuscula">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Usa lente</label>
                        <div class="input-group">
                            <select id="Lente" class="form-control mayuscula" required>
                                <option value="0">No</option>
                                <option value="1">Si</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row col-md-12 mx-auto">
                    <div class="form-group col-md-3">
                        <label for="">Forma de pago</label>
                        <div class="input-group">
                            <select id="FormaMedico" class="form-control forma" required>
                                <option value="0">Pago móvil</option>
                                <option value="1">Efectivo</option>
                                <option value="2">Transferencia</option>
                                <option value="3">Punto</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <div class="form-group">
                            <label>Referencia</label>
                            <input type="text" id="referenciaMedico" class="form-control referencia numero">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <div class="form-group">
                            <label>Cantidad $</label>
                            <input type="text" id="cantidadDolarMedico" class="form-control referencia numero" disabled>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <div class="form-group">
                            <label>Cantidad Bs</label>
                            <input type="text" id="cantidadBolivarMedico" class="form-control referencia numero"disabled>
                        </div>
                    </div>
                </div>
                <!--<div class="row col-md-12 mx-auto">-->
                <!--    <div class="form-group col-md-12">-->
                <!--        <label class="text-center">Observación</label>-->
                <!--        <input type="text" class="form-control mayuscula" id="Observacion">-->
                <!--    </div>-->
                <!--</div>-->

            </div>
            <div class="col-md-12 mx-auto text-center py-2">
                <input type="hidden" id="ID">
                <input type="hidden" id="DesdeMedico">
                <input type="hidden" id="HastaMedico">
                <input type="hidden" id="Asesor" value="<?php echo $_SESSION["usuario_id"] ?>">
                <input type="hidden" id="Sucursal" value="<?php echo $_SESSION["sucursal_id"] ?>">
                <input type="hidden" id="operacion" value="registrarMedico">
                <button type="button" id="Medico" class="btn btn-sm btn-success" data-dismiss="modal">Enviar</button>
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!-- Formulario de renovación -->
<div class="modal fade" id="renovacion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header bg-danger text-light">
                <h5 class="modal-title">Renovacion</h5>
                <input type="text" id="precio" class="form-control" disabled>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="text-align: center">
                    <div class="col-3">
                        <div class="form-group">
                            <label>Nombre del cliente</label>
                            <input type="text" id="nombre_renovacion" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>apellido del cliente</label>
                            <input type="text" id="apellido_renovacion" class="form-control" disabled style="background : white; border: none; text-align: center">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Cédula del cliente</label>
                            <input type="text" id="cedula_renovacion" class="form-control" disabled style="background : white; border: none; text-align: center">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Placa del vehiculo</label>
                            <input type="text" id="placa_renovacion" class="form-control" disabled style="background : white; border: none; text-align: center">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label>N° de contrato</label>
                            <input type="text" id="numeroContratoRenovar" class="form-control" required disabled>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Desde</label>
                            <input type="date" id="DesdeRenovacion" class="form-control Desde" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Hasta</label>
                            <input type="date" id="HastaRenovacion" class="form-control Hasta" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label>Forma de pago</label>
                            <div class="input-group">
                                <select name="forma" id="Forma" class="form-control forma" required>
                                    <option value="0">Pago movil</option>
                                    <option value="1">Efectivo</option>
                                    <option value="2">Transferencia</option>
                                    <option value="3">Punto</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label>referencia</label>
                            <input type="text" name="Referencia" id="Referencia" class="form-control referencia">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>cantidad a pagar en $</label>
                            <input type="text" name="cantidadDolar" id="cantidadDolarRenovacion" class="form-control cantidadDolar" disabled>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>cantidad a pagar en bs</label>
                            <input type="text" name="cantidadBs" id="cantidadBsRenovacion" class="form-control cantidadBs" disabled>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mx-auto text-center py-2">
                    <input type="hidden" id="Usuario" value="<?php echo $id ?>">
                    <input type="hidden" id="Sucursal" value="<?php echo $sucursal ?>">
                    <input type="hidden" id="idRenovacion">
                    <button type="button" id="Renovar" class="btn btn-sm btn-success" data-dismiss="modal">Enviar</button>

                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" tabindex="-1" id="modalConsult" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-light">
                <h5 class="modal-title">Consulta</h5>

                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalConsulta">

            </div>
            <div class="col-md-12 mx-auto text-center py-2">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>