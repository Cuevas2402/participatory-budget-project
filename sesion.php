<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Ayuda</title>

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
      <!-- Leaflet-->
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin=""/>
      <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
	  <!-- JQuery -->
	  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

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
					<a class="nav-link" style="color: black;" href="index.php">Inicio</a>
				</li>
				<li class="nav-item mx-5">
					<a class="nav-link" href="participa.php">Participa</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="ayuda.php">Ayuda</a>
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
	
	<!-- End Navbar -->
      
	<div class="container d-flex justify-content-center text-center" style="margin-top: 5%;">
		<h2 style="font-weight: 600;">INICIAR SESIÓN </h2>
	</div>

	<div class="container mt-5">
		<div class="container form-div d-flex justify-content-center" style="margin-top: 3%; width: 70%;">
			<form class="needs-validation" style="width: 75%;" action="fetch/log.php" method="POST" id="form" novalidate>
				<div class="form-group f-register"  >
					<div>
						<label class="label-register">Correo Electrónico *</label>
						<input type="email" class="form-control w-100" name="email" id="email" placeholder="jose.gallegos@udem.edu" required>
						<div class="valid-feedback">
							Todo bien
						</div>
						<div class="invalid-feedback">
							Campo Obligatorio
						</div>
						</div>

						<div>
						<label class="label-register">Contraseña *</label>
						<input type="password" class="form-control w-100" name="password" id="password" placeholder="Contraseña" required>
						<div class="valid-feedback">
							Todo bien
						</div>
						<div class="invalid-feedback">
							Campo Obligatorio
						</div>
						</div>
						<p class="mt-2"><input type="checkbox"> Recuérdame </p>
						<center><button class="process-featured-button-2-large mt-4" type="submit">INICIAR SESIÓN</button></center>

						<div class="container mt-4">
							<center><p style="font-weight: 300;">¿Olvidaste tu contraseña?</p>
						<a href="">Recuperar Contraseña</a></center>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- MODALES -->

		<!-- MODAL EXITO -->
		<div class="modal fade" id="exito" tabindex="-1" role="dialog" aria-labelledby="exitoLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exitolLabel">Registro exitoso</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Puedes comenzar a participar en procesos y votar por propuestas 🥳
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>
		<!-- FIN MODAL EXITO-->


		<!-- MODAL CREDENCIALES -->
		<div class="modal fade" id="credenciales" tabindex="-1" role="dialog" aria-labelledby="credencialesLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="credencialeslLabel">Credenciales Incorrectas </h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Los datos que ingresaste no concuerdan 😰
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>
		<!-- FIN MODAL CREDENCIALES-->


		<!-- MODAL CORREO -->
		<div class="modal fade" id="correo" tabindex="-1" role="dialog" aria-labelledby="correoLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="correoLabel">Correo no registrado</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						El correo que ingreso no se encuentra registrado en la pagina 😬
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>
		<!-- FIN MODAL CORREO-->


	<!-- FIN MODALES -->

	<!-- CODIGO PARA DESPLEGAR MODALES -->
	<?php
		
		if (isset($_GET['exito']) && $_GET['exito'] === 'true') {
			?>
				<script>
					$(document).ready(function() {
						$('#exito').modal('show');
					});
				</script>
			<?php
		}

		if (isset($_GET['credenciales']) && $_GET['credenciales'] === 'true') {
			?>
				<script>
					$(document).ready(function() {
						$('#credenciales').modal('show');
					});
				</script>
			<?php
		}

		if (isset($_GET['correo']) && $_GET['correo'] === 'true') {
			?>
				<script>
					$(document).ready(function() {
						$('#correo').modal('show');
					});
				</script>
			<?php
		}

	?>

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
      <script src="js/script.js"></script>
    </body>
</html>
  