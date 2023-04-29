<?php
    require '../config/config.php';
    require '../config/db.php';
    $db = new Database();
    $pdo = $db -> connect();
    if(isset($_POST['datos']) ){
        $datos = $_POST['datos'];
        foreach($datos as $data){
            $sql = $pdo->prepare("SELECT * FROM participaciones, usuarios, distritos WHERE participaciones.pid = '$data' AND usuarios.uid = participaciones.uid and distritos.did = participaciones.did");
            $sql->execute();
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
        }
    }else{
        $id = $_POST['id'];
        $sql = $pdo->prepare("SELECT * FROM participaciones, usuarios, distritos WHERE participaciones.pid = '$id' AND usuarios.uid = participaciones.uid and distritos.did = participaciones.did");
        $sql->execute();
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

                                    
    }
?>