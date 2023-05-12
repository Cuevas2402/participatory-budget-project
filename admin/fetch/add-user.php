<?php
    require '../../config/db.php';
    require '../../config/config.php';

    $db = new Database();
    $pdo = $db -> connect();

    $nombre = filter_var($_GET['name'], FILTER_SANITIZE_STRING);
	$pwd = filter_var($_GET['password'], FILTER_SANITIZE_STRING);
	$telefono = filter_var($_GET['phone'], FILTER_SANITIZE_STRING);
    $tipo = ($_GET['type']);
	$correo = filter_var($_GET['mail'], FILTER_SANITIZE_STRING);

	$sql = $pdo->prepare("INSERT INTO usuarios (nombre, contraseña, telefono, permiso, correo) VALUES (?,?,?,?,?)");
    $sql->execute([$nombre, $pwd, $telefono, $tipo, $correo]);

    $sql->closeCursor();

    header("Location: ../usuarios.php");
    exit();
?>