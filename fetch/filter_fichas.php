<?php
    require '../config/config.php';
    require '../config/db.php';
    if(isset($_POST['datos']) ){
        $datos = $_POST['datos'];

        $placeholders = implode(',', array_fill(0, count($datos), '?'));
        $query = "SELECT * FROM participaciones, usuarios, distritos WHERE usuarios.uid = participaciones.uid and distritos.did = participaciones.did AND participaciones.did IN ($placeholders)";
        $params = $datos;

        $sql = $pdo->prepare($query);
        $sql->execute($params);
        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach($rows as $row){
            require '../components/card_ficha.php';
        }
        $sql -> closeCursor();
        

        
    }else{
        $id = $_POST['id'];
        $sql = $pdo->prepare("SELECT * FROM participaciones, usuarios, distritos WHERE participaciones.pid = '$id' AND usuarios.uid = participaciones.uid and distritos.did = participaciones.did");
        $sql->execute();
        $rows = $sql->fetchAll();
        foreach($rows as $row){

            require '../components/card_ficha.php';

        }

                                    
    }
?>