<?php
    session_start();
    if(!isset($_SESSION['id'])) {
        // Mostrar el modal si el usuario no tiene una sesión activa
        echo "<script>$('#inicia').modal('show');</script>";
    } else {
        // El usuario tiene una sesión activa, continuar con el código normalmente
        // ...
    }
?>
