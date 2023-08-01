<script>
    $(document).ready(function() {
        // Obtener la fecha actual en formato 'YYYY-MM-DD'
        var fechaActual = new Date().toISOString().split('T')[0];

        // Establecer la fecha actual como valor por defecto en los campos de fecha
        document.getElementById('Desde').value = fechaActual;
        document.getElementById('Hasta').value = fechaActual;
        $.ajax({
            url: 'https://api.exchangedyn.com/markets/quotes/usdves/bcv',
            dataType: 'json',
            success: function(data) {
                precioDolar = parseFloat(data.sources.BCV.quote).toFixed(2);
                $('#precioDolarPantalla').on('input', function() {
                    var cantidadDolar = $(this).val();
                    var cantidadBs = (cantidadDolar * precioDolar).toFixed(2);
                    $('#precioBolivarPantalla').val(cantidadBs);
                });
                // Detectar cambios en cantidadBs
                $('#precioBolivarPantalla').on('input', function() {
                    var cantidadBs = $(this).val();
                    var cantidadDolar = (cantidadBs / precioDolar).toFixed(2);
                    $('#precioDolarPantalla').val(cantidadDolar);
                });
            }
        });
        $("#Boton").on("click", function() {
            var nombre = $("#Nombre").val();
            var desde = $("#Desde").val();
            var hasta = $("#Hasta").val();
            $("#modalConsult").modal("show");
            $.ajax({
                type: "POST",
                url: "../../../Controlador/c_poliza.php?operacion=Reporte",
                data: {
                    Nombre: nombre,
                    Desde: desde,
                    Hasta: hasta
                },
                success: function(result) {
                    $("#modalConsulta").html(result);
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });
        $("#Reporte").on("click", function() {
            var nombre = $("#Nombre").val();
             var desde = $("#Desde").val();
             var hasta = $("#Hasta").val();

             // Redireccionar a la página de procesamiento de PDF y enviar los datos
             window.open("../../../Controlador/c_reporte.php?Nombre=" + nombre + "&Desde=" + desde + "&Hasta=" + hasta, "_blank");
        });

    });
</script>