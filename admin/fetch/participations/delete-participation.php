<?php
    require '../../../config/db.php';
    require '../../../config/config.php';
    
    $db = new Database();
    $pdo = $db -> connect();

    $proceso = $_GET['process'];
    $usuario = $_GET['user'];

    if (filter_var($proceso, FILTER_VALIDATE_INT) === false) {
        exit("Invalid input");
    }
    if (filter_var($usuario, FILTER_VALIDATE_INT) === false) {
        exit("Invalid input");
    }

    $sql = $pdo->prepare("DELETE FROM participaciones WHERE pid = ? AND uid = ?");
    $sql->execute([$proceso,$usuario]);

    $sql->closeCursor();

    header("Location: ../../participaciones.php");
    exit();
?>