<?php
    require '../../../config/db.php';
    require '../../../config/config.php';

    $db = new Database();
    $pdo = $db -> connect();

    $id = $_GET['ambit_id'];
    $nom = filter_var($_GET['name'], FILTER_SANITIZE_STRING);

    if ($nom != ''){
        $sql = $pdo->prepare("UPDATE ambitos SET nombre_ambito = ? WHERE aid = ?;");
        $sql->execute([$nom, $id]);
        $sql->closeCursor();
    }

    header("Location: ../../ambitos.php");
    exit();
?>