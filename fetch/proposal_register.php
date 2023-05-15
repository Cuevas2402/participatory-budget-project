<?php
    // 1 - Validar que el titulo de propuesta no esta
    // 2 - Validar el nombre de la imagen
    // 3 - Validar formato de imagen
    require '../config/db.php';
    require '../config/config.php'; 
    session_start();
    $pid = $_SESSION['pid'];
    $temp = hash_hmac('sha1', $pid, KEY_TOKEN);

    if(isset($_SESSION['pid'])){
        if(isset($_POST['titulo']) && isset($_POST['distrito']) && isset($_POST['descripcion'])){
            $sql = $pdo->prepare("SELECT COUNT(uid) FROM participaciones WHERE titulo_registro = ?");
            $sql->execute([$_POST['titulo']]);
            $row = $sql->fetch();
            $sql->closeCursor();
            //Validar que no haya titulos iguales
            if($row['COUNT(uid)'] > 0){
                header("Location: ../registrarPropuesta.php?id=".$pid."&token=".$temp."&titulo=false");
                exit();
            }
            
            if($_FILES['img']['error'] !== UPLOAD_ERR_NO_FILE){
                $errors= array();
                $upload_dir = "uploads/"; 
                $file_name = uniqid() . "_" . $_FILES['img']['name']; 
                $file_size = $_FILES['img']['size'];
                $file_tmp = $_FILES['img']['tmp_name'];
                $file_type = $_FILES['img']['type'];    
                $file_parts = explode('.', $_FILES['img']['name']);
                $file_ext = strtolower(end($file_parts));
            
                $extensions = array("jpeg","jpg","png");
            
                if(in_array($file_ext,$extensions) === false || $file_size > 5242880 || !getimagesize($file_tmp)){
                    header("Location: ../registrarPropuesta.php?id=".$pid."&token=".$temp."&img=false");
                    exit();
                } else {
                    $upload_path = "../".$upload_dir . $file_name; 
                    move_uploaded_file($file_tmp, $upload_path); 
                    $sql = $pdo->prepare("INSERT INTO participaciones (pid, uid, titulo_registro, propuesta, fecha_creacion, did, img, estatus) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                    $sql->execute([$_SESSION['pid'], $_SESSION['id'], $_POST['titulo'], $_POST['descripcion'], date('Y-m-d'), $_POST['distrito'], $upload_dir . $file_name, 'Pendiente']);
                    $sql->closeCursor();
                    unset($_SESSION['pid']);
                    var_dump($_SESSION);
                    header("Location: ../fichasActivas.php?id=".$pid."&token=".$temp."&completado=true");
                    exit(); 
                }
            }

            $sql = $pdo->prepare("INSERT INTO participaciones (pid, uid, titulo_registro, propuesta, fecha_creacion, did, estatus) VALUES (? , ? , ? , ? , ? , ?, ?)");
            $sql->execute([$_SESSION['pid'], $_SESSION['id'], $_POST['titulo'], $_POST['descripcion'], date('Y-m-d'), $_POST['distrito'], 'Pendiente']);
            $sql->closeCursor();
            unset($_SESSION['pid']);
            var_dump($_SESSION);
            header("Location: ../fichasActivas.php?id=".$pid."&token=".$temp."&completado=true");
            exit();

        }else{
            header("Location: ../components/404.php");
            exit(); 
        }
    }else{
        header("Location: ../components/404.php");
        exit();
    }


?>