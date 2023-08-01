<script>
    $(document).ready(function() {
        var id = $("#id").val();
        $.ajax({
            type: "POST",
            url: "../../../Controlador/c_usuario.php?operacion=consultarUno",
            data: {
                ID: id
            },
            success: function(data) {
                var resultado = JSON.parse(data);
                $("#cedula").val(resultado.data[0].usuario_cedula);
                $("#nombre").val(resultado.data[0].usuario_nombre);
                $("#apellido").val(resultado.data[0].usuario_apellido);
                $("#clave").val(resultado.data[0].usuario_clave);
                $("#login").val(resultado.data[0].usuario_usuario);
                $("#correo").val(resultado.data[0].usuario_correo);
                var telefono = resultado.data[0].usuario_telefono.split("-");
                $("#Codigo").val(telefono[0]);
                $("#Telefono").val(telefono[1]);
                $("#direccion").val(resultado.data[0].usuario_direccion);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Error en la solicitud AJAX: " + errorThrown);
            }
        })
    })

    $("#Editar").on("click",function(){
        var id = $("#id").val();
        var cedula = $("#cedula").val();
        var nombre = $("#nombre").val();
        var apellido = $("#apellido").val();
        var clave = $("#clave").val();
        var login = $("#login").val();
        var corre = $("#correo").val();
        var telefono = $("#Codigo").val() + "-" + $("#Telefono").val();
        var direccion = $("#direccion").val();
        $.ajax({
            type:"POST",
            url:"../../../Controlador/c_usuario.php",
            data: {
                operacion:"Editar",
                ID:id,
                Usuario:login,
                Nombre:nombre,
                Apellido:apellido,
                Cedula:cedula,
                Telefono:telefono,
                Direccion:direccion,
                Correo:corre,
                Clave:clave
            }
        })
    });
</script>