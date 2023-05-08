<?php
    require '../config/db.php';
    require '../config/config.php'; 
    session_start();
    
    if(isset($_SESSION['id']) && isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['telefono'])){

        $temp = hash_hmac('sha1', $_SESSION['id'], KEY_PERFIL );
        // Validar que el nombre no este en uso
        $sql = $pdo->prepare("SELECT COUNT(uid) FROM usuarios WHERE nombre = ? and uid != ?");
        $sql->execute([$_POST['nombre'], $_SESSION['id']]);
        $row = $sql->fetch();
        $sql->closeCursor();
        if($row['COUNT(uid)'] > 0){
            header("Location: ../miCuenta.php?id=".$_SESSION['id']."&token=".$temp."&nombre=true");
            exit(); 
        }

        //Validar que el correo no este en uso
        $sql = $pdo->prepare("SELECT COUNT(uid) FROM usuarios WHERE correo = ? and uid != ?");
        $sql->execute([$_POST['correo'], $_SESSION['id']]);
        $row = $sql->fetch();
        $sql->closeCursor();
        if($row['COUNT(uid)'] > 0){
            header("Location: ../miCuenta.php?id=".$_SESSION['id']."&token=".$temp."&correo=true");
            exit();
        }


        if($_FILES['file']['error'] !== UPLOAD_ERR_NO_FILE){
            $errors= array();
            $upload_dir = "uploads/"; 
            $file_name = uniqid() . "_" . $_FILES['file']['name']; 
            $file_size = $_FILES['file']['size'];
            $file_tmp = $_FILES['file']['tmp_name'];
            $file_type = $_FILES['file']['type'];    
            $file_parts = explode('.', $_FILES['file']['name']);
            $file_ext = strtolower(end($file_parts));
        
            $extensions = array("jpeg","jpg","png");
        
            if(in_array($file_ext,$extensions) === false || $file_size > 209715200 ){
                header("Location: ../miCuenta.php?id=".$_SESSION['id']."&token=".$temp."&img=true");
                exit();
            } else {
                $upload_path = "../".$upload_dir . $file_name; 
                move_uploaded_file($file_tmp, $upload_path); 
                $sql = $pdo->prepare("UPDATE usuarios SET nombre=?, correo=?, telefono=?, img=? WHERE uid=?");
                $sql->execute([$_POST['nombre'], $_POST['correo'], $_POST['telefono'], $upload_dir . $file_name, $_SESSION['id']]);
                $sql->closeCursor();
                $_SESSION['nombre'] = $_POST['nombre'];
                header("Location: ../miCuenta.php?id=".$_SESSION['id']."&token=".$temp."&completado=true");
                exit(); 
            }
        }else{
            $sql = $pdo->prepare("UPDATE usuarios SET nombre=?, correo=?, telefono=? WHERE uid=?");
            $sql->execute([$_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_SESSION['id']]);
            $sql->closeCursor();
            $_SESSION['nombre'] = $_POST['nombre'];
            header("Location: ../miCuenta.php?id=".$_SESSION['id']."&token=".$temp."&completado=true");
            exit(); 
        }

    }else{
        header("Location: ../components/404.php");
        exit();
    }

?>