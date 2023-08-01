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

<!-- Reporte -->

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
                            <input type="date" id="Desde" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Hasta</label>
                            <input type="date" id="Hasta" class="form-control" disabled>
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