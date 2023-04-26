<?php 
include 'procedures/procedures.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participa</title>

    <!-- Stylesheet CSS -->
    <link rel="stylesheet" href="css/template.css">
    <!-- Timeline CSS -->
    <link rel="stylesheet" href="css/timeline2.css">
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
            <a class="nav-link"  href="index.php">Inicio</a>
          </li>
          <li class="nav-item mx-5">
            <a class="nav-link" style="color: black;" href="participa.php">Participa</a>
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
  <div class="nav2">
      <ul class="nav justify-content-center">
          <li class="nav-item">
              <form class="d-flex my-3">
                  <input class="form-control" type="search" placeholder="Buscar convocatorias, participantes, etc..." aria-label="Search">
                  <button class="btn buscar" type="submit">
                      <i class='fa-solid fa-magnifying-glass'></i>
                  </button>
              </form>
          </li>
      </ul>
  </div>
  <!-- End Navbar -->

  <!-- Start Featured Process -->
  <div class="container process-featured">
    <h4><strong><i class="fa fa-square" aria-hidden="true"></i> PROCESOS DESTACADOS</strong></h4>
  </div>
    <?php
         $procesosDestacados = "SELECT titulo_proceso, subtitulo_proceso, titulo_fase, descripcion_proceso, COUNT(participaciones.pid) as total FROM procesos, participaciones, fases WHERE procesos.pid = participaciones.pid and fases.pid = procesos.pid and fase_actual = n_fase GROUP BY procesos.pid ORDER BY total DESC";
        //$procesos = "SELECT * FROM procesos";
        
        $result = mysqli_query($connection, $procesosDestacados);
        $cont = 0;
        while($row = mysqli_fetch_assoc($result)){
          if($cont>1){
            break;
          }

    ?>
        <div class="container process-featured-container">
            <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2">
                <div class="col border">
                    <div class="my-5">
                        <h2 class="process-featured-title">
                            <?php
                                echo $row['titulo_proceso'];
                            ?>
                        </h2>
                        <h3 class="process-featured-title2">
                            <?php
                                echo $row['subtitulo_proceso'];
                            ?>
                        </h3>
                        <p class="process-featured-title2">Fase Actual:  </p> 
                        <center><button class="process-featured-button-3">
                            <?php
                                echo $row['titulo_fase'];
                            ?>
                        </button></center>
                            <?php
                                echo $row['descripcion_proceso'];
                            ?>
                        <center>
                            <button class="process-featured-button-1">Más información</button>
                            <button class="process-featured-button-2">PARTICIPAR</button>
                        </center>
                    </div>
                </div>
                <div class="col border d-flex justify-content-center align-items-center" style="padding-right: 0; padding-left: 0; padding-top: 0; padding-bottom: 0;">
                    <!-- Start Fetured process timeline-->
                    <div style="background-color: #F0F0F0; width: 100%; height: 100% ;padding: 2%;">
                        <div class="container" style="margin-top: 0.5%;">
                            <h2 style="text-align: center; font-weight: normal; font-size: 32px; font-weight: bold;">FASES </h2>
                        </div>  
                    
                    <!--<div class="timeline">
                        <div class="vertical-line3"></div>
                        <div class="vertical-line4"></div>
                        <div class="c-off-animate right-container">
                            <div class="circulo active"></div>
                            <div class="t c2">
                                <div class="innerc">
                                    <small>21 de marzo - 9 de abril</small>
                                    <h4>Registro de Participantes y Propuestas</h4>
                                </div>
                            </div>
                        </div>
                        
                        <div class="c-off-animate right-container">
                            <div class="circulo active"></div>
                            <div class="t c2">
                                <div class="innerActive">
                                    <small>10 a 23 de abril</small>
                                    <h4>Validación de Registro de Participantes Y Propuestas</h4>
                                </div>
                            </div>
                        </div>
                        
                        <div class="c-off-animate right-container">
                            <div class="circulo down"></div>
                                <div class="t c2">
                                    <div class="innerDown">
                                        <small>5 de junio - 19 de junio</small>
                                        <h4>Publicación de Resultados ✨🤩</h4>
                                    </div>
                                </div>
                            </div>
                        </div> -->  
                    </div>
                </div>
            
            </div>
        </div>
    <?php
            $cont++;
        }
    ?>
  

  <hr style="width: 75%; margin: 0 auto;">

  <!-- process dps -->

  <!-- Process -->
  <div class="container process-featured">
    <div class="process-filter">
        <h4><strong><i class="fa fa-square" aria-hidden="true"></i> PROCESOS (#)</strong></h4>
        <h4 class="see-process">VER</h4>
        <h4><a href="">ACTIVOS (#)</a></h4>
        <h4><a href="">PASADOS (#)</a></h4>
        <h4><a href="">TODOS (#)</a></h4>
    </div> 
  </div>

  <!-- Start First Content -->
  <div class="container process-content">
    <div class="row text-center">
        <div class="col">
            <p>ÁMBITOS <select  class="process-select" type="text">
            <option value="Selecciona un ámbito" selected disabled>Selecciona un ámbito</option>
            </select></p>
        </div>
        <div class="col">
            <p>ÁREAS <select style="margin-left: 19px;" class="process-select" type="text">
            <option value="Selecciona un ámbito" selected disabled>Selecciona un área</option></select></p>
        </div>
    </div>

        <div class="container text-center" style="margin-top: 1rem;">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
                <div class="col g-5">
                    <div class="row">
                        <span class="process-line"></span>
                    </div>
                    <div class="row">
                        <div class="col border" style="padding-bottom: 1rem; padding-right: 0; padding-left: 0;">
                            <!-- Imagen de 200 x 100 -->
                            <img class="w-100" src="http://drive.google.com/uc?export=view&id=1Bw22s4t6l_H6e9r6f_A7y0jIuGYEeRy0" alt="">
                            <h5 class="process-title-card"><span>Titulo</span><i class="fa fa-bell process-bell-active" aria-hidden="true"></i></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col border">
                            <p class="process-date-card"><strong>Fecha de creación:</strong> 8/11/2002</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col border">
                            <p class="process-date-card"><strong>Fecha de inicio</strong><br>8/11/2002</p>
                        </div>
                        <div class="col border">
                            <p class="process-date-card"><strong>Fecha de finalización</strong><br>8/11/2002</p>
                        </div>
                    </div>
                    <div class="row border">
                        <div class="col" style="background-color:#EAD9D8">
                            <p class="process-status-card"><strong>Fase actual</strong></p>
                            <center><button class="process-button">Introducción</button></center>
                            <a href="./participa2.php"><button class="process-button-card"><strong>Más información</strong></button></a>
                        </div>
                    </div>
                </div> 

                <div class="col g-5">
                    <div class="row">
                        <span class="process-line"></span>
                    </div>
                    <div class="row">
                        <div class="col border" style="padding-bottom: 1rem; padding-right: 0; padding-left: 0;">
                            <!-- Imagen de 200 x 100 -->
                            <img class="w-100" src="http://drive.google.com/uc?export=view&id=1Bw22s4t6l_H6e9r6f_A7y0jIuGYEeRy0" alt="Proceso">
                            <h5 class="process-title-card"><span>Titulo</span><i class="fa fa-bell-o process-bell-active" aria-hidden="true"></i></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col border">
                            <p class="process-date-card"><strong>Fecha de creación:</strong> 8/11/2002</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col border">
                            <p class="process-date-card"><strong>Fecha de inicio</strong><br>8/11/2002</p>
                        </div>
                        <div class="col border">
                            <p class="process-date-card"><strong>Fecha de finalización</strong><br>8/11/2002</p>
                        </div>
                    </div>
                    <div class="row border">
                        <div class="col" style="background-color: #EAD9D8">
                            <p class="process-status-card"><strong>Fase actual</strong></p>
                            <center><button class="process-button">Introducción</button></center>
                            <a href="./participa2.html"><button class="process-button-card"><strong>Más información</strong></button></a>
                        </div>
                    </div>
                </div>

                <div class="col g-5">
                    <div class="row">
                        <span class="process-line"></span>
                    </div>
                    <div class="row">
                        <div class="col border" style="padding-bottom: 1rem; padding-right: 0; padding-left: 0;">
                            <!-- Imagen de 200 x 100 -->
                            <img class="w-100" src="http://drive.google.com/uc?export=view&id=1Bw22s4t6l_H6e9r6f_A7y0jIuGYEeRy0" alt="Proceso">
                            <h5 class="process-title-card"><span>Titulo</span><i class="fa fa-bell-o process-bell" aria-hidden="true"></i></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col border">
                            <p class="process-status-card"><strong>Fecha de creación:</strong> 8/11/2002</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col border">
                            <p class="process-status-card"><strong>Fecha de inicio</strong><br>8/11/2002</p>
                        </div>
                        <div class="col border">
                            <p class="process-status-card"><strong>Fecha de finalización</strong><br>8/11/2002</p>
                        </div>
                    </div>
                    <div class="row border">
                        <div class="col" style="background-color: #EAD9D8">
                            <p class="process-status-card"><strong>Fase actual</strong></p>
                            <center><button class="process-button">Introducción</button></center>
                            <a href="./participa2.html"><button class="process-button-card"><strong>Más información</strong></button></a>
                        </div>
                    </div>
                </div>

                <div class="col g-5">
                    <div class="row">
                        <span class="process-line"></span>
                    </div>
                    <div class="row">
                        <div class="col border" style="padding-bottom: 1rem; padding-right: 0; padding-left: 0;">
                            <!-- Imagen de 200 x 100 -->
                            <img class="w-100" src="http://drive.google.com/uc?export=view&id=1Bw22s4t6l_H6e9r6f_A7y0jIuGYEeRy0" alt="Proceso">
                            <h5 class="process-title-card"><span>Titulo</span><i class="fa fa-bell-o process-bell" aria-hidden="true"></i></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col border">
                            <p class="process-status-card"><strong>Fecha de creación:</strong> 8/11/2002</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col border">
                            <p class="process-status-card"><strong>Fecha de inicio</strong><br>8/11/2002</p>
                        </div>
                        <div class="col border">
                            <p class="process-status-card"><strong>Fecha de finalización</strong><br>8/11/2002</p>
                        </div>
                    </div>
                    <div class="row border">
                        <div class="col" style="background-color: #EAD9D8">
                            <p class="process-status-card"><strong>Fase actual</strong></p>
                            <center><button class="process-button">Introducción</button></center>
                            <a href="./participa2.html"><button class="process-button-card"><strong>Más información</strong></button></a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
  </div>
  <!-- End First Content -->

  <hr style="width: 75%; margin: 0 auto;">

  <!-- Past Process -->
  
  <!-- End Second Content -->
    
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
</body>
</html>