<?php
    require '../config/db.php';
    require '../config/config.php';
    session_start();
    if(isset($_POST['dato'])){

        if($_POST['dato'] == 1){

            $sql = $pdo->prepare("SELECT * FROM participaciones, usuarios, distritos WHERE usuarios.uid = ? AND  usuarios.uid = participaciones.uid and distritos.did = participaciones.did");
            $sql->execute([$_SESSION['id']]);
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
<?php
            }
            $sql->closeCursor();
                            
        }else{
            if($_POST['dato'] == 2){
                $sql = $pdo->prepare("SELECT * FROM favoritos, usuarios, procesos, ambitos, municipios,fases WHERE usuarios.uid = ? AND  usuarios.uid = favoritos.uid AND favoritos.pid = procesos.pid AND  procesos.mid = municipios.mid AND procesos.aid = ambitos.aid AND procesos.pid = fases.pid AND procesos.fase_actual = fases.n_fase");
                $sql->execute([$_SESSION['id']]);
                $rows = $sql->fetchAll();
                foreach($rows as $row){
                
?>
                    <div class="col">
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
                $sql->closeCursor();
            }else{
                if($_POST['dato'] == 3 || $_POST['dato'] == 4){
                    if($_POST['dato'] == 3){
                        $sql = $pdo->prepare("SELECT * FROM seguir, usuarios WHERE followed = ? AND usuarios.uid = seguir.follow ");
                    }else{
                        $sql = $pdo->prepare("SELECT * FROM seguir, usuarios WHERE follow = ? AND usuarios.uid = seguir.followed");
                    }

                    $sql->execute([$_SESSION['id']]);
                    $rows = $sql->fetchAll();
                    foreach($rows as $row){
?>
                        <!-- START INDIVIDUAL CARD -->
                        <div class="col-12 text-center">
                            <img src="img/avatar.png" style="width: 50px; border-radius: 3px 0 0px 3px;">
                            <div class="col-12 col-md my-2">
                                <h5 class="mt-2"><?php echo $row['nombre']; ?></h5>
                                <p class="my-2"><small>Creado el: <?php echo $row['fecha_creacion']; ?></small></p>
                                <a><button class="my-2">Más información</button></a>
                            </div>
                            <center><hr style="width: 70%;"></center>
                        </div>
                        <!-- END INDIVIDUAL CARD -->
<?php
                    }
                    $sql->closeCursor();
                }else{
                    header("Location: /components/404.php");
                    exit(); 
                }
            }

        }

    }else{
        header("Location: /components/404.php");
        exit();
    }

?>
     



