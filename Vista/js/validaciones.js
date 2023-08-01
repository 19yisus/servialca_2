$(document).ready(function() {
    $('.numero').on('input', function() {
      var valor = $(this).val();
      var soloNumeros = valor.replace(/[^0-9]/g, '');
      $(this).val(soloNumeros);
    });
    $('.texto').on('input', function() {
        var valor = $(this).val();
        var soloLetras = valor.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '');
        $(this).val(soloLetras);
      });
      $('.mixto').on('input', function() {
        var valor = $(this).val();
        var soloCaracteresValidos = valor.replace(/[^a-zA-Z0-9\s]/g, '');
        $(this).val(soloCaracteresValidos);
      });
});