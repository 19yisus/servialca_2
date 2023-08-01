<div class="modal fade" id="contrato" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-light" style="background:#d15f69 ">

                <h5 class="modal-title">tipo de contrato</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-auto">
                <div class="row mx-auto">

                    <div class="mb-2 col-md-4">
                        <label for="" class="form-label mayuscula">nombre del contrato</label>
                        <input type="text" id="Nombre" class="form-control form-control-sm texto mayuscula">
                    </div>
                    <div class="mb-2 col-md-4">
                        <label for="" class="form-label">daño a cosas</label>
                        <input type="text" id="dañoCosas" class="form-control form-control-sm">

                    </div>
                    <div class="mb-2 col-md-4">
                        <label for="" class="form-label">daño personas</label>
                        <input type="text" id="dañoPersonas" class="form-control form-control-sm">

                    </div>

                    <div class="mb-2 col-md-4">
                        <label for="" class="form-label">fianza cuantitativa</label>
                        <input type="text" id="fianzaCuantitativa" class="form-control form-control-sm">
                    </div>

                    <div class="mb-2 col-md-4">
                        <label for="" class="form-label">asistencia legal</label>
                        <input type="text" id="asistenciaLegal" class="form-control form-control-sm">

                    </div>

                    <div class="mb-2 col-md-4">
                        <label for="" class="form-label">apov</label>
                        <input type="text" id="apov" class="form-control form-control-sm">
                    </div>

                    <div class="mb-2 col-md-3">
                        <label for="" class="form-label">muerte</label>
                        <input type="text" id="muerte" class="form-control form-control-sm">
                    </div>
                    <div class="mb-2 col-md-3">
                        <label for="" class="form-label">invalidez</label>
                        <input type="text" id="invalidez" class="form-control form-control-sm">

                    </div>

                    <div class="mb-2 col-md-3">
                        <label for="" class="form-label">gastos medicos</label>
                        <input type="text" id="gastosMedicos" class="form-control form-control-sm">
                    </div>

                    <div class="mb-2 col-md-3">
                        <label for="" class="form-label">grua y estacionamiento</label>
                        <input type="text" id="grua" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-md-12 mx-auto text-center">
                    <input type="hidden" id="ID">
                    <input type="hidden" id="operacion" value="Registro">
                    <button type="button"id="registroContrato" class="btn  btn-sm btn-success" data-dismiss="modal">Enviar</button>
                    <button type="button" class="btn  btn-sm btn-danger" data-dismiss="modal">Cancelar</button>

                </div>
            </div>
        </div>
    </div>
</div>