<?php
  require 'config/db.php';
  $db = new Database();
  $pdo = $db -> connect();
  $stmt = $pdo->prepare("CALL get_process_featured_2()");
  $stmt->execute();
  $rows = $stmt->fetchAll();
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
        <?php require 'header/header.php' ?>
        <!-- End Navbar -->

        <!-- Start Featured Process -->
        <div class="container process-featured">
            <h4><strong><i class="fa fa-square" aria-hidden="true"></i> PROCESOS DESTACADOS</strong></h4>
        </div>
        
        <?php
            foreach($rows as $row){
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
                            <center>
                            <p class="process-featured-text"><i>Fase Actual:</i>
                                <button disabled class="process-featured-button-3">
                                    <?php
                                        echo $row['titulo_fase'];
                                    ?>
                                </button>
                            </p>
                            </center>
                                <?php
                                    echo $row['descripcion_proceso'];
                                ?>
                            <center>
                                <a href="participa2.php?id=<?php echo $row['pid']; ?>&token=<?php echo hash_hmac('sha1', $row['pid'], KEY_TOKEN );?>" ><button class="process-featured-button-1">Más información</button></a>
                                <button class="process-featured-button-2">PARTICIPAR</button>
                            </center>
                        </div>
                    </div>
                    <div class="col border d-flex justify-content-center align-items-center" style="padding: 0 0;  background-image: url(img/img4.jpg); background-position: center; background-repeat: no-repeat; background-size: 100% 100%;">
                        <img class="card-img" src="img/img4.jpg" alt="" style="filter: opacity(0)">
                    </div>
                
                </div>
            </div>
        <?php
            
            }
            $stmt->closeCursor();
        ?>
        <!-- End process featured-->

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
                    <p>ÁMBITOS 
                        <select  id="ambitos"  name="ambitos" class="process-select" type="text">
                            <option value="0" selected>Todos</option>
                            <?php
                                $stmt = $pdo->prepare("CALL get_ambitos()");
                                $stmt->execute();
                                $rows = $stmt->fetchAll();
                                foreach($rows as $row){
                                    ?>
                                        <option value="<?php echo $row['aid']?>"><?php echo $row['nombre_ambito'] ?></option>
                                    <?php

                                }
                                $stmt->closeCursor();
                            ?>
                        </select>
                    </p>
                </div>

                <div class="col">
                    <p>DISTRITOS 
                        <select  id="distritos" name="distritos" class="process-select" type="text">
                            <option value="0" selected>Todos</option>
                            <?php
                                $stmt = $pdo->prepare("CALL get_municipios()");
                                $stmt->execute();
                                $rows = $stmt->fetchAll();
                                foreach($rows as $row){
                                    ?>
                                        <option value="<?php echo $row['mid']?>" ><?php echo $row['nombre_municipio'] ?></option>
                                    <?php

                                }
                                $stmt->closeCursor();
                            ?>
                        </select>
                    </p>
                </div>
                
            </div>
            <!-- START CARDS NUEVO -->
            <div class="container text-center" style="margin-top: 4rem; margin-bottom: 8rem;">
                <div class="filter row row-cols-1 row-cols-md-2 row-cols-lg-4 d-flex align-items-stretch g-3">
                    <!-- START INDIVIDUAL CARD -->
                    <?php
                        $stmt = $pdo->prepare("CALL get_process_card()");
                        $stmt->execute();
                        $rows = $stmt->fetchAll();
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
                        $stmt->closeCursor();
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
        
        <!-- Codgio para que funcione el filtro-->
        <script type="text/javascript">
            $(document).ready(function(){
                $('#ambitos').on('change', function(){
                    var value = $(this).val();
                    var value2 = $('#distritos').val();
                    
                    $.ajax({
                        url: "fetch/filter_process.php",
                        type: "POST",
                        data: {
                            v1: value,
                            v2: value2
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
                $('#distritos').on('change', function(){
                    var value = $('#ambitos').val(); $(this).val();
                    var value2 = $(this).val();
                    $.ajax({
                        url: "fetch/filter_process.php",
                        type: "POST",
                        data: {
                            v1: value,
                            v2: value2
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