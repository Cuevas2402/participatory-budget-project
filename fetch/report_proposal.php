<?php
    require '../config/config.php';
    require '../config/db.php';
    if(isset($_POST['uid']) &&  isset($_POST['pid']) && isset($_POST['reporte'])){
        $uid = $_POST['uid'];
        $pid = $_POST['pid'];
        $reporte = $_POST['reporte'];
        $sql = $pdo->prepare("INSERT INTO report_proposal (uid,pid, reporte) VALUES (?, ? , ?)");
        $sql->execute([$uid, $pid, $reporte]);
        header("Content-Type: application/json");
        echo json_encode(array("condicion" => true));
    }
?>