<div class="modal fade" id="uso" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-light" style="background:#d15f69 ">

                <h5 class="modal-title">lista de usos de vehiculo</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Nombre del uso del vehiculo</label>
                            <input type="text" id="nombreUso" class="form-control texto mayuscula">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 py-2 mx-auto text-center">

                    <input type="hidden" id="ID">
                    <input type="hidden" id="operacion" value="Registro">
                    <button type="button" id="registroUso" class="btn-sm  btn btn-success" data-dismiss="modal">Enviar</button>
                    <button type="button" class="btn-sm  btn btn-danger" data-dismiss="modal">Cancelar</button>

                </div>
            </div>
        </div>
    </div>
</div>