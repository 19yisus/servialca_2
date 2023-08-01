<div id="contenido">
    <div class="col-md-11 mx-auto row py-5">
        <!------main-content-start----------->
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                    <h2 class="ml-lg-2">Configuración del Usuaruio</h2>
                </div>

            </div>

        </div>
        <div class="col-md-12 row mx-auto border border-dark py-2 rounded" style="border-top: none;">

            <div class="mb-2 col-md-4">
                <label for="exampleInputEmail1" class="form-label fw-bold text-dark">Cedula</label>
                <input type="text" class="form-control form-control-sm" id="cedula" aria-describedby="emailHelp" disabled>
            </div>
            <div class="col-md-8"> </div>



            <div class="mb-2 col-md-4">
                <label for="exampleInputEmail1" class="form-label fw-bold text-dark">Nombres</label>
                <input type="text" class="form-control form-control-sm" id="nombre" aria-describedby="emailHelp">

            </div>
            <div class="mb-2 col-md-4">
                <label for="exampleInputEmail1" class="form-label fw-bold text-dark">Apellidos</label>
                <input type="text" class="form-control form-control-sm" id="apellido" aria-describedby="emailHelp">

            </div>
            <div class="mb-2 col-md-4">
                <label for="exampleInputEmail1" class="form-label fw-bold text-dark">Clave</label>
                <input type="text" class="form-control form-control-sm" id="clave" aria-describedby="emailHelp">

            </div>
            <div class="mb-2 col-md-4">
                <label for="exampleInputEmail1" class="form-label fw-bold text-dark">Login</label>
                <input type="text" class="form-control form-control-sm" id="login" aria-describedby="emailHelp">

            </div>

            <div class="mb-2 col-md-4">
                <label for="exampleInputEmail1" class="form-label fw-bold text-dark">Correo</label>
                <input type="text" class="form-control form-control-sm" id="correo" aria-describedby="emailHelp">

            </div>
            <div class="form-group col-md-4">
                <label for="Telefono">Teléfono del usuario</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <select id="Codigo" class="form-control">
                            <option value="0412">0412-</option>
                            <option value="0414">0414-</option>
                            <option value="0416">0416-</option>
                            <option value="0424">0424-</option>
                            <option value="0426">0426-</option>
                        </select>
                    </div>
                    <input type="text" name="Telefono" id="Telefono" class="form-control numero" value="<?php echo $telefono ?>">
                </div>
            </div>
            <div class="mb-2 col-md-12">
                <label for="exampleFormControlTextarea1" class="form-label fw-bold text-dark">Direccion</label>
                <input class="form-control" id="direccion" rows="2">
            </div>
        </div>
        <div class="col-md-12 mx-auto text-center py-2">
            <input type="hidden" id="id" value="<?php echo $_SESSION["usuario_id"] ?>">
            <button type="button" class="btn btn-success btn-sm" id="Editar"><i class="fa-solid fa-check"></i>Actualizar datos</button>
            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="fa-solid fa-x"></i> Cancelar</button>

        </div>
        <!------main-content-end----------->
    </div>
</div>