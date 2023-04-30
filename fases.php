<?php
    require 'config/db.php';
    require 'config/config.php';
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $token = isset($_GET['token']) ? $_GET['token'] : '';

    if($id == '' && $token == ''){
        echo "Error no se puedo encontrar nada";
        exit;
    }else{
        $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);
        if($token == $token_tmp){
            $sql = $pdo->prepare("SELECT * FROM procesos, fases WHERE  procesos.pid = '$id' AND procesos.pid = fases.pid;");
            $sql->execute();
            $rows = $sql->fetchAll();
            
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proceso</title>

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
                    <a class="nav-link"   href="index.php">Inicio</a>
                </li>
                <li class="nav-item mx-5">
                    <a class="nav-link"  style="color: black;" href="participa.php">Participa</a>
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
    
    <!-- Start process card -->
    <div>
        <img src="img/h321px.jpg" class="img-fluid d-none d-md-block w-100">
        <img src="img/h641px.jpg" class="img-fluid d-none d-sm-block d-md-none w-100">
        <img src="img/h1920px.jpg" class="img-fluid d-block d-sm-none d-md-none w-100">
    </div>
    <!-- End process card  -->

    <!-- Start process sections-->
    <div style="border-bottom: 1px solid rgba(0, 0, 0, 0.25);">
        <div class="container">
            <div class="nav3">
                <h5><a href="participa2.php?id=<?php echo $id; ?>&token=<?php echo hash_hmac('sha1', $id, KEY_TOKEN );?>">EL PROCESO</a></h5>
                <h5><a class="a-active"  href="fases.php?id=<?php echo $id; ?>&token=<?php echo hash_hmac('sha1', $id, KEY_TOKEN );?>">FASES </a></h5>
                <h5><a href="fichasActivas.php?id=<?php echo $id; ?>&token=<?php echo hash_hmac('sha1', $id, KEY_TOKEN );?>">FICHAS ACTIVAS</a></h5>
            </div> 
        </div>
    </div>
    <!-- End process sections-->

    <div class="container" style="margin-top: 0.5%; margin-bottom: 2.5%">
        <h2 style="text-align: center; font-weight: normal; font-size: 32px; font-weight: bold; margin-top: 3rem;">FASES</h2>
    </div>  
    
    <!-- Start Timeline -->
    <div class="timeline">
        <?php
            foreach($rows as $row){
        ?>
        <div class="c-off-animate right-container">
            <!-- circulo active = para circulo activo --> 
            <!-- circulo down = para circulo inactivo --> 
            <?php
                if($row['estado'] == 1  || $row['estado'] == 2){
                    ?>
                        <div class="circulo active"></div>
                    <?php

                }else{
                    if($row['estado'] == 3 ){
                    ?>
                        <div class="circulo down"></div>
                    <?php
                    }
                        
                }
            ?>
            <div class="t c2">
                <?php
                    
                ?>
                <!-- inncerc = color pasado -->
                <!-- innerActive = color presente -->
                <!-- innerDown = color futuro -->
                <?php
                    if($row['estado'] == 1 ){
                        ?>
                            <div class="innerc"> 
                                <small><?php echo $row['fecha_inicio_fases']; ?> - <?php echo $row['fecha_fin_fases']; ?></small>
                                <h4><?php echo $row['titulo_fase']; ?></h4>
                            </div>
                        <?php
                    }else{
                        if($row['estado'] == 2 ){
                        ?>
                            <div class="innerActive"> 
                                <small><?php echo $row['fecha_inicio_fases']; ?> - <?php echo $row['fecha_fin_fases']; ?></small>
                                <h4><?php echo $row['titulo_fase']; ?></h4>
                            </div>
                        <?php
                        }else{
                            if($row['estado'] == 3 ){
                            ?>
                                <div class="innerDown"> 
                                    <small><?php echo $row['fecha_inicio_fases']; ?> - <?php echo $row['fecha_fin_fases']; ?></small>
                                    <h4><?php echo $row['titulo_fase']; ?></h4>
                                </div>
                            <?php
                            }
                        }   
                    }
                ?>

                <div class="paddingc">
                    <?php echo $row['descripcion_fase']?>
                </div>
                
            </div>
        </div>
        <?php
            }
        ?>
    </div>
    <!-- End Timeline -->
    
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
            $sql->closeCursor();
        }else{
            echo 'Error al procesar peticion';
            exit;
        }
    }
        //$stmt->closeCursor();
?>