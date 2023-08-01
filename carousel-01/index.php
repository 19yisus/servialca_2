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
   
 <link rel="stylesheet" href="./fontawesome-free-6.4.0-web/css/all.css">

  <link rel="stylesheet" href="./css/owl.carousel.min.css">
  <link rel="stylesheet" href="./css/owl.theme.default.min.css">
 <link rel="stylesheet" href="./css/style.css">
  <link rel="shortcut icon" href="./images/logo2.ico" />
  <link rel="stylesheet" href="./bootstrap-5.3.0-dist/css/bootstrap.css">

<style>
  .btn-wsp{
    position:fixed;
    width:60px;
    height:60px;
    line-height: 63px;
    bottom:25px;
    right:25px;
    background:#25d366;
    color:#FFF;
    border-radius:50px;
    text-align:center;
    font-size:35px;
    box-shadow: 0px 1px 10px rgba(0,0,0,0.3);
    z-index:100;
    transition: all 300ms ease;
    bottom:50px;
}
.btn-wsp:hover{
    background: #20ba5a;

}

.hidden_home {
  margin-left: -100%;
}

.margin-auto {
  margin-left: 1%;
 
}


@media only screen and (min-width:320px) and (max-width:768px){
    .btn-wsp{
        width:63px;
        height:63px;
        line-height: 66px;
	}
}


 .btn-wsp2{
    position:fixed;
    width:230px;
    height:180px;
    line-height: 63px;
    bottom:25px;
    left:20px;
    color:#FFF;
   
    text-align:center;
    font-size:35px;
    box-shadow: 0px 1px 10px rgba(0,0,0,0.3);
    z-index:100;
    transition: all 300ms ease;
    bottom:50px;
}

@media only screen and (min-width:200px) and (max-width:400px){
    .btn-wsp2{
       visibility:collapse;
	}
}
</style>

</head>

<body>
 

  <nav class="navbar navbar-expand-lg fixed-top px-2 bg-servial" id="nav" >
    <div class="container-fluid">

      <img class="navbar-brand img-fluid" src="./images/logo1.png" style="height: 70px;" alt="" srcset="">

      <button class="navbar-toggler text-servial" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse col-xl-6 col-lg-7" id="navbarText" style="margin-right: -5%;">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  

          <li class="nav-item">
            <a class="nav-link text-light fw-bold" aria-current="page" href="#home"><i class="fa-solid fa-house"></i>  Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light fw-bold" aria-current="page" href="#quienes"><i class="fa-solid fa-circle-info"></i>  Quienes Somos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light fw-bold" aria-current="page" href="#contactanos"><i class="fa-solid fa-address-book"></i>  Contactanos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light fw-bold" aria-current="page" data-bs-toggle="modal" data-bs-target="#staticBackdrop" type="button"><i class="fa-solid fa-user"></i>  Login</a>
          </li>
          
        </ul>

      </div>
    </div>
  </nav>

  <div class="home-slider owl-carousel ">
    <div class="slider-item js-fullheight " style="background-image:url(images/was3.jpg); background-size: 100%
        100%; background-repeat: no-repeat;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight
            align-items-center justify-content-center">
          <div class="col-md-12 ftco-animate">
            <div class="text w-100 text-center">
             
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="slider-item js-fullheight " style="background-image:url(images/was1.jpeg); background-size: 100%
        100%; background-repeat: no-repeat;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight
            align-items-center justify-content-center">
          <div class="col-md-12 ftco-animate">
            <div class="text w-100 text-center">

              <!--  <h1 class="mb-3">Japan</h1> -->
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="slider-item js-fullheight " style="background-image:url(images/was1.jpeg); background-size: 100%
        100%; background-repeat: no-repeat;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight
            align-items-center justify-content-center">
          <div class="col-md-12 ftco-animate">
            <div class="text w-100 text-center">
              <!--   <a href="./login.html" target="_blank" class="btn-login rounded-pill" rel="noopener noreferrer">Inico de Sesion</a>
 -->
              <!--   <h1 class="mb-3">Singapore</h1> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mx-auto col-md-12">

    <!-- contenedor de home -->

    <div class="col-md-12" id="home">
      <div class="col-md-12 hidden_home row py-5" style="transition: all 1s ease-out;" id="homediv">

        <div class="col-md-12 mx-auto text-center mt-5 py-4">
          <h1 class="fw-bold text-center text-servial" style="font-family:'Lucida Sans',
              'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode',
              Geneva, Verdana, sans-serif; font-weight:bold ;">- <i class="fa-solid fa-house"></i> Home -</h1>
        </div>

        <div class="col-md-5 mx-auto">
          <img src="./images/bgimg.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-md-7 mx-auto text-center">
          aqui si le pone el texto de quienes son son y todo eso
        </div>

      </div>
    </div>

   

 

      <div class="col-md-12  px-0 mb-5 py-3" style="transition: all 1s ease-out;">
        <img src="./images/banner2.jpeg"  class=" img-fluid" style="width: 100%;" >
      </div>




    <!-- contenedor de quines somos -->
    <div class="col-md-12 py-5" id="quienes" >
      <div class="row col-md-12 mt-5  hidden_home"  style="transition: all 1s ease-out;" id="quienesdiv">
        <div class="col-md-12 mx-auto row py-5" >

          <div class="col-md-12 mx-auto text-center">
            <h1 class="fw-bold text-center text-servial" style="font-family:'Lucida Sans',
              'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode',
              Geneva, Verdana, sans-serif; font-weight:bold ;">- <i class="fa-solid fa-id-card-clip"></i> Quienes Somos -
            </h1>
          </div>
        </div>
        <div class="col-md-12 mx-auto row py-5" >
          <div class="col-md-6 mx-auto text-center">
            aqui si le pone el texto de quienes son son y todo eso
          </div>

          <div class="col-md-6 mx-auto py-4">
            <img src="./images/banner1.jpeg" alt="" class="img-fluid" srcset="">
          </div>

        </div>



      </div>
    </div>

    <!-- contenedor contactanos -->
    <div class="col-md-12 py-5" id="contact" >
      <div class="row  col-md-12 mt-5 mb-5 hidden_home" style="transition: all 1s ease-out;" id="contactanos">
        <div class="col-md-12 mx-auto row py-5" >

          <div class="col-md-12 mx-auto text-center">
            <h1 class="fw-bold text-center text-servial" style="font-family:'Lucida Sans',
              'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode',
              Geneva, Verdana, sans-serif; font-weight:bold ;">- <i class="fa-regular fa-address-book"></i> Contactanos -
            </h1>
          </div>
        </div>
        <div class="col-md-12 mx-auto row py-5">
          <div class="col-md-7 mx-auto py-4">
            <form class="card shadow p-4 rounded border">
              <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Tu Correo:</label>
                <input type="email" class="form-control form-control-sm bg-transparent rounded-pill" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Ingresa tu correo para poder comunicarnos contigo,</div>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mensaje</label>
                <textarea type="textarea" class="form-control" id="exampleInputPassword1"></textarea>
              </div>

              <button type="submit" class="btn btn-primary btn-sm rounded-pill">Enviar Mensaje</button>
            </form>
          </div>
          <div class="col-md-5 mx-auto py-4">
            <ul class="fa-ul" style="margin-left: 1.65em;">
              <li class="mb-3">
                <h5 class="fa-li"><i class="fas fa-home"></i></h5>
                <h5 class="ms-2">Acarigua</h5>
              </li>
              <li class="mb-3">
                <h5 class="fa-li"><i class="fas fa-envelope"></i></h5>
                <h5 class="ms-2">acarigua@example.com</h5>
              </li>
              <li class="mb-3">
                <h5 class="fa-li"><i class="fas fa-phone"></i></h5>
                <h5 class="ms-2">+ 00 000 000 00</h5>
              </li>
              <li class="mb-3">
                <h5 class="fa-li"><i class="fas fa-print"></i></h5>
                <h5 class="ms-2">+ 00 000 000 00</h5>
              </li>
            </ul>
          </div>

        </div>



      </div>
    </div>
    <div class="row  col-md-12 mt-5 mb-5" id="misionvision">
      
      <div class="col-md-12 mx-auto row py-5" >
        <div class="col-md-6 mx-auto py-4">
        <div class="col-md-12 mx-auto row py-5" >

        <div class="col-md-12 mx-auto text-center">
          <h1 class="fw-bold text-center text-servial" style="font-family:'Lucida Sans',
            'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode',
            Geneva, Verdana, sans-serif; font-weight:bold ;">- Vision -
          </h1>
        </div>
        </div>
        </div>
        <div class="col-md-6 mx-auto py-4">
        <div class="col-md-12 mx-auto row py-5">

          <div class="col-md-12 mx-auto text-center">
            <h1 class="fw-bold text-center text-servial" style="font-family:'Lucida Sans',
              'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode',
              Geneva, Verdana, sans-serif; font-weight:bold ;">- Mision -
            </h1>
          </div>
          </div>
        </div>
        
      </div>



    </div>

     <!-- contenedor galeria -->

    <div class="col-md-12 py-5"  >
      <div class="row  col-md-12 mt-5 mb-5 " style="transition: all 1s ease-out;">
        <div class="col-md-12 mx-auto row py-5" >

          <div class="col-md-12 mx-auto text-center">
            <h1 class="fw-bold text-center text-servial" style="font-family:'Lucida Sans',
              'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode',
              Geneva, Verdana, sans-serif; font-weight:bold ;">- <i class="fa-solid fa-camera-retro"></i> Galeria -
            </h1>
          </div>
        </div>
    


      </div>
    </div>

    

  </div>
  

    <div class="col-md-12 mx-auto px-0 fixed-bottom">
      <div class="slider" >
        <div class="slide-track d-flex justify-content-end" >
          
        
         
         
          
        
          
          <div class="slide text-left" > 
            <span>La pagina Servialca rcv se enceuntra en desarrollo

            </span>
          </div>

        </div>
      </div>

    </div>

    <a href="https://wa.me/573001112233?text=Hola!%20Estoy%20interesado%20en%20tu%20servicio" class="btn-wsp" target="_blank">
    <i class="fa-brands fa-whatsapp"></i>
	</a>

  

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
          <div class="modal-content rounded sombras px-0">
            <!--  <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> -->
            <div class="bg-transparent px-0">
              <div class="col-md-12 x-auto py-2 text-end">
                <a type="button" class="text-dark" data-bs-dismiss="modal" style="font-size: 20px;"><i class="fa-regular fa-circle-xmark"></i></a>


              </div>
              <div class="col-xl-12  mx-auto">

                <div class="col-xl-12  mx-auto">
                  <div class="col-md-12 row mx-auto ">
                    <img src="./images/logo2.png" class="mx-auto mb-2" style="width: 120px;" alt="">
                    <h3 class="text-danger mx-auto text-center  mb-3">Bienvenido</h3>

                    <input class="mb-2 form-control form-control-sm mx-auto rounded-pill" type="text" align="center" placeholder="Usuario" id="Usuario">



                    <div class="input-group input-group-sm mb-2 px-0">
                      <input class=" mx-auto form-control form-control-sm rounded-pill " type="password" align="center" placeholder="Contraseña" id="Clave">


                      <a type="button" class="text-dark btn" onclick="hideOrShowPassword()"><i class="fa-solid fa-eye-slash" id="ojo"></i></a>
                    </div>


                    <button class="btn btn-success btn-sm rounded-pill px-2 border-0 mx-auto col-md-6 text-center" id="btn">
                      <i class="fa-solid fa-user"></i> Ingresar
                    </button>
                    <span class="forgot text-danger mt-4" align="center"><a href="#" class="fw-bold py-0" style="text-decoration: none;">Recuperar Contraseña <i class="fa-solid fa-lock"></i></p>
                    <span class="forgot text-danger mb-4" align="center"><a  data-bs-toggle="modal" data-bs-target="#staticBackdrop2" href="#"  class="fw-bold py-0" style="text-decoration: none;">Registrarse <i class="fa-solid fa-user"></i></p>

                  </div>
                </div>


              </div>
            </div>
            <!--  <div class="modal-footer">
              <button type="button" class="btn btn-secondary" >Close</button>
              <button type="button" class="btn btn-primary">Understood</button>
            </div> -->
          </div>
        </div>
      </div>

      
  </div>
  <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-danger text-light">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Registro Nuevo Usuario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="col-md-12 row mx-auto">

        <div class="mb-2 col-md-4">
          <label for="exampleInputEmail1" class="form-label">Cedula</label>
          <input type="text" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">Ingrese una cedula valida</div>
        </div>
        <div class="col-md-8">  </div>

       

        <div class="mb-2 col-md-6">
          <label for="exampleInputEmail1" class="form-label">Nombres</label>
          <input type="text" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp">
         
        </div>
        <div class="mb-2 col-md-6">
          <label for="exampleInputEmail1" class="form-label">Apellidos</label>
          <input type="text" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp">
         
        </div>

        <div class="mb-2 col-md-4">
          <label for="exampleInputEmail1" class="form-label">Login</label>
          <input type="text" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp">
         
        </div>

        <div class="mb-2 col-md-4">
          <label for="exampleInputEmail1" class="form-label">Correo</label>
          <input type="text" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp">
         
        </div>

        <div class="mb-2 col-md-4">
          <label for="exampleInputEmail1" class="form-label">Telefono</label>
          <input type="text" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp">
         
        </div>

        <div class="mb-2 col-md-12">
          <label for="exampleFormControlTextarea1" class="form-label">Direccion</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
        </div>

        <div class="mb-2 col-md-3 mx-auto">
          <label for="exampleInputEmail1" class="form-label">Código</label>
          <input type="text" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp">
         
        </div>

        </div>
      </div>
      <div class="col-md-12 mx-auto text-center py-2">
      <button type="button" class="btn btn-primary btn-sm"> <i class="fa-solid fa-check"></i> Verificar</button>

        <button type="button" class="btn btn-success btn-sm"><i class="fa-solid fa-check"></i> Aceptar</button>
        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="fa-solid fa-x"></i> Cancelar</button>

      </div>
    </div>
  </div>
</div>

 
<footer class="text-center text-white bg-servial mb-3">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

        <!-- Twitter -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>

        <!-- Google -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-google"></i></a>

        <!-- Instagram -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>

        <!-- Linkedin -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>

        <!-- Github -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-github"></i></a>
      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center py-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2020 Copyright:
      <a class="text-white" href="https://servialcarcv.com/" target="_blank">Servialcarcv.com</a>
    </div>
    <!-- Copyright -->
  </footer>

  <script>

    var home = document.getElementById('home');
    var homediv = document.getElementById('homediv');

    var quienes = document.getElementById('quienes');
    var quienesdiv = document.getElementById('quienesdiv');

   

    var contact = document.getElementById('contact');
    var contactanos = document.getElementById('contactanos');

    

    window.onscroll = function() {

      function isInViewport(elem) {
          var distance = elem.getBoundingClientRect();
          return (
              distance.top < (window.innerHeight || document.documentElement.clientHeight) && distance.bottom > 0
          );
      }
      

      console.log(isInViewport(home))

      if (isInViewport(home)) {
       
        homediv.className = homediv.className.replace(/(?:^|\s)hidden_home(?!\S)/g, ' ')
        homediv.className += " margin-auto ";
      }

      if (isInViewport(quienes)) {
      
        quienesdiv.className = quienesdiv.className.replace(/(?:^|\s)hidden_home(?!\S)/g, ' ')
        quienesdiv.className += " margin-auto ";
      }

     
    if (isInViewport(contact)) {
      
      contactanos.className = contactanos.className.replace(/(?:^|\s)hidden_home(?!\S)/g, ' ')
      contactanos.className += " margin-auto ";
    }

     

     
}
      
   




    function hideOrShowPassword() {
      var password1, password2, check;

      password1 = document.getElementById("Clave");



      if (password1.type == "password") {
        password1.type = "text";

        $('#ojo').addClass('fa-solid fa-eye');

      } else // Si no está activada
      {
        password1.type = "password";

        $('#ojo').addClass('fa-solid fa-eye-slash');

      }
    }   
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/main.js"></script>
  <script src="./fontawesome-free-6.4.0-web//js/all.js"></script>
  <script src="./bootstrap-5.3.0-dist/js/bootstrap.js"></script>


</body>
<script>
  $(document).ready(function() {
    $("#btn").click(function() {
      var cedula = $("#Usuario").val();
      var clave = $("#Clave").val();
      $.ajax({
        type: "POST",
        url: "../controlador/c_usuarios.php?operacion=Buscar",
        data: {
          Usuario: cedula,
          Clave: clave,
        },
        success: function(data) {
          var respuesta = JSON.parse(data);
          var valor = respuesta.data;
          if (
            valor == 2 || valor == "2") {
            iziToast.warning({
              title: 'Usuario no encontrado',
              position: 'topRight',
            });
          } else {
            window.location.href = "../vista/poliza/index.php";
          }
        }
      });
    });
  });
</script>

</html>