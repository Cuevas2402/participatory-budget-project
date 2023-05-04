<?php
    require 'config/db.php';
    require 'config/config.php';
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $token = isset($_GET['token']) ? $_GET['token'] : '';

    if($id == '' && $token == ''){
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
        <img src="img/banner.jpg" class="img-fluid w-100">
    </div>
    
    <div style="border-bottom: 1px solid rgba(0, 0, 0, 0.25);">
        <div class="container">
            <div class="nav3">
                <h5><a href="participa2.php?id=<?php echo $id; ?>&token=<?php echo hash_hmac('sha1', $id, KEY_TOKEN );?>">EL PROCESO</a></h5>
                <h5><a href="fases.php?id=<?php echo $id; ?>&token=<?php echo hash_hmac('sha1', $id, KEY_TOKEN );?>">FASES </a></h5>
                <h5><a class="a-active"  href="fichasActivas.php?id=<?php echo $id; ?>&token=<?php echo hash_hmac('sha1', $id, KEY_TOKEN );?>">FICHAS ACTIVAS</a></h5>
            </div> 
        </div>
    </div>

    <div class="container process-featured d-flex">
        <div class="px-2">
            <h4><strong><i class="fa fa-square" aria-hidden="true"></i> PROPUESTAS (
                <?php
                    $sql = $pdo->prepare("SELECT COUNT(procesos.pid) FROM procesos, participaciones WHERE procesos.pid = ? AND procesos.pid = participaciones.pid");
                    $sql->execute([$id]);
                    $rows = $sql->fetch();
                    echo $rows['COUNT(procesos.pid)'];
                ?>
            )</strong></h4>
        </div>
        <?php
            $sql = $pdo->prepare("SELECT * FROM procesos, fases WHERE procesos.pid = ? AND procesos.pid = fases.pid AND procesos.fase_actual = fases.n_fase");
            $sql->execute([$id]);
            $rows = $sql->fetch();
            if($rows['tipo'] == 2){ 
        ?>
                <div class="px-2">
                    <button id="button-popup" class="button-popup">Nueva Propuesta <i class="fa fa-plus" aria-hidden="true"></i></button>
                </div>
        <?php
            }
            $sql->closeCursor();
        ?>
    </div>

    <div id="popup" class="popup">
        <div class="d-flex justify-content-between">
            <div>
                <h3>Por favor, inicia sesión</h3>
            </div>
            <div>
                <button id="cerrarPopup"><i class="fa fa-x" aria-hidden="true"></i></button>
            </div>
        </div>
        <hr>
        <div class="d-flex justify-content-center">
            <form class="needs-validation" style="width: 75%;" id="form" novalidate>
                <div class="form-group f-register">
                    <div>
                        <label class="label-register">Correo Electrónico *</label>
                        <input type="nombre" class="form-control w-100" id="nombre" placeholder="jose.gallegos@udem.edu" required>
                        <div class="valid-feedback">
                            Todo bien
                        </div>
                        <div class="invalid-feedback">
                            Campo Obligatorio
                        </div>
                    </div>

                    <div>
                        <label class="label-register">Contraseña *</label>
                        <input type="password" class="form-control w-100" id="email" placeholder="Contraseña" required>
                        <div class="valid-feedback">
                            Todo bien
                        </div>
                        <div class="invalid-feedback">
                            Campo Obligatorio
                        </div>
                    </div>
                    <center><button class="process-featured-button-2-large mt-4">INICIAR SESIÓN</button></center>
                </div>
                <p style="font-weight: 300;">¿Olvidaste tu contraseña? <a href="">Recuperar Contraseña</a></p>
            </form>
        </div>
    </div>

    <div class="container" style="margin-top: 2%; margin-bottom: 10rem;">
        <div class="row no-gutters">
            <div class="col-6 col-md-4 col-sm-12 col-12">
                <ul class="list-group">
                    <li class="list-group-item" style="background-color: #EAD9D8;">
                        <p class="m-2">EI siguiente formulario filtra los
                            resultados de búsqueda dinámicamente cuando se cambian las
                            condiciones de búsqueda.
                        </p>
                    </li>
                    <li class="list-group-item" style="background-color: #EAD9D8;">
                        <div class="d-flex my-3 m-2">
                            <input class="input-search form-control" type="search" placeholder="Buscar usuario, titulo, descripción ..." aria-label="Search">
                            <button class="buscar-filtro btn buscar">
                                <i class='fa-solid fa-magnifying-glass'></i>
                            </button>
                        </div>
                    </li>
                    <li class="list-group-item" style="background-color: #EAD9D8;">
                        <div class="m-2">
                            <p><b>Distritos</b></p>
                            <?php
                                $sql = $pdo->prepare("SELECT * FROM procesos, municipios, distritos WHERE procesos.pid = '$id' AND procesos.mid = municipios.mid AND municipios.mid =  distritos.mid;");
                                $sql->execute();
                                $rows = $sql->fetchAll();
                                foreach($rows as $row){

                                
                            ?>
                                <p><input type="checkbox" class="check" value="<?php echo $row['did'] ?>"> <?php echo $row['nombre_distrito']; ?></p>

                            <?php
                                }
                                $sql->closeCursor();
                            ?>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-sm-12 col-md-8">
                <div class="container">
                    <div class="row ">
                        <div class="col gx-5">
                            <p>Ordernar propuestas por: <select  class="process-select-2" type="text">
                                <option>Aleatorio</option>
                                <option>Reciente</option>
                                <option>Con más adhesiones</option>
                                <option>Más comentadas</option>
                                <option>Con más seguidoras</option>
                                <option>Con más autoras</option>
                            </select></p>
                        </div>
                        <div class="col">
                            <p>Resultados por página: 
                            <select class="process-select-3" type="text">
                                <option>20</option>
                                <option>50</option>
                                <option>100</option>
                            </select>
                        </p>
                        </div>
                    </div>
                    <!-- start cards nuevo -->
                    <div class="container text-center" style="margin-top: 1rem;">
                        <div class="filter row row-cols-1 row-cols-md-2 row-cols-lg-2 d-flex align-items-stretch g-3">
                            <?php
                                $sql = $pdo->prepare("SELECT * FROM procesos, participaciones, usuarios, distritos WHERE procesos.pid = '$id' and procesos.pid = participaciones.pid AND usuarios.uid = participaciones.uid and distritos.did = participaciones.did");
                                $sql->execute();
                                $rows = $sql->fetchAll();
                                foreach($rows as $row){

                                    require 'components/card_ficha.php';

                                }
                                $sql->closeCursor();
                            ?>
                        </div>
                    </div>
                    <!-- end cards nuevo -->
                </div>
            </div>
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