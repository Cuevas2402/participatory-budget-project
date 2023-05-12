<html>
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

    <?php $id = $_GET['edit'];?>

    <div class="container mt-5">
        <center><h5>Modificar usuario <?php echo $id;?></h5></center>
        <br>
        <form action="edit.php">
            <input type="hidden" name="user_id" id="edit-user-id" value="<?=$id;?>">

            <label for="name" class="form-label mb-0">Nuevo nombre</label>
            <input type="text" class="form-control mb-4" name="name"> 

            <label for="pwd" class="form-label mb-0">Nueva contraseña</label>
            <input type="password" class="form-control mb-4" name="password">

            <label for="phone" class="form-label mb-0">Nuevo teléfono</label>
            <input type="number" class="form-control mb-4" name="phone">

            <label for="select" class="form-label mb-0">Permisos</label>
            <select class="form-select mb-4" name="type">
                <option selected>Seleccione una opción</option>
                <option value="0">Sin permisos</option>
                <option value="1">Permisos de administrador</option>
            </select>

            <label for="mail" class="form-label mb-0">Nuevo correo electrónico</label>
            <input type="mail" class="form-control mb-4" name="mail">
            <center>
                <button type="submit" class="update btn btn-primary me-3">Actualizar</button>
                <form action="../usuarios.php">
                    <button type="submit" class="cancel-edit btn btn-danger ms-3">Cancelar</button>
                </form>
            </center>
        </form>
    </div>
</html>