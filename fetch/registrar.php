<?php
    require '../config/config.php';
    require '../config/db.php';

    if(isset($_POST['nombre']) && isset($_POST['telefono']) && isset($_POST['email']) && isset($_POST['contraseña']) ){
        $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING); 
        $sql = $pdo->prepare("SELECT usuarios.* FROM usuarios WHERE nombre LIKE ?");
        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
        $count = $sql->rowCount();
        if($count == 0){
            
        }
    }else{
        echo 'Error faltaron datos';
    }

?>