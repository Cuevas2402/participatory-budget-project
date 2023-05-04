<?php
    require '../config/db.php';
    require '../config/config.php'; 
    session_start();
    
    if(isset($_SESSION['id']) && isset($_POST['id'])) {
        $sql = $pdo->prepare("SELECT COUNT(uid) FROM participaciones WHERE uid = ? AND pid = ?");
        $sql->execute([$_SESSION['id'], $_POST['id']]);
        $row = $sql->fetch();
        $sql->closeCursor();
        
        if($row['COUNT(uid)'] == 0){
            
            header("Content-Type: application/json");
            echo json_encode(array("condicion" => 3));
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
