<?php
    require 'config/db.php';
    require 'config/config.php';
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $token = isset($_GET['token']) ? $_GET['token'] : '';

    if($id == '' && $token == ''){
        header("Location: components/404.php");
        exit();
    }else{
        $token_tmp = hash_hmac('sha1', $id, KEY_PRO);
        if($token == $token_tmp){
            $uid = explode('|', $id)[0];
            $pid = explode('|', $id)[1];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fichas Activas</title>

    <!-- Stylesheet CSS -->
    <link rel="stylesheet" href="css/template.css">
    <!-- Timeline CSS -->
    <link rel="stylesheet" href="css/timeline2.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- Letra -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,regular,italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" />
    <!-- Icono -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Icono -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
                    <a class="nav-link a-active" href="participa.php">Participa</a>
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

    <div>
        <img src="img/h321px.jpg" class="img-fluid d-none d-md-block w-100">
        <img src="img/h641px.jpg" class="img-fluid d-none d-sm-block d-md-none w-100">
        <img src="img/h1920px.jpg" class="img-fluid d-block d-sm-none d-md-none w-100">
    </div>
    <div style="border-bottom: 1px solid rgba(0, 0, 0, 0.25);">
        <div class="container">
            <div class="nav3">
                <h5><a href="participa2.php?id=<?php echo $pid; ?>&token=<?php echo hash_hmac('sha1', $pid, KEY_TOKEN );?>">EL PROCESO</a></h5>
                <h5><a href="fases.php?id=<?php echo $pid; ?>&token=<?php echo hash_hmac('sha1', $pid, KEY_TOKEN );?>">FASES </a></h5>
                <h5><a class="a-active"  href="fichasActivas.php?id=<?php echo $pid; ?>&token=<?php echo hash_hmac('sha1', $pid, KEY_TOKEN );?>">FICHAS ACTIVAS</a></h5>
            </div> 
        </div>
    </div>

    <div class="container" style="margin-top: 5rem;">
		<a href="fichasActivas.php?id=<?php echo $pid; ?>&token=<?php echo hash_hmac('sha1', $pid, KEY_TOKEN);?>"><span><i class="fa-solid fa-chevron-left fa-2xs"></i> Volver al listado</span></a>
        <h5 class="mt-3" style="font-weight: normal; font-size: 32px; font-weight: 400;">Usuario</h5>
		<div class="d-flex">
			<img src="img/avatar.png" alt="" style="width: 20px; height: 20px;">
			<p class="ms-2">19/00/2002</p>
		</div>
    </div>

    <div class="container" style="margin-bottom: 10rem;">
        <div class="row no-gutters">
            <div class="col-12 col-sm-12 col-md-8 col-12" style="padding: 12px;">
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni at necessitatibus asperiores quasi dolorum soluta officia molestias, minus odio labore. Fugit illum animi, est possimus omnis nesciunt. Provident dicta esse nemo sit est, minima deserunt tempora itaque sint hic dolor fuga perferendis assumenda! Ea, animi numquam iusto in, neque soluta atque veritatis assumenda officiis unde mollitia blanditiis voluptatibus aperiam, nam sit. Eum excepturi nisi voluptatem numquam. Recusandae veritatis sit aut tempore, libero nam, dolores officia at optio corporis rerum provident delectus similique pariatur distinctio autem voluptate soluta veniam repellat id, dicta fugiat explicabo? Consequuntur architecto quia excepturi libero, neque facere ad sint eius ipsum ut. Non esse iste dolorem quibusdam optio asperiores accusamus tenetur ex dolor, impedit sunt, reprehenderit excepturi doloribus sequi necessitatibus. Saepe nulla error harum suscipit id molestiae ab sit maxime, voluptatem delectus voluptates dolore quaerat corrupti modi, doloribus qui et eligendi iste neque dolorum praesentium nobis. Numquam deserunt blanditiis non saepe, ex quasi atque placeat dolorem! Corporis aliquid ratione sequi dolor iste non numquam labore nesciunt ullam sint dolorum veniam amet doloremque veritatis, totam minima maxime magni quaerat in doloribus facere voluptatum ea! Temporibus fugiat ipsam cupiditate quasi beatae facere corporis a mollitia reprehenderit totam accusamus dicta architecto, sapiente officia? Eum praesentium quidem eveniet consectetur expedita dolores earum, necessitatibus possimus labore inventore ullam sit impedit eaque ab rerum harum sed dolorem, temporibus minus corporis quae esse! Ducimus facilis quas voluptatibus molestiae reprehenderit, nobis rerum! Quas commodi voluptatibus nesciunt! Sunt, praesentium qui eum quasi assumenda libero in nisi officiis, ipsum perspiciatis consequatur voluptatem eos aspernatur eius voluptatibus nulla incidunt sequi. Enim fugit expedita officia iste rem minima quibusdam similique repellendus itaque ducimus repudiandae veritatis, natus alias. Exercitationem eos mollitia voluptate laboriosam nisi minima, illo aut optio, atque molestias voluptatum molestiae porro nemo ab distinctio aspernatur dolorum dicta earum!</p>

				<h2>imagen</h2>
				<!-- <img src="" alt=""> -->
            </div>
            <div class="col-6 col-md-4 col-sm-12 col-12">
                <button type="button" class="btn btn-follow btn-lg" style="margin-left:10%; margin-bottom: 5%; width: 75%;">Votar</button>
            </div>
        </div>
    </div> 

	<div class="container">
		
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

    <!-- JS Script -->
    <!--<script>
        // Selecciona el checkbox con la etiqueta "Todas"
        const checkAll = document.getElementById('checkAll');

        // Selecciona todos los demás checkboxes
        const checkboxes = document.querySelectorAll('.check');

        // Agrega un event listener al checkbox "Todas"
        checkAll.addEventListener('change', function() {
        // Si "Todas" está marcado, marca todos los demás checkboxes
        if (this.checked) {
            checkboxes.forEach((checkbox) => {
            checkbox.checked = true;
            });
        } else {
            // Si "Todas" no está marcado, desmarca todos los demás checkboxes
            checkboxes.forEach((checkbox) => {
            checkbox.checked = false;
            });
        }
        });

        // Selecciona el checkbox con la etiqueta "Todas"
        const checkAll2 = document.getElementById('checkAll2');

        // Selecciona todos los demás checkboxes
        const checkboxes2 = document.querySelectorAll('.check900');

        // Agrega un event listener al checkbox "Todas"
        checkAll2.addEventListener('change', function() {
        // Si "Todas" está marcado, marca todos los demás checkboxes
        if (this.checked) {
            checkboxes2.forEach((checkbox) => {
            checkbox.checked = true;
            });
        } else {
            // Si "Todas" no está marcado, desmarca todos los demás checkboxes
            checkboxes2.forEach((checkbox) => {
            checkbox.checked = false;
            });
        }
        });

        // Selecciona el checkbox con la etiqueta "Todas"
        const checkAll900 = document.getElementById('checkAll900');

        // Selecciona todos los demás checkboxes
        const checkboxes900 = document.querySelectorAll('.check900');

        // Agrega un event listener al checkbox "Todas"
        checkAll900.addEventListener('change', function() {
        // Si "Todas" está marcado, marca todos los demás checkboxes
        if (this.checked) {
            checkboxes2.forEach((checkbox) => {
            checkbox.checked = true;
            });
        } else {
            // Si "Todas" no está marcado, desmarca todos los demás checkboxes
            checkboxes2.forEach((checkbox) => {
            checkbox.checked = false;
            });
        }
        });
        
        function toggleMore() {
            var moreOptions = document.getElementById("moreOptions");
            if (moreOptions.style.display === "block") {
                moreOptions.style.display = "none";
            } else {
                moreOptions.style.display = "block";
            }
        }

        var boton = document.getElementById("button-popup");
        var popup = document.getElementById("popup");
        var cerrarPopup = document.getElementById("cerrarPopup");

        boton.onclick = function() {
            popup.style.display = "block";
        }

        cerrarPopup.onclick = function() {
            popup.style.display = "none";
        }
    </script>-->

    <script type="text/javascript">  
        $(document).ready(function(){
            $('input[type="checkbox"]').on('change', function() { // Cada que haya un cambio en un checkbox salta el evento
                var valores = $('input[type="checkbox"]:checked').map(function() { return $(this).val(); }).get();  // Almacena los valores de los checkbox marcados y los mete en un arreglo
                var did = "<?php echo $id; ?>";
                $.ajax({
                    url: "fetch/filter_fichas.php",
                    type: "POST",
                    data: {
                        datos: valores,
                        id: did
                    }, 
                    beforeSend:() =>{
                        $('.filter').html("<span>Working ... </span>");
                    },
                    success:function(data){
                        $('.filter').html(data);
                    }

                });
            });
        });

        $(document).ready(function(){
            $('.buscar-filtro').on('click', function() { // Cada que le den click a buscar
                $('input[type="checkbox"]:checked').prop('checked', false);
                var valor = $('.input-search').val(); // Almacena el valor a buscar
                console.log(valor);
                var did = "<?php echo $id; ?>";
                $.ajax({
                    url: "fetch/search_fichas.php",
                    type: "POST",
                    data: {
                        datos: valor,
                        id: did
                    }, 
                    beforeSend:() =>{
                        $('.filter').html("<span>Working ... </span>");
                    },
                    success:function(data){
                        $('.filter').html(data);
                    }

                });
            });
        });
    </script>
</body>
</html>

<?php
        }else{
            header("Location: /components/404.php");
            exit();
        }
    }
        //$stmt->closeCursor();

?>