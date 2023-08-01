<script>
$("#cantidadDolarMedico").val(10);
$("#cantidadBolivarMedico").val(10 * precioDolar);
    $(document).ready(function() {
        obtenerContrato();
        obtenerEstado();
        obtenerTransporte();
        obtenerUso();
        obtenerClase();
        obtenerTipo();
        obtenerModelo();
        obtenerMarca();
        var tabla = $("#tabla").DataTable({
            "ajax": {
                "url": "../../../Controlador/c_poliza.php?operacion=ConsultarVencer&ID=<?php echo $id ?>",
                "dataSrc": "data"
            },
            "columns": [{
                    data: "poliza_id",
                    render: function(data, type, row) {
                        if (row.poliza_renovacion < 10) {
                            return row.poliza_id + "-0" + row.poliza_renovacion;
                        } else {
                            return row.poliza_id + "-" + row.poliza_renovacion;
                        }
                    }
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
                    data: null,
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
                    <a href="#renovacion" class="renovacion" data-toggle="modal" data-id="${row.poliza_id}">
                            <i class="material-icons" data-toggle="tooltip" title="Renovar">&#x27F3;</i>
                        </a>
                    <a href="#modalConsult" class="edit btn " data-toggle="modal" id="Modal" data-id="${row.poliza_id}">
                    <i class="material-icons">insert_drive_file</i></a>
                    `;
                        return boton;
                    }
                }
            ],
            "order": [
                [0, "asc"]
            ], // Ordenar por la segunda columna en orden ascendente (fecha de vencimiento)
            "language": {
                "url": "../../js/DataTable.config.json"
            }
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

    // Buscar contrato
    function obtenerContrato() {
        var input = $("#tipoContrato");
        var valor = input.val();
        $.ajax({
            url: "../../../Controlador/c_datos.php?operacion=Contrato",
            success: function(data) {
                var resultado = JSON.parse(data);
                // Limpiar opciones anteriores
                input.empty();
                // Agregar opción por defecto
                input.append('<option value="a">Seleccionar</option>');
                // Recorrer el array de vendedores y agregar cada uno como opción
                resultado.data.forEach(function(contrato) {
                    input.append('<option value="' + contrato.contrato_id + '">' + contrato.contrato_nombre + '</option>');
                });
                // Restaurar la selección previa
                input.val(valor);
            }
        })
    }
    // Buscar estado
    function obtenerEstado() {
        var input = $("#Estado");
        var valor = input.val();
        $.ajax({
            url: "../../../Controlador/c_datos.php?operacion=Estado",
            success: function(data) {
                var resultado = JSON.parse(data);
                // Limpiar opciones anteriores
                input.empty();
                // Agregar opción por defecto
                input.append('<option value="a">Seleccionar</option>');
                // Recorrer el array de vendedores y agregar cada uno como opción
                resultado.data.forEach(function(estado) {
                    input.append('<option value="' + estado.estado_id + '">' + estado.estado_nombre + '</option>');
                });
                // Restaurar la selección previa
                input.val(valor);
            }
        })
    }
    // Buscar transporte
    function obtenerTransporte() {
        var input = $("#Transporte");
        var valor = input.val();
        $.ajax({
            url: "../../../Controlador/c_datos.php?operacion=Transporte",
            success: function(data) {
                var resultado = JSON.parse(data);
                // Limpiar opciones anteriores
                input.empty();
                // Agregar opción por defecto
                input.append('<option value="a">Seleccionar</option>');
                // Recorrer el array de vendedores y agregar cada uno como opción
                resultado.data.forEach(function(transporte) {
                    input.append('<option value="' + transporte.transporte_id + '">' + transporte.transporte_nombre + '</option>');
                });
                // Restaurar la selección previa
                input.val(valor);
            }
        })
    }
    // buscar uso
    function obtenerUso() {
        var input = $("#Uso");
        var valor = input.val();
        $.ajax({
            url: "../../../Controlador/c_datos.php?operacion=Uso",
            success: function(data) {
                var resultado = JSON.parse(data);
                // Limpiar opciones anteriores
                input.empty();
                // Agregar opción por defecto
                input.append('<option value="a">Seleccionar</option>');
                // Recorrer el array de vendedores y agregar cada uno como opción
                resultado.data.forEach(function(uso) {
                    input.append('<option value="' + uso.usoVehiculo_id + '">' + uso.usoVehiculo_nombre + '</option>');
                });
                // Restaurar la selección previa
                input.val(valor);
            }
        })
    }
    // Tipo de contrato
    $("#tipoContrato").change(function() {
        var contrato = $(this).val();
        $.ajax({
            type: "POST",
            url: "../../../Controlador/c_contrato.php?operacion=consultarUno",
            data: {
                ID: contrato
            },
            success: function(data) {
                var resultado = JSON.parse(data);
                $("#dañoCosas").val(resultado.data[0].dañoCosas);
                $("#dañoPersonas").val(resultado.data[0].dañoPersonas);
                $("#fianzaFacultativa").val(resultado.data[0].fianzaCuanti);
                $("#asistenciaLegal").val(resultado.data[0].asistenciaLegal);
                $("#apov").val(resultado.data[0].apov);
                $("#muerte").val(resultado.data[0].muerte);
                $("#invalidez").val(resultado.data[0].invalidez);
                $("#gastosMedicos").val(resultado.data[0].gastosMedicos);
                $("#grua").val(resultado.data[0].grua);

            }
        })
    })
    // Tipo de vehiuculo
    $("#Tipo").change(function() {
        var tipo = $(this).val();
        $.ajax({
            type: "POST",
            url: "../../../Controlador/c_tipo.php?operacion=consultarUno",
            data: {
                ID: tipo
            },
            success: function(data) {
                var resultado = JSON.parse(data);
                var bolivar = (resultado.data[0].tipoVehiculo_precio * precioDolar);
                $("#calculoDañoCasos").val(bolivar * 0.40);
                $("#calculoDañoPersonas").val(bolivar * 0.20);
                $("#calculoFianzaFacultativa").val(bolivar * 0.10);
                $("#calculoAsistenciaLegal").val(bolivar * 0.10);
                $("#calculoApov").val(bolivar * 1);
                $("#calculoMuerte").val(bolivar * 0.10);
                $("#calculoInvalidez").val(bolivar * 0);
                $("#calculoGastosMedicos").val(bolivar * 0);
                $("#calculoGrua").val(bolivar * 0.10);
                $("#cantidadDolar").val(resultado.data[0].tipoVehiculo_precio);
                $("#cantidadBs").val(resultado.data[0].tipoVehiculo_precio * precioDolar);
                $("#montoDolar").val(resultado.data[0].tipoVehiculo_precio);
                $("#montoBolivar").val(resultado.data[0].tipoVehiculo_precio * precioDolar);
            }
        })
    })
    // buscar clase
    function obtenerClase() {
        var input = $("#Clase");
        var valor = input.val();
        $.ajax({
            url: "../../../Controlador/c_datos.php?operacion=Clase",
            success: function(data) {
                var resultado = JSON.parse(data);
                // Limpiar opciones anteriores
                input.empty();
                // Agregar opción por defecto
                // Recorrer el array de vendedores y agregar cada uno como opción
                resultado.data.forEach(function(clase) {
                    input.append('<option value="' + clase.clase_id + '">' + clase.clase_nombre + '</option>');
                });
                // Restaurar la selección previa
                input.val(valor);
            }
        })
    }
    // buscar tipo
    function obtenerTipo() {
        var input = $("#Tipo");
        var valor = input.val();
        $.ajax({
            url: "../../../Controlador/c_datos.php?operacion=Tipo",
            success: function(data) {
                var resultado = JSON.parse(data);
                // Limpiar opciones anteriores
                input.empty();
                // Agregar opción por defecto
                input.append('<option value="a">Seleccionar</option>');
                // Recorrer el array de vendedores y agregar cada uno como opción
                resultado.data.forEach(function(tipo) {
                    input.append('<option value="' + tipo.tipoVehiculo_id + '">' + tipo.tipoVehiculo_nombre + '</option>');
                });
                // Restaurar la selección previa
                input.val(valor);
            }
        })
    }

    function obtenerModelo() {
        var input = $("#Modelo");
        var valor = input.val();
        $.ajax({
            url: "../../../Controlador/c_datos.php?operacion=Modelo",
            success: function(data) {
                var resultado = JSON.parse(data);
                // Limpiar opciones anteriores
                input.empty();
                // Agregar opción por defecto
                input.append('<option value="a">Seleccionar</option>');
                // Recorrer el array de vendedores y agregar cada uno como opción
                resultado.data.forEach(function(modelo) {
                    input.append('<option value="' + modelo.modelo_id + '">' + modelo.modelo_nombre + '</option>');
                });
                // Restaurar la selección previa
                input.val(valor);
            }
        })
    }

    function obtenerMarca() {
        var input = $("#Marca");
        var valor = input.val();
        $.ajax({
            url: "../../../Controlador/c_datos.php?operacion=Marca",
            success: function(data) {
                var resultado = JSON.parse(data);
                // Limpiar opciones anteriores
                input.empty();
                // Agregar opción por defecto
                input.append('<option value="a">Seleccionar</option>');
                // Recorrer el array de vendedores y agregar cada uno como opción
                resultado.data.forEach(function(marca) {
                    input.append('<option value="' + marca.marca_id + '">' + marca.marca_nombre + '</option>');
                });
                // Restaurar la selección previa
                input.val(valor);
            }
        })
    }

    // Abrir el formulario
    function abrirFormulario(event, formulario) {
        var tabcontent, tablinks;
        // Ocultar todos los formularios
        tabcontent = document.getElementsByClassName("tabcontent");
        for (var i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        // Remover la clase "active" de todos los botones de pestaña
        tablinks = document.getElementsByClassName("tablinks");
        for (var i = 0; i < tablinks.length; i++) {
            tablinks[i].classList.remove("active");
        }
        // Mostrar el formulario seleccionado y agregar la clase "active" al botón de pestaña correspondiente
        var selectedForm = document.getElementById(formulario);
        selectedForm.style.display = "block";
        event.currentTarget.classList.add("active");
    }
    // Asegurarse de que la primera opción esté abierta por defecto al cargar la página
    window.onload = function() {
        var defaultTab = document.getElementsByClassName("tablinks")[0];
        defaultTab.click();
    };

    var desde = document.getElementById("Desde");
    var hasta = document.getElementById("Hasta");

    // Función para obtener la fecha con 1 año más a partir de la fecha proporcionada
    function getFechaUnAnioMayor(fecha) {
        var date = new Date(fecha);
        date.setFullYear(date.getFullYear() + 1);
        return date.toISOString().slice(0, 10); // Formato yyyy-MM-dd
    }

    // Función para obtener la fecha actual en formato yyyy-MM-dd
    function getFechaActual() {
        var today = new Date();
        return today.toISOString().slice(0, 10); // Formato yyyy-MM-dd
    }

    // Actualizar el campo "Desde" con la fecha actual
    desde.value = getFechaActual();

    // Actualizar el campo "Hasta" cuando se cambia el valor del campo "Desde"
    desde.addEventListener('change', function() {
        hasta.value = getFechaUnAnioMayor(desde.value);
    });

    // Al cargar la página, asegurémonos de que el campo "Hasta" tenga la fecha correspondiente
    hasta.value = getFechaUnAnioMayor(desde.value);

    // Cédulas 
    $("#Cedula2").on("input", function() {
        if ($("#Nacionalidad").val() === $("#Nacionalidad2").val() && $("#Cedula").val() === $("#Cedula2").val()) {
            $("#Nombre2").val($("#Nombre").val());
            $("#Apellido2").val($("#Apellido").val());
        }
    });

    $("#Registro").on("click", function() {
        var contrato = $("#tipoContrato").val();
        var desde = $("#Desde").val();
        var hasta = $("#Hasta").val();
        var cedula = $("#Nacionalidad").val() + $("#Cedula").val();
        var nombre = $("#Nombre").val();
        var apellido = $("#Apellido").val();
        var fechaNacimiento = $("#fechaNacimiento").val();
        var telefono = $("#Codigo").val() + $("#Telefono").val();
        var correo = $("#Correo").val();
        var direccion = $("#Direccion").val();
        var estado = $("#Estado").val();
        var asesor = $("#Asesor").val();
        var sucursal = $("#Sucursal").val();
        var transporte = $("#Transporte").val();
        var cedulaTitular = $("#Nacionalidad2").val() + $("#Cedula2").val();
        var nombreTitular = $("#Nombre2").val();
        var apellidoTitular = $("#Apellido2").val();
        // Vehiculo
        var placa = $("#Placa").val();
        var puestos = $("#Puestos").val();
        var uso = $("#Uso").val();
        var año = $("#Año").val();
        var serialMotor = $("#serialMotor").val();
        var clase = $("#Clase").val();
        var color = $("#Color").val();
        var serialCarroceria = $("#serialCarroceria").val();
        var tipo = $("#Tipo").val();
        var modelo = $("#Modelo").val();
        var marca = $("#Marca").val();
        var peso = $("#Peso").val();
        var capacidad = $("#Capacidad").val();
        //garantia 
        var dañoCosas = $("#calculoDañoCasos").val();
        var dañoPersonas = $("#calculoDañoPersonas").val();
        var fianza = $("#calculoFianzaFacultativa").val();
        var asistencia = $("#calculoAsistenciaLegal").val();
        var apov = $("#calculoApov").val();
        var muerte = $("#calculoMuerte").val();
        var invalides = $("#calculoInvalidez").val();
        var medico = $("#calculoGastosMedicos").val();
        var grua = $("#calculoGrua").val();
        var monto = $("#montoBolivar").val();
        // pago
        var metodoPago = $("#forma").val();
        var referencia = $("#referencia").val();
        var cantidadDolar = $("#cantidadDolar").val();
        var cantidadBolivar = $("#cantidadBs").val();
        $.ajax({
            type: "POST",
            url: "../../../Controlador/c_poliza.php",
            data: {
                operacion: "Registro",
                Nombre: nombre,
                Apellido: apellido,
                Cedula: cedula,
                fechaNacimiento: fechaNacimiento,
                Telefono: telefono,
                Correo: correo,
                Direccion: direccion,
                Estado: estado,
                Placa: placa,
                Puestos: puestos,
                Año: año,
                serialMotor: serialMotor,
                Color: color,
                serialCarroceria: serialCarroceria,
                Modelo: modelo,
                Marca: marca,
                Uso: uso,
                Clase: clase,
                Tipo: tipo,
                Peso: peso,
                Capacidad: capacidad,
                cedulaTitular: cedulaTitular,
                nombreTitular: nombreTitular,
                apellidoTitular: apellidoTitular,
                fechaInicio: desde,
                fechaVencimiento: hasta,
                Contrato: contrato,
                Usuario: asesor,
                Sucursal: sucursal,
                // transporte: Transporte,
                dañoCosas: dañoCosas,
                dañoPersonas: dañoPersonas,
                Fianza: fianza,
                Asistencia: asistencia,
                Apov: apov,
                Muerte: muerte,
                Invalidez: invalides,
                Medico: medico,
                Grua: grua,
                Monto: monto,
                metodoPago: metodoPago,
                Referencia: referencia,
                cantidadDolar: cantidadDolar,
                precioDolar: precioDolar,
                tipoIngreso: "1",
                Motivo: "RCV"
            },
            success: function(data) {
                var resultado = JSON.parse(data);
                if (resultado.data.length > 0) {
                    iziToast.success({
                        title: 'Contrato registrado',
                        position: 'topRight',
                    });
                    $("#reporte").modal("toggle");
                    $("#nombre_reporte").val(resultado.data[0].cliente_nombre);
                    $("#apellido_reporte").val(resultado.data[0].cliente_apellido);
                    $("#cedula_reporte").val(resultado.data[0].cliente_cedula);
                    $("#placa_reporte").val(resultado.data[0].vehiculo_placa);
                    $("#reporteRcv a").attr("href", "../../Controlador/reporteRCV.php?ID=" + resultado.data[0].poliza_id);
                    $("#reporteRcvWEB a").attr("href", "../../Controlador/reporteRCVWEB.php?ID=" + resultado.data[0].poliza_id);
                    $("#carnetRcv a").attr("href", "../../Controlador/carnetRCV.php?ID=" + resultado.data[0].poliza_id);
                }
                if (resultado.data == 2) {
                    iziToast.error({
                        title: 'No se pudo registrar este contrato',
                        position: 'topRight',
                    });
                }
            },
            error: function(xhr, status, error) {
                alert("Error en la solicitud AJAX: " + error);
            }

        })
    })

    $("#buscar_cliente").on("click", function() {
        var cedula = $("#Nacionalidad").val() + $("#Cedula").val();
        $.ajax({
            type: "POST",
            url: "../../../Controlador/c_cliente.php?operacion=consultarUno",
            data: {
                Cedula: cedula
            },
            success: function(data) {
                var resultado = JSON.parse(data);
                if (resultado.data.length > 0) {
                    $("#Nombre").val(resultado.data[0].cliente_nombre);
                    $("#Apellido").val(resultado.data[0].cliente_apellido);
                    $("#fechaNacimiento").val(resultado.data[0].cliente_fechaNacimiento);
                    var telefono = resultado.data[0].cliente_telefono.split("-");
                    $("#Codigo").val(telefono[0] + "-");
                    $("#Telefono").val(telefono[1]);
                    $("#Correo").val(resultado.data[0].cliente_correo);
                    $("#Direccion").val(resultado.data[0].cliente_direccion);

                    iziToast.success({
                        title: 'Cliente encontrado',
                        position: 'topRight',
                    });
                } else {
                    $("#Nombre").val("");
                    $("#Apellido").val("");
                    $("#fechaNacimiento").val("");
                    $("#Codigo").val("0412");
                    $("#Telefono").val("");
                    $("#Correo").val("");
                    $("#Direccion").val("");
                    iziToast.error({
                        title: 'Cliente no encontrado',
                        position: 'topRight',
                    });
                }
            },
            error: function() {
                alert("error");
            }
        })
    })

    $("#buscar_titular").on("click", function() {
        var cedula = $("#Nacionalidad2").val() + $("#Cedula2").val();
        $.ajax({
            type: "POST",
            url: "../../../Controlador/c_cliente.php?operacion=consultarTitular",
            data: {
                Cedula: cedula
            },
            success: function(data) {
                var resultado = JSON.parse(data);
                if (resultado.data.length > 0) {
                    iziToast.success({
                        title: 'Titular encontrado',
                        position: 'topRight',
                    });
                    if (resultado.data[0].cliente_nombre == "" || resultado.data[0].cliente_apellido == null) {
                        $("#Nombre2").val(resultado.data[0].titular_nombre);
                        $("#Apellido2").val(resultado.data[0].titular_apellido);
                    } else {
                        $("#Nombre2").val(resultado.data[0].cliente_nombre);
                        $("#Apellido2").val(resultado.data[0].cliente_apellido);
                    }

                } else {
                    iziToast.error({
                        title: 'Titular no encontrado',
                        position: 'topRight',
                    });
                }

            },
            error: function() {
                alert("Error");
            }
        })
    })

    $("#buscar_vehiculo").on("click", function() {
        var placa = $("#Placa").val();
        $.ajax({
            type: "POST",
            url: "../../../Controlador/c_vehiculo.php?operacion=consultarUno",
            data: {
                Placa: placa
            },
            success: function(data) {
                var resultado = JSON.parse(data);
                if (resultado.data.length > 0) {
                    $("#Puestos").val(resultado.data[0].vehiculo_puesto);
                    $("#Año").val(resultado.data[0].vehiculo_año);
                    $("#serialMotor").val(resultado.data[0].vehiculo_serialMotor);
                    $("#Color").val(resultado.data[0].color_nombre);
                    $("#serialCarroceria").val(resultado.data[0].vehiculo_serialCarroceria);
                    $("#Modelo").val(resultado.data[0].modelo_nombre);
                    $("#Marca").val(resultado.data[0].marca_nombre);
                    $("#Peso").val(resultado.data[0].vehiculo_peso);
                    $("#Capacidad").val(resultado.data[0].vehiculo_capTon);
                    $("#Tipo").val(resultado.data[0].tipoVehiculo_id);
                    $("#Clase").val(resultado.data[0].clase_id);
                    $("#Uso").val(resultado.data[0].usoVehiculo_id);
                    // Convertir a número decimal usando parseFloat()
                    var precioVehiculo = parseFloat(resultado.data[0].tipoVehiculo_precio);

                    $("#cantidadDolar").val(precioVehiculo.toFixed(2));
                    $("#cantidadBs").val((precioVehiculo * precioDolar).toFixed(2));

                    // El resto de los cálculos también se hacen con precioVehiculo como número decimal
                    var bolivar = precioVehiculo * precioDolar;
                    $("#montoDolar").val(precioVehiculo.toFixed(2));
                    $("#montoBolivar").val((bolivar * 1).toFixed(2));
                    $("#calculoDañoCasos").val((0.40 * precioDolar).toFixed(2));
                    $("#calculoDañoPersonas").val((0.20 * precioDolar).toFixed(2));
                    $("#calculoFianzaFacultativa").val((0.10 * precioDolar).toFixed(2));
                    $("#calculoAsistenciaLegal").val((0.10 * precioDolar).toFixed(2));
                    $("#calculoApov").val((1 * precioDolar).toFixed(2));
                    $("#calculoMuerte").val((0.10 * precioDolar).toFixed(2));
                    $("#calculoInvalidez").val((0 * precioDolar).toFixed(2));
                    $("#calculoGastosMedicos").val((0 * precioDolar).toFixed(2));
                    $("#calculoGrua").val((0.10 * precioDolar).toFixed(2));

                    iziToast.success({
                        title: 'Vehiculo encontrado',
                        position: 'topRight',
                    });
                } else {
                    $("#Puestos").val("");
                    $("#Año").val("");
                    $("#serialMotor").val("");
                    $("#Color").val("");
                    $("#serialCarroceria").val("");
                    $("#tipoVehiculo").val("");
                    $("#Modelo").val("");
                    $("#Marca").val("");
                    $("#Peso").val("");
                    $("#Capacidad").val("");
                    $("#tipo").val("a");
                    $("#clase").val("a");
                    $("#uso").val("a");
                    $("#cantidadDolar").val("");
                    $("#cantidadBs").val("");
                    iziToast.error({
                        title: 'Vehiculo no encontrado',
                        position: 'topRight',
                    });
                }

            }
        })
    })

    $(document).ready(function() {
        // Al cargar la página, verificamos el valor inicial del select y habilitamos o deshabilitamos el campo de referencia
        var formaPagoSelect = $("#forma");
        var referenciaInput = $("#referencia");

        if (formaPagoSelect.val() === "0" || formaPagoSelect.val() === "2") {
            referenciaInput.prop("disabled", false);
        } else {
            referenciaInput.prop("disabled", true);
        }

        // Agregamos el evento de cambio al select para habilitar/deshabilitar el campo de referencia
        formaPagoSelect.on("change", function() {
            if (this.value === "0" || this.value === "2") {
                referenciaInput.prop("disabled", false);
            } else {
                referenciaInput.prop("disabled", true);
            }
        });
        referenciaInput.on("input", function() {
            var maxDigitos = 4;
            if (this.value.length > maxDigitos) {
                // Si se excede el límite de 4 dígitos, recortamos el contenido a solo 4 dígitos
                this.value = this.value.slice(0, maxDigitos);
            }
        });
    });

    $("#buscar_clienteMedico").on("click", function() {
        var cedula = $("#NacionalidadMedico").val() + $("#CedulaMedico").val();
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
                    $("#NombreMedico").val(respuesta.data[0]["cliente_nombre"]);
                    $("#ApellidoMedico").val(respuesta.data[0]["cliente_apellido"]);
                    $("#FechaMedico").val(respuesta.data[0]["cliente_fechaNacimiento"]);
                    var telefono = respuesta.data[0]["cliente_telefono"].split("-");
                    $("#CodigoMedico").val(telefono[0] + "-");
                    $("#TelefonoMedico").val(telefono[1]);
                    $("#CorreoMedico").val(respuesta.data[0]["cliente_correo"]);
                    $("#DireccionMedico").val(respuesta.data[0]["cliente_direccion"]);
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
        var fecha = $("#FechaMedico").val();
        var desde = $("#DesdeMedico").val();
        var hasta = $("#HastaMedico").val();
        var cedula = $("#NacionalidadMedico").val() + $("#CedulaMedico").val();
        var nombre = $("#NombreMedico").val();
        var apellido = $("#ApellidoMedico").val();
        var telefono = $("#CodigoMedico").val() + $("#TelefonoMedico").val();
        var correo = $("#CorreoMedico").val();
        var direccion = $("#DireccionMedico").val();
        var edad = $("#Edad").val();
        var sangre = $("#Sangre").val();
        var lente = $("#Lente").val();
        var formaPago = $("#FormaMedico").val();
        var referencia = $("#referenciaMedico").val();
        var cantidadDolar = $("#cantidadDolarMedico").val();
        var sucursal = $("#Sucursal").val();
        var asesor = $("#Asesor").val();
        $.ajax({
            type: "POST",
            url: "../../../Controlador/c_cliente.php",
            data: {
                operacion: "registrarMedico",
                Fecha: fecha,
                Desde: desde,
                Hasta: hasta,
                Cedula: cedula,
                Nombre: nombre,
                Apellido: apellido,
                Direccion: direccion,
                Corre:correo,
                Telefono:telefono,
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
                $("#NacionalidadMedico").val("V-");
                $("#CedulaMedico").val("");
                $("#NombreMedico").val("");
                $("#ApellidoMedico").val("");
                $("#FechaMedico").val("");
                $("#CodigoMedico").val("0412-");
                $("#TelefonoMedico").val("");
                $("#CorreoMedico").val("");
                $("#DireccionMedico").val("");
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
</script>