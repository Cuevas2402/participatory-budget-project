<?php
    require '../config/config.php';
    require '../config/db.php';
    if(isset($_POST['v1']) && isset($_POST['v2']) && isset($_POST['v3'])){
        $v1 = $_POST['v1'];
        $v2 = $_POST['v2'];
        $v3 = $_POST['v3'];
        $query = "SELECT procesos.pid, titulo_proceso, fecha_inicio_proceso, fecha_fin_proceso, nombre_ambito, nombre_municipio, titulo_fase FROM procesos, fases, ambitos, municipios WHERE fase_actual = n_fase and procesos.aid = ambitos.aid and procesos.mid = municipios.mid and procesos.pid = fases.pid ";
        if($v1 != 0){
            $query .= "and procesos.aid = '$v1'";
        }
        if($v2 != 0){
            $query .= " and procesos.mid = '$v2'";
        }
        if($v3 == 2){
            $query .= " and estatus = 1";
        }
        if($v3 == 3){
            $query .= " and estatus = 0";
        }
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        $count = $stmt->rowCount();
        if($count > 0){

        
            foreach($rows as $row){
                
                require '../components/card_proceso.php';

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