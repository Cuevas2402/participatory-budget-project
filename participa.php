<?php
    require 'config/db.php';
    require 'config/config.php';
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

    <!-- Start Featured Process -->
    <div class="container process-featured">
        <h4 style="color: #252525; font-weight: 600;"><i class="fa fa-square" aria-hidden="true"></i> PROCESOS DESTACADOS</h4>
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
                            <a href="participa2.php?id=<?php echo $row['pid']; ?>&token=<?php echo hash_hmac('sha1', $row['pid'], KEY_TOKEN );?>" ><button class="process-featured-button-1">Más Información</button></a>
                            <button class="process-featured-button-2">Participar</button>
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
            <?php
                $stmt = $pdo->prepare("CALL count_process()");
                $stmt->execute();
                $rows = $stmt->fetch();
            ?>
            <h4 style="color: #252525; font-weight: 600;"><i class="fa fa-square" aria-hidden="true"></i> PROCESOS (<?php echo $rows['count(pid)']; ?>)</h4>
            <?php
                $stmt->closeCursor();
            ?>
            <h4 class="see-process">VER</h4>
            <h4><a class="procesos-f process-filter-a-active" data-value="1" >TODOS</a></h4>

            <?php
                $stmt = $pdo->prepare("CALL count_process_active()");
                $stmt->execute();
                $rows = $stmt->fetch();
            ?>
            <h4><a class="procesos-f process-filter-a-down" data-value="2">ACTIVOS (<?php echo $rows['count(pid)']; ?>)</a></h4>
            <?php
                $stmt->closeCursor();
            ?>

            <?php
                $stmt = $pdo->prepare("CALL count_process_down()");
                $stmt->execute();
                $rows = $stmt->fetch();
            ?>
            <h4><a class="procesos-f process-filter-a-down" data-value="3">PASADOS (<?php echo $rows['count(pid)']; ?>)</a></h4>
            <?php
                $stmt->closeCursor();
            ?>
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
                <p>MUNICIPIOS 
                    <select  id="municipios" name="municipios" class="process-select" type="text">
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
            <div class="process-card-scroll">
                <div class="filter row row-cols-1 row-cols-md-2 row-cols-lg-4 d-flex align-items-stretch g-3">
                    <!-- START INDIVIDUAL CARD -->
                    <?php
                        $stmt = $pdo->prepare("CALL get_process_card()");
                        $stmt->execute();
                        $rows = $stmt->fetchAll();
                        foreach($rows as $row){

                            require 'components/card_proceso.php';
                    
                        }
                        $stmt->closeCursor();
                    ?>
                    <!-- END INDIVIDUAL CARD--> 
                </div>
            </div>
        </div>
        <!-- END CARDS -->                        
    </div>
    <!-- End First Content -->

    <!-- Start Footer -->
    <?php require 'components/footer.php'; ?>
    <!-- End Footer -->
    
    <!-- Codgio para que funcione el filtro-->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#ambitos, #municipios').on('change', function(){
                let ambitos = $("#ambitos").val(); // Agarrar lo que esta en el campo de ambitos
                let municipios = $("#municipios").val(); // Agarrar lo que esta en el campo de municipios
                let estado = $(".process-filter-a-active").data("value");
                $.ajax({
                    url: "fetch/filter_process.php",
                    type: "POST",
                    data: {
                        v1: ambitos,
                        v2: municipios,
                        v3: estado
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
            $(".procesos-f").click(function() {
                let ambitos = $("#ambitos").val();
                let municipios = $("#municipios").val();
                let estado = $(this).data("value");
                $(".process-filter-a-active").addClass("process-filter-a-down").removeClass("process-filter-a-active");
                $(this).addClass("process-filter-a-active").removeClass("process-filter-a-down");
                $.ajax({
                    url: "fetch/filter_process.php",
                    type: "POST",
                    data: {
                        v1: ambitos,
                        v2: municipios,
                        v3: estado
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