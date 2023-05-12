<?php
    require '../../config/db.php';
    require '../../config/config.php';
    session_start();

    $db = new Database();
    $pdo = $db -> connect();

    $user = $_POST['user'];
	$pwd = $_POST['password'];

    $sql = $pdo->prepare("SELECT COUNT(*) AS validar, permiso AS access FROM usuarios WHERE correo = ? AND contraseña = ?");
    $sql->execute([$user,$pwd]);
    $resultado = $sql->fetch(PDO::FETCH_ASSOC);

    if ($resultado['validar']>0){ // Existencia de usuarios
        if ($resultado['access'] != 1){ // Usuarios sin permisos de administrador
            echo'<script type="text/javascript">
            alert("Este usuario no tiene permisos de administrador. Por favor intente de nuevo.");
            window.location.href="../login.php";
            </script>';
        }
        else { // Usuario con permisos de administrador
            $_SESSION['usr'] = $user;
            header("Location: ../ambitos.php");
        }
    }
    else { // Usuario inexistente
        echo'<script type="text/javascript">
            alert("Usuario inexistente o datos incorrectos. Intente de nuevo.");
            window.location.href="../login.php";
            </script>';
    }
?>