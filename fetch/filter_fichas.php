<?php
    require '../config/config.php';
    require '../config/db.php';
    if(isset($_POST['datos']) ){
        /*$datos = $_POST['datos'];
        $query = "SELECT * FROM participaciones, usuarios, distritos WHERE usuarios.uid = participaciones.uid and distritos.did = participaciones.did AND ("
        for ($i = 0; $i < count($datos); $i++) {
            if($i == 0){
                $query.= "participaciones.pid = '$datos[$i]'";
            }else{
                $query .= " OR participaciones.pid = '$datos[$i]'";
            }
        }

        
            
        $sql = $pdo->prepare($query.")");
        $sql->execute();
        $rows = $sql->fetchAll();
        foreach($rows as $row){

            require '../components/card_ficha.php';

        }*/

        $datos = $_POST['datos'];
        $placeholders = implode(',', array_fill(0, count($datos), '?'));
        $query = "SELECT * FROM participaciones, usuarios, distritos WHERE usuarios.uid = participaciones.uid and distritos.did = participaciones.did AND participaciones.pid IN ($placeholders)";
        $params = $datos;

        $sql = $pdo->prepare($query);
        $sql->execute($params);
        $rows = $sql->fetchAll();
        foreach($rows as $row){
            require '../components/card_ficha.php';
        }
        print_r($datos);
        

        
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