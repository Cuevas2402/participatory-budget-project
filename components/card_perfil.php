<!-- START INDIVIDUAL CARD -->
<div class="col-12 text-center">
    <img src="img/avatar.png" style="width: 50px; border-radius: 3px 0 0px 3px;">
    <div class="col-12 col-md my-2">
        <h5 class="mt-2 profile-name"><?php echo $row['nombre']; ?></h5>
        <p class="my-2"><small>Creado el: <?php echo $row['fecha_creacion']; ?></small></p>
        <a href="perfilPublico.php?id=<?php echo $row['uid']; ?>&token=<?php echo hash_hmac('sha1', $row['uid'], KEY_PERFIL );?>"> <button class="my-2 profile-button">Más información</button></a>
    </div>
    <center><hr style="width: 70%;"></center>
</div>
<!-- END INDIVIDUAL CARD -->