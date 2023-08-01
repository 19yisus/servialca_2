<div class="modal fade" id="transporte" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-light" style="background:#d15f69 ">

                <h5 class="modal-title">Registro de línea de transporte</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Nombre de la línea</label>
                            <input type="text" id="nombreLinea" class="form-control texto mayuscula">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 py-2 mx-auto text-center">
                    <input type="hidden" id="ID">
                    <input type="hidden" id="operacion" value="Registro">
                    <button type="button" id="registroLinea" class="btn btn-sm btn-success" data-dismiss="modal">Enviar</button>
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>