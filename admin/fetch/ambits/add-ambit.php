<?php
    require '../../../config/db.php';
    require '../../../config/config.php';

    $db = new Database();
    $pdo = $db -> connect();

    $nombre = filter_var($_GET['name'], FILTER_SANITIZE_STRING);

	$sql = $pdo->prepare("INSERT INTO ambitos (nombre_ambito) VALUES (?)");
    $sql->execute([$nombre]);

    $sql->closeCursor();

    header("Location: ../../ambitos.php");
    exit();
?>