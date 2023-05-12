<?php
    require '../../../config/db.php';
    require '../../../config/config.php';

    $db = new Database();
    $pdo = $db -> connect();

    $id = $_GET['municipality_id'];
    $nom = filter_var($_GET['name'], FILTER_SANITIZE_STRING);

    if ($nom != ''){
        $sql = $pdo->prepare("UPDATE municipios SET nombre_municipio = ? WHERE mid = ?;");
        $sql->execute([$nom,$id]);
        $sql->closeCursor();
    }

    header("Location: ../../municipios.php");
    exit();
?>