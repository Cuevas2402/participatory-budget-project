<?php
    require '../../../config/db.php';
    require '../../../config/config.php';
    
    

    /*$sql = $pdo->prepare("DELETE FROM participaciones WHERE pid = ? AND uid = ?");
    $sql->execute([$proceso,$usuario]);

    $sql->closeCursor();

    header("Location: ../../participaciones.php");
    exit();*/

    if(isset($_GET['process']) && isset($_GET['user'])){
        $pid = $_GET['process'];
        $uid = $_GET['user'];
        
        if (filter_var($pid, FILTER_VALIDATE_INT) === false) {
            exit("Invalid input");
        }
        if (filter_var($uid, FILTER_VALIDATE_INT) === false) {
            exit("Invalid input");
        }
        //Eliminar votos
        
        $sql = $pdo->prepare("DELETE FROM votos WHERE voted = ? AND pid = ? ");
        $sql->execute([$uid, $pid]);
        $sql->closeCursor();

        //Eliminar reporte
        $sql = $pdo->prepare("DELETE FROM report_proposal WHERE uid = ? AND pid = ?");
        $sql->execute([$uid, $pid]);
        $sql->closeCursor();

        //Eliminar participaciones
        $sql = $pdo->prepare("DELETE FROM participaciones WHERE uid = ? AND pid = ? ");
        $sql->execute([$uid , $pid]);
        $sql->closeCursor();

        header("Location: ../../participaciones.php");
        exit();
    }
?>