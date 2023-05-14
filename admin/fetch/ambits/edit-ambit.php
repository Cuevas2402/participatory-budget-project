<?php
    session_start();
    if(!isset($_SESSION['usr'])){
        header('Location: login.php');
    }

?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Stylesheet CSS -->
        <link rel="stylesheet" href="../../admin.css">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <!-- Letra -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,regular,italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" />
        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    </head>

    <?php $id = $_GET['edit'];?>

    <div class="container mt-5">
        <center><h5>Modificar ambito #<?php echo $id;?></h5></center>
        <br>
        <form action="edit.php">
            <input type="hidden" name="ambit_id" id="edit-ambit-id" value="<?=$id;?>">

            <label for="name" class="form-label mb-0">Nuevo nombre</label>
            <input type="text" class="form-control mb-4" name="name"> 

            <center>
                <button type="submit" class="update btn btn-primary me-3">Actualizar</button>
                <form action="../ambitos.php">
                    <button type="submit" class="cancel-edit btn btn-danger ms-3">Cancelar</button>
                </form>
            </center>
        </form>
    </div>
</html>