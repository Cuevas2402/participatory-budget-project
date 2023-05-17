<?php
    require '../config/db.php';
    require '../config/config.php';

    session_start();
    if(!isset($_SESSION['usr'])){
        header('Location: login.php');
    }
    $usuario = $_SESSION['usr'];

    $db = new Database();
    $pdo = $db -> connect();

    $sql = $pdo->prepare("SELECT * FROM report_user");
    $sql->execute();
    $rows = $sql->fetchAll();
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
    <body>
        <div class="nav-bar">
            <div class="pt-5 pb-4">
                <center><h6 class="p-0">Sesión iniciada como:</h6></center>
                <center><p><?php echo $usuario ?></p>
            </div> 
            
            <center>
                <ul class="list-group list-group-flush mb-5">
                    <li class="list-group-item p-0"><a class="nav-link p-3" href="ambitos.php">Ambitos</a></li>
                    <li class="list-group-item p-0"><a class="nav-link p-3" href="distrito.php">Distrito</a></li>
                    <li class="list-group-item p-0"><a class="nav-link p-3" href="municipios.php">Municipios</a></li>
                    <li class="list-group-item p-0"><a class="nav-link p-3" href="participaciones.php">Participaciones</a></li>
                    <li class="list-group-item p-0"><a class="nav-link p-3" href="proceso.php">Procesos</a></li>
                    <li class="list-group-item p-0"><a class="nav-link p-3" href="report_proposals.php">Reportes Propuestas</a></li>
                    <li class="list-group-item p-0"><a class="nav-link p-3 active" aria-current="page">Reportes Usuarios</a></li>
                    <li class="list-group-item p-0"><a class="nav-link p-3" href="usuarios.php">Usuarios</a></li>
                </ul>
            </center>
            <form action="logout.php">
                <center><button type="submit" class="btn btn-secondary">Cerrar sesión</button></center>
            </form>
        </div>

        <center><h4 class="mb-5">Reportes de Usuarios</h4></center>

        <table class="table table-bordered table-striped">
            <tr>
                <th>ID de usuario</th>
                <th>Descripcion del Reporte</th>
                <th>Operaciones</th>
            </tr>
            <?php foreach ($rows as $row){ ?>
            <tr>
                <td class="col-md-4"><?php echo $row ['uid'];?></td>
                <td class="col-md-4"><?php echo $row ['reporte'];?></td>
                <td class="col-md-4 text-center">
                    <form action="fetch/users/delete-user.php?delete=<?=$row['uid'];?>" method="POST" class="d-inline" onsubmit="return confirm('Eliminar este usuario también eliminará todas sus participaciones. ¿Desea continuar?');">
                        <button type="submit" class="delete btn btn-danger col-6 mx-auto">Eliminar usuario</button>
                    </form>
                </td>
            </tr>
            <?php } $sql->closeCursor(); ?>
        </table>
    </body> 
    <script>
        $.fn.slideFadeToggle = function(easing, callback) {
            return this.animate({ opacity: 'toggle', height: 'toggle' }, 'fast', easing, callback);
        };

        
        
    </script>
</html>