<?php
    require '../../../config/db.php';
    require '../../../config/config.php';

    $db = new Database();
    $pdo = $db -> connect();

    $titulo = filter_var($_GET['title'], FILTER_SANITIZE_STRING);
    $subtitulo = filter_var($_GET['subtitle'], FILTER_SANITIZE_STRING);
    $descripcion = filter_var($_GET['description'], FILTER_SANITIZE_STRING);
    $descripcion_corta = filter_var($_GET['description_c'], FILTER_SANITIZE_STRING);
    $inicio = $_GET['opens'];
    $cierre = $_GET['closes'];
	$ambito = $_GET['ambit'];
    $municipio = $_GET['municipality'];

	$sql = $pdo->prepare("INSERT INTO procesos (titulo_proceso, subtitulo_proceso, descripcion_proceso, descripcion_c_proceso, fecha_inicio_proceso, fecha_fin_proceso, aid, mid) VALUES (?,?,?,?,?,?,?,?);");
    $sql->execute([$titulo,$subtitulo,$descripcion,$descripcion_corta,$inicio,$cierre,$ambito,$municipio]);

    $sql->closeCursor();

    header("Location: ../../proceso.php");
    exit();
?>