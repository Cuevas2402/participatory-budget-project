<?php
    require '../config/db.php';
    require '../config/config.php'; 
    session_start();
    
    if(isset($_SESSION['id']) && isset($_POST['id'])) {
        $sql = $pdo->prepare("SELECT * FROM participaciones WHERE uid = ? AND pid = ?");
        $sql->execute([$_SESSION['id'], $_POST['id']]);
        $sql->closeCursor();
        
        if(){
            
            header("Content-Type: application/json");
            echo json_encode(array("condicion" => true));
        }else{
            header("Content-Type: application/json");
            echo json_encode(array("condicion" => 2));
        }
        
    } else {
        header("Content-Type: application/json");
        echo json_encode(array("condicion" => 1));
    }
    exit();
?>
