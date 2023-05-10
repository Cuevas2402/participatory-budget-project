<?php
	session_start();
	if(isset($_SESSION['id']) && isset($_SESSION['nombre'])){
		header('Location: index.php');
		exit();
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

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

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
	<!-- POPPER.JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js" integrity="sha512-QCxgIH+YRz9tSvQ2hXFV7iMGyKp4o30a4qH1zZLkTkZiWpy9Xblb70wuPpGX7z0dFkj0V7Pw37ayEiK7fLQY6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
					<a class="nav-link" href="calendario.php">Calendario</a>
				</li>
				</ul>
				<div class="text-center">
                    <a href="registrarse.php"><button class="btn me-3 my-3 registra">Regístrate</button></a>
                    <a href="sesion.php"><button class="btn ms-3 my-3 inicia">Inicia Sesión</button></a>
                </div>
			</div>
		</div>
	</nav>
	<!-- Start search bar-->

	<?php require 'components/search_bar.php'; ?>
	
	<!-- End search bar-->

	<!-- End Navbar -->
	
	<div class="container d-flex justify-content-center text-center" style="margin-top: 5%;">
		<h2 style="font-weight: 600;">REGISTRATE </h2>
	</div>

	<div class="container  mensaje mt-5">
		<div class=" container form-div d-flex justify-content-center" style="margin-top: 3%; width: 70%;">
			<form class="form-r needs-validation" style="width: 75%;"  action="fetch/registrar.php" method="POST" id="form" novalidate>
				<div class="form-group f-register"  >
					<i><p style="font-weight: 500; color: #894B5D;"> * Los campos requeridos están marcados con un asterisco</p></i>

					<div>
						<label class="label-register">Tu nombre *</label>
						<small><i><small><p>Nombre público que aparecera en la pagina</p></small></i></small>
						<input type="nombre" class="nombre form-control w-100" name="nombre" id="nombre" placeholder="joseman" required>
						<div class="valid-feedback">
							Todo bien
						</div>
						<div class="invalid-feedback">
							Campo Obligatorio
						</div>
					</div>

					<div>
						<label class="label-register">Tu correo electrónico*</label>
						<input type="email" class="email form-control w-100" name="email" id="email" placeholder="jose.gallegos@udem.edu" required>
						<div class="valid-feedback">
							Todo bien
						</div>
						<div class="invalid-feedback">
							Campo Obligatorio
						</div>
					</div>

					<div>
						<label class="label-register">Número de Teléfono *</label>
						<input type="phone" class="telefono form-control w-100" name="telefono" id="telefono" placeholder="11111111111" required>
						<div class="valid-feedback">
							Todo bien
						</div>
						<div class="invalid-feedback">
							Campo Obligatorio
						</div>
					</div>

					<div>
						<label class="label-register">Contraseña *</label>
						<small><i><small><p>  Minimo 10 caracteres</p></small></i></small>
						<input type="password" class=" contrasena form-control w-100" name="contrasena" id="contrasena" placeholder="contraseña" required>
						<div class="valid-feedback">
							Todo bien
						</div>
						<div class="invalid-feedback">
							Campo Obligatorio
						</div>
					</div>
					
					<p class="mt-2"><input type="checkbox"> Aceptar los Términos de Uso</p>
					<small><i><small><p> Al registrarte aceptas los Términos y Condiciones de Uso. <a href="/"> Puedes revisar el aviso de privacidad integral aqui. </a></p></small></i></small>

					<p class="mt-2"><input type="checkbox"> Aceptar Permiso de Contacto</p>
					<small><i><small><p> Al marcar esta opción aceptas que recibiras un boletín ocasional con información relevante.</p></small></i></small>

					<center><button class="process-featured-button-2-large mt-5" type="submit"> REGISTRARTE</button></center>

					<div class="container mt-4">
						<center><p style="font-weight: 300;">¿Ya tienes una cuenta? <a href="">Iniciar Sesión</a></p></center>
						<center><p style="font-weight: 300;">¿Olvidaste tu contraseña? <a href="">Recuperar Contraseña</a></p></center>
						<center><p style="font-weight: 300;">¿No has recibido las instrucciones de confirmación? <a href="">Recibir Instrucciones</a></p></center>
					</div>
				</div>
			</form>
		</div>
	</div>

    <!-- Start Footer -->
    <?php require 'components/footer.php'; ?>
    <!-- End Footer -->

	<!-- MODALES -->

		<!-- MODAL NOMBRE -->
		<div class="modal fade" id="nombreEnUsoModal" tabindex="-1" role="dialog" aria-labelledby="nombreEnUsoModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="nombreEnUsoModalLabel">El nombre de usuario ya está en uso</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Por favor, elige otro nombre de usuario.
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>
		<!-- FIN MODAL NOMBRE-->

		<!-- MODAL CORREO -->
		<div class="modal fade" id="correoenUso" tabindex="-1" role="dialog" aria-labelledby="correoenUsoLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="correoenUsoModalLabel">El correo ya está en uso</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Por favor, elige otro correo.
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>
		<!-- FIN MODAL CORREO-->


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

	<!-- FIN MODALES -->

	<!-- CODIGO PARA DESPLEGAR MODALES -->
	<?php
		if (isset($_GET['nombreEnUso']) && $_GET['nombreEnUso'] === 'true') {
			?>
				<script>
					$(document).ready(function() {
						$('#nombreEnUsoModal').modal('show');
					});
				</script>
			<?php
		}

		if (isset($_GET['correoenUso']) && $_GET['correoenUso'] === 'true') {
			?>
				<script>
					$(document).ready(function() {
						$('#correoenUso').modal('show');
					});
				</script>
			<?php
		}

		if (isset($_GET['exito']) && $_GET['exito'] === 'true') {
			?>
				<script>
					$(document).ready(function() {
						$('#exito').modal('show');
					});
				</script>
			<?php
		}
	?>

	<!-- FIN CODIGO PARA DESPLEGAR MODALES -->
	<script src="js/script.js"></script>
</body>
</html>