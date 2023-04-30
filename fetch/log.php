<?php
    require '../config/config.php';
    require '../config/db.php';
    if(isset($_POST['email']) && isset($_POST['password'])){

        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $sql = $pdo->prepare("SELECT usuarios.* FROM usuarios WHERE correo = ?");
        $sql->execute([$email]);
        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
        $count = $sql->rowCount();
        $sql->closeCursor();
        if($count > 0 ){

            /* Inicio ejecutar consulta */
            $sql = $pdo->prepare("SELECT usuarios.* FROM usuarios WHERE correo = ? AND contraseña = ? ");
            $sql->execute([$email, hash_hmac('sha1', $password, KEY_PASS)]);
            $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
            $count = $sql->rowCount();
            $sql->closeCursor();
            /* Ejecutar consulta */
            
            if($count > 0){
                if(!isset($_SESSION)){ 
                    session_start(); 
                }
                
                $_SESSION['id'] = $row['uid'];
                $_SESSION['nombre'] = $row['nombre']; 


                header("Location: ../sesion.php?exito=true");
                exit();

            }else{

                header("Location: ../sesion.php?credenciales=true");
                exit();

            }
            
        }else{

            header("Location: ../sesion.php?correo=true");
            exit();

        }
    }else{

        header("Location: ../components/404.php");
        exit();

    }

?>