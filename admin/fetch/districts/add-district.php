<?php
    require '../../../config/db.php';
    require '../../../config/config.php';

    $db = new Database();
    $pdo = $db -> connect();

    $nombre = filter_var($_GET['name'], FILTER_SANITIZE_STRING);
	$municipality = ($_GET['municipio']);

	$sql = $pdo->prepare("INSERT INTO distritos (mid, nombre_distrito) VALUES (?,?)");
    $sql->execute([$municipality,$nombre]);

    $sql->closeCursor();

    header("Location: ../../distrito.php");
    exit();
?>