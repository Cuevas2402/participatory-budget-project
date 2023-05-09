<?php
    require '../config/config.php';
    require '../config/db.php';

    $sql = $pdo->prepare("SELECT * FROM procesos");
    $sql->execute();
    $rows = $sql->fetchAll(PDO::FETCH_ASSOC);

    // Crear un array vacío para almacenar los eventos
    $eventos = array();

    // Recorrer los resultados de la consulta y añadirlos al array de eventos
    foreach($rows as $row){
        $color = sprintf('#%06X', rand(0, 0xFFFFFF));
        $evento = array(
            'id' => $row['pid'],
            'title' => $row['titulo_proceso'],
            'start' => $row['fecha_inicio_proceso']. 'T00:00:00',
            'end' => $row['fecha_fin_proceso']. 'T23:59:00',
            'url' => "participa2.php?id=".$row['pid']."&token=".hash_hmac('sha1', $row['pid'], KEY_TOKEN),
            'color' => $color 
        );
        array_push($eventos, $evento);
    }

    // Devolver los eventos en formato JSON
    echo json_encode($eventos);
?>