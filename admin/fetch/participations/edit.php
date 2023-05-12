<?php
    require '../../../config/db.php';
    require '../../../config/config.php';

    $db = new Database();
    $pdo = $db -> connect();

    $titulo = filter_var($_GET['title'], FILTER_SANITIZE_STRING);
	$propuesta = filter_var($_GET['proposal'], FILTER_SANITIZE_STRING);
    $proceso = $_GET['process_id'];
    $usuario = $_GET['user_id'];

    if ($titulo != '' && $propuesta != ''){
        $sql = $pdo->prepare("UPDATE participaciones SET titulo_registro = ?, propuesta = ? WHERE pid = ? AND uid = ?;");
        $sql->execute([$titulo, $propuesta, $proceso, $usuario]);
        $sql->closeCursor();
    }

    header("Location: ../../participaciones.php");
    exit();
?>