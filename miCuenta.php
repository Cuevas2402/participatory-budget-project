<?php
    require 'config/db.php';
    require 'config/config.php';

    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $token = isset($_GET['token']) ? $_GET['token'] : '';

    if($id == '' && $token == '' && $_SESSION['id']){
        header("Location: components/404.php");
        exit();
    }else{
        $token_tmp = hash_hmac('sha1', $id, KEY_PERFIL);
        if($token == $token_tmp){
            
        
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mi perfil público</title>

        <!-- Template CSS -->
        <link rel="stylesheet" href="css/template.css">

        <!-- Ayuda CSS -->
        <link rel="stylesheet" href="css/ayuda.css">
        
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
        <?php

            $sql = $pdo->prepare("SELECT * FROM usuarios WHERE uid = ?");
            $sql->execute([$_SESSION['id']]);
            $row = $sql->fetch();
            $sql->closeCursor();

        ?>
        <div class="contenido">
            <center>    
                <h1>Configuración de cuenta</h1>
            </center>

            <div class="tabs-ayuda" style="margin-top: 2rem;">
                <div class="tabs">
                    <div><button id="opc1" class="tablinks" onclick="openCat(event,'info1')">Cuenta</button></div>
                    <div><button id="opc2" class="tablinks" onclick="openCat(event,'info2')">Eliminar mi cuenta</button></div>
                    <div class="off-canvas"></div>
                </div>
                <div class="info">
                    <div id="info1" class="tabcontent" style="display: block;">
                        
                            <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2">
                                <div class="col col-md-5 col-lg-4">
                                    <div>
                                        <small>Avatar<br>
                                            <i>Instrucciones para la imagen:</i></small>
                                        <ul>
                                            <li><small><i>Carga preferiblemente una imagen horizontal sin ningún texto.</i></small></li>
                                            <li><small><i>Esta plataforma recortará la imagen automáticamente.</i></small></li>
                                            <li><small><i>Tamaño máximo del archivo: 10MB y 200 píxeles x 200 píxeles</i></small></li>
                                            <li><small><i>Formatos de archivo permitidos: jpg, jpeg, gif, png, bmp e ico</i></small></li>
                                        </ul>
                                    </div>
                                    <center>
                                    <form class="needs-validation" id="form" action="fetch/update_profile.php" method="POST" enctype="multipart/form-data" novalidate>
                                        <div class="file-input">
                                            <input type="file" name="file" id="fileInput" accept=".jpg,.jpeg,.gif,.png,.bmp,.ico">
                                            <label for="file">Elegir archivo</label>
                                        </div>

                                        <div id="imageContainer" style="width: 200px; height: 200px; border: 1px solid black;">
                                            <?php

                                                if (!is_null($row['img'])) {

                                            ?>
                                                    <img src="<?php echo $row['img']; ?>" >
                                            <?php

                                                } 

                                            ?>
                                        </div>
                                        <script>
                                            // Obtener el div contenedor de la imagen
                                            const imageContainer = document.getElementById('imageContainer');

                                            // Agregar un evento de cambio al input del archivo
                                            fileInput.addEventListener('change', () => {
                                            // Leer el archivo seleccionado por el usuario
                                            const file = fileInput.files[0];
                                            const reader = new FileReader();
                                            reader.readAsDataURL(file);

                                                // Agregar un evento de carga al lector de archivos
                                                reader.addEventListener('load', () => {
                                                    // Crear una etiqueta img para mostrar la imagen
                                                    const img = document.createElement('img');
                                                    img.src = reader.result;
                                                    img.style.maxWidth = '100%';
                                                    img.style.maxHeight = '100%';

                                                    // Agregar la etiqueta img al contenedor de imagen
                                                    imageContainer.innerHTML = '';
                                                    imageContainer.appendChild(img);

                                                    // Verificar si la imagen tiene el tamaño correcto
                                                    if (img.naturalWidth !== 200 && img.naturalHeight !== 200) {
                                                        // Si la imagen no tiene el tamaño correcto, mostrar un mensaje de error
                                                        alert('La imagen debe tener un tamaño de 200x200 píxeles');
                                                        imageContainer.innerHTML = '';
                                                        fileInput.value = '';
                                                    }
                                                });
                                            });
                                        </script>
                                        </center>
                                        <img src="" alt="">
                                </div>
                                <div class="col-md-7 col-lg-8">
                                    
                                        <p><small><i>* Los campos requeridos están marcados con un asterisco</i></small></p>
                                        <label class="label-register">Tu nombre *</label>
                                        <input type="nombre" class="form-control w-100" id="nombre" name="nombre" maxlength="50" value="<?php echo $row['nombre'];?>" required>
                                        <label class="label-register">Tu correo electrónico *</label>
                                        <input type="email" class="form-control w-100" id="email" name="correo" value="<?php echo $row['correo'];?>" required>
                                        <label class="label-register">Número de Teléfono *</label>
                                        <input type="phone" class="form-control w-100" id="telefono" name="telefono" maxlength="10" value="<?php echo $row['telefono']; ?>" required>
                                        <center><button class="process-featured-button-2-large mt-5" type="submit">Actualizar Cuenta</button></center>
                                    </form>
                                </div>
                            </div>
                        
                    </div>
                    <div id="info2" class="tabcontent">
                        <div class="row">
                            <div class="col">
                                <h2 style="text-align: left !important;">Antes de continuar con la opción de "Eliminar mi cuenta" considera lo siguiente:</h2>
                                <ul>
                                    <li>Esta acción no se puede deshacer.</li>
                                    <li>Si eliminas tu cuenta no podrás iniciar sesión con tus credenciales.</li>
                                    <li>La eliminación de tu cuenta resultará en la anonimización de tus contribuciones.</li>
                                    <li>Aún podrás crear una nueva cuenta, pero estas contribuciones no se asociarán a ella.</li>
                                </ul>
                                <h5 style="text-align: left !important;">Por favor, cuéntanos el motivo por el que deseas eliminar tu cuenta (opcional).</h5>
                                <textarea name="" id="" rows="5" style="width: 100%;"></textarea>
                                <center><button class="borrar-btn process-featured-button-2-large mt-5">Eliminar mi cuenta</button></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <footer style="margin-bottom: -5rem;">
            <div class="footer-content" >
                <ul class="socials">
                    <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                </ul>
                <p>Términos y condiciones</p>
                <p>Descargar ficheros de datos abiertos</p>
            </div>
            <div class="footer-bottom">
                <p>Este programa es público, ajeno a cualquier partido político. Queda prohibido el uso para fines distintos a los establecidos en el Programa.</p>
            </div>
        </footer>
        <!--& SCRIPT PARA SECCIONES -->
        <script>
            function openCat(evt, categoria) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(categoria).style.display = "block";
                evt.currentTarget.className += " active";
            }
        </script>   
        
        
        <!-- MODALES -->

            <!-- MODAL CORREO  -->
            <div class="modal fade" id="correo-modal" tabindex="-1" role="dialog" aria-labelledby="Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="Label">Correo en Uso</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            El correo que introdujo ya se encuentra en uso
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIN MODAL CORREO-->

            <!-- MODAL NOMBRE -->
            <div class="modal fade" id="nombre-modal" tabindex="-1" role="dialog" aria-labelledby="Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="Label">Nombre en uso</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            El nombre que ingreso ya se encuentra en uso
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIN MODAL NOMBRE-->


            <!-- MODAL COMPLETO -->
            <div class="modal fade" id="completo-modal" tabindex="-1" role="dialog" aria-labelledby="Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="Label">Perfil actualizado</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Su perfil ha sido actualizado correctamente
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIN MODAL COMPLETO-->

            <!-- MODAL BORRAR -->
            <div class="modal fade" id="borrar" tabindex="-1" role="dialog" aria-labelledby="Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="Label">De verdad quieres eliminar tu cuenta? 🥺 </h5>
                            <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                            <button type="button" id="borrar-cuenta" class="btn btn-secondary" data-dismiss="modal">Si</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIN MODAL BORRAR --> 

        <!-- FIN MODALES -->

        <!-- CODIGO PARA DESPLEGAR MODALES -->
        <?php
            
            if (isset($_GET['nombre']) && $_GET['nombre'] === 'true') {
                ?>
                    <script>
                        $(document).ready(function() {
                            $('#nombre-modal').modal('show');
                        });
                    </script>
                <?php
            }

            if (isset($_GET['correo']) && $_GET['correo'] === 'true') {
                ?>
                    <script>
                        $(document).ready(function() {
                            $('#correo-modal').modal('show');
                        });
                    </script>
                <?php
            }

            if (isset($_GET['completado']) && $_GET['completado'] === 'true') {
                ?>
                    <script>
                        $(document).ready(function() {
                            $('#completo-modal').modal('show');
                        });
                    </script>
                <?php
            }

        ?>

        <script>
            $(document).ready(function(){
                $('.borrar-btn').click(function(){
                    $('#borrar').modal('show');
                });
            });

            $(document).ready(function(){
                $('#borrar-cuenta').click(function(){
                    $.ajax({
                        url: "fetch/delete_account.php",
                        type: "POST",
                        success:function(){
                            window.location.replace("index.php");
                        }
                    });
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