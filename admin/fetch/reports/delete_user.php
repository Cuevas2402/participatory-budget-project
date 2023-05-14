<?php
    require '../../../config/db.php';
    require '../../../config/config.php';
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        if (filter_var($id, FILTER_VALIDATE_INT) === false) {
            exit("Invalid input");
        }
        //Eliminar votos
        
        $sql = $pdo->prepare("DELETE FROM votos WHERE voting = ? OR voted = ? ");
        $sql->execute([$id, $id]);
        $sql->closeCursor();


        //Eliminar participaciones
        $sql = $pdo->prepare("DELETE FROM participaciones WHERE uid = ?");
        $sql->execute([$id]);
        $sql->closeCursor();


        //Eliminar favoritos
        $sql = $pdo->prepare("DELETE FROM favoritos WHERE uid = ?");
        $sql->execute([$id]);
        $sql->closeCursor();

        //Eliminar Seguir
        $sql = $pdo->prepare("DELETE FROM seguir WHERE follow = ? OR followed = ?");
        $sql->execute([$id, $id]);
        $sql->closeCursor();

        //Eliminar reporte
        $sql = $pdo->prepare("DELETE FROM report_user WHERE uid = ?");
        $sql->execute([$id]);
        $sql->closeCursor();

        //Elimina Cuenta 
        $sql = $pdo->prepare("DELETE FROM usuarios WHERE uid = ?");
        $sql->execute([$id]);
        $sql->closeCursor();

        header("Location: ../../report_users.php");
        exit();
    }
?>