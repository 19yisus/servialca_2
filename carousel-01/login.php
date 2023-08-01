<?php
// Iniciar o reanudar la sesión
session_start();
// Verificar si se debe cerrar la sesión
if (isset($_GET['exit'])) {
  // Destruir la sesión
  session_destroy();
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>SERVIAL C.A.</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1,
      shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="./fontawesome-free-6.4.0-web/css/all.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="./images/logo2.ico" />
</head>

<body>


  <div class="container-fluid py-0  ">

    <div class="row no-gutter py-0 ">

      <!-- The image half -->
      <div class="col-md-7 d-none d-md-flex bg-image cuadro"></div>


      <!-- The content half -->
      <div class="col-md-5 bg-light py-0 sombra-izquierda cuadro">
        <nav class="navbar navbar-expand-lg bg-light mb-5">
          <div class="container-fluid">
            <a class="navbar-brand px-0" href="#">
              <img src="./images/logo.png" style="max-height: 70px;" alt="">
            </a>

          </div>
        </nav>
        <div class="login align-items-center py-5">

          <!-- Demo content-->
          <div class="container py-5">
            <div class="row">
              <div class="col-lg-10 col-xl-7 mx-auto">
                <h3 class="display-4">Bienvenido!</h3>
                <p class="text-muted mb-4 text-center">Al sistema de Servial C.A.</p>
                <form>
                  <div class="form-group mb-3">
                    <input type="text" placeholder="Usuario" id="Usuario" class="form-control rounded-pill border-0 shadow-sm px-4">
                  </div>
                  <div class="form-group mb-3">
                    <input type="password" placeholder="Contraseña" id="Clave" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                  </div>
                  <!-- <div class="custom-control custom-checkbox mb-3">
                                    <input id="customCheck1" type="checkbox" checked class="custom-control-input">
                                    <label for="customCheck1" class="custom-control-label">Remember password</label>
                                </div> -->
                  <button type="button" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm" id="btn">Ingresasr</button>
                  <!--     <div class="text-center d-flex justify-content-between mt-4"><p>Snippet by <a href="https://bootstrapious.com/snippets" class="font-italic text-muted"> 
                                        <u>Boostrapious</u></a></p></div> -->
                </form>
              </div>
            </div>
          </div><!-- End -->

        </div>
      </div><!-- End -->

    </div>
  </div>




  <footer class="text-white text-center text-lg-start bg-danger">
    <!-- Grid container -->
    <div class=" p-4" style="background-color: rgba(0, 0, 0, 0.2);">
      <!--Grid row-->
      <div class="row mt-4">
        <!--Grid column-->
        <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-4 fw-bold">Compañia</h5>

          <p>
            At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
            voluptatum deleniti atque corrupti.
          </p>

          <p>
            Blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas
            molestias.
          </p>

          <div class="mt-4">
            <!-- Facebook -->
            <a type="button" class="btn btn-floating btn-primary btn-lg"><i class="fab fa-facebook-f"></i></a>
            <!-- Dribbble -->
            <a type="button" class="btn btn-floating btn-primary btn-lg"><i class="fab fa-dribbble"></i></a>
            <!-- Twitter -->
            <a type="button" class="btn btn-floating btn-primary btn-lg"><i class="fab fa-twitter"></i></a>
            <!-- Google + -->
            <a type="button" class="btn btn-floating btn-primary btn-lg"><i class="fab fa-google-plus-g"></i></a>
            <!-- Linkedin -->
          </div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <!-- <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-4 pb-1">Puedes Contactarnos</h5>

         

          <ul class="fa-ul" style="margin-left: 1.65em;">
            <li class="mb-3">
              <span class="fa-li"><i class="fas fa-home"></i></span><span class="ms-2">Acarigua</span>
            </li>
            <li class="mb-3">
              <span class="fa-li"><i class="fas fa-envelope"></i></span><span class="ms-2">acarigua@example.com</span>
            </li>
            <li class="mb-3">
              <span class="fa-li"><i class="fas fa-phone"></i></span><span class="ms-2">+ 00 000 000 00</span>
            </li>
            <li class="mb-3">
              <span class="fa-li"><i class="fas fa-print"></i></span><span class="ms-2">+ 00 000 000 00</span>
            </li>
          </ul>
        </div> -->
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-6 col-md-7 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-4">Horario de Atención al Cliente</h5>

          <table class="table text-center text-white">
            <tbody class="font-weight-normal">
              <tr>
                <td>Lun - Mie:</td>
                <td>8am - 9pm</td>
              </tr>
              <tr>
                <td>Jue - Vie:</td>
                <td>8am - 1am</td>
              </tr>
              <tr>
                <td>Sab:</td>
                <td>9am - 10pm</td>
              </tr>
            </tbody>
          </table>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2021 Copyright:
      <a class="text-white" href="#">Acarigua.com</a>
    </div>
    <!-- Copyright -->
  </footer>

  <script>
    var nav = document.getElementById('nav');
    var itemsL = document.getElementById('items');
    var itemsL2 = document.getElementById('items2');
    var itemsL3 = document.getElementById('items3');



    window.onscroll = function() {
      console.log(window.pageYOffset)
      if (window.pageYOffset > 100) {
        nav.className = nav.className.replace(/(?:^|\s)bg-transparent(?!\S)/g, '')
        nav.className += " bg-light";

        itemsL.className = itemsL.className.replace(/(?:^|\s)text-light(?!\S)/g, '')
        itemsL.className += " text-danger";

        itemsL2.className = itemsL2.className.replace(/(?:^|\s)text-light(?!\S)/g, '')
        itemsL2.className += " text-danger";

        itemsL3.className = itemsL3.className.replace(/(?:^|\s)text-light(?!\S)/g, '')
        itemsL3.className += " text-danger";

      } else if (window.pageYOffset < 150) {
        nav.className = nav.className.replace(/(?:^|\s)bg-light(?!\S)/g, '')
        nav.className += " bg-transparent sombras";

        itemsL.className = itemsL.className.replace(/(?:^|\s)text-danger(?!\S)/g, '')
        itemsL.className += " text-light";
        itemsL2.className = itemsL2.className.replace(/(?:^|\s)text-danger(?!\S)/g, '')
        itemsL2.className += " text-light";
        itemsL3.className = itemsL3.className.replace(/(?:^|\s)text-danger(?!\S)/g, '')
        itemsL3.className += " text-light";

      }
    }
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
  <script src="../Vista/js/jquery-3.3.1.min.js"></script>
  <script src="../Vista/js/popper.min.js"></script>>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/main.js"></script>
  <script src="./fontawesome-free-6.4.0-web//js/all.js"></script>
</body>
<script>
  $(document).ready(function() {
    $("#btn").click(function() {
      var cedula = $("#Usuario").val();
      var clave = $("#Clave").val();
      $.ajax({
        type: "POST",
        url: "../Controlador/c_usuario.php?operacion=Buscar",
        data: {
          Usuario: cedula,
          Clave: clave
        },
        success: function(data) {
          var respuesta = JSON.parse(data);
          var valor = respuesta.data;
          if (valor == false){
              iziToast.warning({
              title: 'Usuario no bloqueado',
              position: 'topRight',
            });
          }
          if (
            valor == 2 || valor == "2") {
            iziToast.warning({
              title: 'Usuario no encontrado',
              position: 'topRight',
            });
          } if(valor == true) {
            iziToast.success({
              title: 'Usuario encontrado',
              position: 'topRight',
              
            });
             setTimeout(function() {
              window.location.href = "../../servialca2/Vista/view/poliza";
            }, 1500);
           
          }
        }
      });
    });
  });
</script>

</html>