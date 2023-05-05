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
                <div class="dropdown text-center login-account">
                    <a class="dropdown-toggle w-100 h-100" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="profile-name"><i class="fas fa-user me-2"></i><?php echo $_SESSION['nombre']; ?></span>
                    </a>
                    <ul class="dropdown-menu text-center">
                        <li><a class="dropdown-item" href="miCuenta.php?id=<?php echo $_SESSION['id']; ?>&token=<?php echo hash_hmac('sha1', $_SESSION['id'], KEY_PERFIL );?>">Mi cuenta</a></li>
                        <li><a class="dropdown-item" href="perfilPublico.php?id=<?php echo $_SESSION['id']; ?>&token=<?php echo hash_hmac('sha1', $_SESSION['id'], KEY_PERFIL );?>">Mi perfil público</a></li>
                        <li><a id="cerrar-sesion" class="dropdown-item" href="#">Cerrar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </center>

		<!-- MODAL EXITO -->
		<div class="modal fade" id="cerrar" tabindex="-1" role="dialog" aria-labelledby="cerrarLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="cerrarlLabel">De verdad quieres cerrar sesion? 🥺 </h5>
						<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
						<button type="button" class="si btn btn-secondary" data-dismiss="modal">Si</button>
					</div>
				</div>
			</div>
		</div>
		<!-- FIN MODAL EXITO-->

        <!-- CODIGO PARA DESPLEGAR MODALES -->
        
        <script>
            $(document).ready(function() {
                $('#cerrar-sesion').click(function() {
                    $('#cerrar').modal('show');
                });
            });

            $(document).ready(function() {
                $('.si').click(function() {
                    $('#cerrar').modal('hide');
                    $.ajax({
                        url: "fetch/logof.php",
                        type: "POST",
                        data: {
                            dato: true
                        },
                        success:function(){
                            location.reload();
                            window.location.href = "index.php";
                        }
                    });
                });
            });

            $(document).ready(function() {
                $('#close').click(function() {
                    $('#cerrar').modal('hide');
                });
            });
        </script>
                
        <!-- Start Footer -->

<?php

    }

?>