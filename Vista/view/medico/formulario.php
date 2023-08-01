<div class="modal fade" id="talonario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-light">Registrar usuarios del sistema</h5>
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
                                <select id="Nacionalidad" class="form-control">
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
                    <div class="form-group col-md-4">
                        <label>Nombre</label>
                        <input type="text" id="Nombre" class="form-control mayuscula">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Apellido</label>
                        <input type="text" id="Apellido" class="form-control mayuscula">
                    </div>
                </div>
                <div class="row col-md-12 mx-auto">
                     <div class="form-group col-md-3">
                        <label>Fecha nacimiento</label>
                        <input type="date" id="Fecha" class="form-control mayuscula">
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
                            <select id="Forma" class="form-control forma" required>
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
                            <input type="text" id="referencia" class="form-control referencia numero">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <div class="form-group">
                            <label>Cantidad $</label>
                            <input type="text" id="cantidadDolar" class="form-control referencia numero" disabled>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <div class="form-group">
                            <label>Cantidad Bs</label>
                            <input type="text" id="cantidadBolivar" class="form-control referencia numero" disabled>
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
                <input type="hidden" id="Desde">
                <input type="hidden" id="Hasta">
                <input type="hidden" id="Asesor" value="<?php echo $_SESSION["usuario_id"] ?>">
                <input type="hidden" id="Sucursal" value="<?php echo $_SESSION["sucursal_id"] ?>">
                <input type="hidden" id="operacion" value="registrarMedico">
                <button type="button" id="Medico" class="btn btn-sm btn-success" data-dismiss="modal">Enviar</button>
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>