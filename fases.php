<?php
    require 'config/db.php';
    require 'config/config.php';
    $db = new Database();
    $pdo = $db -> connect();
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
        <?php require 'header/header.php' ?>
        <!-- End Navbar -->
        
        <!-- Start process card -->
        <div class="card-section">
            <h1 class="section-title">Consulta Extraordinaria para la selección de jueces y juezas auxiliares</h1>
        </div>
        <!-- End process card  -->

        <!-- Start process sections-->
        <div style="border-bottom: 1px solid rgba(0, 0, 0, 0.25);">
            <div class="container">
                <div class="nav3">
                    <h5><a href="participa2.php?id=<?php echo $id; ?>&token=<?php echo hash_hmac('sha1', $id, KEY_TOKEN );?>">EL PROCESO</a></h5>
                    <h5><a href="fases.php?id=<?php echo $id; ?>&token=<?php echo hash_hmac('sha1', $id, KEY_TOKEN );?>">FASES </a></h5>
                    <h5><a href="fichasActivas.php">FICHAS ACTIVAS</a></h5>
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
        
        </div>  
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