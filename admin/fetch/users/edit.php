<?php
    require '../../../config/db.php';
    require '../../../config/config.php';

    $db = new Database();
    $pdo = $db -> connect();

    $id = $_GET['user_id'];
    $nom = filter_var($_GET['name'], FILTER_SANITIZE_STRING);
	$pwd = filter_var($_GET['password'], FILTER_SANITIZE_STRING);
	$tel = filter_var($_GET['phone'], FILTER_SANITIZE_STRING);
    $tipo = ($_GET['type']);
	$email = filter_var($_GET['mail'], FILTER_SANITIZE_STRING);

    if ($nom != '' && $pwd != '' && $tel != '' && $tipo != '' && $email != ''){
        $sql = $pdo->prepare("UPDATE usuarios SET nombre = ?, contraseña = ?, telefono = ?, permiso = ?, correo = ? WHERE uid = ?;");
        $sql->execute([$nom, $pwd, $tel, $tipo, $email, $id]);
        $sql->closeCursor();
    }

    header("Location: ../../usuarios.php");
    exit();
?>