<div class="modal fade" id="egreso" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                        <div class="form-group">
                            <label>Motivo</label>
                            <input type="text" id="Motivo" class="form-control">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-group">
                            <label>Cantidad $</label>
                            <input type="text" id="cantidad" class="form-control numero">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-group">
                            <label>Cantidad Bs</label>
                            <input type="text" id="cantidadBolivar" class="form-control numero">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mx-auto text-center py-2">
                <button type="button" id="Egreso" class="btn btn-sm btn-success" data-dismiss="modal">Enviar</button>
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>