<?php
    require '../config/config.php';
    require '../config/db.php';
    if(isset($_POST['id']) && isset($_POST['reporte'])){
        $uid = $_POST['id'];
        $reporte = $_POST['reporte'];
        $sql = $pdo->prepare("INSERT INTO report_user (uid, reporte) VALUES (? , ?)");
        $sql->execute([$uid, $reporte]);
        header("Content-Type: application/json");
        echo json_encode(array("condicion" => true));
    }
?>