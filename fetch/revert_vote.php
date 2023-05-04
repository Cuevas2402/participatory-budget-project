<?php
    require '../config/db.php';
    require '../config/config.php'; 
    session_start();
    if(isset($_SESSION['id']) && isset($_POST['uid']) && isset($_POST['pid'])) {
        $sql = $pdo->prepare("DELETE FROM votos WHERE voting = ? AND voted = ?  AND pid = ?");
        $sql->execute([$_SESSION['id'], $_POST['uid'], $_POST['pid']]);
        header("Content-Type: application/json");
        echo json_encode(array("condicion" => true));
    }
    exit();
?>