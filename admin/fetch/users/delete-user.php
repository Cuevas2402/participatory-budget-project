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

    $sql = $pdo->prepare("DELETE FROM participaciones WHERE participaciones.uid = ?;");
    $sql->execute([$id]);

    $sql = $pdo->prepare("DELETE FROM usuarios WHERE usuarios.uid = ?;");
    $sql->execute([$id]);

    $sql->closeCursor();

    header("Location: ../../usuarios.php");
    exit();
?>