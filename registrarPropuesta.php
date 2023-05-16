<?php
    require 'config/db.php';
    require 'config/config.php';
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $token = isset($_GET['token']) ? $_GET['token'] : '';

    if($id == '' && $token == '' && !isset($_SESSION['pid'])){
        header("Location: components/404.php");
        exit();
    }else{
        $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);
        if($token == $token_tmp){        
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Propuesta</title>

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
	

</head>
<body style="font-family: Roboto;">
	<!-- Start Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
			<a class="navbar-brand" href="#"><img src="img/logo.png" style="width: 200px;" alt="Logo del Gobierno de Monterrey"></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse mx-auto" id="navbarSupportedContent">
				<ul class="navbar-nav d-flex justify-content-around w-100 text-center">
				<li class="nav-item">
					<a class="nav-link " href="index.php">Inicio</a>
				</li>
				<li class="nav-item">
					<a class="nav-link a-active" href="participa.php">Participa</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="ayuda.php">Ayuda</a>
				</li>
				<li class="nav-item">
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
	<div>
        <img src="img/banner.jpg" class="img-fluid w-100" alt="Imagen del Cerro de Monterrey">
    </div>
	
    <div style="border-bottom: 1px solid rgba(0, 0, 0, 0.25);">
        <div class="container">
            <div class="nav3">
                <h5><a id="pid" href="participa2.php?id=<?php echo $_SESSION['pid']; ?>&token=<?php echo hash_hmac('sha1', $_SESSION['pid'], KEY_TOKEN );?>" data-value="<?php echo $pid?>">EL PROCESO</a></h5>
                <h5><a href="fases.php?id=<?php echo $_SESSION['pid']; ?>&token=<?php echo hash_hmac('sha1', $_SESSION['pid'], KEY_TOKEN );?>">FASES </a></h5>
                <h5><a class="a-active"  href="fichasActivas.php?id=<?php echo $_SESSION['pid']; ?>&token=<?php echo hash_hmac('sha1', $_SESSION['pid'], KEY_TOKEN );?>">PROPUESTAS</a></h5>
            </div> 
        </div>
    </div>
    
	<div class="container" style="margin-top: 2rem;">
		<a href="fichasActivas.php?id=<?php echo $_SESSION['pid']; ?>&token=<?php echo hash_hmac('sha1', $_SESSION['pid'] , KEY_TOKEN);?>"><span><i class="fa-solid fa-chevron-left fa-2xs"></i> Volver al listado</span></a>
	</div>

	<div class="container d-flex justify-content-center text-center" style="margin-top: 2.5%;">
		<h2 style="font-weight: 600;">Registra Propuesta</h2>
	</div>

	<div class="container  mensaje mt-5"> 
		<div class=" container form-div d-flex justify-content-center" style="margin-top: 3%; width: 70%;">
			<!-- INICIO FORMS --> 
			<form class="form-r needs-validation" style="width: 75%;"  action="fetch/proposal_register.php" method="POST" id="form" enctype="multipart/form-data" novalidate>
				<div class="form-group f-register"  >
					<i><p style="font-weight: 500; color: #894B5D;"> * Los campos requeridos están marcados con un asterisco</p></i>

					<div>
						<label class="label-register">Título *</label>
						<input type="text" class="nombre form-control w-100" name="titulo" id="titulo" required>
						<div class="valid-feedback">
							Todo bien
						</div>
						<div class="invalid-feedback">
							Campo Obligatorio
						</div>
					</div>

					<div>
						<label class="label-register">Distrito *</label>
						<br>
						<select name="distrito" type="text"> 
							<?php 
								
								$sql = $pdo->prepare("SELECT * from distritos, procesos WHERE procesos.mid = distritos.mid AND procesos.pid = ?");
								$sql->execute([$_SESSION['pid']]);
								$rows = $sql->fetchAll();
								$sql->closeCursor();
								foreach($rows as $row){

								
							?>
									<option value="<?php echo $row['did']; ?>"><?php echo $row['nombre_distrito']?></option>
									
							<?php 
								}
							?>

							
						</select>
					</div>

					<div>
						<label class="label-register">Descripción *</label>
						<textarea class="email form-control w-100" name="descripcion" id="textarea" placeholder="Ingresa la descripción" rows="10" required></textarea>
						<div class="valid-feedback">
							Todo bien
						</div>
						<div class="invalid-feedback">
							Campo Obligatorio
						</div>
					</div>

					<div>
						<label class="label-register">Imágen de la propuesta </label>
						<br>
						<div class="file-input">
							<input type="file" name="img" id="file" >
							<label for="file">Elegir archivo</label>
						</div>
						<label for="file" id="file-label"></label>
					</div>

					<center><button class="process-featured-button-2-large mt-5" type="submit">Publicar</button></center>
				</div>
			</form>
			<!-- FIN FORMS --> 
		</div>
	</div>

    <!-- Start Footer -->
    <?php require 'components/footer.php'; ?>
    <!-- End Footer -->

	<!-- MODALES -->

		<!-- MODAL IMG -->
		<div class="modal fade" id="img" tabindex="-1" role="dialog" aria-labelledby="imgLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="imgLabel">Imagen no permitida</h5>
						<button type="button" class="img-cerrar close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						La imagen no cumple con los requerimientos indicados
					</div>
					<div class="modal-footer">
						<button type="button" class="img-cerrar btn btn-secondary" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>
		<!-- FIN MODAL IMG-->

		<!-- MODAL titulo -->
		<div class="modal fade" id="titulo-modal" tabindex="-1" role="dialog" aria-labelledby="tituloLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="tituloLabel">Titulo en uso</h5>
						<button type="button" class="titulo-cerrar close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Por favor, elige otro titulo, el que escribiste ya se encuentra en uso
					</div>
					<div class="modal-footer">
						<button type="button" class="titulo-cerrar btn btn-secondary" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>
		<!-- FIN MODAL TITULO-->

	<!-- FIN MODALES -->

	<!-- CODIGO PARA DESPLEGAR MODALES -->
	<?php
		
		if (isset($_GET['img']) && $_GET['img'] === 'false') {
			?>
				<script>
					$(document).ready(function() {
						$('#img').modal('show');
					});
				</script>
			<?php
		}

		if (isset($_GET['titulo']) && $_GET['titulo'] === 'false') {
			?>
				<script>
					$(document).ready(function() {
						$('#titulo-modal').modal('show');
					});
				</script>
			<?php
		}

	?>
	

	<!-- FIN CODIGO PARA DESPLEGAR MODALES -->
	<script src= "js/validateProp.js"></script>
	<script src="js/script.js"></script>
	<script>
		$(document).ready(function(){
			$('#file').change(function (){
				var input = document.getElementById('file');
				var label = document.getElementById('file-label');
				label.innerHTML = input.value.split('\\').pop(); // obtiene solo el nombre del archivo y lo asigna al valor del label
			});
		});
		
	</script>

	<script>
		$(document).ready(function(){
			$('.titulo-cerrar').click(function(){
				$('#titulo-modal').modal('hide');
			});
		});

		$(document).ready(function(){
			$('.img-cerrar').click(function(){
				$('#img').modal('hide');
			});
		});
	</script>
</body>
</html>
<?php
        }else{
            header("Location: components/404.php");
            exit();
        }
		
    }
        //$stmt->closeCursor();

?>