<script>
    $("#cantidadDolar").val(10);
    $("#cantidadBolivar").val(10 * precioDolar);
    var desdeInput = document.getElementById('Desde');
    var hastaInput = document.getElementById('Hasta');
    // Obtener la fecha actual
    var fechaActual = new Date();
    var fechaActualFormatted = fechaActual.toISOString().split('T')[0];
    // Establecer la fecha actual en el campo "Desde" por defecto
    desdeInput.value = fechaActualFormatted;
    // Función para calcular la fecha "Hasta" 5 años mayor a la fecha "Desde"
    function calcularHasta() {
        var desdeValue = new Date(desdeInput.value);
        var hastaValue = new Date(desdeValue.getFullYear() + 5, desdeValue.getMonth(), desdeValue.getDate());
        var hastaFormatted = hastaValue.toISOString().split('T')[0];
        hastaInput.value = hastaFormatted;
    }
    // Llamar a la función calcularHasta al cargar la página
    calcularHasta();

    $("#buscar_cliente").on("click", function() {
        var cedula = $("#Nacionalidad").val() + $("#Cedula").val();
        $.ajax({
            type: "POST",
            url: "../../../Controlador/c_cliente.php?operacion=consultarUno",
            data: {
                Cedula: cedula
            },
            success: function(data) {
                var respuesta = JSON.parse(data);
                if (respuesta.data.length > 0) {
                    iziToast.success({
                        title: 'Cliente encontrado',
                        position: 'topRight',
                    });
                    $("#Nombre").val(respuesta.data[0]["cliente_nombre"]);
                    $("#Apellido").val(respuesta.data[0]["cliente_apellido"]);
                    $("#Fecha").val(respuesta.data[0]["cliente_fechaNacimiento"]);
                    var telefono = respuesta.data[0]["cliente_telefono"].split("-");
                    $("#Codigo").val(telefono[0] + "-");
                    $("#Telefono").val(telefono[1]);
                    $("#Correo").val(respuesta.data[0]["cliente_correo"]);
                    $("#Direccion").val(respuesta.data[0]["cliente_direccion"]);
                } else {
                    iziToast.error({
                        title: 'Cliente no encontrado',
                        position: 'topRight',
                    });
                }
            }
        })
    })

    $("#Medico").on("click", function() {
        var fecha = $("#Fecha").val();
        var desde = $("#Desde").val();
        var hasta = $("#Hasta").val();
        var cedula = $("#Nacionalidad").val() + $("#Cedula").val();
        var nombre = $("#Nombre").val();
        var apellido = $("#Apellido").val();
        var telefono = $("#Codigo").val() + $("#Telefono").val();
        var correo = $("#Correo").val();
        var direccion = $("#Direccion").val();
        var edad = $("#Edad").val();
        var sangre = $("#Sangre").val();
        var lente = $("#Lente").val();
        var formaPago = $("#Forma").val();
        var referencia = $("#referencia").val();
        var cantidadDolar = $("#cantidadDolar").val();
        var sucursal = $("#Sucursal").val();
        var asesor = $("#Asesor").val();
        $.ajax({
            type: "POST",
            url: "../../../Controlador/c_cliente.php",
            data: {
                Fecha:fecha,
                operacion: "registrarMedico",
                Desde: desde,
                Hasta: hasta,
                Cedula: cedula,
                Nombre: nombre,
                Apellido: apellido,
                Telefono: telefono,
                Correo: correo,
                Direccion: direccion,
                Edad: edad,
                Sangre: sangre,
                Lente: lente,
                formaPago: formaPago,
                Referencia: referencia,
                cantidadDolar: cantidadDolar,
                Sucursal: sucursal,
                Asesor: asesor,
                precioDolar: precioDolar,
                Ingreso: "1",
                Motivo: "Seguro"
            },
            success: function(data) {
                var resultado = JSON.parse(data);
                var id = resultado.data;
                $("#Nacionalidad").val("V-");
                $("#Cedula").val("");
                $("#Nombre").val("");
                $("#Apellido").val("");
                $("#Fecha").val("");
                $("#Codigo").val("0412-");
                $("#Telefono").val("");
                $("#Correo").val("");
                $("#Direccion").val("");
                $("#Edad").val("");
                $("#Sangre").val("");
                $("#Lente").val("0");
                $("#Forma").val("0");
                $("#referencia").val("");
                $("#cantidadDolar").val("");
                $("#cantidadBolivar").val("");
                var nuevaVentana = window.open("../../../Controlador/reporteMedico.php?ID=" + encodeURIComponent(id), "_blank");
                nuevaVentana.focus();
            }
        })
    })

    var tabla = $("#tabla").DataTable({
        ajax: {
            "url": "../../../Controlador/c_cliente.php?operacion=consultarTodos",
            "dataSrc": "data"
        },
        "columns": [{
                data: "medico_id"
            },
            {
                data: "cliente_cedula"
            },
            {
                data: "cliente_nombre"
            },
            {
                data: "cliente_apellido"
            },
            {
                data: "medico_edad"
            },
            {
                data: "medico_fechaInicio",
                render: function(data, type, row) {
                    var fecha = new Date(data);
                    var dia = fecha.getDate();
                    var mes = fecha.getMonth();
                    var ano = fecha.getFullYear();
                    var fechaFormato = dia + "-" + mes + "-" + ano;
                    return fechaFormato;
                }
            },
            {
                data: "medico_fechaVencimiento",
                render: function(data, type, row) {
                    var fecha = new Date(data);
                    var dia = fecha.getDate();
                    var mes = fecha.getMonth();
                    var anio = fecha.getFullYear();
                    var fechaFormato = dia + "-" + mes + "-" + anio;
                    return fechaFormato;
                }
            },
            {
                data: "medico_tipoSangre"
            },
            {
                data: "medico_lente",
                render: function(data) {
                    return data == 1 ? "Si" : "No";
                }
            },
            {
                defaultContent: "",
                render: function(data, type, row) {
                    var boton = `
            <div class="button-container">
                <a href="#talonario" class="edit" data-toggle="modal" data-id="${row.medico_id}">
                    <i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i>
                </a>
                <a href="#" class="reporte" data-toggle="modal" data-id="${row.medico_id}">
                    <i class="material-icons">print</i>
                </a>
            </div>
        `;
                    return boton;
                }
            }

        ],
        "order": [
        [0, "desc"] // Columna del ID y orden descendente
    ],
        language: {
            url: "../../js/DataTable.config.json"
        },
    });

    $("#tabla").on("click", ".reporte", function() {
        var id = $(this).data("id");
        var nuevaVentana = window.open("../../../Controlador/reporteMedico.php?ID=" + encodeURIComponent(id), "_blank");
        nuevaVentana.focus();
    })
    
    $("#tabla").on("click", ".edit", function() {
    var id = $(this).data("id");
    $("#ID").val(id);
    $("#operacion").val("Editar");
    $.ajax({
        type: "POST",
        url: "../../../Controlador/c_cliente.php?operacion=consultarMedico",
        data: { ID: id },
        success: function(data) {
            var resultado = JSON.parse(data);
            var cedula = resultado.data[0].cliente_cedula.split("-");
            $("#Nacionalidad").val(cedula[0] + "-");
            $("#Cedula").val(cedula[1]);
            $("#Nombre").val(resultado.data[0].cliente_nombre);
            $("#Apellido").val(resultado.data[0].cliente_apellido);
            $("#Fecha").val(resultado.data[0].cliente_fechaNacimiento);
            $("#Edad").val(resultado.data[0].medico_edad);
            $("#Sangre").val(resultado.data[0].medico_tipoSangre);
            $("#Lente").val(resultado.data[0].medico_lente);
        }
    });
});

</script>