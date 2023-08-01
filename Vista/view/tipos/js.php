<script>
    $(document).ready(function() {
        var tabla = $("#tablaTipo").DataTable({
            ajax: {
                "url": "../../../Controlador/c_tipo.php?operacion=consultarTodos",
                "dataSrc": "data"
            },
            "columns": [{
                    data: "tipoVehiculo_id"
                },
                {
                    data: "tipoVehiculo_nombre"
                },
                {
                    data: "tipoVehiculo_precio",
                    render(data) {
                        return data + " $";
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        var precio = parseFloat(row.tipoVehiculo_precio) * precioDolar;
                        return precio.toFixed(2);
                    }
                },
                {
                    data: "tipoVehiculo_estatus",
                    render(data) {
                        if (data === "1") return "Activo";
                        else return "Desactivado";
                    }
                },
                {
                    defaultContent: "",
                    render: function(data, type, row) {
                        var icono = row.tipoVehiculo_estatus === "0" ? "done" : "cancel";
                        var titulo = row.tipoVehiculo_estatus === "0" ? "Activar" : "Desactivar"
                        var boton = `
        <a href="#tipo" class="edit" data-toggle="modal" data-id="${row.tipoVehiculo_id}">
            <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
        </a>
        <a href="" class="eliminar" data-toggle="modal" data-id="${row.tipoVehiculo_id}">
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
    $("#registroTipo").click(function() {
        var id = $("#ID").val();
        var nombre = $("#nombreTipo").val();
        var monto = $("#tipoDolar").val();
        var operacion = $("#operacion").val();
        $.ajax({
            type: "POST",
            url: "../../../Controlador/c_tipo.php",
            data: {
                operacion: operacion,
                ID: id,
                Nombre: nombre,
                Monto: monto
            },
            dataType: "text",
            success: function(data) {
                if (data == 1) {
                    iziToast.success({
                        title: 'tipo del vehiculo registrado',
                        position: 'topRight',
                    });
                }
                if (data == 0) {
                    iziToast.warning({
                        title: 'tipo del vehiculo ya registrado',
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
                        title: 'tipo del vehiculo editado',
                        position: 'topRight',
                    });
                }
                $("#nombreTipo").val("");
                $("#tipoDolar").val("");
                $("#operacion").val("Registro");
            },
            error: function(xhr, status, error) {
                console.error(xhr);
                console.error(status);
                console.error(error);
            }
        })
    })
    $("#tablaTipo").on("click", ".edit", function() {
        var id = $(this).data("id");
        $("#ID").val(id);
        $("#operacion").val("Editar");
        $.ajax({
            type: "POST",
            url: "../../../Controlador/c_tipo.php?operacion=consultarUno",
            data: {
                ID: id
            },
            success: function(data) {
                var resultado = JSON.parse(data);
                $("#nombreTipo").val(resultado.data[0].tipoVehiculo_nombre);
                $("#tipoDolar").val(resultado.data[0].tipoVehiculo_precio);
                $("#tipoBolivar").val(resultado.data[0].tipoVehiculo_precio * precioDolar);
            }
        })
    })
    $("#tablaTipo").on("click", ".eliminar", function() {
        var id = $(this).data("id");
        var value = $(this).find("i").hasClass("done") ? 1 : 0;
        $.ajax({
            type: "POST",
            url: "../../../Controlador/c_tipo.php?operacion=Eliminar",
            data: {
                ID: id,
                Estatus: value
            }
        })
    })
</script>