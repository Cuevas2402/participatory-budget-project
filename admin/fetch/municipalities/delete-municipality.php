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
        $mid = $_GET['delete'];

        if (filter_var($mid, FILTER_VALIDATE_INT) === false) {
            exit("Invalid input");
        }

        /*$sql = $pdo->prepare("DELETE FROM participaciones, procesos, favoritos , votos, report_proposal WHERE procesos.mid =  ? AND procesos.mid = municipios.mid AND participaciones.pid = procesos.pid AND favoritos.pid = procesos.pid AND participaciones.pid = votos.pid AND participaciones.pid = report_proposal.pid AND distritos.mid = municipios.mid");
        $sql->execute([$id]);
        $sql->closeCursor();


        $sql = $pdo->prepare("DELETE FROM municipios, distritos WHERE municipios.mid =  ? AND municipios.mid = distritos.mid ");
        $sql->execute([$id]);
        $sql->closeCursor();*/

        
        
        $sql3 = $pdo->prepare("DELETE FROM favoritos WHERE pid IN (SELECT pid FROM procesos WHERE mid = ?)");
        $sql4 = $pdo->prepare("DELETE FROM votos WHERE pid IN (SELECT pid FROM procesos WHERE mid = ?)");
        $sql5 = $pdo->prepare("DELETE FROM report_proposal WHERE pid IN (SELECT pid FROM procesos WHERE mid = ?)");
        $sql1 = $pdo->prepare("DELETE FROM participaciones WHERE pid IN (SELECT pid FROM procesos WHERE mid = ?)");
        $sql8 = $pdo->prepare("DELETE FROM fases WHERE pid IN (SELECT pid FROM procesos WHERE mid = ?)");
        $sql2 = $pdo->prepare("DELETE FROM procesos WHERE mid = ?");
        $sql6 = $pdo->prepare("DELETE FROM distritos WHERE mid = ?");
        $sql7 = $pdo->prepare("DELETE FROM municipios WHERE mid = ?");

        // bind the parameters and execute the queries
        
        $sql3->execute([$mid]);
        $sql4->execute([$mid]);
        $sql5->execute([$mid]);
        $sql1->execute([$mid]);
        $sql8->execute([$mid]);
        $sql2->execute([$mid]);
        $sql6->execute([$mid]);
        $sql7->execute([$mid]);
       
        $sql1->closeCursor();
        $sql2->closeCursor();
        $sql3->closeCursor();
        $sql4->closeCursor();
        $sql5->closeCursor();
        $sql6->closeCursor();
        $sql7->closeCursor();
        $sql8->closeCursor();

        
        header("Location: ../../municipios.php");
        exit();
    }
?>