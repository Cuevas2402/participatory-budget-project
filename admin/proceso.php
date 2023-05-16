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

    $sql = $pdo->prepare("SELECT * FROM procesos;");
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
                    <li class="list-group-item p-0"><a class="active nav-link p-3" aria-current="page">Procesos</a></li>
                    <li class="list-group-item p-0"><a class="nav-link p-3" href="report_proposals.php">Reportes Propuestas</a></li>
                    <li class="list-group-item p-0"><a class="nav-link p-3" href="report_users.php">Reportes Usuarios</a></li>
                    <li class="list-group-item p-0"><a class="nav-link p-3" href="usuarios.php">Usuarios</a></li>
                </ul>
            </center>
            <form action="logout.php">
                <center><button type="submit" class="btn btn-secondary">Cerrar sesión</button></center>
            </form>
        </div>

        <center><h4 class="mb-5">Procesos</h4></center>

        <button type="button" class="btn btn-success float-end col-2 mx-auto" id="add">Añadir</button>
        <br><br>
        
        <div class="add">
            <center><h5>Añadir proceso</h5></center>
            <br>
            
            <form action="fetch/processes/add-process.php">
                <label for="title" class="form-label mb-0">Título</label>
                <input type="text" class="form-control mb-4" name="title">

                <label for="subtitle" class="form-label mb-0">Subtítulo</label>
                <input type="text" class="form-control mb-4" name="subtitle">

                <label for="description" class="form-label mb-0">Descripción del proceso</label>
                <input type="text" class="form-control mb-4" name="description">

                <label for="description_c" class="form-label mb-0">Descripción breve</label>
                <input type="text" class="form-control mb-4" name="description_c">

                <label for="opens" class="form-label mb-0">Fecha de inicio</label>
                <input type="date" class="form-control mb-4" name="opens">

                <label for="closes" class="form-label mb-0">Fecha de finalización</label>
                <input type="date" class="form-control mb-4" name="closes">

                <label for="ambit" class="form-label mb-0">Ámbito</label>
                <select class="form-select mb-4" name="ambit">
                    <option selected>Seleccione una opción</option>
                    <?php 
                        $nc = $db -> connect();
                        $ambitos = $nc->prepare("SELECT * FROM ambitos;");
                        $ambitos->execute();
                        $resultados = $ambitos->fetchAll();

                        foreach ($resultados as $resultado){
                    ?>
                    <option value="<?=$resultado['aid']?>"><?php echo $resultado ['nombre_ambito']; ?></option>
                    <?php } $ambitos->closeCursor(); ?>
                </select>

                <label for="select" class="form-label mb-0">Municipio</label>
                <select class="form-select mb-4" name="municipality">
                    <option selected>Seleccione una opción</option>
                    <?php 
                        $nc = $db -> connect();
                        $municipios = $nc->prepare("SELECT * FROM municipios;");
                        $municipios->execute();
                        $resultados = $municipios->fetchAll();

                        foreach ($resultados as $resultado){
                    ?>
                    <option value="<?=$resultado['mid']?>"><?php echo $resultado ['nombre_municipio']; ?></option>
                    <?php } $municipios->closeCursor(); ?>
                </select>

                <center>
                    <button type="submit" class="add-new btn btn-primary me-3">Añadir</button>
                    <button type="button" class="cancel btn btn-danger ms-3">Cancelar</button>
                </center>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-responsive table-striped w-auto">
                <tr>
                    <th>ID de proceso</th>
                    <th>Estado</th>
                    <th>Fase actual</th>
                    <th>Título</th>
                    <th>Subtítulo</th>
                    <th>Descripción</th>
                    <th>Descripción del proceso</th>
                    <th>Fecha de inicio</th>
                    <th>Fecha de terminación</th>
                    <th>Ámbito perteneciente</th>
                    <th>Municipio perteneciente</th>
                    <th>Operaciones</th>
                </tr>
                <?php foreach ($rows as $row){ ?>
                <tr>
                    <td><?php echo $row ['pid'];?></td>
                    <td><?php echo $row ['estatus'];?></td>
                    <td><?php echo $row ['fase_actual'];?></td>
                    <td><?php echo $row ['titulo_proceso'];?></td>
                    <td><?php echo $row ['subtitulo_proceso'];?></td>
                    <td><?php echo $row ['descripcion_proceso'];?></td>
                    <td><?php echo $row ['descripcion_c_proceso'];?></td>
                    <td><?php echo $row ['fecha_inicio_proceso'];?></td>
                    <td><?php echo $row ['fecha_fin_proceso'];?></td>
                    <td><?php echo $row ['aid'];?></td>
                    <td><?php echo $row ['mid'];?></td>
                    <td>
                        <form action="fetch/processes/edit-process.php?edit=<?=$row['pid'];?>" method="POST" class="d-inline">
                            <button type="submit" class="edit btn btn-primary col-12 mx-auto" id="edit" value="<?=$row['pid'];?>">Modificar</button>
                        </form>
                        <br><br>
                        <form action="fetch/processes/delete-process.php?delete=<?=$row['pid'];?>" method="POST" class="d-inline" onsubmit="return confirm('Eliminar este proceso también eliminará todas sus participaciones. ¿Desea continuar?');">
                            <button type="submit" class="delete btn btn-danger col-12 mx-auto">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php } $sql->closeCursor(); ?>
            </table>
        </div>
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