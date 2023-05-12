<?php
    require '../config/db.php';
    require '../config/config.php';
    $db = new Database();
    $pdo = $db -> connect();
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Stylesheet CSS -->
        <link rel="stylesheet" href="admin.css">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <!-- Letra -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,regular,italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" />
        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    </head>
    <style>
        body {
            margin-left: 20%;
            margin-right: 20%;
        }
    </style>

    <center><h4 class="m-5">Iniciar sesión como administrador</h4></center>

    <form action="sessions/log-in.php" class="login p-4" method="POST">
        <div class="m-5">
            <label for="user" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" name="user" placeholder="Introduzca su correo electrónico">
        </div>

        <div class="m-5">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="password" placeholder="Introduzca su contraseña">
        </div>

        <center><button type="submit" class="btn btn-primary">Iniciar sesión</button></center>
    </form>
</html>