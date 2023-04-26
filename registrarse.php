<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

    <!-- Stylesheet CSS -->
    <link rel="stylesheet" href="css/template.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- Letra -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,regular,italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" />
    <!-- Icono -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Icono Redes Sociales -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>

<body style="font-family: Roboto;">
    <!-- Start Navbar -->
      <?php require 'header/header.php' ?>
    <!-- End Navbar -->
    
    <div class="container d-flex justify-content-center text-center" style="margin-top: 5%;">
        <h2 style="font-weight: 600;">REGISTRATE </h2>
    </div>
    <div class="container mt-4">
      <center><p style="font-weight: 300;">¿Ya tienes una cuenta? <a href="">Iniciar Sesión</a></p></center>
      <center><p style="font-weight: 300;">¿Olvidaste tu contraseña? <a href="">Recuperar Contraseña</a></p></center>
      <center><p style="font-weight: 300;">¿No has recibido las instrucciones de confirmación? <a href="">Recibir Instrucciones</a></p></center>
    </div>
    <div class="container mt-5">
      <div class="container form-div d-flex justify-content-center" style="margin-top: 3%; width: 70%;">
          <form class="needs-validation" style="width: 75%;" id="form" novalidate>
              <div class="form-group f-register"  >
                  <i><p style="font-weight: 500; color: #894B5D;"> * Los campos requeridos están marcados con un asterisco</p></i>

                  <div>
                    <label class="label-register">Tu nombre *</label>
                    <small><i><small><p>Nombre público que aparecera en la pagina</p></small></i></small>
                    <input type="nombre" class="form-control w-100" id="nombre" placeholder="joseman" required>
                    <div class="valid-feedback">
                      Todo bien
                    </div>
                    <div class="invalid-feedback">
                      Campo Obligatorio
                    </div>
                  </div>

                  <div>
                    <label class="label-register">Tu correo electrónico*</label>
                    <input type="email" class="form-control w-100" id="email" placeholder="jose.gallegos@udem.edu" required>
                    <div class="valid-feedback">
                      Todo bien
                    </div>
                    <div class="invalid-feedback">
                      Campo Obligatorio
                    </div>
                  </div>

                  <div>
                    <label class="label-register">Número de Teléfono *</label>
                    <input type="phone" class="form-control w-100" id="telefono" placeholder="11111111111" required>
                    <div class="valid-feedback">
                      Todo bien
                    </div>
                    <div class="invalid-feedback">
                      Campo Obligatorio
                    </div>
                  </div>

                  <div>
                    <label class="label-register">Contraseña *</label>
                    <small><i><small><p>  Minimo 10 caracteres</p></small></i></small>
                    <input type="password" class="form-control w-100" id="contraseña" placeholder="contraseña" required>
                    <div class="valid-feedback">
                      Todo bien
                    </div>
                    <div class="invalid-feedback">
                      Campo Obligatorio
                    </div>
                  </div>
                  
                  <p class="mt-2"><input type="checkbox"> Aceptar los Términos de Uso</p>
                  <small><i><small><p> Al registrarte aceptas los Términos y Condiciones de Uso. <a href="/"> Puedes revisar el aviso de privacidad integral aqui. </a></p></small></i></small>

                  <p class="mt-2"><input type="checkbox"> Aceptar Permiso de Contacto</p>
                  <small><i><small><p> Al marcar esta opción aceptas que recibiras un boletín ocasional con información relevante.</p></small></i></small>

                  <center><button class="process-featured-button-2-large mt-5"> REGISTRARTE</button></center>
              </div>
          </form>
      </div>
  </div>

  <!-- Start Footer -->
  <footer style="margin-bottom: -5rem;">
    <div class="footer-content" >
        <ul class="socials">
            <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
        </ul>
        <p><a href="http://" target="_blank">Términos y condiciones</a></p>
        <p><a href="http://" target="_blank">Descargar ficheros de datos abiertos</a></p>
    </div>
    <div class="footer-bottom">
        <p>Este programa es público, ajeno a cualquier partido político. Queda prohibido el uso para fines distintos a los establecidos en el Programa.</p>
    </div>
  </footer>
  <!-- End Footer -->

  <!--<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
  })()
  /*let nombre = document.getElementById("nombre");

  nombre.addEventListener("blur", function() {
    if (email.value == "") {
      alert("Campo Obligatorio");
    }
  }, true);

  let email = document.getElementById("email");

  email.addEventListener("blur", function() {
    if (email.value == "") {
      alert("Campo Obligatorio");
    }
  }, true);

  let contraseña = document.getElementById("contraseña");

  contraseña.addEventListener("blur", function() {
    if (email.value == "" || email.value.length < 10) {
      alert("Campo Obligatorio");
    }
  }, true);*/
    /*let email = document.getElementById('email');
    form.addEventListener("blur", function(event){
      if(email.value.length == 0){
        email.style.backgroundColor = "lightblue";
      }
    }, true);*/
  </script>-->
  <script src="js/script.js"></script>
</body>
</html>