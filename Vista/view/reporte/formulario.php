<div class="row">
    <div class="col-md-12">
        <div class="table-wrapper">
            <div class="col-md-12 mx-auto row">
                <div class="col-md-2">
                    <div class="input-group input-group-sm mb-3">
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="precioDolarPantalla">
                        <span class="input-group-text">$</span>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="input-group input-group-sm mb-3">
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="precioBolivarPantalla">
                        <span class="input-group-text">Bs</span>
                    </div>
                </div>
            </div>
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                        <h2 class="ml-lg-2">Genearar reporte</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-center mt-4">
                <div class="col-md-3">
                    <div class="form-group d-flex flex-column align-items-center justify-content-center">
                        <label for="input1">Nombre</label>
                        <input type="text" class="form-control mayuscula" id="Nombre" placeholder="Input 1" require>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group d-flex flex-column align-items-center justify-content-center">
                        <label for="input2">Desde</label>
                        <input type="date" class="form-control" id="Desde" placeholder="Input 2">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group d-flex flex-column align-items-center justify-content-center">
                        <label for="input3">Hasta</label>
                        <input type="date" class="form-control" id="Hasta" placeholder="Input 3">
                    </div>
                </div>
                <div class="row align-items-center justify-content-center mt-2">
                    <div class="col-md-2 text-center">
                        <button type="button" class="btn btn-primary" id="Boton">Buscar</button>
                    </div>
                   <div class="col-md-2 text-center">
    <button type="button" class="btn btn-danger" id="Reporte" style="display: flex; align-items: center;">
        <i class="material-icons" style="margin-right: 5px;">&#xE8AD;</i>
        <span style="font-size: 14px;">Generar Reporte</span>
    </button>
</div>

                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" tabindex="-1" id="modalConsult" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-light">
                <h5 class="modal-title">Consulta</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalConsulta" style="overflow:scroll"></div>
            <div class="col-md-12 mx-auto text-center py-2">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>