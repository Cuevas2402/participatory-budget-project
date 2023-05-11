<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERROR404</title>

    <!-- Stylesheet CSS -->
    <link rel="stylesheet" href="../css/template.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- Letra -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,regular,italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" />
    <!-- Icono -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Icono Redes Sociales -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
</head>

<body style="font-family: Roboto;">
    <!-- Start Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="../img/logo.png" style="width: 200px;" alt="LOGO"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mx-auto" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mx-auto mb-2 mb-lg-0 text-center">
                <li class="nav-item">
                    <a class="nav-link"  href="../index.php">Inicio</a>
                </li>
                <li class="nav-item mx-5">
                    <a class="nav-link" href="../participa.php">Participa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../ayuda.php">Ayuda</a>
                </li>
                </ul>
                <div class="text-center">
                    <a href="../registrarse.php"><button class="btn me-3 my-3 registra">Regístrate</button></a>
                    <a href="../sesion.php"><button class="btn ms-3 my-3 inicia">Inicia Sesión</button></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Start search bar-->

    <?php require 'search_bar.php'; ?>
    
    <div class="container-error" style="margin-bottom: 13.6rem;">
        <h1 class= "h1-error"> Error 404 </h1>
        <p class="p-error">Lo siento, la página que buscas no ha sido encontrada 💀 </p>
        <p class="p-error"> Por favor, comprueba que la URL es correcta.</p>
    </div>

    <!-- Start Footer -->
    <?php require 'footer.php'; ?>
    <!-- End Footer -->
</body>
</html>

