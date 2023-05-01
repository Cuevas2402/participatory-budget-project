<?php
    session_start();
    if(!isset($_SESSION['id']) && !isset($_SESSION['nombre'])){

        
?>
        <div class="text-center">
            <a href="registrarse.php"><button class="btn me-3 my-3 registra">Regístrate</button></a>
            <a href="sesion.php"><button class="btn ms-3 my-3 inicia">Inicia Sesión</button></a>
        </div>

<?php
    
    }else{

?>
        <center>
            <div class="d-flex justify-content-center align-items-center text-center" style="width: 275.97px; height: 70px;">
                <div class="dropdown text-center">
                    <a class="dropdown-toggle w-100 h-100" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span><i class="fas fa-user me-2"></i><?php echo $_SESSION['nombre']; ?></span>
                    </a>
                    <ul class="dropdown-menu text-center">
                        <li><a class="dropdown-item" href="miCuenta.html">Mi cuenta</a></li>
                        <li><a class="dropdown-item" href="perfilPublico.php?id=<?php echo $_SESSION['id']; ?>&token=<?php echo hash_hmac('sha1', $_SESSION['id'], KEY_PERFIL );?>">Mi perfil público</a></li>
                        <li><a class="dropdown-item" href="#">Cerrar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </center>

<?php

    }

?>