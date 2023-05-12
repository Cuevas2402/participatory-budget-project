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
        
        <div style="min-height: 60vh;">
            <div class="container" style="margin-top: 5rem; margin-bottom: 5rem;">
                <div class="row row-cols-1 row-cols-md-2">
                    <div class="col col-md-3"></div>
                    <div class="col col-md-9  d-flex justify-content-around px-5">
                        <a class="procesos-f process-filter-a-active" data-value="1"><h5>Actividad</h5></a>
                        <a class="procesos-f process-filter-a-down" data-value="2"><h5>Procesos</h5></a>
                        <a class="procesos-f process-filter-a-down" data-value="5"><h5>Votos</h5></a>
                    </div>
                </div>
                    <div class="row row-cols-1 row-cols-md-2">
                        <div class="col col-md-3 text-center px-sm-0 px-md-3 px-lg-5">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <?php
                                        $sql = $pdo->prepare("SELECT img FROM usuarios WHERE uid = ?");
                                        $sql->execute([$id]);
                                        $row = $sql->fetch();
                                        $sql->closeCursor();

                                        if (!is_null($row['img'])) {
                                    ?>
                                        <img class="img-fluid"  src="<?php echo $row['img']; ?>" alt="Imagen de la cuenta" style="border-radius: 3px 3px 0 0px;">
                                    <?php
                                        }else{
                                    ?>
                                        <img class="img-fluid" src="img/avatar.png" alt="Imagen de la cuenta" style="border-radius: 3px 3px 0 0px;">
                                    <?php
                                        } 
                                    ?>

                                    
                                    <a class="uid process-filter-a-down-2" data-value="<?php echo $id; ?>"><h5 class="my-3 profile-name" style="font-weight: 500;">
                                        <?php
                                            $sql = $pdo->prepare("SELECT nombre FROM usuarios WHERE uid = ?");
                                            $sql->execute([$id]);
                                            $row = $sql->fetch();
                                            echo $row['nombre'];
                                            $sql->closeCursor();
                                            
                                        ?>

                                    </h5></a>
                                    <div class="row">
                                        <div class="col border-top">
                                            <a class="procesos-f process-filter-a-down" data-value="3"><p class="follow-text">Seguidores</p></a>
                                            <p class="follow-count">
                                                <?php
                                                    $sql = $pdo->prepare("SELECT COUNT(followed) FROM seguir WHERE followed = ?");
                                                    $sql->execute([$id]);
                                                    $row = $sql->fetch();
                                                    echo $row['COUNT(followed)'];
                                                    $sql->closeCursor();
                                                ?>
                                            </p>
                                        </div>
                                        <div class="col border-top">
                                            <a class="procesos-f process-filter-a-down" data-value="4"><p class="follow-text">Siguiendo</p></a>
                                            <p class="follow-count">
                                            <?php
                                                    $sql = $pdo->prepare("SELECT COUNT(follow) FROM seguir WHERE follow = ?");
                                                    $sql->execute([$id]);
                                                    $row = $sql->fetch();
                                                    echo $row['COUNT(follow)'];
                                                    $sql->closeCursor();
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                    
                                        
                                    <?php 
                                        if(!isset($_SESSION['id']) OR $_SESSION['id'] != $id){
                                    ?>
                                            <!-- Botón para reportar -->
                                            <div class="row border-top">
                                    <?php
                                                require 'components/reportar.php'; 
                                    
                                    ?>
                                            </div>
                                    <?php
                                        }
                                        
                                    ?>
                                    
                                </li>
                            </ul>

                            <?php 
                                if(isset($_SESSION['id'])){
                        
                                
                                    if($id != $_SESSION['id']){
                                        

                                        $sql = $pdo->prepare("SELECT COUNT(follow) FROM seguir WHERE follow = ? AND followed = ? ");
                                        $sql->execute([$_SESSION['id'], $id]);
                                        $row = $sql->fetch();

                                        if($row['COUNT(follow)'] > 0){

                            ?>
                                            <div class="mt-4">
                                                <button type="button" id="seguir" class="follow-button process-featured-button-2" style="margin-left:10%; margin-bottom: 5%; width: 75%;"><span style="position: relative; top: 5px;" class="material-symbols-outlined"> notifications </span> <span id="following-text">Siguiendo</span> </button>
                                            </div>
                            <?php
                                        }else{
                            

                            ?>
                                            <div class="mt-4">
                                                <button type="button" id="seguir" class="follow-button process-featured-button-1" style="margin-left:10%; margin-bottom: 5%; width: 75%;"><span style="position: relative; top: 5px;" class="material-symbols-outlined"> notifications </span> <span id="following-text">Seguir</span> </button>
                                            </div>
                            <?php
                                        }
                                    }
                                }else{

                            ?>
                                    <div class="mt-4">
                                        <button type="button" id="seguir" class="follow-button process-featured-button-1" style="margin-left:10%; margin-bottom: 5%; width: 75%;"><span style="position: relative; top: 5px;" class="material-symbols-outlined"> notifications </span> <span id="following-text">Seguir</span> </button>
                                    </div>
                                    
                            <?php

                                }
                            ?>
                        </div>
                        <div class="col col-md-9">
                            <div class="container text-center" style="margin-top: 1rem;">
                                <!-- ACOMODO -->
                            <div class="ficha-card-scroll-3">
                                <div class="filter row row-cols-1 row-cols-md-2 row-cols-lg-3 d-flex align-items-stretch g-3">
                                    <!-- INSERTAR -->
                                    <?php

                                        $sql = $pdo->prepare("SELECT *, participaciones.img as imagen FROM participaciones, usuarios, distritos WHERE usuarios.uid = ? AND  usuarios.uid = participaciones.uid and distritos.did = participaciones.did");
                                        $sql->execute([$id]);
                                        $rows = $sql->fetchAll();
                                        $count = $sql->rowCount();
                                        $sql->closeCursor();
                                        if($count == 0){
                                            ?>
                                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                                <symbol id="check-circle-fill" viewBox="0 0 16 16">
                                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                                </symbol>
                                                <symbol id="info-fill" viewBox="0 0 16 16">
                                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                                </symbol>
                                                <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                </symbol>
                                                </svg>

                                                <div class="container alert alert-warning d-flex align-items-center" role="alert" style="margin: 1rem auto; width: 90%;">
                                                    <svg class="bi flex-shrink-0 me-2" style="height:50%" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                                    <div>
                                                        <h1 class="text-center" style="font-weight: 400;">No se encontró ninguna búsqueda con esos valores 😰</h1>
                                                    </div>
                                                </div>
                                            <?php
                                        }else{
                                            foreach($rows as $row){

                                                require 'components/card_ficha.php';

                                            }
                                        }
                                        
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
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
                            Para poder seguir un usuario debes iniciar sesion
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIN MODAL INICIA-->

	    <!-- FIN MODALES -->
        
        <script type="text/javascript">

            $(document).ready(function(){
                $(".procesos-f").click(function() {
                    let dato = $(this).data("value");
                    let id = $('.uid').data("value");
                    $(".process-filter-a-active").addClass("process-filter-a-down").removeClass("process-filter-a-active");
                    $(this).addClass("process-filter-a-active").removeClass("process-filter-a-down");
                    $.ajax({
                        url: "fetch/show_profile.php",
                        type: "POST",
                        data: {
                            dato: dato,
                            id:id
                            
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

            $(document).ready(function(){
                $(".follow-button").click(function (){
                    let id = $('.uid').data("value");
                    if ($('#seguir').hasClass('process-featured-button-1')) {
                        
                        $.ajax({
                            url: "fetch/follow_perfil.php",
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
                            url: "fetch/unfollow_perfil.php",
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
        }else{
            header("Location: components/404.php");
            exit();
        }
    }
        //$stmt->closeCursor();

?>