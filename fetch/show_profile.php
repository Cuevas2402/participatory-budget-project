<?php
    require '../config/db.php';
    require '../config/config.php';
    session_start();
    if(isset($_POST['dato']) && isset($_POST['id'])){
        
        if($_POST['dato'] == 1){

            $sql = $pdo->prepare("SELECT * FROM participaciones, usuarios, distritos WHERE usuarios.uid = ? AND  usuarios.uid = participaciones.uid and distritos.did = participaciones.did");
            $sql->execute([$_POST['id']]);
            $rows = $sql->fetchAll();
            foreach($rows as $row){
                require '../components/card_ficha.php';
            }
            $sql->closeCursor();
                            
        }else{
            if($_POST['dato'] == 2){
                $sql = $pdo->prepare("SELECT * FROM favoritos, usuarios, procesos, ambitos, municipios,fases WHERE usuarios.uid = ? AND  usuarios.uid = favoritos.uid AND favoritos.pid = procesos.pid AND  procesos.mid = municipios.mid AND procesos.aid = ambitos.aid AND procesos.pid = fases.pid AND procesos.fase_actual = fases.n_fase");
                $sql->execute([$_POST['id']]);
                $rows = $sql->fetchAll();
                foreach($rows as $row){

                    require '../components/card_proceso.php';

                }
                $sql->closeCursor();
            }else{
                if($_POST['dato'] == 3 || $_POST['dato'] == 4){
                    if($_POST['dato'] == 3){
                        $sql = $pdo->prepare("SELECT * FROM seguir, usuarios WHERE followed = ? AND usuarios.uid = seguir.follow ");
                    }else{
                        $sql = $pdo->prepare("SELECT * FROM seguir, usuarios WHERE follow = ? AND usuarios.uid = seguir.followed");
                    }

                    $sql->execute([$_POST['id']]);
                    $rows = $sql->fetchAll();
                    foreach($rows as $row){

                        require '../components/card_perfil.php';
                    }
                    $sql->closeCursor();
                }else{
                    header("Location: ../components/404.php");
                    exit(); 
                }
            }

        }

    }else{
        header("Location: /components/404.php");
        exit();
    }

?>
     



