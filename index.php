<?php
	require 'config/db.php';
	require 'config/config.php';
	$stmt = $pdo->prepare("CALL get_process_featured_1()");
	$stmt->execute();
	$row = $stmt->fetch();
	$cont = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>

    <!-- Template CSS -->
    <link rel="stylesheet" href="css/template.css">
    <!-- HeaderBody CSS -->
    <link rel="stylesheet" href="css/headerBody.css">
    <!-- Timeline CSS -->
    <link rel="stylesheet" href="css/timeline.css">
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
    <style>
      #map { height: 600px; }
    </style>
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
					<a class="nav-link a-active" href="index.php">Inicio</a>
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
				<!-- (Iniciar Sesión / Registrarse) o Sesion Inicada -->
				<?php require 'components/login.php' ?>
			</div>
        </div>
    </nav>
    <!-- Start search bar-->

	<?php require 'components/search_bar.php'; ?>
		
	<!-- End search bar-->

	<!-- End Navbar -->
		
	<!-- Start First Content -->
	<div class="w-100" style="background-color: #EAD9D8; padding-top: 4rem; padding-bottom: .8rem;">
		<div class="container" style="margin-top: 4rem; margin-bottom: 5rem;">
			<div class="header-body">
				<div class="slider">
					<div class="decoration-left anim"></div>
					<div class="decoration-right anim"></div>
					<div class="overlay anim"></div>
					<img src="./img/img2.jpg" alt="img" class="slider-img">
		
				</div>
				<div class="text">
					<div>
						<h1>
							Presupuesto Participativo <br>
							- Monterrey
						</h1>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, illum.</p>
						<a href="participa.php"><button class="process-featured-button-2-large mt-4">Ver Procesos</button></a>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	
	<!-- End First Content -->

	<strong><p style="margin-top:4rem; text-align: center; margin-bottom: -4rem; font-weight: normal; font-size: 48px;">Fases del Presupuesto Participativo</p></strong>
	
	<!-- Start Timeline -->

	<div class="timeline">
		
		<div class="vertical-line"></div>
		<div class="c left-container">
			<div class="circulo cir3"><p>1</p></div>
			<div class="t c3">
				<h2 style="color: #894B5D; font-weight: bold;">Sube tu propuesta</h2>
				<small>7 AL 29 DE MAYO </small>
				<p>Podrás subir tu propuesta. Conoce que proyectos puedes proponer para mejorar tu ciudad.</p>
				<span class="right-container-arrow arrow1"></span>
			</div>
		</div>
		<div class="c right-container">
			<div class="circulo cir2"><p>2</p></div>
			<div class="t c2">
				<h2 style="color: #894B5D; font-weight: bold;">Evaluación</h2>
				<small>30 DE MAYO AL 22 DE JUNIO</small>
				<p>Las dependencias involucradas evaluarán tu propuesta para revisar si es viable económica, técnica y jurídicamente.</p>
				<span class="left-container-arrow arrow2"></span>
			</div>
		</div>
		<div class="c left-container">
			<div class="circulo cir3"><p>3</p></div>
			<div class="t c3">
				<h2 style="color: #894B5D; font-weight: bold;">Decide</h2>
				<small>4 AL 13 DE JULIO </small>
				<p>Podrás votar por tu proyecto preferido en esta plataforma y en las bibliotecas habilitadas para el programa.</p>
				<span class="right-container-arrow arrow3"></span>
			</div>
		</div>

	</div>
	<!-- End Timeline -->

	<div class="w-100" style="background-color: #EAD9D8; padding-top: 4rem; padding-bottom: .8rem;">
		<div class="container" style="margin-top: 2rem; margin-bottom: 5rem;">
			<div class="header-body">
				<div class="text">
					<div>
						<h1>¡Descubre tu municipio!</h1>
						<br>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, illum.</p>
					</div>
		
				</div>
				<div class="slider">
					<div id="map" style="border-radius: 5;"></div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- End map -->
	<strong><p style="margin-top:4rem; text-align: center; margin-bottom: -4rem; font-weight: normal; font-size: 48px;">¡Conoce nuestros eventos!</p></strong>
	<!-- Start featured proceses-->
	<div class="w-100" style="padding-top: 4rem; padding-bottom: 5rem;">
		<div class="container process-featured">
		<h4><strong><i class="fa fa-square" aria-hidden="true"></i> PROCESOS DESTACADOS</strong></h4>
		</div>
		<div class="container process-featured-container">
		<div class="row row-cols-1 row-cols-md-1 row-cols-lg-2">
			<div class="col border">
				<div class="my-5">
						<h2 class="process-featured-title">
						<?php
							echo $row['titulo_proceso'];
						?>
						</h2>
						<h3 class="process-featured-title2">
						<?php
							echo $row['subtitulo_proceso'];
						?>
						</h3>
						<p class="process-featured-title2">Fase Actual:  </p> 
						<center><button class="process-featured-button-3">
						<?php
							echo $row['titulo_fase'];
						?> 
						</button></center>
						<?php
							echo $row['descripcion_proceso'];
							//  $cont++;
							//  }
						?>
						<center>
							<a href="participa2.php?id=<?php echo $row['pid']; ?>&token=<?php echo hash_hmac('sha1', $row['pid'], KEY_TOKEN );?>" ><button class="process-featured-button-1">Más Información</button></a>
							<button class="process-featured-button-2">Participar</button>
						</center>
				</div>
			</div>
			<div class="col border d-flex justify-content-center align-items-center" style="padding: 0 0;  background-image: url(img/img4.jpg); background-position: center; background-repeat: no-repeat; background-size: 100% 100%;">
				<img class="card-img" src="img/img4.jpg" alt="" style="filter: opacity(0)">
			</div>
		</div>
		</div>
		<center><button class="process-featured-button-3-large">Ver todos los procesos</button></center>
	</div>
	<!-- End featured proceses-->
	<?php
		$stmt->closeCursor();
	?>
	<!-- MODALES -->

		<!-- MODAL EXITO -->
		<div class="modal fade" id="exito" tabindex="-1" role="dialog" aria-labelledby="exitoLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exitolLabel">Registro exitoso</h5>
						<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
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
		
		if (isset($_GET['exito']) && $_GET['exito'] === "true") {
			?>
				<script>
					$(document).ready(function() {
						$('#exito').modal('show');
					});

					if (performance.navigation.type === 1) {
						// El tipo de navegación es "1" cuando la página se carga por primera vez o se recarga
						// Limpiar los parámetros de la URL sin recargar la página
						window.history.replaceState({}, document.title, window.location.pathname);

						// Eliminar el parámetro "exito" de la URL
						var url = window.location.href;
						url = url.replace('?exito=true', '');
						history.replaceState({}, '', url);
					}
				</script>
			<?php
		}
	?>

    <!-- Start Footer -->
    <?php require 'components/footer.php'; ?>
    <!-- End Footer -->
	
	<script src="js/map.js"></script>

</body>
</html>