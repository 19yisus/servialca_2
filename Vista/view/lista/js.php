<script>
    $(document).ready(function() {
        var tabla = $("#tabla").DataTable({
            "ajax": {
                "url": "../../../Controlador/c_poliza.php?operacion=ConsultarTodos&ID=<?php echo $id ?>",
                "dataSrc": "data"
            },
            "columns": [{
                    data: "poliza_id"
                },
                {
                    data: "poliza_fechaVencimiento",
                    render: function(data, type, row) {
                        var fecha = new Date(data + ' UTC');

                        // Obtener los componentes de la fecha en formato UTC
                        var dia = fecha.getUTCDate();
                        var mes = fecha.getUTCMonth() + 1;
                        var anio = fecha.getUTCFullYear();

                        // Formatear la fecha
                        var fechaFormateada = dia + "-" + mes + "-" + anio;
                        return fechaFormateada;
                    }
                },
                {
                    data: "cliente_cedula"
                },
                {
                    data: "null",
                    render: function(data, type, row) {
                        return row.cliente_nombre + " " + row.cliente_apellido;
                    }
                },
                {
                    data: "cliente_telefono"
                },
                {
                    data: "vehiculo_placa"
                },
                {
                    data: "usuario_nombre"
                },
                {
                    data: "sucursal_nombre"
                },
                {
                    defaultContent: "",
                    render(data, type, row) {
                        let boton = `
                        <div class="icon-group">
                        <a href="#Mensaje" class="edit" data-toggle="modal" data-id="${row.poliza_id}">
                        <i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i>
                        </a>
                        <a href="#renovacion" class="renovacion" data-toggle="modal" data-id="${row.poliza_id}">
                            <i class="material-icons" data-toggle="tooltip" title="Renovar">&#x27F3;</i>
                        </a>
                    </div>
                    <div class="icon-group">
                        <a href="#reporte" class="reporte" data-toggle="modal" data-id="${row.poliza_id}">
                            <i class="material-icons">print</i>
                        </a>
                        <a href="#" data-toggle="modal" id="Modal" data-id="${row.poliza_id}">
                            <i class="material-icons">insert_drive_file</i>
                        </a>
                    </div>
                        `;
                        return boton;
                    }
                }
            ],
            "order": [
                [0, "desc"] // Order by the first column (poliza_id) in descending order
            ]
        })
    })

    $("#tabla").on("click", "#Modal", function() {
        var id = $(this).data("id");
        $("#modalConsult").modal("show");
        $.ajax({
            type: "POST",
            url: "../../../Controlador/c_poliza.php?operacion=consultarModal",
            data: {
                ID: id
            },
            success: function(result) {
                $("#modalConsulta").html(result);
            },
            error: function(error) {
                console.errro(error);
            }
        })
    })

    $("#tabla").on("click", ".reporte", function() {
        var id = $(this).data("id");
        $.ajax({
            type: "POST",
            url: "../../../Controlador/c_poliza.php?operacion=consultarUno",
            data: {
                ID: id
            },
            success: function(data) {
                var respuesta = JSON.parse(data);
                $("#nombre_reporte").val(respuesta.data[0].cliente_nombre).css('word-wrap', 'break-word');
                $("#apellido_reporte").val(respuesta.data[0].cliente_apellido);
                $("#cedula_reporte").val(respuesta.data[0].cliente_cedula);
                $("#placa_reporte").val(respuesta.data[0].vehiculo_placa);
                $("#reporteRcv a").attr("href", "../../../Controlador/reporteRCV.php?ID=" + respuesta.data[0].poliza_id);
                $("#reporteRcvWEB a").attr("href", "../../../Controlador/reporteRCVWEB.php?ID=" + respuesta.data[0].poliza_id);
                $("#carnetRcv a").attr("href", "../../../Controlador/carnetRCV.php?ID=" + respuesta.data[0].poliza_id);
            }
        })
    })

    $("#tabla").on("click", ".renovacion", function() {
        var id = $(this).data("id");
        $("#idRenovacion").val(id);
        $.ajax({
            type: "POST",
            url: "../../../Controlador/c_poliza.php?operacion=consultarUno",
            data: {
                ID: id
            },
            success: function(data) {
                var respuesta = JSON.parse(data);
                $("#cantidadDolarRenovacion").val(respuesta.data[0].tipoVehiculo_precio);
                var cantidadBsRenovacion = (respuesta.data[0].tipoVehiculo_precio * precioDolar).toFixed(2);
                cantidadBsRenovacion = parseFloat(cantidadBsRenovacion).toString();
                $("#cantidadBsRenovacion").val(cantidadBsRenovacion);
                $("#nombre_renovacion").val(respuesta.data[0].cliente_nombre);
                $("#apellido_renovacion").val(respuesta.data[0].cliente_apellido);
                $("#cedula_renovacion").val(respuesta.data[0].cliente_cedula);
                $("#placa_renovacion").val(respuesta.data[0].vehiculo_placa);
                $("#numeroContratoRenovar").val(respuesta.data[0].poliza_id + "-" + respuesta.data[0].poliza_renovacion);
            }
        })
    })

    $("#Renovar").on("click", function() {
        var id = $("#idRenovacion").val();
        var desde = $("#Desde").val();
        var hasta = $("#Hasta").val();
        var usuario = $("#Usuario").val();
        var sucursal = $("#Sucursal").val();
        var tipoPago = $("#Forma").val();
        var referencia = $("#Referencia").val();
        var monto = $("#cantidadDolar").val();
        var dañoCosas = precioDolar * 0.40;
        var dañoPersonas = precioDolar * 0.20;
        var fianza = precioDolar * 0.10;
        var asistencia = precioDolar * 0.10;
        var apov = precioDolar * 1;
        var muerte = precioDolar * 0.10;
        var invalidez = precioDolar * 0;
        var medico = precioDolar * 0;
        var grua = precioDolar * 0.10;
        var total = precioDolar * 1;
        $.ajax({
            type: "POST",
            url: "../../../Controlador/c_poliza.php",
            data: {
                operacion: "Renovar",
                ID: id,
                Usuario: usuario,
                Sucursal: sucursal,
                fechaInicio: desde,
                fechaVencimiento: hasta,
                metodoPago: tipoPago,
                Referencia: referencia,
                cantidadDolar: monto,
                dañoCosas: dañoCosas,
                dañoPersonas: dañoPersonas,
                Fianza: fianza,
                Asistencia: asistencia,
                Apov: apov,
                Muerte: muerte,
                Invalidez: invalidez,
                Medico: medico,
                Grua: grua,
                Monto: total,
                tipoIngreso: "1",
                Motivo: "Renovación",
                PrecioDolar: precioDolar
            },
            success: function(data) {
                var resultado = JSON.parse(data);
                if (resultado.data.lenght > 0) {
                    iziToast.success({
                        title: 'Contrato renovado',
                        position: 'topRight',
                    });
                }
            }
        })
    })


    // fecha poliza
    var desde = document.getElementById("Desde");
    var hasta = document.getElementById("Hasta");
    var fechaActual = new Date();
    var fechaActualFormato = fechaActual.toISOString().split("T")[0];
    desde.value = fechaActualFormato;

    // Agregar 1 año a la fecha actual
    var unAnioDespues = new Date(fechaActual);
    unAnioDespues.setFullYear(unAnioDespues.getFullYear() + 1);

    // Formatear la fecha con 1 año mayor en formato ISO y asignarlo al campo "Hasta"
    var fechaHastaFormato = unAnioDespues.toISOString().split("T")[0];
    hasta.value = fechaHastaFormato;

    // Impedir que el campo "Desde" sea menor que la fecha actual
    desde.addEventListener("change", function() {
        if (new Date(desde.value) < fechaActual) {
            desde.value = fechaActualFormato;
        }
        // Impedir que el campo "Hasta" sea menor que el campo "Desde"
        if (new Date(hasta.value) < new Date(desde.value)) {
            var fechaHasta = new Date(desde.value);
            fechaHasta.setFullYear(fechaHasta.getFullYear() + 1);
            hasta.value = fechaHasta.toISOString().split("T")[0];
        }
    });

    // Impedir que el campo "Hasta" sea menor que el campo "Desde"
    hasta.addEventListener("change", function() {
        if (new Date(hasta.value) < new Date(desde.value)) {
            var fechaHasta = new Date(desde.value);
            fechaHasta.setFullYear(fechaHasta.getFullYear() + 1);
            hasta.value = fechaHasta.toISOString().split("T")[0];
        }
    });
</script>