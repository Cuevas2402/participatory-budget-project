<?php
    session_start();
    if(isset($_SESSION['pid'])){
        if(isset($_POST['titulo']) && isset($_POST['distrito']) && isset($_POST['descripcion'])){
            if(isset($_FILES['img'])){
                $errors= array();
                $file_name = $_FILES['img']['name'];
                $file_size =$_FILES['img']['size'];
                $file_tmp =$_FILES['img']['tmp_name'];
                $file_type=$_FILES['img']['type'];    
                $file_ext=strtolower(end(explode('.',$_FILES['img']['name'])));

                $extensions= array("jpeg","jpg","png");

                if(in_array($file_ext,$extensions)=== false || $file_size > 5242880 ){
                    header("Location: ../index.php?registrado=false");
                    exit(); 
                }else{
                    $upload_dir = "../uploads/"; 
                    $upload_path = $upload_dir . $file_name; 
                    move_uploaded_file($file_tmp, $upload_path); 
                    header("Location: ../index.php?registrado=true");
                    exit(); 
                }
            }
        }else{
            header("Location: ../components/404.php");
            exit(); 
        }
    }else{
        header("Location: ../components/404.php");
        exit();
    }


?>