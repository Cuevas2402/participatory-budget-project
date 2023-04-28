<?php
    require '../config/config.php';
    require '../config/db.php';
    $db = new Database();
    $pdo = $db -> connect();
    if(isset($_POST['v1']) && isset($_POST['v2'])){
        $v1 = $_POST['v1'];
        $v2 = $_POST['v2'];
        $query = "SELECT procesos.pid, titulo_proceso, fecha_inicio_proceso, fecha_fin_proceso, nombre_ambito, nombre_municipio, titulo_fase FROM procesos, fases, ambitos, municipios WHERE fase_actual = n_fase and procesos.aid = ambitos.aid and procesos.mid = municipios.mid and procesos.pid = fases.pid ";
        if($v1 != 0){
            $query .= "and procesos.aid = '$v1'";
        }
        if($v2 != 0){
            $query .= " and procesos.mid = '$v2'";
        }
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        $count = $stmt->rowCount();
        if($count > 0){

        
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
        }else{
            ?>
                <div class="container">
                    <h1 class="text-center">No se encontró ninguna búsqueda con esos valores 😰</h1>
                </div>
            <?php
        }
        $stmt->closeCursor();
    }

?>