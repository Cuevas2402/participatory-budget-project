<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayuda</title>

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
    <!-- Leaflet-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
</head>
<body style="font-family: Roboto;">
  <!-- Start Navbar -->
  <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="img/logo.png" style="width: 200px;" alt="LOGO"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mx-auto" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mx-auto mb-2 mb-lg-0 text-center">
            <li class="nav-item">
              <a class="nav-link" style="color: black;" href="index.php">Inicio</a>
            </li>
            <li class="nav-item mx-5">
              <a class="nav-link" href="participa.php">Participa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ayuda.php">Ayuda</a>
            </li>
          </ul>
          <div class="text-center">
              <a href="registrarse.php"><button class="btn me-3 my-3 registra">Regístrate</button></a>
              <a href="sesion.php"><button class="btn ms-3 my-3 inicia">Inicia Sesión</button></a>
          </div>
        </div>
      </div>
    </nav>
    <!-- Start search bar-->

    <?php require 'components/search_bar.php'; ?>
    
    <!-- End search bar-->
    <!-- End Navbar -->
    
        <div class="container d-flex justify-content-center text-center" style="margin-top: 5%;">
            <h2 style="font-weight: 600;">INICIAR SESIÓN </h2>
        </div>
        <div class="container mt-4">
            <center><p style="font-weight: 300;">¿Ya tienes una cuenta? <a href="">Iniciar Sesión</a></p></center>
            <center><p style="font-weight: 300;">¿Olvidaste tu contraseña? <a href="">Recuperar Contraseña</a></p></center>
        </div>
        <div class="container mt-5">
            <div class="container form-div d-flex justify-content-center" style="margin-top: 3%; width: 70%;">
                <form class="needs-validation" style="width: 75%;" id="form" novalidate>
                    <div class="form-group f-register"  >
                        <div>
                          <label class="label-register">Correo Electrónico *</label>
                          <input type="nombre" class="form-control w-100" id="nombre" placeholder="jose.gallegos@udem.edu" required>
                          <div class="valid-feedback">
                            Todo bien
                          </div>
                          <div class="invalid-feedback">
                            Campo Obligatorio
                          </div>
                        </div>
      
                        <div>
                          <label class="label-register">Contraseña *</label>
                          <input type="password" class="form-control w-100" id="email" placeholder="Contraseña" required>
                          <div class="valid-feedback">
                            Todo bien
                          </div>
                          <div class="invalid-feedback">
                            Campo Obligatorio
                          </div>
                        </div>
                        <p class="mt-2"><input type="checkbox"> Recuérdame </p>
                        <center><button class="process-featured-button-2-large mt-4">INICIAR SESIÓN</button></center>
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
  <script src="js/script.js"></script>
  </body>
  </html>
  