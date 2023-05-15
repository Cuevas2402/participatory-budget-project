<?php
    require '../../../config/db.php';
    require '../../../config/config.php';

    if(isset($_GET['delete'])){
        $aid = $_GET['delete'];

        if (filter_var($aid, FILTER_VALIDATE_INT) === false) {
            exit("Invalid input");
        }

        

        $sql3 = $pdo->prepare("DELETE FROM favoritos WHERE pid IN (SELECT pid FROM procesos WHERE aid = ?)");
        $sql4 = $pdo->prepare("DELETE FROM votos WHERE pid IN (SELECT pid FROM procesos WHERE aid = ?)");
        $sql5 = $pdo->prepare("DELETE FROM report_proposal WHERE pid IN (SELECT pid FROM procesos WHERE aid = ?)");
        $sql1 = $pdo->prepare("DELETE FROM participaciones WHERE pid IN (SELECT pid FROM procesos WHERE aid = ?)");
        $sql8 = $pdo->prepare("DELETE FROM fases WHERE pid IN (SELECT pid FROM procesos WHERE aid = ?)");
        $sql2 = $pdo->prepare("DELETE FROM procesos WHERE aid = ?");
        $sql6 = $pdo->prepare("DELETE FROM ambitos WHERE aid = ?");
        

        // bind the parameters and execute the queries
        
        $sql3->execute([$aid]);
        $sql4->execute([$aid]);
        $sql5->execute([$aid]);
        $sql1->execute([$aid]);
        $sql8->execute([$aid]);
        $sql2->execute([$aid]);
        $sql6->execute([$aid]);
        
       
        $sql1->closeCursor();
        $sql2->closeCursor();
        $sql3->closeCursor();
        $sql4->closeCursor();
        $sql5->closeCursor();
        $sql8->closeCursor();
        $sql6->closeCursor();

        header("Location: ../../ambitos.php");
        exit();
    }
?>