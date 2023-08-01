<script>
    $(document).ready(function() {
        var tabla = $("#tablaUsuario").DataTable({
            ajax: {
                "url": "../../../Controlador/c_usuario.php?operacion=consultarTodos",
                "dataSrc": "data"
            },
            "columns": [{
                    data: "usuario_id"
                },
                {
                    data: "usuario_usuario"
                },
                {
                    data: "usuario_nombre"
                },
                {
                    data: "usuario_apellido"
                },
                {
                    data: "usuario_cedula"
                },
                {
                    data: "usuario_telefono"
                },
                {
                    data: "usuario_direccion"
                },
                {
                    data: "usuario_correo"
                },
                {
                    data: "sucursal_nombre"
                },
                {
                    data: "roles_nombre"
                },
                {
                    data: "usuario_estatus",
                    render(data) {
                        if (data === "1") return "Activo";
                        else return "Desactivado";
                    }
                },
                {
                    defaultContent: "",
                    render: function(data, type, row) {
                        var icono = row.usuario_estatus === "0" ? "done" : "cancel";
                        var titulo = row.usuario_estatus === "0" ? "Activar" : "Desactivar"
                        var boton = `
                        <a href="#usuarios" class="edit" data-toggle="modal" data-id="${row.usuario_id}">
                            <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                        </a>
                        <a href="" class="eliminar" data-toggle="modal" data-id="${row.usuario_id}">
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
    })

    $("#Registro").click(function() {
        var id = $("#ID").val();
        var usuario = $("#Usuario").val();
        var nombre = $("#Nombre").val();
        var apellido = $("#Apellido").val();
        var cedula = $("#Nacionalidad").val() + $("#Cedula").val();
        var telefono = $("#Codigo").val() + $("#Telefono").val();
        var direccion = $("#Direccion").val();
        var correo = $("#Correo").val();
        var clave = $("#Cedula").val();
        var rol = $("#Rol").val();
        var sucursal = $("#Sucursal").val();
        var operacion = $("#operacion").val();
        var modulos = []; // Declarar la variable "modulos" como un array vacío
        let e = document.querySelectorAll(".permiso_cls");
        e.forEach(item => {
            if (item.checked) modulos.push(item.value);
        });
        $.ajax({
            type: "POST",
            url: "../../../Controlador/c_usuario.php",
            data: {
                operacion: operacion,
                ID: id,
                Usuario: usuario,
                Nombre: nombre,
                Apellido: apellido,
                Cedula: cedula,
                Telefono: telefono,
                Direccion: direccion,
                Correo: correo,
                Clave: clave,
                Rol: rol,
                Sucursal: sucursal,
                Modulos: modulos
            },
            dataType: "text",
            success: function(data) {
                if (data == 1) {
                    iziToast.success({
                        title: 'usuario registrado',
                        position: 'topRight',
                    });
                }
                if (data == 0) {
                    iziToast.warning({
                        title: 'usuario ya registrado',
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
                        title: 'usuario editado',
                        position: 'topRight',
                    });
                }
                $("#Nombre").val("");
                $("#operacion").val("Registro");
            },
            error: function(xhr, status, error) {
                console.error(xhr);
                console.error(status);
                console.error(error);
            }
        })
    })
    $("#tablaUsuario").on("click", ".eliminar", function() {
        var id = $(this).data("id");
        var value = $(this).find("i").hasClass("done") ? 1 : 0;
        $.ajax({
            type: "POST",
            url: "../../../Controlador/c_usuario.php?operacion=Eliminar",
            data: {
                ID: id,
                Estatus: value
            }
        })
    })

    function obtenerTipo() {
        var selectAsesor = $("#Rol");
        // Obtener el valor seleccionado actualmente
        var valorSeleccionado = selectAsesor.val();
        $.ajax({
            url: "../../../Controlador/c_datos.php?operacion=Rol",
            success: function(data) {
                var resultado = JSON.parse(data);
                // Limpiar opciones anteriores
                selectAsesor.empty();
                // Agregar opción por defecto
                selectAsesor.append('<option value="a">Seleccionar</option>');
                // Recorrer el array de transportes y agregar cada uno como opción
                resultado.data.forEach(function(roles) {
                    selectAsesor.append('<option value="' + roles.roles_id + '">' + roles.roles_nombre + '</option>');
                });
                // Restaurar la selección previa
                selectAsesor.val(valorSeleccionado);
            }
        });
    }
    setInterval(obtenerTipo, 1000);

    function obtenerSucursal() {
        var selectAsesor = $("#Sucursal");
        // Obtener el valor seleccionado actualmente
        var valorSeleccionado = selectAsesor.val();
        $.ajax({
            url: "../../../Controlador/c_datos.php?operacion=Sucursal",
            success: function(data) {
                var resultado = JSON.parse(data);
                // Limpiar opciones anteriores
                selectAsesor.empty();
                // Agregar opción por defecto
                selectAsesor.append('<option value="a">Seleccionar</option>');
                // Recorrer el array de transportes y agregar cada uno como opción
                resultado.data.forEach(function(sucursal) {
                    selectAsesor.append('<option value="' + sucursal.sucursal_id + '">' + sucursal.sucursal_nombre + '</option>');
                });
                // Restaurar la selección previa
                selectAsesor.val(valorSeleccionado);
            }
        });
    }
    setInterval(obtenerSucursal, 1000);
</script>