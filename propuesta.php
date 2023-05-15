<?php
    require 'config/db.php';
    require 'config/config.php';
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $token = isset($_GET['token']) ? $_GET['token'] : '';

    if($id == '' && $token == ''){
        header("Location: components/404.php");
        exit();
    }else{
        $token_tmp = hash_hmac('sha1', $id, KEY_PRO);
        if($token == $token_tmp){
            $uid = explode('|', $id)[0];
            $pid = explode('|', $id)[1];
?>

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
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
</head>
<body style="font-family: Roboto;">
    <!-- Start Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="img/logo.png" style="width: 200px;" alt="Logo del Gobierno de Monterrey"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mx-auto" id="navbarSupportedContent">
                <ul class="navbar-nav d-flex justify-content-around w-100 text-center">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link a-active" href="participa.php">Participa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ayuda.php">Ayuda</a>
                </li>
                <li class="nav-item">
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
        <img src="img/banner.jpg" class="img-fluid w-100" alt="Imagen del Cerro de Monterrey">
    </div>
    <div style="border-bottom: 1px solid rgba(0, 0, 0, 0.25);">
        <div class="container">
            <div class="nav3">
                <h5><a id="pid" href="participa2.php?id=<?php echo $pid; ?>&token=<?php echo hash_hmac('sha1', $pid, KEY_TOKEN );?>" data-value="<?php echo $pid?>">EL PROCESO</a></h5>
                <h5><a href="fases.php?id=<?php echo $pid; ?>&token=<?php echo hash_hmac('sha1', $pid, KEY_TOKEN );?>">FASES </a></h5>
                <h5><a class="a-active"  href="fichasActivas.php?id=<?php echo $pid; ?>&token=<?php echo hash_hmac('sha1', $pid, KEY_TOKEN );?>">FICHAS ACTIVAS</a></h5>
            </div> 
        </div>
    </div>
    
    <?php
        $sql = $pdo->prepare("SELECT *, participaciones.fecha_creacion as fecha FROM usuarios, participaciones, distritos WHERE participaciones.uid = ? AND participaciones.pid = ? AND participaciones.uid = usuarios.uid AND distritos.did = participaciones.did ");
        $sql->execute([$uid, $pid]);
        $row = $sql->fetch();
        $sql->closeCursor();

    ?>
        <div class="container" style="margin-top: 5rem;">
            <div style="text-align: center; font-weight: normal; font-size: 32px; font-weight: bold;">
                <h2><?php echo $row['titulo_registro']; ?></h2>
            </div>
            <a href="fichasActivas.php?id=<?php echo $pid; ?>&token=<?php echo hash_hmac('sha1', $pid, KEY_TOKEN);?>"><span><i class="fa-solid fa-chevron-left fa-2xs"></i> Volver al listado</span></a>
            <a id="uid"class="process-filter-a-down-2" data-value="<?php echo $id; ?>"><h5 class="mt-3" style="font-weight: normal; font-size: 32px; font-weight: 400;"><?php echo $row['nombre']?></h5></a>
            <div class="d-flex">
                <img src="img/avatar.png" alt="" style="width: 20px; height: 20px;">
                <p class="ms-2"><?php echo $row['fecha']?></p>
            </div>
        </div>

        <div class="container" style="margin-bottom: 10rem;">
            <div class="row no-gutters">
                <div class="col-12 col-sm-12 col-md-8 col-12" style="padding: 12px;">
                    <p><?php echo $row['propuesta']; ?></p>

                    <?php

                            if (!is_null($row['img'])) {
                    ?>
                                <img class="img-fluid" src="<?php echo $row['img']; ?>" >
                    <?php
                            } 
                    ?>
                    
                </div>
                
                <div class="col-6 col-md-4 col-sm-12 col-12">
                    <div class="d-flex flex-column" style="margin-left:10%;">
                        <span class="mb-4" style="border-left: 3px solid #894B5D"><p class="ms-3" style="font-size: 20px !important; margin: 5px 0; "> Votos <span class style="font-size: 26px !important; margin: 5px 0 0 20px;"><b>
                            <?php 
                                $sql = $pdo->prepare("SELECT COUNT(voted) FROM votos WHERE voted = ? AND pid = ?");
                                $sql->execute([$uid, $pid]);
                                $row = $sql->fetch();
                                $sql->closeCursor();
                                echo $row['COUNT(voted)'];
                            ?>
                        </b></span></p></span>
                    </div>
                    <?php 
                        $sql = $pdo->prepare("SELECT tipo FROM procesos, fases WHERE procesos.pid = ? AND procesos.pid=fases.pid AND n_fase = fase_actual");
                        $sql->execute([$pid]);
                        $row = $sql->fetch();
                        $sql->closeCursor();
                        if($row['tipo'] == 3){

                        
                            if(isset($_SESSION['id'])){
                            
                            
                                if($_SESSION['id'] != $uid){

                                    $sql = $pdo->prepare("SELECT COUNT(voting) FROM votos WHERE voting = ? AND voted = ? AND pid = ?");
                                    $sql->execute([$_SESSION['id'], $uid, $pid]);
                                    $row = $sql->fetch();
                                    $sql->closeCursor();
                                
                                    if($row['COUNT(voting)'] == 0 ){
                    ?>
                                        <button type="button" id="seguir" class="voting-button process-featured-button-1" style="margin-left:10%; margin-bottom: 5%; width: 75%;"> <span id="following-text">Votar</span> </button>

                    <?php
                                    }else{

                    ?>
                                        <button type="button" id="seguir" class="voting-button process-featured-button-2" style="margin-left:10%; margin-bottom: 5%; width: 75%;"> <span id="following-text">Votado</span> </button>
                    <?php
                                    }
                                }
                            }else{

                    ?>
                                    <button type="button" id="seguir" class="voting-button process-featured-button-1" style="margin-left:10%; margin-bottom: 5%; width: 75%;"><span id="following-text">Votar</span> </button>
                            
                            
                    <?php

                            }
                        }
                    ?>
                    <div class="text-center">
                        <?php
                            require 'components/reportar_propuesta.php';
                        ?>
                    </div>
                </div>
            </div>
        </div> 
    
    <?php
        
            

    ?>

	<div class="container">
		
	</div>
    <!-- MODALES -->

        <!-- MODAL INICIA -->
        <div class="modal fade" id="inicia" tabindex="-1" role="dialog" aria-labelledby="iniciaLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exitolLabel">Inicia Sesión</h5>
                        <button type="button" class="inicia-cerrar close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Para poder seguir un usuario debes iniciar sesion
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="inicia-cerrar btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN MODAL INICIA-->

    <!-- FIN MODALES -->
    <script>
        $(document).ready(function(){
            $('.inicia-cerrar').click(function(){
                $('#inicia').modal('hide');
            });
        });

        

	</script>
    
    <!-- Start Footer -->
    <?php require 'components/footer.php'; ?>
    <!-- End Footer -->


    <script>
        $(document).ready(function(){
                $(".voting-button").click(function (){
                    let uid = $('#uid').data("value");
                    let pid = $('#pid').data("value");
                    if ($('#seguir').hasClass('process-featured-button-1')) {
                        
                        $.ajax({
                            url: "fetch/vote.php",
                            type: "POST",
                            data: {
                                uid:uid,
                                pid:pid
                            },
                            success: function(response) {
                                // Verificar si la condición se cumple
                                if (!response.condicion) {
                                // Mostrar el modal aquí
                                    $("#inicia").modal("show");
                                }else{
                                    $(this).removeClass("process-featured-button-1").addClass("process-featured-button-2").css({'transition': '150ms ease-in-out'});
                                    $('#following-text').text('Votado');
                                    location.reload();
                                }
                            }

                        });

                    } else {
                        
                        $.ajax({
                            url: "fetch/revert_vote.php",
                            type: "POST",
                            data: {
                                uid:uid,
                                pid:pid
                            },
                            success: function() {
  
                                $(this).removeClass("process-featured-button-2").addClass("process-featured-button-1").css({'transition': '150ms ease-in-out'});
                                $('#following-text').text('Votar');
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
        }else{
            header("Location: /components/404.php");
            exit();
        }
    }
        //$stmt->closeCursor();

?>