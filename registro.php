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

	<div class="card-section" style="margin-bottom: 0;">
	<h1 class="section-title">Consulta Extraordinaria para la selección de jueces y juezas auxiliares</h1>
	</div>

	<div style="border-bottom: 1px solid rgba(0, 0, 0, 0.25);">
		<div class="container">
			<div class="nav3">
				<h5><a href="participa2.php">EL PROCESO</a></h5>
				<h5><a class="a-active" href="#">FASES </a></h5>
				<h5><a href="fichasActivas.php">FICHAS ACTIVAS</a></h5>
			</div> 
		</div>
	</div>

	<div class="container process-featured">
		<h4><strong><i class="fa fa-square" aria-hidden="true"></i> REGISTRO</strong></h4>
	</div>

	<div class="container d-flex justify-content-center text-center">
		<h2 style="font-weight: 350;">Consulta las Bases y ¡ALISTA TUS DOCUMENTOS PARA REGISTRATE!<br>Puedes hacerelo en línea desde cualquier dispositivo móvil con conexion a Internet o acercanote a alguno de los Centros de Atencion Municipal. </h2>
	</div>

	<div class="container">
		<div class="container form-div d-flex justify-content-center" style="margin-top: 3%; width: 70%;">
			<form class="needs-validation" style="width: 75%;" novalidate>
				<div class="form-group f-register"  >
					<i><p style="font-weight: 500; color: #894B5D;"> * Los campos requeridos están marcados con un asterisco</p></i>

					<div>
						<label class="label-register">1. Email address *</label>
						<small><i><small><p>  Escriba su correo</p></small></i></small>
						<input type="email" class="form-control w-100" id="exampleFormControlInput1" placeholder="jose.gallegos@udem.edu" required>
						<div class="valid-feedback">
							Todo bien
						</div>
						<div class="invalid-feedback">
							Campo Obligatorio
						</div>
					</div>
					
					<div>
						<label class="label-register">2. Telefono Contacto *</label>
						<input type="email" class="form-control w-100" id="exampleFormControlInput1" placeholder="8119890949" required>
						<i><small><p style="font-weight: 500;">  Maximo 10 caracteres</p></small></i>
						<div class="valid-feedback">
							Todo bien
						</div>
						<div class="invalid-feedback">
							Campo Obligatorio
						</div>
					</div>
					
					<div>
						<label class="label-register">3. Seccion *</label>
						<small><i><small><p> Escriba su seccion</p></small></i></small>
						<input type="email" class="form-control w-100" id="exampleFormControlInput1" placeholder="ABCD" required>
						<i><small><p style="font-weight: 500;">  Maximo 4 caracteres</p></small></i>
						<div class="valid-feedback">
							Todo bien
						</div>
						<div class="invalid-feedback">
							Campo Obligatorio
						</div>
					</div>
					
					<div>
						<label class="label-register">4. Colonia *</label>
						<small><i><small><p>  Escriba su Colonia</p></small></i></small>
						<input type="email" class="form-control w-100" id="exampleFormControlInput1" placeholder="Ciudad General Escobedo" required>
						<div class="valid-feedback">
							Todo bien
						</div>
						<div class="invalid-feedback">
							Campo Obligatorio
						</div>
					</div>
					
					<div>
						<label class="label-register">5. Identificación del Insituto Nacional VIGENTE *</label>
						<small><i><small><p> Adjunte su archivo de INE</p></small></i></small>
						
						<div class="file-input">
							<input type="file" name="file" id="file" required>
							<label for="file">Elegir archivo</label>
						</div>

						<i><small><p style="font-weight: 500;"> Archivo JPG o PDF de máximo 5MB</p></small></i>
						<div class="valid-feedback">
							Todo bien
						</div>
						<div class="invalid-feedback">
							Campo Obligatorio
						</div>
					</div>

					<div>
						<label class="label-register">6. FOTO POR LA PARTE DE ATRAS de la Identificación del Instituto Nacional Electoral VIGENTE *</label>
						<small><i><small><p>  Adjunte el archivo de su INE o IFE</p></small></i></small>
						<div class="file-input">
							<input type="file" name="file" id="file">
							<label for="file">Elegir archivo</label>
						</div>
						<i><small><p style="font-weight: 500;"> Archivo JPG o PDF de máximo 5MB</p></small></i>
						<div class="valid-feedback">
							Todo bien
						</div>
						<div class="invalid-feedback">
							Campo Obligatorio
						</div>
					</div>
					
					<div>
						<label class="label-register">7. Comprobante de domicilio *</label><br>
						<div class="file-input">
							<input type="file" name="file" id="file" required>
							<label for="file">Elegir archivo</label>
						</div>
						<i><small><p style="font-weight: 500;"> Archivo JPG o PDF de máximo 5MB</p></small></i>
						<div class="valid-feedback">
							Todo bien
						</div>
						<div class="invalid-feedback">
							Campo Obligatorio
						</div>
					</div>

					<div>
						<label class="label-register">8. CURP *</label>
						<small><i><small><p>  Escriba su CURP</p></small></i></small>
						<input type="email" class="form-control w-100" id="exampleFormControlInput1" placeholder="LEOJ970424HNLJGN01" required>
						<div class="valid-feedback">
							Todo bien
						</div>
						<div class="invalid-feedback">
							Campo Obligatorio
						</div>
					</div>

					<div>
						<label class="label-register">9. Foto de perfil del Rostro de la persona postulante*</label>
						<small><i><small><p>Adjunte una imagen suya con los docuemntos INE o Constancia en la mano</p></small></i></small>
						<div class="file-input">
							<input type="file" name="file" id="file" required>
							<label for="file">Elegir archivo</label>
						</div>
						<i><small><p style="font-weight: 500;"> Archivo JPG o PDF de máximo 5MB</p></small></i>
						<div class="valid-feedback">
							Todo bien
						</div>
						<div class="invalid-feedback">
							Campo Obligatorio
						</div>
					</div>


					<br>
					<p><input type="checkbox"> Aceptar los Términos y condiciones de Uso</p>
					<small><i><small><p> La informacion de datos personales que se recaben son con fines de Consulta Extraordinaria. <a href="/"> Puedes revisar el aviso de privacidad integral aqui </a></p></small></i></small>

					<center><button class="process-featured-button-2-large mt-5" type="submit">ENVIAR RESPUESTAS</button></center>
				</div>
			</form>
		</div>
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

	<script src="js/script.js"></script>
</body>
</html>