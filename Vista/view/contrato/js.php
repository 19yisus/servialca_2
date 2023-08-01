<script>
    $(document).ready(function() {
        var tabla = $("#tablaContrato").DataTable({
            "ajax": {
                "url": "../../../Controlador/c_contrato.php?operacion=consultarTodos",
                "dataSrc": "data"
            },
            "columns": [{
                    data: "contrato_id"
                },
                {
                    data: "contrato_nombre"
                },
                {
                    data: "dañoCosas"
                },
                {
                    data: "dañoPersonas"
                },
                {
                    data: "fianzaCuanti"
                },
                {
                    data: "asistenciaLegal"
                },
                {
                    data: "apov"
                },
                {
                    data: "muerte"
                },
                {
                    data: "invalidez"
                },
                {
                    data: "gastosMedicos"
                },
                {
                    data: "grua"
                },
                {
                    data: "contrato_estatus",
                    render(data) {
                        if (data === "1") return "Activo";
                        else return "Desactivado";
                    }
                },
                {
                    defaultContent: "",
                    render: function(data, type, row) {
                        var icono = row.contrato_estatus === "0" ? "done" : "cancel"; // Cambia el icono según el valor de vendedor_estatus
                        var titulo = row.contrato_estatus === "0" ? "Activar" : "Desactivar"
                        var boton = `
                       
                    <a href="#contrato" class="edit" data-toggle="modal" data-id="${row.contrato_id}">
                        <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                    </a>
                    <a href="" class="eliminar" data-toggle="modal" data-id="${row.contrato_id}">
                        <i class="material-icons ${icono}" data-toggle="tooltip" title="${titulo}">${icono}</i>
                    </a>
                    `;
                        return boton;
                    }
                }
            ],
            language: {
                url: "../../js/DataTable.config.json"
            },
        });
        setInterval(function() {
            tabla.ajax.reload(null, false);
        }, 1000);

        function vaciar() {
            $("#Nombre").val("");
            $("#dañoCosas").val("");
            $("#dañoPersonas").val("");
            $("#muerte").val("");
            $("#invalidez").val("");
            $("#gastosMedicos").val("");
            $("#grua").val("");
        }
        $("#registroContrato").click(function() {
            var id = $("#ID").val();
            var nombre = $("#Nombre").val();
            var dañoCosas = $("#dañoCosas").val();
            var dañoPersonas = $("#dañoPersonas").val();
            var fianzaCuantitativa = $("#fianzaCuantitativa").val();
            var asistenciaLegal = $("#asistenciaLegal").val();
            var apov = $("#apov").val();
            var muerte = $("#muerte").val();
            var invalidez = $("#invalidez").val();
            var gastosMedicos = $("#gastosMedicos").val();
            var grua = $("#grua").val();
            var operacion = $("#operacion").val();
            $.ajax({
                type: "POST",
                url: "../../../controlador/c_contrato.php",
                data: {
                    operacion: operacion,
                    ID: id,
                    Nombre: nombre,
                    dañoCosas: dañoCosas,
                    dañoPersonas: dañoPersonas,
                    Fianza: fianzaCuantitativa,
                    Asistencia: asistenciaLegal,
                    Apov: apov,
                    Muerte: muerte,
                    Invalidez: invalidez,
                    Gastos: gastosMedicos,
                    Grua: grua
                },
                dataType: "text",
                success: function(data) {
                    if (data == 1) {
                        iziToast.success({
                            title: 'contrato registrado',
                            position: 'topRight',
                        });
                    }
                    if (data == 0) {
                        iziToast.warning({
                            title: 'contrato ya registrado',
                            position: 'topRight',
                        });
                    }
                    if (data == 3) {
                        iziToast.error({
                            title: 'No registrado',
                            position: 'topRight',
                        });
                    }
                    if (data == 4) {
                        iziToast.info({
                            title: 'contrato editado',
                            position: 'topRight',
                        });
                    }
                    $("#operacion").val("Registro");
                    vaciar();
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                    console.error(status);
                    console.error(error);
                }
            })
        })
        $("#tablaContrato").on("click", ".edit", function() {
            var id = $(this).data("id");
            $("#ID").val(id);
            $("#operacion").val("Editar");
            $.ajax({
                type: "POST",
                url: "../../../Controlador/c_contrato.php?operacion=consultarUno",
                data: {
                    ID: id
                },
                success: function(data) {
                    var resultado = JSON.parse(data);
                    $("#Nombre").val(resultado.data[0].contrato_nombre);
                    $("#dañoCosas").val(resultado.data[0].dañoCosas);
                    $("#dañoPersonas").val(resultado.data[0].dañoPersonas);
                    $("#fianzaCuantitativa").val(resultado.data[0].fianzaCuanti);
                    $("#asistenciaLegal").val(resultado.data[0].asistenciaLegal);
                    $("#apov").val(resultado.data[0].apov);
                    $("#muerte").val(resultado.data[0].muerte);
                    $("#invalidez").val(resultado.data[0].invalidez);
                    $("#gastosMedicos").val(resultado.data[0].gastosMedicos);
                    $("#grua").val(resultado.data[0].grua);
                }
            })
        })
        $("#tablaContrato").on("click", ".eliminar", function() {
            var id = $(this).data("id");
            var value = $(this).find("i").hasClass("done") ? 1 : 0;
            $.ajax({
                type: "POST",
                url: "../../../Controlador/c_contrato.php?operacion=Eliminar",
                data: {
                    ID: id,
                    Estatus: value
                },
                dataType: "text",
            })
        })
    });
</script>