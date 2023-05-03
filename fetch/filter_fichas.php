<?php
    require '../config/config.php';
    require '../config/db.php';
    if(isset($_POST['datos']) ){
        $datos = $_POST['datos'];
        foreach($datos as $data){
            $sql = $pdo->prepare("SELECT * FROM participaciones, usuarios, distritos WHERE participaciones.pid = '$data' AND usuarios.uid = participaciones.uid and distritos.did = participaciones.did");
            $sql->execute();
            $rows = $sql->fetchAll();
            foreach($rows as $row){

                require '../components/card_ficha.php';

            }
        }
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