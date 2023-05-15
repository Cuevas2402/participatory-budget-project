<?php
    require '../../../config/db.php';
    require '../../../config/config.php';
    
    /*$db = new Database();
    $pdo = $db -> connect();

    $id = $_GET['delete'];
    echo ($id);

    if (filter_var($id, FILTER_VALIDATE_INT) === false) {
        exit("Invalid input");
    }

    $sql = $pdo->prepare("DELETE FROM procesos WHERE mid = ?");
    $sql->execute([$id]);

    $sql = $pdo->prepare("DELETE FROM distritos WHERE mid = ?");
    $sql->execute([$id]);

    $sql = $pdo->prepare("DELETE FROM municipios WHERE mid = ?");
    $sql->execute([$id]);

    $sql->closeCursor();

    header("Location: ../../municipios.php");
    exit();*/

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];

        if (filter_var($id, FILTER_VALIDATE_INT) === false) {
            exit("Invalid input");
        }

        $sql = $pdo->prepare("DELETE FROM participaciones, procesos, favoritos , votos, report_proposal, municipios, distritos WHERE municipios.mid =  ? AND procesos.mid = municipios.mid AND participaciones.pid = procesos.pid AND favoritos.pid = procesos.pid AND participaciones.pid = votos.pid AND participaciones.pid = report_proposal.pid AND distritos.mid = municipios.mid AND distritos.did = participaciones.did");
        $sql->execute([$id]);

        $sql->closeCursor();

        header("Location: ../../municipios.php");
        exit();
    }
?>