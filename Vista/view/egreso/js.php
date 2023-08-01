<script>
    var tabla = $("#tabla").DataTable({
        ajax: {
            "url": "../../../Controlador/c_egreso.php?operacion=consultarTodos",
            "dataSrc": "data"
        },
        "columns": [{
                data: "nota_id"
            },
            {
                data: "nota_fecha"
            },
            {
                data: "nota_hora"
            },
            {
                data: "nota_monto",
                render: function(data) {
                    return data + " $"
                }
            },
            {
                data: "nota_motivo"
            }
        ],
        "order": [
            [0, "des"]
        ],
        language: {
            url: "../../js/DataTable.config.json"
        },
    })

    $("#Egreso").on("click", function() {
        var motivo = $("#Motivo").val();
        var cantidad = $("#cantidad").val();
        $.ajax({
            type: "POST",
            url: "../../../Controlador/c_egreso.php",
            data: {
                operacion: "Registro",
                Motivo: motivo,
                Monto: cantidad,
                Precio: precioDolar
            },
            success: function(data) {
                var respuesta = JSON.parse(data);
                if (respuesta.data.length > 0) {
                    iziToast.success({
                        title: 'Gasto registrado',
                        position: 'topRight',
                    });
                    $("#Motivo").val("");
                    $("#cantidad").val("");
                } else {
                    iziToast.error({
                        title: 'Gasto no registrado',
                        position: 'topRight',
                    });
                }
            }
        })
    })

    $("#cantidad").on("input", function() {
        $("#cantidadBolivar").val($("#cantidad").val() * precioDolar);
    })

    $("#cantidadBolivar").on("input", function() {
        $("#cantidad").val(($("#cantidadBolivar").val() / precioDolar).toFixed(2));
    })
</script>