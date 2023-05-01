<?php
    require 'config/db.php';
    require 'config/config.php';

    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $token = isset($_GET['token']) ? $_GET['token'] : '';

    if($id == '' && $token == ''){
        header("Location: components/404.php");
        exit();
    }else{
        $token_tmp = hash_hmac('sha1', $id, KEY_PERFIL);
        if($token == $token_tmp){
            
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mi perfil público</title>

        <!-- Template CSS -->
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
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link" href="participa.php">Participa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ayuda.php">Ayuda</a>
                    </li>
                    </ul>
                    <!-- (Iniciar Sesión / Registrarse) o Sesion Inicada -->
                    <?php require 'components/login.php' ?>
                </div>
            </div>
        </nav>
        <!-- Start search bar-->

        <?php require 'components/search_bar.php'; ?>
        
        <!-- End search bar-->
        
        <!-- End Navbar -->
            
        <div class="container" style="margin-top: 5rem; margin-bottom: 5rem;">
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col col-md-3"></div>
                <div class="col col-md-9  d-flex justify-content-around px-5">
                    <a class="procesos-f process-filter-a-active" data-value="1"><h5>Actividad</h5></a>
                    <a class="procesos-f process-filter-a-down" data-value="2"><h5>Procesos</h5></a>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col col-md-3 text-center px-sm-0 px-md-3 px-lg-5">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <img class="img-fluid" src="img/avatar.png" alt="">
                            <h5 class="my-3"><?php echo $_SESSION['nombre']; ?></h5>
                            <div class="row">
                                <div class="col border-top">
                                    <a class="procesos-f process-filter-a-down" data-value="3"><p>Seguidores</p></a>
                                    <p>
                                        <?php
                                            $sql = $pdo->prepare("SELECT COUNT(followed) FROM seguir WHERE followed = ?");
                                            $sql->execute([$_SESSION['id']]);
                                            $row = $sql->fetch();
                                            echo $row['COUNT(followed)'];
                                            $sql->closeCursor();
                                        ?>
                                    </p>
                                </div>
                                <div class="col border-top">
                                    <a class="procesos-f process-filter-a-down" data-value="4" ><p>Siguiendo</p></a>
                                    <p>
                                    <?php
                                            $sql = $pdo->prepare("SELECT COUNT(follow) FROM seguir WHERE follow = ?");
                                            $sql->execute([$_SESSION['id']]);
                                            $row = $sql->fetch();
                                            echo $row['COUNT(follow)'];
                                            $sql->closeCursor();
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col col-md-9">
                    <div class="container text-center" style="margin-top: 1rem;">
                        <!-- ACOMODO -->
                        <div class="filter row row-cols-1 row-cols-md-2 row-cols-lg-2 d-flex align-items-stretch g-3">
                            <!-- INSERTAR -->
                            <?php
                                $sql = $pdo->prepare("SELECT * FROM participaciones, usuarios, distritos WHERE usuarios.uid = ? AND  usuarios.uid = participaciones.uid and distritos.did = participaciones.did");
                                $sql->execute([$id]);
                                $rows = $sql->fetchAll();
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
                                $sql->closeCursor();
                            ?>
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

        <script type="text/javascript">
            $(document).ready(function(){
                $(".procesos-f").click(function() {
                    let dato = $(this).data("value");
                    console.log(dato);
                    $(".process-filter-a-active").addClass("process-filter-a-down").removeClass("process-filter-a-active");
                    $(this).addClass("process-filter-a-active").removeClass("process-filter-a-down");
                    $.ajax({
                        url: "fetch/show_profile.php",
                        type: "POST",
                        data: {
                            dato: dato
                        }, 
                        beforeSend:() =>{
                            $('.filter').html("<span>Working ... </span>");
                        },
                        success:function(data){
                            $('.filter').html(data);
                        }

                    });
                });
            });
        </script>
    </body>
</html>

<?php
        }else{
            header("Location: components/404.php");
            exit();
        }
    }
        //$stmt->closeCursor();

?>