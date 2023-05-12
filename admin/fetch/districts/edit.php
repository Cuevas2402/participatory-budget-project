<?php
    require '../../../config/db.php';
    require '../../../config/config.php';

    $db = new Database();
    $pdo = $db -> connect();

    $id = $_GET['district_id'];
    $nom = filter_var($_GET['name'], FILTER_SANITIZE_STRING);
    $municipio = ($_GET['mun']);

    if ($nom != '' && $municipio != ''){
        $sql = $pdo->prepare("UPDATE distritos SET nombre_distrito = ?, mid = ? WHERE did = ?;");
        $sql->execute([$nom, $municipio, $id]);
        $sql->closeCursor();
    }

    header("Location: ../../distrito.php");
    exit();
?>