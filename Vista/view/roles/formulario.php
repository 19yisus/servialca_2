<div class="modal fade" id="rol" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-light">Registrar rol</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Nombre del rol</label>
                            <input type="text" id="nombreRol" class="form-control texto mayuscula">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mx-auto text-center py-2">

                    <input type="hidden" id="ID">
                    <input type="hidden" id="operacion" value="Registro">
                    <button type="button" id="registrarRol" class="btn btn-sm btn-success" data-dismiss="modal">Enviar</button>

                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>