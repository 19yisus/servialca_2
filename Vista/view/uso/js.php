<script>
    $(document).ready(function() {
        var tabla = $("#tablaUso").DataTable({
            ajax: {
                "url": "../../../Controlador/c_uso.php?operacion=consultarTodos",
                "dataSrc": "data"
            },
            "columns": [{
                    data: "usoVehiculo_id"
                },
                {
                    data: "usoVehiculo_nombre"
                },
                {
                    data: "usoVehiculo_estatus",
                    render(data) {
                        if (data === "1") return "Activo";
                        else return "Desactivado";
                    }
                },
                {
                    defaultContent: "",
                    render: function(data, type, row) {
                        var icono = row.usoVehiculo_estatus === "0" ? "done" : "cancel";
                        var titulo = row.usoVehiculo_estatus === "0" ? "Activar" : "Desactivar"
                        var boton = `
        <a href="#uso" class="edit" data-toggle="modal" data-id="${row.usoVehiculo_id}">
            <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
        </a>
        <a href="" class="eliminar" data-toggle="modal" data-id="${row.usoVehiculo_id}">
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
    });
    $("#registroUso").click(function() {
        var id = $("#ID").val();
        var nombre = $("#nombreUso").val();
        var operacion = $("#operacion").val();
        $.ajax({
            type: "POST",
            url: "../../../Controlador/c_uso.php",
            data: {
                operacion: operacion,
                ID: id,
                Nombre: nombre
            },
            dataType: "text",
            success: function(data) {
                if (data == 1) {
                    iziToast.success({
                        title: 'Uso del vehiculo registrado',
                        position: 'topRight',
                    });
                }
                if (data == 0) {
                    iziToast.warning({
                        title: 'Uso del vehiculo ya registrado',
                        position: 'topRight',
                    });
                }
                if (data == 2) {
                    iziToast.error({
                        title: 'No registrado',
                        position: 'topRight',
                    });
                }
                if (data == 4) {
                    iziToast.info({
                        title: 'Uso del vehiculo editado',
                        position: 'topRight',
                    });
                }
                $("#nombreUso").val("");
                $("#operacion").val("Registro");
            },
            error: function(xhr, status, error) {
                console.error(xhr);
                console.error(status);
                console.error(error);
            }
        })
    })
    $("#tablaUso").on("click", ".edit", function() {
        var id = $(this).data("id");
        $("#ID").val(id);
        $("#operacion").val("Editar");
        $.ajax({
            type: "POST",
            url: "../../../Controlador/c_uso.php?operacion=consultarUno",
            data: {
                ID: id
            },
            success: function(data) {
                var resultado = JSON.parse(data);
                $("#nombreUso").val(resultado.data[0].usoVehiculo_nombre);
            }
        })
    })
    $("#tablaUso").on("click", ".eliminar", function() {
        var id = $(this).data("id");
        var value = $(this).find("i").hasClass("done") ? 1 : 0;
        $.ajax({
            type: "POST",
            url: "../../../Controlador/c_uso.php?operacion=Eliminar",
            data: {
                ID: id,
                Estatus: value
            }
        })
    })
</script>