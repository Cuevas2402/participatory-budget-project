<?php
    require '../../../config/db.php';
    require '../../../config/config.php';

    $db = new Database();
    $pdo = $db -> connect();

    $nombre = filter_var($_GET['name'], FILTER_SANITIZE_STRING);

	$sql = $pdo->prepare("INSERT INTO municipios (nombre_municipio) VALUES (?)");
    $sql->execute([$nombre]);

    $sql->closeCursor();

    header("Location: ../../municipios.php");
    exit();
?>