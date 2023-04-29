<?php
    require '../config/config.php';
    require '../config/db.php';
    $db = new Database();
    $pdo = $db -> connect();
    if(isset($_POST['datos']) && isset($_POST['id'])){
        $busqueda = $_POST['datos'];
        $id = $_POST['id'];
        //sanitizar el string
        //$busqueda = $pdo->quote($busqueda); //Escapar el string de caracteres espciales 
        $busqueda = filter_var($busqueda, FILTER_SANITIZE_STRING); 

        // Definir el parametro
        $busqueda = '%'.$busqueda.'%';
        $sql = $pdo->prepare("SELECT participaciones.*, usuarios.*, distritos.* FROM participaciones INNER JOIN usuarios ON participaciones.uid = usuarios.uid INNER JOIN distritos ON distritos.did = participaciones.did WHERE pid = ? AND (LOWER(titulo_registro) LIKE ? OR LOWER(propuesta) LIKE ? OR LOWER(nombre) LIKE ? OR participaciones.uid LIKE ?)");
        // Agregar los parametros
        $sql->execute([$id, $busqueda, $busqueda, $busqueda, $busqueda]);
        // Fetch los resultados
        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
        $count = $sql->rowCount();
        if($count > 0){
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
        }else{
            ?>
                <div class="container" style="margin-top:5%">
                    <h1 class="text-center">No se encontró ninguna búsqueda con esos valores 😰</h1>
                </div>
            <?php
        }
        $sql->closeCursor();   
    }else{
        
    }
?>