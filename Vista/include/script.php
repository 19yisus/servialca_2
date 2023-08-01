<script src="../../js/jquery-3.3.1.min.js"></script>
<script src="../../js/popper.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../DataTable/datatables.min.js"></script>
<script src="../../DataTable/DataTables-1.12.1/js/dataTables.bootstrap5.js"></script>
<script src="../../js/validaciones.js"></script>
<script src="./fontawesome-free-6.4.0-web/css/all.css"></script>
<script src="./bootstrap-5.3.0-dist/js/bootstrap.css"></script>
<script src="../../dist/js/select2.min.js"></script>

<script type="text/javascript">
    var precioDolar = 0;
    $(document).ready(function() {
        $('.texto').on('input', function() {
            var inputValue = $(this).val();
            var sanitizedValue = inputValue.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '');
            $(this).val(sanitizedValue);
        });
        $.ajax({
            url: 'https://api.exchangedyn.com/markets/quotes/usdves/bcv',
            dataType: 'json',
            success: function(data) {
                precioDolar = parseFloat(data.sources.BCV.quote).toFixed(2);
                $(".inputDolar").on("input", function() {
                    var cantidadDolar = $(this).val();
                    var cantidadBs = (cantidadDolar * precioDolar).toFixed(2);
                    $(".inputBolivar").val(cantidadBs);
                });
                $(".inputBolivar").on("input", function() {
                    var cantidadDolar = $(this).val();
                    var cantidadBs = (cantidadDolar * precioDolar).toFixed(2);
                    $(".inputDolar").val(cantidadBs);
                });
                $('.precioDolarPantalla').on('input', function() {
                    var cantidadDolar = $(this).val();
                    var cantidadBs = (cantidadDolar * precioDolar).toFixed(2);
                    $('.precioBolivarPantalla').val(cantidadBs);
                });
                // Detectar cambios en cantidadBs
                $('.precioBolivarPantalla').on('input', function() {
                    var cantidadBs = $(this).val();
                    var cantidadDolar = (cantidadBs / precioDolar).toFixed(2);
                    $('.precioDolarPantalla').val(cantidadDolar);
                });
            }
        });
    });
    $(document).ready(function() {
        $(".mayuscula").keyup(function() {
            $(this).val($(this).val().toUpperCase());
        })
    })


    $(document).ready(function() {
        var today = new Date();

        // Formateamos la fecha para mostrarla en el formato deseado
        var formattedDate = today.getDate() + '/' + (today.getMonth() + 1) + '/' + today.getFullYear();

        // Actualizamos el contenido del elemento con el ID "form_date" con la fecha formateada
        document.getElementById("form_date").innerHTML = formattedDate;

        // Actualizamos la hora cada segundo
        setInterval(function() {
            // Obtenemos la hora actual
            var now = new Date();

            // Formateamos la hora para mostrarla en el formato deseado
            var formattedTime = now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds();

            // Actualizamos el contenido del elemento con el ID "form_time" con la hora formateada
            document.getElementById("form_time").innerHTML = formattedTime;
        }, 1000);
        // Obtiene el elemento HTML donde se muestra la hora
        var timeElement = document.getElementById("form_time");

        // Actualiza la hora cada segundo
        setInterval(function() {
            var now = new Date();
            var hours = now.getHours().toString().padStart(2, '0');
            var minutes = now.getMinutes().toString().padStart(2, '0');
            var seconds = now.getSeconds().toString().padStart(2, '0');
            timeElement.textContent = hours + ':' + minutes + ':' + seconds;
        }, 1000);

        $(".xp-menubar").on('click', function() {
            $("#sidebar").toggleClass('active');
            $("#content").toggleClass('active');
        });

        $('.xp-menubar,.body-overlay').on('click', function() {
            $("#sidebar,.body-overlay").toggleClass('show-nav');
        });

    });
</script>