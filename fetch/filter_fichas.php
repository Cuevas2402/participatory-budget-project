<?php
    require '../config/config.php';
    require '../config/db.php';
    if(empty($_POST['datos']) && empty($_POST['datos2'])){
        $id = $_POST['id'];
        if (isset($_POST['select'])) {
            $query = "SELECT *, participaciones.img as imagen FROM participaciones, usuarios, distritos WHERE participaciones.pid = ? AND usuarios.uid = participaciones.uid and distritos.did = participaciones.did";
            if ($_POST['select'] == 2) {
                $query .= " ORDER BY participaciones.fecha_creacion ASC";
            }
            if ($_POST['select'] == 3) {
                $query = "SELECT *, participaciones.img as imagen FROM participaciones, usuarios, distritos, votos WHERE votos.pid = participaciones.pid AND votos.voted = participaciones.uid AND participaciones.pid = ? AND usuarios.uid = participaciones.uid and distritos.did = participaciones.did GROUP BY participaciones.pid, participaciones.uid ORDER BY COUNT(voted) DESC";
            }
            $sql = $pdo->prepare($query);
            $sql->execute([$id]);
            $rows = $sql->fetchAll();
            foreach ($rows as $row) {
                require '../components/card_ficha.php';
            }
        }
    }else{


    
        $query = "SELECT *, participaciones.img as imagen FROM participaciones, usuarios, distritos, votos WHERE usuarios.uid = participaciones.uid and distritos.did = participaciones.did AND participaciones.did AND votos.pid = participaciones.pid AND votos.voted = participaciones.uid";

        $params = array();

        if(!empty($_POST['datos'])){
            $datos = $_POST['datos'];
            $placeholders = implode(',', array_fill(0, count($datos), '?'));
            $query .= " AND participaciones.did IN ($placeholders)";
            $params = array_merge($params, $datos);
        }

        if(!empty($_POST['datos2'])){
            $datos2 = $_POST['datos2'];
            $placeholders = implode(',', array_fill(0, count($datos2), '?'));
            $query .= " AND participaciones.estatus IN ($placeholders)";
            $params = array_merge($params, $datos2);
        }

        if ($_POST['select'] == 2) {
            $query .= " ORDER BY participaciones.fecha_creacion ASC";
        }

        if ($_POST['select'] == 3) {
            $query .= " GROUP BY participaciones.pid, participaciones.uid ORDER BY COUNT(voted) DESC";
        }
        $sql = $pdo->prepare($query);
        $sql->execute($params);

        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach($rows as $row){
            require '../components/card_ficha.php';
        }
    }
?>