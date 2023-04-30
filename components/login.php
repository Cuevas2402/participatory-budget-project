<?php

    if(!isset($_SESSION)){

    
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
                    <span><i class="fas fa-user me-2"></i>USUARIO</span>
                </a>
                <ul class="dropdown-menu text-center">
                    <li><a class="dropdown-item" href="miCuenta.html">Mi cuenta</a></li>
                    <li><a class="dropdown-item" href="#">Mi perfil público</a></li>
                    <li><a class="dropdown-item" href="#">Cerrar Sesión</a></li>
                </ul>
            </div>
        </div>
    </center>

<?php

    }

?>