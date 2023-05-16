<?php
    require '../../../config/db.php';
    require '../../../config/config.php';
    
    $db = new Database();
    $pdo = $db -> connect();

    $id = $_GET['delete'];
    echo ($id);

    if (filter_var($id, FILTER_VALIDATE_INT) === false) {
        exit("Invalid input");
    }

    $sql = $pdo->prepare("DELETE votos, participaciones FROM votos JOIN participaciones ON votos.pid = participaciones.pid WHERE participaciones.did = ?");
    $sql->execute([$id]);

    $sql = $pdo->prepare("DELETE FROM participaciones WHERE did = ?");
    $sql->execute([$id]);

    $sql = $pdo->prepare("DELETE FROM distritos WHERE did = ?");
    $sql->execute([$id]);

    $sql->closeCursor();

    header("Location: ../../distrito.php");
    exit();
?>