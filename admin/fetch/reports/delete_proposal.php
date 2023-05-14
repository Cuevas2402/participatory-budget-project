<?php
    require '../../../config/db.php';
    require '../../../config/config.php';
    

    if(isset($_GET['uid']) && isset($_GET['pid'])){
        $pid = $_GET['uid'];
        $uid = $_GET['pid'];
        
        if (filter_var($uid, FILTER_VALIDATE_INT) === false &&  filter_var($pid, FILTER_VALIDATE_INT) === false ) {
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

        header("Location: ../../report_proposals.php");
        exit();
    }
?>