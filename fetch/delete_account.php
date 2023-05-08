<?php
    require '../config/db.php';
    require '../config/config.php'; 
    session_start();
    if(isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
        session_destroy();
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

        //Elimina Cuenta 
        $sql = $pdo->prepare("DELETE FROM usuarios WHERE uid = ?");
        $sql->execute([$id]);
        $sql->closeCursor();

        
        exit();
    }
?>