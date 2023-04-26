<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fichas Activas</title>

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
    <!-- Icono -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Icono Redes Sociales -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
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

    <div class="card-section">
        <h1 class="section-title">Consulta Extraordinaria para la selección de jueces y juezas auxiliares</h1>
    </div>
    <div style="border-bottom: 1px solid rgba(0, 0, 0, 0.25);">
        <div class="container">
            <div class="nav3">
                <h5><a href="participa2.php">EL PROCESO</a></h5>
                <h5><a href="registro.php">REGISTRO</a></h5>
                <h5><a class="a-active" href="#">FICHAS ACTIVAS</a></h5>
            </div> 
        </div>
    </div>

    <div class="container process-featured d-flex">
        <div class="px-2">
            <h4><strong><i class="fa fa-square" aria-hidden="true"></i> PROPUESTAS (#)</strong></h4>
        </div>
        <div class="px-2">
            <button id="button-popup" class="button-popup">Nueva Propuesta <i class="fa fa-plus" aria-hidden="true"></i></button>
        </div>
    </div>

    <div id="popup" class="popup">
        <div class="d-flex justify-content-between">
            <div>
                <h3>Por favor, inicia sesión</h3>
            </div>
            <div>
                <button id="cerrarPopup"><i class="fa fa-x" aria-hidden="true"></i></button>
            </div>
        </div>
        <hr>
        <div class="d-flex justify-content-center">
            <form class="needs-validation" style="width: 75%;" id="form" novalidate>
                <div class="form-group f-register">
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
                    <center><button class="process-featured-button-2-large mt-4">INICIAR SESIÓN</button></center>
                </div>
                <p style="font-weight: 300;">¿Olvidaste tu contraseña? <a href="">Recuperar Contraseña</a></p>
            </form>
        </div>
    </div>

    <div class="container" style="margin-top: 2%; margin-bottom: 10rem;">
        <div class="row no-gutters">
            <div class="col-6 col-md-4 col-sm-12 col-12">
                <ul class="list-group">
                    <li class="list-group-item" style="background-color: #EAD9D8;">
                        <p class="m-2">EI siguiente formulario filtra los
                            resultados de búsqueda dinámicamente cuando se cambian las
                            condiciones de búsqueda.
                        </p>
                    </li>
                    <li class="list-group-item" style="background-color: #EAD9D8;">
                        <form class="d-flex my-3 m-2">
                            <input class="form-control" type="search" placeholder="Buscar" aria-label="Search">
                            <button class="btn buscar" type="submit">
                                <i class='fa-solid fa-magnifying-glass'></i>
                            </button>
                        </form>
                    </li>
                    <li class="list-group-item" style="background-color: #EAD9D8;">
                        <div class="m-2">
                            <p><b>Ámbito</b></p>
                            <p><input type="checkbox" id="checkAll"> Todas</p>
                            <p><input type="checkbox" class="check"> Distrito Centro</p>
                            <p><input type="checkbox" class="check"> Distrito Huajuco</p>
                            <p><input type="checkbox" class="check"> Distrito Norte</p>
                            <p><input type="checkbox" class="check"> Distrito Poniente</p>
                            <p><input type="checkbox" class="check"> Distrito Sur</p>
                        </div>
                    </li>
                    <li class="list-group-item" style="background-color: #EAD9D8;">
                        <div class="m-2">
                            <p><b>Categoría</b></p>
                            <p><input type="checkbox" id="checkAll2"> Todas</p>
                            <p>
                                <div class="row">
                                    <div class="col">
                                        <input type="checkbox" id="checkAll900" class="check900">
                                        900 - 999
                                    </div>
                                    <div class="col">
                                        <button onclick="toggleMore()" id="myBtn"><span style="font-size: 24px;" class="material-symbols-outlined">
                                            expand_more</span></button>
                                    </div>
                                    <div class="moreOptions" id="moreOptions">
                                        <p><input type="checkbox" class="check900"> 900</p>
                                        <p><input type="checkbox" class="check900"> 901</p>
                                        <p><input type="checkbox" class="check900"> 902</p>
                                        <p><input type="checkbox" class="check900"> 903</p>
                                        <p><input type="checkbox" class="check900"> 904</p>
                                        <p><input type="checkbox" class="check900"> 905</p>
                                    </div>
                                </div>
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-sm-12 col-md-8">
                <div class="container">
                        <div class="row ">
                            <div class="col gx-5">
                                <p>Ordernar propuestas por: <select  class="process-select-2" type="text">
                                    <option>Aleatorio</option>
                                    <option>Reciente</option>
                                    <option>Con más adhesiones</option>
                                    <option>Más comentadas</option>
                                    <option>Con más seguidoras</option>
                                    <option>Con más autoras</option>
                                </select></p>
                            </div>
                            <div class="col">
                                <p>Resultados por página: 
                                <select class="process-select-3" type="text">
                                    <option>20</option>
                                    <option>50</option>
                                    <option>100</option>
                                </select>
                            </p>
                            </div>
                        </div>
                        <div class="container text-center">
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2">
                                <div class="col gx-5">
                                    <div class="row">
                                        <span class="process-line"></span>
                                    </div>
                                    <div class="row">
                                        <div class="col border" style="padding-bottom: 1rem; padding-right: 0; padding-left: 0;">
                                            <!-- Imagen de 400 x 200 -->
                                            <img class="w-100" src="http://drive.google.com/uc?export=view&id=1Bw22s4t6l_H6e9r6f_A7y0jIuGYEeRy0" alt="">
                                            <h5 class="process-title-card"><span>Titulo</span><i class="fa fa-bell process-bell-active" aria-hidden="true"></i></h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col border">
                                            <p class="process-date-card"><strong>Fecha de creación:</strong> DD/MM/AAAA</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col border">
                                            <p class="process-date-card"><strong>Fecha de inicio</strong><br>DD/MM/AAAA</p>
                                        </div>
                                        <div class="col border">
                                            <p class="process-date-card"><strong>Fecha de finalización</strong><br>DD/MM/AAAA</p>
                                        </div>
                                    </div>
                                    <div class="row border">
                                        <div class="col" style="background-color:#EAD9D8">
                                            <p class="process-status-card"><strong>Fase actual</strong></p>
                                            <center><button class="process-button">Introducción</button></center>
                                            <a href="./participa2.html"><button class="process-button-card"><strong>Más información</strong></button></a>
                                        </div>
                                    </div>
                                </div> 
                
                                <div class="col gx-5">
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
                                            <p class="process-date-card"><strong>Fecha de creación:</strong> DD/MM/AAAA</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col border">
                                            <p class="process-date-card"><strong>Fecha de inicio</strong><br>DD/MM/AAAA</p>
                                        </div>
                                        <div class="col border">
                                            <p class="process-date-card"><strong>Fecha de finalización</strong><br>DD/MM/AAAA</p>
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
                
                                <div class="col gx-5 gy-5">
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
                                            <p class="process-status-card"><strong>Fecha de creación:</strong> DD/MM/AAAA</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col border">
                                            <p class="process-status-card"><strong>Fecha de inicio</strong><br>DD/MM/AAAA</p>
                                        </div>
                                        <div class="col border">
                                            <p class="process-status-card"><strong>Fecha de finalización</strong><br>DD/MM/AAAA</p>
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
                
                                <div class="col gx-5 gy-5">
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
                                            <p class="process-status-card"><strong>Fecha de creación:</strong> DD/MM/AAAA</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col border">
                                            <p class="process-status-card"><strong>Fecha de inicio</strong><br>DD/MM/AAAA</p>
                                        </div>
                                        <div class="col border">
                                            <p class="process-status-card"><strong>Fecha de finalización</strong><br>DD/MM/AAAA</p>
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
            </div>
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

    <!-- JS Script -->
    <script>
        // Selecciona el checkbox con la etiqueta "Todas"
        const checkAll = document.getElementById('checkAll');

        // Selecciona todos los demás checkboxes
        const checkboxes = document.querySelectorAll('.check');

        // Agrega un event listener al checkbox "Todas"
        checkAll.addEventListener('change', function() {
        // Si "Todas" está marcado, marca todos los demás checkboxes
        if (this.checked) {
            checkboxes.forEach((checkbox) => {
            checkbox.checked = true;
            });
        } else {
            // Si "Todas" no está marcado, desmarca todos los demás checkboxes
            checkboxes.forEach((checkbox) => {
            checkbox.checked = false;
            });
        }
        });

        // Selecciona el checkbox con la etiqueta "Todas"
        const checkAll2 = document.getElementById('checkAll2');

        // Selecciona todos los demás checkboxes
        const checkboxes2 = document.querySelectorAll('.check900');

        // Agrega un event listener al checkbox "Todas"
        checkAll2.addEventListener('change', function() {
        // Si "Todas" está marcado, marca todos los demás checkboxes
        if (this.checked) {
            checkboxes2.forEach((checkbox) => {
            checkbox.checked = true;
            });
        } else {
            // Si "Todas" no está marcado, desmarca todos los demás checkboxes
            checkboxes2.forEach((checkbox) => {
            checkbox.checked = false;
            });
        }
        });

        // Selecciona el checkbox con la etiqueta "Todas"
        const checkAll900 = document.getElementById('checkAll900');

        // Selecciona todos los demás checkboxes
        const checkboxes900 = document.querySelectorAll('.check900');

        // Agrega un event listener al checkbox "Todas"
        checkAll900.addEventListener('change', function() {
        // Si "Todas" está marcado, marca todos los demás checkboxes
        if (this.checked) {
            checkboxes2.forEach((checkbox) => {
            checkbox.checked = true;
            });
        } else {
            // Si "Todas" no está marcado, desmarca todos los demás checkboxes
            checkboxes2.forEach((checkbox) => {
            checkbox.checked = false;
            });
        }
        });
        
        function toggleMore() {
            var moreOptions = document.getElementById("moreOptions");
            if (moreOptions.style.display === "block") {
                moreOptions.style.display = "none";
            } else {
                moreOptions.style.display = "block";
            }
        }

        var boton = document.getElementById("button-popup");
        var popup = document.getElementById("popup");
        var cerrarPopup = document.getElementById("cerrarPopup");

        boton.onclick = function() {
            popup.style.display = "block";
        }

        cerrarPopup.onclick = function() {
            popup.style.display = "none";
        }
    </script>
</body>
</html>