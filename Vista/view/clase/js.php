<script>
    $(document).ready(function() {
        var tabla = $("#tablaClase").DataTable({
            ajax: {
                "url": "../../../Controlador/c_clase.php?operacion=consultarTodos",
                "dataSrc": "data"
            },
            "columns": [{
                    data: "clase_id"
                },
                {
                    data: "clase_nombre"
                },
                {
                    data: "clase_estatus",
                    render(data) {
                        if (data === "1") return "Activo";
                        else return "Desactivado";
                    }
                },
                {
                    defaultContent: "",
                    render: function(data, type, row) {
                        var icono = row.clase_estatus === "0" ? "done" : "cancel";
                        var titulo = row.clase_estatus === "0" ? "Activar" : "Desactivar"
                        var boton = `
        <a href="#clase" class="edit" data-toggle="modal" data-id="${row.clase_id}">
            <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
        </a>
        <a href="" class="eliminar" data-toggle="modal" data-id="${row.clase_id}">
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
    $("#registroClase").click(function() {
        var id = $("#ID").val();
        var nombre = $("#nombreClase").val();
        var operacion = $("#operacion").val();
        $.ajax({
            type: "POST",
            url: "../../../Controlador/c_clase.php",
            data: {
                operacion: operacion,
                ID: id,
                Nombre: nombre
            },
            dataType: "text",
            success: function(data) {
                if (data == 1) {
                    iziToast.success({
                        title: 'clase del vehiculo registrado',
                        position: 'topRight',
                    });
                }
                if (data == 0) {
                    iziToast.warning({
                        title: 'clase del vehiculo ya registrado',
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
                        title: 'clase del vehiculo editado',
                        position: 'topRight',
                    });
                }
                $("#nombreClase").val("");
                $("#operacion").val("Registro");
            },
            error: function(xhr, status, error) {
                console.error(xhr);
                console.error(status);
                console.error(error);
            }
        })
    })
    $("#tablaClase").on("click", ".edit", function() {
        var id = $(this).data("id");
        $("#ID").val(id);
        $("#operacion").val("Editar");
        $.ajax({
            type: "POST",
            url: "../../../Controlador/c_clase.php?operacion=consultarUno",
            data: {
                ID: id
            },
            success: function(data) {
                var resultado = JSON.parse(data);
                $("#nombreClase").val(resultado.data[0].clase_nombre);
            }
        })
    })
    $("#tablaClase").on("click", ".eliminar", function() {
        var id = $(this).data("id");
        var value = $(this).find("i").hasClass("done") ? 1 : 0;
        $.ajax({
            type: "POST",
            url: "../../../Controlador/c_clase.php?operacion=Eliminar",
            data: {
                ID: id,
                Estatus: value
            }
        })
    })
</script>