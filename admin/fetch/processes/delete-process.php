<?php
    require '../../../config/db.php';
    require '../../../config/config.php';

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];

        if (filter_var($id, FILTER_VALIDATE_INT) === false) {
            exit("Invalid input");
        }

        $sql = $pdo->prepare("DELETE FROM participaciones, procesos, favoritos , votos, report_proposal WHERE procesos.pid = ? AND participaciones.pid = procesos.pid AND favoritos.pid = procesos.pid AND participaciones.pid = votos.pid AND participaciones.pid = report_proposal.pid");
        $sql->execute([$id]);

        $sql->closeCursor();

        header("Location: ../../proceso.php");
        exit();
    }
    
?>