<?php
    require 'config/config.php';
    require 'config/db.php';
    $dato = $_GET['dato1'];
    if(isset($_GET['dato1']) ){
        $valor = $_GET['dato1'];
        $valor = filter_var($valor, FILTER_SANITIZE_STRING); 
        $valor = '%'.$valor.'%';
    
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
        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
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


        <hr style="width: 75%; margin: 0 auto;">

        <!-- process dps -->

        <!-- Process -->
        <div class="container process-featured">
            <div class="process-filter">
                <?php
                    $sql = $pdo->prepare("SELECT procesos.*, ambitos.*, municipios.*, fases.* FROM procesos INNER JOIN fases ON (procesos.pid = fases.pid AND procesos.fase_actual = fases.n_fase ) INNER JOIN ambitos ON procesos.aid = ambitos.aid INNER JOIN municipios ON procesos.mid = municipios.mid WHERE LOWER(titulo_proceso) LIKE ? OR LOWER(subtitulo_proceso) LIKE ? OR LOWER(descripcion_proceso) LIKE ? OR LOWER(descripcion_c_proceso) LIKE ? OR LOWER(nombre_municipio) LIKE ? OR LOWER(nombre_ambito) LIKE ?");

                    // Agregar los parametros
                    
                    $sql->execute([$valor, $valor, $valor, $valor, $valor, $valor]);
                    // Fetch los resultados
                    $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
                    $count = $sql->rowCount();
                ?>
                <h4><strong><i class="fa fa-square" aria-hidden="true"></i> PROCESOS (<?php echo $count; ?>)</strong></h4>
                
            </div>

        


            <!-- START CARDS NUEVO -->
            <div class="container text-center" style="margin-top: 4rem; margin-bottom: 8rem;">
                <div class="filter row row-cols-1 row-cols-md-2 row-cols-lg-4 d-flex align-items-stretch g-3">
                    <!-- START INDIVIDUAL CARD -->
                    <?php
                        if($count > 0){
                            foreach($rows as $row){

                    ?>
                            <div class="col col-lg-3">
                                <div class="card h-100">
                                    <div class="card-header" style="background-color: #894B5D"></div>
                                    <img src="http://drive.google.com/uc?export=view&id=1Bw22s4t6l_H6e9r6f_A7y0jIuGYEeRy0" class="card-img-top" alt="...">
                                    <div class="card-body" style="padding: 0; background-color: #ead9d8">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex align-items-center" style="height: 100px; background-color: white;">
                                                <h5 class="process-title-card"><?php echo $row['titulo_proceso'];?></h5>
                                            </li>
                                            <li class="list-group-item" style="background-color: white; ">
                                                <p class="process-date-card"><strong>Ambito:</strong> <?php echo $row['nombre_ambito'];?> </p>
                                            </li>
                                            <li class="list-group-item " style="background-color: white;">
                                                <p class="process-date-card"><strong>Municipio:</strong> <?php echo $row['nombre_municipio'];?> </p>
                                            </li>
                                            <li class="list-group-item" style="background-color: white;">
                                                <div class="row d-flex align-items-center">
                                                    <div class="col">
                                                        <p class="process-date-card"><strong>Fecha de inicio</strong></p>
                                                    </div>
                                                    <div class="col">
                                                        <p class="process-date-card"><strong>Fecha de finalización</strong></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="process-date-card"><?php echo $row['fecha_inicio_proceso'];?></p>
                                                    </div>
                                                    <div class="col">
                                                        <p class="process-date-card"><?php echo $row['fecha_fin_proceso'];?></p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex flex-column" style="background-color: #ead9d8">
                                                <p class="process-status-card"><strong>Fase actual</strong></p>
                                                <button class="process-button"><?php echo $row['titulo_fase'];?></button>
                                                <a href="participa2.php?id=<?php echo $row['pid']; ?>&token=<?php echo hash_hmac('sha1', $row['pid'], KEY_TOKEN );?>" ><button class="process-button-card"><strong>Más información</strong></button></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php

                                    }
                                }else{
                                    ?>
                                        <div class="container" style="margin-top:5%">
                                            <h1 class="text-center">No se encontró ninguna búsqueda con esos valores 😰</h1>
                                        </div>
                                    <?php
                                }
                                $sql->closeCursor();
                            ?>

                    <!-- END INDIVIDUAL CARD--> 
                </div>
                
            </div>
            <!-- END CARDS -->                        
            
        </div>
        <!-- End First Content -->

        <!-- Participaciones  -->
        <div class="container process-featured">
            <div class="process-filter">
                <?php
                    $sql = $pdo->prepare("SELECT participaciones.*, usuarios.*, distritos.* FROM participaciones INNER JOIN usuarios ON participaciones.uid = usuarios.uid INNER JOIN distritos ON distritos.did = participaciones.did WHERE LOWER(titulo_registro) LIKE ? OR LOWER(propuesta) LIKE ? OR LOWER(nombre) LIKE ? OR participaciones.uid LIKE ?");

                    // Agregar los parametros
                    
                    $sql->execute([$valor, $valor, $valor, $valor]);
                    // Fetch los resultados
                    $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
                    $count = $sql->rowCount();
                ?>
                <h4><strong><i class="fa fa-square" aria-hidden="true"></i> PARTICIPACIONES (<?php echo $count; ?>)</strong></h4>
            </div>

        


            <!-- START CARDS NUEVO -->
            <div class="container text-center" style="margin-top: 4rem; margin-bottom: 8rem;">
                <div class="filter row row-cols-1 row-cols-md-2 row-cols-lg-4 d-flex align-items-stretch g-3">
                    <!-- START INDIVIDUAL CARD -->
                    <?php
                        
                        
                        if($count > 0){
                            
                            foreach($rows as $row){

                    ?>

                            <!-- START INDIVIDUAL CARD -->
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-header" style="background-color: #894B5D"></div>
                                    <img src="http://drive.google.com/uc?export=view&id=1Bw22s4t6l_H6e9r6f_A7y0jIuGYEeRy0" class="card-img-top" alt="...">
                                    <div class="card-body" style="padding: 0;">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex justify-content-center align-items-center" style="height: 100px">
                                                <h5 class="process-title-card"><?php echo $row['titulo_registro']; ?></h5>
                                            </li>
                                            <li class="list-group-item">
                                                <p class="process-content-card"><strong>Autor:</strong> <?php echo $row['nombre']; ?></p> 
                                            </li>
                                            <li class="list-group-item">
                                                <p class="process-content-card"><strong>Distrito:</strong> <?php echo $row['nombre_distrito']; ?></p>
                                            </li>
                                            <li class="list-group-item">
                                                <p class="process-content-card"><strong>Fecha de creación: </strong><?php echo $row['fecha_creacion']; ?></p>
                                            </li>
                                            <li class="list-group-item d-flex flex-column" style="background-color: #ead9d8">
                                                <a href="#"><button class="process-button-card"><strong>Más información</strong></button></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- END INDIVIDUAL CARD -->
                    <?php

                            }
                        }else{
                                ?>
                                    <div class="container" style="margin-top:5%">
                                        <h1 class="text-center">No se encontró ninguna búsqueda con esos valores 😰</h1>
                                    </div>
                                <?php
                            }
                        $sql->closeCursor();
                    ?>

                    <!-- END INDIVIDUAL CARD--> 
                </div>
                
            </div>
            <!-- END CARDS -->                        
            
        </div>
        <!-- End First Content -->

        <!-- Participaciones  -->
        <div class="container process-featured">
            <div class="process-filter">
                <?php
                    $sql = $pdo->prepare("SELECT usuarios.* FROM usuarios WHERE LOWER(nombre) LIKE ? ");

                    // Agregar los parametros
                    
                    $sql->execute([$valor]);
                    // Fetch los resultados
                    $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
                    $count = $sql->rowCount();
                ?>
                <h4><strong><i class="fa fa-square" aria-hidden="true"></i> USUARIOS (<?php echo $count; ?>)</strong></h4>
            </div>

        


            <!-- START CARDS NUEVO -->
            <div class="container" style="margin-top: 4rem; margin-bottom: 8rem;">
                <div class="filter row row-cols-1 row-cols-md-2 row-cols-lg-4 d-flex align-items-stretch g-3">
                    <!-- START INDIVIDUAL CARD -->
                    <?php
                        
                        
                        if($count > 0){
                            
                            foreach($rows as $row){

                    ?>

                            <!-- START INDIVIDUAL CARD -->
                            <div class="row me-2 border g-0">
                                <div class="col-3">
                                    <img src="img/avatar.png" style="width: 100px; border-radius: 3px 0 0px 3px;">
                                </div>
                                <div class="col">
                                    <span><?php echo $row['nombre']; ?></span>
                                    <p>Creado el: <?php echo $row['fecha_creacion']; ?></p>
                                    <a><button>Más información</button></a>
                                </div>
                            </div>
                            <!-- END INDIVIDUAL CARD -->
                    <?php

                            }
                        }else{
                                ?>
                                    <div class="container" style="margin-top:5%">
                                        <h1 class="text-center">No se encontró ninguna búsqueda con esos valores 😰</h1>
                                    </div>
                                <?php
                            }
                        $sql->closeCursor();
                    ?>

                    <!-- END INDIVIDUAL CARD--> 
                </div>
                
            </div>
            <!-- END CARDS -->                        
            
        </div>
        <!-- End First Content -->

        
        
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

<?php

    }else{
        echo "Error";
    }
?>