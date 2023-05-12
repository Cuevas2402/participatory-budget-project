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
        <center><h5>Modificar proceso #<?php echo $id;?></h5></center>
        <br>

        <form action="edit.php">
            <input type="hidden" name="process_id" id="edit-process-id" value="<?=$id;?>">

            <label for="title" class="form-label mb-0">Nuevo título</label>
            <input type="text" class="form-control mb-4" name="title">

            <label for="subtitle" class="form-label mb-0">Nuevo subtítulo</label>
            <input type="text" class="form-control mb-4" name="subtitle">

            <label for="description" class="form-label mb-0">Nueva descripción del proceso</label>
            <input type="text" class="form-control mb-4" name="description">

            <label for="description_c" class="form-label mb-0">Nueva descripción breve</label>
            <input type="text" class="form-control mb-4" name="description_c">

            <label for="opens" class="form-label mb-0">Nueva fecha de inicio</label>
            <input type="date" class="form-control mb-4" name="opens">

            <label for="closes" class="form-label mb-0">Nueva fecha de finalización</label>
            <input type="date" class="form-control mb-4" name="closes">

            <label for="ambit" class="form-label mb-0">Cambiar ámbito</label>
            <select class="form-select mb-4" name="ambit">
                <option selected>Seleccione una opción</option>
                <?php 
                    require '../../../config/db.php';
                    require '../../../config/config.php';
                    $db = new Database();
                    $nc = $db -> connect();
                    $ambitos = $nc->prepare("SELECT * FROM ambitos;");
                    $ambitos->execute();
                    $resultados = $ambitos->fetchAll();

                    foreach ($resultados as $resultado){
                ?>
                <option value="<?=$resultado['aid']?>"><?php echo $resultado ['nombre_ambito']; ?></option>
                <?php } $ambitos->closeCursor(); ?>
            </select>

            <label for="select" class="form-label mb-0">Cambiar municipio</label>
            <select class="form-select mb-4" name="municipality">
                <option selected>Seleccione una opción</option>
                <?php 
                    $sc = $db -> connect();
                    $municipios = $sc->prepare("SELECT * FROM municipios;");
                    $municipios->execute();
                    $resultados = $municipios->fetchAll();

                    foreach ($resultados as $resultado){
                ?>
                <option value="<?=$resultado['mid']?>"><?php echo $resultado ['nombre_municipio']; ?></option>
                <?php } $municipios->closeCursor(); ?>
            </select>
            <center>
                <button type="submit" class="update btn btn-primary me-3">Actualizar</button>
                <form action="../usuarios.php">
                    <button type="submit" class="cancel-edit btn btn-danger ms-3">Cancelar</button>
                </form>
            </center>
        </form>
    </div>
</html>