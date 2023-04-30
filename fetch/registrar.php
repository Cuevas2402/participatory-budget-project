<?php
    require '../config/config.php';
    require '../config/db.php';
    //  && isset($_POST['telefono']) && isset($_POST['email']) && isset($_POST['contrasena'])
    if(isset($_POST['nombre']) && isset($_POST['telefono']) && isset($_POST['email']) && isset($_POST['contrasena'])){
        //echo '<script>alert("sE PUEDIERON INSERTAR DATOS");</script>';
        $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
        $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_NUMBER_INT);
        $correo = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $contrasena = filter_var($_POST['contrasena'], FILTER_SANITIZE_STRING);
        $contrasena = hash_hmac('sha1', $contrasena, KEY_PASS );
        $fecha = date('Y-m-d');
        $sql = $pdo->prepare("SELECT usuarios.* FROM usuarios WHERE nombre LIKE ?");
        $sql->execute([$nombre]);
        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
        $count = $sql->rowCount();
        $permiso = 0;
        if($count == 0){
            /*$sql = $pdo->prepare("INSERT INTO usuarios (nombre , contraseña , telefono , permiso , correo , fecha_creacion) VALUES (:nombre, :contraseña, :telefono, :permiso, :correo, :fecha)");

            // Bind de parámetros
            $sql->bindParam(':nombre', $nombre);
            $sql->bindParam(':contraseña', $contrasena);
            $sql->bindParam(':telefono', $telefono);
            $sql->bindParam(':correo', $correo);
            $sql->bindParam(':permiso', 0);
            $sql->bindParam(':fecha_creacion', $fecha);*/
            $sql = $pdo->prepare("INSERT INTO usuarios (nombre , contraseña , telefono , permiso , correo , fecha_creacion) VALUES ( ? , ? , ? , ? , ? , ?)");

            if ($sql->execute([$nombre, $contrasena, $telefono, $correo, $permiso, $fecha ]) && $sql->rowCount() > 0) {
                echo '<script>alert("Registro Exitoso");</script>';
            }else{
                echo '<script>alert("Registro No Exitoso");</script>';
            }
            
        }else{
            echo '<script>alert("ese nombre ya esta agarrado");</script>';
        }
    }else{
        echo 'Error faltaron datos';
    }

?>