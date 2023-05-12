<?php
    require '../../../config/db.php';
    require '../../../config/config.php';

    $db = new Database();
    $pdo = $db -> connect();

    $proceso = $_GET['process'];
    $usuario = $_GET['user'];
    $titulo = filter_var($_GET['title'], FILTER_SANITIZE_STRING);
	$propuesta = filter_var($_GET['proposal'], FILTER_SANITIZE_STRING);
    $district = $_GET['district'];

    $sql = $pdo->prepare("SELECT COUNT(*) AS validar FROM participaciones WHERE pid = ? AND uid = ?");
    $sql->execute([$proceso,$usuario]);
    $resultado = $sql->fetch(PDO::FETCH_ASSOC);

    if ($resultado['validar']>0){ // El usuario ya participo previamente en el proceso
        echo'<script type="text/javascript">
        alert("El usuario ya participó en este proceso.");
        window.location.href="../../participaciones.php";
        </script>';
    }
    
    $sql = $pdo->prepare("INSERT INTO participaciones (pid, uid, titulo_registro, propuesta, did) VALUES (?,?,?,?,?);");
    $sql->execute([$proceso,$usuario,$titulo,$propuesta,$district]);

    $sql->closeCursor();

    header("Location: ../../participaciones.php");
    exit();
?>