<?php
    require '../../../config/db.php';
    require '../../../config/config.php';

    if(isset($_GET['delete'])){
        $pid = $_GET['delete'];

        if (filter_var($id, FILTER_VALIDATE_INT) === false) {
            exit("Invalid input");
        }

        $sql3 = $pdo->prepare("DELETE FROM favoritos WHERE pid IN (SELECT pid FROM procesos WHERE pid = ?)");
        $sql4 = $pdo->prepare("DELETE FROM votos WHERE pid IN (SELECT pid FROM procesos WHERE pid = ?)");
        $sql5 = $pdo->prepare("DELETE FROM report_proposal WHERE pid IN (SELECT pid FROM procesos WHERE pid = ?)");
        $sql1 = $pdo->prepare("DELETE FROM participaciones WHERE pid IN (SELECT pid FROM procesos WHERE pid = ?)");
        $sql8 = $pdo->prepare("DELETE FROM fases WHERE pid IN (SELECT pid FROM procesos WHERE pid = ?)");
        $sql2 = $pdo->prepare("DELETE FROM procesos WHERE pid = ?");
        

        // bind the parameters and execute the queries
        
        $sql3->execute([$pid]);
        $sql4->execute([$pid]);
        $sql5->execute([$pid]);
        $sql1->execute([$pid]);
        $sql8->execute([$pid]);
        $sql2->execute([$pid]);
        $sql6->execute([$pid]);
        $sql7->execute([$pid]);
       
        $sql1->closeCursor();
        $sql2->closeCursor();
        $sql3->closeCursor();
        $sql4->closeCursor();
        $sql5->closeCursor();
        $sql8->closeCursor();
        

        header("Location: ../../proceso.php");
        exit();
    }
    
?>