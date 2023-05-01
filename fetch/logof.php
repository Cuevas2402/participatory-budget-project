<?php
    session_start();
    if(isset($_POST['dato']) && $_POST['dato'] == true){
        session_destroy();
        header("Location: index.php"); // redireccionar a la página de inicio de sesión

    }

?>