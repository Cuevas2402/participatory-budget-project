<?php
	require 'config/db.php';
	require 'config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario</title>

    <!-- Stylesheet CSS -->
    <link rel="stylesheet" href="css/template.css">
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
    <!-- Calendario -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>

    <!-- Agregar calendario-->
    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                events: 'fetch/events.php'
            });
        });
  </script>
</head>

<body style="font-family: Roboto;">
    <!-- Start Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
			<a class="navbar-brand" href="#"><img src="img/logo.png" style="width: 200px;" alt="LOGO"></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse mx-auto" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mx-auto mb-2 mb-lg-0 text-center">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Inicio</a>
				</li>
				<li class="nav-item mx-5">
					<a class="nav-link" href="participa.php">Participa</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="ayuda.php">Ayuda</a>
				</li>
                <li class=" mx-5 nav-item">
					<a class="nav-link  a-active" href="calendario.php">Calendario</a>
				</li>
				</ul>
				<!-- (Iniciar Sesión / Registrarse) o Sesion Inicada -->
				<?php require 'components/login.php' ?>
			</div>
        </div>
    </nav>
    <!-- Start search bar-->

	<?php require 'components/search_bar.php'; ?>
		
	<!-- End search bar-->
    <strong><p style="margin-top:4rem; text-align: center; margin-bottom: -4rem; font-weight: normal; font-size: 48px;">¡Descubre nuestros procesos activos!</p></strong>
	<!-- End Navbar -->
    
    <div class="container" style="margin-bottom: 8.6rem; margin-top:8rem">
        <div id='calendar'></div>
    </div>

    <!-- Start Footer -->
    <footer style="margin-bottom: -5rem;">
        <div class="footer-content" >
            <ul class="socials">
                <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
            </ul>
            <p><a href="http://" target="_blank">Términos y condiciones</a></p>
            <p><a href="http://" target="_blank">Descargar ficheros de datos abiertos</a></p>
        </div>
        <div class="footer-bottom">
            <p>Este programa es público, ajeno a cualquier partido político. Queda prohibido el uso para fines distintos a los establecidos en el Programa.</p>
        </div>
    </footer>
    <!-- End Footer -->
</body>
</html>

