<div class="modal fade" id="usuarios" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                        <label>Usuario</label>
                        <input type="text" id="Usuario" class="form-control mayuscula">
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
                    <div class="form-group col-md-4">
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
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Teléfono del usuario</label>
                        <div class="input-group">
                            <div class="predent">
                                <select id="Codigo" class="form-control">
                                    <option value="0412-">0412</option>
                                    <option value="0414-">0414</option>
                                    <option value="0416-">0416</option>
                                    <option value="0424-">0424</option>
                                    <option value="0426-">0426</option>
                                </select>
                            </div>
                            <input type="text" name="Telefono" id="Telefono" class="form-control numero">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Dirección del usuario</label> 
                        <input type="text" id="Direccion" class="form-control mayuscula">
                    </div>
                </div>
                <div class="row col-md-12 mx-auto">
                    <div class="form-group col-md-4">
                        <label>Correo del usuario</label>
                        <input type="text" id="Correo" class="form-control mayuscula">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Rol</label>
                        <div class="input-group">
                            <select id="Rol" class="form-control" required>
                                <option value="a">Seleccionar</option>
                            </select>
                            <div class="input-group-append">
                                <a id="btn-add-employee" class="input-group-text" href="#rol" class="edit" data-toggle="modal">
                                    <span class="material-symbols-outlined">
                                        add_circle
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Sucursal</label>
                        <div class="input-group">
                            <select id="Sucursal" class="form-control" required>
                                <option value="a">Seleccionar</option>
                            </select>
                            <div class="input-group-append">
                                <a id="btn-add-employee" class="input-group-text" href="#sucursal" class="edit" data-toggle="modal">
                                    <span class="material-symbols-outlined">
                                        add_circle
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row col-md-12 mx-auto mt-3">
                    <div class="form-check col-md-4">
                        <input class="form-check-input permiso_cls" type="checkbox" name="modulos[]" value="Contratos realizados" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">Contratos realizados</label>
                    </div>
                    <div class="form-check col-md-4">
                        <input class="form-check-input permiso_cls" type="checkbox" name="modulos[]" value="Lista de asesores" id="defaultCheck2">
                        <label class="form-check-label" for="defaultCheck2">Lista de asesores</label>
                    </div>
                    <div class="form-check col-md-4">
                        <input class="form-check-input permiso_cls" type="checkbox" name="modulos[]" value="Lista de sucursales" id="defaultCheck3">
                        <label class="form-check-label" for="defaultCheck3">Lista de sucursales</label>
                    </div>
                    <div class="form-check col-md-4">
                        <input class="form-check-input permiso_cls" type="checkbox" name="modulos[]" value="Tipo de contratos" id="defaultCheck4">
                        <label class="form-check-label" for="defaultCheck4">Tipo de contratos</label>
                    </div>
                    <div class="form-check col-md-4">
                        <input class="form-check-input permiso_cls" type="checkbox" name="modulos[]" value="Uso de vehiculo" id="defaultCheck5">
                        <label class="form-check-label" for="defaultCheck5">Uso de vehiculo</label>
                    </div>
                    <div class="form-check col-md-4">
                        <input class="form-check-input permiso_cls" type="checkbox" name="modulos[]" value="Clase de vehiculo" id="defaultCheck6">
                        <label class="form-check-label" for="defaultCheck6">Clase de vehiculo</label>
                    </div>
                    <div class="form-check col-md-4">
                        <input class="form-check-input permiso_cls" type="checkbox" name="modulos[]" value="Tipo de vehiculo" id="defaultCheck7">
                        <label class="form-check-label" for="defaultCheck7">Tipo de vehiculo</label>
                    </div>
                    <div class="form-check col-md-4">
                        <input class="form-check-input permiso_cls" type="checkbox" name="modulos[]" value="Linea de transporte" id="defaultCheck8">
                        <label class="form-check-label" for="defaultCheck8">Linea de transporte</label>
                    </div>
                    <div class="form-check col-md-4">
                        <input class="form-check-input permiso_cls" type="checkbox" name="modulos[]" value="Usuarios" id="defaultCheck9">
                        <label class="form-check-label" for="defaultCheck9">Usuarios</label>
                    </div>
                    <div class="form-check col-md-4">
                        <input class="form-check-input permiso_cls" type="checkbox" name="modulos[]" value="Roles" id="defaultCheck10">
                        <label class="form-check-label" for="defaultCheck10">Roles</label>
                    </div>
                </div>

            </div>
            <div class="col-md-12 mx-auto text-center py-2">
                <input type="hidden" id="ID">
                <input type="hidden" id="operacion" value="Registro">
                <button type="button" id="Registro" class="btn btn-sm btn-success" data-dismiss="modal">Enviar</button>
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
</div>