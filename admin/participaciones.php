<?php
    require '../config/db.php';
    require '../config/config.php';

    session_start();
    $usuario = $_SESSION['usr'];

    $db = new Database();
    $pdo = $db -> connect();

    $sql = $pdo->prepare("SELECT * FROM participaciones;");
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
    <style>
        body {
            margin-top: 2.5% !important;
            margin-left: 22% !important;
            margin-right: 2% !important;
        }
    </style>

    <body>
        <div class="nav-bar">
            <center><h6>Sesión iniciada como:<br><?php echo $usuario ?></h6></center>
            
            <center>
                <ul class="list-group list-group-flush mb-5">
                    <li class="list-group-item p-0"><a class="nav-link p-3" href="ambitos.php">Ambitos</a></li>
                    <li class="list-group-item p-0"><a class="nav-link p-3" href="distrito.php">Distrito</a></li>
                    <li class="list-group-item p-0"><a class="nav-link p-3" href="municipios.php">Municipios</a></li>
                    <li class="list-group-item p-0"><a class="active nav-link p-3" aria-current="page">Participaciones</a></li>
                    <li class="list-group-item p-0"><a class="nav-link p-3" href="proceso.php">Procesos</a></li>
                    <li class="list-group-item p-0"><a class="nav-link p-3" href="usuarios.php">Usuarios</a></li>
                </ul>
            </center>
            <form action="logout.php">
                <center><button type="submit" class="btn btn-secondary">Cerrar sesión</button></center>
            </form>
        </div>

        <center><h4>Participaciones</h4></center>
        <br>

        <button type="button" class="btn btn-success float-end" id="add">Añadir</button>
        <br><br>
        
        <div class="add">
            <center><h5>Añadir participación</h5></center>
            <br>
            
            <form action="fetch/participations/add-participation.php">
                <label for="select" class="form-label mb-0">Proceso</label>
                <select class="form-select mb-4" name="process">
                    <option selected>Seleccione una opción</option>
                    <?php 
                            $nc = $db -> connect();
                            $distritos = $nc->prepare("SELECT * FROM procesos;");
                            $distritos->execute();
                            $resultados = $distritos->fetchAll();

                            foreach ($resultados as $resultado){
                        ?>
                        <option value="<?=$resultado['pid']?>"><?php echo $resultado ['titulo_proceso']; ?></option>
                    <?php } $distritos->closeCursor(); ?>
                </select>

                <label for="select" class="form-label mb-0">Usuario</label>
                <select class="form-select mb-4" name="user">
                    <option selected>Seleccione una opción</option>
                    <?php 
                            $nc = $db -> connect();
                            $distritos = $nc->prepare("SELECT * FROM usuarios;");
                            $distritos->execute();
                            $resultados = $distritos->fetchAll();

                            foreach ($resultados as $resultado){
                        ?>
                        <option value="<?=$resultado['uid']?>"><?php echo $resultado ['nombre']; ?></option>
                    <?php } $distritos->closeCursor(); ?>
                </select>

                <label for="title" class="form-label mb-0">Título</label>
                <input type="text" class="form-control mb-4" name="title"> 

                <label for="proposal" class="form-label mb-0">Propuesta</label>
                <input type="text" class="form-control mb-4" name="proposal">

                <label for="select" class="form-label mb-0">Distrito</label>
                <select class="form-select mb-4" name="district">
                    <option selected>Seleccione una opción</option>
                    <?php 
                            $nc = $db -> connect();
                            $distritos = $nc->prepare("SELECT * FROM distritos;");
                            $distritos->execute();
                            $resultados = $distritos->fetchAll();

                            foreach ($resultados as $resultado){
                        ?>
                        <option value="<?=$resultado['did']?>"><?php echo $resultado ['nombre_distrito']; ?></option>
                    <?php } $distritos->closeCursor(); ?>
                </select>

                <center>
                    <button type="submit" class="add-new btn btn-primary me-3">Añadir</button>
                    <button type="button" class="cancel btn btn-danger ms-3">Cancelar</button>
                </center>
            </form>
        </div>

        <table class="table table-striped">
            <tr>
                <th>ID de proceso</th>
                <th>ID de usuario</th>
                <th>Título</th>
                <th>Propuesta</th>
                <th>Fecha de creación</th>
                <th>ID de distrito</th>
                <th>Operaciones</th>
            </tr>
            <?php foreach ($rows as $row){ ?>
            <tr>
                <td><?php echo $row ['pid'];?></td>
                <td><?php echo $row ['uid'];?></td>
                <td><?php echo $row ['titulo_registro'];?></td>
                <td><?php echo $row ['propuesta'];?></td>
                <td><?php echo $row ['fecha_creacion'];?></td>
                <td><?php echo $row ['did'];?></td>
                <td>
                    <form action="fetch/participations/edit-participation.php?process=<?=$row['pid'];?>&user=<?=$row['uid'];?>" method="POST" class="d-inline">
                        <button type="submit" class="edit btn btn-primary">Modificar</button>
                    </form>
                    
                    <form action="fetch/participations/delete-participation.php?process=<?=$row['pid'];?>&user=<?=$row['uid'];?>" method="POST" class="d-inline">
                        <button type="submit" class="delete btn btn-danger">Eliminar</button>
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

        function deselectAdd(e){
            $('.add').slideFadeToggle(function(){
                e.removeClass('selected');
            });
        }
        $(function(){
            $('#add').on('click',function(){
                if ($(this).hasClass('selected')){
                    deselectAdd($(this));
                } else {
                    $(this).addClass('selected');
                    $('.add').slideFadeToggle();
                }
                return false;
            });
            $('.cancel').on('click',function(){
                deselectAdd($('#add'));
                return false;
            });
        });
    </script>
</html>