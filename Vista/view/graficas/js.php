<script>
    $(document).ready(function() {
        // Obtener la fecha actual
        var fechaActual = new Date().toISOString().split("T")[0];
        // Establecer la fecha actual en los campos de fecha
        $("#fecha1").val(fechaActual);
        $("#fecha2").val(fechaActual);
        $(document).on('change', '#fecha1', function() {
            fechaDesde = $("#fecha1").val();
            fechaHasta = $("#fecha2").val();
           
        });
        var fechaDesde = $("#fecha1").val();
        var fechaHasta = $("#fecha2").val();
        var renovaciones = 0; // Valor predeterminado para renovaciones
        var nuevos = 0; // Valor predeterminado para nuevos


        // Tabla
        var tabla = $("#tabla").DataTable({
            ajax: {
                type: "POST",
                url: "../../../Controlador/c_poliza.php",
                data: function(d) {
                    d.operacion = "diario";
                    d.Desde = fechaDesde;
                    d.Hasta = fechaHasta;
                }
            },
            columns: [{
                    data: "poliza_id"
                },
                {
                    data: "usuario_nombre"
                },
                {
                    data: "sucursal_nombre"
                },
                {
                    data: "poliza_renovacion",
                    render: function(data) {
                        if (data == 0) {
                            return "Nuevo";
                        } else {
                            return "Renovación";
                        }
                    }
                },
                {
                    data:"nota_monto"
                    
                },
                {
                    data: "totalPagar"
                }
            ],
            language: {
                url: "../../js/DataTable.config.json"
            },
            order: [
                [0, "desc"]
            ]
        })

        function crearGraficoRosquilla() {
            $.ajax({
                type: "POST",
                url: "../../../Controlador/c_poliza.php",
                data: {
                    operacion: "diario",
                    Desde: fechaDesde,
                    Hasta: fechaHasta
                },
                success: function(data) {
                    var resultado = JSON.parse(data);
                    renovaciones = 0;
                    nuevos = 0;
                    for (var i = 0; i < resultado.data.length; i++) {
                        if (resultado.data[i].poliza_renovacion > 0) {
                            renovaciones++;
                        } else {
                            nuevos++;
                        }
                    }
                }
            })
            // Verificar si el gráfico ya existe y destruirlo antes de crear uno nuevo
            var chart = $("#myChart2").data("chart");
            if (chart) {
                chart.destroy();
            }
            const ctx2 = document.getElementById('myChart2');
            const data = {
                labels: ['Contratos nuevos: ' + nuevos, 'Renovaciones: ' + renovaciones],
                datasets: [{
                    label: '',
                    data: [nuevos, renovaciones],
                    backgroundColor: ['Green', 'Blue'],
                }]
            };
            const fechaDesdeFormatted = new Date(fechaDesde).toLocaleDateString('es-ES', {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });
            const fechaHastaFormatted = new Date(fechaHasta).toLocaleDateString('es-ES', {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });
            const fechaRangeText = 'Desde ' + fechaDesdeFormatted + ' Hasta ' + fechaHastaFormatted;
            const options = {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    title: {
                        display: true,
                        text: fechaRangeText,
                    },
                },
            };
            const myChart2 = new Chart(ctx2, {
                type: 'doughnut',
                data: data,
                options: options,
            });
            // Guardar el gráfico en los datos del elemento canvas
            $("#myChart2").data("chart", myChart2);
        }

        function refres() {
            tabla.ajax.reload();
            $.ajax({
                type: "POST",
                url: "../../../Controlador/c_poliza.php",
                data: {
                    operacion: "diario",
                    Desde: fechaDesde,
                    Hasta: fechaHasta
                },
                success: function(data) {
                    var resultado = JSON.parse(data);
                    renovaciones = 0;
                    nuevos = 0;
                    for (var i = 0; i < resultado.data.length; i++) {
                        if (resultado.data[i].poliza_renovacion > 0) {
                            renovaciones++;
                        } else {
                            nuevos++;
                        }
                    }
                    // Actualizar el gráfico de rosquilla
                    crearGraficoRosquilla();
                }
            });
        }

        $("#Buscar").on("click", function() {
            refres();
        });

        $.ajax({
            type: "POST",
            url: "../../../Controlador/c_poliza.php",
            data: {
                operacion: "anual"
            },
            success: function(data) {
                var respuesta = JSON.parse(data);
                // Obtener los valores de los meses desde la respuesta JSON
                var enero = respuesta.data.enero;
                var febrero = respuesta.data.febrero;
                var marzo = respuesta.data.marzo;
                var abril = respuesta.data.abril;
                var mayo = respuesta.data.mayo;
                var junio = respuesta.data.junio;
                var julio = respuesta.data.julio;
                var agosto = respuesta.data.agosto;
                var septiembre = respuesta.data.septiembre;
                var octubre = respuesta.data.octubre;
                var noviembre = respuesta.data.noviembre;
                var diciembre = respuesta.data.diciembre;
                var monto = respuesta.data.monto;
                const ctx = document.getElementById('myChart');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                        datasets: [{
                            label: 'Total de contratos: ' + monto,
                            data: [enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre], // Actualizar los valores de los meses
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
                // Llamar a crearGraficoRosquilla después de obtener los datos
                refres();
            }
        });
    })
</script>