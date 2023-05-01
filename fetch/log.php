<?php
    session_start();
    require '../config/config.php';
    require '../config/db.php';
    if(isset($_POST['email']) && isset($_POST['password'])){

        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $sql = $pdo->prepare("SELECT usuarios.* FROM usuarios WHERE correo = ?");
        $sql->execute([$email]);
        $count = $sql->rowCount();
        if($count > 0 ){

            /* Inicio ejecutar consulta */
            $sql = $pdo->prepare("SELECT usuarios.* FROM usuarios WHERE correo = ? AND contraseña = ? ");
            $sql->execute([$email, hash_hmac('sha1', $password, KEY_PASS)]);
            $count = $sql->rowCount();
            /* Ejecutar consulta */
            
            if($count > 0){
                
                $row = $sql->fetch(PDO::FETCH_ASSOC);
                $_SESSION['id'] = $row['uid'];
                $_SESSION['nombre'] = $row['nombre']; 


                header("Location: ../index.php?exito=true");
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