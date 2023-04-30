<?php
    require '../config/config.php';
    require '../config/db.php';
    error_log($_POST['nombre']);
    error_log($_POST['telefono']);
    error_log($_POST['email']);
    $contrasena = $_POST['contrasena'];

    error_log($_POST['contrasena']);
    //  && isset($_POST['telefono']) && isset($_POST['email']) && isset($_POST['contrasena'])
    if(isset($_POST['nombre']) && isset($_POST['telefono']) && isset($_POST['email']) && isset($_POST['contrasena'])){
        //echo '<script>alert("sE PUEDIERON INSERTAR DATOS");</script>';
        $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
        $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_NUMBER_INT);
        $correo = $_POST['email'];
        $contrasena = filter_var($_POST['contrasena'], FILTER_SANITIZE_STRING);
        $contrasena = hash_hmac('sha1', $contrasena, KEY_PASS );
        $fecha = date('Y-m-d');
        $sql = $pdo->prepare("SELECT usuarios.* FROM usuarios WHERE nombre LIKE ?");
        $sql->execute([$nombre]);
        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
        $count = $sql->rowCount();
        $sql->closeCursor();
        $permiso = 0;

        if($count == 0){

            $sql = $pdo->prepare("SELECT usuarios.* FROM usuarios WHERE correo LIKE ?");
            $sql->execute([$correo]);
            $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
            $count = $sql->rowCount();
            $sql->closeCursor();

            if($count == 0){

                $sql = $pdo->prepare("INSERT INTO usuarios (nombre , contraseña , telefono , permiso , correo , fecha_creacion) VALUES ( ? , ? , ? , ? , ? , ?)");
                $sql->execute([$nombre, $contrasena, $telefono, $permiso , $correo , $fecha ]);
                $sql->closeCursor();
                header("Location: ../registrarse.php?exito=true");
                exit();

            }else{

                header("Location: ../registrarse.php?correoenUso=true");
                exit();

            }
               
        }else{

            header("Location: ../registrarse.php?nombreEnUso=true");
            exit();
        
        }

    }else{

        echo 'Error faltaron datos';

    }

?>