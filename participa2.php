<?php
    require 'config/db.php';
    require 'config/config.php';
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $token = isset($_GET['token']) ? $_GET['token'] : '';

    if($id == '' && $token == ''){
        header("Location: components/404.php");
        exit();
    }else{
        $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);
        if($token == $token_tmp){
            //Calcular el numero de participantes
            $sql = $pdo->prepare("SELECT COUNT(procesos.pid) FROM procesos, participaciones WHERE procesos.pid = ?  AND procesos.pid = participaciones.pid ");
            $sql->execute([$id]);
            $row = $sql->fetch();
            $participantes = $row['COUNT(procesos.pid)'];
            $sql->closeCursor();
            //Calcular el numero de seguidores
            $sql = $pdo->prepare("SELECT COUNT(procesos.pid) FROM procesos, favoritos WHERE procesos.pid = ?  AND procesos.pid = favoritos.pid ");
            $sql->execute([$id]);
            $row = $sql->fetch();
            $favoritos = $row['COUNT(procesos.pid)'];
            $sql->closeCursor();


            //Desplegar informacion del proceso
            $sql = $pdo->prepare("SELECT * FROM procesos, ambitos, municipios WHERE procesos.pid = '$id' and procesos.aid = ambitos.aid and procesos.mid = municipios.mid");
            $sql->execute();
            $rows = $sql->fetch();
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
                    <a class="nav-link a-active" href="participa.php">Participa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ayuda.php">Ayuda</a>
                </li>
                <li class=" mx-5 nav-item">
                    <a class="nav-link" href="calendario.php">Calendario</a>
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

    <div>
        <img src="img/banner.jpg" class="img-fluid w-100">
    </div>

    <div style="border-bottom: 1px solid rgba(0, 0, 0, 0.25);">
        <div class="container">
            <div class="nav3">
                <h5><a class="a-active id-proceso" href="#" data-value="<?php echo $id; ?>">EL PROCESO</a></h5>
                <h5><a href="fases.php?id=<?php echo $id; ?>&token=<?php echo hash_hmac('sha1', $id, KEY_TOKEN );?>">FASES</a></h5>
                <h5><a href="fichasActivas.php?id=<?php echo $id; ?>&token=<?php echo hash_hmac('sha1', $id, KEY_TOKEN );?>">FICHAS ACTIVAS</a></h5>
            </div> 
        </div>
    </div>

    <div class="container" style="margin-top: 5rem;">
        <h2 style="text-align: center; font-weight: normal; font-size: 32px; font-weight: bold;">
            <?php
                echo $rows['titulo_proceso'];
            ?>
        </h2>
        <p style="text-align: center; margin-top: 2.5%;">
            <?php
                echo $rows['subtitulo_proceso'];
            ?>
        </p>
    </div>

    <div class="container" style="margin-top: 5%; margin-bottom: 10rem;">
        <div class="row no-gutters">
            <div class="col-12 col-sm-12 col-md-8 col-12" style="padding: 0 25px 0 0;">
                <?php
                    echo $rows['descripcion_c_proceso'];
                ?>
            </div>
            <div class="col-6 col-md-4 col-sm-12 col-12">
                <div class="d-flex flex-column">
                    <span class="mb-4" style="border-left: 3px solid #894B5D"><p class="ms-3" style="font-size: 20px !important; margin: 5px 0;"> Participantes <span class style="font-size: 26px !important; margin: 5px 0 0 20px;"><b><?php echo $participantes; ?></b></span></p></span>
                    <span class="mb-4" style="border-left: 3px solid #894B5D"><p class="ms-3" style="font-size: 20px !important; margin: 5px 0;"> Siguiendo <span style="font-size: 26px !important; margin: 5px 0 0 50px;"><b><?php echo $favoritos; ?></b></span></p></span>
                </div>

                <?php 
                    if(isset($_SESSION['id'])){
            
                        $sql = $pdo->prepare("SELECT COUNT(pid) FROM favoritos WHERE uid = ? AND pid = ? ");
                        $sql->execute([$_SESSION['id'], $id]);
                        $row = $sql->fetch();

                        if($row['COUNT(pid)'] > 0){

                ?>
                            
                            <button type="button" id="seguir" class="follow-button process-featured-button-2" style="margin-left:10%; margin-bottom: 5%; width: 75%;"><span style="position: relative; top: 5px;" class="material-symbols-outlined"> notifications </span> <span id="following-text">Siguiendo</span> </button>
                            

                <?php
                        }else{
                ?>
                            
                            <button type="button" id="seguir" class="follow-button process-featured-button-1" style="margin-left:10%; margin-bottom: 5%; width: 75%;"><span style="position: relative; top: 5px;" class="material-symbols-outlined"> notifications </span> <span id="following-text">Seguir</span> </button>
                            
                <?php
                        }
                    }else{

                ?>
                         <button type="button" id="seguir" class="follow-button process-featured-button-1" style="margin-left:10%; margin-bottom: 5%; width: 75%;"><span style="position: relative; top: 5px;" class="material-symbols-outlined"> notifications </span> <span id="following-text">Seguir</span> </button>
                        
                        
                <?php

                    }
                ?>
                <ul class="list-group" style="text-align: center;">
                    <li class="list-group-item"><p><b>ÁMBITO</b></p><p>
                        <?php
                            echo $rows['nombre_ambito'];
                        ?>
                    </p></li>
                    <li class="list-group-item"><p><b>MUNICIPIO</b></p><p>
                        <?php
                            echo $rows['nombre_municipio'];
                        ?>
                    </p></li>
                    <li class="list-group-item"><p><b>FECHA DE INICIO</b></p><p>
                        <?php
                            echo $rows['fecha_inicio_proceso'];
                        ?>
                    </p></li>
                    <li class="list-group-item"><p><b>FECHA DE FINALIZACIÓN</b></p><p>
                        <?php
                            echo $rows['fecha_fin_proceso'];
                        ?>
                    </p></li>
                </ul>
            </div>
        </div>
    </div> 

    <!-- Start Footer -->
    <?php require 'components/footer.php'; ?>
    <!-- End Footer -->

    <!-- MODALES -->

            <!-- MODAL INICIA -->
            <div class="modal fade" id="inicia" tabindex="-1" role="dialog" aria-labelledby="iniciaLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exitolLabel">Inicia Sesión</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Para poder seguir un Proceso debes iniciar sesion
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIN MODAL INICIA-->

	    <!-- FIN MODALES -->
    <script>
        $(document).ready(function(){
                $(".follow-button").click(function (){
                    let id = $('.id-proceso').data("value");
                    if ($('#seguir').hasClass('process-featured-button-1')) {
                        
                        $.ajax({
                            url: "fetch/follow_proceso.php",
                            type: "POST",
                            data: {
                                id:id
                                
                            },
                            success: function(response) {
                                // Verificar si la condición se cumple
                                if (!response.condicion) {
                                // Mostrar el modal aquí
                                    $("#inicia").modal("show");
                                }else{
                                    $(this).removeClass("process-featured-button-1").addClass("process-featured-button-2").css({'transition': '150ms ease-in-out'});
                                    $('#following-text').text('Siguiendo');
                                    location.reload();
                                }
                            }

                        });

                    } else {
                        
                        $.ajax({
                            url: "fetch/unfollow_proceso.php",
                            type: "POST",
                            data: {
                                id:id
                                
                            },
                            success: function() {
  
                                $(this).removeClass("process-featured-button-2").addClass("process-featured-button-1").css({'transition': '150ms ease-in-out'});
                                $('#following-text').text('Seguir');
                                location.reload();
        
                            }
                        });
                    }
                });
            });
    </script>
</body>
</html>

<?php
            
            $sql->closeCursor();
          
        }else{
            header("Location: /components/404.php");
            exit();
        }
    }
?>